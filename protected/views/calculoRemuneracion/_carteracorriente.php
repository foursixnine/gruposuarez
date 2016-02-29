<div class="col-sm-6" style="background-color:#dff0d8;">
        <div class="list-group">
        <a href="#" class="list-group-item list-group-item-info">
            <strong>CARTERA CORRIENTE</strong>
        </a>
 <?php //echo $pivote_inicio_mes->monto;  ?>
 
         
            
            <?php //var_dump($cartera_corriente);die;?>
            <?php  foreach($cartera_corriente as $data){ ?>
           
       
           <table class="list-group-item">
                    <tr>                     
                       <td colspan="8">
                       <a href="#" class="list-group-item list-group-item-heading">
            <strong><?php echo $data->idCrmProyecto->titulo; ?></strong>
        </a>
                       
                       
                       </td>
                    </tr> 
                    <tr>
                        <td>
                            <?php            
                                echo CHtml::label('Vencido Inicio de Mes:   ', '????');
                            ?>
                        </td>

                        <td><?php //echo $pivote_inicio_mes->monto; 
                                $mes= $mes_actual= date("n")-1;
                                
                                 $data->id_crm_proyecto;
                                         $sum_pivote_inicio_mes= Yii::app()->db->createCommand()
                                         ->select('sum(monto)')
                                         ->from('pivote')
                                         ->where('mes='."'".$mes."'".' and id_crm_proyecto='."'".$data->id_crm_proyecto."'")
                                         ->queryScalar();
                                ?>

                                <strong><font color="#610B0B">$
                                        <?php echo $sum_pivote_inicio_mes; ?>
                                </strong></font>        
                        </td>
                    </tr>  
                    
                    <tr>
                        <td>
                            <?php            
                                echo CHtml::label('Vencido Final de Mes:   ', '????');
                            ?>
                        </td>

                        <td><?php  //echo $pivote_final_mes->monto; 
                        
                        $mes_actual= date("n");
                                 $sum_pivote_final_mes= Yii::app()->db->createCommand()
                                 ->select('sum(monto)')
                                 ->from('pivote')
                                 ->where('mes='."'".$mes_actual."'".' and id_crm_proyecto='."'".$data->id_crm_proyecto."'")
                                 ->queryScalar();
                        ?>
                                 <strong><font color="#610B0B">$
                                   echo $sum_pivote_final_mes;
                                 </strong></font>
                        
                        
                        
                        
                        ?></td>
                    </tr>  
                    
                    <tr>
                        <td>
                            <?php            
                                echo CHtml::label('Meta Corriente', '????');
                            ?>
                        </td>

                        <td>

                            <strong><font color="#610B0B">$
                                    <?php echo $data->monto_mes_proyecto; ?>
                            </strong></font>
                        </td>
                    </tr>
                <tr>
                        <td>
                            <?php            
                                echo CHtml::label('Diferencia de Cartera:', '????');
                            ?>
                        </td>

                        <td><?php  
                                    echo $resta = (($sum_pivote_final_mes) - ($sum_pivote_inicio_mes));
                    
                            ?>
                        </td>
                    </tr>
                    
                    
                    <tr>
                        <td>
                            <?php            
                                echo CHtml::label('Cumplimiento', '????');
                            ?>
                        </td>

                        <td>
                               <strong bgcolor="#610B0B"> <p style="color: #6600CC; background-color: #ffffff"><?php 
                                                               
                                        $porcentajec = 1.0 - ($resta / $data->monto_mes_proyecto);
                                        $porcentajec_final=$porcentajec*100;
                                        echo number_format($porcentajec_final, 2, '.', '');
                                        ?>   %</p></strong>
                            
                        </td>
                    </tr>
           </table>
 <?php } ?>        

        </div>
  </div>   
