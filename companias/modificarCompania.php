<?php 
include_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();

if(isset($_GET['idc']))
{
$compania = $_GET['idc'];
$oMysqlCompania = $oMysql->getCompaniaActiveRecord();
$oCompania = new CompaniasValueObject();
$oCompania->set_idcompanias($compania);
$oCompania = $oMysqlCompania->buscarC($compania);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Baucher Seguros - Compa&ntilde;ias</title>
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
        <!--        <link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.min.css">-->
        <link href="../includes/css/otros.css" rel="stylesheet" type="text/css"/>
        <script src="js/funciones.js" type="text/javascript"></script>
    </head>
    <body onload="document.getElementById('razonSocial').focus();">
        <?php include_once '../includes/php/header.php'; ?>
        <div class="container">
            <form action="accionesCompanias.php" method="get">
        <?php
        foreach ($oCompania as $aCompania)
        {   
            $id = $aCompania->get_idcompanias();
            $rsocial = $aCompania->get_razonsocial();
            $nrop = $aCompania->get_nroproductor();
            $cuit = $aCompania->get_cuit();
            $calle = $aCompania->get_direccion();
            $nroc = $aCompania->get_numero();
            $piso = $aCompania->get_piso();
            $dpto = $aCompania->get_depto();
            $cp = $aCompania->get_cp();
            $telefono = $aCompania->get_telefono();
            $correo = $aCompania->get_email();
            $link = $aCompania->get_link();
            
        }
        ?> 
              <div class="row">
        <div class="col-lg-12">
            <label class="label-success label">Razon Social</label><br />
            <input class="form-control" data-toggle="tooltip" name="razonSocial" id="razonSocial"
                   title="Razon Social de la Compa&ntilde;ia" alt="Razon Social de la Compa&ntilde;ia" 
                   value="<?php echo $rsocial?>" type="text" />
            <!--onkeyup="ajax_showOptionsDependencia(this, 'getListadoByLetters', event);" />-->
            <input type="hidden" id="razonSocial_hidden" name="razonSocial_ID" value="" />
        </div>
    </div>
    <br>

    <div class="row">
     
        <input class="form-control" data-toggle="tooltip" name="nroproductor" id="nroproductor" 
                   title="N&uacute;mero de productor" alt="N&uacute;mero de productor" type="hidden" 
                   value="<?php echo $nrop?>" />
        <div class="col-lg-3">
            <label class="label-success label">CUIT</label><br />
            <input class="form-control" data-toggle="tooltip" name="cuit" id="cuit"
                   title="N&uacute;mero de cuit" alt="N&uacute;mero de cuit" type="number"
                   value="<?php echo $cuit?>" />
        </div>
    </div>
    <br>

    <div class="row">
        <div class="col-lg-9">
            <label class="label-success label">Calle</label>
            <input class="form-control" data-toggle="tooltip" name="calle" id="calle"
                   title="Direcci&oa&oacute;n de la oficina" alt="Direcci&oa&oacute;n de la oficina" type="text" value="<?php echo $calle?>" />
        </div>
        <div class="col-lg-3">
            <label class="label-success label">N&ordm;</label>
            <input class="form-control" data-toggle="tooltip" name="nro" id="nro"
                   title="Altura de la calle" alt="Altura de la calle" type="number"
                   value="<?php echo $nroc?>"/>
        </div>
    </div>
    <br>

    <div class="row">
        <div class="col-lg-3">
            <label class="label-success label">Piso</label><br />
            <input class="form-control" data-toggle="tooltip" name="piso" id="piso" 
                   title="Piso" alt="Piso" type="number" value="<?php echo $piso?>"/>
        </div>
        <div class="col-lg-3">
            <label class="label-success label">Dpto</label><br />
            <input class="form-control" data-toggle="tooltip" name="dpto" id="dpto" title="Departamento" alt="Departamento" type="text" value="<?php echo $dpto?>" />
        </div>
        <div class="col-lg-3">
            <label class="label-success label">C.P.</label><br />
            <input class="form-control" data-toggle="tooltip" name="cp" id="cp"
                   title="C&oacute;digo postal" alt="C&oacute;digo postal" type="number" value="<?php echo $cp?>"/>
        </div>
        <div class="col-lg-3">
            <label class="label-success label">N&ordm; Tel&eacute;fono</label><br />
            <input class="form-control" data-toggle="tooltip" name="telefono" id="telefono" 
                   title="N&uacute;mero de telefono" alt="N&uacute;mero de telefono" value="<?php echo $telefono?>" />
        </div>
    </div>
    <br>

    <div class="row">
        <div class="col-lg-6">
            <label class="label-success label">Correo Electronico</label><br />
            <input class="form-control" data-toggle="tooltip" name="email" id="email"
                   title="Correo electronico" alt="Correo electronico" type="text" value="<?php echo $correo?>" />
        </div>
        <div class="col-lg-6">
            <label class="label-success label">Link</label><br />
            <input class="form-control" data-toggle="tooltip" name="pagina" id="pagina"type="text"
                   title="P&aacute;gina oficial de la compa&ntilde;ia" alt="P&aacute;gina oficial de la compa&ntilde;ia" value="<?php echo $link?>"/>
        </div>
    </div>
    <br>
            <div class="row">
                <input class="form-control"  name="tipo" value="modificar" type="hidden"/>
                <input class="form-control"  name="idc" value="<?php echo $id?>" type="hidden"/>
                <div class="col-sm-2">
                    <input type="submit" id="modificar" value="Modificar" class="form-control btn btn-primary" />
                </div>
                <div class="col-sm-2">
                    <input type="button" id="cancelar" value="Cancelar" class="form-control btn btn-primary" onclick="window.history.back()" />
                </div>
            </div>
            <br>
    </form>        
        </div>
        <br>
        <br>
        <?php include_once '../includes/php/footer.php';?>
    </body>
    <script src="../bootstrap/js/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</html>

