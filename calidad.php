<?php
session_start();
include_once "base.php";
if ($_SESSION["permiso"]!='tester'){
    header("Location: inicio.php");
}

$cant=$_POST["personas"];
$simu=$_POST["horas"];
$dia=$_POST["dia"];

echo $cant." - ".$simu." - ".$dia;

$servername = "localhost";
$username = "root";
$password = "Bases2020.";
$dbname = "Tics";
$con = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

for($i=0;$i<$cant;$i++){

    $hora=8+rand(0,$simu);
    $min=rand(0,59);
    if ($min<10){
        $min="0".$min;
    }
    $seg=rand(0,59);
    if ($seg<10){
        $seg="0".$seg;
    }
    $to=$hora.":".$min.":".$seg;

    $decimal=mt_rand( 0, 10 )/10;
    $entero=mt_rand( 36, 42 );
    $temp = $entero+$decimal;

    $estado="";
    if ($temp>=38){
        $estado="negado";
    }else {
        $estado = "aceptado";
    }

    try {
        $sql = "INSERT INTO personas (temperatura, fecha, hora,estado) VALUES ('$temp', '$dia', '$to','$estado')";
        $con->exec($sql);
    } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}
$conn = null;
header("Location: ingreso.php");

