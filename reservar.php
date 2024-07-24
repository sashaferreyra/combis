<?php
include("./administrador/configuracion/bd.php");

  if (isset($_GET['txtID'])) {
    $txtID = $_GET['txtID'];
    $select  = "SELECT *, (SELECT capacidad_combi 
                FROM combis 
                WHERE combis.id = rec_turisticos.id_combiusada limit 1) as capacidadpermitida
                FROM rec_turisticos 
                WHERE id = '$txtID'";
    $consulta = mysqli_query($conn, $select);
    $lectura = mysqli_fetch_array($consulta);
   }
 if (!$consulta) {
    die("Error en la consulta: " . mysqli_error($conn));
 }

if ($_POST) {
    $cantidaddepasajeros = $_POST['cantidaddepasajeros'];
    $nombrecompleto = $_POST['nombrecompleto'];
    $Edad = $_POST['Edad'];
    $dni = $_POST['dni'];
    $correo = $_POST['correo'];
    $fecha_salida = $_POST['fechasalida'];
    $horario_salida = $_POST['horariosalida'];
    $fecha_regreso = $_POST['fecharegreso'];
    $horario_regreso = $_POST['horarioregreso'];
    if ($cantidaddepasajeros == 0 || $cantidaddepasajeros == "") {
        $mensaje1 = "El viaje no puede salir sin pasajeros";
    } elseif ($cantidaddepasajeros > $lectura['capacidadpermitida']) {
        $mensaje2 = "Se excedió en la capacidad permitida";
    } elseif ($cantidaddepasajeros <= $lectura['capacidadpermitida']) {
        $mensaje3 = "Reservado";

        
        $insertar = "INSERT INTO reservas (nombre_pasajero, edad_pasajero, DNI_pasajero, correo_pasajero, destino_reserva, pasajeros, fecha_salida, horario_salida, fecha_regreso, horario_regreso)
        VALUES ('$nombrecompleto', '$Edad', '$dni', '$correo', '$lectura[destino_turistico]', '$cantidaddepasajeros', '$fecha_salida', '$horario_salida', '$fecha_regreso', '$horario_regreso')";
        
        $executar = mysqli_query($conn, $insertar);

        $idReservaInsertada = mysqli_insert_id($conn);

        // Generar un id_pago único para cada reserva
        $idPagoUnico = uniqid();
        $insertarPago = "INSERT INTO pagos (id_reserva, monto, metodo_pago) VALUES ('$idReservaInsertada', '$montoPago', 'PayPal')";
        $ejecutarPago = mysqli_query($conn, $insertarPago);

if ($ejecutarPago) {
    ob_end_flush();
    header("Location: pagos.php?txtID=".$txtID);
    exit();
} else {
    echo "Error al ejecutar la consulta: " . mysqli_error($conn);
}
    }   
}
?>


<!doctype html>
<html lang="en">

    <head>
        <title>Reserva</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
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
                <div class="card">
                <div class="card-header">
                    <h1>Reservas</h1>
                </div>
                <div class="card-body">
                    <?php if (isset($mensaje1)) { ?>
                        <div class="alert alert-warning" role="alert">
                            <strong><?php echo  $mensaje1 ?></strong>
                        </div>
                    <?php } elseif (isset($mensaje2)) { ?>
                        <div class="alert alert-danger" role="alert">
                            <strong><?php echo  $mensaje2 ?></strong>
                        </div>
                    <?php } elseif (isset($mensaje3)) { ?>
                        <div class="alert alert-success" role="alert">
                            <strong><?php echo  $mensaje3 ?></strong>
                        </div>
                    <?php  } ?>

                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="" class="form-label">Nombre completo</label>
                            <input type="text" class="form-control" name="nombrecompleto" required placeholder="Ingrese su nombre completo">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Edad</label>
                            <input type="text" class="form-control" name="Edad" required placeholder="Ingrese su edad">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">D.N.I</label>
                            <input type="text" class="form-control" name="dni" required placeholder="Ingrese su D.N.I">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Correo</label>
                            <input type="email" class="form-control" name="correo" required placeholder="Ingrese su correo">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Ingrese la cantidad de pasajeros</label><br>
                            <label for="" class="form-label">Permitidos:<?php echo $lectura['capacidadpermitida'];   ?></label>
                            <input type="text" class="form-control" name="cantidaddepasajeros" required placeholder="Ingrese la cantidad de pasajeros">
                        </div>
                        <div class="mb-3">
                        <label for="" class="form-label">Fecha de salida</label>
                        <select class="form-select" name="fechasalida">
                            <option value="2024-02-01">15 de febrero de 2024</option>
                            <option value="2024-02-02">21 de febrero de 2024</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Horario de salida</label>
                        <select class="form-select" name="horariosalida">
                            <option value="08:00">8:00 AM</option>
                            <option value="12:00">12:00 PM</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Fecha de regreso</label>
                        <select class="form-select" name="fecharegreso">
                            <option value="2024-02-03">17 de febrero de 2024</option>
                            <option value="2024-02-04">24 de febrero de 2024</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Horario de regreso</label>
                        <select class="form-select" name="horarioregreso">
                            <option value="16:00">4:00 PM</option>
                            <option value="18:00">6:00 PM</option>
                        </select>
                        </div>

                        <button type="submit" class="btn btn" style="background-color: black; color: white;">Confirmar Reserva</button>
                        <a name="" id="" class="btn btn-danger" href="index.php" role="button">Volver</a>
                    </form>
                    <div class="card-footer text-muted">
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