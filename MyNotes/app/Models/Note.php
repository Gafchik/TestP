<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Note extends Model
{
    use HasFactory;

    /* //Первичный ключ таблицы БД. @var string
    protected $primaryKey = 'note_id';
    // Указывает, что идентификаторы модели являются автоинкрементными. @var bool
    public $incrementing = true;
    // Следует ли обрабатывать временные метки модели. @var bool
    public $timestamps = true;
    // настроить имена столбцов, используемых для хранения временных меток,
    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'updated_date';
    // Соединение с БД, которое должна использовать модель. @var string
    protected $connection = 'sqlite';*/
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
