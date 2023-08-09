<?php
	
	/******************************************************************************/

	//Função de alerta
	function alerta($msg){
		echo '<script type="text/javascript">alert("'.$msg.'");</script>';	
	}
	
	/******************************************************************************/
	
	//Função de redirecionamento
	function redir($url){
		echo '<script type="text/javascript">window.location="'.$url.'";</script>';
	}
	
	/******************************************************************************/
	
	//Função de alerta com redirecionamento
	function aledir($msg ,$url){
		echo '<script type="text/javascript">alert("'.$msg.'"); window.location="'.$url.'";</script>';
	}
	
	/******************************************************************************/
	
	//Função de Remover Acentos
 	function RemoveAcentos($Msg){
		$a = array(
  		"/[ÂÀÁÄÃ]/"=>"A",
  		"/[âãàáä]/"=>"a",
  		"/[ÊÈÉË]/"=>"E",
  		"/[êèéë]/"=>"e",
  		"/[ÎÍÌÏ]/"=>"I",
  		"/[îíìï]/"=>"i",
  		"/[ÔÕÒÓÖ]/"=>"O",
  		"/[ôõòóö]/"=>"o",
  		"/[ÛÙÚÜ]/"=>"U",
 		"/[ûúùü]/"=>"u",
  		"/ç/"=>"c",
    	"/Ç/"=> "C");
			
		// Tira o acento pela chave do array 
		return preg_replace(array_keys($a), array_values($a), $Msg);
	}
	
?>