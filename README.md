# Infomation
This project serves as a demo, built with Laravel.

## Structure, Related files and folders
The most relevant files for this project and the requirements are located at:

<ul>
    <li>
        Controller: app/Http/Controllers/Api/SendLogController.php
    </li>
    <li>
        Model: app/Models/Api/SendLog.php
    </li>
    <li>
        Database Migrations: database/migrations
    </li>
    <li>
        Database Seeders: database/seeders
    </li>
</ul>

## Installation

<ol>
    <li>
        clone repo to localhost
    </li>
    <li>
        cd to directory
    </li>
    <li>
        run <code>composer install</code>
    </li>
    <li>
        create database and copy details to the .env file:
        <pre>
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE={db_name}
        DB_USERNAME={username}
        DB_PASSWORD={password}
        </pre>
    </li>
    <li>
        run the following command to create project tables in mysql and seed with dummy data
        <code>php artisan demo:install</code>
    </li>
</ol>

## Running the project

After installion you can run <code>php artisan serve</code> and then you can open the page at http://localhost:8000/api/v1/messages-log?date_from=2021-07-07&date_to=2021-10-15 to make sure it is running correctly

## Running the frontend

The frontend is built using Angular and can be found here: https://github.com/ba1948/demo-app-FE
