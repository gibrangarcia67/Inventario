<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "larbase";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$id = $_GET['id'];

if (!isset($id) || !is_numeric($id)) {
    die("ID inválido.");
}

    $parte = $_POST['parte'];
    $serie = $_POST['serie'];
    $almacen = $_POST['almacen'];
    $tipo_tarjeta = $_POST['tipo_tarjeta'];
    $obs_equipo = $_POST['obs_equipo'];
    $guia = $_POST['guia'];
    $tipo_movimiento = $_POST['tipo_movimiento'];
    $obs_movimiento = $_POST['obs_movimiento'];


    $sql = "UPDATE `base` SET `parte`='$parte',`serie`='$serie',`almacen`='$almacen',`tipo_tarjeta`='$tipo_tarjeta',`obs_equipo`='$obs_equipo',`guia`='$guia',`tipo_movimiento`='$tipo_movimiento',`obs_movimiento`='$obs_movimiento' WHERE id = $id";


    if ($conn->query($sql) === TRUE) {
        echo "Registro actualizado exitosamente. <a href='index.php'>Volver</a>";
    } else {
        echo "Error al actualizar: " . $conn->error;
    }

$conn->close();

header("Location: movimientos.php");
exit();

?>