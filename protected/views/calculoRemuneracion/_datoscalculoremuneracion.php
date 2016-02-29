
  <div class="col-sm-6" style="background-color:#dff0d8;">
        <div class="list-group">
        <a href="#" class="list-group-item list-group-item-info">
            <strong>CARTERA CORRIENTE - <?php echo $meta_corriente->idCrmProyecto->titulo;?></strong>
        </a>
 
<!--****************************CARTERA CORRIENTE***************************-->
          
  <?php if($meta_corriente->id_tipo_meta == 2){ ?>        
           <table class="list-group-item">
                <tbody>
                    <tr>
                        <td>
                            <?php            
                                echo CHtml::label('Vencido Inicio de Mes:   ', '????');
                            ?>
                        </td>

                        <td><?php  //echo $meta_corriente->monto_mes_proyecto;
                        
                          echo $pivote_inicio_mes->monto;
                              ?></td>
                    </tr>  
                    
                    <tr>
                        <td>
                            <?php            
                                echo CHtml::label('Vencido Final de Mes:   ', '????');
                            ?>
                        </td>

                        <td><?php  echo $pivote_final_mes->monto=106949;   ?></td>
                    </tr>
                    
                            
                    <tr>
                        <td>
                            <?php            
                                echo CHtml::label('Meta Corriente', '????');
                            ?>
                        </td>

                        <td><?php echo $metas->monto_mes_proyecto; 

                    
                        ?></td>
                    </tr>
                    
                       <tr>
                        <td>
                            <?php            
                                echo CHtml::label('Diferencia de Cartera:', '????');
                            ?>
                        </td>

                        <td><?php  echo $resta = (($pivote_final_mes->monto) - ($pivote_inicio_mes->monto));

                    
                        ?></td>
                    </tr>
                    
                    
                    <tr>
                        <td>
                            <?php            
                                echo CHtml::label('Cumplimiento', '????');
                            ?>
                        </td>

                        <td>
                               <strong bgcolor="#FF3333"> <p style="color: #6600CC; background-color: #ffffff"><?php 
                               //var_dump((int) ($pivote_inicio_mes->monto - 7)); die;
                                       
                                        //El resultado de inicio mes he inicio fin lo divido entre meta corriente de BD META 
                                        
                                        $resultado = $resta / $metas->monto_mes_proyecto  ;
                                        echo number_format($resultado, 2, '.', '');?>   %</p></strong>
                            
                        </td>
                    </tr>
                    
                          
           </table>
         
    <?php 
        }

     ?>            
            
        </div>
  </div>  


  <div class="col-sm-6" style="background-color:#dff0d8;">
        <div class="list-group">
        <a href="#" class="list-group-item list-group-item-info">
            <strong>CARTERA VENCIDAD - <?php echo $meta_corriente->idCrmProyecto->titulo;?></strong>
        </a>
 
<!--****************************CARTERA VENCIDAD***************************-->
          
  <?php if($metas->id_tipo_meta == 1){ ?>        
           <table class="list-group-item">
                <tbody>
                    <tr>
                        <td>
                            <?php            
                                echo CHtml::label('Meta:   ', '????');
                            ?>
                        </td>

                        <td><?php  //echo $meta_corriente->monto_mes_proyecto;
                        
                          echo $metas->monto_mes_proyecto;
                              ?></td>
                    </tr>  
                    
                    <tr>
                        <td>
                            <?php            
                                echo CHtml::label('Cobrado:   ', '????');
                            ?>
                        </td>

                        <td><?php  echo $cobrado;   ?></td>
                    </tr>
                    
                    <tr>
                        <td>
                            <?php            
                                echo CHtml::label('Cumplido', '????');
                            ?>
                        </td>

                        <td>
                               <strong><?php $porcentajev = $cobrado / $metas->monto_mes_proyecto ;?>
                                     <?php echo number_format($porcentajev, 2, '.', '');?>   %</strong>
                            
                        </td>
                    </tr>
                    
   
                    
           </table>
         
    <?php 
        }
        
     ?>            
            
        </div>
  </div>  
<br/><br/><br/><br/><br/><br/><br/><br/><br/>