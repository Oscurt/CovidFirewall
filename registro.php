<?php
include_once "encabezado.php";
$search = $base_de_datos->query("SELECT * FROM personas ORDER BY hora DESC LIMIT 25;");
$result=$search->fetchAll(PDO::FETCH_OBJ);
    ?>
<style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
    h1,h5{
        text-align: center;
    }
</style>
    <table class="center">
        <tr>
            <th>Numero</th>
            <th>Temperatura</th>
            <th>Estado</th>
            <th>Fecha</th>
            <th>Hora</th>
        </tr>
        <?php
        $cor=0;
        $neg=0;
        $i=1;
            foreach ($result as $per){
        ?>
                <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $per->temperatura ;?></td>
                    <td><?php echo $per->estado;if ($per->estado=="negado"){$neg++;}else{$cor++;}?></td>
                    <td><?php echo $per->fecha ;?></td>
                    <td><?php echo $per->hora ;?></td>
                </tr>
                <?php
                $i++;
            }
                ?>
    </table>
<hr>
<h5>*Tabla limitada a 25</h5>
<?php
$s1= $base_de_datos->query("SELECT COUNT(*) as t FROM personas WHERE estado='aceptado';");
$r1=$s1->fetchAll(PDO::FETCH_OBJ);
$s2 = $base_de_datos->query("SELECT COUNT(*) as t FROM personas WHERE estado='negado';");
$r2=$s2->fetchAll(PDO::FETCH_OBJ);
?>
<?php
foreach ($r1 as $re1){
    ?>
    <h1>Personas aceptadas: <?php echo $re1->t;?></h1><br>
    <?php
}
?>
<?php
foreach ($r2 as $re2){
    ?>
    <h1>Negadas: <?php echo $re2->t;?></h1>
    <?php
}
?>

<?php

    include_once "pie.php";
