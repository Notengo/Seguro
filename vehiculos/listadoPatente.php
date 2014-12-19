<?php
//include_once '../login/validar.php';
if(isset($_POST['patente']))
{$filtro=$_POST['pat'];}
else{$filtro=NULL;}

require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();
$oMysqlVehiculo = $oMysql->getVehiculoActiveRecord();
$oVehiculo = new VehiculosValueObject();
/* Busco todos los vehiculos si es que no se posee un id de cliente. */
if (!isset($filtro)) {
    $oVehiculo = $oMysqlVehiculo->buscarTodo();
} else {
    $oVehiculo->set_patente($filtro);
    $oVehiculo = $oMysqlVehiculo->filtroPatente($oVehiculo);
}

$oMysqlCliente = $oMysql->getClientesActiveRecord();
$oCliente = new ClientesValueObject();
$oCliente = $oMysqlCliente->buscarCompleto();
$cliente = array();
foreach ($oCliente as $aCliente) {
    $cliente[$aCliente->get_idclientes()] = $aCliente->get_apellido() . ' ' . $aCliente->get_nombre();
}
unset($oCliente);
unset($oMysqlCliente);

$oMysqlMarcas = $oMysql->getMarcasActiveRecord();
$oMarcas = new MarcasValueObject();
$oMarcas = $oMysqlMarcas->buscarTodo();

$oMysqlModelo = $oMysql->getModelosActiveRecord();
$oModelo = new ModelosValueObject();
$oModelo = $oMysqlModelo->buscarTodo();

$marcas = array();
foreach ($oMarcas as $aMarcas) {
    $marcas[$aMarcas->get_idmarcas()] = $aMarcas->get_descripcion();
}
$modelos = array();
foreach ($oModelo as $aModelo) {
    $modelos[$aModelo->get_idmodelos()] = $aModelo->get_descripcion();
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Seguro - Veh&iacute;culos</title>
        <link href="../bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
    <?php include_once '../includes/php/header.php';?>    
    <div class="container">
    <div class="row">
        <legend>buscar por Patente</legend>    
        <form action="listadoPatente.php" method="post">    
                <!--<form action="#"  method="post">-->
                    <div class="col-sm-1 col-lg-1"></div>
                    <div class="col-sm-5 col-lg-5">
                        <input type="text" class="form-control" id="pat" name="pat"/>
                    </div>
                    <div class="col-sm-2 col-lg-1">
                        <input type="submit" name="patente" value="buscar" class="form-control btn btn-info">
                    </div>
                    </form>
                <!--</form>-->
 

    </div>  
    <br>        
    <table class="table table-striped table-bordered table-hover table-responsive">
    <tr>
        <th>Asegurado</th>
        <th>Matricula</th>
        <th>Marca</th>
        <th>Modelo</th>
        <th></th>
    </tr>
    <?php
    $vehiculos = array();
    foreach ($oVehiculo as $aVehiculo) {
        $vehiculos[$aVehiculo->get_idvehiculos()] = new VehiculosValueObject();
        $vehiculos[$aVehiculo->get_idvehiculos()] = $aVehiculo;
        ?>
        <tr>
            <td><?php echo $cliente[$aVehiculo->get_idclientes()]; ?></td>
            <td><?php echo $aVehiculo->get_patente(); ?></td>
            <td><?php echo ($aVehiculo->get_idmarcas()) ? $marcas[$aVehiculo->get_idmarcas()] : ''; ?></td>
            <td><?php echo ($aVehiculo->get_idmodelos()) ? $modelos[$aVehiculo->get_idmodelos()] : ''; ?></td>
            <td>
                <a href="../poliza/index.php?usu=<?php echo $aVehiculo->get_idclientes(); ?>"><img src="../images/poliza3.png" width="20" alt=""></a>
                <img src="../images/editar.png" alt="" onclick="verVehiculo(<?php echo $aVehiculo->get_idvehiculos(); ?>, 'e', <?php echo $vehiculos; ?>)"/>
                <img src="../images/borrar.png" alt="" onclick="verVehiculo(<?php echo $aVehiculo->get_idvehiculos(); ?>, 'b', '<?php echo $aModelo->get_descripcion(); ?>', <?php echo $aModelo->get_idmarcas(); ?>)"/>
            </td>
        </tr>
        <?php
        unset($oModelo);
    }
    ?>
</table>
</div>
 <?php include_once '../includes/php/footer.php'; ?>       
 <script src="../bootstrap/js/jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>        
</body>  
</html>
