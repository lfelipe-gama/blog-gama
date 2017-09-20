<?php

// DEFINE O FUSO HORARIO COMO O HORARIO DE BRASILIA
date_default_timezone_set('America/Sao_Paulo');


 $http_client_ip       = $_SERVER['HTTP_CLIENT_IP'];
 $http_x_forwarded_for = $_SERVER['HTTP_X_FORWARDED_FOR'];
 $remote_addr          = $_SERVER['REMOTE_ADDR'];
  
 // VERIFICO SE O IP REALMENTE EXISTE NA INTERNET
 if(!empty($http_client_ip)){
     $ip = $http_client_ip;
     // VERIFICO SE O ACESSO PARTIU DE UM SERVIDOR PROXY 
 } elseif(!empty($http_x_forwarded_for)){
     $ip = $http_x_forwarded_for;
 } else {
     // CASO EU NÃO ENCONTRE NAS DUAS OUTRAS MANEIRAS, RECUPERO DA FORMA TRADICIONAL 
     $ip = $remote_addr;
 }


echo $ip;
echo "<hr>";


// CRIA UMA VARIAVEL E ARMAZENA A HORA DO FUSO-HORÀRIO DEFINIDO
$dataLocal = date('Y-m-d H:i:s', time());
echo $dataLocal;


echo "<pre>";
    var_dump($_POST);
echo "</pre>";


//redirect para thanks-page

?>