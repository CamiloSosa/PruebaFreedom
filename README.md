
## INSTALLATION

Before start, be sure you have php 7.4 and mysql installed.

Clone the repo using `git clone https://github.com/CamiloSosa/PruebaFreedom`
enter into the folder using `cd PruebaFreedom`
once inside copy the .env `cp .env.example .env`
run `composer install`
create a new bd in mysql with the name `freedom`
once created run the command `php artisan migrate`
be sure that the configurations variables in .env file must match the credentials in mysql
finally run `php artisan serve` and go to localhost:8000


