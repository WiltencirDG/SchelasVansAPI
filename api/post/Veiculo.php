<?php

require '../../Db/Db.php';

$arr;
$id;

if(isset($_POST['placa']) && isset($_POST['modelo']) && isset($_POST['capacidade'])){
    
    $db = new Db();
    
    $placa = $_POST['placa'];
    $cor = $_POST['cor'];
    $modelo = $_POST['modelo'];
    $capacidade = $_POST['capacidade'];
    $marca = $_POST['marca'];
    
    $query = "SELECT `VeiculoId` FROM `Veiculo` ORDER BY `VeiculoId` DESC LIMIT 1";
    $stmt = $db->mysql->prepare($query);
    $result = $db->mysql->query($query);
    $id2 = $result->fetch_array(MYSQLI_ASSOC);
            
    $id = $id2["VeiculoId"];
    
    $id+=1;
    
    $query = "INSERT INTO `Veiculo`(`VeiculoId`,`VeiculoPlaca`, `VeiculoCor`, `VeiculoModelo`, `VeiculoMarca`, `VeiculoCapacidade`) VALUES (?,?,?,?,?,?)";
    
    
    if ($stmt = $db->mysql->prepare($query)) {
        $stmt->bind_param('issssi', $id, $placa, $cor, $modelo, $marca, $capacidade);
        $result = $stmt->execute();
        
        if ($result){
            $arr = "true";
        }else{
            $arr = "false";
        }

        $db->mysql->close();
        
    } else {
        $arr = "false";
    }
}else{
    $arr = "false";
}

echo json_encode($arr);

?>