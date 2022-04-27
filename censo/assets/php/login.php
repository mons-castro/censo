<?php
include "conexion.php";

  $user=$_POST["username"];
  $pass=$_POST["pass"];
/*MOSTRAR LA INFORMACION DE TODAS LAS PERSONAS DEL CENSO*/
$select_from="SELECT USERTYPE from info_persona WHEN USERNAME='$user' AND PASSWORD='$pass'";

$result = mysqli_query($conn,$select_from);
$resp=array();
if($result){
    $resp["respuesta_select"]=true;
    }else{
    $resp["respuesta_select"]=false;
    } 

    while ( $row = $result->fetch_assoc())  {
    
        $resp["registros"] = $row;
     }
    //Convert data in JSON format
    
    echo json_encode($resp);


    

?>