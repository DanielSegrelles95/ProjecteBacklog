<?php session_start(); ?>
<html>
<title>El cajon</title>
<link rel="stylesheet" href="../Estilos/perfil.css">
<link rel="stylesheet" href="../Estilos/principal.css">
<body>
<div class="navbar">
        <a href="../Index.php">Principal</a>
        <a href="../Apartados/Noticias.php">Noticias</a>
        <a href="../Apartados/Juegos.php">Juegos</a>
        <div class="dropdown">
          <button class="dropbtn">Perfil
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-content">
            <?php
            if (isset($_SESSION['activo'])) {
              echo'<a href="#">Perfil</a>';
              echo'<a href=".logout.php">Logout</a>';
            }
            ?>        
          </div>
        </div>
      </div> 

      <div>

      </div>

    <div id="wrap">
        <section id="mainpage">
        <div class="container">
        <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3">
        <h3>Perfil</h3>
        <div class="profile-box linewrap" style="position: inherit; z-index: auto;"><img class="profile-image" src="<?php echo $_SESSION['imagen']?>"><strong><?php echo $_SESSION['activo'] ?></strong>
        <p><?php echo $_SESSION['texto']?></p>
        </div>
        <h3>Modificar Perfil</h3>
        <form action="./modificarUsuario.php" method="post" role="form">
        <div class="form-group">
        <label class="control-label" for="profileimage">Imagen</label>
        <input class="form-control" id="profileimage" type="text" name="image" maxlength="255">
        </div>
        <div class="form-group">
        <label class="control-label" for="profiletext">Texto</label>
        <textarea class="form-control" id="profiletext" cols="10" name="text" maxlength="255"></textarea>
        </div>
        <button class="btn btn-primary btn-block" type="submit">Guardar<div></div></button>
        </form>
        <div>
        <h3>Juegos en seguimiento:</h3>
        <?php 
        $nombre_usuario = $_SESSION['activo'];
        $connect = mysqli_connect("localhost", "root", "root", "backlog");
        $query3 = "SELECT `game name` FROM `follows` WHERE `user name`='$nombre_usuario'";
        $busqueda_follow = mysqli_query($connect, $query3);  
        while($row=mysqli_fetch_array($busqueda_follow)){
           $game =$row['game name'];
           echo "<div class='unfollow'> $game </div>";
           echo " ";
           echo "<form class='unfollow' action='../Funcionalidad/processaUnfollow.php' method='POST'>";
           echo "<input type='hidden' name='juego' value='$game'>";
           echo "<input type='submit' value='Dejar de seguir'>";
           echo "</form>";
           echo "<br>";
        }
        ?>
        <div>
        </div>
        </section>
        </div>
    </div>
</body>
</html>