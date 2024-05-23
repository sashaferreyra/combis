<?php
class Combi
{

    private $patente;
    private $modelo;
    private $asientosDisponibles;


    public function inicializar($patente, $modelo, $asientosDisponibles)
    {
        $this->patente = $patente;
        $this->modelo = $modelo;
        $this->asientosDisponibles = $asientosDisponibles;
    }



    //Metodo para ingresar los datos a la base de datos
    public function insertar()
    {
        include("../../configuracion/bd.php");
        $query = "INSERT INTO combis (modelo_combi,patente_combi,capacidad_combi)
         VALUES (' $this->modelo ','$this->patente',' $this->asientosDisponibles')";
        mysqli_query($conn, $query);
        header("Location: index.php");
    }

    //Metodo para actualizar los datos de la base de datos
    public function actualizar()
    {
        include("../../configuracion/bd.php");
        if (isset($_GET['txtID'])) {
            $txtID = $_GET['txtID'];
            $query = "UPDATE combis SET 
            modelo_combi = ' $this->modelo ', patente_combi = '$this->patente', capacidad_combi = '$this->asientosDisponibles' 
            WHERE id = '$txtID '";
            mysqli_query($conn, $query);
            header("Location: index.php");
        }
    }
    public function borrar()
    {
        include("../../configuracion/bd.php");
        if (isset($_GET['txtID'])) {
            $txtID = $_GET['txtID'];
            $query = "DELETE FROM combis WHERE id = '$txtID'";
            mysqli_query($conn, $query);
            header("Location: index.php");
        }
    }
    // Método para verificar si la combi funciona
    /*public function funciona ($estado) 
  {
    $this->estaFuncionando = $estado;
    if ($estado) {
        return "La combi está funcionando correctamente.";
    } else {
        return "La combi no está funcionando. Necesita reparaciones.";
    }
}*/
}
$c1 = new Combi();

if (isset($_POST['insertar'])) {
    $c1->inicializar($_POST['Patente'], $_POST['Modelo'], $_POST['capacidadCombi']);
    $c1->insertar();
} elseif (isset($_POST['actualizar'])) {
    $c1->inicializar($_POST['PatenteMod'], $_POST['ModeloMod'], $_POST['capacidadCombi']);
    $c1->actualizar();
} else {
    $c1->borrar();
}
