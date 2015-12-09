#Qelastic
---

[![Latest Stable Version](https://img.shields.io/badge/laravel-5.1-green.svg)]() [![License MIT](https://img.shields.io/badge/license-MIT-blue.svg)]()



<p align="center">
<img src="https://www.elastic.co/static/img/logo-elastic.png" height="275">
</p>

A Laravel Service Provider push user behavior log or any log to [Aws sqs](https://aws.amazon.com/sqs/).
Using `php artisan queue:listen` to digest the queue and insert data into [elasticsearch](https://www.elastic.co/).




Installation
------------

Install using composer:

```bash
$ composer require liquirice/elasticlog
$ composer install
```

Install manually in `composer.json`:
```php
"require": {
    ...
    "liquirice/qelastic": "~1.0.0"
    ...
},
```

Laravel (optional)
------------------

Add the service provider in `app/config/app.php`:

```php
'providers' => array(
    ...
    Liquirice\Qelastic\QelasticServiceProvider::class,
    ...
)
```

We have already added the Qelastic alias for you:

```php
'aliases' => array(
    ...
    'Qelastic' => 'Liquirice\Qelastic\Facades\Qelastic',
    ...
)
```

Environment setting
------------------
Add the elasticsearch hostname and queue path in `.env`:

```php
...
ELASTICSEARCH_HOST=127.0.0.1:9200
QUEUE_PATH=App\Jobs\Track\UserBehavior
...
```


Basic Usage
-----------

Start by creating an `Qelastic` instance (or use the `Qelastic` Facade if you are using Laravel):


```php
Qelastic::pushToQueue(array(
    'user_id' => '1',
    'action' => 'click',
    'object' => 'event',
    'object_id' => '50786',
    'param' => '{
        "user_name": "admin",
        "email" : "admin@example.com"
    }'
))
```

> **Note:** Test case not yet finish
> 1. Check input data is array or not.
> 2. Test unexpected data insert.
> 3. Check data whether push to queue or not.


## License
Qelastic is licensed under [The MIT License (MIT)](LICENSE).
