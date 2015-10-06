<div class="row">
    <div class="col-sm-6" style="background-color:#dff0d8;">
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-info">
        
                <p>DATOS CONTACTO <span class="glyphicon glyphicon-phone-alt"></span></p> 
            </a>
     
                 <table class="list-group-item"">
                <tbody>
                    <tr>
                        <td>
                            <?php            
                                 echo CHtml::label('Dirección: ', '????');
                            ?>
                        </td>

                        <td><?php  echo $cliente->direccion;  ?></td>
                    </tr>    
                    <!--Fecha Ingreos Tramite -->
                    <tr>
                        <td>
                            <?php            
                                echo CHtml::label('Correo: ', '????');
                            ?>
                        </td>

                        <td><?php echo $cliente->correo;  ?></td>
                    </tr>
                    
                                
                    <tr>
                        <td>
                            <?php            
                                echo CHtml::label('Telef. Casa:   ', '????');
                            ?>
                        </td>

                        <td><?php echo $cliente->numero_casa; ?></td>
                    </tr>
                    
                    <tr>
                        <td><?php            
                           echo CHtml::label('Telefono Celular', '????');?>
                        </td>            
                        <td><?php echo $cliente->numero_celular; ?></td>
                    </tr>
                    
                     <tr>
                        <td><?php            
                          echo CHtml::label('Otro', '????');?>
                        </td>            
                        <td><?php echo $cliente->numero_adicional; ?></td>
                    </tr>                  
                </tbody>
            </table>
 
     
    </div>
  </div>
</div>