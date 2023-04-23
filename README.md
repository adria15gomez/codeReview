<p align="center"><img src="public\img\codereview.png" width="600" alt="CodeReview Logo"></p>

# Descripción

El objetivo de este proyecto es estimular a los estudiantes de Factoría F5 a que se sientan seguros de sí mismos y avancen en su aprendizaje. Para lograrlo, desarrollamos una aplicación que permite a cada coder evaluar sus habilidades y la de sus compañeros. Los profesores pueden gestionar todas esas evaluaciones y estudiantes al crear, editar y eliminar promociones, temas ("topics") y competencias.

La aplicación es responsive, de modo que pueda emplearse por formadores y coders tanto en su ordenador, como desde un dispositivo móvil.

## Funcionalidades

### Para el coder (estudiante):
* Registro 
* Autoevaluación
* Coevaluación
* Acceso a una vista comparativa de la auto y coevaluación

### Para el trainer (formador, debe ingresar con el email corporativo):
* Creación de topics (tecnologías y habilidades a dominar)
* Creación de bootcamps y asignación de estudiantes
* Acceso a la evaluación de sus estudiantes

### Para el SuperAdmin
* Creación de competencias
* Acceso a lista de formadores

## Instalación

Seguir estas instrucciones garantiza crearse una copia del proyecto y ejecutarla en una máquina local para desarrollo o testing. 

### Prerequisitos

* PHP 8 o superior
* Laravel 10 o superior
* Servidor web (Apache o Nginx)
* Base de datos MySQL o PostgreSQL
* Tailwind CSS
* Flowbite


### Instalación

1. Clonar el repositorio
2. Navegar hacia el directorio del proyecto a través de la consola o interfaz visual
3. Instalar las dependencias del proyecto:
`composer install`
4. Copiar el contenido archivo `.env.example` a otro llamado `.env`:
`cp .env.example .env`
5. Generar una llave: 
`php artisan key:generate`
6. Configurar la base de datos en el archivo `.env`
7. Migrar la base de datos : `php artisan migrate`
8. Instalar Tailwind CSS y Flowbite:
   * `npm install tailwindcss`
   * `npm install flowbite`
9. Construir el archivo CSS: `npx tailwindcss` -o public/css/app.css
10. Iniciar el servidor de desarrollo: `php artisan serve`


Luego de completar estos pasos, debería poder acceder a la aplicación en su navegador en `http://localhost:8000`.
Para configurar los tests, ver apartado Testing.

## Funcionamiento de la aplicación

![Android Emulator](https://github.com/adria15gomez/codeReview/blob/main/mobile.gif)

## Testing

Para que una copia de la aplicación pueda ejecutar los tests, se deberán seguir estos pasos.

    * Crear una nueva base de datos llamada `codereview_test`.
    * Modificar el archivo `config.database.php`, agregando los parámetros para la nueva base de datos.
    * Crear archivo `.env.testing` y modificar los parámetros de la base de datos recién creada.
    * Aplicar los cambios de variables de entorno y configuración con `php artisan config:clear` y `php artisan cache:clear`.
    * Migrar el esquema de base de datos a codereview_test con `php artisan migrate:fresh --env=testing`
    * Ejecutar los tests con `php artisan test`

### Propósito de los tests

Se diseñaron tests que prueban el intercambio de datos entre las entidades y las vistas, así como las respuestas enviadas por el servidor.
Existen clases para cada uno de los principales controladores de la aplicación.

El siguiente ejemplo es de un método que comprueba si una competencia se almacena en la base de datos y se visualiza en la vista correcta:

```
public function testCanInsertCompetence(): void
    /**
     * Test that checks if a competence can be inserted
     */
    {
        $competence1 = new Competence([
            'name' => 'Lenguajes frikis',
            'description' => 'Dominio de Alto Valirio, Klingon, Pársel, Sindarin, etc.'
        ]);
        $competence1->save();

        $competence2 = new Competence([
            'name' => 'Series de programadores',
            'description' => 'Haber visto Halt and Catch Fire, Silicon Valley o Mr. Robot.'
        ]);
        $competence2->save();

        $response = $this->get('/competencias');
        $response->assertOk();
        $response->assertSee('Lenguajes frikis');
        $response->assertSee('Series de programadores');
    }
```

## Tecnologías empleadas

| Tecnología | Tipo | Uso |
| --- | --- | --- |
| ![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white) | Lenguaje | Backend |
| ![HTML5](https://img.shields.io/badge/html5-%23E34F26.svg?style=for-the-badge&logo=html5&logoColor=white) | Lenguaje de marcado | Frontend |
| ![CSS3](https://img.shields.io/badge/css3-%231572B6.svg?style=for-the-badge&logo=css3&logoColor=white) | Language | Frontend |
| ![Laravel](https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white) | Framework | Frontend y Backend |
| ![Tailwind](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white) | Librería | Frontend |
| ![NPM](https://img.shields.io/badge/NPM-%23CB3837.svg?style=for-the-badge&logo=npm&logoColor=white) | Librería | Gestor de paquetes |
| ![MySQL](https://img.shields.io/badge/mysql-%2300f.svg?style=for-the-badge&logo=mysql&logoColor=white) | Gestión de bases de datos | Bases de datos |
| ![Figma](https://img.shields.io/badge/Figma-F24E1E?style=for-the-badge&logo=figma&logoColor=white) | Diseño de interfaces | Prototipo |

## Contribuir

Nos plegamos a códigos de conducta estándar de la comunidad de software, entre ellos: [CONTRIBUTING.md](https://gist.github.com/PurpleBooth/b24679402957c63ec426). 

Cualquier persona puede clonar y solicitar pull requests a los administradores de este repo siguiendo esas normas.

## Autores

| [<img src="https://avatars.githubusercontent.com/u/117080944?v=4" width=115><br><sub>Adria Gomez</sub>](https://github.com/adria15gomez) |  [<img src="https://avatars.githubusercontent.com/u/117079546?v=4" width=115><br><sub>Sara Àlvarez</sub>](https://github.com/saralvz) |  [<img src="https://avatars.githubusercontent.com/u/117080861?v=4" width=115><br><sub>Gabriela Fernandez</sub>](https://github.com/gabyfdez90) |  [<img src="https://avatars.githubusercontent.com/u/117080841?v=4" width=115><br><sub>Sharon Infante</sub>](https://github.com/SharonInfante) |  [<img src="https://avatars.githubusercontent.com/u/56439746?s=400&u=4b8b8d51763c41ab43ff7e4cfbd073d8c54aa69b&v=4" width=115><br><sub>Marjane Oliveira</sub>](https://github.com/Marjane506) |
| :---: | :---: | :---: | :---: | :---: |



## Licencia

© CodeReview 2023
