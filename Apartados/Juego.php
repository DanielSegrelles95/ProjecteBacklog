
<html>
<link rel="stylesheet" href="../Estilos/juego.css">
<body>
<title>El cajon</title>
<div class="navbar">
        <a href="../Index.php">Principal</a>
        <a href="../Noticias.php">Noticias</a>
        <a href="../Apartados/Juegos.php">Juegos</a>
        <div class="dropdown">
          <button class="dropbtn">Perfil
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-content">
            <?php
            session_start();
            if (isset($_SESSION['activo'])) {
              echo'<a href="../Usuario/Perfil.php">Perfil</a>';
              echo'<a href="../Usuario/logout.php">Logout</a>';
            }else{
              echo'<a href="../Usuario/Registro.php">Registrarse</a>';
              echo'<a href="../Usuario/Login.php">Conectarse</a>';
            }
            ?>        
          </div>
        </div>
      </div> 

      <div>

      </div>


<?php
$connect = mysqli_connect("localhost", "root", "root", "backlog");
$game = $_GET['name'];
$id = $_GET['game_id'];
$test = "";
$cover = "";
require '../Funcionalidad/class.igdb.php';

 $IGDB = new IGDB("9xmqj6yk5g4yoav2oj39miyowvu5yd", "swvbk1pem44qk8q9go0sho15of6wk1");

 $query = array(
    'id' => $id,
    'fields' => array(
        '*'
    )
);

try {
    $result = $IGDB->game($query);
    foreach ($result as $juego) {
       foreach($juego as $info => $value){
        $size = count($info);
            if($info == "cover"){
                $query2 = array(
                    'fields' => 'image_id',
                    'where' => array( 
                        'field' =>'id',
                        'postfix' => '=',
                        'value' => $value
                    )
                );
                
                $coverresult = $IGDB->cover($query2);
                foreach ($coverresult as $coverinfo) {
                    foreach($coverinfo as $information => $valor){
                    if($information == "image_id"){
                      echo "<br>";
                      echo "<img src='https://images.igdb.com/igdb/image/upload/t_cover_big/" . $valor . ".jpg' alt='img'>";
                      $cover = "asignada";
                      echo "<br>";
                      }
                    }
                }
                
  
            }else if($info == "name"){
                if($cover != "asignada"){
                  echo "<br>";
                  echo "<img src='../Imagenes/missing.png' alt='img'>";
                  echo "<br>";
                }
                echo $value;
                echo "<br>";
            }else if($info == "summary"){
                echo "<br>";
                echo "<div>Sumario del juego:</div>";
                echo $value ;
                echo "<br>";
            }
       }
       echo "<br>";

    }

    
} catch (Exception $e) {
    echo $e->getMessage();
}
if (isset($_SESSION['activo'])) {
  $nombre_usuario = $_SESSION['activo'];  
  $query3 = "SELECT `game name` FROM `follows` WHERE `user name`='$nombre_usuario'";
  $busqueda_follow = mysqli_query($connect, $query3);  
  while($row=mysqli_fetch_array($busqueda_follow)){
    if($row['game name'] == $game){
      $test = true;
    }
  }

}

if($test == true){
  echo "<form action='../Funcionalidad/processaUnfollow.php' method='POST'>";
  echo "<input type='hidden' name='juego' value='$game'>";
  echo "<input type='submit' value='Dejar de seguir'>";
  echo "</form>";
}else{
  echo "<form action='../Funcionalidad/processaFollow.php' method='POST'>";
  echo "<input type='hidden' name='juego' value='$game'>";
  echo "<input type='submit' value='Seguir Juego'>";
  echo "</form>";
}
?>
</body>

</body>
</html>