<?php

require '../../Db/Db.php';

$db = new Db();




if(isset($_GET['id'])){
    $query = "SELECT * FROM Destino WHERE DestinoId = ".$_GET['id'];
}else{
    $query = "SELECT * FROM Destino"; 
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