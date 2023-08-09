<?php
 	include ("config.php");

$cod_cat = $_GET['cod_cat']; 

$subcategoria = array();



   $qry = "select id, descricao from planos where convenio_id=".$cod_cat." order by descricao";
   $resultado = $conn->prepare($qry);
   $resultado->execute();


while($tab = $resultado->fetch(PDO::FETCH_ASSOC)){
	
	$subcategoria[] = array(
		'id'		=> $tab['id'],
		'nome'			=> $tab['descricao']
	);
}



echo( json_encode( $subcategoria ) );

?>