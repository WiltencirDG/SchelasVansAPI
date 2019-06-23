<?php

require '../../Db/Db.php';

$db = new Db();

$list = $_GET['list'];

if($list == "true"){
    $query = "SELECT CONCAT(CONCAT(b.PassageiroLogradouro,' '),b.PassageiroNum) endereco  FROM passageiroVeiculo a 
	          inner join Passageiro b on b.PassageiroId = a.PassageiroId WHERE a.VeiculoId = ".$_GET["id"];       
}else{
    $query = "SELECT CONCAT(CONCAT(b.DestinoLogradouro,' '),b.DestinoNum) endereco FROM veiculoDestino a
    	inner join Destino b on b.DestinoId = a.DestinoId
        WHERE a.VeiculoId = ".$_GET["id"];       
}


$arr = [];

if ($stmt = $db->mysql->prepare($query)) {
    
    $result = $db->mysql->query($query);
    
    if ($result){
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
            $arr[] = $row;
        }
        
    }else{
        $arr[] = 'false';
    }

    $db->mysql->close();
    
} else {
    $arr[] = 'false';
}
echo json_encode($arr,JSON_UNESCAPED_UNICODE);
?>