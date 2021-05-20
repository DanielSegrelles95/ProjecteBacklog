<?php
 session_start();
 $connect = mysqli_connect("localhost", "root", "root", "backlog");
 if (isset($_SESSION['activo'])) {
     $nombre_usuario = $_SESSION['activo'];
     if (isset($_POST["juego"]) && $_POST["juego"] != null) {
        $nombre_juego=$_POST["juego"];


        $sql= "INSERT INTO follows (`user name`,`game name`) VALUES ('$nombre_usuario','$nombre_juego')";
        if(mysqli_query($connect,$sql)){
            echo "seguido correctamente"; 
        }else{
            
            echo "error siguiendo juego"; 
        }
        $previous = $_SERVER['HTTP_REFERER'];
        header("Location:$previous");
        mysqli_close($connect);


    } 
 }
?>