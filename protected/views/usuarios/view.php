<?php
$this->breadcrumbs=array(
	'Usuarioses'=>array('index'),
	$model->id_usuario,
);
?>
<?php
$this->menu=array(
array('label'=>'Listar Usuarios','url'=>array('index')),
array('label'=>'Crear Usuarios','url'=>array('create')),
array('label'=>'Actualizar Usuarios','url'=>array('update','id'=>$model->id_usuario)),
array('label'=>'Eliminar Usuarios','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_usuario),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Administrar Usuarios','url'=>array('admin')),
);
?>
<br/>

<button type="button" class="btn btn-warning">VER USUARIO #<?php echo $model->id_usuario; ?></button>
<br/>
<br/>
<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_usuario',
		'nombre',
		'apellido',
		'cedula',
		'username',
		'password',
		'session',
),
)); ?>

<br/>
<button type="button" class="btn btn-warning">ACCIONES QUE REALIZA</button>

<?php foreach (Yii::app()->authManager->getAuthItems() as $data){ ?> 
	
          <?php if($data->type == $model->id_usuario){ ?>
   <ul>      
<li>
         <small>
				<p>
					</p>
					<button class="btn btn-primary" type="button">
  <?php echo $data->description; ?>
</button>
				<?php }else{
					echo "";
				} ?>
         </small>
     
  <!--       	
<span class="label label-important">
<?php //$enabled=Yii::app()->authManager->checkAccess($data->name, $model->id_usuario)?>
</span>
-->
            
    </li>
<?php } ?>
</ul>
<?php

//$auth=Yii::app()->authManager;
//editor role



//$auth->assign('jefe_cobros','readerA');
//$bizRule='return !Yii::app()->user->isGuest;';
//$auth->createRole('authenticated', 'authenticated user', $bizRule);
 
//$bizRule='return Yii::app()->user->isGuest;';
//$auth->createRole('guest', 'guest user', $bizRule);

/*
$role = $auth->createRole('analista_cobros', 'Analista de Cobros');
$auth->assign('analista_cobros',3); // adding admin to first user created 
$auth->save();*/

?>