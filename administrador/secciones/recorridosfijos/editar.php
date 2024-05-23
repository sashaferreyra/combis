<?php
include("../../configuracion/bd.php");
if ($_GET['txtID']) { //Si existe un ID recibido mediante el metodo get
    $txtID = $_GET['txtID']; // lo guardamos en una variable
    $select_rec_fijo1 = "SELECT * FROM recorridofijo1 WHERE id = '$txtID'"; //String de consulta para consultar los registros correspondientes a ese ID recibido
    $consulta_rec_fijo1 = mysqli_query($conn, $select_rec_fijo1); //String que ejecuta el string anterior junto con la base de datos guardada en la variable $conn
    $lectura_rec_fijo1 = mysqli_fetch_array($consulta_rec_fijo1); //String que recorre la base de datos en forma de array, y seleccona el registro de la base de datos que coincide con el ID recibido
} elseif ($_GET['txtID2']) {
    $txtID = $_GET['txtID2'];
    $select_rec_fijo2 = "SELECT * FROM recorridofijo2 WHERE id = '$txtID'"; //String de consulta para consultar los registros correspondientes a ese ID recibido
    $consulta_rec_fijo2 = mysqli_query($conn, $select_rec_fijo2); //String que ejecuta el string anterior junto con la base de datos guardada en la variable $conn
    $lectura_rec_fijo2 = mysqli_fetch_array($consulta_rec_fijo2); //String que recorre la base de datos en forma de array, y seleccona el registro de la base de datos que coincide con el ID recibido

}
$query = "SELECT * FROM combis"; //String que consulta los datos de la tabla combis
$consultacombis = mysqli_query($conn, $query); //String que ejecuta el string anterior junto con la base de datos guardada en la variable $conn

$query = "SELECT * FROM choferes"; //String que consulta los datos de la tabla choferes
$consultachoferes = mysqli_query($conn, $query); //String que ejecuta el string anterior junto con la base de datos guardada en la variable $conn

?>
<?php
include("../../templates/cabecera.php");
?>

<div class="card">
    <div class="card-header">
        Recorridos
    </div>
    <div class="card-body">
        <form action="claseRecFijos.php?<?php if ($_GET['txtID']) { ?>
                                            txtID=<?php echo $_GET['txtID'];
                                                } elseif ($_GET['txtID2']) { ?>
                                                    txtID2=<?php echo $_GET['txtID2'];
                                                        } ?>" method="post">

            <div class="mb-3">
                <label for="txtID" class="form-label">ID:</label>
                <input type="text" value="<?php echo $txtID; ?>" class="form-control" readonly name="txtID" id="txtID" aria-describedby="helpId" placeholder="ID">
            </div>
            <div class="mb-3">
                <label for="Salida" class="form-label">Salida</label>
                <input type="text" value="<?php if (isset($lectura_rec_fijo1['salida'])) {
                                                echo $lectura_rec_fijo1['salida'];
                                            } else {
                                                echo $lectura_rec_fijo2['salida'];
                                            } ?>" class="form-control" name="Salida" readonly id="Salida" placeholder="Salida">
            </div>

            <div class="mb-3">
                <label for="Horario" class="form-label">Horario</label>
                <input type="text" value="<?php if (isset($lectura_rec_fijo1['horario'])) {
                                                echo $lectura_rec_fijo1['horario'];
                                            } else {
                                                echo $lectura_rec_fijo2['horariofijo'];
                                            } ?>" class="form-control" name="Horario" readonly id="Horario" placeholder="Horario">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Combi Asignada:</label>

                <select class="form-select form-select-lg" name="combiasignada" id="combiasignada">
                    <?php foreach ($consultacombis as $registro) { ?>

                        <option <?php if (isset($_GET['txtID'])) {
                                    echo ($lectura_rec_fijo1['id_combiasignada'] == $registro['id']) ? "selected" : "";
                                } elseif (isset($_GET['txtID2'])) {
                                    echo ($lectura_rec_fijo2['id_combiasignada'] == $registro['id']) ? "selected" : "";
                                }

                                ?> value="<?php echo $registro['id']; ?>"><?php echo $registro['modelo_combi']; ?>
                        </option>

                    <?php } ?>
                </select>

            </div>
            <div class="mb-3">
                <label for="" class="form-label">Chofer Asignado:</label>

                <select class="form-select form-select-lg" name="choferasignado" id="choferasignado">
                    <?php foreach ($consultachoferes as $registro) { ?>

                        <option <?php if (isset($_GET['txtID'])) {
                                    echo ($lectura_rec_fijo1['id_choferasignado'] == $registro['id']) ? "selected" : "";
                                } elseif (isset($_GET['txtID2'])) {
                                    echo ($lectura_rec_fijo2['id_choferasignado'] == $registro['id']) ? "selected" : "";
                                } ?> value="<?php echo $registro['id']; ?>"><?php echo $registro['nombrechofer']; ?>
                        </option>

                    <?php } ?>
                </select>
            </div>
            <button type="submit" name="actualizar" class="btn btn-success">Actualizar</button>
            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>

        </form>
    </div>
    <div class="card-footer text-muted">

    </div>
</div>


<?php
include("../../templates/pie.php");

?>