<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'metas-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php //echo $form->textFieldGroup($model,'id_proyecto',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
<?php
               $this->widget(
                 'booster.widgets.TbSelect2', array(            
                 'model' => $model,
                 'attribute' => 'id_proyecto',
                 'data' => CHtml::listData(Proyecto::model()->findAll(), 'id_proyecto', 'titulo'),
                 'options' => array(
                   'placeholder' => "Proyecto",
                  //     'id' => "proyecto",
                  /* 'allowClear'=>true,
                   'minimumInputLength'=>2,*/
                 ),
                     
                     // array('empty'=>'','id'=>'area_type','style'=>'width:100%',),
                 'htmlOptions'=>array(
                   'style'=>'width:380px',
                     
                 ),
               ));
   ?>
	<?php echo $form->datePickerGroup($model,'fecha_inicio',array('widgetOptions'=>array('options'=>array(),'htmlOptions'=>array('class'=>'span5')), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>', 'append'=>'Click on Month/Year to select a different Month/Year.')); ?>

	<?php echo $form->datePickerGroup($model,'fecha_fin',array('widgetOptions'=>array('options'=>array(),'htmlOptions'=>array('class'=>'span5')), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>', 'append'=>'Click on Month/Year to select a different Month/Year.')); ?>

	<?php echo $form->textFieldGroup($model,'monto',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php echo $form->textFieldGroup($model,'porcentaje_meta',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php echo $form->textFieldGroup($model,'monto_mes_proyecto',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
<?php if ($model->cartera==2){
 echo $form->hiddenField($model,'cartera',array('type'=>"hidden",'size'=>2,'value'=>2)); 
}else{
echo $form->hiddenField($model,'cartera',array('type'=>"hidden",'size'=>2,'value'=>1)); 
}
?>
<?php //echo $form->textFieldGroup($model,'cartera',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
