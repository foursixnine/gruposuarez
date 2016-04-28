<?php
$this->breadcrumbs=array(
	'Usuarioses'=>array('index'),
	$model->id_usuario,
);
?>
<?php
$this->menu=array(
array('label'=>'Volver','url'=>array('/')),
);
?>
<br/>

<button type="button" class="btn btn-warning">VER USUARIO #<?php echo $model->id_usuario; ?></button>
<br/>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'nombre',
		'apellido',
		'username',
		'password',
),
)); ?>

         
    </li>

</ul>
