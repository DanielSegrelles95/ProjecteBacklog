<html>
<link rel="stylesheet" href="../Estilos/Noticias.css">
<body>
  <title>El cajon</title>
<div class="navbar">
        <a href="../Index.php">Principal</a>
        <a href="#">Noticias</a>
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

      <div class="twitter">
        <a class="twitter-timeline" data-theme="dark" href="https://twitter.com/gematsucom?ref_src=twsrc%5Etfw">Tweets by gematsucom</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script> 
      </div>
</body>
</html>