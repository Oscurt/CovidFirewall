<?php
include_once "base.php";
session_start();
$contra=$_POST["contra"];
$user=$_POST["user"];
$cuenta = $base_de_datos->query("SELECT * FROM usuarios WHERE user='$user' and pass='$contra';");
$result=$cuenta->fetchAll(PDO::FETCH_OBJ);
print_r($result);
if(empty($result)){
    echo "<SCRIPT>
            alert('No coinciden los datos o aún no está creada la cuenta, intenta nuevamente. Si el problema persiste contactese con servicio tecnico.')
            window.location.replace('./index.php');
        </SCRIPT>";
}else{
    foreach($result as $ing){
        $_SESSION["user"]=$ing->user;
        $_SESSION["permiso"]=$ing->permiso;
        header("Location: inicio.php");
    }
}
?>