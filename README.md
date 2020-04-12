# Vue SPA & Laravel API demo app with Docker

A simple CRUD (create, read, update and delete) in a Single-Page Application with Vue on frontend and a Laravel API on backend. 

## App overview
For this CRUD demo porpouse, was built a simple personal virtual library, that contains registration of authors and books with some reading details to track the progress.


## Technologies
Project is created with:
* PHP, version: 7.2
* Laravel, version: 7.0
* Vue, version: 2.6
* Docker, version: 19.03
* Docker compose, version 1.21    
* SQLite3 database

## Run

First, make shure you have [Docker](https://docs.docker.com/) and [Docker Composer](https://docs.docker.com/compose/install/) installed.

Clone the repository

    git clone https://github.com/facfelipe/laravel-vue-demo-spa.git

Change directory

    cd laravel-vue-demo-spa

Build and run the Docker containers. You may need run the command with `sudo`

    docker-compose up -d    

Once finished, enter into the Docker container

    docker exec -it laravel-crud-php-fpm /bin/bash

    
Install Laravel dependencies

    composer install


After the instalation ends, you can exit the docker container
    
    exit

Grant write permissions in the database file

    cd src
    sudo chmod 777 database/database.sqlite    

At this point, you should be able to visit the app URL on the browser at http://localhost:8888

When you want to stop the containers run `docker-compose kill`, and if you want to remove them run `docker-compose rm`

### Run outside docker enviroment
    
Maybe you have a laravel enviroment already and want to run the project without Docker, to do this you need to change the key `DB_DATABASE` value in `.env` to absolute path to the database file. Just make shure you have php-sqlite3 library in your enviroment.

Install the project dependencies, make sure you are inside the src/ directory

    
    composer install

After, you can start the Laravel development server so you can acess the app at http://localhost:8888, by running this following command
    
    php artisan serve --port=8888

