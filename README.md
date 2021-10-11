# Sistema de transacciones bancarias en línea

----------

# Getting started

## Installation

Clone the repository

    git clone git@github.com:delvaleng/banks-sys.git

Switch to the repo folder

    cd banks-sys

Generate the database with the name (bank-sys)

    CREATE DATABASE `prueba_gloribel`

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Run the database seeder

    php artisan db:seed

Start the local development server

    php artisan serve


# Testing API

Run the laravel development server

    php artisan serve

User:

        Email       -> delgadogloribelv@gmail.com
        Contraseña  -> 21255894


# Developer

    Gloribel Delgado,
    Ingeniero de Sistemas
