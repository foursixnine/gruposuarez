<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'pago-remuneracion-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	      <br />
        <!-- Auto Completar Acuerdo de Cobros -->     
        <?php
                    $this->widget(
                        'booster.widgets.TbSelect2', array(
                      'model' => $model,
                      'attribute' => 'id_tipo_cartera',
                      'data' => CHtml::listData(TipoCartera::model()->findAll(), 'id_tipo_cartera', 'descripcion'),
                      'options' => array(
                        'placeholder' => "Tipo Cartera",
                       /* 'allowClear'=>true,
                        'minimumInputLength'=>2,*/
                      ),
                      'htmlOptions'=>array(
                        'style'=>'width:380px',
                      ),
                    ));
        ?>
	<?php echo $form->textFieldGroup($model,'porcentaje',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php echo $form->textFieldGroup($model,'dinero',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>

        
<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'gestion-grid',
'dataProvider'=>$pago_remuneracion->search(),
'columns'=>array(
		'idTipoCartera.descripcion',
                'idTipoCartera.peso',
		'porcentaje',
		'dinero',

array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>        