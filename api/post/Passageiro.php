<?php

require '../../Db/Db.php';

$arr;
$id;

if(isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['address']) && isset($_POST['number']) && isset($_POST['bairro']) && isset($_POST['cidade'])){
    
    $db = new Db();
    
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $number = $_POST['number'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    
    
    $query = "SELECT `PassageiroId` FROM `Passageiro` ORDER BY `PassageiroId` DESC LIMIT 1";
    $stmt = $db->mysql->prepare($query);
    $result = $db->mysql->query($query);
    $id2 = $result->fetch_array(MYSQLI_ASSOC);
            
    $id = $id2["PassageiroId"];
    
    $id+=1;
    
    $cityquery = "SELECT `CidadeId` FROM `Cidade` WHERE `CidadeNome` = ".'"'.$cidade.'"'." LIMIT 1";
    
    $stmt = $db->mysql->prepare($cityquery);
    $result = $db->mysql->query($cityquery);
    $aux = $result->fetch_array(MYSQLI_ASSOC);
            
    $cidadeId = $aux["CidadeId"]; 
    
    
    $query = "INSERT INTO `Passageiro`(`PassageiroId`,`PassageiroNome`, `PassageiroEmail`, `PassageiroFone`, `PassageiroLogradouro`, `PassageiroNum`, `PassageiroBairro`, `PassageiroCidade`) VALUES (?,?,?,?,?,?,?,?)";
    
    
    if ($stmt = $db->mysql->prepare($query)) {
        $stmt->bind_param('issssssi', $id, $nome, $email, $phone, $address, $number, $bairro, $cidadeId);
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