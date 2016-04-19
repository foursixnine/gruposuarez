<div class="row">
    <div class="col-sm-6" style="background-color:#dff0d8;">
        <div class="list-group">
        <a href="#" class="list-group-item list-group-item-info">
           
            <p>DATOS ULTIMAS GESTIONES<span class="glyphicon glyphicon-list-alt"></span></p> 
        </a>
          <?php 

          foreach ($gestion_old as $key=>$row) {
          ?>
         <table class="list-group-item">
                            <tr>
                              <td><strong>Fecha de Acuerdo:</strong></td>
                              <td><?php echo $row['fecha_acuerdo']; ?></td>
                            </tr>

                            <tr>
                              <td><strong>Observaciones:</strong></td>
                              <td><?php echo $row['observaciones']; ?></td>
                            </tr>
                            <tr>
                             <td><strong>Tipo de Contacto:</strong></td>
                              <td><?php if ($row['contactado_llamada']==1){
                                    echo "Contactado (Telefónicamente)";
                              }else{
                                     echo "No Contactado";
                              }
                              


                              ?></td>
                            
                        </tr></table>
        <?php }

        ?>  
    </div>
    </div>

      <?php $this->widget('booster.widgets.TbGridView',array(
          'id'=>'gestion-seguimiento-grid',
          'dataProvider'=>$gestionseguimiento->seguimientogestion(86),
        //  'filter'=>$gestionseguimiento,
          'columns'=>array(
              'id_gestion',
            //   id_gestion
              'fecha_gestion_seguimiento',
              'observaciones',
         
      ),
      )); 

   /*   $this->widget(
'bootstrap.widgets.TbDetailView',
array(
'type'=>'bordered condensed',
'data' => array(
'id' =>array('view', 'id'=>$gestionseguimiento->id_gestion_seguimiento),
'Shop Name' => $gestionseguimiento->observaciones,
'Category' => $gestionseguimiento->fecha_gestion_seguimiento,
),
'attributes' => array(
array('name' => 'Shop Name', 'label' => 'Shop name'),
array('name' => 'Category', 'label' => 'Category'),
array('label' => 'ID', 'value' => CHtml::link(CHtml::encode($gestionseguimiento->id_gestion_seguimiento), 
  array('view', 'id'=>$gestionseguimiento->id_gestion_seguimiento))),
),
)
);*/

?>
</div>

<?php $var=false;?>


