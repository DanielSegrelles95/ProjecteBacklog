<?php
 session_start();
 $connect = mysqli_connect("localhost", "root", "root", "backlog");
 if (isset($_SESSION['activo'])) {
     $nombre_usuario = $_SESSION['activo'];
     if (isset($_POST["juego"]) && $_POST["juego"] != null) {
        $nombre_juego=$_POST["juego"];

        $sql = "DELETE FROM follows WHERE `game name`="."'".$nombre_juego."'";
        if(mysqli_query($connect,$sql)){
            echo "unfollow correctamente"; 
        }else{
            
            echo "error al dejar de seguir"; 
        }
        $previous = $_SERVER['HTTP_REFERER'];
        header("Location:$previous");
        mysqli_close($connect);


    } 
 }
?>