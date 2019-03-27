<?php

require '../../db/Db.php';


if($_POST['email'] && $_POST['password']){
    $db = new Db();

    $query = "SELECT UsuarioEmail, UsuarioSenha FROM Usuario WHERE UsuarioEmail = ? and UsuarioSenha = ?";

    if ($stmt = $db->mysql->prepare($query)) {
        $stmt->bind_param('ss', $_POST['email'], crypt($_POST['password']));
        $result = $stmt->execute();

        if ($result){
            return json_encode(true);
        }else{
            return json_encode(false);
        }

        $db->mysql->close();
        
    } else {
        return json_encode(false);
    }
}else{
    return json_encode(false);
}

?>