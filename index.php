<?php
session_start();
if (isset($_SESSION["user"])){
    session_destroy();
}
?>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" href="estilos.css">
    <style>
        h1,h3{
            text-align: center;

        }
    </style>
</head>
<body>
<br>
<h1>Covid Firewall</h1>
<hr>
<h3>Ingrese usuario y contraseña</h3>
<br>
<form method="post" action="vinicio.php">
<table class="center" style="border: 1px solid black;">
    <tr>
    <th style="border: 1px solid black;">Usuario</th>
    <th style="border: 1px solid black;"><input type="text" name="user" placeholder="Fulanito"></th>
    </tr><tr>
        <th style="border: 1px solid black;">Clave</th>
        <th style="border: 1px solid black;"><input type="password" name="contra" placeholder="callefalsa123"></th>
    </tr>
</table>
    <br>
    <div class="center">
        <input class="btn btn-success" type="submit" value="Entrar">
    </div>

</form>
</body>
<?php
    include_once "pie.php";
?>