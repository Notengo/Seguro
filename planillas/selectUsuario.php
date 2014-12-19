<?php

require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();

$oMysqlUsuarios = $oMysql->getUsuarioActiveRecord();
$oUsuarios = new UsuarioValueObject();
$oUsuarios = $oMysqlUsuarios->buscarTodo();
?>
<select name="usuario" id="usuario" class="form-control" onchange="buscanro()" >
    <option value="0">Seleccione Productor..</option>
    <?php
    foreach ($oUsuarios as $aUsuarios) {
        ?>
    <option value="<?php echo $aUsuarios->get_idUsuario(); ?>"><?php echo $aUsuarios->getNombreReal()." ".$aUsuarios->get_apellidoReal(); ?></option>
        <?php
    }
    ?>
</select>