<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['rollbar'],
    'components' => [
        'errorHandler' => [
            'class' => 'baibaratsky\yii\rollbar\web\ErrorHandler',
            'errorAction' => 'site/error',
        ],
        'request' => [
            'cookieValidationKey' => getenv('COOKIE_VALIDATION_KEY'),
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [

            ],
        ],
        'rollbar' => [
            'class' => 'baibaratsky\yii\rollbar\Rollbar',
            'accessToken' => getenv('ROLLBAR_ACCESS_TOKEN'),
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'log';
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
