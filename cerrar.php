<?php include("./administrador/templates/cabecera.php"); ?>
<?php
session_start(); //INICIAMOS SESION
session_destroy(); //Esta linea destruye la sesion actual y hay que volver a iniciar sesion
header("Location:login.php"); //Redireccion a la pagina de logueo
?>

</div><?php include("./administrador/templates/pie.php"); ?>