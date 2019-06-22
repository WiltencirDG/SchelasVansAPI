<?php

require '../../Db/Db.php';

$arr;
$id;

if(isset($_POST['placa']) && isset($_POST['cor']) && isset($_POST['modelo']) && isset($_POST['marca']) && isset($_POST['capacidade'])){
    
    $db = new Db();
    
    $id = $_POST['id'];
    $placa = $_POST['placa'];
    $cor = $_POST['cor'];
    $modelo = $_POST['modelo'];
    $marca = $_POST['marca'];
    $capacidade = $_POST['capacidade'];
    
    $query = "UPDATE `Veiculo` SET `VeiculoPlaca` = ?, `VeiculoCor` = ?, `VeiculoModelo` = ?, `VeiculoMarca` = ?, `VeiculoCapacidade` = ? WHERE `VeiculoId` = ?";
   
    if ($stmt = $db->mysql->prepare($query)) {
        $stmt->bind_param('ssssii', $placa, $cor, $modelo, $marca, $capacidade, $id);
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