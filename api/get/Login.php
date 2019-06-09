<?php

require '../../Db/Db.php';

if(isset($_POST['email']) && isset($_POST['password'])){
    
    $db = new Db();
    
    $email = $_POST['email'];
    $pass  = $_POST['password'];
    $pass = crypt($pass,"wilt");
    
    $query = "SELECT `UsuarioEmail`, `UsuarioSenha` FROM `Usuario` WHERE `UsuarioEmail` = ? and `UsuarioSenha` = ?";

    if ($stmt = $db->mysql->prepare($query)) {
        $stmt->bind_param('ss', $email, $pass);
        $result = $stmt->execute();
        $stmt->store_result();
        $stmt->fetch();
        $count = $stmt->num_rows();
        
        if ($count == 1){
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

echo $arr;

?>