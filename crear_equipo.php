<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="_css/estilos.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Liga BasketApp</title>
</head>
<body>
    <div class="container-login">
        <section class="wrap-login">
            <div class="login-form-title">
                        <span class="login-form-title-1">
                            Crear Equipos
                        </span>
            </div>
            <form name="login" action="crear_equipo.php" method="post" class="login-form">
                <div class="wrap-input" data-validate="Introduce un nombre de liga">
                    <span class="label-input">Nombre</span>
                    <input class="input" type="text" name="equipo" placeholder="Nombre del equipo">
                    <span class="focus-input"></span>
                </div>
                <div class="wrap-input" data-validate="Introduce el año">
                    <span class="label-input">Ciudad</span>
                    <input class="input" type="text" name="ciudad" placeholder="Nombre de la ciudad">
                    <span class="focus-input"></span>
                </div>
                <div class="wrap-input" data-validate="Introduce la descripción">
                    <span class="label-input">Nº de Socios</span>
                    <input class="input" type="text" name="socios" placeholder="Numero de socios">
                    <span class="focus-input"></span>
                </div>
                <div class="wrap-input" data-validate="Introduce la descripción">
                    <span class="label-input">Año</span>
                    <input class="input" type="text" name="anio" placeholder="Año">
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
        use Medoo\Medoo;

        $database = new Medoo([
            'database_type' => 'mysql',
            'database_name' => 'proyecto_hlc',
            'server' => 'localhost',
            'username' => 'root',
            'password' => ''
        ]);

        if(isset($_POST["guardar"])){
            if(!empty($_POST["equipo"]) && !empty($_POST["ciudad"]) && 
                !empty($_POST["socios"]) && !empty($_POST["anio"]) &&){
                
                $database->insert("equipos", ["nombre"=>$_POST["equipo"], "ciudad"=>$_POST["ciudad"], "numSocios"=>$_POST["socios"], "anio"=>$_POST["anio"]]);
            }
        }
    ?>
</body>
</html>