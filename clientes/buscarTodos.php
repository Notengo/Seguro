<?php
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();
$oMysqlCliente = $oMysql->getClientesActiveRecord();
$oCliente = new ClientesValueObject();
$oCliente = $oMysqlCliente->buscarTodo();
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
                <img src="../images/editar.png" alt="" onclick="ver(<?php echo $aCliente->get_idclientes(); ?>, 'e')"/>
                <img src="../images/borrar.png" alt="" onclick="ver(<?php echo $aCliente->get_idclientes(); ?>, 'b')"/>
            </td>
        </tr>
        <?php
    }
    ?>
</table>