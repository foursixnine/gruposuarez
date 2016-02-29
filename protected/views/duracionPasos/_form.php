<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'duracion-pasos-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	    <?php echo $form->dropDownListGroup(
			$model,
			'id_paso',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'widgetOptions' => array(
                                                'model' => $model,
                                                'attribute' => 'id_paso',
                                                'data' => CHtml::listData(Paso::model()->findAll(), 'id_paso', 'descripcion'),
                                                'options' => array(
                                                                'placeholder' => "Pasos del Tramite",
                                                                'allowClear'=>true,
                                                                  )
                                                        )
                                )
                        ); 
            ?> 

	    <?php echo $form->dropDownListGroup(
			$model,
			'id_tipo_paso',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'widgetOptions' => array(
                                                'model' => $model,
                                                'attribute' => 'id_tipo_paso',
                                                'data' => CHtml::listData(TipoPaso::model()->findAll(), 'id_tipo_paso', 'descripcion'),
                                                'options' => array(
                                                                'placeholder' => "Pasos del Tramite",
                                                                'allowClear'=>true,
                                                                  )
                                                        )
                                )
                        ); 
            ?>

       <?php
                    $this->widget(
                      'booster.widgets.TbSelect2', array(
                  
                      'model' => $model,
                         
                      'attribute' => 'id_banco',
                      'data' => CHtml::listData(Banco::model()->findAll(), 'id_banco', 'descripcion'),
                      'options' => array(
                        'placeholder' => "BANCO",
                            'allowClear'=>true,
                          
            
                     /*   'minimumInputLength'=>2,*/
                      ),
                      'htmlOptions'=>array(
                        'style'=>'width:380px',
                      ),
                     
                    ));
        ?>

	   <?php echo $form->textFieldGroup($model,'duracion',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
