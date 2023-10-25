#   Process

##  Creation Project
```sh
laravel new spa-inertia
```

## Installation

### Breeze
```sh
composer require laravel/breeze --dev
```


####    Install packages
#####   VUE
```sh
php artisan breeze:install vue
```
#####   NPM
```sh
npm install
```
#####   Bootstrap & Sweetalert2
```sh
npm i bootstrap @fortawesome/fontawesome-free sweetalert2
```


##  Model Class
```sh
php artisan make:model Songs -mcr -a -mcrf
```

##  Migrations
```sh
php artisan migrate --seed
```

##  RUN
```sh
npm run dev
```