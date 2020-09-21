# Currency Calculator

Currency calculator is a PHP project for converting currencies from exchange rates. The project is built based on Symfony 5.

## Installation

Use git to clone the project.

Use the package manager [pip](https://pip.pypa.io/en/stable/) to install foobar.

```bash
git clone https://github.com/vaiosparavaitsis/currency-calculator.git
```

#### Docker

The project is using docker compose to run for development. For the purpose of this project I believe is better to use also the docker that I provide.

You can see instruction on how to install docker and docker-compose [here](https://docs.docker.com/compose/install/)

In the root of the project there is a folder called `docker`. Navigate to this directory and run the following commands:

```bash
docker-compose build
docker-compose up -d
```

When is done and everything is ok run the following:

```bash
docker ps
```

This will show you the status of the containers. If everything is ok all of the containers should be up and running.

This specific project has three containers one for php, nginx and mysql. You can learn more specific things about this LEMP stack, how it's built and technical details in the README inside the docker directory.

#### Composer

Run `composer install` from the root of the project.

#### Hosts

Lastly add to your `/etc/hosts` file the project as a host `127.0.0.1 currency-calculator.local`

#### Fixtures

Also you will need to add some data to the database, I already have a data fixture that you can run. The credentials for the MySQL database are the following if you want to use an IDE:

```
Hostname: 127.0.0.1
Username: root
Password: root
Port: 33062
```

To load the fixture you need to navigate to the `docker` directory from a cli and run:

```bash
docker exec -it php-currency-calculator /bin/sh
```

This will let you inside the php container, then run this command:

```bash
php bin/console doctrine:fixtures:load
```

This will show you a prompt and you can choose `yes`. After that you are all set.

## Usage

Navigate to `http://currency-calculator.local:8080/` in your browser to open the project.

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

## License
[MIT](https://choosealicense.com/licenses/mit/)
