<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use app\Models\Note;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * атрибуты которые можно назначить массово
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     *атрибуты которые скрыть от серелизации
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Атрибуты, которые следует преобразовать.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    //отображеение один к многим к заметкам
    public function notes()
    {
        return $this->hasMany(Note::class);
    }
}
