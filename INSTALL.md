## Installation Step by Step

-   Download or Clone this repository using command.

    ```
    $ git clone https://github.com/ariefid/learning-basic-laravel
    ```

-   Change directory to this repository.

    ```
    $ cd learning-basic-laravel
    ```

-   Run composer install.

    ```
    $ composer install
    ```

-   Copy file .env.example to .env using command.

    ```
    $ cp .env.example .env
    ```

-   Generate key using command.

    ```
    $ php artisan key:generate --ansi
    ```

-   Change database connection in file .env using your database configuration. Below is example default database configuration.

    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=laravel
    DB_USERNAME=root
    DB_PASSWORD=
    ```

-   Run migrate command.

    ```
    $ php artisan migrate:fresh --seed
    ```

-   Run npm install to install node packages.

    ```
    $ npm install
    ```

-   Run command for vite module.

    ```
    $ npm run dev
    ```

-   Open new terminal again and point to this clone directory then run artisan serve commmand to launch php development server.

    ```
    $ php artisan serve
    ```

-   Open your browser and browse url [http://localhost:8000](http://localhost:8000).

## User Login Information

You can use default user from migration seeder to login dashboard.

```
-   Username : arief
-   Password : Password123!@#
```
