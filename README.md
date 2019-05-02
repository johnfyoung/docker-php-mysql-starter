# docker-php-mysql-starter

A starter project for a PHP-MySQL app that uses Docker containers.

## Installation

1. Make sure that `docker` and `docker-compose` are installed on your machine.
1. copy `.env.sample` into a file called `.env`
1. Edit `.env` to include your database details. This file is ignored by `git`.
1. From the project root, run `docker-compose up -d --build`

## Usage

* Data
    The database is seeded by `current.sql` in the `build_db` folder. It is sym linked to `seed.sql`. This allows you have multiple versions of the database in there, only using the `.sql` file that is symlinked to.

* Web
    Drop your PHP code into the `src` folder. The database connection details have been fed to the web container as environment variables. You can connect to the `mysql` database like this:

    ```sql
    $mysqli = new mysqli(getenv("DB_HOST"), getenv("DB_USER"), getenv("DB_PASSWORD"),getenv("DB_DATABASE"));
    ```
* Docker
  * To build the containers:

    ```bash
    docker-compose up -d --build
    ```

  * To stop the containers:

    ```bash
    docker-compose stop
    ```

    Databse data is still intact.

  * To start them again:

    ```bash
    docker-compose start
    ```


  * To destroy the containers:
  
    ```bash
    docker-compose down
    ```

    Databse data is destroyed with it. Make sure to back up the data before doing this.
    
## Notes

* To connect to a container by shell:
    `docker exec -it <container name> /bin/bash`