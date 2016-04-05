<meta http-equiv="Content-Type" charset=utf-8">
<?php   $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'tableros-form',
  'htmlOptions' => array('class' => 'form-inline'),
	'enableAjaxValidation'=>false,
)); 

$this->breadcrumbs=array(
	'Tableros Operativos'=>array('index'),
	'Tramites',
);

$this->menu=array(

array('label'=>'Volver','url'=>'index'),    
);
?>
<?php $this->endWidget(); ?>
<script type="text/javascript" src="http://code.highcharts.com/highcharts.js">
</script>
<script type="text/javascript" src="http://code.highcharts.com/modules/exporting.js">
</script>
       
<br/>

<button type="button" class="btn btn-warning">TIEMPOS POR BANCOS</button>

<br/><br/><br/>

<?php echo $form->errorSummary($model); ?>
<div class="form-group">
    
        <?php echo $form->labelEx($model, 'Banco');?>
        <!-- Auto Completar Acuerdo de Cobros -->     
        <?php
                    $this->widget(
                      'booster.widgets.TbSelect2', array(
                      'model' => $model,
                      'attribute' => 'id_banco',
                      'data' => CHtml::listData(Banco::model()->findAll(), 'id_banco', 'descripcion'),
                      'options' => array(
                        'placeholder' => "BANCO",
                             'allowClear'=>true,
                       /* 'allowClear'=>true,
                        'minimumInputLength'=>2,*/
                      ),
                      'htmlOptions'=>array(
                        'style'=>'width:380px',
                      ),
                    ));
        ?>
</div>      
<br/><br/>           
<div class="form-group">
     
          <?php echo $form->labelEx($model, 'Tramitadora'); ?>
           
          
      <?php
                    $this->widget(
                      'booster.widgets.TbSelect2', array(
                      'model' => $model,
                      'attribute' => 'id_usuario',
                      'data' => CHtml::listData(Usuarios::model()->findAll(), 'id_usuario', 'nombre'),
                      'options' => array(
                        'placeholder' => "TRAMITADORA",
                       'allowClear'=>true,
                      //  'minimumInputLength'=>2,
                      ),
                      'htmlOptions'=>array(
                        'style'=>'width:380px',
                      ),
                    ));
            ?>
  
</div>

    <div class="form-group">
       

</div> 
      <br/>     <br/>     
<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Generar' : 'Save',
		));  
    ?>
</div>


<div id="containertablero" style="min-width: 1000px; height: 900px;margin: 0 auto">
    
<?php
$this->Widget('ext.highcharts.HighchartsWidget', array(
 
    'options' =>array(
        'chart' =>array(
            'type'=> 'column'
        ),
        'title'=>array(
            'text'=>'TIEMPOS DE BANCO POR PASOS'
        ),
        'subtitle'=>array(
            'text'=>''
        ),
        'xAxis'=>array(
            'categories'=> $dataSeries,
            'crosshair'=> true
        ),
        'yAxis'=>array(
            'min'=> 0,
            'title'=> array(
                'text'=>''
            )
        ),
        'tooltip'=>array(
            'headerFormat'=>'<span style="font-size:10px">{point.key}</span><table>',
            'pointFormat'=>'<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
            'footerFormat'=> '</table>',
            'shared'=> true,
            'useHTML'=> true
        ),
        'plotOptions'=> array(
            'column'=> array(
                'pointPadding'=> 0.2,
                'borderWidth'=> 0
            )
        ),
        'series'=>$dataCategories,
    )
  ));
  ?>


</div>   


  
