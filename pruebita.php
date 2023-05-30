<?php 

    session_start();

    $host="127.0.0.1";
    $db="Uno";
    $servidor="corrales";
    $pass="pacochato";
    $puerto=1433;

    $con = new PDO("sqlsrv:Server=$host,$puerto;Database=$db",$servidor,$pass);

    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    $consulta = "SELECT * FROM usuarios WHERE correo = '$correo' AND contrasena = '$contrasena'";
    $result = $con,

?>