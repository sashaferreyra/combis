<?php include("../../configuracion/bd.php");


if (isset($_GET['txtID'])) {
    $txtID = $_GET['txtID'];
    $query = "SELECT * FROM combis WHERE id = '$txtID' ";
    $consulta = mysqli_query($conn, $query);
    $lectura = mysqli_fetch_array($consulta);
}

?>
<?php include("../../templates/cabecera.php");
?>

<br>
<div class="card">
    <div class="card-header">
        Editar Combis
    </div>
    <div class="card-body">
        <form action="claseCombi.php?txtID=<?php echo $txtID; ?>" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="txtID" class="form-label">ID:</label>
                <input type="text" value="<?php echo $txtID; ?>" class="form-control" readonly name="txtID" id="txtID" aria-describedby="helpId" placeholder="ID">
            </div>
            <div class="mb-3">
                <label for="ModeloMod" class="form-label">Modelo</label>
                <input type="text" value="<?php echo $lectura['modelo_combi']; ?>" class="form-control" name="ModeloMod" id="ModeloMod" aria-describedby="helpId" placeholder="Ingresa el modelo de la combi">
            </div>
            <div class="mb-3">
                <label for="PatenteMod" class="form-label">Patente</label>
                <input type="text" value="<?php echo $lectura['patente_combi']; ?>" class="form-control" name="PatenteMod" id="PatenteMod" aria-describedby="helpId" placeholder="Ingrese la patente de la combi">
            </div>
            <div class="mb-3">
                <label for="capacidadCombi" class="form-label">Capacidad de la combi</label>
                <select class="form-select form-select-lg" name="capacidadCombi" required id="capacidadCombi">
                    <option <?php echo ($lectura['capacidad_combi']) ? "selected" : ""; ?>><?php echo ($lectura['capacidad_combi']); ?></option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                </select>
            </div>


            <button type="submit" name="actualizar" class="btn btn-success">Actualizar</button>
            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>


        </form>
    </div>
    <?php include("../../templates/pie.php"); ?>