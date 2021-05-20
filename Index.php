<!DOCTYPE html>
<html>
<link rel="stylesheet" href="./Estilos/principal.css">
<body>
<title>El cajon</title>
    <div class="navbar">
        <a href="#">Principal</a>
        <a href="./Apartados/Noticias.php">Noticias</a>
        <a href="./Apartados/Juegos.php">Juegos</a>
        <div class="dropdown">
          <button class="dropbtn">Perfil
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-content">
            <?php
            session_start();
            if (isset($_SESSION['activo'])) {
              echo'<a href="./Usuario/Perfil.php">Perfil</a>';
              echo'<a href="./Usuario/logout.php">Logout</a>';
            }else{
              echo'<a href="./Usuario/Registro.php">Registrarse</a>';
              echo'<a href="./Usuario/Login.php">Conectarse</a>';
            }
            ?>        
          </div>
        </div>
      </div> 
      
      <div class="banner">
        <h2>Tu web de seguimiento de videojuegos que probablemente no vayas a terminar nunca</h2>
        <img src="../Imagenes/banner.png" alt="Banner image">.
      </div>
</body>
</html> 