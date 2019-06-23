<?php

require '../../Db/Db.php';

$db = new Db();

$passIds = [];
$veicId;

if(isset($_POST['emails']) && isset($_POST["placa"])){
    $emails = str_replace("[","",$_POST['emails']);
    $emails = str_replace("]","",$emails);
    
    $placa = substr($_POST["placa"],0,7);
    $placa = '"'.$placa.'"';
    
    $query = "SELECT PassageiroId FROM Passageiro WHERE PassageiroEmail IN (".$emails.")";
    
    $stmt = $db->mysql->prepare($query);
    
    if ($result = $db->mysql->query($query)) {
        while ($row = $result->fetch_assoc()) {
           array_push($passIds,$row["PassageiroId"]);
        }
    }
    
    $query = "SELECT VeiculoId FROM Veiculo WHERE VeiculoPlaca = ".$placa;
    $stmt = $db->mysql->prepare($query);
    $result = $db->mysql->query($query);
    $veic = $result->fetch_array(MYSQLI_ASSOC);
    $veicId = $veic["VeiculoId"];
    
}

$query = "INSERT INTO passageiroVeiculo(PassageiroId, VeiculoId) VALUES";
$query2 = "INSERT INTO Checklist(PassageiroId, VeiculoId, isSelected) VALUES";

foreach($passIds as $passid) {
    if($passid != ''){
        $query = $query . " (". $passid . ',' . $veicId . "),";
        $query2 = $query2 . " (". $passid . ',' . $veicId . ", false),";
    }
}

$query = rtrim($query,",");
$query2 = rtrim($query2,",");
$arr = [];

if ($stmt = $db->mysql->prepare($query)) {
    $result = $db->mysql->query($query);
    if ($result){
        if ($stmt = $db->mysql->prepare($query2)) {
            $result = $db->mysql->query($query2);
            if ($result){
                $arr[] = 'true';
            }else{
                $arr[] = 'false';
            }
        }else {
            $arr[] = 'false';
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