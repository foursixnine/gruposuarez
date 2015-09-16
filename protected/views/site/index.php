<style>

#share-buttons img {
width: 150px;
padding: 0px;
border: 0;
box-shadow: 0;
display: inline;
}
</style>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>



<!------------------------------------------------------------------------------>

<!------------------------------------------------------------------------------>
<div>
    
    <!-- Cobros -->
    
    <a href="<?php echo Yii::app()->createUrl('gestion'); ?>">    
        <img width="150px" height="150px" src="<?php echo Yii:: app()->baseUrl.'/images/cobros.png' ?> " />
        <button type="button" class="btn btn-warning">COBROS</button>
  
    </a>
 <br/>
    <!-- Tableros -->
    <a href="<?php echo Yii::app()->createUrl('metas/index'); ?>">
        <img width="150px" height="150px" src="<?php echo Yii:: app()->baseUrl.'/images/tableros.png' ?> "  />
          <button type="button" class="btn btn-warning">METAS</button>
       
    </a>
 <br/>
    <!-- Remuneracion -->
    <a href="<?php echo Yii::app()->createUrl('calculoRemuneracion/calculoremunecacioncobradora/'); ?>">    
        <img width="150px" height="150px" src="<?php echo Yii:: app()->baseUrl.'/images/remuneracion.png' ?> " />
             <button type="button" class="btn btn-warning">REMUNERACION</button>
     
    </a>  
    <br/>
    
    <!-- Tramites -->
    <a href="<?php echo Yii::app()->createUrl('tramite/'); ?>">
        <img width="150px" height="150px" src="<?php echo Yii:: app()->baseUrl.'/images/tramites.png' ?> " />
         <button type="button" class="btn btn-warning">TRAMITES</button>
            
    </a>
 <br/>
    <!-- Tramites -->
    <a href="<?php echo Yii::app()->createUrl('usuarios/inicio/'); ?>">
        <img width="150px" height="150px" src="<?php echo Yii:: app() ->baseUrl.'/images/administracion.png' ?> "  />
        <button type="button" class="btn btn-warning">ADMINISTRACION</button>
            
    </a>
    
</div>
