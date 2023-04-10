<form action="{{route('addTopic.store')}}" method="POST">
    
    @csrf

    <label for="name">
        Nombre del Topic
        <input type="text" name="name">
    </label><br><br>

    <label for="competence_id">
        Competenncia
        <select name="competence_id" id="comeptence_id">
            <option value="">Selecciona una competencia</option>
            @foreach ($competences as $competence)
                <option value="{{$competence->id}}">{{$competence->name}}</option>
            @endforeach
        </select>
    </label>
    
    <button type="submit">Agregar Topic</button>
</form>