<!doctype html>
<html lang="es">
<head>
    <?php
    require_once ("./_includes/conexion.php");
    $nombre="";
    $ciudad="";
    $numSocios=null;
    $anio="";
    if(isset($_GET["clave"])){
        $id = $_GET["clave"];
        $nombre = $_GET["nombre"];
        $ciudad = $_GET["ciudad"];
        $numSocios = $_GET["numSocios"];
        $anio = $_GET["anio"];
    }

    ?>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="_css/estilos.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Liga BasketApp</title>
</head>
<body>
    <a href="cerrar_sesion.php" class="fixedButton">Cerrar sesión</a>
    <div class="container-login">
        <section class="wrap-login">
            <div class="login-form-title">
                        <span class="login-form-title-1">
                            Crear Equipos
                        </span>
            </div>
            <form name="login" action="crear_equipo.php" method="post" class="login-form">
                <?php
                    if(isset($_GET["clave"])){
                        echo "<input type=\"hidden\" name='id' value='$id'>";
                    }
                ?>

                <div class="wrap-input" data-validate="Introduce un nombre de liga">
                    <span class="label-input">Nombre</span>
                    <input class="input" type="text" name="equipo" placeholder="Nombre del equipo" value="<?php echo $nombre?>" required>
                    <span class="focus-input"></span>
                </div>
                <div class="wrap-input" data-validate="Introduce el año">
                    <span class="label-input">Ciudad</span>
                    <input class="input" type="text" name="ciudad" placeholder="Nombre de la ciudad" value="<?php echo $ciudad?>" required>
                    <span class="focus-input"></span>
                </div>
                <div class="wrap-input" data-validate="Introduce la descripción">
                    <span class="label-input">Nº de Socios</span>
                    <input class="input" type="text" name="socios" placeholder="Numero de socios" value="<?php echo $numSocios?>" required>
                    <span class="focus-input"></span>
                </div>
                <div class="wrap-input" data-validate="Introduce la descripción">
                    <span class="label-input">Año</span>
                    <input class="input" type="text" name="anio" placeholder="Año" value="<?php echo $anio?>" required>
                    <span class="focus-input"></span>
                </div>
                <div class="container-login-form-btn">
                    <input type="submit" class="login-form-btn" name="guardar" value="Guardar">
                </div>
            </form>
        </section>
    </div>
    <?php
        require 'Medoo.php';
        require '_includes/conexionMedoo.php';

        if(isset($_POST["guardar"])){
            if(!empty($_POST["equipo"]) && !empty($_POST["ciudad"]) && 
                !empty($_POST["socios"]) && !empty($_POST["anio"])){

                if(isset($_POST["id"])){
                    $database->update("equipos", ["nombre"=>$_POST["equipo"], "ciudad"=>$_POST["ciudad"], "numSocios"=>$_POST["socios"], "anio"=>$_POST["anio"]],["id"=>$_POST["id"]]);
                }else{
                    $database->insert("equipos", ["nombre"=>$_POST["equipo"], "ciudad"=>$_POST["ciudad"], "numSocios"=>$_POST["socios"], "anio"=>$_POST["anio"]]);
                }

                header("Location: equipos.php");
            }
        }
    ?>
</body>
</html>