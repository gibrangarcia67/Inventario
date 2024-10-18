<?php  

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $servername = "localhost"; 
    $username = "root";      
    $password = "";   
    $database = "larbase";  

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        // die("Conexión fallida: " . $conn->connect_error);
    }

    // echo "Conexión exitosa";

    $sql = "SELECT * FROM base";
    $result = $conn->query($sql);
    // $row = $result->fetch_assoc();


    // for ($i=1; $i <= $row['total']; $i++) { 
    //     echo $i;
    // }

    $j = 0;

    foreach ($result as $key) {

        $j = $key['id'];

        break;
    }
    
    foreach ($result as $item) {
        // echo $clave['id'];
        
        if(isset($_POST[$j])){
                        
            if(($item['id'] == $_POST[$j]) && ($item['activo'] == 0)){
                
                echo 'encontrado';

                $id_find = $item['id'];
                $update = 1;

                $sql = "UPDATE base SET activo = ? WHERE id = ?";
                $stmt = $conn->prepare($sql);

                $stmt->bind_param("ii", $update, $id_find);

                if ($stmt->execute()) {
                    echo "Registro actualizado con éxito.";
                } else {
                    echo "Error al actualizar el registro: " . $stmt->error;
                }
                
            }
            
        }else{
            
        }
        echo "<br>";
        
        $j++;
        
    }
    $conn->close();

    header("Location: movimientos.php");
    exit();

}
    // echo '<pre>';
    // print_r($_POST);
    // echo '</pre>';

?>

<!-- $reg_all = Registros::all();

        $j = 1;
        
        foreach ($reg_all as $item) {

            if(($item -> id == $request->input($j)) && ($item -> activo == 0)){
                
                $reg_up = Registros::find($item -> id);

                $reg_up -> update(['activo' =>  1]);
                
            }
            
            $j++;

        } -->
