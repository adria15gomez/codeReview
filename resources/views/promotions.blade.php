<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootcamps</title>
</head>

<body>
    <h1>Mis Bootcamps</h1>
    <a href="{{route('addPromotion.create')}}">Agregar Bootcamp</a>
    <ul>

        @foreach ($promotions as $promotion)
        <li>
            <strong>{{$promotion->name}}</strong>
            <br>
            Formador principal: {{$promotion->trainer}}
            <br>
            Fecha de inicio: {{$promotion->start_date}}
            <br>
            Fecha de final:{{$promotion->end_date}}
            <br>
            Enlace al Zoom:{{$promotion->zoom_url}}
            <br>
            Enlace al Slack: {{$promotion->slack_url}}
            <br>
            <a href="{{route('editPromotion.edit', $promotion)}}"> Editar </a>
            <form action="{{route('deletePromotion.destroy', $promotion)}}" method="POST">

                @csrf
                @method('delete')

                <button type="submit">Eliminar</button>
            </form>
            <br>
        </li>
        @endforeach

    </ul>
</body>

</html>