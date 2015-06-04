<?php
Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'** Antares **',
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
            'ext.ECompositeUniqueValidator',
                'ext.YiiConditionalValidator',
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
   
                        //'<controller:\w+>/<id:[a-f0-9]{8}(-[a-f0-9]{4}){3}-[a-f0-9]{12}+>'=>'<controller>/view,delete,update',
                        //        '<controller:\w+>/<action:\w+>/<id:[a-f0-9]{8}(-[a-f0-9]{4}){3}-[a-f0-9]{12}]+>'=>'<controller>/<action>',
                       //                  '<controller:\w+>/<id:\d+>'=>'<controller>/view,delete,update',
                        //                '<controller:\w+>/<action:\w+>/<id:\d+>/<id2>/<id3:\w*[a-zA-z0-9\-]*>'=>'<controller>/<action>',
                        //                '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                         //               '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
	/*	'urlManager'=>array(
                                    'urlFormat'=>'path',
                                    'showScriptName'=>false,
                                    'caseSensitive'=>false,//true
                                    'rules'=>array(
                                        '<controller:\w+>/<id:\d+>'=>'<controller>/view',                                      
                                        '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                                        '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
                                    ),
                ),*/
		/*'urlManager'=>array(
			'urlFormat'=>'path',
                        'showScriptName'=>false,
                        'caseSensitive'=>false,//true
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),*/
		'urlManager'=>array(
			//'class'=>'application.components.MyCUrlManager',
			'urlFormat'=>'path',
			'showScriptName'=>false,
			#'urlSuffix'=>'.asp',
			'rules'=>array(
				#'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				#'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>/<id>/<title>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>/<id>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
				#'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),

		// database settings are configured in database.php*/
        'db'=>array(
                'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
        ),
        'dbconix'=>array(
                        'class' => 'CDbConnection',
			'connectionString' => 'mysql:host=186.74.216.58;dbname=enx_suarez',
            	//        'connectionString' => 'mysql:host=192.168.0.159;dbname=enx_suarez',
			'emulatePrepare' => true,
			'username' => 'suarez',
			'password' => '!suarez2015!',
			'charset' => 'utf8',
			'enableProfiling'=>true,
		),
        
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
