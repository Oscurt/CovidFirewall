<?php
include_once "encabezado.php";
if ($_SESSION["permiso"]!='tester'){
    header("Location: inicio.php");
}
?>

<table class="center">
    <form method="post" action="prueba.php">
    <tr>
        <th>Cant. personas</th>
    </tr>
        <tr>
        <td><input type="number" step="1" min="1" name="personas"></td>
    </tr><br>
        <tr>
            <td><input class="btn btn-success" type="submit" value="Entrar"></td>
        </tr>

    </form>
</table>
<br>


<?php
include_once "pie.php";
