<div class="row">
    <div class="col-sm-6" style="background-color:#dff0d8;">
        <div class="list-group">
        <a href="#" class="list-group-item list-group-item-info">
           
            <p>DATOS GENERALES DEL CLIENTE <span class="glyphicon glyphicon-home"></span></p> 
        </a>
            <table class="list-group-item">
                <tbody>
                    <tr>
                        <td>
                            <?php            
                                echo CHtml::label('Nombre:   ', '????');
                            ?>
                        </td>

                        <td><?php  echo $cliente->nombre_de_empresa;  ?></td>
                    </tr>    
                    
                
                    <tr>
                        <td>
                            <?php            
                                echo CHtml::label('Cedula:   ', '????');
                            ?>
                        </td>

                        <td><?php  echo $cliente->cedula;  ?></td>
                    </tr> 
                    
               
                    <tr>
                        <td>
                            <?php            
                                echo CHtml::label('ID Cliente:   ', '????');
                            ?>
                        </td>

                        <td><?php  echo $cliente->id_cliente;  ?></td>
                    </tr>                   
                    
                                
                    <tr>
                        <td>
                            <?php            
                                echo CHtml::label('Proyecto', '????');
                            ?>
                        </td>

                        <td><?php echo $cliente->proyecto; ?></td>
                    </tr>
                    
                    <tr>
                        <td><?php            
                           echo CHtml::label('Lote', '????'); ?>
                        </td>            
                        <td><?php echo $cliente->numero_de_lote; ?></td>
                    </tr>
                    
               
                    </tr>    
                </tbody>
            </table>
    </div>
    </div>
</div>


