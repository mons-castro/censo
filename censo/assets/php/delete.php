<?php
include "conexion.php";
$dni=$_POST["dni"];

/*ELIMINAR PERSONA*/
$query=$db->prepare("DELETE FROM info_persona WHERE DNI= '$dni'");
$query->execute();
$data = $query->fetchAll();
    

    $delete=array();

        if($query){
            $delete["respuesta_delete"]=true;
            }else{
            $delete["respuesta_delete"]=false;
            } 
            header("location:../../views/admin/consultas.html");
        
        echo json_encode($delete);


    
?>