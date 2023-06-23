# Personal Notes API

Welcome to my personal notes API. This project is only to show recruiters my skills on creating APIs.

## Installing instructions

First things first. Create a database.sqlite inside the database/ directory located at the root of your project.

Then, open the .env file and change the database configuration to

    DB_CONNECTION=sqlite
    DB_DATABASE=/absolute/path/personal-notes-sanctum-api/database.sqlite
    DB_FOREIGN_KEYS=true

Don't forget to change */absolute/path* to the path where you cloned this project. Open the 

Then, run the commands bellow to create the database tables, in addition a default user Guest is created in the process 

    php artisan migrate

    php artisan db:seed

Now you can run the built-in server

    php artisan serve

to access your API in the URI **http://127.0.0.1/api**.

## Endpoints

Lorem ipsum

### Login default User

Lorem ipsum

### Getting the Access Token