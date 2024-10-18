
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $parte = $_POST['parte'];
    $serie = $_POST['serie'];
    $almacen = $_POST['almacen'];
    $tipo_tarjeta = $_POST['tipo_tarjeta'];
    $obs_equipo = $_POST['obs_equipo'];
    $guia = $_POST['guia'];
    $tipo_movimiento = $_POST['tipo_movimiento'];
    $obs_movimiento = $_POST['obs_movimiento'];
    
    $servername = "localhost"; 
    $username = "root";      
    $password = "";   
    $database = "larbase";  

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $sql = "INSERT INTO `base`(`parte`, `serie`, `almacen`, `tipo_tarjeta`, `obs_equipo`, `guia`, `tipo_movimiento`, `obs_movimiento`) VALUES ('$parte','$serie','$almacen','$tipo_tarjeta','$obs_equipo','$guia','$tipo_movimiento','$obs_movimiento')";

    if ($conn->query($sql) === TRUE) {
        // echo "Nuevo registro insertado con éxito";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

    header("Location: index.php");
    exit();

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Añadir Elemento</title>
    <link rel="stylesheet" href="../css/addelement.css">
</head>
<body>
    <div class="flex_box">
        <div class="menu">
            <div class="account">
                <img src="../img/usuario.jpeg" alt="" class="account_img">
                <div class="account_data">
                    <p>Usuario</p>
                    <div class="account_act">
                        <div class="circle">

                        </div>
                        <p>
                            Online
                        </p>
                    </div>
                </div>
            </div>
            <div class="sep">
                <p class="sep_col">
                    Menu de navegacion
                </p>
            </div>
            <a href="index.php" class="opc_active">
                <div class="active">
                    
                </div>
                <img src="../img/almacen.png" alt="" class="opc_img">
                <p>
                    Almacen
                </p>
            </a>
            <a href="/movimientos" class="opc">
                <img src="../img/menu (1).png" alt="" class="opc_img">
                <p>
                    Movimientos
                </p>
            </a>
            <!-- <a href="" class="opc">
                <img src="../img/grupo.png" alt="" class="opc_img">
                <p>
                    Usuarios
                </p>
            </a>
            <a href="" class="opc">
                <img src="../img/usuario.png" alt="" class="opc_img">
                <p>
                    Mi cuenta
                </p>
            </a> -->
            <div class="sep">
                <p class="sep_col">
                    Mas
                </p>
            </div>
            <a href="" class="opc">
                <img src="../img/signo.png" alt="" class="opc_img">
                <p>
                    Ayuda
                </p>
            </a>
        </div>
        <div class="section">
            <p class="title">
                Añadir Elemento
            </p>
            <div class="content">
                <form action="addelement.php" method="POST">
                <div class="flex_content">
                    <p class="title_2">
                        Datos del ingreso
                    </p>
                </div>
                <div class="in">
                    <p class="in_label">
                        Parte
                    </p>
                    <input type="text" class="in_input" name="parte" required>
                </div>
                <div class="in">
                    <p class="in_label">
                        Serie
                    </p>
                    <input type="text" class="in_input" name="serie" required>
                </div>
                <div class="in">
                    <p class="in_label">
                        Almacen
                    </p>
                    <input type="text" class="in_input" name="almacen" required>
                </div>
                <div class="in">
                    <p class="in_label">
                        Tipo de tarjeta
                    </p>
                    <input type="text" class="in_input" name="tipo_tarjeta" required>
                </div>
                <div class="in">
                    <p class="in_label">
                        Observacion equipo
                    </p>
                    <input type="text" class="in_input" name="obs_equipo" required>
                </div>
                <div class="in">
                    <p class="in_label">
                        Guia
                    </p>
                    <input type="text" class="in_input" name="guia" required>
                </div>
                <div class="in">
                    <p class="in_label">
                        Tipo de movimientos
                    </p>
                    <input type="text" class="in_input" name="tipo_movimiento" required>
                </div>
                <div class="in">
                    <p class="in_label">
                        Observacion Movimiento
                    </p>
                    <input type="text" class="in_input" name="obs_movimiento" required>
                </div>
                
                <div class="in">
                    <button type="submit" class="in_acc">Registrar</button>
                </div>
            </div>
        </form>
        </div>
    </div>
</body>
</html>