<?php include("../../configuracion/bd.php"); ?>

<?php include("../../templates/cabecera.php"); ?>
<?php
if (isset($_GET['txtID'])) {
    $txtID = $_GET['txtID'];
    $select_rec_turisticos = "SELECT * FROM rec_turisticos WHERE id = '$txtID'";
    $consulta_rec_turisticos = mysqli_query($conn, $select_rec_turisticos);
    $lectura_rec_turisticos = mysqli_fetch_array($consulta_rec_turisticos);
}
$query = "SELECT * FROM combis"; //String que consulta los datos de la tabla combis
$consultacombis = mysqli_query($conn, $query); //String que ejecuta el string anterior junto con la base de datos guardada en la variable $conn



?>
<div class="card">
    <div class="card-header">
        Editar recorrido
    </div>
    <div class="card-body">
        <form action="claseRecTur.php?txtID=<?php echo $txtID; ?>" method="post">
            <div class="mb-3">
                <label for="txtID" class="form-label">ID:</label>
                <input type="text" value="<?php echo $txtID; ?>" class="form-control" readonly name="txtID" id="txtID" placeholder="ID">
            </div>
            <div class="mb-3">
                <label for="destinoturistico" class="form-label">Destino:</label>
                <input type="text" value="<?php echo $lectura_rec_turisticos['destino_turistico']; ?>" class="form-control" name="destinoturistico" placeholder="Destino">
            </div>
            <div class="mb-3">
                <label for="Distancia" class="form-label">Distancia:</label>
                <input type="text" value="<?php echo $lectura_rec_turisticos['distancia_recorrido']; ?>" class="form-control" name="Distancia" placeholder="Distancia">
            </div>
            <div class="mb-3">
                <label for="preciokm" class="form-label">Precio/km:</label>
                <input type="text" value="<?php echo $lectura_rec_turisticos['precio_km']; ?>" class="form-control" name="preciokm" placeholder="preciokm">
            </div>

            <?php foreach ($consultacombis as $registro) { ?>
            <?php } ?>
            <div class="mb-3">
                <label for="combiasignada" class="form-label">Combi asignada:</label>
                <input type="text" value="<?php echo $registro['modelo_combi']; ?>" class="form-control" name="combiasignada" readonly placeholder="Destino">
                </select>

            </div>
            <button type="submit" name="actualizar" class="btn btn-success">Actualizar</button>
            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>


        </form>
    </div>
    <div class="card-footer text-muted">

    </div>
</div>


<?php include("../../templates/pie.php"); ?>