<?php

// CONECTA BANCO
require_once "includes/config.php";

// FUNÇÃO ANTI SQL-INJECTION
require_once "includes/antiSQL.php";

// APLICA FUNÇÃO ANTI-SQL EM TODAS AS POSIÇÕES DO $_POST
$_POST = array_map("antiSQL", $_POST);


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

 $fullName = $_POST['name'] . " " . $_POST['lastname'];
 
// CRIA UMA VARIAVEL E ARMAZENA A HORA DO FUSO-HORÀRIO DEFINIDO
$dataLocal = date('Y-m-d H:i:s', time());

if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    //VERIFICA SE O EMAIL JÁ ESTÁ CADASTRADO

       $insert = mysqli_query($connect,"INSERT INTO leads (email,nome,ip,tipo,data_hora) 
        VALUES ('$_POST[email]','$fullName','$ip','B2C','$dataLocal')") or die(mysqli_error());

        // TESTA A GRAVAÇÂO
		if (!$insert) {
			echo "<script>
					alert('Erro ao cadastrar e-mail. Por favor,tente novamente.');
					history.back();
				 </script>";
			exit;
		}else{
            echo "<script>
            alert('Cadastro efetuado com sucesso.');
            document.location.href = 'obrigado.html';
     </script>";
        }
}else{
	echo "<script>
		alert('Endereço de e-mail inválido.');
					history.back();
				 </script>";
			exit;	
}
?>