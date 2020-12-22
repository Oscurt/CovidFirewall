<?php
include_once "encabezado.php";
if ($_SESSION["permiso"]!='tester'){
    header("Location: inicio.php");
}
?>

<style>
    th,table{
        border: 1px solid black;
    }
    h1{
        text-align: center;
    }
</style>
<br>
<h1>Personas</h1>
<table class="center">
    <form method="post" action="prueba.php">
    <tr>
        <th>Cant. personas</th>
        <th>Horas que abre la empresa</th>
        <th>Dia</th>
    </tr>
        <tr>
        <th><input type="number" step="1" min="1" name="personas"></th>
        <th><input type="number" step="1" min="1" max="24" name="horas"></th>
            <th><input type="date" name="dia"></th>
        </tr>
        <tr>
            <td></td>
            <td><input class="btn btn-success" type="submit" value="Entrar"></td>
            <td></td>
        </tr>

    </form>
</table>
<hr>
<h1>Calidad</h1>
<table class="center">.
    <form action="calidad.php" method="post">
        <tr>
            <th>Dias desde el 3</th>
        </tr>
        <tr>
            <th><input min="1" max="18" step="1" name="dias"></th>
        </tr>
        <tr>
            <td><input class="btn btn-success" type="submit" value="Entrar"></td>
        </tr>
    </form>
</table>


<?php
include_once "pie.php";
