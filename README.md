# GoogleMap Demo

Built with a Postgre DB

## Requirements

- Postgres db running locally, update database section of the .env

## Instructions

- Create the local DB `php artisan migrate`
- Run locally `php artisan serve`

## Caveats / Improvements

- minify js/css in build
- update libraries
- load the markers onto the map
- Display the name next to the existing markers on hover.
- ability to delete an existing POI on the map my clicking it (with confirm dialog 'Are you sure?')
- general styling and layout improvements (mobile testing)
