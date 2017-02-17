Yii2 Simple Event Logger.
==================

This component  is a Yii 2 wrapper of Log.

Installation
------------

The preferred way to install this extension is through composer.

Either run
1) install default by composer:
```
php composer.phar require --prefer-dist frmaxm/simple-event-log "dev-master"
```
or add
```
"frmaxm/simple-event-log": "dev-master"
```
to the require section of your composer.json file.

Usage:
------

```php
// /backend/config/main.php
// /frontend/config/main.php


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

// Section Component

'log' => [
    'traceLevel' => YII_DEBUG ? 3 : 0,
    'targets' => [
        [
            'class' => 'yii\log\DbTarget',
            'categories' => ['model.*'],
        ],
    ],
]
```php
