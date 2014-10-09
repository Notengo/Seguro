<?php extract($_GET, EXTR_OVERWRITE); ?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Seguro - Poliza - Cuotas</title>
        <link type="text/css" href="../bootstrap/css/bootstrap.css" rel="stylesheet"/>
        <link type="text/css" href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet"/>
        <link href="../includes/css/otros.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="js/funciones.js"></script>
    </head>
    <body>
        <?php include_once '../includes/php/header.php'; ?>
        <div class="container">
            <legend>Agregando Cuotas Poliza</legend>

            <form class="form-horizontal" action="#" method="post">
                <div class="form-group">
                    <div class="col-lg-3">
                        <label class="label label-success">N&ordm; de Poliza</label>
                        <input type="text" name="poliza" id="poliza" class="form-control"
                               value="<?php if(isset($nropoliza)) {echo $nropoliza;}?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-2">
                        <label class="label label-success">N&ordm; de Cuota</label>
                        <input type="text" name="cuotas" id="cuotas" class="form-control"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-2">
                        <label class="label label-success">Monto</label>
                        <input type="text" name="monto" id="monto" class="form-control"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-3">
                        <label class="label label-success">1&ordf; vencimiento</label>
                        <input type="date" name="vencimiento1" id="vencimiento1" class="form-control"/>
                    </div>
                    <div class="col-lg-3">
                        <label class="label label-success">2&ordf; vencimiento</label>
                        <input type="date" name="vencimiento2" id="vencimiento2" class="form-control"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-3">
                        <label class="label label-success">Pagada</label>
                        <br>
                        <input type="radio" name="pagada" id="pagada" value="1" /> SI
                        <input type="radio" name="pagada" id="pagada" value="2" checked=""/> NO
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-3">
                        <label class="label label-success">Fecha de Pago</label>
                        <input type="date" name="fechapago" id="fechapago" class="form-control"/>
                    </div> 
                </div>
                <div class="form-group">

                    <div class="col-sm-2 col-lg-2">     
                        <input type="button" id="guardar" value="Guardar" class="btn btn-large btn-block btn-primary" onclick="guardarCuotas()" />
                    </div>
                    <div class="col-sm-2">
                        <input type="button" id="guardar" value="Cancelar" class="btn btn-large btn-block btn-primary " onclick="window.history.back();" />
                    </div>
                    <div class="col-sm-8" id="divResultado"></div>
                </div> 
            </form>
        </div>
        <?php // include_once '../includes/php/footer.php'; ?>
    </body>
</html>