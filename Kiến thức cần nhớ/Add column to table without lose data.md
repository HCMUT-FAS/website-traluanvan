https://stackoverflow.com/questions/39934276/laravel-5-2-how-to-update-migration-without-losing-data

Create new migration

`php artisan make:migration <filename> --table=<table-name>`

For instance:

`php artisan make:migration add_api_token_columns_to_users_table --table=users`

edit new column in <filename>

then run `php artisan migrate`