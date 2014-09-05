<?php
include '../includes/php/header.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Seguro - Otros Riesgos</title>
        <link type="text/css" href="../bootstrap/css/bootstrap.css" rel="stylesheet"/>
        <link type="text/css" href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet"/>
        <link href="../includes/css/otros.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="../includes/js/funciones.js"></script>
    </head>
    <body>
        <div class="container">
            <form action="#" method="post">
                <legend>Agregar Riesgo</legend>
                <div class="row">
                    <div class="col-sm-5">
                    <label class="label label-success">Riesgo</label>
                    <input type="text" name="riesgo" id="riesgo" class="form-control"/>
                    </div>
                    <div class="col-sm-7">
                    </div>
                </div>
                <br>
                 <div class="row">
                    <div class="col-sm-5">
                        <label class="label label-success">Descripci&oacute;n</label>
                        <textarea rows="5" cols="73">
                            
                        </textarea>
                    </div>
                    <div class="col-sm-7">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-2">
                        <input type="button" id="guardar" value="Nuevo" class="btn btn-large btn-block btn-primary" onclick="#" />
                    </div>
                    <div class="col-sm-2">
                        <input type="button" id="cancelar" value="Cancelar" class="btn btn-large btn-block btn-primary " onclick="location.reload();" />
                    </div>
                    <div class="col-sm-8" id="divResultado"></div>
                </div>
            </form>
        </div>
    </body>
</html>
