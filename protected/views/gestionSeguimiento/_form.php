<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'gestion-seguimiento-form',
	'enableAjaxValidation'=>false,
)); ?>


<div class="row">
    <div class="col-sm-6" style="background-color:#dff0d8;">
        <div class="list-group">
        <a href="#" class="list-group-item list-group-item-info">
           
            <p>DATOS ULTIMAS GESTIONES<span class="glyphicon glyphicon-list-alt"></span></p> 
        </a>
         
         <table class="list-group-item">
                            <tr>
                              <td><strong>Fecha de Acuerdo:</strong></td>
                              <td><?php echo $gestion_old['fecha_acuerdo']; ?></td>
                            </tr>

                            <tr>
                              <td><strong>Observaciones:</strong></td>
                              <td><?php echo $gestion_old['observaciones']; ?></td>
                            </tr>
                            <tr>
                             <td><strong>Tipo de Contacto:</strong></td>
                              <td><?php if ($gestion_old['contactado_llamada']==1){
                                    echo "Contactado (Telefónicamente)";
                              }else{
                                     echo "No Contactado";
                              }
                              


                              ?></td>
                            
                        </tr></table>
         
    </div>
    </div>
</div>
<p class="help-block">Los campos con <span class="required">*</span> son obligatorios.</p>

<?php echo $form->errorSummary($model); ?>

	<?php //echo $form->textFieldGroup($model,'id_gestion',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
    <?php echo $gestion_old['id_gestion']=$model->id_gestion;?>

	<?php echo $form->datePickerGroup($model,'fecha_gestion_seguimiento',
    array('widgetOptions'=>array('options'=>array(
                                 'format' => 'yyyy-mm-dd'
    ),
            'htmlOptions'=>array('class'=>'span5')), 
            'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>', 
            'append'=>'Haga click en el Mes o A&ntilde;o para seleccionar uno diferente')); 
    ?>
	<?php echo $form->textAreaGroup(
            $model,
            'observaciones',
            array(
                'wrapperHtmlOptions' => array(
                    'class' => 'col-sm-5',
                ),
                'widgetOptions' => array(
                    'htmlOptions' => array('rows' => 5),
                )
            )
        ); 
    ?>

	<div class="form-actions">
		<?php $this->widget('booster.widgets.TbButton', array(
				'buttonType'=>'submit',
				'context'=>'primary',
				'label'=>$model->isNewRecord ? 'Create' : 'Save',
			)); ?>
	</div>

<?php $this->endWidget(); ?>


<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'gestion-seguimiento-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		
		'fecha_gestion_seguimiento',
		'observaciones',
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
