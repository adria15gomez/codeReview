<form action="{{route('editTopic.update', $topics)}}" method="POST">
    
    @csrf
    @method('put')

    <label>
        Nombre
        <input type="text" name="name" value="{{$topics->name}}">
    </label><br><br>

    <label>
        <select>
            <option value=""></option>
        </select>
    </label>
    
    <button type="submit">Editar Topic</button>
</form>