<?php
$exito = $error = '';

// Verificar si el formulario ha sido enviado
if (isset($_POST['btnenviar'])) {
    // Recuperar datos del formulario
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $mensaje = $_POST['mensaje'];

    // Conecta a la base de datos 
    $conexion = new mysqli("localhost", "root", "", "viajes");

    // Verificar la conexión
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Preparar la consulta SQL para insertar el mensaje en la tabla
    $consulta = $conexion->prepare("INSERT INTO mensajes (nombre, email, mensaje) VALUES (?, ?, ?)");
    $consulta->bind_param("sss", $nombre, $email, $mensaje);

    // Ejecuta la consulta
    if ($consulta->execute()) {
        $exito = "Mensaje enviado correctamente.";
    } else {
        $error = "Error al enviar el mensaje.";
    }

    // Cierra la conexión
    $consulta->close();
    $conexion->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Contacto</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">

        <div class="container">
        <a href="#" class="navbar-brand"> <span class="text-info">Traslados</span>Combis </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarS" aria-controls="navbarS" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarS">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <a href="index.php" class="nav-link"> Inicio</a>
                <a href="servicios.php" class="nav-link"> Servicio</a>
                <a href="contacto.php" class="nav-link"> Contacto</a>
                <a href="blog.php" class="nav-link">Blog</a>
                <a href="login.php" class="nav-link">Iniciar sesion</a>
            </ul>
        </div>

        </div>
        </nav>
    </header>

    <main class="container">
        
      <section class="contacto" id="contact">
        <form action="" method="post" id="contact-form">
            <?php
            if ($exito !== '') {
                echo "<p style='color: green; font-weight: bold;'>$exito</p>";
            } elseif ($error !== '') {
                echo "<p style='color: red; font-weight: bold;'>$error</p>";
            }
            ?>

            <h2>¡Contáctanos!</h2>
            <p>Si tienes alguna pregunta o comentario, no dudes en ponerte en contacto con nosotros.</p>

            <label for="nombre"><h4>Nombre:</h></label>
            <br>
            <input type="text" id="nombre" name="nombre" required>
            <br>
            <label for="email"><h4>Correo Electrónico:</h4></label>
            <br>
            <input type="email" id="email" name="email" required>
            <br>
            <label for="mensaje"><h4>Mensaje</h4></label>
            <br>
            <textarea id="mensaje" name="mensaje" rows="4" required></textarea>
            <br>
            <button type="submit" name="btnenviar">Enviar Mensaje</button>
        </form>
    </section>
<br>
<br>

    <footer class="footer">
        <p> <h3>&copy; 2024 TrasladosCombis. Todos los derechos reservados.</h3></p>
    </footer>
</body>

</html>
