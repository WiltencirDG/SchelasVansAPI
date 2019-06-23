<?php

require '../../Db/Db.php';

$db = new Db();

if(isset($_GET['id'])){
    //$query = "SELECT * FROM Passageiro WHERE PassageiroId = ".$_GET['id'];
}else{
    $query = "SELECT a.PassageiroId, b.PassageiroNome, b.PassageiroEmail, b.PassageiroFone, b.PassageiroLogradouro, b.PassageiroNum, b.PassageiroBairro, b.PassageiroCidade, a.isSelected FROM Checklist a JOIN Passageiro b on b.PassageiroId = a.PassageiroId WHERE a.VeiculoId = ".$_GET['veiculo']." GROUP BY a.PassageiroId";    
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