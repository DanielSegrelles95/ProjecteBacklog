<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<title>El cajon</title>
<link rel="stylesheet" href="../Estilos/login.css">
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


<form action="./processaRecuperacion.php" method="post">

    <div class="container">
      <label for="uname"><b>Usuario</b></label>
      <input type="text" placeholder="Introduce tu nombre de usuario" name="user" required>
  
      <label for="psw"><b>Nueva Contraseña</b></label>
      <input type="password" placeholder="Introduce tu nueva contraseña" name="pass" required>
  
      <button type="submit">Recuperar cuenta</button>
    </div>
  </form> 

  
  
</body>
</html> 