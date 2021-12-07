<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use App\Http\Requests\StoreNoteRequest;
use App\Http\Requests\UpdateNoteRequest;

class NoteController extends Controller
{
    //метод гет  для редактирования заметки
    public function edit_get($id)
    {
        return view('edit_note',['data'=>[
            'note'=>Note::where('id',$id)->first(),
            'rezult'=>false
        ]]);
    }
    public function edit_post(StoreNoteRequest $request)
    {
        $edit_note = Note::where('id', $request->input('id'))->first();

        $edit_note->theme = $request->input('theme');
        $edit_note->text = $request->input('text');

        $edit_note->save();

        return view('edit_note',['data'=>[
            'note'=>$edit_note,
            'rezult'=>true
        ]]);
    }


    public function create(StoreNoteRequest $request)
    {
        //новая переменная заметки
        $new_note = new Note;
        //прописуем поля
        $new_note->theme = $request->input('theme');// с формы
        $new_note->text = $request->input('text');// с формы
        $new_note->user()->associate(User::find(auth()->user()->id)) ;// с авторизации
        //сохраняем
        $new_note->save();
        return view('new_note',['rezult'=>true]);

    }
public  function show_first()
{
    return view('new_note',['rezult'=>false]);
}


    public function show()
    {
        $notes_arr = Note::all()->where('user_id',auth()->user()->id);
            //возвращаем вью  в месте с нашими заметками
        return view('dashboard',['notes'=>$notes_arr]) ;


    }




    public function delete($id)
    {
        Note::findOrFail($id)->delete();
       return redirect()->route('dashboard');
    }
}
