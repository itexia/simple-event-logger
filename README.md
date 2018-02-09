Yii2 Simple Event Logger.
==================
This component  is a Yii 2 wrapper of Log.

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist frmaxm/simple-event-logger "dev-master"
```

or add

```
"frmaxm/simple-event-logger": "dev-master"
```

to the require section of your `composer.json` file.

Configuration
-------------

Edit `bootstrap` section in your application config file:

```php
'bootstrap' => [
    'model_log'=>[
        'class'=>'frmaxm\logger\bootstrap\ModelLogBootstrap',
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
php yii migrate --migrationPath=@frmaxm/simple-event-logger/migrations
```

Info
----
All events on the model will be recorded in the Event Log table.
This will allow you to see all the user's actions.

