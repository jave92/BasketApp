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
    <title>Equipos BasketApp</title>
</head>
<body>
<a href="cerrar_sesion.php" class="fixedButton">Cerrar sesión</a>
<div class="container-equipos">
    <section class="wrap-equipos">
        <div class="equipos-title">
            <span class="equipos-title-1">
                Equipos
            </span>
        </div>
        <div class="container-equipos-btn">
            <button class="equipos-btn" onclick="location.href='crear_equipo.php'">Crear equipo</button>
        </div>
    </section>
</div>
</body>
</html>