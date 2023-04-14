<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>COMPETENCIAS</h1>
    <a href="{{route('addCompetence.create')}}">Agregar Competencia</a>

    <ul>
        <li>
            @foreach ($competences as $competence)
                <div>
                    {{$competence->name}}
                    <a href="{{route('editCompetence.edit', $competence)}}">Editar</a> 
                    <form action="{{route('deleteCompetence.distroy', $competence)}}" method="POST">
                        
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