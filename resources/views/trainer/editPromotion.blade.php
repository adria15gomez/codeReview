<form action="{{route('editPromotion.update', $promotion)}}" method="POST">

    @csrf
    @method('put')

    <label>
        Nombre
        <input type="text" name="name">
    </label><br><br>

    <label>
        Formador
        <input type="text" name="trainer">
    </label><br><br>

    <label>
        Fecha de inicio
        <input type="date" name="start_date">
    </label><br><br>

    <label>
        Fecha de final
        <input type="date" name="end_date">
    </label><br><br>

    <label for="topics">
        <p>Selecciona las habilidades, (CTRL para enviar varias):</p>
        <select name="topics[]" id="topics" multiple>
            @foreach($topics as $topic)
            <option value="{{ $topic->id}}">{{$topic->name}}</option>
            @endforeach
        </select>
    </label>

    <div id="new-topic-input" style="display: none;">
        <label for="new-topic">New topic:</label>
        <input type="text" name="new_topic" id="new-topic">
    </div>

    <br><br>

    <label>
        Fecha de evaluación 1
        <input type="date" name="evaluation1">
    </label><br><br>

    <label>
        fecha de evaluación 2
        <input type="date" name="evaluation2">
    </label><br><br>


    <label>
        Fecha de evaluación 3
        <input type="date" name="evaluation3">
    </label><br><br>


    <label>
        Fecha de evaluación 4
        <input type="date" name="evaluation4">
    </label><br><br>


    <label>
        Enlace a Zoom
        <input type="url" name="zoom_url">
    </label><br><br>

    <label>
        Enlace al Slack
        <input type="url" name="slack_url">
    </label><br><br>

    <button type="submit">Actualizar Promoción</button>

</form>