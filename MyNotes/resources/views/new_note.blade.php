<x-app-layout>
        <div class="row">
            <div class="col-md-4">
                <form action="{{route('new_note_form')}}"  method="post">
                    @csrf {{--токен в форму для проверки--}}
                    <h4>Новая заметка</h4>
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
                    @if($rezult)
                        <div class="alert alert-success">
                            <h4>Успешно добавлено</h4>
                        </div>
                    @endif
                    <div class="form-group">
                        <label   >Тема Заметки</label>
                        <input type="text" name="theme"  class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label  class="form-label">Описанеи</label>
                        <textarea name="text" class="form-control"  rows="3"></textarea>
                    </div>
                    <hr />
                    <button class="btn btn-outline-success" type="submit">Создать</button>
            </form>
        </div>
    </div>
</x-app-layout>
