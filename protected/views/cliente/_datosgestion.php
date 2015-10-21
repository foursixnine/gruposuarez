<div class="row">
    <div class="col-sm-6" style="background-color:#dff0d8;">
        <div class="list-group">
        <a href="#" class="list-group-item list-group-item-info">
           
            <p>DATOS ULTIMAS GESTIONES<span class="glyphicon glyphicon-list-alt"></span></p> 
        </a>
          <?php 
          foreach ($gestion_old as $row) {
          ?>
         <table class="list-group-item">
                            <tr>
                              <td><strong>Fecha de Acuerdo:</strong></td>
                              <td><?php $row['fecha_acuerdo']; ?></td>
                            </tr>

                            <tr>
                              <td><strong>Observaciones:</strong></td>
                              <td><?php $row['observaciones']; ?></td>
                            </tr>
                            <tr>
                             <td><strong>Tipo de Contacto:</strong></td>
                             <td>
                             
                             </td>
                            
                        </tr></table>
        <?php }

        ?>  
    </div>
    </div>
</div>


