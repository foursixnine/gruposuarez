<div class="row">
    <!--<div class="col-sm-6" style="background-color:lavender;">-->
    <div class="col-sm-6" style="background-color:#dff0d8;">
        <div class="list-group">
        <a href="#" class="list-group-item list-group-item-info">
    
        <p>DATOS ULTIMAS GESTIONES <span class="glyphicon glyphicon-list-alt"></span></p> 
        </a>
          <?php 
         //     var_dump($gestion_old);die;
          foreach ($gestion_old as $row) {

            echo $message = "<table><tr>
                            <td><strong>Fecha de Acuerdo:</strong></td>
                            <td style='border: 1px solid #E2E2E2; height:30px; padding-left:5px; padding-right: 5px;'> ".$row['fecha_acuerdo']."</td>
                            </tr>
                            <tr>
                            <td><strong>Observaciones:</strong></td>
                            <td style='border: 1px solid #E2E2E2; height:30px; padding-left:5px; padding-right: 5px;'> ".$row['observaciones']."</td>
                            </tr>
                            <tr>
                             <td><strong>Tipo de Contacto:</strong></td>
                             <td style='border: 1px solid #E2E2E2; height:30px; padding-left:5px; padding-right: 5px;'>
                             
                             </td><br/>
                            
                        </tr></table>";
        }

        ?>  
    </div>
    </div>
</div>


