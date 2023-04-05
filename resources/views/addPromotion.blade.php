<form action="{{route('addPromotion.store')}}" method="POST">

    @csrf

    <label>
        Nombre
        <input type="text" name="name">
    </label><br><br>

    <label>
        Trainer
        <input type="text" name="trainer">
    </label><br><br>

    <label>
        Start Date
        <input type="date" name="start_date">
    </label><br><br>

    <label>
        End Date
        <input type="date" name="end_date">
    </label><br><br>

    <label for="topics">
        <select name="topics[]" id="topics">
            <option value="">Select or enter a topic</option>
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
        Evaluation Date 1
        <input type="date" name="evaluation1">
    </label><br><br>

    <label>
        Evaluation Date 2
        <input type="date" name="evaluation2">
    </label><br><br>


    <label>
        Evaluation Date 3
        <input type="date" name="evaluation3">
    </label><br><br>


    <label>
        Evaluation Date 4
        <input type="date" name="evaluation4">
    </label><br><br>


    <label>
        Zoom URL
        <input type="url" name="zoom_url">
    </label><br><br>

    <label>
        Slack URL
        <input type="url" name="slack_url">
    </label><br><br>

    <button type="submit">Agregar Promoción</button>
</form>

<script>
const selectElement = document.getElementById('topics');
const newTopicInput = document.getElementById('new-topic-input');

selectElement.addEventListener('change', () => {
    const selectedValue = selectElement.value;
    if (selectedValue === '') {
        newTopicInput.style.display = 'block';
    } else {
        newTopicInput.style.display = 'none';
    }
});
</script>