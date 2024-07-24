<?php

include("./administrador/configuracion/bd.php");
$url_base = "http://localhost/pcfinal/";

$lectura_rec_turisticos = "SELECT *,(SELECT modelo_combi 
FROM combis 
WHERE combis.id = rec_turisticos.id_combiusada limit 1) as combidelrecorridoturistico
FROM rec_turisticos";
$consulta_rec_turisticos = mysqli_query($conn, $lectura_rec_turisticos);

?>

<!doctype html>
<html lang="en">

<head>
    <title>Recorridos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
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
                      <a href="blog.php" class="nav-link"> Blog</a>
                      <a href="login.php" class="nav-link">Iniciar sesion</a>
                    </ul>
                </div>

            </div>
        </nav>       
    </header>
    <br>
    <br>
    <main class="container">
        <form action="" method="post">

            <h3> Detinos turisticos disponibles</h3>
            <div class="table-responsive-md">
                <table class="table table-primary">
                    <thead>
                        <tr>
                            <th scope="col">Destino</th>
                            <th scope="col">Distancia Total en km</th>
                            <th scope="col">Precio/km</th>
                            <th scope="col">Precio Total</th>
                            <th scope="col">Combi disponible</th>
                            <th scope="col">Reservar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($consulta_rec_turisticos as $registro) { ?>
                            <tr class="">
                                <td><?php echo $registro['destino_turistico']; ?>
                                </td>
                                <td><?php echo $registro['distancia_recorrido'] . "km"; ?></td>
                                <td><?php echo "$" .  $registro['precio_km']; ?></td>
                                <td><?php echo "$" . $registro['precio_km'] * $registro['distancia_recorrido']; ?></td>

                                <td><?php echo $registro['combidelrecorridoturistico']; ?></td>
                                <td>
                                    <a name="btnreserva" id="btnreserva" class="btn btn-primary" href="reservar.php?txtID=<?php echo $registro['id']; ?> " role=" button">Ir a reservar</a>
                                </td>

                            <?php } ?>
                            </tr>

                    </tbody>
                </table>
            </div> 
        </form>
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