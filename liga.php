<!doctype html>
<html lang="es">
<head>
    <?php
    require_once ("./_includes/conexion.php");
    if(isset($_POST["guardar"])){
        $nombre=$_POST["nombre_liga"];
        $anio=$_POST["ano_liga"];
        $desc=$_POST["desc_liga"];
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
    <input type="button" onclick="location.href='control_panel.php'" class="fixedButton" value="volver atrás">
    <a href="cerrar_sesion.php" class="fixedLink">Cerrar sesión</a>
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
                    <input class="input" type="text" name="nombre_liga" placeholder="Nombre de liga" value="NBA">
                    <span class="focus-input"></span>
                </div>
                <div class="wrap-input" data-validate="Introduce el año">
                    <span class="label-input">Año</span>
                    <input class="input" type="text" name="ano_liga" placeholder="Año" value="2019">
                    <span class="focus-input"></span>
                </div>
                <div class="wrap-input" data-validate="Introduce la descripción">
                    <span class="label-input">Descripcion</span>
                    <input class="input" type="text" name="desc_liga" placeholder="Descripción" value="La mejor liga del mundo">
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