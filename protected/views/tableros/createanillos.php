<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'tableros-form',
	'enableAjaxValidation'=>false,
)); 
$this->breadcrumbs=array(
	'Tableros Operativos'=>array('index'),
	'Gestion',
);


?>
        

<h1>Tablero de Gesti&oacute;n</h1>
 

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
                        'placeholder' => "PROYECTO",
                        'allowClear'=>true,
                      /*  'minimumInputLength'=>2,*/
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
	
<?php echo $form->labelEx($model, 'Cobrador');?>
        <br />
	 <?php
                    $this->widget(
                        'booster.widgets.TbSelect2', array(
                      'model' => $model,
                      'attribute' => 'id_usuario',
                      'data' => CHtml::listData(Usuarios::model()->findAll(), 'id_usuario', 'nombre'),
                      'options' => array(
                        'placeholder' => "COBRADOR",
                        'allowClear'=>true,
                    /*    'minimumInputLength'=>2,*/
                      ),
                      'htmlOptions'=>array(
                        'style'=>'width:380px',
                      ),
                    ));
        ?>
<br/>
<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Generar' : 'Save',
		));  
    ?>
    <?php 
 echo CHtml::link('Ver todos los Proyectos',array('/tableros/createanillos/'));
/*
  $this->widget('booster.widgets.TbButton', array(
    'label'=>'Actualizar',
    'buttonType'=>'primary',
    'icon'=>'repeat white',
    'htmlOptions'=>array(
      'id'=>'update-grid-button',
      'class'=>'pull-right',
    )
  )); 
  
      $this->widget('booster.widgets.TbButton',array(
    'label'=>'Actualizar',
    'buttonType'=>'success',
    'icon'=>'repeat white',
     'htmlOptions' => array(
       //  'id'=>'update-grid-button',
         'class'=>'pull-right',
      //   'submit'=>Yii::app()->createUrl('tableros/createanillos')),
            'url'=>Yii::app()->createUrl('tableros/createanillos')),
    ));*/
  ?>
</div>

<?php $this->endWidget(); ?>
   
    <?php 
        
          if($proyecto!=""){
            echo $this->renderPartial('_anillos',
                    array('proyecto'=>$proyecto,
                          'totalsi'=>$totalsi,
                                     ));
          }else{
              
              echo $this->renderPartial('_anillostodos',
                    array('proyecto'=>$proyecto,
                          'totalsi'=>$totalsi,
                                     ));
          }
     ?>


