<?php include("../../configuracion/bd.php"); ?>
<?php include("../../templates/cabecera.php"); ?>

<br>
<div class="card">
    <div class="card-header">
        Usuarios
    </div>
    <div class="card-body">
        <form action="claseusuarios.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nombredeusuario" class="form-label">Nombre del usuario:</label>
                <input type="text" class="form-control" name="nombredeusuario" id="nombredeusuario" aria-describedby="helpId" placeholder="Ingresa del usuario">
            </div>
            <div class="mb-3">
                <label for="contraseña" class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="contraseña" id="contraseña" aria-describedby="helpId" placeholder="Escriba su contraseña">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Correo:</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="Escriba su correo">
            </div>
            <button type="submit" class="btn btn-success">Agregar</button>
            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>


        </form>
    </div>
    <?php include("../../templates/pie.php"); ?>