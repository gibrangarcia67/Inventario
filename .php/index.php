
<?php

$servername = "localhost"; 
$username = "root";      
$password = "";   
$database = "larbase";  

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    // die("Conexión fallida: " . $conn->connect_error);
}

// echo "Conexión exitosas";

$sql = "SELECT * FROM base WHERE activo = 1";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestion De Inventario</title>
    <link rel="stylesheet" href="../css/index.css">
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
            <a href="movimientos.php" class="opc">
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
                Almacen
            </p>
            <div class="content">
                <div class="flex_content">
                    <p class="title_2">
                        Historial De Movimientos
                    </p>
                    <div style="display: flex;gap: 1em;">
                        <form action="gen_pdf.php" method="post" style="display: flex;justify-content: center; align-items: center;">
                            <button type="submit" class="anadir2">
                                Exportar Tabla
                            </button>
                        </form>
                        <a href="addelement.php" class="anadir">
                            Añadir Elemento
                        </a>
                        </div>
                </div>
                <div class="table_hidden">

                    <table class="table">
                        <thead>
                            <th>
                                Activo
                            </th>
                            <th>
                                Añadido
                            </th>
                            <th>
                                ID
                            </th>
                            <th>
                                #Parte
                            </th>
                            <th>
                                #Serie
                            </th>
                            <th>
                                Almacen
                            </th>
                            <th>
                                Tipo de tarjeta
                            </th>
                            <th>
                                Observaciones En equipo
                            </th>
                            <th>
                                Guia
                            </th>
                            <th>
                                Tipo de Movimiento
                            </th>
                            <th>
                                Observacion Movimiento
                            </th>
                        </thead>
                        <tbody>
                                <?php
                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            if($row["activo"] == 1){
                                                echo "<td><div class='act' style='background-color: #437948;'></div></td>";
                                            }else{
                                                echo "<td><div class='act' style='background-color: crimson;'></div></td>";
                                            }
                                            echo "<td>" . $row["time"] . "</td>";
                                            echo "<td>" . $row["id"] . "</td>";
                                            echo "<td>" . $row["parte"] . "</td>";
                                            echo "<td>" . $row["serie"] . "</td>";
                                            echo "<td>" . $row["almacen"] . "</td>";
                                            echo "<td>" . $row["tipo_tarjeta"] . "</td>";
                                            echo "<td>" . $row["obs_equipo"] . "</td>";
                                            echo "<td>" . $row["guia"] . "</td>";
                                            echo "<td>" . $row["tipo_movimiento"] . "</td>";
                                            echo "<td>" . $row["obs_movimiento"] . "</td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='11'>No se encontraron usuarios.</td></tr>";
                                    }
                                ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>