<?php

$con = mysqli_connect("localhost", "root", "", "usuarioskarvil");

?>
<!DOCTYPE html>
<meta charset="UTF-8">
<title>CRUD</title>
<link rel="stylesheet" href="css/styles.css">

<!--boostrap-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!--texto fuente-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital@1&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=MonteCarlo&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<html>
<style type="text/css">
    
</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background:url('fondo2.jpg');">
        <div class="container-fluid">
            <p class="navbar-brand" href="#">FrameWeb</p>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">

                <div class="navbar-nav">
                    <a class="nav-link" aria-current="page" href="index.html">Inicio</a>
                    <a class="nav-link" href="catalogo.html">Catálogo</a>
                    <a class="nav-link" href="#">Favoritos</a>
                    <hr>
                    <a class="nav-link" href="#">Salir</a>

                </div>
            </div>
        </div>
    </nav>
    <div class="wrap">
        <h1>Karvil el arte del cuero</h1>
        <center>
            <div class="fondo">
                <div>
                    
                </div>
                <div class="store-wrapper">
                    <div class="category_list mb-5 ">
                        

                    </div>
                  </div>

                
                    <form method="post" action="index.php">
                        <center>
                            <table class="tables">
                                <tr>
                                    <td>
                                        Nombre:
                                    </td>
                                    <td>
                                        <input type="text" name="nombre" placeholder="Nombre de usuario" />
                                    </td>
                                <tr>
                                    <td class=text>
                                        Contraseña:  
                                    </td>
                                    <td>
                                        <input type="password" name="passw" placeholder="Contraseña de usuario" /><br />
                                    </td>
                                </tr>
                            </table>
                            <br>
      

                            <input type="submit" class="boton"name="insert" value="REGISTRAR DATOS" />
                        </center>
                        <br>
                        <br>
                        <div class="crud">
                    </form>
                    <?php
                    if (isset($_POST['insert'])) {
                        $usuario = $_POST['nombre'];
                        $pass = $_POST['passw'];

                        $insertar = "INSERT INTO `usuarios`(`usuario`,`contraseña`)VALUES('$usuario','$pass')";

                        $ejecutar = mysqli_query($con, $insertar);

                        if ($ejecutar) {

                            echo "<script>alert('USUARIO REGISTRADO!')</script>";
                            echo "<script>window.open('index.php','_self')</script>";
                        }
                    }
                    ?>
                    <div>
                        <br>
                        <center>
                            <table>
                                <tr>
                                    <th>ID</th>
                                    <th>Usuario</th>
                                    <th>Password</th>
                                    <th>Editar</th>
                                    <th>Borrar</th>
                                </tr>
                                <?php
                                $consulta = "SELECT * FROM usuarios";
                                $ejecutar = mysqli_query($con, $consulta);
                                $i = 0;
                                while ($fila = mysqli_fetch_array($ejecutar)) {
                                    $id = $fila['id'];
                                    $usuario = $fila['usuario'];
                                    $password = $fila['contraseña'];

                                    $i++
                            
                                ?>
                                    <tr aling="center">
                                        <td><?php echo $id; ?></td>
                                        <td><?php echo $usuario; ?></td>
                                        <td><?php echo $password; ?></td>
                                        <td><a class="eb"href="index.php?editar=<?php echo $id; ?>">Editar</a></td>
                                        <td><a class="eb" href="index.php?borrar=<?php echo $id; ?>">Borrar</a></td>
                                    </tr>
                                <?php } ?>
                                <?php
                                if (isset($_GET['editar'])) {
                                    include("edicion.php");
                                }


                                if (isset($_GET['borrar'])) {
                                    $borrar_id = $_GET['borrar'];
                                    $borrar = "DELETE FROM usuarios WHERE id='$borrar_id'";
                                    $ejecutar = mysqli_query($con, $borrar);

                                    if ($ejecutar) {
                                        echo "<script>alert('USUARIO ELIMINADO!')</script>";
                                        echo "<script>window.open('index.php','_self)</script>";
                                    }
                                }
                                ?>

                            </table>
                        </center>
                        <div>
                            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
                        </div>
                    </div>
                </div>
            </div>
                            </div>
            <footer class="text-center text-white "  style="background:url('fondo2.jpg');">
      <!-- Grid container -->
      <div class="container pb-4">
        <!-- Section: Social media -->
        <section class="mt-5 ">
          <!-- Facebook -->
          <a
            class="btn btn-link btn-floating btn-lg text-dark m-1"
            href="#!"
            role="button"
            data-mdb-ripple-color="dark"
            ><i class="fab fa-facebook-f"></i
          ></a>
    
          <!-- Twitter -->
          <a
            class="btn btn-link btn-floating btn-lg text-dark m-1"
            href="#!"
            role="button"
            data-mdb-ripple-color="dark"
            ><i class="fab fa-twitter"></i
          ></a>
    
          <!-- Google -->
          <a
            class="btn btn-link btn-floating btn-lg text-dark m-1"
            href="#!"
            role="button"
            data-mdb-ripple-color="dark"
            ><i class="fab fa-google"></i
          ></a>
    
          <!-- Instagram -->
          <a
            class="btn btn-link btn-floating btn-lg text-dark m-1"
            href="#!"
            role="button"
            data-mdb-ripple-color="dark"
            ><i class="fab fa-instagram"></i
          ></a>
    
          <!-- Linkedin -->
          <a
            class="btn btn-link btn-floating btn-lg text-dark m-1"
            href="#!"
            role="button"
            data-mdb-ripple-color="dark"
            ><i class="fab fa-linkedin"></i
          ></a>
          <!-- Github -->
          
        </section>
       
    </footer>
</body>

</html>