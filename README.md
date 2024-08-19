

## Project Info

URL shorten is a simple example of a URL shortening app. It is designed with Laravel's Jetstream and Inertia with Vue. This simple example consists of three sections: Dashboard, with a pie graph showing the clicks count about top 5 URLs; Urls, this section list into a table the urls management; Add Url Shortened, this is the section where URLs are added and shortened.

Since it is a simple exercise, the CSS styles are not centralized and it has been decided to apply them within the view, although it is not a recommended practice.

You need to authenticate or register to access the app, it´s too easy in two steps.

## Loading the project

### 1 Development Environment Configuration

Minimum requirements:

Composer 2.7.7

PHP version 8.1.26

npm 10.8.1

Install and load on the local server a mysql service.


### 2 Project Configuration

We enter our project and run it in the terminal:

npm install

composer install


We edit the .env file of our project:

APP_NAME=UrlShorten

APP_ENV=local

APP_KEY=base64:doeFBS+rW7UptfwnqnkLxGOZZmv2zlKYVmcgwL1yuOQ=

APP_DEBUG=true

APP_URL=http://localhost:8000/


LOG_CHANNEL=stack

LOG_DEPRECATIONS_CHANNEL=null

LOG_LEVEL=debug


DB_CONNECTION=mysql

DB_HOST=127.0.0.1

DB_PORT=3306

DB_DATABASE=url_shortener

DB_USERNAME=root

DB_PASSWORD=


### 3 Database Migration

php artisan migrate

### 4 Construction and execution of the project

npm run build

npm run dev

php artisan serve



According to this example, our project is loaded at http://localhost:8000/.


## Views

![1](https://github.com/user-attachments/assets/aaaff4da-f9b3-440f-b18b-2f113754985b)

![2](https://github.com/user-attachments/assets/f86538d4-4dc6-4c19-a959-02c15a2392d4)

![3](https://github.com/user-attachments/assets/29aee52f-5e2e-493f-8f81-06fba0bdec48)

