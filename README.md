<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


# CRUD DISYS BACKEND IN LARAVEL 8

## Installation

1.  Clone the project on your machine

```shell
git clone git@github.com:dhikernel/disys-back-end.git
```
2. If you are going to use Docker, install docker, create a virtual host, configure your hosts file, you can do these settings if you are going to use apache as well.

2.1 If you are going to use docker go to step => 12

3.  Install composer

composer install. If you still don't have composer installed, just go to the site:
```shell
https://getcomposer.org
```

4.  Configure your file .env execute the command to create a copy of your .env.example para .env
```shell
cp .env.example .env
```
// Configure environment variables according to your database.

4.1 Generate laravel encryption key
```shell
php artisan key:generate
```

5. Migrate the tables to your database using the command

```shell
php artisan migrate
```
6. Inside the tests directory are the files GET.http, POST.http, PUT.http, DELETE.http. To make requests, you must have the VsCode Rest Client plugin installed. Alternatively, PostMan or Insomnia can be used.

7. run laravel embedded server

```shell
php artisan serve
```
8. To run the tests use the command

```shell
php artisan test
```

Or to filter a class

```shell
php artisan test --filter OrderControllerTest
```
Or to filter a method

```shell
php artisan test --filter OrderControllerTest::testStore
```
9. To run the factory clients use the command

```shell
php artisan db:seed
```
10. to send the request it is necessary to generate a token through the login route passing email and password

## api/auth/login

11. For sending email I used mailtrap, configure the environment variables

```shell
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=977accd1ca0fd4
MAIL_PASSWORD=9bd188706521a1
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=youremail@gmail.com
MAIL_FROM_NAME="${APP_NAME}"
```
12. About the docker implementation added to the project

12.1 run the command in the root directory of the project:

```shell
docker compose build --no-cache
```
to build PHP, Nginx and Mysql images

12.2 After finishing building the images, run the command:

```shell
docker compose up -d
```
to upload project containers

12.3 After lifting the infrastructure, run:

```shell
docker compose exec app bash
```
to enter the application container

12.4 Inside the container run the command:

```shell
composer install
```
12.5 to access the MySQL database run the command:

```shell
docker compose exec db bash
```

inside the container you will be able to access the mysql database example:
```shell
mysql -h localhost -u root -p
```
password: root

You can configure a client too.

13 to run the project go to 

```shell
http://localhost:8989
```
