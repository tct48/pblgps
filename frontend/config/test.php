<?php
return [
    'id' => 'app-frontend-tests',
    'components' => [
        'assetManager' => [
            'bundles' => [
                'kamran377\yii2-sweetalert2\SweetAlertAsset' => [
                    'overrideConfirm' => false
                ]
            ],
            'basePath' => __DIR__ . '/../web/assets',
        ],
        'urlManager' => [
            'showScriptName' => true,
        ],
        'request' => [
            'cookieValidationKey' => 'test',
        ],
    ],
];
