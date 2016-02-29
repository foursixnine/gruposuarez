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


    
<div class="">
       <!-- Remuneracion -->
    <a href="<?php echo Yii::app()->createUrl('usuarios/create'); ?>">
  
        <img width="120px" height="120px" src="<?php echo Yii:: app()->baseUrl.'/images/creaciondeusuarios.png' ?> " />
        <button type="button" class="btn btn-warning">CREACION DE USUARIO</button>
     
    </a>      
   
    <a href="#">
        <img width="120px" height="120px" src="<?php echo Yii:: app()->baseUrl.'/images/script.png' ?> "  />
        <button type="button" class="btn btn-warning">SCRIPT</button>
            
    </a>
</div>
<br/>

    
<div class="">
     
    <a href="#">
  
        <img width="120px" height="120px" src="<?php echo Yii:: app()->baseUrl.'/images/cradministraciondeaccesos.png' ?> " />
        <button type="button" class="btn btn-warning">ACCESOS</button>
     
    </a>      
 
</div>
<br/>
        
</div>
