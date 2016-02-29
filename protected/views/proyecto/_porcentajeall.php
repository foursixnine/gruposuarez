<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'proyecto-porcentajeall',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldGroup($model,'porcentaje',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Actualizar' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>



<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'proyecto-grid',
'dataProvider'=>$model->search(),
'columns'=>array(
		'id_crm_proyecto',
		'titulo',
                'porcentaje',
		//'id_status',
		/*
		'comentario',
		'id_agente',
		'porcentaje',
		*/
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>