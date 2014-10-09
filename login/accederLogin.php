<link href="../bootstrap/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
<script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<link href="../bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
<div class="container">
    <?php
    include_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
    $oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
    $oMysql->conectar();
    if (isset($_POST['log'])) {
        if ($_POST['user'] != "" && $_POST['pass'] != "") {
            $usuario = mysql_escape_string($_POST['user']);
            $pass = mysql_escape_string($_POST['pass']);
            $_SESSION['usuario'] = $usuario;
            $_SESSION['pass'] = $pass;

            $sql = "SELECT * FROM seguro.usuarios WHERE usuarios.nombreUser='" . $usuario . "' AND usuarios.pass='" . $pass . "'";

            $resultado = mysql_query($sql);
            $variable = mysql_fetch_array($resultado);
            //session_start();


            if ($variable) {
                session_start();
                $_SESSION['usuario']=$variable[0];
                $_SESSION['contrasenia']=$variable[1];
                $_SESSION['nombre']=$variable[2];
                $_SESSION['apellido']=$variable[3];
                $_SESSION['nroProductor']=$variable[4];
                $_SESSION['idsesion']=session_id();
                
                header("Location:../inicio/index.php");
            } else {
                ?>
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8">
                        <div class="alert alert-warning">los datos no coinciden con un usuario registrado</div>

                    </div>
                </div>
                <?php
                //echo"<script type=\"text/javascript\">alert('los datos no coinciden con un usuario registrado'); window.location='../includes/php/logout.php';</script>";
            }
        } else {
            //echo"<script type=\"text/javascript\">alert('faltan ingresar datos!'); window.location='../includes/php/logout.php';</script>";
            ?>
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8">
                        <div class="alert alert-warning">faltan ingresar datos</div>

                    </div>
                </div>
            <?php
        }
    } else {
        ?>
        <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8">
                        <div class="alert alert-warning">Error al pasaje de datos</div>

                    </div>
                </div>
        <?php
    }
    ?>
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <input type="button" class="btn btn-large btn-danger" value="Reintentar" onclick="window.location = '../includes/php/logout.php'"
        </div>
    </div>
</div>