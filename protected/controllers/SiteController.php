<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{


		
	
		$this->render('index');
                
                /*
      $mail = new JPhpMailer;
        $cliente = new Cliente('search120');
            // renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
$datetime1 = new DateTime("now");
$datetime2 = new DateTime('2015-05-18'); //Fecha Carta Promesa
$interval = date_diff($datetime2,$datetime1 );
$fe_diff= $interval->format('%R%a');
//echo $fe_diff;
if ($fe_diff >= 15){
   // var_dump("SIIIII");die;
        $mail->Username = 'gilarreta@valorca.com';
        $mail->Password = 'IRGA2785';
        $mail->SetFrom('gilarreta@valorca.com', 'Gaby');
        $mail->Subject = 'PRUEBA DE ENVIO DE CARTA PROMESA';
        $mail->AltBody = 'Por la presente le informamos que según nuestro registro tiene letra pr&oacute;xima a vencer con monto correspondiente '
                . 'a (insertar monto) para el día (insertar día). Recuerde que para realizar su pago puede acercarse a nuestras oficinas '
                . 'en V&iacute;a España, Edificio los Toneles, Planta Baja &oacute; realizar un dep&oacute;sito directo a la siguiente '
                . 'cuenta (ingresar detalles de cuenta). '
                . 'No olvide enviar su correo de aviso de pago si decide abonar directamente a los '
                . 'siguientes correos obonilla@gsuarez.com, orodriguez@gsuarez.com<br/><br/>'
                . 'Esperamos que tenga un excelente día<br/>Atentamente,<br/>Departamento de Cobros<br/>Grupo Su&aacute;rez';
        $mail->MsgHTML('<h1>PRUEBA DE GRUPO SUAREZ!</h1>');
        $mail->AddAddress('gilarreta@valorca.com', 'GAby HOLAAA HHAHA');
        $mail->Send();
                 *                  */
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
        
        
        public function actionCartaPromesa() {
            
         
$datetime1 = new DateTime('2009-10-11');
$datetime2 = new DateTime('2009-10-13');
$interval = $datetime1->diff($datetime2);
echo $interval->format('%R%a días');
        
        }
        
      
}