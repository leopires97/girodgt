<?php
 	include ("config.php");

$cod_cat = $_GET['cod_cat']; 

$subcategoria = array();

   $qry1 = "select id, nome, convenio_id from pacientes where id=".$cod_cat;
   $resultado1 = $conn->prepare($qry1);
   $resultado1->execute();

$tab1 = $resultado1->fetch(PDO::FETCH_ASSOC);

   $qry = "select id, descricao from procedimentos where convenio_id=".$tab1['convenio_id']." order by descricao";
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