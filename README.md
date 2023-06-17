# GoogleMap Demo

Built with a Postgre DB

## Requirements

- a db server (I used PostgreSQL called `googlemap-demo`)
- composer
- npm
- laravel

## Instructions

- make a copy of `.env.example` file called `.env`... 
  - update the database section, 
  - paste the Google API key I sent separately over `PASTE_KEY_HERE` at the bottom of the file 
- install vendor libraries with `composer install`, `npm install`
- Create the local DB `php artisan migrate`
- Run the tests with `php artisan test`
- Run locally `php artisan serve`

## Caveats / Improvements

- update libraries
- minify js/css in build
- Display the name next to the existing markers on hover/click.
- move the locations data call for the existing pois to the api (return as json, via async)
- general styling and layout improvements (mobile testing)
