<?php

require '../../db/Db.php';
$db = new Db();

$query = "SELECT * FROM Passageiro";

if ($stmt = $db->mysql->prepare($query)) {
    $result = $stmt->execute();
    if ($result){
        return json_encode($result->fetch_array(MYSQLI_ASSOC));
    }else{
        return json_encode(false);
    }

    $db->mysql->close();
    
} else {
    return json_encode(false);
}

?>