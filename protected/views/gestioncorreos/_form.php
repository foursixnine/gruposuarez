<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'gestioncorreos-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php //echo $form->textFieldGroup($model,'descripcion',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
    <?php 
    
     echo $form->ckEditorGroup(
    			$model,
    			'descripcion',
    			array(
    		   		'wrapperHtmlOptions' => array(
    					/* 'class' => 'col-sm-5', */
    				),
    				'widgetOptions' => array(
    					'editorOptions' => array(
    						'fullpage' => 'js:true',
    						/* 'width' => '640', */
    						/* 'resize_maxWidth' => '640', */
    						/* 'resize_minWidth' => '320'*/
    					)
    				)
    			)
    		); 
    ?>
	<?php echo $form->textFieldGroup($model,'id_tipo_gestion',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
