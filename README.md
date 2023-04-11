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

    git clone https://github.com/PamLemus/csis4495_scholarlink.git
    cd csis4495_scholarlink
    composer install
    cp .env.example .env

Generate an application key

    php artisan key:generate

Then run the migrations:

        php artisan migrate

## Application Execution

Write and execute the command:

    php artisan serve

    npm install

    npm run dev


### Command to process background events/tasks

In a different terminal, write and execute the command:

    php artisan queue:work

### Command to start the WebSockets server

In a different terminal, write and execute the command:

    php artisan websockets:serve

### Lecture Content:

To use the TinyMCE editor, follow these steps:

1. Install the Tiny MCE editor by running the following command: 

        composer require tinymce/tinymce

2. Next, create an account and establish your own src inside the Tiny Script by adding the following code to your HTML file:

        <script src="https://cdn.tiny.cloud/1/cki8x22gmf1i7myn3qqgl36xnyhl8zxerl57qf0ekc1hpa8s/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    This will enable you to use the TinyMCE editor in the project.

### PDF Creation and Configuration with Laravel DomPDF (if needed)

#### Step 1: Install Laravel DomPDF Package

The following steps outline the process of generating PDF files using Laravel DomPDF Package:

1. Install the Laravel DomPDF Package using Composer:

        composer require dompdf/dompdf

2. Install the 'PDF' class by installing the package using Composer:

        composer require barryvdh/laravel-dompdf

3. Add the following line to the 'providers' array in the 'config/app.php' file:

        Barryvdh\DomPDF\ServiceProvider::class,

4. Also, we need to add the following line to the aliases array in the same file:

        'PDF' => Barryvdh\DomPDF\Facade::class,

5. Run the following command to publish the configuration file for the package:

        php artisan vendor:publish --provider="Barryvdh\DomPDF\ServiceProvider"

    This command will create a dompdf.php file in the config directory, which you can modify to change the package's behavior.

### Sending PDF as Email Attachment
  
Create a new Mailable class

Run the following command to create a new Mailable class:

    php artisan make:mail NotesEmail