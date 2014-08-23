<?php
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
//require_once '../clases/ActiveRecord/MysqlActiveRecordAbstractFactory.php';

$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();

$oMysqlUsos = $oMysql->getUsosActiveRecord();
$oUsos = new UsosValueObject();
$oUsos = $oMysqlUsos->buscarTodo();
?>
<table class="table table-striped table-bordered table-hover table-responsive">
    <tr>
        <th>Uso</th>
        <th></th>
    </tr>
    <?php
    foreach ($oUsos as $aUsos) {
        ?>
        <tr>
            <td><?php echo $aUsos->get_descripcion(); ?></td>
            <td>
                <img src="../images/editar.png" alt="" onclick="verUso(<?php echo $aUsos->get_idusos(); ?>, 'e', '<?php echo $aUsos->get_descripcion(); ?>')"/>
                <img src="../images/borrar.png" alt="" onclick="verUso(<?php echo $aUsos->get_idusos(); ?>, 'b', '<?php echo $aUsos->get_descripcion(); ?>')"/>
            </td>
        </tr>
        <?php
    }
    ?>
</table>