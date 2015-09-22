<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldGroup($model,'id_cliente',array('class'=>'span5')); ?>

	<?php// echo $form->textFieldGroup($model,'NOMBRE',array('class'=>'span5')); ?>

	

	<?php //echo $form->textFieldGroup($model,'id_gestion_llamada',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType' => 'submit',
			'context'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>


<?php $this->endWidget(); ?>
