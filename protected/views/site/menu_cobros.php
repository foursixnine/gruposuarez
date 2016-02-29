<style>
.btn-cobros { 
  color: #F4F0FA; 
  background-color: #5CBD1B; 
  border-color: #09B3AB; 
} 
 
.btn-cobros:hover, 
.btn-cobros:focus, 
.btn-cobros:active, 
.btn-cobros.active, 
.open .dropdown-toggle.btn-cobros { 
  color: #F4F0FA; 
  background-color: #49247A; 
  border-color: #09B3AB; 
} 
 
.btn-cobros:active, 
.btn-cobros.active, 
.open .dropdown-toggle.btn-cobros { 
  background-image: none; 
} 
 
.btn-cobros.disabled, 
.btn-cobros[disabled], 
fieldset[disabled] .btn-cobros, 
.btn-cobros.disabled:hover, 
.btn-cobros[disabled]:hover, 
fieldset[disabled] .btn-cobros:hover, 
.btn-cobros.disabled:focus, 
.btn-cobros[disabled]:focus, 
fieldset[disabled] .btn-cobros:focus, 
.btn-cobros.disabled:active, 
.btn-cobros[disabled]:active, 
fieldset[disabled] .btn-cobros:active, 
.btn-cobros.disabled.active, 
.btn-cobros[disabled].active, 
fieldset[disabled] .btn-cobros.active { 
  background-color: #5CBD1B; 
  border-color: #09B3AB; 
} 
 
.btn-cobros .badge { 
  color: #5CBD1B; 
  background-color: #F4F0FA; 
}
</style>

<?php
$this->breadcrumbs=array(
	'Clientes',
);

$this->menu=array(
	array('label'=>'Create Clientes','url'=>array('create')),
	array('label'=>'Manage Clientes','url'=>array('admin')),

);
?>

<h1>Clientesss</h1>
<p>pp</p>

<a href="#" class="btn btn-cobros">Sample link></a>
<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
