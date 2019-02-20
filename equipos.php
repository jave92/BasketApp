<!doctype html>
<html lang="es">
<head>
    <?php
    require_once ("./_includes/conexion.php");
    require 'Medoo.php';
    require '_includes/conexionMedoo.php';

    if(isset($_GET["clave"])){
        $id = $_GET["clave"];
        $database->delete('equipos',["id"=>$id]);
        unset($_POST["delete"]);
        unset($_POST["clave"]);
    }

    $result = $database->select("equipos", "*");

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
<input type="button" onclick="location.href='control_panel.php'" class="fixedButton" value="volver atrás">
<a href="cerrar_sesion.php" class="fixedLink">Cerrar sesión</a>
<div class="container-equipos">
    <section class="wrap-equipos">
        <div class="equipos-title">
            <span class="equipos-title-1">
                Equipos
            </span>
        </div>
        <div class="wrap-tablaEquipos">
            <form action="equipos.php" method="post">
                <table class="tablaEquipos">
                    <tr>
                        <th>Nombre</th>
                        <th>Ciudad</th>
                        <th>Nº Socios</th>
                        <th>Año</th>
                        <th></th>
                    </tr>
                    <?php
                    foreach ($result as $fila){
                        $clave = $fila["id"];
                        echo "<tr>";
                        echo "<td>".$fila["nombre"]."</td>";
                        echo "<td>".$fila["ciudad"]."</td>";
                        echo "<td>".$fila["numSocios"]."</td>";
                        echo "<td>".$fila["anio"]."</td>";
                        echo "<td><a href='equipos.php?clave=".$clave."'>Eliminar</a> | <a href='crear_equipo.php?clave=".$clave."& nombre=".$fila["nombre"]."& ciudad=".$fila["ciudad"]."& numSocios=".$fila["numSocios"]."& anio=".$fila["anio"]."'>Editar</a></td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            </form>
        </div>
        <div class="container-equipos-btn">
            <button class="equipos-btn" onclick="location.href='crear_equipo.php'">Crear equipo</button>
        </div>
    </section>
</div>
</body>
</html>