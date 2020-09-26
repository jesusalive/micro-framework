# Learning micro-framework
A little php framework for devs :)

Fisrt you need to have installed:
  - Docker
  - docker-compose

The NGINX server is configured to use server_name 'phplocal', you need add this host in your system to use this framework with Docker.
Tutorial: https://gist.github.com/jesusalive/c2e27d0eb7481eef0af59359d8887967
  
After clone this project, enter on app folder and run:
```
composer install
```
Then set your .env file with your config

Come back to main folder and run:
```
docker-compose up -d
```
Enjoy! :)
