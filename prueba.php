<?php
session_start();
include_once "base.php";
if ($_SESSION["permiso"]!='tester'){
    header("Location: inicio.php");
}
$cant=$_POST["personas"];
$revi=date("Y-m-d");
$veri = $base_de_datos->query("SELECT * FROM dia WHERE fecha='$revi';");
$result=$veri->fetchAll(PDO::FETCH_OBJ);
if(empty($result)){
    $crt= "INSERT INTO dia (fecha, aforo_total, aforo_actual,temperatura_prom) VALUES ('$revi', '$fecha', '$hora','$estado')";
    $con->exec($crt);
}
for($i=0;$i<$cant;$i++){
    $fecha=date("Y-m-d") ;
    $hora=date("h:i:sa");
    $decimal=mt_rand( 0, 10 )/10;
    $entero=mt_rand( 36, 42 );
    $temp = $entero+$decimal;
    $estado="";
    if ($temp>=38){
        $estado="negado";
    }else {
        $estado = "aceptado";
    }
    $servername = "localhost";
    $username = "root";
    $password = "Bases2020.";
    $dbname = "Tics";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO personas (temperatura, fecha, hora,estado) VALUES ('$temp', '$fecha', '$hora','$estado')";
        $conn->exec($sql);

    } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}
$conn = null;
header("Location: registro.php");

