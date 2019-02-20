<!doctype html>
<html lang="es">
<head>
    <?php
    require_once ("./_includes/conexion.php");
    ?>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="_css/estilos.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Panel BasketApp</title>
</head>
<body>
<a href="cerrar_sesion.php" class="fixedLink">Cerrar sesión</a>
<div class="container-login">
    <section class="wrap-login">
        <div class="dashboard-title">
            <span class="dashboard-title-1">
						Panel de control
					</span>
        </div>
        <div class="dashboard">
            <div class="dashboard-liga" onclick="location.href='liga.php'">
                <span class="dashboard-text">
                    Datos de liga
                </span>
            </div>
            <div class="dashboard-equipo">
                <span class="dashboard-text" onclick="location.href='equipos.php'">
                    Equipos
                </span>
            </div>
            <div class="dashboard-resultados">
                <span class="dashboard-text">
                    Resultados
                </span>
            </div>
        </div>
    </section>
</div>
</body>
</html>