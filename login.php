<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="_css/estilos.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="_js/jquery-3.1.1.min.js"></script>
    <script src="_js/funciones.js"></script>
    <title>Login BasketApp</title>
</head>
<body>
    <div class="container-login">
        <section class="wrap-login">
            <div class="login-form-title">
					<span class="login-form-title-1">
						Liga de baloncesto
					</span>
            </div>
            <form name="login" action="login.php" method="post" class="login-form">
                <div class="wrap-input" data-validate="Introduce el nombre de usuario">
                    <span class="label-input">Username</span>
                    <input class="input" type="text" name="username" placeholder="Usuario">
                    <span class="focus-input"></span>
                </div>
                <div class="wrap-input" data-validate="Introduce la clave">
                    <span class="label-input">Clave</span>
                    <input class="input" type="password" name="pass" placeholder="Clave">
                    <span class="focus-input"></span>
                </div>
                <div class="container-login-form-btn">
                    <input type="submit" class="login-form-btn" name="login" value="Login">
                </div>
                <div>
                    <p id="error" class="oculto">Login incorrecto</p>
                </div>
            </form>
        </section>
    </div>
    <?php
        require 'Medoo.php';
        use Medoo\Medoo;

        session_start();
        if(isset($_SESSION["login"])){
            header("Location: control_panel.php");
        }

        $database = new Medoo([
            'database_type' => 'mysql',
            'database_name' => 'proyecto_hlc',
            'server' => 'localhost',
            'username' => 'root',
            'password' => ''
        ]);

        if(isset($_POST["login"])){
            $login = $_POST["username"];
            $password = $_POST["pass"];

            $resultado = $database->select("usuarios", "*", ["login"=>$login, "password"=>$password]);

            if(!empty($resultado)){
                $_SESSION["login"]=$login;
                header("Location: control_panel.php");
            }else{
                echo "<script type=\"text/javascript\">";
                echo "mostrarError();";
                echo "</script>";
            }
        }
    ?>
</body>
</html>