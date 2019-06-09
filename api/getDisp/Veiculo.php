<?php

require '../../Db/Db.php';

$db = new Db();

$query = "SELECT 
 	a.*,  SUM(b.VeiculoId) actualCap
FROM Veiculo a 
LEFT JOIN passageiroVeiculo b ON b.VeiculoId = a.VeiculoId 
GROUP BY b.VeiculoId";   

$arr = [];

if ($stmt = $db->mysql->prepare($query)) {
    
    $result = $db->mysql->query($query);
    
    if ($result){
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
            if($row["actualCap"] != null){
                $row["VeiculoCapacidade"] = $row["VeiculoCapacidade"] - $row["actualCap"];    
            }
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