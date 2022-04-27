<?php

include "conexion.php";
$return_arr = array();


/*MOSTRAR LA INFORMACION DE TODAS LAS PERSONAS DEL CENSO*/
$query=$db->prepare("SELECT * from info_persona");
$query->execute();
$data = $query->fetchAll();

foreach ($data as $row): 
  $DNI = $row['DNI'];
  $NOMBRE = $row['NOMBRE'];
  $FECNAC = $row['FECNAC'];
  $DIR = $row['DIR'];
  $TFNO = $row['TFNO'];

  $return_arr[] = array("DNI" => $DNI,
  "NOMBRE" => $NOMBRE,
  "FECNAC" => $FECNAC,
  "DIR" => $DIR,
  "TFNO" => $TFNO);
  endforeach;
  
  echo json_encode($return_arr);
 
 
 ?>
 
 
 
 

