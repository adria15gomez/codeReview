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
            @if($topics)
            @foreach($topics as $topic)
            <option value="{{ $topic->id}}">{{$topic->name}}</option>
            @endforeach
            @endif
        </select>
    </label>
    <button type="submit" id="add-topic-btn">Agregar tema</button>
    <ul id="selected-topics-list"></ul>

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
    const addTopicButton = document.querySelector('#add-topic');
    const topicsList = document.querySelector('#topics-list');
    const topicsSelect = document.querySelector('select[name="topics[]"]');

    addTopicButton.addEventListener('click', (event) => {
        event.preventDefault();

        // Get the selected option
        const selectedOption = topicsSelect.options[topicsSelect.selectedIndex];
        const topicId = selectedOption.value;
        const topicName = selectedOption.text;

        // Add the selected topic to the topics list
        const topicItem = document.createElement('div');
        topicItem.innerText = topicName;
        topicsList.appendChild(topicItem);
    });
</script>