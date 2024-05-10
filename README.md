## Grocito Assignmet App

Laravel Version: 11.0

# Steps to setup
Get inside your working directory (Like htdocs in xampp)
Run this command in terminal: 
git clone https://github.com/DEV-ANSH-1121/Grocito-city-state-management

After successfull cloning of the project, run the following command:
composer update
cp .env.example .env
php artisan key:generate

## Database Setup
Create a database named "grocito_assignment"
Run Following Commands:
php artisan migrate
php artisan db:seed

Finally open any terminal and navigate to this project and run this commands:
Terminal 1: php artisan serve


## About App
This app contains normal CRUD operation to manage users, state, city, pin codes.


## Site Flow
Landing Page of this application will take you to User Module (CRUD).
Sidebar has options for managing following modules:
State Management (CRUD)
City Management (CRUD)
Pin Code Management (CRUD)


