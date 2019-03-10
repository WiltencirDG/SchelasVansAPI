<?php

define ('HOST','127.0.0.1'); 
define ('USUARIO','root');
define ('SENHA','brubo');
define ('DB','Login');

$conexao = myslqi_connect(HOST, USUARIO, SENHA, DB) or die ('SEM CONEXÃO COM O BANCO');
?>