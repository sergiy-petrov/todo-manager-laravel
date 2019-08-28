**Prerequisites**

In order to run this project you must have docker and docker-compose installed.

**Installation**

1 Clone this repository together with laradock submodule
`git clone --recursive git@github.com:Sergo96/todo-manager-laravel.git`

2 Go to laradock folder in the root of the project
`cd todo-manager-laravel/laradock-task-manager`

3 Copy .env
`cp env-example .env`

4 Change version of MySQL in .env to 5.7
replace `MYSQL_VERSION=latest` with `MYSQL_VERSION=5.7`

5 Go back to project root folder (`cd ../`) and run

`cp .env.example .env`

`composer install`

`php artisan key:generate`


6 Go back to laradock folder and start docker-compose

`cd laradock-task-manager`

`docker-compose up -d nginx mysql`

7 Run migrations and seeds

`docker-compose exec workspace php artisan migrate`

`docker-compose exec workspace php artisan db:seed`

8 Open http://localhost and use this credentials to login

email: admin@todo.loc

password: password
