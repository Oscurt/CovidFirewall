<?php
include_once "encabezado.php";
?>
<br>
<table class="center">
    <tr>
        <th>Dia</th>
    </tr>
    <tr>
        <form action="verdia.php" method="post">
            <td><input type="date" name="buscar"></td>
    </tr>
    <tr>
        <td><input class="btn btn-success" type="submit" value="Buscar"></td>
    </tr>
    </form>
</table>
