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
    <title>Document</title>

    <style>
    *{
padding: 0;
margin: 0;
border: 0;
box-sizing: border-box;
font-family: Arial, Helvetica, sans-serif;
}
.table{
    margin: 0 auto;
width: 100vw;
border-collapse: collapse;
}
.table th,.table td{
border: 1px solid #EDEDED;
padding: .5em;
font-size: 14px;
text-align: center;   
}
.act{
width: .7em;
height: .7em;

border-radius: 50%;

margin: 0 auto;
}
.check{
border: 1px solid transparent;
}
</style>

</head>
<body>
    
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
            <tr>
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
        </tbody>
    </table>

</body>
</html>
