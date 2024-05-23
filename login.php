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
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
    <header>
        <!-- place navbar here -->
    </header>
    <main class="container">
        <div class="row">
            <div class="col-md-4">

            </div>
            <div class="col-md-4">

                <br><br>
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

                        <form action="" method="post"><!--formulario para entrar al administrador-->
                            <div class="mb-3">
                                <label for="nombredeusuario" class="form-label">Usuario:</label>
                                <input type="text" class="form-control" name="nombredeusuario" required id="nombredeusuario" placeholder="Escriba su usuario">
                            </div>
                            <div class="mb-3">
                                <label for="contraseña" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" name="contraseña" required id="contraseña" placeholder="Escriba su contraseña">
                            </div>
                            <button type="submit" class="btn btn-primary">Entrar al administrador</button>
                            <br>
                            <br>
                        </form>
                        <a name="" id="" class="btn btn-primary" href="index.php" role="button">Ver como usuario</a><!--Boton
                    para dirigirse a la pagina principal-->


                    </div>

                </div>
            </div>
        </div>

    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>