<?php

    session_start();

    require_once '../db/db.php';

    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    if (verify($correo, $contrasena)){
        $_SESSION['correo'] = $correo;
        echo "<script>alert('bienvenido'); window.location='../index.php'</script>";
    } else {
        echo "<script>alert('correo o contraseña incorrectos'); window.location='../login.php'</script>";
    }

    function verify($correo, $contrasena){
        $conexion = conexion();
        if ($conexion){
            try{
                $consulta = $conexion->prepare("SELECT * FROM usuarios WHERE correo=:correo AND contrasena=:contrasena");

                $consulta->bindParam(':correo', $correo);
                $consulta->bindParam(':contrasena', $contrasena);
                $consulta->execute();

                if($consulta->rowCount()>0){
                    return true;
                } else {
                    return false;
                }
            } catch (PDOException $err) {
                echo "Error: " . $err->getMessage();
                return false;
            }
        } else {
            echo "no se puede conectar a la bd";
            return false;
        }
    }

?>