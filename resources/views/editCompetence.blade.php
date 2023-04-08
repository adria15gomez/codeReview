<form action="{{route('editCompetence.update', $competence)}}" method="POST">
    
    @csrf
    @method('put')

    <label>
        Nombre
        <input type="text" name="name" value="{{$competence->name}}">
    </label><br><br>
    
    <button type="submit">Editar Competencia</button>
</form>