<?php
$form=$this->beginWidget('booster.widgets.TbActiveForm',array(
      'id'=>'tramite-pasos-form',
    	'enableAjaxValidation'=>true,
       // 'htmlOptions' => array('class' => 'form-inline'),
/*
      'id'=>'tramite-pasos-form',
      'enableAjaxValidation'=>true,
      'type' => 'inline',
      'htmlOptions' => array('class' => 'well'),
  */  	
    )); 
    
    
$this->breadcrumbs=array(
	'Tramite Pasoses'=>array('index'),
	$model->id_tramite_pasos=>array('view','id'=>$model->id_tramite_pasos),
	'Update',
);
$this->menu=array(
array('label'=>'Volver','url'=>array('tramite/admin')),
//array('label'=>'Create TramitePasos','url'=>array('create')),
);
/*
	$this->menu=array(
	array('label'=>'Listar Pasos del Tramite','url'=>array('index')),
	array('label'=>'Crear Tramite','url'=>array('create','id'=>$model->id_tramite)),
	array('label'=>'Visualizar Tramite','url'=>array('view','id'=>$model->id_tramite_pasos)),
	array('label'=>'Administrar Pasos del Tramite','url'=>array('admin')),
	);*/
	?>
<button type="button" class="btn btn-warning">Paso: <?php echo $model->idPaso['descripcion']; ?></button>

<h2 class="titulo">Id de Cliente <?php echo $model->id_cliente_gs; ?></h2>


<?php echo $form->errorSummary($model); ?>




<div class="form-group">
    <?php echo $form->dropDownListGroup(
			$model,
			'id_estado',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'widgetOptions' => array(
                                                'model' => $model,
                                                'attribute' => 'id_estado',
                                                'data' => CHtml::listData(Estado::model()->findAll(), 'id_estado', 'descripcion'),
                                                'options' => array(
                                                                'placeholder' => "Estado",
                                                                'allowClear'=>true,                                                  
                                                                  )
                                                        ),                              
                                )
                        ); 
    ?>    
</div>

<div class="form-group">
    <?php //echo $form->datePickerGroup($model,'fecha_solicitud',array('widgetOptions'=>array('options'=>array(),'htmlOptions'=>array('class'=>'span-14')), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>', 'append'=>'')); 
        echo $form->datePickerGroup($model,'fecha_solicitud',
   array('widgetOptions'=>
            array('options'=>array('format'=>'yyyy-mm-dd'),
    'htmlOptions'=>
    array('size'=>10)), 
    'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>', 
    'append'=>''));
    
    ?>
</div>

<div class="form-group">
    <?php //echo $form->datePickerGroup($model,'fecha_recibido',array('widgetOptions'=>array('options'=>array(),'htmlOptions'=>array('class'=>'span-14')), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>', 'append'=>'')); 
    
        echo $form->datePickerGroup($model,'fecha_recibido',
   array('widgetOptions'=>
            array('options'=>array('format'=>'yyyy-mm-dd'),
    'htmlOptions'=>
    array('size'=>10)), 
    'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>', 
    'append'=>''));
    ?>
</div>

<div class="form-group">
<?php //echo $form->datePickerGroup($model,'fecha_entrega',array('widgetOptions'=>array('options'=>array(),'htmlOptions'=>array('class'=>'span5')), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>', 'append'=>'Click on Month/Year to select a different Month/Year.')); 
    
        echo $form->datePickerGroup($model,'fecha_entrega',
   array('widgetOptions'=>
            array('options'=>array('format'=>'yyyy-mm-dd'),
    'htmlOptions'=>
    array('class' => 'col-sm-3')), 
    'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>', 
    'append'=>''));

?>
</div>

<div class="form-group">
    <?php echo $form->textFieldGroup($model,'plano',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span-14')))); 
    
    
    ?>
</div>

<div class="form-actions">
<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		));  

?>
    
    
</div>


<?php $this->endWidget(); ?>