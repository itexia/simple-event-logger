Yii2 Simple Event Logger.
==================
This component  is a Yii 2 wrapper of Log.

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist frmaxm/simple-event-log "dev-master"
```

or add

```
"frmaxm/simple-event-log": "dev-master"
```

to the require section of your `composer.json` file.

Configuration
-------------

Edit `bootstrap` section in your application config file:

```php
'bootstrap' => [
    'model_log'=>[
        'class'=>'frmaxm\simple-event-log\ModelLogBootstrap',
        'category'=>'admin',
    ],
    'log'=>[
        'class'=>'yii\log\Logger',
        'flushInterval' => 50,
    ],
]
```

Edit `log` component in your application config file:

```php
'log' => [
    'traceLevel' => YII_DEBUG ? 3 : 0,
    'targets' => [
        [
            'class' => 'yii\log\DbTarget',
            'categories' => ['model.*'],
        ],
    ],
]
```

Add new table `EventLog` to your database.

Usage
-----

Run module migration:

```php
php yii migrate --migrationPath=@frmaxm/logger/migrations
```

Info
----


