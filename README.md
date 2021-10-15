# Infomation
This project serves as a demo.

## Structure
This project has 
## Related files and folders

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
        run the following command to create project tables in mysql and seed with dummy data<code>php artisan demo:install</code>
    </li>
</ol>

## Running the project

After installion you can run <code>php artisan serve</code> and then you can open the page at http://localhost:8000/api/v1/messages-log?date_from=2021-07-07&date_to=2021-10-15 to make sure it is running correctly
