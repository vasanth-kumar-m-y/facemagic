### Introduction

1. Clone or Download the project.
2. Open project folder in your favorite editor and rename .env.example to .env
3. Now edit the .env file cinfiguartion variables like DB_DATABASE, DB_USERNAME, DB_PASSWORD. By           default DB_CONNECTION variable is set to mysql, If you are not using mysql database than change the     DB_CONNECTION to your preferred database.
4. Once done open the terminal and run composer install from the project directory.
5. Generate application key using php artisan key:generate
6. Next run composer dump-autoload
7. Next run migration command php artisan migrate
8. Next run migration command php artisan db:seed
9. We can see list of artisan commands using php artisan list
10. You are ready to go now run php artisan serve to start laravel development server.

If you followed above steps, The project home page will open which says Welcome To FaceMagic.


## Laravel 5.6 Official Documentation
The project is built on laravel 5.6

[Click here for the official documentation](https://laravel.com/)