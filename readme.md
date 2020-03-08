# _Crownstack: Disconut Generation on Basis Of Probability_
---
## Server Requirements

* PHP >= 7.2.*
* OpenSSL PHP Extension
* PDO PHP Extension
* Mbstring PHP Extension
* Tokenizer PHP Extension
* XML PHP Extension
* Ctype PHP Extension
* JSON PHP Extension

## Things covered

* Laravel 6 Setup
* Rest API Creation
* Database Migrations
* Batch Insert

## Getting this up and running

### 1. _Cloning the project_
* CD into your working directory
* Open Terminal and run : git clone https://github.com/ascodelab/Team-Crownstack
* cd Team-Crownstack
### 2. Installing Laravel
* composer install
### 3. Installing frontend dependencies 
* npm install
* npm run dev
### 4. Configuration
edit .env and set database credentials ( Create database named crownstack)

    DB_DATABASE=crownstack
    DB_USERNAME=anil
    DB_PASSWORD=123456
### 5. Migrating Database using below command

    $ php artisan migrate

### 6. Run Laravel application

    $ php artisan serve


### 7. APIs

1. Seeding : insert discount values into database

        GET /api/discount/seed HTTP/1.1
        Host: localhost:8000
        Cache-Control: no-cache
        Postman-Token: 8d8ac7e5-1052-e65b-18c3-c172115e75db

2. Creating Customer and Generating Discount value

        POST /api/customer/signup HTTP/1.1
        Host: localhost:8000
        Content-Type: application/x-www-form-urlencoded
        Cache-Control: no-cache
        Postman-Token: b80e8a26-c6c2-0aa3-1f3d-5f8514bdc97f

        name=anil&email=anela.kumar%40gmail.comdfe&phone=8860327244





