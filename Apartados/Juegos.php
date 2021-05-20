<html>
<link rel="stylesheet" href="../Estilos/Juegos.css">
<body>
<title>El cajon</title>
<div class="navbar">
        <a href="../Index.php">Principal</a>
        <a href="./Noticias.php">Noticias</a>
        <a href="#">Juegos</a>
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


<form action="#" method="POST">
<input id="search" name="value" type="text" placeholder="Buscar juego">
<input id="submit" name="submit" type="submit" value="Buscar">
</form>
</body>
</html>


<?php
require '../Funcionalidad/class.igdb.php';

$no_of_records_per_page = 10;
$total_pages = 10;
$nombre = " ";

if (isset($_GET['pageno'])) {
  $pageno = $_GET['pageno'];
} else {
  $pageno = 1;
}

if(isset($_POST['submit'])){
    $nombre = $_POST['value'];
     $IGDB = new IGDB("9xmqj6yk5g4yoav2oj39miyowvu5yd", "swvbk1pem44qk8q9go0sho15of6wk1");
 $query = array(
    'search' => "$nombre", 
    'fields' => array(       
        'name',
        'cover',
        'first_release_date'
    ),           
    'offset' => ($pageno-1) * $no_of_records_per_page          
);

try {
    $result = $IGDB->game($query);
    foreach ($result as $juego) {
       if(!(property_exists($juego, 'cover'))){
        echo "<div>";
        echo "<img src='../Imagenes/missing.png' alt='img'>";
       }
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
                        echo "<div>";
                        echo "<img src='https://images.igdb.com/igdb/image/upload/t_cover_big/" . $valor . ".jpg' alt='img'>";
                    }
                }
                }
  
            }else if($info == "id"){
              $game_id = $value;
            
            }else if($info == "first_release_date"){
              date_default_timezone_set('America/Los_Angeles');
              $fecha = $value;
              $fechaBuena = new DateTime();
              $fechaBuena->setTimestamp($fecha);
              $fechaDisplay = $fechaBuena->format('Y');

            }else if($info == "name"){
                echo '<a href="./Juego.php?name='. $value .'&game_id='. $game_id.'" class="juego"> '.$value.' </a>';
                echo "(" .$fechaDisplay .")";
            }
       }
       echo "</div>";
       echo "<br>";
      
    }


} catch (Exception $e) {
    echo $e->getMessage();
}
}

if(isset($_GET['juego'])){
  $nombre = $_GET['juego'];
  $IGDB = new IGDB("9xmqj6yk5g4yoav2oj39miyowvu5yd", "swvbk1pem44qk8q9go0sho15of6wk1");
  $query = array(
     'search' => "$nombre", 
     'fields' => array(       
         'name',
         'cover',
         'first_release_date'
     ),           
     'offset' => ($pageno-1) * $no_of_records_per_page          
 );
 
 try {
     $result = $IGDB->game($query);
     foreach ($result as $juego) {
        if(!(property_exists($juego, 'cover'))){
         echo "<div>";
         echo "<img src='../Imagenes/missing.png' alt='img'>";
        }
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
                         echo "<div>";
                         echo "<img src='https://images.igdb.com/igdb/image/upload/t_cover_big/" . $valor . ".jpg' alt='img'>";
                     }
                 }
                 }
   
             }else if($info == "id"){
               $game_id = $value;
             
             }else if($info == "first_release_date"){
               date_default_timezone_set('America/Los_Angeles');
               $fecha = $value;
               $fechaBuena = new DateTime();
               $fechaBuena->setTimestamp($fecha);
               $fechaDisplay = $fechaBuena->format('Y');
 
             }else if($info == "name"){
                 echo '<a href="./Juego.php?name='. $value .'&game_id='. $game_id.'" class="juego"> '.$value.' </a>';
                 if(isset($fechaDisplay)){
                  echo "(" .$fechaDisplay .")";
                 }
             }
        }
        echo "</div>";
        echo "<br>";
       
     }
 } catch (Exception $e) {
     echo $e->getMessage();
 }
 
}
?>

<ul class="pagination">
    <li><a href="<?php echo "?pageno=1"."&juego=".$nombre?>"class="juego">Primera</a></li>
    <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>" class="juego">
        <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1)."&juego=".$nombre; } ?>" class="juego">Anterior</a>
    </li>
    <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>"class="juego">
        <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1)."&juego=".$nombre; } ?>" class="juego">Siguiente</a>
    </li>
    <li><a href="?pageno=<?php echo $total_pages ."&juego=".$nombre; ?>" class="juego">Ultima</a></li>
</ul>
