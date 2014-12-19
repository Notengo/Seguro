<?php
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
        <?php include_once '../includes/php/header.php';?>
        <div class="container">
         
            <br>
          <?php include_once './listadoOtrosRiesgos.php';?>
        </div>
        <div class="row">
        <div class="col-lg-5"></div>
            <div class="col-lg-2">
                <input type="button" class="form-control btn btn-primary" value="volver" onclick="window.location.href='../inicio/'"
            </div>       
        </div>
        </div>
        <br>
        <?php include_once '../includes/php/footer.php'; ?>
        <script src="../bootstrap/js/jquery.min.js"></script>
        <script src="../bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>
