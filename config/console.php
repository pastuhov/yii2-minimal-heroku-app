<?php

Yii::setAlias('@tests', dirname(__DIR__) . '/tests/codeception');

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['rollbar'],
    'controllerNamespace' => 'app\commands',
    'components' => [
        'errorHandler' => [
           'class' => 'baibaratsky\yii\rollbar\console\ErrorHandler',
        ],    
        'rollbar' => [
            'class' => 'baibaratsky\yii\rollbar\Rollbar',
            'accessToken' => getenv('ROLLBAR_ACCESS_TOKEN'),
        ],        
    ],
    'params' => $params,
    /*
    'controllerMap' => [
        'fixture' => [ // Fixture generation command line.
            'class' => 'yii\faker\FixtureController',
        ],
    ],
    */
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'log';
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
