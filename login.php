<?php
session_start(); //Abrimos sesion
if ($_POST) { //Si hay un $POST
    include("./administrador/configuracion/bd.php"); //Incluimos la ruta del archivo de base de datos

    $nombredeusuario = $_POST['nombredeusuario'];
    $contraseña = $_POST['contraseña'];
    $query = "SELECT *,count(*) as n_usuario
        FROM tbl_usuarios
        WHERE usuario = '$nombredeusuario ' AND contraseña = '$contraseña' ";/*Este string lee la
        tabla usuarios y cuenta, a traves de count, la cantidad de registros y guarda
        la informacion en el alias "n_usuario" */

    $consulta = mysqli_query($conn, $query); //Ejecutamos la consulta
    foreach ($consulta as $registro) { //Recorremos la base de datos
        if ($registro['n_usuario'] > 0) { //Si esta condicion se cumple, significa que hay un registro
            $_SESSION['usuario'] = $registro['usuario'];/* En $_SESSION['usuario']  se va a guardar
            el registro encontrado  */

            header("Location:./administrador/");/* El proceso anterior busca un usuario en la tabla
            usuarios y al encontrarlo lo guarda en la variable de sesion. Se inicia sesion con el 
            usuario encontrado en la base de datos. Si funciona, esta linea nos redirecciona al
            administrador. */
        } else {
            $mensaje = "Error. Usuario o contraseña incorrectos"; //Se muestra este mensaje si no se 
            //encuentra a un usuario o se ingresa mal el usuario y/o contraseña.
        }
    }
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Login</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <a href="#" class="navbar-brand"><span class="text-info">Traslados</span>Combis</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarS" aria-controls="navbarS" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarS">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a href="index.php" class="nav-link">Inicio</a></li>
                        <li class="nav-item"><a href="servicios.php" class="nav-link">Servicio</a></li>
                        <li class="nav-item"><a href="contacto.php" class="nav-link">Contacto</a></li>
                        <li class="nav-item"><a href="blog.php" class="nav-link">Blog</a></li>
                        <li class="nav-item"><a href="login.php" class="nav-link">Iniciar sesión</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
      <br>
      <br>
    <main class="container">
        <div class="row">
            <div class="col-md-4">

            </div>
            <div class="col-md-4">
                <br>
                <div class="card">
                    <div class="card-header">
                        Login
                    </div>
                    <div class="card-body">
                       
                    
                        <?php if (isset($mensaje)) { ?>
                            <div class="alert alert-danger" role="alert">
                                <strong><?php echo  $mensaje ?></strong>
                            </div>
                        <?php } ?>

                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="nombredeusuario" class="form-label">Usuario:</label>
                                <input type="text" class="form-control" name="nombredeusuario" required id="nombredeusuario" placeholder="Escriba su usuario">
                            </div>
                            <div class="mb-3">
                                <label for="contraseña" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" name="contraseña" required id="contraseña" placeholder="Escriba su contraseña">
                            </div>
                            <button type="submit" class="btn btn-primary">Entrar</button>
                            <br>
                            <br>
                        </form>
                        <a name="" id="" class="btn btn-primary" href="index.php" role="button">Volver a Inicio</a>


                    </div>

                </div>
            </div>
        </div>

    </main>
    
    <footer>
    <p> <h4>&copy; 2024 TrasladosCombis. Todos los derechos reservados.</h4></p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>