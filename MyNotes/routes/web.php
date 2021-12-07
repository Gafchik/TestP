<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [NoteController::class, 'show'])->middleware(['auth'])->name('dashboard');
//фигурные скобки это динамические данные
Route::get('/dashboard/delete/{id}', [NoteController::class, 'delete'])->middleware(['auth'])->name('dashboard-delete');

Route::get('/new_note', [NoteController::class, 'show_first'])->middleware(['auth'])->name('new_note');
//пост запрос к от new_note в контроллер NoteController в метод create динамическое имя для обращения new_note_form
Route::post('/new_note', [NoteController::class, 'create'])->name('new_note_form');


//Маршруты изминения заметки
Route::get('/edit_note/{id}',[NoteController::class, 'edit_get'])->middleware(['auth'])->name('edit_note');
Route::post('/edit_note/',[NoteController::class, 'edit_post'])->middleware(['auth'])->name('edit_note_post');
require __DIR__.'/auth.php';
