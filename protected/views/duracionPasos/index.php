<?php
$this->breadcrumbs=array(
	'Duración Pasos',
);

$this->menu=array(
array('label'=>'Crear Duración de Pasos','url'=>array('create')),
array('label'=>'Administrar Duración de Pasos','url'=>array('admin')),
);
?>
<br/>
<a href="<?php echo Yii::app()->createUrl('usuarios/inicio/'); ?>">
   
    <button type="button" class="btn btn-warning">DURACI&Oacute;N PASOS</button>
        
</a>


<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
