<?php

session_start();
$connect = mysqli_connect("localhost", "root", "root", "backlog");

if (isset($_POST["user"]) && $_POST["user"] != null) {
    $user=$_POST["user"];
} 

if (isset($_POST["pass"]) && $_POST["pass"] != null) {
    $pass=$_POST["pass"];
} 

$sql= "INSERT INTO usuarios (`Nombre`,`Password`) VALUES ('$user','$pass')";

if(mysqli_query($connect,$sql)){
    echo "usuario insertado correctamente"; 
}else{
    
    echo "error insertando usuario"; 
}
header("Location:../Index.php");
mysqli_close($connect);
?>