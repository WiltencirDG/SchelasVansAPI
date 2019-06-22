<?php

require '../../Db/Db.php';

$arr;
$id;
$cidadeId;
$cidadeAux;

if(isset($_POST['desc']) && isset($_POST['rua']) && isset($_POST['number']) && isset($_POST['bairro']) && isset($_POST['cidade'])){
    
    $db = new Db();
    
    $id = $_POST['id'];
    $desc = $_POST['desc'];
    $rua = $_POST['rua'];
    $number = $_POST['number'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    
    $cityquery = "SELECT `CidadeId` FROM `Cidade` WHERE `CidadeNome` = ".'"'.$cidade.'"'." LIMIT 1";
    print("Schelas Vans ".$id);
    $stmt = $db->mysql->prepare($cityquery);
    $result = $db->mysql->query($cityquery);
    $aux = $result->fetch_array(MYSQLI_ASSOC);
            
    $cidadeId = $aux["CidadeId"]; 
    
    $query = "UPDATE `Destino` SET `DestinoDesc` = ?, `DestinoLogradouro` = ?, `DestinoNum` = ?, `DestinoBairro` = ?, `DestinoCidade` = ? WHERE `DestinoId` = ?";
   
    if ($stmt = $db->mysql->prepare($query)) {
        $stmt->bind_param('ssssii', $desc, $rua, $number, $bairro, $cidadeId, $id);
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