# Laravel API

Laravel API Un pequeño proyecto para crear funciones estándar en la elaboración de un API REST con Laravel 5.3


## Requisitos previos

php: >=5.6.4
composer: >= 2.*

### Instalación

Para su instalaci{on basta seguir los siguientes pasos:

* Clonar el proyecto
```
git clone https://github.com/strikersfran/laravel-api.git
```

* Actualizar dependencias
```
composer update
```

* Crear base de datos y actualizar el archivo .env
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=database
DB_USERNAME=root
DB_PASSWORD=pass
```

* Ejecutar Migraciones
```
php artisan migrate
```

* Ejecutar seeder
```
php artisan db:seed
```

## Autor

* **Francisco Carrión** - *Trabajo Inicial* - [strikersfran](https://github.com/strikersfran)

## Licencia

Este proyecto está licenciado bajo la licencia MIT. Consulte el archivo [Licencia MIT](http://opensource.org/licenses/MIT).
