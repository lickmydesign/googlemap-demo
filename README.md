# GoogleMap Demo

Built with a Postgre DB

## Requirements

- Postgres db running locally, update database section of the .env

## Instructions

- edit the `resources/js/app.js` file, paste the key I have sent over `PASTE_GOOGLE_MAPS_KEY_HERE` 
- install vendor libraries with `composer install`, `npm install`
- Create the local DB `php artisan migrate`
- Run the tests with `php artisan test`
- Run locally `php artisan serve`

## Caveats / Improvements

- load the markers onto the map
- minify js/css in build
- update libraries
- Display the name next to the existing markers on hover.
- ability to delete an existing POI on the map my clicking it (with confirm dialog 'Are you sure?')
- general styling and layout improvements (mobile testing)
- move the Google API key to the .env