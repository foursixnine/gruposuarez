<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'tableros-form',
	'enableAjaxValidation'=>false,
)); 
$this->breadcrumbs=array(
	'Tableros Operativos'=>array('index'),
	'Expedientes',
);


$this->menu=array(

array('label'=>'Volver','url'=>'../index'),    
);
?>
        

<h1>Expedientes</h1>
    <p class="help-block">Los campos con <span class="required">*</span> son requeridos.</p>  
<?php echo $form->errorSummary($model); ?>

        <?php echo $form->labelEx($model, 'Proyecto');?></b>
        <br />
        <!-- Auto Completar Acuerdo de Cobros -->     
        <?php
                    $this->widget(
                        'booster.widgets.TbSelect2', array(
                      'model' => $model,
                      'attribute' => 'id_crm_proyecto',
                      'data' => CHtml::listData(Proyecto::model()->findAll(), 'id_crm_proyecto', 'titulo'),
                      'options' => array(
                        'placeholder' => "ACUERDO",
                       /* 'allowClear'=>true,
                        'minimumInputLength'=>2,*/
                      ),
                      'htmlOptions'=>array(
                        'style'=>'width:380px',
                      ),
                    ));
        ?>
        <br/>
        <?php echo $form->datePickerGroup($model,'fecha_inicio',
        array('widgetOptions'=>array('options'=>array(
                                     'format' => 'yyyy-mm-dd'
        ),
                'htmlOptions'=>array('class'=>'span5')), 
                'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>', 
                'append'=>'Haga click en el Mes o A&ntilde;o para seleccionar uno diferente')); 
        ?>
	<?php echo $form->datePickerGroup($model,'fecha_fin',
        array('widgetOptions'=>array('options'=>array(
                                     'format' => 'yyyy-mm-dd'
        ),
                'htmlOptions'=>array('class'=>'span5')), 
                'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>', 
                'append'=>'Haga click en el Mes o A&ntilde;o para seleccionar uno diferente')); 
        ?>
	
	<?php //echo $form->textFieldGroup($model,'campo',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
<?php //echo $form->textFieldGroup($model,'campo',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
	 <?php
                    $this->widget(
                        'booster.widgets.TbSelect2', array(
                      'model' => $model,
                      'attribute' => 'id_usuario',
                      'data' => CHtml::listData(Usuarios::model()->findAll(), 'id_usuario', 'nombre'),
                      'options' => array(
                        'placeholder' => "ACUERDO",
                       /* 'allowClear'=>true,
                        'minimumInputLength'=>2,*/
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
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		));  
    ?>
     
</div>

<?php $this->endWidget(); ?>
  
    <?php 
        
        
            echo $this->renderPartial('_expediente',
                    array('proyecto'=>$proyecto,
                          
                                     ));
       
    ?>