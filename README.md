
# Steps to run app
- clone this repository
- run command: composer install
- run command: cp .env.example .env
- specify database name in .env 'pokemon'
- create database 'pokemon'(mysql)
- import pokemon.csv file to new 'pokemon' table
- run command: php artisan migrate --seed
- run command: php artisan serve
# Credential(duplicated on login page)
login: admin@admin.com 
password: 12345678;
# View
http://127.0.0.1:8000/pokemon
# Api
http://127.0.0.1:8000/pokemon
# Explanation
- Everytyhing(api,crud with views) was generated from existing 'pokemon' table through infyorm and adminLTE  packages
