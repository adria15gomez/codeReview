<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
  <style>
    .rating input[type="radio"] {
      display: none;
    }
  
    .cara {
      margin-right: 1em;
      opacity: 0.7;
      transition: opacity 0.2s;
      position: relative;
    }
  
    .cara:hover {
      cursor: pointer;
    }
  
    .cara:hover::before {
      content: attr(title);
      font-family: 'Poppins';
      position: absolute;
      top: -4em;
      left: 50%;
      padding: 0.5em;
      border-radius: 0.5em;
      background-color: #333;
      color: #fff;
      white-space: nowrap;
      z-index: 1;
      opacity: 0;
      transform: translate(-50%, -10px);
      transition: all 0.2s;
    }
  
    .cara:hover::after {
      content: "";
      position: absolute;
      top: -1em;
      left: 50%;
      border: 0.5em solid transparent;
      border-top-color: #333;
      z-index: 1;
      opacity: 0;
      transform: translate(-50%, -10px);
      transition: all 0.2s;
    }
  
    .cara:hover::before,
    .cara:hover::after {
      opacity: 1;
      transform: translate(-50%, -20px);
    }
  
    .cara-input:checked + .cara {
      opacity: 1;
    }
  </style>
  
  <form action="{{route('evaluation.store')}}" method="POST" id="rating-form">
    @csrf

    <input type="hidden" name="evaluationType" value="autoevaluacion">

    <div class="rating">
        @foreach ($topics as $topic)
        <p>{{$topic->name}}</p> 
        <div>
          <input type="radio" name="topics[{{$topic->id}}]" id="{{$topic->id}}" value="1" class="cara-input" />
          <label for="{{$topic->id}}" class="cara" title="Mal"><img src="img/coder/1cara.svg" alt="Mal" /></label>

          <input type="radio" name="topics[{{$topic->id}}]" id="{{$topic->id}}" value="2" class="cara-input" />
          <label for="{{$topic->id}}" class="cara" title="Regular"><img src="img/coder/2cara.svg" alt="Regular" /></label>

          <input type="radio" name="topics[{{$topic->id}}]" id="{{$topic->id}}" value="3" class="cara-input" />
          <label for="{{$topic->id}}" class="cara" title="Bien"><img src="img/coder/3cara.svg" alt="Bien" /></label>
      
          <input type="radio" name="topics[{{$topic->id}}]" id="{{$topic->id}}" value="4" class="cara-input" />
          <label for="{{$topic->id}}" class="cara" title="Muy bien"><img src="img/coder/4cara.svg" alt="Muy bien" /></label>
          
          <input type="radio" name="topics[{{$topic->id}}]" id="{{$topic->id}}" value="5" class="cara-input" />
          <label for="{{$topic->id}}" class="cara" title="Genio/a"><img src="img/coder/5cara.svg" alt="Genio/a" /></label>
          
          <input type="radio" name="topics[{{$topic->id}}]" id="{{$topic->id}}" value="6" class="cara-input" />
          <label for="{{$topic->id}}" class="cara" title="Experto/a"><img src="img/coder/6cara.svg" alt="Experto/a" /></label>
        </div>
        @endforeach
    </div>
    <button class="bg-gray-900 text-white text-sm font-light  py-2 px-4 rounded-lg mx-auto block">Enviar autoevaluación</button>
  </form>

  <script>
  const images = document.querySelectorAll('.rating img');

  images.forEach(img => {
    img.addEventListener('click', () => {
      images.forEach(otherImg => otherImg.style.opacity = 0.3);
      img.style.opacity = 1;
      const input = img.parentElement.previousElementSibling;
      input.checked = true;
    });

    img.addEventListener('mouseover', () => {
      const tooltip = img.nextElementSibling;
      tooltip.classList.add('show');
    });

    img.addEventListener('mouseout', () => {
      const tooltip = img.nextElementSibling;
      tooltip.classList.remove('show');
    });
  });
</script>
</body>
</html>