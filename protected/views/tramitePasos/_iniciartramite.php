<?php 
$form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'tramite-pasos-form',
	'enableAjaxValidation'=>false,
        'type' => 'inline',
)); 
?>


<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>


        <?php echo $form->labelEx($model, 'Tipo de Pago'); ?>
           <br/>
            <?php
                    $this->widget(
                      'booster.widgets.TbSelect2', array(
                      'model' => $model,
                      'attribute' => 'id_responsable_ejecucion',
                      'data' => CHtml::listData(ResponsableEjecucion::model()->findAll(), 'id_responsable_ejecucion', 'descripcion'),
                      'options' => array(
                        'placeholder' => "Responsable Ejecucion",
                       'allowClear'=>true,
                      //  'minimumInputLength'=>2,
                      ),
                      'htmlOptions'=>array(
                        'style'=>'width:380px',
                      ),
                    ));
        ?>
              <br/>
                  <?php echo $form->labelEx($model, 'Tipo Responsable'); ?>
           <br/>
            <?php
                    $this->widget(
                      'booster.widgets.TbSelect2', array(
                      'model' => $model,
                      'attribute' => 'id_responsable_ejecucion',
                      'data' => CHtml::listData(TipoResponsable::model()->findAll(), 'id_tipo_responsable', 'descripcion'),
                      'options' => array(
                        'placeholder' => "Responsable Ejecucion",
                       'allowClear'=>true,
                      //  'minimumInputLength'=>2,
                      ),
                      'htmlOptions'=>array(
                        'style'=>'width:380px',
                      ),
                    ));
        ?>
      

    
      
<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Siguiente Paso' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
