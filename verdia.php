<?php
include_once "encabezado.php";
$r=$_POST["buscar"];
$veri = $base_de_datos->query("SELECT * FROM personas WHERE fecha='$r' ORDER BY hora ASC;");
$result=$veri->fetchAll(PDO::FETCH_OBJ);
if(!empty($result)){
?>
<style>
    td,th,table{
        border: 1px solid black;
    }
</style>
<table class="center">
    <tr>
        <th>Temperatura</th>
        <th>Hora</th>
        <th>Estado</th>
    </tr>
    <?php
        foreach ($result as $print){
        ?>
    <tr>
        <th><?php echo $print->temperatura?></th>
        <th><?php echo $print->hora?></th>
        <th><?php echo $print->estado?></th>
    </tr>
    <?php
        }
    ?>
</table>
<?php
}else{
    echo "<SCRIPT>
            alert('No hay registros de ese día')
            window.location.replace('./dia.php');
        </SCRIPT>";
}