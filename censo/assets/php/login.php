<?php
include "conexion.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $myusername = $_POST['username'];
  $mypassword = $_POST['password'];

  $query=$db->prepare( "SELECT USERTYPE FROM usuario WHERE USERNAME = '$myusername' and PASSWORD = '$mypassword';");
  $query->execute();
  $result=$query->fetchAll();
  $result=count($result);

  //$rol = $row['USERTYPE'];
 
    // If result matched $myusername and $mypassword, table row must be 1 row
  
    if($result == 1) {
      #session_register("myusername");
      //$_SESSION['login_user'] = $myusername;
      
      header("location:../../views/admin/consultas.html");
      
   }else {
      $error = "Tu usuario o contraseña no es válida";
   }
}

    

?>