<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="_css/estilos.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
            <form name="login" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" class="login-form">
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
            </form>
        </section>
    </div>
</body>
</html>