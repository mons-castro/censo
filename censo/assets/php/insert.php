<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "censo";

$conn = new mysqli($servername, $username, $password, $database);
if (!$conn) {
    die('Could not connect: ' . mysqli_error($con));
  }


/*INSERTAR NUEVA PERSONA*/

    $dni=$_POST["DNI"];
    $nombre=$_POST["nombre"];
    $fecnac=$_POST["fecnac"];
    $dir=$_POST["dir"];
    $tfno=$_POST["tfno"];

    $insertRegistro="INSERT INTO info_persona VALUES('$dni','$nombre','$fecnac','$dir',$tfno)";
    $insert=array();

        if($conn->query($insertRegistro)){
            $insert["respuesta_insert"]=true;
            }else{
            $insert["respuesta_insert"]=false;
            } 
            
        echo json_encode($insert);
?>