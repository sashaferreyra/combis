<?php
include("../administrador/configuracion/bd.php");
$url_base = "http://localhost/pcfinal/";



if (isset($_GET['txtID'])) {

    $txtID = $_GET['txtID'];
    $select = "SELECT * FROM recorridofijo1 WHERE id = '$txtID'";
    $consulta = mysqli_query($conn, $select);
    $lectura = mysqli_fetch_array($consulta);

    $query  = "SELECT *,(SELECT modelo_combi
FROM combis 
WHERE combis.id = recorridofijo1.id_combiasignada limit 1) as combienuso,(SELECT patente_combi
FROM combis 
WHERE combis.id = recorridofijo1.id_combiasignada limit 1) as patente,(SELECT capacidad_combi
FROM combis 
WHERE combis.id = recorridofijo1.id_combiasignada limit 1) as capacidad,(SELECT nombrechofer
FROM choferes
WHERE choferes.id = recorridofijo1.id_choferasignado limit 1) as choferasignado
FROM recorridofijo1  WHERE id = '$txtID'";/*Hice una subconsulta para leer el id de la combi que se le asignó
al recorrdio fijo 1 y 2. A esta subconsulta la nombré "combienuso" y la muestro en la 
linea 39
$consul = mysqli_query($conn, $query);*/
    $consulta = mysqli_query($conn, $query);
}
?>


<!doctype html>
<html lang="en">

<head>
    <title>Información</title>
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
        <h1>Informacion de recorridos</h1>
        <h2>Recorrido:</h2>
        <p><?php if (isset($lectura['salida'])) {
                echo $lectura['salida'];
            } ?>
        <h2>Horario de salida:</h2>
        <p><?php echo $lectura['horario']; ?></p>
        <h2>Combi asignada al viaje:</h2>
        <?php foreach ($consulta as $registro) { ?>
            <p><?php echo $registro['combienuso']; ?></p>

            <h2>Patente de la combi:</h2>
            <p><?php echo $registro['patente']; ?></p>



        <?php } ?>
        <h2>Paradas realizadas:</h2>
        <p><?php echo $lectura['paradas_recorrido']; ?></p>





        <h2>Chofer asignado al viaje:</h2>
        <?php foreach ($consulta as $registro) { ?>
            <p><?php echo $registro['choferasignado']; ?></p>


        <?php } ?>

    </main>
    <footer>
        <!-- place footer here -->

        <a name="" id="" class="btn btn-primary" href="<?php echo $url_base ?>servicios.php" role="button">Volver</a>
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>