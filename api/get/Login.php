<?php

require '../../Db/Db.php';


if(isset($_POST['email']) && isset($_POST['password'])){
    $db = new Db();

    $query = "SELECT UsuarioEmail, UsuarioSenha FROM Usuario WHERE UsuarioEmail = ? and UsuarioSenha = ?";

    if ($stmt = $db->mysql->prepare($query)) {
        $stmt->bind_param('ss', $_POST['email'], crypt($_POST['password']));
        $result = $stmt->execute();

        if ($result){
            echo json_encode('{"Data":{true}');
        }else{
            echo json_encode('{"Data":{false}');
        }

        $db->mysql->close();
        
    } else {
        echo json_encode('{"Data":{false}');
    }
}else{
    echo json_encode('{"Data":{false}');
}

?>