<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'homeUrl' => '/backend/',
//    'homeUrl' => '/site/backend',

    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
            'baseUrl'=>'/backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'enableSession' => true,
            'identityCookie' => ['name' => '_identity-infosite', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'infosite',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'urlManager'=>[
//            'class' => 'yii\web\UrlManager',
//            'scriptUrl'=>'/backend/index.php',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                ''  => 'site/index',
                '/' => 'site/index',
            ]
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'params' => $params,
];
