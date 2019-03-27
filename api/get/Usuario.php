<?php

require '../../Db/Db.php';
$db = new Db();

$arr = [];

$query = "SELECT * FROM Usuario WHERE UsuarioId = ?";

if ($stmt = $db->mysql->prepare($query)) {
    $stmt->bind_param(i,$_POST["UsuarioId"]);

    $result = $stmt->execute();
    if ($result){
        $arr[] = $result->fetch_array(MYSQLI_ASSOC);
    }else{
        $arr[] = 'false';
    }

    $db->mysql->close();
    
} else {
    $arr[] = 'false';
}
echo json_encode($arr,JSON_UNESCAPED_UNICODE);
?>