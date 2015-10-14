<?php
$this->breadcrumbs=array(
	'Gestions'=>array('index'),
	'gestioncobros',
);

$this->menu=array(
	array('label'=>'Listar Gestion','url'=>array('index')),
	array('label'=>'Administrar Gestion','url'=>array('admin')),
);
?>

<br />
<br />
<br />

<div class="container">
  
    <fieldset class="col-xs-6">
        <legend>DATOS GENERALES</legend>
        <div class="col-xs-12">
            <div class="form-group">
                <label for="name" class="col-xs-4 control-label">Nombre</label>
                <div class="col-xs-8">
                    <input type="text" class="form-control" placeholder="control1" value="<?php echo $cliente->nom_cliente; ?>" />
               </div>
               
               <label for="name" class="col-xs-4 control-label">Apellido</label>
               <div class="col-xs-8">
                    <input type="text" class="form-control" placeholder="control1" value="<?php //echo $id_cliente; ?>" />
               </div>
               
               <label for="name" class="col-xs-4 control-label">LOTE</label>
               <div class="col-xs-8">
                    <input type="text" class="form-control" placeholder="control1" value="XXX" />
               </div>
               
               <label for="name" class="col-xs-4 control-label">ID</label>
               <div class="col-xs-8">
                    <input type="text" class="form-control" placeholder="control1" value="4" />
               </div>
            </div>
        </div>
    </fieldset>
</div>

<div>  
    <fieldset class="col-xs-6">
        <legend>GESTI&Oacute;N TELEF&Oacute;NICA</legend>
        <div class="col-xs-12">
            <div class="form-group">
                <label for="name" class="col-xs-4 control-label"> </label>
                <div class="col-xs-8">

<?php /*echo $this->renderPartial('_form', array(
                                        'model'=>$model,
                                       // 'id_cliente'=>$id_cliente,   
                                         )); */?>
                </div>
            </div>
        
        </div>
    </fieldset>

</div>


