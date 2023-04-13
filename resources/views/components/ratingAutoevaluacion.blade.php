<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/afad73b29b.js"crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
<body>
    <style>
      .stars {
        display: inline-block;
      }

      .stars input[type="radio"] {
        display: none;
      }

      .stars label {
        color: #aaa;
        font-size: 32px;
        padding: 10px;
        float: right;
      }

      .stars label:before {
        content: "\f005";
        font-family: FontAwesome;
        font-style: normal;
        font-weight: normal;
        font-size: 30px;
        display: inline-block;
        margin-right: 5px;
      }

      .stars input[type="radio"]:checked ~ label {
        color: #ffdd00;
      }

      .stars input[type="radio"]:checked ~ label:before {
        content: "\f005";
        color: #ffdd00;
      }

      .selected:before {
        color: red;
      }

      .selected-2:before {
        color: green;
      }

      .selected-3:before {
        color: blue;
      }
    </style>

    <form>
      <fieldset>
          <legend>Valoración:</legend>
          <div class="stars">
              <input type="radio" id="star-6" name="level[]" value="6" />
              <label for="star-6" title="Genio/a"></label>
              <input type="radio" id="star-5" name="level[]" value="5" />
              <label for="star-5" title="Excelente"></label>
              <input type="radio" id="star-4" name="level[]" value="4" />
              <label for="star-4" title="Muy bueno"></label>
              <input type="radio" id="star-3" name="level[]" value="3" />
              <label for="star-3" title="Bueno"></label>
              <input type="radio" id="star-2" name="level[]" value="2" />
              <label for="star-2" title="Regular"></label>
              <input type="radio" id="star-1" name="level[]" value="1" />
              <label for="star-1" title="Malo"></label>
          </div>
      </fieldset>
    </form>

    <script>
      const stars = document.querySelectorAll('.stars input[type="radio"]');
      const labels = document.querySelectorAll('.stars label');

      for (let i = 0; i < stars.length; i++) {
        stars[i].addEventListener('change', function() {
          for (let j = 0; j < labels.length; j++) {
            labels[j].classList.remove('selected', 'selected-2', 'selected-3');
          }
          for (let j = 0; j <= i; j++) {
            if (i >= 0 && i <= 2) {
              labels[j].classList.add('selected');
            } else if (i >= 3 && i <= 5) {
              labels[j].classList.add('selected-2');
            } else if (i >= 6) {
              labels[j].classList.add('selected-3');
            }
          }
        });
      }
    </script>
</body>
</html>