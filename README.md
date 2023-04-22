<p align="center"><img src="public\img\codereview.png" width="600" alt="CodeReview Logo"></p>

# Description

The purpose of this project is to encourage students to advance in their knowledge. To achieve this, we have developed an app that allows each student to assess themselves and their classmates. Teachers can also manage student evaluations by creating, editing, and deleting promotions.

## Feature

* Student registration
* Evaluation assignment
* Co-evaluation among students within the same group
* Report generation
* Teacher administration, including promotion creation, editing, and deletion
* Student administration, including promotion creation, editing, and deletion

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

* PHP 8 or higher
* Laravel 10 or higher
* Web server (Apache or Nginx)
* MySQL or PostgreSQL database
* Tailwind CSS
* Flowbite


### Installing

1. Clone the repository.
2. Navigate to the project folder using the command line.
3. Install the required dependencies using Composer: _composer install_
4. Copy the `.env.example` file to `.env`:cp .env.example .env
5. Generate a new application key: _php artisan key:generate_
6. Configure the database settings in the `.env` file.

7. Run the database migrations:php artisan migrate
8. Install Tailwind CSS and Flowbite:
   * npm install tailwindcss
   * npm install flowbite

 9. Build the CSS file:npx tailwindcss -o public/css/app.css
 10. Start the development server:php artisan serve
 After completing these steps, you should be able to access the application in your web browser at `http://localhost:8000`.

## App

![Android Emulator](https://github.com/adria15gomez/codeReview/blob/main/mobile.gif)


## Running the tests

Explain how to run the automated tests for this system

### Break down into end to end tests

Explain what these tests test and why

```
Give an example
```

### And coding style tests

Explain what these tests test and why

```
Give an example
```

## Deployment

Add additional notes about how to deploy this on a live system

## Built With

| Tech | Type | Use |
| --- | --- | --- |
| ![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white) | Language | Backend |
| ![HTML5](https://img.shields.io/badge/html5-%23E34F26.svg?style=for-the-badge&logo=html5&logoColor=white) | Language | Frontend |
| ![CSS3](https://img.shields.io/badge/css3-%231572B6.svg?style=for-the-badge&logo=css3&logoColor=white) | Language | Frontend |
| ![Laravel](https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white) | Framework | Frontend and Backend |
| ![Tailwind](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white) | Library | Frontend |
| ![NPM](https://img.shields.io/badge/NPM-%23CB3837.svg?style=for-the-badge&logo=npm&logoColor=white) | Library | Package Manager |
| ![MySQL](https://img.shields.io/badge/mysql-%2300f.svg?style=for-the-badge&logo=mysql&logoColor=white) | Database Management System | Database |
| ![Figma](https://img.shields.io/badge/Figma-F24E1E?style=for-the-badge&logo=figma&logoColor=white) | Design Software | Prototype |

## Contributing

Please read [CONTRIBUTING.md](https://gist.github.com/PurpleBooth/b24679402957c63ec426) for details on our code of conduct, and the process for submitting pull requests to us.


## Authors

| [<img src="https://avatars.githubusercontent.com/u/117080944?v=4" width=115><br><sub>Adria Gomez</sub>](https://github.com/adria15gomez) |  [<img src="https://avatars.githubusercontent.com/u/117079546?v=4" width=115><br><sub>Sara Àlvarez</sub>](https://github.com/saralvz) |  [<img src="https://avatars.githubusercontent.com/u/117080861?v=4" width=115><br><sub>Gabriela Fernandez</sub>](https://github.com/gabyfdez90) |  [<img src="https://avatars.githubusercontent.com/u/117080841?v=4" width=115><br><sub>Sharon Infante</sub>](https://github.com/SharonInfante) |  [<img src="https://avatars.githubusercontent.com/u/56439746?s=400&u=4b8b8d51763c41ab43ff7e4cfbd073d8c54aa69b&v=4" width=115><br><sub>Marjane Oliveira</sub>](https://github.com/Marjane506) |
| :---: | :---: | :---: | :---: | :---: |



## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details
