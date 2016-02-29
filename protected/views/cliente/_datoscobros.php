<div class="row">
    <!--<div class="col-sm-6" style="background-color:lavender;">-->
    <div class="col-sm-6" style="background-color:#f2dede;">
        <div class="list-group">
        <a href="#" class="list-group-item list-group-item-danger">
        
            <p>DATOS COBROS<span class="glyphicon glyphicon-piggy-bank"></span></p> 
            
        </a>    
         
              <table class="list-group-item">
                <tbody>
                    <tr>
                        <td>
                            <?php            
                                echo CHtml::label('Monto Ultimo Pago','',array('size'=>12)); 
                            ?>
                        </td>

                        <td><?php  echo $cliente->monto_ultimo_pago;  ?></td>
                    </tr>    
                    <!--Fecha Ingreos Tramite -->
                    <tr>
                        <td>
                            <?php            
                                echo CHtml::label('Fecha de Ultimo Pago','',array('size'=>12));
                            ?>
                        </td>

                        <td><?php echo $cliente->fecha_ultimo_pago;  ?></td>
                    </tr>
                    
                                
                    <tr>
                        <td>
                            <?php            
                                echo CHtml::label('Monto de Cuota Abono Inicial','',array('size'=>12));
                            ?>
                        </td>

                        <td><?php echo $cliente->total; ?></td>
                    </tr>
                    
                    <tr>
                        <td><?php            
                           echo CHtml::label('Cantidad Cuotas Abono','',array('size'=>12)); ?>
                        </td>            
                        <td><?php echo $cliente->cantidad_de_quotas; ?></td>
                    </tr>
                    
                    <tr>
                        <td><?php            
                           echo CHtml::label('Día de Pago','',array('size'=>8));  ?>
                        </td>            
                        <td><?php echo date("d", strtotime($cliente->fecha_de_pago_abono));  ?> d&iacute;as</td>
                    </tr>  
                    
                                <tr>
                        <td><?php            
                           echo CHtml::label('Monto Mejoras','',array('size'=>8)); ?>
                        </td>            
                        <td><?php echo $cliente->monto_mejoras; ?></td>
                    </tr> 
                    
                                <tr>
                        <td><?php            
                           echo CHtml::label('Cantidad Cuotas Mejoras ','',array('size'=>8)); ?>
                        </td>            
                        <td><?php echo $cliente->cantidad_de_quotas_mejoras; ?></td>
                    </tr> 
                    
                    <!--OJOOO-->
                                <tr>
                        <td><?php            
                           echo CHtml::label('Fecha pago mejoras','',array('size'=>8)); ?>
                        </td>            
                        <td><?php echo $cliente->fecha_de_pago_abono; ?></td>
                    </tr>
                    
                                <tr>
                        <td><?php            
                           echo CHtml::label('Monto Mensualidad Abono','',array('size'=>8)); ?>
                        </td>            
                        <td><?php echo $cliente->monto_quota_abono; ?></td>
                    </tr> 
  
                  
                <div id="demo" class="collapse">   
                    <tr>
                        <td><?php            
                           echo CHtml::label('Monto Mensualidad Mejoras','',array('size'=>8)); ?>
                        </td>            
                        <td><?php echo $cliente->monto_cuota_mejoras; ?></td>
                    </tr> 
            
                    <tr>
                        <td><?php            
                           echo CHtml::label('0-30','',array('size'=>8)); ?>
                        </td>            
                        <td><?php echo $cliente->cartera_30_dias; ?></td>
                    </tr> 
                    
                    
                    <tr>
                        <td><?php            
                           echo CHtml::label('31-60','',array('size'=>8)); ?>
                        </td>            
                        <td><?php echo $cliente->cartera_60_dias; ?></td>
                    </tr> 
                    
                    <tr>
                        <td><?php            
                           echo CHtml::label('61-90','',array('size'=>8)); ?>
                        </td>            
                        <td><?php echo $cliente->cartera_90_dias; ?></td>
                    </tr> 
                        <tr>
                        <td><?php            
                           echo CHtml::label('91-120','',array('size'=>8)); ?>
                        </td>            
                        <td><?php echo $cliente->cartera_120_dias; ?></td>
                    </tr> 
                  </div>
                </tbody>
            </table>                 
        </div>
    </div>
</div>   