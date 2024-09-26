## IN PROGRESS

This is breeze starter kit created by Puthea Khem using Livewire Volt and Livewire Flux.

## Setup

### Clone this repository

```bash 
git clone git@github.com:putheakhem/flux-breeze.git
```
### Install Dependencies

First, install the PHP dependencies:

```bash
composer install
```

Next, install the frontend dependencies:

```bash
npm install
```

### Create a .env file

Copy the `.env.example` file to `.env` and update the values to match your local environment.

```bash
cp .env.example .env
```

### Generate app key

Run the following command to generate a new app key:

```bash
php artisan key:generate
```

### Run migrations

To run the migrations, run the following command:

```bash
php artisan migrate
```

### Run the server

To run the server, run the following command:

```bash
php artisan serve
```

### Compile assets during development

```bash
npm run dev
```

#### Compile assets for production

```bash
npm run build
```

You should now be able to view the site at http://localhost:8000.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
