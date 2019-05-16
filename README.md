# E-commerce online market template
This project implements basic online market with a categories of products and a
cart.

## Details
This setup contains Laravel 5.7.*(check in composer.json) and React 16.8.6(check in package.json)

The source files for React are located in the /src folder.

## Setup

Follow this guide to setup project:

1. Clone repo
2. Install composer: https://getcomposer.org/download/
3. Setup the environment as you need basing on .env.example
4. Run `npm install`
5. Run `php composer.phar install && php composer.phar update`

Your project is now ready to be served.

## Compile React
Use the command ```npm start``` to compile react.

This setup makes use of HMR so the App will be updated whenever you make changes to the react/javascript files

## Start Laravel
You can start up your php server with ```php artisan serve``` then go to http://localhost:8000 on your browser

Note: Make sure you run ```npm start``` before firing up your php development server so that laravel can have access to the compiled react/javascript files.

When your app is ready for deployment, run ```npm run build``` and change APP_ENV in your env file to 'production'. Laravel will now read the built version of your react app and can be deployed to a server together with the app.js file in the /public/js/ folder.
