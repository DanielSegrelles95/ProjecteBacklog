<?php
session_start();
$connect = mysqli_connect("localhost", "root", "root", "backlog");

if (isset($_POST["image"]) && $_POST["image"] != null) {
    $imagen=$_POST["image"];
    $_SESSION['imagen'] = $imagen;
} 

if (isset($_POST["text"]) && $_POST["text"] != null) {
    $texto=$_POST["text"];
    $_SESSION['texto'] = $texto;
} 

$Nombre = $_SESSION['activo'];

$sql= "UPDATE usuarios SET `Imagen` = '$imagen' , `Texto` = '$texto' WHERE `Nombre` = '$Nombre'";
echo $sql;



if(mysqli_query($connect,$sql)){
    echo "Perfil modificado"; 
}else{
    echo "Error"; 
}
header("Location:./Perfil.php");

?>