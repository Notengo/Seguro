<?php
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();
$oMysqlCliente = $oMysql->getClientesActiveRecord();
$oCliente = new ClientesValueObject();
if(isset($_POST['filtro'])){
    $oCliente->set_apellido($_POST['filtro']);
    $oCliente->set_nombre($_POST['filtro']);
    $oCliente->set_documento($_POST['filtro']);
    $oCliente = $oMysqlCliente->filtro($oCliente);
} else {
    $oCliente = $oMysqlCliente->buscarTodo();
}

/* Realizar filtro, si se manda la variable de filtro de lo contrario que busque todo. */

?>
<table class="table table-striped table-bordered table-hover">
    <tr class="success">
        <th>Id</th>
        <th>Apellido y nombre</th>
        <th>Documento</th>
        <th>Telefono</th>
        <th><!--Acciones--></th>
    </tr>
    <?php
    foreach ($oCliente as $aCliente) {
        ?>
        <tr>
            <td><?php echo $aCliente->get_idclientes(); ?></td>
            <td><?php echo $aCliente->get_apellido() . ', ' . $aCliente->get_nombre(); ?></td>
            <td><?php echo $aCliente->get_documento(); ?></td>
            <td>11122233</td>
            <td>
<!--                <img src="../images/editar.png" alt="" onclick="ver(<?php // echo $aCliente->get_idclientes(); ?>, 'e')"/>
                <img src="../images/borrar.png" alt="" onclick="ver(<?php // echo $aCliente->get_idclientes(); ?>, 'b')"/>
                <a href="../vehiculos/index.php?usu=<?php echo $aCliente->get_idclientes(); ?>"><img src="../images/car_20.png" alt="Carga Vehiculo" /></a>-->
                <img src="../images/editar.png" alt="" onclick="ver(<?php echo $aCliente->get_idclientes(); ?>, 'e')"/>&nbsp;
                <img src="../images/borrar.png" alt="" onclick="ver(<?php echo $aCliente->get_idclientes(); ?>, 'b')"/>&nbsp;
                <a href="../poliza/index.php?usu=<?php echo $aCliente->get_idclientes(); ?>"><img src="../images/poliza3.png" alt="Poliza" width="20" title="polizas" /></a>&nbsp;
                <a href="../vehiculos/index.php?usu=<?php echo $aCliente->get_idclientes(); ?>"><img src="../images/car_20.png" alt="Carga Vehiculo" title="vehiculos"/></a>
            </td>
        </tr>
        <?php
    }
    ?>
</table>