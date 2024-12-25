<x-app-layout>
    @if($errors->any())
    <div>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


    <form action="/zayavki" method="post">
        @csrf
        <div>
            <label for="date">Дата</label>
            <input type="date" name="date" id="date">
        </div>
        <div>
            <label for="time">Время</label>
            <input type="time" name="time" id="time">
        </div>
        <div>
            <label for="description">Описание</label>
            <textarea type="text" name="description" id="description" placeholder="Введите текст"></textarea>
        </div>
        <button type="submit">Отправить</button>
    </form>

    <h1>Мои заявки</h1>
    @foreach($zayavki as $zayavka)
    
        @if($zayavka->user_id == auth()->user()->id)
        <div>
            <p>Дата: {{ $zayavka->date }}</p>
            <p>Время: {{ $zayavka->time }}</p>
            <p>Описание: {{ $zayavka->description }}</p>
        </div>
        @endif
    @endforeach

</x-app-layout>
