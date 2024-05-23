<?php

include("./administrador/configuracion/bd.php");
$url_base = "http://localhost/pcfinal/";

$query  = "SELECT *,(SELECT modelo_combi
FROM combis 
WHERE combis.id = recorridofijo1.id_combiasignada limit 1) as combienuso,(SELECT patente_combi
FROM combis 
WHERE combis.id = recorridofijo1.id_combiasignada limit 1) as patente,(SELECT capacidad_combi
FROM combis 
WHERE combis.id = recorridofijo1.id_combiasignada limit 1) as capacidad,(SELECT nombrechofer
FROM choferes
WHERE choferes.id = recorridofijo1.id_choferasignado limit 1) as choferasignado
FROM recorridofijo1";/*Hice una subconsulta para leer el id de la combi que se le asignó
al recorrdio fijo 1 y 2. A esta subconsulta la nombré "combienuso" y la muestro en la 
linea 39*/
$consulta = mysqli_query($conn, $query);

$query_rec_fijo2  = "SELECT *,(SELECT modelo_combi
FROM combis 
WHERE combis.id = recorridofijo2.id_combiasignada limit 1) as combienuso2,(SELECT patente_combi
FROM combis 
WHERE combis.id = recorridofijo2.id_combiasignada limit 1) as patente2,(SELECT capacidad_combi
FROM combis 
WHERE combis.id = recorridofijo2.id_combiasignada limit 1) as capacidad2,(SELECT nombrechofer
FROM choferes
WHERE choferes.id = recorridofijo2.id_choferasignado limit 1) as choferasignado2
FROM recorridofijo2";/*Hice una subconsulta para leer el id de la combi que se le asignó
al recorrdio fijo 1 y 2. A esta subconsulta la nombré "combienuso" y la muestro en la 
linea 39*/
$consulta_rec_fijo2 = mysqli_query($conn, $query_rec_fijo2);


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
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
    <header>
       
    </header>
    <main class="container">
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
                    </ul>
                </div>

            </div>
        </nav>
        
    <main class="container">
        <br>
        <br>
        <br>
        <h1>Recorridos Fijos</h1>
        <div class="card">
            <div class="card-header">
                Once/CUDI-CUDI/once

            </div>
            <div class="card-body"><!--Tabla de la cabecera-->
                <div class="table-responsive-sm">
                    <table class="table " id="tabla_id">
                        <thead>
                            <tr>
                                <th scope="col">Salidas</th>
                                <th scope="col">Combi</th>
                                <th scope="col">Chofer</th>
                                <th scope="col">Lunes</th>
                                <th scope="col">Martes</th>
                                <th scope="col">Miercoles</th>
                                <th scope="col">Jueves</th>
                                <th scope="col">Viernes</th>
                                <th scope="col">Funciones</th>

                            </tr>
                        </thead>
                        <tbody>




                            <!--Cuerpo de la tabla. Donde mostramos los datos-->
                            <?php foreach ($consulta as $registro) { ?>
                                <tr class="">
                                    <td scope="row"><?php echo $registro['salida']; ?>
                                    </td>
                                    <td><?php echo $registro['combienuso']; ?></td>
                                    <td><?php echo $registro['choferasignado']; ?></td>
                                    <td><?php echo $registro['horario']; ?></td>
                                    <td><?php echo $registro['horario']; ?></td>
                                    <td><?php echo $registro['horario']; ?></td>
                                    <td><?php echo $registro['horario']; ?></td>
                                    <td><?php echo $registro['horario']; ?></td>
                                    <td><a name="" id="" class="btn btn-primary" href="../pcfinal/inforecfijos/infomacionrec.php/?txtID=<?php echo $registro['id']; ?>" role="button">Información</a></td>
                                <?php } ?>
                                </tr>




                        </tbody>
                    </table>
                </div>

            </div>

        </div>
        <div class="card">
            <div class="card-header">
                Once/UNLAM-UNLAM/Once
            </div>
            <div class="card-body">
                <div class="table-responsive-md">
                    <table class="table ">
                        <thead>
                            <tr>
                                <th scope="col">Salidas</th>
                                <th scope="col">Combi</th>
                                <th scope="col">Chofer</th>
                                <th scope="col">Lunes</th>
                                <th scope="col">Martes</th>
                                <th scope="col">Miercoles</th>
                                <th scope="col">Jueves</th>
                                <th scope="col">Viernes</th>
                                <th scope="col">Funciones</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($consulta_rec_fijo2 as $registro2) { ?>
                                <tr class="">
                                    <td scope="row"><?php echo $registro2['salida']; ?>
                                    </td>
                                    <td><?php echo $registro2['combienuso2']; ?></td>
                                    <td><?php echo $registro2['choferasignado2']; ?></td>
                                    <td><?php echo $registro2['horariofijo']; ?></td>
                                    <td><?php echo $registro2['horariofijo']; ?></td>
                                    <td><?php echo $registro2['horariofijo']; ?></td>
                                    <td><?php echo $registro2['horariofijo']; ?></td>
                                    <td><?php echo $registro2['horariofijo']; ?></td>
                                    <td><a name="" id="" class="btn btn-primary" href="<?php echo $url_base ?>inforecfijos/inforec2.php?txtID=<?php echo $registro2['id']; ?>" role="button">Información</a></td>
                                <?php } ?>
                                </tr>

                        </tbody>
                    </table>
                </div>

            </div>
            <div class="card-footer text-muted">

            </div>
        </div>
        <br><br>
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
            <?php

            ?>







        </form>

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