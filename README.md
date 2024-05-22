### symfony-php-rest-api
Implement CRUD Functionality using Symfony Framework

### Prerequisites for creating symfony php project - Lab Setup
1. For windows WAMP or XAMPP server, for Mac MAMP server, or for Linux LAMP server
Note: PHP Version 8.2 or later

2. Composer any version is fine.
   [composer-setup](https://getcomposer.org/download/)

3. Symfony Framework version latest version 7
  [Symfony-Framework](https://symfony.com/doc/current/setup.html)


### Steps to create symfony project in PHP
--------------------------------------------------------------------------------------------------------------------------------------
## 1: Create project in Symfony. Run below command
composer create-project symfony/skeleton:"7.0.*" symfony-rest-api
 
## 2: Go inside symfony-rest-api project and Install below packages from terminal
composer require doctrine/orm symfony/maker-bundle doctrine/doctrine-migrations-bundle symfony/serializer symfony/serializer-pack
 
## 3: Configure Databse, .env file inside your symfony-rest-api project folder
DATABASE_URL="postgresql://app:!ChangeMe!@127.0.0.1:5432/app?serverVersion=16&charset=utf8"
replace above line if you are using mysql. make sure your port and database created 
DATABASE_URL="mysql://root:root@127.0.0.1:8889/symfony-rest-api"
               
## 4: Create an Entity 
Create database called symfony-rest-api if not created and run below command
php bin/console make:entity User
id , name ,email ,password
 
## 5: Migrate entity to database
php bin/console make:migration
php bin/console doctrine:migration:migrate

## 6: Implement Controller Actions 
php bin/console make:controller UserController

## 7 Define API Routes 
Config ->routes -> routes.yaml (define your url)

## Step 8: Run the Application
Go inside public folder and run-
php -S localhost:8000

## 9: Test API using Postman 
ex: GET
------------------
GET http://localhost:8000/api/users -> Return all users
GET http://localhost:8000/api/users/{findByIdUser} -> Retrieves user by user Id.


