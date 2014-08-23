<?php
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
//require_once '../clases/ActiveRecord/MysqlActiveRecordAbstractFactory.php';

$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();

$oMysqlMarcas = $oMysql->getMarcasActiveRecord();
$oMarcas = new MarcasValueObject();
$oMarcas = $oMysqlMarcas->buscarTodo();
?>
<table class="table table-striped table-bordered table-hover table-responsive">
    <tr>
        <th>Marcas</th>
        <th></th>
    </tr>
    <?php
    foreach ($oMarcas as $aMarcas) {
        ?>
        <tr>
            <td><?php echo $aMarcas->get_descripcion(); ?></td>
            <td>
                <img src="../images/editar.png" alt="" onclick="ver(<?php echo $aMarcas->get_idmarcas(); ?>, 'e', '<?php echo $aMarcas->get_descripcion(); ?>')"/>
                <img src="../images/borrar.png" alt="" onclick="ver(<?php echo $aMarcas->get_idmarcas(); ?>, 'b', '<?php echo $aMarcas->get_descripcion(); ?>')"/>
            </td>
        </tr>
        <?php
    }
    ?>
</table>