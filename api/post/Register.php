<?php

require '../../Db/Db.php';

$arr;

if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['username'])){
    $db = new Db();
    
    $email = $_POST['email'];
    $pass  = $_POST['password'];
    $pass = crypt($pass,"wilt");
    $username = $_POST['username'];
    
    $query = "INSERT INTO `Usuario`(`UsuarioEmail`, `UsuarioNome`, `UsuarioSenha`) VALUES (?,?,?)";

    if ($stmt = $db->mysql->prepare($query)) {
        $stmt->bind_param('sss', $email, $username, $pass);
        $result = $stmt->execute();
        
        if ($result){
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

echo json_encode($arr);

?>