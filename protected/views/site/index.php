<style>

#share-buttons img {
width: 150px;
padding: 0px;
border: 0;
box-shadow: 0;
display: inline;
}

#center {
position: relative;
top:0;
left:0;
right:0;
bottom:0;
margin: auto;
//background: #83C24A;
height: 600px;
width: 400px;
//box-shadow: 0 0 8px rgba(0,0,0,.3);
}




</style>


<!------------------------------------------------------------------------------>

<!------------------------------------------------------------------------------>

    
    <!-- Cobros -->
 <div id="center">   
<table border="0" cellpadding="0" cellspacing="0">
 
    <tr>
        <td align="left">
    <a href="<?php echo Yii::app()->createUrl('gestion'); ?>">    
        <img width="150px" height="150px" src="<?php echo Yii:: app()->baseUrl.'/images/cobros.png' ?> " />
        <button type="button" class="btn btn-warning">COBROS</button>
  
    </a>
   </td>
   <td>
    <!-- Tableros -->
    <a href="<?php echo Yii::app()->createUrl('metas/index'); ?>">
        <img width="150px" height="150px" src="<?php echo Yii:: app()->baseUrl.'/images/tableros.png' ?> "  />
        <button type="button" class="btn btn-warning">METAS</button>
    </a>

    </td>
    



    <td>
    <!-- Remuneracion -->
    <a href="<?php echo Yii::app()->createUrl('calculoRemuneracion/calculoremunecacioncobradora/'); ?>">    
        <img width="150px" height="150px" src="<?php echo Yii:: app()->baseUrl.'/images/remuneracion.png' ?> " />
             <button type="button" class="btn btn-warning">REMUNERACION</button>
     
    </a>  
    </td>
</tr>

<tr>    
    <td>
    <!-- Tramites -->
    <a href="<?php echo Yii::app()->createUrl('tramite/'); ?>">
        <img width="150px" height="150px" src="<?php echo Yii:: app()->baseUrl.'/images/tramites.png' ?> " />
         <button type="button" class="btn btn-warning">TRAMITES</button>
            
    </a>
 </td>

    <td>
    <!-- Tramites -->
    <a href="<?php echo Yii::app()->createUrl('usuarios/inicio/'); ?>">
        <img width="150px" height="150px" src="<?php echo Yii:: app() ->baseUrl.'/images/administracion.png' ?> "  />
        <button type="button" class="btn btn-warning">ADMINISTRACION</button>
            
    </a>
    </td>
</tr>
</table>

</div>