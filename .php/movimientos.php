
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

$sql_1 = "SELECT * FROM base WHERE activo = 1";
$result_1 = $conn->query($sql_1);

$sql_2 = "SELECT * FROM base WHERE activo = 0";
$result_2 = $conn->query($sql_2);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Gestion De Inventario</title>
        <link rel="stylesheet" href="../css/movimientos.css">
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
            <a href="index.php" class="opc">
                <img src="../img/almacen.png" alt="" class="opc_img">
                <p>
                    Almacen
                </p>
            </a>
            <a href="movimientos.php" class="opc_active">
                <div class="active"></div>
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
            <a href="" class="opc">
                <img src="../img/signo.png" alt="" class="opc_img">
                <p>
                    Ayuda
                </p>
            </a>
        </div>
        <div class="section">
            <form action="delete.php" method="POST">
            <p class="title">
                Historial De Movimientos
            </p>
            <div class="content">
                <div class="flex_content">
                    <p class="title_2">
                        Eliminar Movimientos
                    </p>
                    <button type="submit" class="anadir">
                        Eliminar Elemento
                    </button>
                </div>
                <div class="table_hidden">

                    <table class="table">
                        <thead>
                            <th>
                                Activo
                            </th>
                            <th>
                                Seleccionar
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
                            <th>
                                Editar
                            </th>
                        </thead>
                        <tbody>

                            <?php
                                    if ($result_1->num_rows > 0) {
                                        while($row_1 = $result_1->fetch_assoc()) {
                                            echo "<tr>";
                                            if($row_1["activo"] == 1){
                                                echo "<td><div class='act' style='background-color: #437948;'></div></td>";
                                            }else{
                                                echo "<td><div class='act' style='background-color: crimson;'></div></td>";
                                            }
                                            echo "<td><input type='checkbox' name='".$row_1["id"]."' value='".$row_1["id"]."''></td>";
                                            echo "<td>" . $row_1["time"] . "</td>";
                                            echo "<td>" . $row_1["id"] . "</td>";
                                            echo "<td>" . $row_1["parte"] . "</td>";
                                            echo "<td>" . $row_1["serie"] . "</td>";
                                            echo "<td>" . $row_1["almacen"] . "</td>";
                                            echo "<td>" . $row_1["tipo_tarjeta"] . "</td>";
                                            echo "<td>" . $row_1["obs_equipo"] . "</td>";
                                            echo "<td>" . $row_1["guia"] . "</td>";
                                            echo "<td>" . $row_1["tipo_movimiento"] . "</td>";
                                            echo "<td>" . $row_1["obs_movimiento"] . "</td>";
                                            echo "<td><a href='editar/".$row_1["id"] ."'>Editar</a></td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='13'>No se encontraron usuarios.</td></tr>";
                                    }
                                ?>

                        </tbody>
                    </table>
                </div>
            </div>
            </form>

            <form action="up.php" method="post">
            <div class="content">
                <div class="flex_content">
                    <p class="title_2">
                        Habilitar Movimientos
                    </p>
                    <button type="submit" class="anadir2">
                        Habilitar Elemento
                    </button>
                </div>
                <div class="table_hidden">

                    <table class="table">
                        <thead>
                            <th>
                                Activo
                            </th>
                            <th>
                                Seleccionar
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
                                    if ($result_2->num_rows > 0) {
                                        while($row_2 = $result_2->fetch_assoc()) {
                                            echo "<tr>";
                                            if($row_2["activo"] == 1){
                                                echo "<td><div class='act' style='background-color: #437948;'></div></td>";
                                            }else{
                                                echo "<td><div class='act' style='background-color: crimson;'></div></td>";
                                            }
                                            echo "<td><input type='checkbox' name='".$row_2["id"] ."' value='".$row_2["id"]."''></td>";
                                            echo "<td>" . $row_2["time"] . "</td>";
                                            echo "<td>" . $row_2["id"] . "</td>";
                                            echo "<td>" . $row_2["parte"] . "</td>";
                                            echo "<td>" . $row_2["serie"] . "</td>";
                                            echo "<td>" . $row_2["almacen"] . "</td>";
                                            echo "<td>" . $row_2["tipo_tarjeta"] . "</td>";
                                            echo "<td>" . $row_2["obs_equipo"] . "</td>";
                                            echo "<td>" . $row_2["guia"] . "</td>";
                                            echo "<td>" . $row_2["tipo_movimiento"] . "</td>";
                                            echo "<td>" . $row_2["obs_movimiento"] . "</td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='13'>No se encontraron usuarios.</td></tr>";
                                    }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
        </div>
    </div>
</body>
</html>