<?php 
$x=0;
if($data!==null){?>
<table border="1">
    <tr>
        <th>id_gestion</th>
        <th>Fecha de Acuerdo</th>        
        <th>Cobradora</th>
        <th>Observaciones</th>
    </tr>
    
    <?php foreach ($data as $value) { ?>
            <tr <?php echo ($x++)%2==0?"style='background-color:#CCC'":"";?>>
                <td><?php echo $value['id_gestion'];?></td>
                <td><?php echo $value['fecha_acuerdo']; ?></td>
                <td><?php echo $value['observaciones'];?></td>
                <td><?php echo $value['username'];?></td>
            </tr>
    <?php } ?>  
</table>
    
<?php }?>

