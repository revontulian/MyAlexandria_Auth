<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://hovie.com/assets/images/Alexandria.jpg" width="400" alt="Random logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About MyAlexandria

MyAlexandria is a personal digital library app which allows users to keep a list of books (with its title, author, ISBN, genre, etc.) in a public or private manner. Some of the features included:

- Authentication, with login and registration pages.
- Personal shelf, with detailed views available for each of the books listed.
- Form to add books into your shelf.
- Form to edit books in your shelf.
- Capability to delete books from your shelf.

- [Simple, fast routing engine](https://laravel.com/docs/routing).


## Possible next steps

- Develop the capability to add and remove genres from the drop-down list.
- Add filter capabilities.
- Add images to the book entries.
- Polish admin rights assignment policy.

## How to use/pre-requisites to run

- Install Laravel Herd. 
- Clone this repo.
- Open in Visual Studio Code.
- Copy the .env example file using: (Terminal:) cp .env.example .env
- Generate a key using: (Terminal:) php artisan key:generate
- Apply APP_URL=http://MyAlexandria_Auth.test in the .env file.
- Install dependencies:
-     (Terminal:) composer install
-     (Terminal:) npm install
- Run migrations: In Terminal: php artisan migrate
-     Confirm when asked if database.sqlite can be created.
- Open URL in a browser and give it a try.

## Contact

If you'd like to contact me regarding this project, please contact me through github. 
