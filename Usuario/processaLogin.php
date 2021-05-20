<?php

session_start();
$connect = mysqli_connect("localhost", "root", "root", "backlog");


if (isset($_POST["user"]) && isset($_POST["pass"])) {

    $user = $_POST["user"];
    $pass = $_POST["pass"];

    $query = "SELECT * FROM `usuarios` WHERE `Nombre` = '$user' AND `Password` = '$pass' ";

    $result = $connect->query($query);
    if($result->num_rows > 0) {
       $_SESSION['activo'] = $user;
       while($row = mysqli_fetch_array($result)){
            $_SESSION['imagen'] = $row['Imagen'];
            $_SESSION['texto'] = $row['Texto'];
        }
       header("Location:../Index.php");
    }
    else $message = 'No existe este usuario';

}
?>