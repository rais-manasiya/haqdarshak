# Laravel application to list data

> ### Laravel + MySQL codebase containing examples (auth, data listing, advanced patterns, validation, etc).

This codebase was created to list data with the filter **Laravel + MySQL**, including liting data, routing,validation and more.

Hope you'll find this example helpful. Pull requests are welcome!

----------

# Getting started

## Installation

Please check the official Lumen installation guide for server requirements before you start. [Official Documentation](https://lumen.laravel.com/docs/8.x/installation)


Clone the repository

    git clone https://github.com/rais-manasiya/haqdarshak.git

Switch to the repo folder

    cd haqdarshak

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate


Run the database migrations (** Create database, upload .sql file then Set the database connection in .env before starting server**)

Start the local development server or open http://localhost/haqdarshak/public/login link directly to the broswer

    php -S localhost:8000 -t public

You can now access the server at http://localhost:8000

**TL;DR command list**

    git clone https://github.com/rais-manasiya/haqdarshak.git
    cd haqdarshak
    composer install
    cp .env.example .env
    php artisan key:generate
    
**Make sure you set the correct database connection information before running the server** [Environment variables](#environment-variables)

    php -S localhost:8000 -t public

***Note*** : iport data to the database, .sql file can fe found in demo-data directory

## Folders

- `app` - Contains all the Eloquent models
- `app/Http/Controllers` - Contains all the api controllers
- `app/Providers` - Contains all the service providers
- `config` - Contains all the application configuration files
- `routes` - Contains all the api routes defined in web.php file

## Environment variables

- `.env` - Environment variables can be set in this file

***Note*** : You can quickly set the database information and other variables in this file and have the application fully working.

----------

# Testing an Aplication

Run the laravel development server

    php -S localhost:8000 -t public

The api can now be accessed at

    http://localhost:8000
    
### API Routes
| Path | Action | Scope | Desciption  |
| ----- | ----- | ---- |------------- |
| /login | auth | users:authenticate | Authenticate to begin with 
| /beneficiaries | show | beneficiaries:beneficiaries | Get all beneficiaries

### Application Usage

Credentials for login : email=rais@example.com password=123456789

    http://localhost:8000/login
    
    email=rais@example.com 
    password=123456789
 
To fetch all participants

    GET http://localhost:8000/beneficiaries
   
