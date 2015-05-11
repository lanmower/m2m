<?php
$params = array_merge ( require (__DIR__ . '/../../common/config/params.php'), require (__DIR__ . '/../../common/config/params-local.php'), require (__DIR__ . '/params.php'), require (__DIR__ . '/params-local.php') );

return [ 
		'id' => 'app-m2m',
		'basePath' => dirname ( __DIR__ ),
		'bootstrap' => [ 
				'log' 
		],
		'controllerNamespace' => 'm2m\controllers',
		'components' => [ 
				'db'=>require(__DIR__ . '/mysql.php'),
				'local'=>require(__DIR__ . '/sqlite.php'),
				
				'user' => [ 
						'identityClass' => 'common\models\User',
						'enableAutoLogin' => true 
				],
				'log' => [ 
						'traceLevel' => YII_DEBUG ? 3 : 0,
						'targets' => [ 
								[ 
										'class' => 'yii\log\FileTarget',
										'levels' => [ 
												'error',
												'warning' 
										] 
								] 
						] 
				],
				'errorHandler' => [ 
						'errorAction' => 'site/error' 
				] 
		],
		'modules' => [ 
				'view' => [ 
						'class' => 'almagest\gong\modules\view\Module' 
				] 
		],
		'params' => $params 
];
