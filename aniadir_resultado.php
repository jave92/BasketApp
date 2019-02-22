<!doctype html>
<html lang="es">
<head>
    <?php
    require_once ("./_includes/conexion.php");
    require 'Medoo.php';
    require '_includes/conexionMedoo.php';

    $equipos = $database->select("equipos", "*");

    $puntLocal=null;
    $puntVisit=null;
    $resultado=array();
    if(isset($_GET["visitante"])){
        $resultado = $database->select("resultados", "*", ["visitante"=>$_GET["visitante"], "local"=>$_GET["local"], 'LIMIT'=>1]);
        if(count($resultado)>0){
            $puntLocal = $resultado[0]["punt_local"];
            $puntVisit = $resultado[0]["punt_visit"];
        }
    }
    ?>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="_css/estilos.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>Resultados BasketApp</title>
</head>
<body>
<a class="btn" href="resultados.php"><i class="fixedButton fas fa-arrow-left"></i></a>
<a href="cerrar_sesion.php"><i class="fixedLink fas fa-sign-out-alt"></i></a>
<div class="container-login">
    <section class="wrap-login">
        <div class="login-form-title">
            <span class="login-form-title-1">
                <?php
                    if(count($resultado)!=0){
                        echo "Editar resultado";
                    }else{
                        echo "Nuevo resultado";
                    }
                ?>
            </span>
        </div>
        <form name="login" action="aniadir_resultado.php" method="post" class="login-form">
            <?php
            if(count($resultado)!=0){
                echo "<input type=\"hidden\" name='get' value=0>";
            }
            ?>

            <div class="wrap-input" data-validate="Seleccione un equipo">
                <span class="label-input">Equipo local</span>
                <select name="eqLocal">
                    <?php
                        if(isset($_GET["local"])){
                            echo "<option value=".$_GET["local"].">".$_GET["local"]."</option>";
                        }else{
                            foreach ($equipos as $equipo){
                                echo "<option value=".$equipo["nombre"].">".$equipo["nombre"]."</option>";
                            }
                        }

                    ?>
                </select>
                <span class="focus-input"></span>
            </div>
            <div class="wrap-input" data-validate="Introduce la puntuación del equipo local">
                <span class="label-input">Puntos local</span>
                <input class="input" type="number" name="puntLocal" placeholder="0" value="<?php if($puntLocal!=null)echo $puntLocal ?>" required>
                <span class="focus-input"></span>
            </div>
            <div class="wrap-input" data-validate="Seleccione un equipo">
                <span class="label-input">Equipo visitante</span>
                <select name="eqVisit">
                    <?php
                        if(isset($_GET["visitante"])){
                            echo "<option value=".$_GET["visitante"].">".$_GET["visitante"]."</option>";
                        }else {
                            foreach ($equipos as $equipo) {
                                echo "<option value=" . $equipo["nombre"] . ">" . $equipo["nombre"] . "</option>";
                            }
                        }
                    ?>
                </select>
                <span class="focus-input"></span>
            </div>
            <div class="wrap-input" data-validate="Introduce la puntuación del equipo visitante">
                <span class="label-input">Puntos visitante</span>
                <input class="input" type="number" name="puntVisit" placeholder="0" value="<?php if($puntVisit!=null)echo $puntVisit ?>" required>
                <span class="focus-input"></span>
            </div>
            <div class="container-login-form-btn">
                <input type="submit" class="login-form-btn" name="guardar" value="Guardar">
            </div>
        </form>
    </section>
</div>
<?php

    if(isset($_POST["guardar"])){
        if(!empty($_POST["eqLocal"]) && !empty($_POST["eqVisit"]) &&
            !empty($_POST["puntLocal"]) && !empty($_POST["puntVisit"])){

                if(isset($_POST["get"])){
                    $database->update("resultados", ["punt_local"=>$_POST["puntLocal"], "punt_visit"=>$_POST["puntVisit"]],["AND" => ["local"=>$_POST["eqLocal"], "visitante"=>$_POST["eqVisit"]]]);
                }else{
                    $database->insert("resultados", ["local"=>$_POST["eqLocal"], "visitante"=>$_POST["eqVisit"], "punt_local"=>$_POST["puntLocal"], "punt_visit"=>$_POST["puntVisit"]]);
                }

            header("Location: resultados.php");
        }
    }
?>
</body>
</html>