<?php
$this->breadcrumbs=array(
	'Gestion'=>array('index'),
	'Administración',
);

$this->menu=array(
array('label'=>'Listar Gestion','url'=>array('admin')),
array('label'=>'Detalle de Cliente','url'=>array('cliente/detalle')),
array('label'=>'Reporte de Cobros','url'=>array('gestion/indexreportes')),
);

?>
<br/><br/>
<!-----------------------------AGENDA DE GESTION --------------------------------------->


<br/>
<!--<span>INICIAR GESTI&Oacute;N DE COBROS</span>-->
<div class="">
       <!-- Remuneracion -->
    <a href="<?php echo Yii::app()->createUrl('cliente/detalle'); ?>">
  
        <img width="120px" height="120px" src="<?php echo Yii:: app()->baseUrl.'/images/gestioncobros.png' ?> " />
        <button type="button" class="btn btn-warning">INICIAR GESTION DE COBROS</button>
     
    </a>      
    <!-- Tramites -->
    <a href="<?php echo Yii::app()->createUrl('cliente/admin'); ?>">
        <img width="120px" height="120px" src="<?php echo Yii:: app()->baseUrl.'/images/perfil.png' ?> "  />
        <button type="button" class="btn btn-warning">PERFIL CLIENTE</button>
            
    </a>
</div>
<br/>


<button type="button" class="btn btn-warning">AGENDA DE GESTI&Oacute;N</button>

<div>
<?php 
$this->widget('booster.widgets.TbGridView',array(
//$this->widget('zii.widgets.grid.CGridView',array(
'id'=>'agendagestion-grid',
'dataProvider'=>$model->agendagestion(),
'filter'=>$model,   
'columns'=>
        array(
            'idClienteGs.nombre_de_empresa',
            'idClienteGs.cedula',
            'fecha_creacion',
            'idClienteGs.numero_de_lote',
        array(
        'name'=>'fecha_acuerdo',
        'header'=>'Fecha de Acuerdo',
        'filter'=>false,
        ),     
               
        array(
 //'prompt'=>'Please select the minimum value',

   
        'name'=>'id_acuerdo_cobros',

        'header'=>'Acuerdo',
            
        'value'=> 'CHtml::encode($data->idAcuerdoCobros["descripcion"])',

     'filter'=>CHtml::listData(AcuerdoCobros::model()->findAll(), 'id_acuerdo_cobros', 'descripcion'),
//'options' => array('unit'=>array('selected'=>true))

  ),            
        array(
          'class' => 'bootstrap.widgets.TbToggleColumn',
          'toggleAction' => 'gestion/toggle',
          'name' => 'id_cumplimiento',
          'header' => 'Cumplimiento',
                        'filter'=>false,
          ),  
        array(
            'class'=>'CButtonColumn',
            'template'=>'{ver}',
            'buttons'=>array
        (
        'ver' => array
        (
            'label'=>'Ver Cliente',
            'imageUrl'=>Yii::app()->request->baseUrl.'/images/view.png',
            'url'=>'Yii::app()->createUrl("cliente/perfilcliente", array("id"=>$data->id_cliente))',
        ),
     ),
        ),
),
    
    
         
        
));
 
 ?>


</div>


<br/>
<button type="button" class="btn btn-warning">MAS B&Uacute;SCADOS</button>

<div class="">

 <?php 
 //$this->widget('zii.widgets.grid.CGridView',array(
$this->widget('booster.widgets.TbGridView',array(
'id'=>'masbuscados-grid',
'dataProvider'=>$cliente->search90(),
'filter'=> $cliente, 
'columns'=>array(
        'nombre_de_empresa',
        'cedula',
        'cartera_30_dias',
        'cartera_60_dias',
        'cartera_90_dias',
    	'numero_de_lote',
     array(
        'name'=>'id_proyecto',
        'header'=>'Proyecto',
        'value'=> 'CHtml::encode($data->idProyecto["titulo"])',
        'filter'=>CHtml::listData(Proyecto::model()->findAll(), 'id_crm_proyecto', 'titulo'),
        ), 
      
    array
    (
        'class'=>'CButtonColumn',
        'template'=>'{crear}',
        'buttons'=>array
        (
            'crear' => array
            (
                'label'=>'Iniciar Gestion',
            //    'imageUrl'=>Yii::app()->request->baseUrl.'/images/email2.png',
                'url'=>'Yii::app()->createUrl("gestion/create", array("id"=>$data->id_cliente))',
            ),
               

        ),
    ),
),
)); 

?>   
 
</div>

<br/>

<!--<a href="<?php echo Yii::app()->createUrl("usuarios/email");?>"><span class="label label-info">Email</span></a>
-->
<br/>
<button type="button" class="btn btn-warning">AVISO DE RETIRO</button>

<a href="<?php echo Yii::app()->createUrl("cliente/retiro");?>"><span class="label label-info">Email</span></a>
<div class="">

 <?php 
 //$this->widget('zii.widgets.grid.CGridView',array(
$this->widget('booster.widgets.TbGridView',array(
'id'=>'avisoretiro-grid',
'dataProvider'=>$retiro->search120(),
'filter'=> $retiro, 
'columns'=>array(
      //  'nombre',
        'nombre_de_empresa',       
        'cartera_30_dias',
        'cartera_60_dias',
        'cartera_90_dias',
        'cartera_120_dias',
    	'numero_de_lote',
       array(
        'name'=>'id_proyecto',
        'header'=>'Proyecto',
        'value'=> 'CHtml::encode($data->idProyecto["titulo"])',
        'filter'=>CHtml::listData(Proyecto::model()->findAll(), 'id_crm_proyecto', 'titulo'),
        ), 
      
    array
    (
        'class'=>'CButtonColumn',
        'template'=>'{crear}',
        'buttons'=>array
        (
            'crear' => array
            (
                'label'=>'Iniciar Gestion',
            //    'imageUrl'=>Yii::app()->request->baseUrl.'/images/email2.png',
                'url'=>'Yii::app()->createUrl("gestion/create", array("id"=>$data->id_cliente))',
            ),
        ),
    ),
),
)); 

?>   
 
</div>

