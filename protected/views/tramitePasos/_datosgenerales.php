<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
/*	'id'=>'tramite-pasos-form',
	'enableAjaxValidation'=>false,
     'type' => 'inline',
     'htmlOptions' => array('class' => 'well'),*/

		'id' =>'tramite-pasos-form',
		'type' => 'horizontal',
	
   
)); 
 
?>

<?php if(Yii::app()->user->hasFlash('success')):?>
    <div class="grabado_ok">
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php endif; ?>
<?php echo $form->errorSummary($tramite); ?>

<br/>
<button type="button" class="btn btn-warning">Actualizaci&oacute;n de Tramite</button>

 
        <br/>
	<?php echo $form->textFieldGroup($tramite,'plano',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
        <br/>
        <?php echo $form->datePickerGroup($tramite,'fecha_entrega',array('widgetOptions'=>array('options'=>array('format' => 'yyyy-mm-dd'),'htmlOptions'=>array('class'=>'span5','style' => 'width:4px;')), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>')); ?>
        <br/>      
        <?php echo $form->textFieldGroup($tramite,'ganancia_capital',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>           
        <br/>
        <?php echo $form->datePickerGroup($tramite,'fecha_escritura',array('widgetOptions'=>array('options'=>array('format' => 'yyyy-mm-dd'),'htmlOptions'=>array('class'=>'span5','style' => 'width:4px;')), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>')); ?>
        <br/>
        <?php echo $form->datePickerGroup($tramite,'fecha_inscripcion_escritura',array('widgetOptions'=>array('options'=>array('format' => 'yyyy-mm-dd'),'htmlOptions'=>array('class'=>'span5','style' => 'width:4px;')), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>')); ?>
        <br/>  
        <?php echo $form->textFieldGroup($tramite,'num_escritura',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>           
        <br/>   
        <?php echo $form->textFieldGroup($tramite,'num_finca_inscrita',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>           
        <br/>        
        <?php echo $form->textFieldGroup($tramite,'transferencia_inmueble',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>           
        <br/>  
          <?php echo $form->textFieldGroup($tramite,'num_formulario',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>           
        <br/>      
        <?php echo $form->textFieldGroup($tramite,'num_permiso_ocupacion',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>           
        <br/>               
             
        <?php echo CHtml::submitButton('Actualizar Tramite',array('name'=>'updatetramite')); ?>

<?php $this->endWidget(); ?>
<br/>

<button type="button" class="btn btn-warning">OTROS DATOS</button>
<table class="table">
        <thead>
        <tr>
            <th>Calle</th>
            <th>Modelo</th>
            <th>Expediente Tramite Recibido</th>
        </tr>
        </thead>


      
        <tbody>
        <tr class="odd">           
            <td><?php echo $calle;?></td>
            <td><?php echo $model_adic;?></td>       
           <td></td>
        </tr>
    
        
        </tbody>
    </table>
<button type="button" class="btn btn-warning">DETALLES DEL TRAMITE</button>
<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$tramite,
'attributes'=>array(
                'idClienteGs.monto_abono',
                'idClienteGs.total_venta',
                'idClienteGs.monto_liquidacion',  
                'idExpedienteFisico.descripcion', 
                'idClienteGs.nombre',
                'idClienteGs.cedula',
                'idClienteGs.id_cliente',
                'idClienteGs.numero_de_lote',
                'idClienteGs.proyecto',
                'idClienteGs.banco_acreedor',                
                'idClienteGs.vendedor',
                'idClienteGs.fecha_de_permiso_contruccion',
                'idClienteGs.fecha_de_pago_abono',
                'idClienteGs.fecha_ultimo_pago', 
                'idClienteGs.fecha_de_entrega', 
                'idClienteGs.fecha_de_permiso_contruccion', 
                'idClienteGs.fecha_de_permiso_bomberos', 
                'idClienteGs.fecha_de_permiso_ocupacion', 
                'idClienteGs.fecha_de_carta_promesa',
       
),
)); ?>
<br/>



<br/>

