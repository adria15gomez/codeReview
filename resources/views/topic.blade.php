<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>TOPIC</h1>
    <a href="{{route('addTopic.create')}}">Agregar Topic</a>

    <ul>
        <li>
            @foreach ($topics as $topic)
                <div>
                    {{$topic->name}}
                    <a href="{{route('editTopic.edit', $topic)}}">Editar</a> 
                    <form action="{{route('deleteTopic.distroy', $topic)}}" method="POST">
                        
                        @csrf
                        @method('delete')

                        <button type="submit">Eliminar</button>
                    </form>
                </div>  
            @endforeach
            
        </li>
    </ul>
</body>
</html>