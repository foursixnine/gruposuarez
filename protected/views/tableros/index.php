<?php
/* @var $this TablerosController */

$this->breadcrumbs=array(
	'Tableros',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<p>

<h1>Tableros</h1>



<span class="label label-success">Operativos</span>
<div class="well">
    
   <br/>
  <!-- <a href="#"><span class="label label-danger">Gesti&oacute;n</span></a><br/>-->
    <br/>

 
         <a href="/gruposuarez/tableros/anillos"><span class="label label-danger"> Gestion</span></a> <br/>  
         <br/>    
        <a href="/gruposuarez/tableros/expediente"><span class="label label-danger"> Expedientes</span></a> <br/>    
    
</div>

   
<span class="label label-success">FINANCIERO</span>
<div class="well">
   
    <br/>
    <a href="/gruposuarez/tableros/estatuscartera"><span class="label label-danger">Cartera</span></a><br/>
    <br/>
    <a href="/gruposuarez/tableros/metascobranzas"><span class="label label-danger">Pagos</span></a><br/>

    <br/>
    <a href="/gruposuarez/tableros/recuperacioncartera"><span class="label label-danger">Recuperacion</span></a>  
</div>
</p>
