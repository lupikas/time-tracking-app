Install
=============

Clone the git repository on your computer

<b>$ git clone https://github.com/lupikas/time-tracking-app.git</b>

You can also download the entire repository as a zip file and unpack in on your computer if you do not have git

After cloning the application, you need to install it's dependencies.

<b>$ cd Task-Manager-System
$ composer install</b>

=============
Setup
=============

When you are done with installation, copy the .env.example file to .env

<b>$ cp .env.example .env<b>

Connect app with database (edit .env file).

Generate the application key

<b>$php artisan key:generate</b>

Migrate the application

<b>$ php artisan migrate</b>

Run the application

<b>$ php artisan serve</b>
