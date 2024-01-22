# install laravel project

`composer create-project laravel/laravel --prefer-dist project-name`

# use authentication (login / register)

1. install ui package
   `composer require laravel/ui`
2. use ui:auth
   `php artisan ui:auth`

# run the project

`php artisan serve`

# database + migration

for migrate:
`php artisan migrate`
for rollback:
`php artisan migrate:rollback` after rollback must migrate again
