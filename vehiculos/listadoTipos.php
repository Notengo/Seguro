<?php
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
//require_once '../clases/ActiveRecord/MysqlActiveRecordAbstractFactory.php';

$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();

$oMysqlTipos = $oMysql->getTiposActiveRecord();
$oTipos = new TiposValueObject();
$oTipos = $oMysqlTipos->buscarTodo();
?>
<table class="table table-striped table-bordered table-hover table-responsive">
    <tr>
        <th>Tipo</th>
        <th></th>
    </tr>
    <?php
    foreach ($oTipos as $aTipos) {
        ?>
        <tr>
            <td><?php echo $aTipos->get_descripcion(); ?></td>
            <td>
                <img src="../images/editar.png" alt="" onclick="verTipo(<?php echo $aTipos->get_idtipos(); ?>, 'e', '<?php echo $aTipos->get_descripcion(); ?>')"/>
                <img src="../images/borrar.png" alt="" onclick="verTipo(<?php echo $aTipos->get_idtipos(); ?>, 'b', '<?php echo $aTipos->get_descripcion(); ?>')"/>
            </td>
        </tr>
        <?php
    }
    ?>
</table>