<?php
$config = [ 
		'components' => [ 
				'db'=>require(__DIR__ . '/mysql.php'),
				'local'=>require(__DIR__ . '/sqlite.php'),
				'request' => [
						// !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
						'cookieValidationKey' => '1XISA8YMnWJOW_BZt0arTKS13PaW2-l7' 
				], 
		] 
];

if (! YII_ENV_TEST) {
	// configuration adjustments for 'dev' environment
	$config ['bootstrap'] [] = 'debug';
	$config ['modules'] ['debug'] = 'yii\debug\Module';
	
	$config ['bootstrap'] [] = 'gii';
	$config ['modules'] ['gii'] = 'yii\gii\Module';
}

return $config;
