<?php include("../../templates/cabecera.php"); ?>
<?php
include("../../configuracion/bd.php");
$select = "SELECT * FROM reservas ";
$consulta = mysqli_query($conn, $select);



?>
<div class="card">
    <div class="card-header">
        Reservas
    </div>
    <div class="card-body">
        <div class="table-responsive-md">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">Nombre del cliente</th>
                        <th scope="col">Edad</th>
                        <th scope="col">DNI</th>
                        <th scope="col">Contacto</th>
                        <th scope="col">Destino</th>
                        <th scope="col">Fecha de salida</th>
                        <th scope="col">Horario de salida</th>
                        <th scope="col">Fecha de regreso</th>
                        <th scope="col">Horario de regreso</th>
                        <th scope="col">Cantidad de pasajeros</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($consulta as $registro) { ?>
                        <tr class="">
                            <td scope="row"><?php echo $registro['nombre_pasajero']; ?></td>
                            <td><?php echo $registro['edad_pasajero']; ?></td>
                            <td><?php echo $registro['DNI_pasajero']; ?></td>
                            <td><?php echo $registro['correo_pasajero']; ?></td>
                            <td><?php echo $registro['destino_reserva']; ?></td>
                            <td><?php echo $registro['fecha_salida']; ?></td>
                            <td> <?php echo $registro['horario_salida']; ?> </td>
                            <td><?php echo $registro['fecha_regreso']; ?></td>
                            <td> <?php echo $registro['horario_regreso']; ?> </td>
                            <td> <?php echo $registro['pasajeros']; ?> </td>
                            </tr>
                        <?php } ?>
                        

                </tbody>
            </table>
        </div>

    </div>
    <div class="card-footer text-muted">

    </div>
</div>

<?php include("../../templates/pie.php"); ?>