<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'tramite-form',
	'enableAjaxValidation'=>false,
    //  'id' => 'inlineForm',
        'type' => 'inline',
     //   'htmlOptions' => array('class' => 'well'),
)); ?>


<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$tramite,
'attributes'=>array(
		'idClienteGs.nombre',
		'idClienteGs.numero_de_lote',
		'idExpedienteFisico.descripcion',
		'idClienteGs.banco_acreedor',
    'idClienteGs.id_proyecto',
		'idClienteGs.proyecto',
),
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

 <!-- Auto Completar Acuerdo de RESPONSABLE -->     
    <br/>
    <b><?php echo $form->labelEx($model, 'Fecha Inicio');?></b>
    <br/>
    <?php echo $form->datePickerGroup($model,'fecha_inicio',array('widgetOptions'=>array('options'=>array('format' => 'yyyy-mm-dd'),'htmlOptions'=>array('class'=>'span5','style' => 'width:4px;')), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>')); ?>
    <br/>
    <b><?php echo $form->labelEx($model, 'Estado');?></b>
        <br />
        <!-- Auto Completar Acuerdo de Cobros -->     
        <?php
                    $this->widget(
                      'booster.widgets.TbSelect2', array(
                      'model' => $model,
                      'attribute' => 'id_estado',
                      'data' => CHtml::listData(Estado::model()->findAll(), 'id_estado', 'descripcion'),
                      'options' => array(
                      'placeholder' => "ESTADO",
                       /* 'allowClear'=>true,
                        'minimumInputLength'=>2,*/
                      ),
                      'htmlOptions'=>array(
                        'style'=>'width:80px',
                      ),
                    ));
        ?>
        <br/>
        <b><?php echo $form->labelEx($model, 'Responsable');?></b>
        <br/>
        <?php echo $form->textFieldGroup($model,'id_usuario',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
        <br/>
        <b><?php echo $form->labelEx($model, 'Abogado');?></b>
        <br/>
        <?php echo $form->textFieldGroup($model,'id_abogado',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
        <br/>
        <!-- Auto Completar Acuerdo de RESPONSABLE -->     
    

        <!-- Auto Completar Acuerdo de RESPONSABLE -->     
        <br/>
        <b><?php echo $form->labelEx($model, 'Fecha Fin');?></b>
        <br/>
        <?php echo $form->datePickerGroup($model,'fecha_fin',array('widgetOptions'=>array('options'=>array('format' => 'yyyy-mm-dd'),'htmlOptions'=>array('class'=>'span5','style' => 'width:4px;')), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>')); ?>
        <br/>      <br/>         
        <b><?php echo $form->labelEx($model, 'Razones de Estado');?></b>
        <br/>
        
        <?php
                    $this->widget(
                      'booster.widgets.TbSelect2', array(
                      'model' => $model,
                      'attribute' => 'id_razones_estado',
                      'data' => CHtml::listData(RazonesEstado::model()->findAll(), 'id_razones_estado', 'descripcion'),
                      'options' => array(
                      'placeholder' => "RAZONES DE ESTADO",
                       /* 'allowClear'=>true,
                        'minimumInputLength'=>2,*/
                      ),
                      'htmlOptions'=>array(
                        'style'=>'width:80px',
                      ),
                    ));
        ?>
        <br/>
        <b><?php echo $form->labelEx($model, 'Proveedores');?></b>
        <br/>
      

	<?php echo $form->textFieldGroup($model,'id_proveedor',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
<br/>
<h2><p>Bitacora Tramite </p></h2>        
 <?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'tramite-pasos-grid',
'dataProvider'=>$tramiteold->search(),
//'filter'=>$tramitepasos,
'columns'=>array(

		'idPaso.descripcion',
		'idEstado.descripcion',
		
		'id_expediente_fisico',
	
	
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
