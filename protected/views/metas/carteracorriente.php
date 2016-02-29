<?php
$this->breadcrumbs=array(
	'Metas'=>array('index'),
	'Cartera Corriente',
);

$this->menu=array(
array('label'=>'List Metas','url'=>array('index')),
array('label'=>'Meta Corriente','url'=>array('carteracorriente')),
array('label'=>'Meta Vencida','url'=>array('carteravencida')),    
array('label'=>'Calcular Remuneracion','url'=>array('/usuarios/listarusuarioremuneracion')),    
);

?>

<script type="text/javascript">
        $(document).ready(function(){


$('#Metas_id_proyecto').select2().on('change', function() {
  // alert($('#Metas_id_proyecto').select2().val);
    var valor = $('#Metas_id_proyecto').val(); 
    //alert(valor);
    if(valor == 2){
        //$('#monto').textFieldGroup().val()=200;
      $('select#monto_mes_proyecto').prop('disabled', true); 
      $("#Metas_monto").val(valor + 10);
    }
    if(valor <= 3){
        //$('#monto').textFieldGroup().val()=200;
      $('select#monto_mes_proyecto').prop('disabled', true); 
      $("#Metas_monto").val(valor + 100);
    }
    if(valor >= 5){
        //$('#monto').textFieldGroup().val()=200;
      $('select#monto_mes_proyecto').prop('disabled', true); 
      $("#Metas_monto").val(valor + 700);
    }
}).trigger('change');

$('#Metas_porcentaje_meta').select2().on('change', function() {

    var cantidad = $('#Metas_monto').val(); 
    var porcentaje = $('#Metas_porcentaje_meta').val();   
       $("#Metas_monto_mes_proyecto").val(cantidad * porcentaje/100);

   }).trigger('change');

});

</script>
<?php

$form = $this->beginWidget('booster.widgets.TbActiveForm',array(
        'id' => 'inlineForm',
        'type' => 'inline',
        'htmlOptions' => array('class' => 'well'),
));

?>
<h3>META CORRIENTE</h3>
<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php
               $this->widget(
                 'booster.widgets.TbSelect2', array(            
                 'model' => $model,
                 'attribute' => 'id_crm_proyecto',
                 'data' => CHtml::listData(Proyecto::model()->findAll(), 'id_crm_proyecto', 'titulo'),
                 'options' => array(
                   'placeholder' => "Proyecto",
                  //     'id' => "proyecto",
                  /* 'allowClear'=>true,
                   'minimumInputLength'=>2,*/
                 ),
                     
                     // array('empty'=>'','id'=>'area_type','style'=>'width:100%',),
                 'htmlOptions'=>array(
                   'style'=>'width:380px',
                     
                 ),
               ));
   ?>

<?php echo $form->datePickerGroup(
			$model,
			'fecha_inicio',
			array(
				'widgetOptions' => array(
					'options' => array(
                                                'format' => 'yyyy-mm-dd',
						'language' => 'es',
					),
				),
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'hint' => 'Click inside! This is a super cool date field.',
				'prepend' => '<i class="glyphicon glyphicon-calendar"></i>'
			)
		); 
?>

<?php echo $form->datePickerGroup(
			$model,
			'fecha_fin',
			array(
				'widgetOptions' => array(
					'options' => array(
                                                'format' => 'yyyy-mm-dd',
						'language' => 'es',
					),
				),
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'hint' => 'Click inside! This is a super cool date field.',
				'prepend' => '<i class="glyphicon glyphicon-calendar"></i>'
			)
		); 
?>
<br/>
<br/>
<br/>

<?php echo $form->textFieldGroup(
			$model,
			'monto',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'append' => '.00'
			)
		); 
?>
<?php
               $this->widget(
                 'booster.widgets.TbSelect2', array(            
                 'model' => $model,
                 'attribute' => 'porcentaje_meta',
                 'data' => array(
                                         '5' => '5',
                    '10' => '10',
                    '15' => '15',
                    '20' => '20',
                    '25' => '25',
                    '30' => '30',
                    '35' => '35',
                    '40' => '40',
                    '45' => '45',
                    '50' => '50',
                    '55' => '55',
                    '60' => '60',
                    '65' => '65',
                    '70' => '70',
                    '75' => '75',
                    '80' => '80',
                    '85' => '85',
                    '90' => '90',
                    '95' => '95',
                    '100' => '100'),
                               
                     
          

                 'options' => array(
                   'placeholder' => "%",
                  //     'id' => "proyecto",
                  /* 'allowClear'=>true,
                   'minimumInputLength'=>2,*/
                 ),
                     
                     // array('empty'=>'','id'=>'area_type','style'=>'width:100%',),
                 'htmlOptions'=>array(
                   'style'=>'width:380px',
                     
                 ),
               ));
   ?>

<?php echo $form->hiddenField($model,'cartera',array('type'=>"hidden",'size'=>2,'value'=>1)); ?>
    <?php //echo $form->hiddenField($model,'cartera',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','value'=>1)))); ?>
<?php echo $form->textFieldGroup($model,'monto_mes_proyecto',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'metas-grid',
'dataProvider'=>$metas->search(),
//'filter'=>$model,
'columns'=>array(
		//'id_meta',
		'idProyecto.titulo',
		'fecha_inicio',
		'fecha_fin',
		'monto',
		'porcentaje_meta',
		
		'monto_mes_proyecto',
array(
    'class' => 'bootstrap.widgets.TbEditableColumn',
  'name' => 'usuarios',
    'editable' => array(
        'type' => 'select',
          'model'     => $metas,
           'attribute' => 'id_usuario',

        'url' => $this->createUrl('actualizar'),
       // 'source'=>editable::source( CHtml::listData(Usuarios::model()->findAll(), 'id_usuario', 'nombre')),
    'source' =>  CHtml::listData(Usuarios::model()->findAll(), 'id_usuario', 'nombre'),
                     
        )
    ),  
		
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
