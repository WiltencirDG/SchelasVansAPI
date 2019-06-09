<?php

require '../../Db/Db.php';

$db = new Db();

$passIds = [];
$veicId;
$dests = [];

if(isset($_POST['destinos']) && isset($_POST["placa"])){
    $destinos = str_replace("[","",$_POST['destinos']);
    $destinos = str_replace("]","",$destinos);
    
    $dests = explode(',',$destinos);
    
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

$query = "INSERT INTO veiculoDestino(VeiculoId, DestinoId) VALUES";

foreach($dests as $destid) {
    if($destid != ''){
        $query = $query . " (". $veicId . ',' . $destid . "),";
    }
}

$query = rtrim($query,",");
$arr = [];

if ($stmt = $db->mysql->prepare($query)) {
    $result = $db->mysql->query($query);
    if ($result){
        $arr[] = 'true';
        
    }else{
        $arr[] = 'false';
    }

    $db->mysql->close();
    
} else {
    $arr[] = 'false';
}
echo json_encode($arr,JSON_UNESCAPED_UNICODE);
?>