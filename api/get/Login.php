<?php

require '../../Db/Db.php';

$arr = [];

if(isset($_POST['email']) && isset($_POST['password'])){
    $db = new Db();

    $query = "SELECT UsuarioEmail, UsuarioSenha FROM Usuario WHERE UsuarioEmail = ? and UsuarioSenha = ?";

    if ($stmt = $db->mysql->prepare($query)) {
        $stmt->bind_param('ss', $_POST['email'], crypt($_POST['password']));
        $result = $stmt->execute();

        if ($result){
            $arr[] = 'true';
            
        }else{
            $arr[] = 'false';
        }

        $db->mysql->close();
        
    } else {
        $arr[] = 'false';
    }
}else{
    $arr[] = 'false';
}
echo json_encode($arr,JSON_UNESCAPED_UNICODE);
?>