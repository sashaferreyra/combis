<?php include("../../configuracion/bd.php") ?>
<?php include("../../templates/cabecera.php"); ?>

<div class="card">
    <div class="card-header">
        Cargar combis
    </div>
    <div class="card-body">
        <form action="claseCombi.php" method="post">
            <div class="mb-3">
                <label for="Modelo" class="form-label">Modelo</label>
                <input type="text" class="form-control" name="Modelo" id="Modelo" placeholder="Ingrese el modelo">
            </div>
            <div class="mb-3">
                <label for="Patente" class="form-label">Patente</label>
                <input type="text" class="form-control" name="Patente" id="Patente" aria-describedby="helpId" placeholder="Ingrese la patente">
            </div>
            <div class="mb-3">
                <label for="capacidadCombi" class="form-label">Capacidad de la combi</label>
                <select class="form-select form-select-lg" name="capacidadCombi" id="capacidadCombi">
                    <option selected>Seleccione una capacidad</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                </select>
            </div>
            <button type="submit" name="insertar" class="btn btn-success">Agregar</button>
            <a name="" id="" class="btn btn-danger" href="index.php" role="button">Cancelar</a>


        </form>
    </div>

</div>

<?php include("../../templates/pie.php"); ?>