<?php

require '../../Db/Db.php';

$arr;
$id;

if(isset($_POST['VeiculoId']) && isset($_POST['Passageiros'])){
    
    $db = new Db();
    
    $veicId = $_POST['VeiculoId'];
    $passes = $_POST['Passageiros'];
    $arr = "false";
    
    $passes =str_replace("{","",$passes);
    $passes = str_replace("}","",$passes);
    $passes = explode(',',$passes);
    
    foreach ($passes as $value){
        
        $pieces = explode("=", $value);
        $passId = $pieces[0];
        $status = $pieces[1];
        
        if($status == "true"){
            $status = 1;
        }else{
            $status = 0;
        }
        
        $query = "UPDATE `Checklist` SET `isSelected` = ? WHERE `VeiculoId` = ? AND `PassageiroId` = ?";
        
        if ($stmt = $db->mysql->prepare($query)) {
            $stmt->bind_param('iss', $status, $veicId, $passId);
            $result = $stmt->execute();
            
            if ($result){
                $arr = "true";
            }else{
                $arr = "false";
            }
    
        } else {
            $arr = "false";
        }
    }
    
    $db->mysql->close();
    
}else{
    $arr = "false";
}

echo json_encode($arr);

?>
