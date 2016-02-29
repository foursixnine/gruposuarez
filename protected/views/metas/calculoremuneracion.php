<?php
$this->breadcrumbs=array(
	'Metas'=>array('index'),
	'Cartera Corriente',
);
/*
$this->menu=array(
array('label'=>'List Metas','url'=>array('index')),
array('label'=>'Meta Corriente','url'=>array('carteracorriente')),
array('label'=>'Meta Vencida','url'=>array('carteravencida')),    
array('label'=>'Asignar Proyecto Cobradora','url'=>array('create')),    
);
*/
?>

<script type="text/javascript">
        $(document).ready(function(){


$('#Metas_id_proyecto').select2().on('change', function() {
  // alert($('#Metas_id_proyecto').select2().val);
    var valor = $('#Metas_id_proyecto').val(); 
    //alert(valor);
    if(valor == 2){
        //$('#monto').textFieldGroup().val()=200;
      $('select#monto_mes_proyecto').prop('disabled', true); 
      $("#Metas_monto").val(valor + 10);
    }
    if(valor <= 3){
        //$('#monto').textFieldGroup().val()=200;
      $('select#monto_mes_proyecto').prop('disabled', true); 
      $("#Metas_monto").val(valor + 100);
    }
    if(valor >= 5){
        //$('#monto').textFieldGroup().val()=200;
      $('select#monto_mes_proyecto').prop('disabled', true); 
      $("#Metas_monto").val(valor + 700);
    }
}).trigger('change');

$('#Metas_porcentaje_meta').select2().on('change', function() {

    var cantidad = $('#Metas_monto').val(); 
    var porcentaje = $('#Metas_porcentaje_meta').val();   
       $("#Metas_monto_mes_proyecto").val(cantidad * porcentaje/100);

   }).trigger('change');

});

</script>


  <div class="col-sm-6" style="background-color:#dff0d8;">
        <div class="list-group">
        <a href="#" class="list-group-item list-group-item-info">
            <strong>CARTERA CORRIENTE</strong>
        </a>
<?php $sumcorriente=0;?>
 <?php  foreach($metas as $data){ ?>
           
       <?php if($data->cartera==1){ ?>        
           <table class="list-group-item">
                <tbody>
                    <tr>
                        <td>
                            <?php            
                                echo CHtml::label('Meta:   ', '????');
                            ?>
                        </td>

                        <td><?php  echo $data->monto;  ?></td>
                    </tr>  
                    
                                    
                    <tr>
                        <td>
                            <?php            
                                echo CHtml::label('Proyecto', '????');
                            ?>
                        </td>

                        <td><?php echo $data->idCrmProyecto->titulo; 

                    
                        ?></td>
                    </tr>
                        <tr>
                        

                        <td><?php  $sumcorriente+=$data->monto; 

                    
                        ?></td>
           </table>
       <?php } ?>        
    <?php if($data->cartera==2){ ?>
      
         <?php   
            
        }
 
        } 
        ?>
        </div>
  </div>   

 <div class="col-sm-6" style="background-color:#dff0d8;">
        <div class="list-group">
        <a href="#" class="list-group-item list-group-item-info">
            <strong>CARTERA VENCIDA</strong>
        </a>
<?php $sum=0;?>
 <?php  foreach($metas as $data){ ?>
           
       <?php if($data->cartera==2){ ?>        
           <table class="list-group-item">
                <tbody>
                    <tr>
                        <td>
                            <?php            
                                echo CHtml::label('Meta:   ', '????');
                            ?>
                        </td>

                        <td><?php  echo $data->monto_mes_proyecto;  ?></td>
                    </tr>  
                    
                                    
                    <tr>
                        <td>
                            <?php            
                                echo CHtml::label('Proyecto', '????');
                            ?>
                        </td>

                        <td><?php echo $data->idCrmProyecto->titulo; 

                    
                        ?></td>
                    </tr>
                    
                      <tr>
                        

                        <td><?php  $sum+=$data->monto; 

                    
                        ?></td>
                    </tr>
           </table>
       <?php } ?>        
    <?php if($data->cartera==2){ ?>
 
         <?php   
            
        }
 
        } 
        ?>
        </div>
  </div>   
    <div>
        <p >
            <strong>Caretra Vencidad   <?php echo $sum;?> </strong>
        </p>
    </div>

    <div>
        <p >
            <strong>Caretra Vencidad   <?php echo $sumcorriente;?> </strong>
        </p>
    </div>

