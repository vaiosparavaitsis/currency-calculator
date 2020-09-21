# Docker Compose - LEMP Stack

Basic LEMP stack environment built using Docker Compose. It consists following:

* PHP 7.3.6-fpm-alpine3.9
* Nginx 1.17.0-alpine
* MySQL 5.7

## Installation

Clone this repository on your local computer and switch to branch `7.3.x`.
Run `docker-compose build` and then run `docker-compose up -d`.

```shell
git clone https://vaiosps@bitbucket.org/vaiospsofficial/docker-compose-lamp.git
cd docker-compose-lamp/
git fetch --all
git checkout 7.3.x
docker-compose build
docker-compose up -d
```

Your LEMP stack is now ready!! You can access it via `http://localhost:8080`.

## Configuration

This package comes with default configuration options. You can modify them by creating the `.env` file in your root directory.

To make it easy, just copy the content from `sample.env` file and update the environment variable values as per your need.

### Configuration Variables

There are the following configuration variables available and you can customize them by overwriting your own `.env` file.

_**PROJECT_NAME**_

This will be used for the name of your project and as a variable for the container names.

_**DOCUMENT_ROOT**_

It is the document root for Apache server. The default value for this is `./www`. All your sites will go here and will be synced automatically.

_**PORT_HTTP_EXTERNAL**_

Default port is `8000`.

_**PORT_SSL_EXTERNAL**_

Default port is `4433`.

_**PORT_PHPMYADMIN_EXTERNAL**_

Default port is `8090`. TODO

_**PORT_REDIS_EXTERNAL**_

Default port is `6379`. TODO

_**PHP_INI**_

This is for custom settings in the server. The default value for this is `./config/php/php.ini`.

_**PROJECT_LOG_DIR**_

Directory where the logs are placed. The default value for this is `./logs/projectname/`. Don't forget to change it to your projectname.

_**MYSQL_LOG_DIR**_

Directory where the MySQL logs are placed. The default value for this is `./logs/mysql`.

_**NGINX_CONF**_

Configuration file for Nginx.

_**NGINX_SITES_DIR**_

Configuration directory for your sites.

_**NGINX_CONFD_DIR**_

Configuration directory for Nginx.

_**NGINX_LOGS_DIR**_

Directory where the Nginx logs are placed. The default value for this is `./logs/nginx`.

_**MYSQL_HOST**_

Name of your docker-compose MySQL container.

_**MYSQL_NAME**_

Name of your MySQL database.

_**MYSQL_USER**_

MySQL username. The default value for this is `root`. 

_**MYSQL_PASSWORD**_

MySQL password. The default value for this is `root`.

_**MYSQL_ROOT_PASSWORD**_

MySQL root password. The default value for this is `root`.

_**MYSQL_DATA_DIR**_

Where MySQL data directory is located. The default value for this is `./data/mysql`.

_**MYSQL_PORT_INTERNAL**_

The MySQL internal port. The default value for this is `3306`.

_**MYSQL_PORT_EXTERNAL**_

The MySQL external port. The default value for this is `33062`.

All the above are the ports that will be used for the different stacks.

## Web Server

Nginx is configured to run on port 8000. So, you can access it via `http://localhost:8000`.

#### Connect via SSH

You can connect to web server using `docker exec` command to perform various operations on it. Use the command below to login to the container via ssh.

```shell
docker exec -it php-projectname /bin/bash
```

## PHP

The installed version of PHP is 7.3.1.

## FPM

To use fpm change in `./config/nginx/conf.d/default.conf` the projectname in this line `server php-projectname:9000;` to your projectname.

#### Packages

By default following packages are installed.

* curl
* git
* imagick
* imagemagick
* icu 
* iconv
* mbstring
* pdo
* tokenizer
* xml
* zip
* intl

and much more.

> If you want to install more packages, just update `./bin/php/Dockerfile`. You can also generate a PR and will merge if seems good for general purpose.
> You have to rebuild the docker image by running `docker-compose build` and restart the docker containers.

## phpMyAdmin

TODO.

## Redis

TODO.