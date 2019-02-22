<!doctype html>
<html lang="es">
<head>
    <?php
    require_once ("./_includes/conexion.php");
    require 'Medoo.php';
    require '_includes/conexionMedoo.php';
//
//    if(isset($_GET["clave"])){
//        $id = $_GET["clave"];
//        $database->delete('equipos',["id"=>$id]);
//        unset($_POST["delete"]);
//        unset($_POST["clave"]);
//    }
//
    $equipos = $database->select("equipos", "*");

    ?>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="_css/estilos.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="_js/jquery-3.1.1.min.js"></script>
    <script src="_js/funciones.js"></script>
    <title>Resultados BasketApp</title>
</head>
<body>
<a class="btn" href="control_panel.php"><i class="fixedButton fas fa-arrow-left"></i></a>
<a href="cerrar_sesion.php"><i class="fixedLink fas fa-sign-out-alt"></i></a>
<div class="container-equipos">
    <section class="wrap-equipos">
        <div class="equipos-title">
            <span class="equipos-title-1">
                Resultados
            </span>
        </div>
        <div class="wrap-tablaEquipos">
            <form action="resultados.php" method="post">
                <table class="tablaEquipos">
                    <tr>
                        <th class="columnaVisitantes" style="background-color: rgba(255,255,255,0.3)">Visitante \ Local</th>
                        <?php
                        foreach ($equipos as $equipoLocal){
                            echo "<th>".$equipoLocal["nombre"]."</th>";
                        }
                        ?>
                    </tr>
                    <?php
                    foreach ($equipos as $equipoVisitante){
                        $resultados = $database->select("resultados", "*", ["visitante"=>$equipoVisitante]);
                        $rivales=array();
                        foreach ($resultados as $resultado){
                            array_push($rivales, $resultado["local"]);
                        }
                        echo "<tr>";
                            echo "<td class='columnaVisitantes'>".$equipoVisitante["nombre"]."</td>";
                            foreach ($equipos as $equipoLocal){
                                echo "<td id=\"".str_replace(' ', '', $equipoVisitante['nombre'])."-".str_replace(' ', '', $equipoLocal['nombre'])."\"><a href='aniadir_resultado.php?visitante=".$equipoVisitante["nombre"]."& local=".$equipoLocal["nombre"]."'>";
                                    if(in_array($equipoLocal["nombre"],$rivales)){
                                        foreach ($resultados as $resultado){
                                            if($resultado["local"]==$equipoLocal["nombre"]){
                                                echo $resultado["punt_local"]." / ".$resultado["punt_visit"];
                                            }
                                        }
                                    }else{
                                        if($equipoVisitante["id"] == $equipoLocal["id"]){
                                            echo "<script>";
                                            echo "$(\"#".str_replace(' ', '', $equipoVisitante['nombre'])."-".str_replace(' ', '', $equipoLocal['nombre'])."\").css(\"background-color\", \"rgba(255,255,255,0.3)\");";
                                            echo "</script>";
                                        }else{
                                            echo "<i class=\"fas fa-plus-circle\" style='width: 100%'></i>";
                                        }
                                    }
                                echo "</a></td>";
                            }
//                            select resultados where visitante=equipovisitante
//                        echo "<td>".$fila["ciudad"]."</td>";
//                        echo "<td>".$fila["numSocios"]."</td>";
//                        echo "<td>".$fila["anio"]."</td>";
//                        echo "<td><a href='equipos.php?clave=".$clave."'>Eliminar</a> | <a href='crear_equipo.php?clave=".$clave."& nombre=".$fila["nombre"]."& ciudad=".$fila["ciudad"]."& numSocios=".$fila["numSocios"]."& anio=".$fila["anio"]."'>Editar</a></td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            </form>
        </div>
        <div class="container-equipos-btn">
            <button class="equipos-btn" onclick="location.href='aniadir_resultado.php'">Agregar resultado</button>
        </div>
    </section>
</div>
</body>
</html>