<br>
<br>
<center>
    <?php
            if(isset($_GET['editar'])){
                echo"EDITAR";
                $editar_id = $_GET['editar'];

                $consulta = "SELECT * FROM usuarios WHERE id='$editar_id'";
                $ejecutar = mysqli_query($con, $consulta);

                $fila=mysqli_fetch_array($ejecutar);

                $usuario = $fila['usuario'];
                $pass = $fila['contraseña'];
            }
            ?>
            <br/>
            <form method="post" action="">
                <input type="text" name="nuevo" value="<?php echo $usuario;?>"/><br/>
                <input type="password" name="passwords" value="<?php echo $contraseña;?>"/><br/>
                <input type="submit" class="boton2" name="act" value="REGISTRAR DATOS"/>
                <hr>
            </form>
            <?php
            if(isset($_POST['act'])){
                echo"CAMBIOS GUARDADOS";
                $actualizar_nombre =$_POST['nuevo'];
                $actualizar_password = $_POST['passwords'];

                $actualizar = "UPDATE usuarios SET usuario='$actualizar_nombre',contraseña='$actualizar_password' WHERE id ='$editar_id'";

                $ejecutar = mysqli_query($con, $actualizar);

                if($ejecutar){
                    echo "<script>alert(USUARIO ACTUALIZADO!')</script>";
                    echo "<script>window.open('index.php','_self')</script>";
                }
            }
            ?>
</center>