<?php
 	include ("config.php");

$cod_cat = $_GET['cod_cat']; 

$subcategoria = array();
$_SESSION['procediento']='';




   $qry = "SELECT 
    `tratamentos`.`paciente_id`,
  `tratamentos`.`procedimento_id`,
  `tratamentos`.`sessoes`,
  `procedimentos`.`descricao`,
  `tratamentos`.id
FROM
  `tratamentos`
  INNER JOIN `procedimentos` ON (`tratamentos`.`procedimento_id` = `procedimentos`.`id`) where `tratamentos`.`paciente_id`=".$cod_cat." order by `procedimentos`.`descricao`";
   $resultado = $conn->prepare($qry);
   $resultado->execute();


while($tab = $resultado->fetch(PDO::FETCH_ASSOC)){
	

    $qryt = "select MAX(sessao) as ultima from tratamentos_itm where tratamento_id=".$tab['id'];
    $resultadot = $conn->prepare($qryt);
    $resultadot->execute();

    $tabt = $resultadot->fetch(PDO::FETCH_ASSOC);
	
	
if($tab['sessoes']!=$tabt['ultima']){
	$subcategoria[] = array(
		'id'		=> $tab['id'],
		'nome'			=> $tab['descricao'].' - '.$tabt['ultima'].'/'.$tab['sessoes']
	);
}
	
}


$_SESSION['procediento']=$subcategoria;

echo( json_encode( $subcategoria ) );

?>