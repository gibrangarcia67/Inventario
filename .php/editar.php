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

$sql = "SELECT * FROM base WHERE id=$id";
$result = $conn->query($sql);

$row = $result->fetch_assoc();

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
            <a href="/" class="opc">
                <img src="../img/almacen.png" alt="" class="opc_img">
                <p>
                    Almacen
                </p>
            </a>
            <a href="/movimientos" class="opc_active">
                <div class="active">
                    
                </div>
                <img src="../img/menu (1).png" alt="" class="opc_img">
                <p>
                    Movimientos
                </p>
            </a>
            <!-- {{-- <a href="" class="opc">
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
            </a> --}} -->
            <div class="sep">
                <p class="sep_col">
                    Mas
                </p>
            </div>
            <!-- <a href="" class="opc">
                <img src="../img/signo.png" alt="" class="opc_img">
                <p>
                    Ayuda
                </p>
            </a> -->
        </div>
        <div class="section">
            <p class="title">
                Editar Elemento
            </p>
            <div class="content">
                <form action="edicion.php?id=<?php echo $id;?>" method="POST">
                <input type="hidden" name="id" value="{{$reg_find -> id}}">
                <div class="flex_content">
                    <p class="title_2">
                        Datos del ingreso
                    </p>
                </div>
                <div class="in">
                    <p class="in_label">
                        Parte
                    </p>
                    <input type="text" class="in_input" name="parte" value="<?php echo $row['parte'] ?>">
                </div>
                <div class="in">
                    <p class="in_label">
                        Serie
                    </p>
                    <input type="text" class="in_input" name="serie" value="<?php echo $row['serie'] ?>">
                </div>
                <div class="in">
                    <p class="in_label">
                        Almacen
                    </p>
                    <input type="text" class="in_input" name="almacen" value="<?php echo $row['almacen'] ?>">
                </div>
                <div class="in">
                    <p class="in_label">
                        Tipo de tarjeta
                    </p>
                    <input type="text" class="in_input" name="tipo_tarjeta" value="<?php echo $row['tipo_tarjeta'] ?>">
                </div>
                <div class="in">
                    <p class="in_label">
                        Observacion equipo
                    </p>
                    <input type="text" class="in_input" name="obs_equipo" value="<?php echo $row['obs_equipo'] ?>">
                </div>
                <div class="in">
                    <p class="in_label">
                        Guia
                    </p>
                    <input type="text" class="in_input" name="guia" value="<?php echo $row['guia'] ?>">
                </div>
                <div class="in">
                    <p class="in_label">
                        Tipo Movimiento
                    </p>
                    <input type="text" class="in_input" name="tipo_movimiento" value="<?php echo $row['tipo_movimiento'] ?>">
                </div>
                <div class="in">
                    <p class="in_label">
                        Observacion Movimiento
                    </p>
                    <input type="text" class="in_input" name="obs_movimiento" value="<?php echo $row['obs_movimiento'] ?>">
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