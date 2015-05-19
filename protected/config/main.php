<?php
Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Grupo Suarez',
    'language'=>'es',
    'charset'=>'utf-8',
    'sourceLanguage'=>'en',
    'theme'=>'bootstrap',
	// preloading 'log' component
	'preload'=>array(
                'log',
                'bootstrap',                
    ),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
        'application.extensions.*',
        //Gabriela 23-04-2015 11:20am
        'bootstrap.behaviors.*',
        'bootstrap.helpers.*',
        'bootstrap.widgets.*',
	
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
	
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'123456',			
			'ipFilters'=>array('127.0.0.1','::1'),
            'generatorPaths'=>array('bootstrap.gii'),		
	),
),


	// application components
	'components'=>array(
        'bootstrap'=>array(
            'class'=>'bootstrap.components.Booster',
           // 'coreCss' => false,
            'responsiveCss' => true, //Esto para que tengamos un dise�o responsive, adaptable a cualquier dispositivo!
        
        ),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),


		// uncomment the following to enable URLs in path-format
		'urlManager'=>array(
                                    'urlFormat'=>'path',
                                    'showScriptName'=>false,
                                    'caseSensitive'=>true,
                                    'rules'=>array(
                                        '<controller:\w+>/<id:\d+>'=>'<controller>/view',
                                        '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                                        '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
                                    ),
                ),
	/*	'urlManager'=>array(
			'urlFormat'=>'path',
            //'showScriptName'=>false,
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),*/
		

		// database settings are configured in database.php*/
	/*	'db'=>require(dirname(__FILE__).'/database.php'),*/
    /*    'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=testdrive',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),*/
        
       	'db'=>array(
			'connectionString' => 'pgsql:host=localhost;dbname=gruposuarez',
			'emulatePrepare' => true,
			'username' => 'postgres',
			'password' => '123456',
			'charset' => 'utf8',
		),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),

		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					//'levels'=>'error, warning',
                                       'levels' => 'trace, info, error, warning, vardump',
                                              //  'levels'=>'profile',
            'enabled'=>true,
				),
             array(
            'class' => 'CWebLogRoute',
            'enabled' => YII_DEBUG,
            'levels' => 'error, warning, trace, notice',
            'categories' => 'application',
            'showInFireBug' => false,
        ),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),

	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'gilarreta@valorca.com',
	),
);
