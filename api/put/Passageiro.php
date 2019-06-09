<?php

require '../../Db/Db.php';

$arr;
$id;

if(isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['address']) && isset($_POST['number']) && isset($_POST['bairro']) && isset($_POST['cidade'])){
    
    $db = new Db();
    
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $number = $_POST['number'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    
    $query = "UPDATE `Passageiro` SET `PassageiroNome` = ?, `PassageiroEmail` = ?, `PassageiroFone` = ?, `PassageiroLogradouro` = ?, `PassageiroNum` = ?, `PassageiroBairro` = ?, `PassageiroCidade` = ? WHERE `PassageiroId` = ?";
   
    if ($stmt = $db->mysql->prepare($query)) {
        $stmt->bind_param('ssssssii', $nome, $email, $phone, $address, $number, $bairro, $cidade, $id);
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