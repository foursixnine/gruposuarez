<?php
$this->menu=array(
array('label'=>'Volver','url'=>array('tramite/admin')),

);
?>
<?php $collapse = $this->beginWidget('booster.widgets.TbCollapse'); ?>
<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h1 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
          PASO 1
        </a>
      </h1>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in">
      <div class="panel-body">
       
             <?php 
         
           foreach ($tramitesliquidados as $valor=>$clave) {    
             
            if($clave['id_paso']==1){
                
            echo $message = "<table>
                                <tr>
                                    <td><strong>Fecha de Inicio del Tramite:</strong></td>
                                    <td> ".$clave['fecha_inicio']."</td>
                                </tr>
                                <tr>
                                    <td><strong>Fecha Paso:</strong></td>
                                    <td> ".$clave['fecha_paso']."</td>
                                </tr>
                                <tr>
                                    <td><strong>Fecha de Inicio del Tramite:</strong></td>
                                    <td> ".$clave['fecha_inicio']."</td>
<tr>
                                    <td><strong>Fecha de Inicio del Tramite:</strong></td>
                                    <td> ".$clave['id_paso']."</td>
                                </tr>                                 </tr>                                

                           </table>";
            }else{
                echo "Nada";
            }
        }

        ?>  
      </div>
    </div>
  </div>
    
    
  <div class="panel panel-default">
    <div class="panel-heading">
      <h2 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
          Collapsible Group Item #2
        </a>
      </h2>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse">
      <div class="panel-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h2 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
          Collapsible Group Item #3
        </a>
      </h2>
    </div>
    <div id="collapseThree" class="panel-collapse collapse">
      <div class="panel-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
</div>
<?php $this->endWidget(); ?>