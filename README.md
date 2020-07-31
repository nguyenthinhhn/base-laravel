# Account Mapper API

This is the core API of Account Mapper. For the web app
see [rnd/accounts-m-web](https://gitlab.sun-asterisk.com/rnd/accounts-m-web)

## Requirements

Make sure your development enviroment meets the following requirements:

-   PHP 7.2
-   Composer 1.0+
-   Postgres 10
-   Redis

Use [docker](#using-docker) to quickly set up your development environment.

## Using docker

Clone the [docker](https://github.com/sun-asterisk-research/docker-php-development) repository.

```sh
git clone https://github.com/viblo-asia/docker-php-development
```

Create a `services` file and set the following

```sh
cp services.example services
```

```text
mysql
redis
php
web
```

Create a `.env` file and set the following variables:

```sh
cp .env.example .env
```

1. Point `PATH_PHP` to this folder. For example:

    ```env
    PATH_PHP=../api
    ```

2. Point `PATH_WEB` to the web. For example:

    ```env
    PATH_WEB=../web
    ```

3. Set `DOMAIN` and `PORT` to the _domain_ and _post_ you wish to use.
   Your hostname must be of form `ctf.viblo.<anything>`. For example:

    ```env
    DOMAIN=http://am.lc
    PORT=8000
    ```

4. Set the following environment variables. You can tweak it to whatwever you want.

    ```env
    DB_PORT=3306
    DB_DATABASE=am
    DB_USERNAME=am
    DB_PASSWORD=secret
    ```

Run `./project up`

Set the host IP in your `/etc/hosts` file.

```
127.0.0.1       am.lc
```

## Installation

Install dependencies.

```sh
composer install
```

Make a `.env` file.

```sh
cp .env.example .env
```

Change environment variables to fit your needs. Set the following enviroment variables:

```env

```

The hostname is the one you set in your `/etc/hosts` above. The port must match the `PORT` you set above.

## Run Tests

Make a `.env.testing` file and change environment variables to fit your needs.

```sh
cp .env.example .env.testing
```

Run migration on your test database

```sh
php artisan migrate --env=testing
```

### PHPUnit

Run PHPUnit from `vendor` directory.

```sh
vendor/bin/phpunit
```

Test cases are located in `tests` directory. Each test file should cover either
specific library or group of controllers.

Code coverage is only considered for `app` directory.

## Coding style

### PHP CodeSniffer

Use [Framgia](https://github.com/wataridori/framgia-php-codesniffer) standard.

Additional rules:

-   `@param` attribute in PHPDoc and its typehint are followed by two spaces.
-   Class typehints in all documentation blocks MUST contain fully qualified names.
-   In-code documentation blocks for variables are permitted with single-line notations.
-   Negation operator (`!`) is NOT surrounded by spaces.

## Deployment

Make sure your default private key (`~/.ssh/id_rsa`) has access to the server and this repository.
To deploy on staging server (develop branch), run:

```sh
composer deploy staging
```

To deploy on production server (master branch), run:

```sh
composer deploy production
```

## Contribution

Please see the [contribution guide](CONTRIBUTING.md).

### Laravel echo server

Add a new line laravel-echo-server into file modules on the folder docker. Then restart docker
