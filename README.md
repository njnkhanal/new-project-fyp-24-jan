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

# make controller

`php artisan make:controller AdminController`

# laravel crud

pattern (MVC)

1. make model with its controller, migration and conroller resources
   `php artisan make:model Category -mcr`
   `php artisan make:controller UserController -r` // to make controller
   `php artisan make:migration create_model_table` // to make migration

# Queue

`php artisan queue:table`
// make queue job for contact form
`php artisan make:job SendContactEmailJob`

\*\* need to run queue work
`php artisan queue:work`
