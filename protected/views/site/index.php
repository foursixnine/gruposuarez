<style>

.cajademo {
 margin: 0;
 padding: 10px 40px 20px 80px;
}
.cajademo span {
 float: left;
 margin: 0 8px;
 padding: 4px;
 background: #990000;
 color: #eee;
 border: 2px solid #333;
}




</style>

    
    <!-- Cobros -->
 <div class="cajademo">   


    <a href="<?php echo Yii::app()->createUrl('gestion'); ?>">    
        <img width="120px" height="120px" src="<?php echo Yii:: app()->baseUrl.'/images/cobros.png' ?> " />
        <button type="button" class="btn btn-warning">COBROS</button>
  
    </a>   
   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; 
    <!-- Tableros -->
    <a href="<?php echo Yii::app()->createUrl('metas/indexmetas'); ?>">
        <img width="120px" height="120px" src="<?php echo Yii:: app()->baseUrl.'/images/tableros.png' ?> "  />
        <button type="button" class="btn btn-warning">METAS</button>
    </a>

    <!-- Remuneracion -->
    <a href="<?php echo Yii::app()->createUrl('calculoRemuneracion/calculoremunecacioncobradora/'); ?>">    
        <img width="120px" height="120px" src="<?php echo Yii:: app()->baseUrl.'/images/remuneracion.png' ?> " />
             <button type="button" class="btn btn-warning">REMUNERACI&Oacute;N</button>
     
    </a>    
    &nbsp; &nbsp; &nbsp;
    <!-- Tramites -->
    <a href="<?php echo Yii::app()->createUrl('tramite/'); ?>">
        <img width="120px" height="120px" src="<?php echo Yii:: app()->baseUrl.'/images/tramites.png' ?> " />
         <button type="button" class="btn btn-warning">TRAMITES</button>
            
    </a>

    <!-- Tramites -->
    <a href="<?php echo Yii::app()->createUrl('usuarios/inicio/'); ?>">
        <img width="120px" height="120px" src="<?php echo Yii:: app() ->baseUrl.'/images/administracion.png' ?> "  />
        <button type="button" class="btn btn-warning">ADMINISTRACI&Oacute;N</button>
            
    </a>
  
</div>