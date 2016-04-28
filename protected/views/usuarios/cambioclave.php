<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'usuarios-form',
	'enableAjaxValidation'=>false,
)); ?>

<?php
$this->menu=array(
array('label'=>'Volver','url'=>array('/')),
);
?>
<button type="button" class="btn btn-warning">CAMBIO CLAVE</button>


<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldGroup($model,'username',
  array('widgetOptions'=>array('htmlOptions'=>array(
  'class'=>'span5',
  'disabled'=>'true',
  'maxlength'=>255)))); ?>

	<?php echo $form->passwordFieldGroup($model,'password',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255)))); ?>



<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Guardar',
		)); ?>
</div>

<?php $this->endWidget(); ?>
