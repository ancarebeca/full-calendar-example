How to use full calendar bundle
====================

* Installation
```bash
composer install
```

* Configure your database
```yaml
parameters:
    database_host: 127.0.0.1
    database_port: null
    database_name: mycalendar
    database_user: root
    database_password: null
```

```bash
php bin/console doctrine:database:create
php bin/console doctrine:schema:update --force
```

* Load data example 
```bash
php bin/console doctrine:fixtures:load
```

* Run the example 
```bash
php bin/console server:run
```