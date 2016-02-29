<div class="col-sm-6" style="background-color:#dff0d8;">
        <div class="list-group">
        <a href="#" class="list-group-item list-group-item-info">
            <strong>INCREMENTO O DECREMENTO</strong>
        </a>
        <br/>
        <p>
          <strong>Nota:</strong>El incremento de la cartera no puede exceder del <strong>5%</strong>
          con respecto al mes anterior. 
        </p>
 <?php 
 $sumcorriente=0;
 $cobradoc=0;
 $sum=0;
 $mes_actual= date("n");
 ?>
 
          
            
            <?php //var_dump($cartera_corriente);die;?>
            <?php  foreach($cartera_vencidad as $data){ ?>
           
       
           <table class="list-group-item">
                                        <tr>                     
                       <td colspan="8">
                       <a href="#" class="list-group-item list-group-item-heading">
            <strong><?php echo $data->idCrmProyecto->titulo; ?> </strong>
        </a>
                       
                       
                       </td>
                    </tr> 
                    <tr>
                        <td>
                            <?php            
                                echo CHtml::label('Mes Anterior:   ', '????');
                            ?>
                        </td>

                        <td>
                            <?php           
                                $mes= $mes_actual= date("n")-1;
                                $data->id_crm_proyecto;
                                $sum_pivote_inicio_mes= Yii::app()->db->createCommand()
                                ->select('sum(monto)')
                                ->from('pivote')
                                ->where('mes='."'".$mes."'".' and id_crm_proyecto='."'".$data->id_crm_proyecto."'")
                                ->queryScalar();
                            ?>
                            <strong><font color="#610B0B">$    
                                <?php 
                                 echo number_format($sum_pivote_inicio_mes,2,'.',',');
                                  ?>
                            </strong></font>
                        </td>
                    </tr>  
                    
                    <tr>
                        <td>
                            <?php            
                                echo CHtml::label('Mes Actual:   ', '????');
                            ?>
                        </td>

                        <td>
                            <?php
                                 $mes_actual= date("n");
                                 $sum_pivote_final_mes= Yii::app()->db->createCommand()
                                 ->select('sum(monto)')
                                 ->from('pivote')
                                 ->where('mes='."'".$mes_actual."'".' and id_crm_proyecto='."'".$data->id_crm_proyecto."'")
                                 ->queryScalar();
                            ?>   
                            <strong><font color="#610B0B">$  
                              <?php  
                                    echo number_format($sum_pivote_final_mes,2,'.',',');
                              ?>
                            </strong></font>  
                        </td>
                    </tr>                
                     <tr>
                        <td>
                            <?php            
                                echo CHtml::label('Diferencia', '????');?>
                                </td>
                                
                                <td>
                                    <strong><font color="#610B0B">$
                                    <?php
                                            $diferencia =  (($sum_pivote_final_mes) - ($sum_pivote_inicio_mes));
                                            echo number_format($diferencia,2,'.',',');
                                            $total = ((int)$diferencia / (int)$sum_pivote_inicio_mes)*100;   
                                                 // echo $total;die;
                                    ?>
                                    </strong></font>      
                            
                        </td>

                    </tr>
                     <tr>
                        <td>
                            <?php            
                                echo CHtml::label('Porcentaje', '????');
                            ?>
                        </td>

                        <td>
                                <strong><font color="#610B0B">
                                    <?php  echo number_format($total, 2, '.', '');?> %

                                </strong></font>  
                            
                        </td>
                    </tr>
                    <tr>
                         <td>
                            <?php            
                                echo CHtml::label('Cumplimiento', '????');
                            ?>
                        </td>
                           <td>
                              <?php 
                                    if ($total <= 5){
                                        echo '<strong><font color="#610B0B">100 %</strong></font>'; 
                                    }elseif($total == 6 || $total <= 10) {
                                        echo '<strong><font color="#610B0B">70 %</strong></font>';
                                    }else{
                                         echo '<strong><font color="#610B0B">0 %</strong></font>';
                                    }

                              ?>  
                            
                        </td>
                    </tr>
                       
           </table>
 <?php } ?>        

            <?php $sum;?>
        </div>
</div>
                
