## Description 

Project to view some xml feed and parse 10 common English words from Wikipedia with login and register functionality.
Using Laravel 6+ & Vue.js

## Requirements

- [Docker & docker-compose](https://www.docker.com/)
- [node.js](https://nodejs.org/en/)

## Install

- `git clone https://github.com/valetzyzy/rss.git`
- `cd rss`
- `npm i`
- `npm run build`
- `docker-compose up -d`
- `docker exec -it rss_app_1 bash`
- `composer install`
- `cp .env.example .env`
- `php artisan key:generate`
- `php artisan jwt:secret`
- `php artisan migrate`
- Go to [localhost:8035](http://localhost:8035)
