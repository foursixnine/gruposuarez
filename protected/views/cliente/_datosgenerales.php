<script>

$(function(){



    var url_parts = location.href.split('/');
       var last_segment = url_parts[url_parts.length-1];
alert(last_segment);
    /*var last_segment = url_parts[url_parts.length-1];

    $('.nav-tabs a[href="' + last_segment + '"]').parents('li').addClass('active');
*/


  $('#demo').on('hide.bs.collapse', function () {
    $('#button').html('<span class="glyphicon glyphicon-collapse-down"></span> Show');
  })
  $('#demo').on('show.bs.collapse', function () {
    $('#button').html('<span class="glyphicon glyphicon-collapse-up"></span> Hide');
  })
})
</script>
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


