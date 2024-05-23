<?php
class Usuarios
{
    private $nombre;
    private $contraseña;
    private $correo;
    private $Idborrar;

    public function inicializar($nom, $cont, $corr)
    {
        $this->nombre = $nom;
        $this->contraseña = $cont;
        $this->correo = $corr;
    }
    public function insertar()
    {
        include("../../configuracion/bd.php");
        $query = "INSERT INTO tbl_usuarios(id,usuario,contraseña,correo)VALUES(null,'$this->nombre','$this->contraseña','$this->correo')";
        mysqli_query($conn, $query);
    }
    public function borrar($IDborrar)
    {
        include("../../configuracion/bd.php");
        $this->Idborrar = $IDborrar;
        $query = "DELETE  FROM tbl_usuarios WHERE id = ' $this->Idborrar'";
        mysqli_query($conn, $query);
        header("Location: index.php");
    }
    public function actualizar()
    {
        include("../../configuracion/bd.php");

        if (isset($_GET['txtID'])) {
            $txtID = $_GET['txtID'];
            $query = "UPDATE tbl_usuarios SET usuario = '$this->nombre',contraseña = ' $this->contraseña',correo = '$this->correo ' WHERE id = ' $txtID ' ";
            mysqli_query($conn, $query);
        }
    }
}
$u1 = new Usuarios();
if (isset($_POST['nombredeusuario'])) {
    $u1->inicializar($_REQUEST['nombredeusuario'], $_REQUEST['contraseña'], $_REQUEST['email']);
    $u1->insertar();
} elseif (isset($_POST['nombredeusuarioMOD'])) {
    $u1->inicializar($_REQUEST['nombredeusuarioMOD'], $_REQUEST['contraseñaMOD'], $_REQUEST['emailMOD']);
    $u1->actualizar();
}
if (!$_POST['nombredeusuario'] && !$_POST['nombredeusuarioMOD']) {
    $u1->borrar($_GET['txtID']);
}
header("Location: index.php");
