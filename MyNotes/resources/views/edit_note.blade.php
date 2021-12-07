<x-app-layout>
    <div class="row">
        <div class="col-md-4">
            <form action="{{route('edit_note_post')}}"  method="post">
                @csrf {{--токен в форму для проверки--}}
                <h4>Редактирование заметки</h4>
                <hr />
                @if($errors->any()){{--проверяем есть ли ошибки--}}
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error){{--Выводим ошибки--}}
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if($data['rezult'])
                    <div class="alert alert-success">
                        <h4>Успешно изменено</h4>
                    </div>
                @endif
                <div class="form-group">
                    <input hidden="true" name="id" type="text" value="{{{$data['note']->id}}}"/>
                    <label   >Тема Заметки</label>
                    <input type="text" name="theme" value="{{$data['note']->theme}}"  class="form-control"/>
                </div>
                <div class="form-group">
                    <label  class="form-label">Описанеи</label>
                    <textarea name="text" class="form-control"   rows="3">
                        {{$data['note']->text}}
                    </textarea>
                </div>
                <hr />
                <button class="btn btn-outline-success" type="submit">Редактировать</button>
            </form>
        </div>
    </div>
</x-app-layout>
