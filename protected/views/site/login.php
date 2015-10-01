<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Inicio';
/*
$this->breadcrumbs=array(
	'Login',
);*/
?>


             <p ><button type="button" class="btn btn-warning">BIENENVENIDO AL SISTEMA ANTERES</button>                            
       <h2 class="titulo" align="center"></h2>
    </p>
    <br/>
<div class="form">
<div class="logininicio" align="center">
    <br/><br/>
<?php //echo Yii::app()->params['empresa']; 
	  //echo CHtml::image(Yii::app()->theme->baseUrl."/images/demo/logo1.png");
       //echo Yii::app()->request->baseUrl."images/logo.png";
         ?>
   <!-- <img src='<?php //echo Yii::app()->theme->baseUrl.'/images/demo/logo1.png' ?>' height='200' width='200' />                
       -->                                    
                                        
     
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p>Todos los campos con <span class="required">*</span> son requeridos.</p>

	<div class="">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
		<!--<p class="hint">
			Hint: You may login with <kbd>demo</kbd>/<kbd>demo</kbd> or <kbd>admin</kbd>/<kbd>admin</kbd>.
		</p>-->
	</div>

	<div class="row rememberMe">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>

<br/><br/>
	<div class="">
		<?php echo CHtml::submitButton('Login'); ?>
	</div>
<br/><br/><br/><br/><br/><br/><br/><br/>
<?php $this->endWidget(); ?>
</div><!-- form -->
</div>