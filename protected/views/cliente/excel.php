<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//var_dump($clienteexcel);die;
$x=0;
if($clienteexcel!==null){?>

<table>
    <tr>
        <th>Nombre Cliente</th>
        <th>C&eacute;dula</th>
        <th>Proyecto</th>
    </tr>
    
    <?php foreach ($clienteexcel as $value) { ?>
    
            <tr <?php echo ($x++)%2 ==0?"style='background-color:#CCC'":"";?>></tr>
            <td><?php echo $value['nombre']; ?></td>
            <td><?php echo $value['cedula'];?></td>
            <td><?php echo $value['proyecto'];?></td>
            
    <?php    
    }?>
    
</table>
    
<?php }?>

