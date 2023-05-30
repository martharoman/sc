<?php
    $host="127.0.0.1";
    $db="Uno";
    $servidor="corrales";
    $pass="pacochato";
    $puerto=1433;

    function conexion(){

        global $host,$db,$servidor,$pass,$puerto;

        try{

            $con = new PDO("sqlsrv:Server=$host,$puerto;Database=$db",$servidor,$pass);
            return $con;

        }catch(PDOException $nono){
            
            echo "no se hizo :( la conexion a la base de datos".$nono->getMessage();
            return null;
        
        }
    }
    
?>