<?php
include("../../configuracion/bd.php");

$leer = "SELECT * FROM rec_turisticos";
$consulta = mysqli_query($conn, $leer);
?>






<?php

include("../../templates/cabecera.php");
?>
<div class="table-responsive-md">
    <table class="table table-primary" id="tabla_id">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Destino</th>
                <th scope="col"> Distancia</th>
                <th scope="col"> Precio/km</th>
                <th scope="col"> Precio Total</th>
                <th scope="col"> Funciones</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($consulta as $registro) { ?>
                <tr class="">
                    <td scope="row"><?php echo $registro['id']; ?></td>
                    <td><?php echo $registro['destino_turistico']; ?></td>
                    <td><?php echo $registro['distancia_recorrido']; ?></td>
                    <td><?php echo "$" . $registro['precio_km']; ?></td>
                    <td> <?php echo "$" . $registro['distancia_recorrido'] * $registro['precio_km'];   ?></td>
                    <td>
                        <a class="btn btn-info" href="editar.php?txtID=<?php echo $registro['id']; ?>" role="button">Editar</a>
                        <a class="btn btn-danger" href="claseRecTur.php?txtID= <?php echo $registro['id']; ?>" role="button">Eliminar</a>
                    </td>


                </tr>
            <?php } ?>
        </tbody>
    </table>
    <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar destino Turistico</a>

</div>



<?php
include("../../templates/pie.php");


?>