<form action="{{route('editCompetence.update', $competences)}}" method="POST">
    
    @csrf
    @method('put')

    <label>
        Nombre
        <input type="text" name="name" value="{{$competences->name}}">
    </label><br><br>
    
    <button type="submit">Editar Competencia</button>
</form>