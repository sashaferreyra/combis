<?php
include("../../configuracion/bd.php");
$query = "SELECT * FROM combis";
$consulta = mysqli_query($conn, $query);

?>
<?php
include("../../templates/cabecera.php");
?>

<div class="card">
    <div class="card-header">
        <h3>Vehiculos disponibles</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive-md">
            <table class="table " id="tabla_id">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Modelo</th>
                        <th scope="col">Patente</th>
                        <th scope="col">Capacidad</th>
                        <th scope="col">Funciones</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($consulta as $registro) { ?>
                        <tr class="">
                            <td scope="row"><?php echo $registro['id']; ?></td>
                            <td><?php echo $registro['modelo_combi']; ?></td>
                            <td><?php echo $registro['patente_combi']; ?></td>
                            <td><?php echo $registro['capacidad_combi']; ?></td>
                            <td>
                                <a class="btn btn-info" href="editar.php?txtID=<?php echo $registro['id']; ?>" role="button">Editar</a>
                                <a class="btn btn-danger" href="claseCombi.php?txtID= <?php echo $registro['id']; ?>" role="button">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>


    </div>
    <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar Combi</a>

</div>

<?php
include("../../templates/pie.php");
?>