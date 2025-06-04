# Property Search
* PHP 8.1
* Laravel 10

1. Clone the repo to your computer
1. Do any local setup (not included - I used Laragon on a Windows PC!)
1. Run `php artisan migrate`
1. Run `php artisan db:seed --class=PropertySeeder` to populate the database.

This is a basic example of a property search. Visit / in your browser and try out the filters.

There are also unit tests that can be run in your terminal with `php artisan test`