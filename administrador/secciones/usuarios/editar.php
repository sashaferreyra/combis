<?php include("../../configuracion/bd.php");


if (isset($_GET['txtID'])) {
    $txtID = $_GET['txtID'];
    $query = "SELECT * FROM tbl_usuarios WHERE id = '$txtID' ";
    $consulta = mysqli_query($conn, $query);
    $lectura = mysqli_fetch_array($consulta);
}

?>
<?php include("../../templates/cabecera.php");
?>

<br>
<div class="card">
    <div class="card-header">
        Editar usuarios
    </div>
    <div class="card-body">
        <form action="claseusuarios.php?txtID=<?php echo $txtID; ?>" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="txtID" class="form-label">ID:</label>
                <input type="text" value="<?php echo $txtID; ?>" class="form-control" readonly name="txtID" id="txtID" aria-describedby="helpId" placeholder="ID">
            </div>
            <div class="mb-3">
                <label for="nombredeusuarioMOD" class="form-label">Nombre del usuario:</label>
                <input type="text" value="<?php echo $lectura['usuario']; ?>" class="form-control" name="nombredeusuarioMOD" id="nombredeusuarioMOD" aria-describedby="helpId" placeholder="Ingresa del usuario">
            </div>
            <div class="mb-3">
                <label for="contraseñaMOD" class="form-label">Contraseña</label>
                <input type="password" value="<?php echo $lectura['contraseña']; ?>" class="form-control" name="contraseñaMOD" id="contraseñaMOD" aria-describedby="helpId" placeholder="Escriba su contraseña">
            </div>
            <div class="mb-3">
                <label for="emailMOD" class="form-label">Correo:</label>
                <input type="email" value="<?php echo $lectura['correo']; ?>" class="form-control" name="emailMOD" id="emailMOD" aria-describedby="helpId" placeholder="Escriba su correo">
            </div>
            <button type="submit" class="btn btn-success">Actualizar</button>
            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>


        </form>
    </div>
    <?php include("../../templates/pie.php"); ?>