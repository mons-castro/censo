<?php
   include ("assets/php/conexion.php");

   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $query=$db->prepare("select username,usertype from usuario where username = '$user_check' ");
   $query->execute();
   $result=$query->fetchAll();

   foreach ($result as $row): 
    $login_session = $row['username'];
    $login_type=$row['usertype'];
   endforeach;
   
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
      die();
   }
?>