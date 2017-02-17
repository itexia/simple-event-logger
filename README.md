Yii2 Simple Event Logger.
==================

This component  is a Yii 2 wrapper of Log.

Installation:
------------

The preferred way to install this extension is through composer.

install default by composer:

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
/* change config files */

// /backend/config/main.php
// /frontend/config/main.php

/* edit main section 'bootstrap' */
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

/* edit section 'component' */

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
