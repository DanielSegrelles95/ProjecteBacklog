<?php

session_start();
$connect = mysqli_connect("localhost", "root", "root", "backlog");

if (isset($_POST["user"]) && $_POST["user"] != null) {
    $user=$_POST["user"];
} 

if (isset($_POST["pass"]) && $_POST["pass"] != null) {
    $pass=$_POST["pass"];
} 

$sql= "UPDATE usuarios SET `Password` ='$pass' WHERE `Nombre` ='$user'";

if(mysqli_query($connect,$sql)){
    echo "Contraseña actualizada"; 
}else{
    
    echo "error actualizando"; 
}
header("Location:../Usuario/Login.php");
mysqli_close($connect);
?>