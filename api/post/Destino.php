<?php

require '../../Db/Db.php';

$arr;
$id;

if(isset($_POST['desc']) && isset($_POST['rua']) && isset($_POST['number']) && isset($_POST['bairro']) && isset($_POST['cidade'])){
    
    $db = new Db();
    
    $desc = $_POST['desc'];
    $rua = $_POST['rua'];
    $number = $_POST['number'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    
    
    $query = "SELECT `DestinoId` FROM `Destino` ORDER BY `DestinoId` DESC LIMIT 1";
    $stmt = $db->mysql->prepare($query);
    $result = $db->mysql->query($query);
    $id2 = $result->fetch_array(MYSQLI_ASSOC);
            
    $id = $id2["DestinoId"];
    
    $id+=1;
    
    $cityquery = "SELECT `CidadeId` FROM `Cidade` WHERE `CidadeNome` = ".'"'.$cidade.'"'." LIMIT 1";
    
    $stmt = $db->mysql->prepare($cityquery);
    $result = $db->mysql->query($cityquery);
    $aux = $result->fetch_array(MYSQLI_ASSOC);
            
    $cidadeId = $aux["CidadeId"];
    
    
    $query = "INSERT INTO `Destino`(`DestinoId`,`DestinoDesc`, `DestinoLogradouro`, `DestinoNum`, `DestinoBairro`, `DestinoCidade`) VALUES (?,?,?,?,?,?)";
    
    
    if ($stmt = $db->mysql->prepare($query)) {
        $stmt->bind_param('issssi', $id, $desc, $rua, $number, $bairro, $cidadeId);
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