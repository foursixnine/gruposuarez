<div class="container">
    <fieldset class="col-xs-6">
        <legend class="list-group-item list-group-item-success">DATOS GENERALES</legend>
        <div class="col-xs-12">
            <div class="form-group">
                <label for="name" class="col-xs-4 control-label">Nombre</label>
                <div class="col-xs-8">
                    <input type="text" class="form-control" placeholder="control1" value="<?php echo $cliente->nom_cliente; ?>" />
               </div>
               
               <label for="name" class="col-xs-4 control-label">Apellido</label>
               <div class="col-xs-8">
                    <input type="text" class="form-control" placeholder="control1" value="<?php echo $cliente->ape_cliente; ?>" />
               </div>
               
               <label for="name" class="col-xs-4 control-label">LOTE</label>
               <div class="col-xs-8">
                    <input type="text" class="form-control" placeholder="control1" value="XXX" />
               </div>
               
               <label for="name" class="col-xs-4 control-label">ID</label>
               <div class="col-xs-8">
                    <input type="text" class="form-control" placeholder="control1" value="4" />
               </div>
            </div>
        </div>
    </fieldset>
</div>

<div class="container">
    <fieldset class="col-xs-6">
        <legend class="list-group-item list-group-item-danger">DATOS CONTACTO</legend>
        <div class="col-xs-12">
            <div class="form-group">
                <label for="name" class="col-xs-4 control-label">Direcci&oacute;n</label>
                <div class="col-xs-8">
                    <input type="text" class="form-control" placeholder="control1" value="<?php echo $cliente->direccion; ?>" />
               </div>
               
               <label for="name" class="col-xs-4 control-label">Email</label>
               <div class="col-xs-8">
                    <input type="text" class="form-control" placeholder="control1" value="<?php echo $cliente->correo; ?>" />
               </div>
               
               <label for="name" class="col-xs-4 control-label">N&uacute;mero de Casa</label>
               <div class="col-xs-8">
                    <input type="text" class="form-control" placeholder="control1" value="96" />
               </div>
               
               <label for="name" class="col-xs-4 control-label">Celular</label>
               <div class="col-xs-8">
                    <input type="text" class="form-control" placeholder="control1" value="<?php echo $cliente->telefono2; ?>" />
               </div>
            </div>
        </div>
    </fieldset>
</div>
