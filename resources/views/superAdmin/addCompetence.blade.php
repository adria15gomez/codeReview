<form action="{{route('addCompetence.store')}}" method="POST">
    
    @csrf

    <label>
        Nombre
        <input type="text" name="name">
    </label><br><br>
    
    <button type="submit">Agregar Competencia</button>
</form>