<?php
$form=$this->beginWidget('booster.widgets.TbActiveForm',array(
      'id'=>'tramite-pasos-form',
    	'enableAjaxValidation'=>true,
        'htmlOptions' => array('class' => 'form-inline'),
    )); 
    
    
$this->breadcrumbs=array(
	'Tramite Pasos'=>array('index'),
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

<br/><br/>
<button type="button" class="btn btn-warning">Paso:
<span class="badge"><?php echo $model->idPaso['id_paso']; ?></span>
 <?php echo $model->idPaso['descripcion']; ?></button>

<br/><br/><br/>


<?php echo $form->errorSummary($model); ?>




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
    <?php 
        echo $form->datePickerGroup($model,'fecha_recibido',
            array('widgetOptions'=>
                      array('options'=>array('format'=>'yyyy-mm-dd'),
                            'htmlOptions'=>
                       array('size'=>10)), 
            'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>', 
            'append'=>''));
    ?>
</div>

<br/><br/><br/>
<div class="alert alert-success" role="alert">
  <span class="glyphicon glyphicon-list-alt" aria-hidden="true">  Actividad del Tramite</span></div>

     <div class="form-group">

        <b><?php echo $form->labelEx($tramite_actividad, 'Estado');?></b>
        <br/>
        <?php
                    $this->widget(
                      'booster.widgets.TbSelect2', array(
                      'model' => $tramite_actividad,
                      'attribute' => 'id_estado',
                      'data' => CHtml::listData(Estado::model()->findAll(), 'id_estado', 'descripcion'),
                      'options' => array(
                      'placeholder' => "ESTADO",
                     /*   'allowClear'=>false,
                        'minimumInputLength'=>2,*/
                      ),
                      'htmlOptions'=>array(
                        'style'=>'width:180px',
                      ),
                    ));
        ?>

    </div>
<br/>
    <div class="form-group">

    <?php echo $form->datePickerGroup($tramite_actividad,'fecha_tramite_actividad',
                       array('widgetOptions'=>
                      array('options'=>array('format'=>'yyyy-mm-dd'),
                            'htmlOptions'=>
                       array('size'=>10)),  
                'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>'));
    ?>
    </div>
<br/>
    <div class="form-group">

    <b><?php echo $form->labelEx($tramite_actividad, 'Observaciones');?></b>

    <?php 
      echo $form->textArea($tramite_actividad,'observaciones', array('style'=>'width:95%', 
        'rows'=>4, 'cols'=>50)); 
    ?>
    </div>              




<div class="form-actions">
<div class="row buttons">      
         <?php echo CHtml::submitButton('Tramite',array('name'=>'tramite')); ?>
        <?php echo CHtml::submitButton('Volver al Home',array('name'=>'actualizar')); ?>
</div>

</div>

<?php $this->endWidget(); ?>



<br/>

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'tramite-actividad-grid',
'dataProvider'=>$tramitesactividad,
'columns'=>array(
                'idPaso.descripcion',
                'idEstado.descripcion',
             
                array(
                      'class' => 'bootstrap.widgets.TbEditableColumn',
                      'name' => 'Fecha Tramite',
                      'editable' => 
                          array(
                              'type' => 'date',
                              'model'     => $model,
                              'attribute' => 'fecha_tramite_actividad',                              
                              'url' => $this->createUrl('/tramiteActividad/updatefechatramite'),
                              'placement' => 'right',
                              'format' => 'yyyy-mm-dd',
                              'viewformat' => 'yyyy-mm-dd',
                              'options' => array(
                                    'datepicker' => array(
                                        'language' => 'es'
                                                        )
                                                )
                          )
                ), 
                array(
                      'class' => 'bootstrap.widgets.TbEditableColumn',
                      'name' => 'observaciones',
                      'editable' => 
                          array(
                              'type' => 'textarea',
                              'model'     => $model,
                              'attribute' => 'observaciones',                           
                              'url' => $this->createUrl('/tramiteActividad/updateobservaciones'),
                               'placement' => 'right',                            
                          )
                  ), 
                array(
                       'class'=>'CButtonColumn',
                       'template'=>'{delete}',
                       'buttons'=>array
                   (
               
                             'delete' => array
                   (
                       'label'=>'Eliminar Proyecto',
                       'imageUrl'=>Yii::app()->request->baseUrl.'/images/delete.png',
                       'url'=>'Yii::app()->createUrl("tramiteActividad/delete", array("id"=>$data->id_tramite_actividad))',
                   ),

                ),
                   ),
             
    
    
 
)
)
    );?>
