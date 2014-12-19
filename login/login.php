<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Seguro - Login</title>
        <link type="text/css" href="../bootstrap/css/bootstrap.css" rel="stylesheet"/>
        <link type="text/css" href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet"/>
        <link href="../includes/css/otros.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="../includes/js/funciones.js"></script>
    </head>

    <body style="">
        <div style="width: 100%;">
            <div style="alignment-adjust: central">

            </div>
        </div>    
        <div class="container">
            <div class="row">
                <div class="col-lg-4"></div>
                <div class="col-md-4">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=""><img src="../images/login/log.png"/></a> 
                </div>
            </div>

            <form class="form-horizontal" action="accederLogin.php" method="POST">  

                <div class="row">
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4">

                        <input type="text" name="user" id="user" class="form-control" placeholder="usuario.."/>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4">

                        <input type="password" name="pass" id="pass" class="form-control" placeholder="contraseña.."/>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-5"></div>
                    <div class="col-lg-2">
                        <input type="submit" name="log" id="log" class="form-control btn btn-info" value="Acceder"/>
                    </div>
                </div>
            </form>

        </div>         
    </body>