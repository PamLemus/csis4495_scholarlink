# CSIS 4496 Scholar Link Project

Development of a sample chat application using the Laravel PHP framework and WebSockets.

## Version Requirements
- Laravel: 10

## Libraries and Tools Used
- Laravel WebSockets by BeyondCode - version 1.14
- Laravel Pusher Notifications - version 7.2
- Vue Js - version 2.6.4
- JQuery - version 3.6.3
- Pusher JavaScript library for the browser - version 8.0.1
- Bootstrap Framework - version 5.0

## Application Installation

First, clone this repository, install the dependencies, and configure your .env file.

    https://github.com/PamLemus/csis4495_scholarlink.git
    cd csis4495_scholarlink
    php composer install
    cp .env.example .env

- Then run the migrations:

        php artisan migrate

## Application Execution

Write and execute the command:

    php artisan serve

### Command to process background events/tasks

In a different terminal, write and execute the command:

    php artisan queue:work

### Command to start the WebSockets server

In a different terminal, write and execute the command:

    php artisan websockets:serve

