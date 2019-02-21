<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="_css/estilos.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="_js/jquery-3.1.1.min.js"></script>
    <script src="_js/funciones.js"></script>
    <title>Liga BasketApp</title>
    <?php
    require_once ("./_includes/conexion.php");
    require 'Medoo.php';
    require '_includes/conexionMedoo.php';


    if(isset($_POST["guardar"])){

        if(!empty($_POST["nombre_liga"]) && !empty($_POST["ano_liga"]) && !empty($_POST["desc_liga"])){
            $database->update("ligas", ["nombre"=>$_POST["nombre_liga"], "anio"=>$_POST["ano_liga"], "descripcion"=>$_POST["desc_liga"]],["id"=>"1"]);
        }
    }
    $result = $database->select("ligas", "*", ["id"=>"1"]);
    ?>
</head>
<body>
    <a class="btn" href="control_panel.php"><i class="fixedButton fas fa-arrow-left"></i></a>
    <div class="fixedErrorMsg">
        <p id="msg" class="oculto">Datos de liga guardados correctamente</p>
    </div>
    <a href="cerrar_sesion.php"><i class="fixedLink fas fa-sign-out-alt"></i></a>
    <div class="container-login">

        <section class="wrap-login">
            <div class="login-form-title">
                        <span class="login-form-title-1">
                            Datos de liga
                        </span>
            </div>
            <form name="login" action="liga.php" method="post" class="login-form">
                <div class="wrap-input" data-validate="Introduce un nombre de liga">
                    <span class="label-input">Nombre</span>
                    <input class="input" type="text" name="nombre_liga" placeholder="Nombre de liga" value="<?php echo $result[0]['nombre']?>" required>
                    <span class="focus-input"></span>
                </div>
                <div class="wrap-input" data-validate="Introduce el año">
                    <span class="label-input">Año</span>
                    <input class="input" type="text" name="ano_liga" placeholder="Año" value="<?php echo $result[0]['anio']?>" required>
                    <span class="focus-input"></span>
                </div>
                <div class="wrap-input" data-validate="Introduce la descripción">
                    <span class="label-input">Descripcion</span>
                    <input class="input" type="text" name="desc_liga" placeholder="Descripción" value="<?php echo $result[0]['descripcion']?>" required>
                    <span class="focus-input"></span>
                </div>
                <div class="container-login-form-btn">
                    <input type="submit" class="login-form-btn" name="guardar" value="Guardar">
                </div>
            </form>
        </section>
    </div>
</body>
</html>