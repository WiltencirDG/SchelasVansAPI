<?php

require '../../Db/Db.php';

$arr;
$id;

if(isset($_POST['id'])){
    
    $db = new Db();
    
    $id = $_POST['id'];
    
    $query = "DELETE FROM `Passageiro` WHERE `PassageiroId` = ?";
    
    if ($stmt = $db->mysql->prepare($query)) {
        $stmt->bind_param('i', $id);
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