<?php
error_reporting(E_ALL);
ini_set("display_startup_errors","1");
ini_set("display_errors","1");


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
        'theme'=>'plantilla1',
    
   //   'theme'=>'plantilla1',
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
                'ext.EExcelView.*',

                'application.extensions.yiichat.*',
                'ext.ECompositeUniqueValidator',
                'ext.YiiConditionalValidator',
                //Gabriela 23-04-2015 11:20am
                'bootstrap.behaviors.*',
                'bootstrap.helpers.*',
                'bootstrap.widgets.*',
                //24-06-2015
                'ext.dynamictabularform.*',             	
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


	//Componentes de la Aplicacion
	'components'=>array(
                //Componentes de plantilla 
                'bootstrap'=>array(
                    'class'=>'bootstrap.components.Booster',
                    'coreCss' => true,
                    'responsiveCss' => true, //Esto para que tengamos un dise�o responsive, adaptable a cualquier dispositivo!

                ),

      
			'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
                        
                       // 'class' => 'application.modules.cruge.components.CrugeWebUser', 
                        'loginUrl'=>array('site/login'),
		),
	   /*     'urlManager'=>array(
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
                //
		// database settings are configured in database.php*/
                'db'=>array(
                        'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
                ),
                //Segunda Conexion
                'dbconix'=>array(
						'class' => 'CDbConnection',
						'connectionString' => 'mysql:host=186.74.216.58;dbname=enx_suarez',
						'enableProfiling' => YII_DEBUG_PROFILING,
					//    'connectionString' => 'mysql:host=192.168.0.159;dbname=enx_suarez',
						'emulatePrepare' => true,
						'username' => 'suarez',
						'password' => '!suarez2015!',
						'charset' => 'utf8',
						'enableProfiling'=>true,
		),
                //Conexion con la BD Principal
                'db'=>array(
			'connectionString' => 'pgsql:host=localhost;dbname=gruposuarez',
			'emulatePrepare' => true,
                        'enableProfiling' => YII_DEBUG_PROFILING,
                        'enableParamLogging' => true,
			//'username' => 'postgres',
                        'username' => 'antares',
			'password' => '123456',
			'charset' => 'utf8',
		),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
                'authManager'=>array(
                    'class'=>'CDbAuthManager',
                    'connectionID'=>'db',
                    'itemTable'=>'AuthItem', // Tabla que contiene los elementos de autorizacion
                    'itemChildTable'=>'AuthItemChild', // Tabla que contiene los elementos padre-hij
                    'assignmentTable'=>'AuthAssignment', // Tabla que contiene la signacion usuario-autorizacion
                ),
                /*'authManager'=>array(
                    'class'=>'CDbAuthManager',
                    'connectionID'=>'db',                   
                    'itemTable'=>'AuthItem', // Tabla que contiene los elementos de autorizacion
                    'itemChildTable'=>'AuthItemChild', // Tabla que contiene los elementos padre-hij
                    'assignmentTable'=>'AuthAssignment', // Tabla que contiene la signacion usuario-autorizacion
                ),*/
                //Poder ver los log del sistema
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
                            array(
                                    'class' => 'CWebLogRoute',
                                    'levels' => 'error, warning, trace, notice',
                                    'categories' => 'application,system.db.CDbCommand',
                                    'showInFireBug' => true,
                                    'enabled'=>true,
                                ),
				array(
                                    'class'=>'CFileLogRoute',
                                    //'levels'=>'error, warning',
                                    'levels' => 'trace, info, error, warning, vardump,log',
                                          //  'levels'=>'profile',
                                    'categories' => 'system.db.CDbCommand',
                                    'logFile' => 'db.log',
                                    'enabled'=>true,
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
