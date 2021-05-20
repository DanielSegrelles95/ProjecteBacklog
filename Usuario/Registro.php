<?php
session_start();
?>
<html>
<title>El cajon</title>
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

    <link rel="stylesheet" href="../Estilos/principal.css">
    <head>
        <meta charset="UTF-8">
        <title>El cajon</title>
    </head>
    <body>
        <form action="./processaRegistre.php" method="post">
            <table width="200" border="0">
                <tr>
                    <td>Usuario: </td>
                    <td> <input type="text" name="user" required > </td>
                </tr>
                <tr>
                    <td>Contraseña: </td>
                    <td><input type="password" name="pass" required></td>
                </tr>
                <tr>
                    <td>Repite la contraseña: </td>
                    <td><input type="password" name="repeat" required></td>
                </tr>
                <tr>
                    <td> <input type="submit" name="reg" value="Registrarse"></td>
                    <td> <?php
                        if (isset($_SESSION['error'])) {
                            $error = $_SESSION['error'];
                            echo $error;
                        }
                        ?></td>
                </tr>
            </table>
        </form>
    </body>
</html>