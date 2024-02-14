The main page of the site and tables in the database, added a seed in the project for the database for the user and for the administrator:
admin@gmail.com | user@gmail.com
admin           | user
![image-4](https://github.com/s7inner/LaravelLoginSystem/assets/62800741/6758b920-04ff-4865-abed-97216697411b)

For the administrator, a dashboard page is available with user output from the database. On the authorization page, there is validation for an incorrect password and entering non-existent data:
![image-5](https://github.com/s7inner/LaravelLoginSystem/assets/62800741/367b1687-f333-4564-a41d-7903176b50b3)

Start-up instructions:

1.Run git clone <my-cool-project>
2.Run composer install (or composer update)
3.Run cp .env.example .env
4.Run php artisan key:generate
5.Run php artisan migrate
6. php artisan db:seed —class=UsersTableSeeder  (Optional)
7.Run php artisan serve
8.Go to link localhost:8000

To start you need:
- php
- mysql
- xampp (php + mysql) - included in it
- composer
