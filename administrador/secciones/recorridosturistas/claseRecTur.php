<?php

class recTuristico
{
    private $destino;
    private $distancia;
    private $precio;

    public function inicializar($des, $dis, $pre)
    {
        $this->destino = $des;
        $this->distancia = $dis;
        $this->precio = $pre;
    }

    public function insertar()
    {
        $combiasignada = $_POST['combiasignada'];
        include("../../configuracion/bd.php");
        $query = "INSERT INTO rec_turisticos (destino_turistico,distancia_recorrido,precio_km, id_combiusada)
         VALUES ('$this->destino ',' $this->distancia',' $this->precio', '$combiasignada')";
        mysqli_query($conn, $query);
        header("Location: index.php");
    }


    public function modificar()
    {
        include("../../configuracion/bd.php");

        if (isset($_GET['txtID'])) {
            $txtID = $_GET['txtID'];

            $update = "UPDATE rec_turisticos 
            SET destino_turistico = '$this->destino ', distancia_recorrido = ' $this->distancia', precio_km = '$this->precio'
            WHERE id = '$txtID'";
            mysqli_query($conn, $update);
            header("Location: index.php");
        }
    }
    public function borrar()
    {
        include("../../configuracion/bd.php");
        if (isset($_GET['txtID'])) {
            $txtID = $_GET['txtID'];
            $borrar = "DELETE FROM rec_turisticos WHERE id = '$txtID'";
            mysqli_query($conn, $borrar);
            header("Location: index.php");
        }
    }
}
$dt1 = new recTuristico();

if (isset($_POST['actualizar'])) {
    $dt1->inicializar($_POST['destinoturistico'], $_POST['Distancia'], $_POST['preciokm']);
    $dt1->modificar();
} elseif (isset($_POST['insertar'])) {
    $dt1->inicializar($_POST['destinoturistico'], $_POST['Distancia'], $_POST['preciokm']);
    $dt1->insertar();
} else {
    $dt1->borrar();
}
