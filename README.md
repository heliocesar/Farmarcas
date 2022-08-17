## Laravel CRUD API
Basic Laravel CRUD API application

----

### Language & Framework Used:
1. PHP
1. Laravel

### Architecture Used:
1. Laravel 8.x
1. Interface-Repository Pattern
1. Model Based Eloquent Query
1. postman collection file - project root -> farmarcas.postman_collection.json
1. PHP Unit Testing - Some basic unit testing added.

### API List:

##### Colaborador Module
1. [x] Colaborador List
1. [x] Create Colaborador
1. [x] Edit Colaborador
1. [x] View Colaborador
1. [x] Delete Colaborador

##### Salario Module
1. [x] Salario List
1. [x] Create Salario

### How to Run:
1. Clone Project - 

```bash
git clone https://github.com/heliocesar/Farmarcas.git
```
1. Go to the project drectory by `cd Farmarcas` & Run the
2. Create `.env` file & Copy `.env.example` file to `.env` file
3. Create a database called - `farmarcas`.
4. Install composer packages - `composer install`.
5. Now migrate and seed database to complete whole project setup by running this-
``` bash
php artisan migrate:refresh --seed
```
7. Run the server -
``` bash
php artisan serve
```
8. Open Browser - http://127.0.0.1:8000

