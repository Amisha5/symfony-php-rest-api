# symfony-php-rest-api
Implement CRUD Functionality using Symfony Framework
Basic crud (create,delete ,update and read ) functionality is covered in symphony PHP.

## Prerequisites for creating symfony php project - Lab Setup
1. For windows WAMP or XAMPP server, for Mac MAMP server, or for Linux LAMP server
Note: PHP Version 8.2 or later

2. Composer any version is fine.
   [composer-setup](https://getcomposer.org/download/)

3. Symfony Framework version latest version 7
  [Symfony-Framework](https://symfony.com/doc/current/setup.html)

Technologies :

[![My Skills](https://skillicons.dev/icons?i=php,symfony)](https://skillicons.dev)

## Steps to create symfony project in PHP

### 1: Create project in Symfony. Run below command
   composer create-project symfony/skeleton:"7.0.*" symfony-rest-api
   
------------------------------------------------------------------------
### 2: Go inside symfony-rest-api project and Install below packages from terminal
   composer require doctrine/orm symfony/maker-bundle doctrine/doctrine-migrations-bundle symfony/serializer symfony/serializer-pack
   
------------------------------------------------------------------------
### 3: Configure Databse, .env file inside your symfony-rest-api project folder
   DATABASE_URL="postgresql://app:!ChangeMe!@127.0.0.1:5432/app?serverVersion=16&charset=utf8"
   
   Replace above line by below line if you are using mysql data. make sure your port is correct and database created(symfony-rest-api).
   
   DATABASE_URL="mysql://root:root@127.0.0.1:8889/symfony-rest-api"
   
------------------------------------------------------------------------
### 4: Create an Entity 
   Create database called symfony-rest-api if not created and run below command
   
   **php bin/console make:entity User**
   ex: id , name ,email ,password
   
------------------------------------------------------------------------
### 5: Migrate entity to database
   **php bin/console make:migration**
   
   **php bin/console doctrine:migration:migrate**
   
------------------------------------------------------------------------
### 6: Implement Controller Actions 
   **php bin/console make:controller UserController**
   
------------------------------------------------------------------------
### 7: Define API Routes 
   Config ->routes -> routes.yaml (define your url)
   All routing url must be defined inside this routes.yaml file
   
------------------------------------------------------------------------
### 8: Run the Application
Go inside public folder and run-

   **php -S localhost:8000**
   
------------------------------------------------------------------------
### 9: Test API using Postman 
ex: GET

Note: only 2 major files changes required to create crud application 
1. UserController.php (for calling api using route url to perform crud operation)
2. routes.yaml (defined url's to route for different different crud functionality)
------------------
GET http://localhost:8000/api/users -> Return all users.

GET http://localhost:8000/api/users/{findByIdUser} -> Retrieves user by user Id.



