<?php include("../../configuracion/bd.php"); ?>
<?php

$query = "SELECT * FROM combis"; //String que consulta los datos de la tabla combis
$consultacombis = mysqli_query($conn, $query); //String que ejecuta el string anterior junto con la base de datos guardada en la variable $conn


?>
<?php include("../../templates/cabecera.php"); ?>

<div class="card">
    <div class="card-header">
        Crear destinos Turisticos
    </div>
    <div class="card-body">
        <form action="claseRecTur.php" method="post">
            <div class="mb-3">
                <label for="destinoturistico" class="form-label">Destino:</label>
                <input type="text" class="form-control" name="destinoturistico" placeholder="Destino">
            </div>
            <div class="mb-3">
                <label for="Distancia" class="form-label">Distancia:</label>
                <input type="text" class="form-control" name="Distancia" placeholder="Distancia">
            </div>

            <div class="mb-3">
                <label for="preciokm" class="form-label">Precio/km:</label>
                <input type="text" class="form-control" name="preciokm" placeholder="preciokm">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Asignar Combi:</label>

                <select class="form-select form-select-lg" name="combiasignada" id="combiasignada">
                    <?php foreach ($consultacombis as $registro) { ?>

                        <option  value="<?php echo $registro['id']; ?>"><?php echo $registro['modelo_combi']; ?>
                        </option>

                    <?php } ?>
                </select>

            </div>

            <button type="submit" name="insertar" class="btn btn-success">Agregar</button>
            <a name="" id="" class="btn btn-danger" href="index.php" role="button">Cancelar</a>


        </form>
    </div>

</div>

<?php include("../../templates/pie.php"); ?>