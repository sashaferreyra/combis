<?php

class recorridosFijos
{
    private $combis;
    private $choferes;

    public function inicializar($com, $chof)
    {
        $this->combis = $com;
        $this->choferes = $chof;
    }

    public function actualizar()
    {
        include("../../configuracion/bd.php");
        if (isset($_GET['txtID'])) {

            $query1 = "UPDATE  recorridofijo1 
            SET id_combiasignada = ' $this->combis', id_choferasignado = ' $this->choferes' 
            WHERE id = '$_GET[txtID]' ";
            mysqli_query($conn, $query1);
            header("Location: index.php");
        } elseif (isset($_GET['txtID2'])) {
            $query2 = "UPDATE  recorridofijo2 
            SET id_combiasignada = ' $this->combis', id_choferasignado = ' $this->choferes' 
            WHERE id = '$_GET[txtID2]' ";
            mysqli_query($conn, $query2);
            header("Location: index.php");
        }
    }
}
$r1 = new recorridosFijos();
if (isset($_POST['actualizar'])) {
    $r1->inicializar($_POST['combiasignada'], $_POST['choferasignado']);
    $r1->actualizar();
}
