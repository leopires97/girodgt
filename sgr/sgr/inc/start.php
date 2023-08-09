<?php
 	if(empty($_SESSION['usercod'])){redir("login.php");}else{
		
		
		$url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		$ip = $_SERVER["REMOTE_ADDR"];
		
        $qry = "INSERT INTO 
  `historico`
(
  `usuario_id`,
  `data_hora`,
  `pagina`,
  `ip`) 
VALUE (
  :usuario_id,
  :data_hora,
  :pagina,
  :ip);"; 

        $insert_qry = $conn->prepare($qry);
        $insert_qry->bindParam(':usuario_id', $_SESSION['usercod']);
        $insert_qry->bindParam(':data_hora', date("Y-m-d H:i") );
		$insert_qry->bindParam(':pagina', $url);
		$insert_qry->bindParam(':ip', $ip);


        $insert_qry->execute();
	
		
	}

?>