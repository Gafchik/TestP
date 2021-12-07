<x-app-layout xmlns="http://www.w3.org/1999/html">
   @if(count($notes)){{--проверяем есть ли елементы в массиве заметок--}}
    <div class="d-flex p-2 bd-highlight">
        @foreach($notes->all() as $e){{----}}{{--Выводим ошибки--}}

            <div class="d-inline-flex p-2 bd-highlight">
                <div class="card text-center">
                    <div class="card-header">
                        {{$e->theme}}
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{$e->text}}</p>

                    </div>
                    <div class="card-footer text-muted">
                            Изменено : {{$e->updated_at}}
                    </div>
                    <div class="card-footer text-muted">
                        Создано :  {{$e->created_at}}
                    </div>

                    <div class="d-flex p-2 bd-highlight">
                        <div class="d-flex justify-content-evenly">
                            <a href="{{route('edit_note',$e->id)}}">
                                <button class="btn ml-2 btn-outline-info"> Редактировать</button>
                            </a>
                            <a href="{{route('dashboard-delete',$e->id)}}">
                                <button class="btn ml-2  btn-outline-danger"> Удалить</button>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        @endforeach
    </div>
    @else
        <div class="alert alert-danger">
            <h3>У нас пока нет заметок</h3>
        </div>
    @endif
</x-app-layout>
