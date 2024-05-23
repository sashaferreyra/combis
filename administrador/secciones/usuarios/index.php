<?php include("../../templates/cabecera.php") ?>
<?php include("../../configuracion/bd.php");

$query = "SELECT * FROM tbl_usuarios";
$consulta = mysqli_query($conn, $query);

?>
<br>
<div class="card">
    <div class="card-header">
        <h3>Lista de usuarios</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive-sm">
            <table class="table" id="tabla_id">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre del usuario</th>
                        <th scope="col">Contraseña</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Acciones</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($consulta as $registro) { ?>
                        <tr class="">
                            <td scope="row"><?php echo $registro['id']; ?></td>
                            <td><?php echo $registro['usuario']; ?></td>
                            <td><?php echo $registro['contraseña']; ?></td>
                            <td><?php echo $registro['correo']; ?></td>

                            <td>
                                <a class="btn btn-info" href="editar.php?txtID=<?php echo $registro['id']; ?>" role="button">Editar</a>
                                <a class="btn btn-danger" href=" javascript: borrar( <?php echo $registro['id']; ?>)" role="button">Eliminar</a>
                            </td>

                        </tr>

                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
    <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar Registro</a>

</div>
<script>
    function borrar(id) {
        //   alert(id);

        Swal.fire('Se borrarrá el registro', {




        }).then((result) => {
            window.location = "claseusuarios.php?txtID=" + id;
        })

    };
</script>


<?php include("../../templates/pie.php") ?>