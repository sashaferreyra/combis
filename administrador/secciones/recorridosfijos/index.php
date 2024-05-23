<?php

include("../../configuracion/bd.php");

$query  = "SELECT *,(SELECT modelo_combi
FROM combis 
WHERE combis.id = recorridofijo1.id_combiasignada limit 1) as combienuso,(SELECT patente_combi
FROM combis 
WHERE combis.id = recorridofijo1.id_combiasignada limit 1) as patente,(SELECT capacidad_combi
FROM combis 
WHERE combis.id = recorridofijo1.id_combiasignada limit 1) as capacidad,(SELECT nombrechofer
FROM choferes
WHERE choferes.id = recorridofijo1.id_choferasignado limit 1) as choferasignado
FROM recorridofijo1";
$consulta = mysqli_query($conn, $query);


$query2 = "SELECT *,(SELECT modelo_combi
FROM combis 
WHERE combis.id = recorridofijo2.id_combiasignada limit 1) as combienuso2,(SELECT patente_combi
FROM combis 
WHERE combis.id = recorridofijo2.id_combiasignada limit 1) as patente2,(SELECT capacidad_combi
FROM combis 
WHERE combis.id = recorridofijo2.id_combiasignada limit 1) as capacidad2,(SELECT nombrechofer
FROM choferes
WHERE choferes.id = recorridofijo2.id_choferasignado limit 1) as choferasignado2
FROM recorridofijo2";
$consulta2 = mysqli_query($conn, $query2);
?>
<?php include("../../templates/cabecera.php");
?>
<h1>Recorridos Fijos</h1>
<div class="card">
    <div class="card-header">
        Once/CUDI-CUDI/once

    </div>
    <div class="card-body">
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
                        <th scope="col">VIernes</th>
                        <th scope="col">Funciones</th>

                    </tr>
                </thead>
                <tbody>





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
                            <td><a name="" id="" class="btn btn-primary" href="editar.php?txtID=<?php echo $registro['id']; ?>" role="button">Actualizar</a></td>
                        <?php } ?>
                        </tr>

                </tbody>
            </table>
        </div>

    </div>

</div>
<br><br>
<div class="card">
    <div class="card-header">
        Once/UNLAM-UNLAM/ONCE
    </div>
    <div class="card-body">
        <div class="table-responsive-sm">
            <table class="table" id="tabla2_id">
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
                    <?php foreach ($consulta2 as $registro) { ?>
                        <tr class="">
                            <td scope="row"><?php echo $registro['salida']; ?>
                            </td>
                            <td><?php echo $registro['combienuso2']; ?></td>
                            <td><?php echo $registro['choferasignado2']; ?></td>
                            <td><?php echo $registro['horariofijo']; ?></td>
                            <td><?php echo $registro['horariofijo']; ?></td>
                            <td><?php echo $registro['horariofijo']; ?></td>
                            <td><?php echo $registro['horariofijo']; ?></td>
                            <td><?php echo $registro['horariofijo']; ?></td>
                            <td><a name="" id="" class="btn btn-primary" href="editar.php?txtID2=<?php echo $registro['id']; ?>" role="button">Actualizar</a></td>
                        <?php } ?>
                        </tr>
                </tbody>
            </table>
        </div>

    </div>

</div>

<?php include("../../templates/pie.php");
?>