<?php
include_once "encabezado.php";
?>
<br>
<table class="center">
    <tr>
        <th><h1>Bienvenido <?php echo $_SESSION["user"];?></h1></th>
    </tr>
    <tr>
        <td></td>
    </tr>
</table>
<table class="center">
    <tr>
        <?php
        if($_SESSION["permiso"]=='tester'){
            ?>
            <th></th>
            <?php
        }
        ?>
        <th></th>
    </tr>
    <tr>
        <?php
        if($_SESSION["permiso"]=='tester'){
            ?>
            <td><a href="ingreso.php" class="btn btn-info btn-lg active" role="button" aria-pressed="true">Ingresar pruebas</a></td>
            <?php
        }
        ?>
        <td><a href="estadistica.php" class="btn btn-info btn-lg active" role="button" aria-pressed="true">Calidad de aire</a></td>
    </tr>
</table>
<?php
include_once "pie.php";
?>
