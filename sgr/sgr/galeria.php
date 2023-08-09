<?php 

include_once "inc/config.php";
include('inc/start.php');

    $pgatual='Galeria de fotos';
    $pg='galeria.php';
    
  if($_GET['val']=='s') {
	    
   $dir = '../images/produtos/'.$_GET['id']; 
	  
	

   $file = $_FILES["arq"]; 

   if (!move_uploaded_file($file["tmp_name"], "$dir/".$file["name"])) { 
      alerta("Erro, o arquivo nao pode ser enviado.");
    } 
  
	  
	  redir($pg.'?id='.$_GET['id'].'&descricao='.$_GET['descricao']);
   
}

	if(!empty($_GET['excluir'])){
		$ft = '../images/produtos/'.$_GET['id'].'/'.$_GET['excluir'];
		if(file_exists($ft)){
			unlink($ft);	
		}
		redir($pg.'?id='.$_GET['id'].'&descricao='.$_GET['descricao']);
	}

?>
<!DOCTYPE html>
<html lang="pt-br" dir="ltr">

<head>

<?php require('inc/inc_header.php')?>

<script type="text/javascript">
	function confirma(x){
		if(confirm("Confirma a exclusao do arquivo: "+x+" ?")){
			return true;	
		}else{
			return false;	
		}
	}
</script>
	
</head>

<body class="layout-default">


    <div class="preloader"></div>

    <!-- Header Layout -->
    <div class="mdk-header-layout js-mdk-header-layout">

        <!-- Header -->

       <?php require('inc/inc_top.php')?>

        <!-- // END Header -->

        <!-- Header Layout Content -->
        <div class="mdk-header-layout__content">

            <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">
                <div class="mdk-drawer-layout__content page">





                    <div class="container-fluid page__heading-container">
                        <div class="page__heading d-flex align-items-center">
                            <div class="flex">

                                <h4 class="m-0"><?=$pgatual?> - <?=$_GET['descricao']?></h4>
                            </div>
                            
                        </div>
						
                 <div class="col-lg-12 ">
	 <div class="card">
			 


                            <div class="card-header card-header-large " id="noprint">
                                <h4 class="card-header__title">SELECIONE O ARQUIVO PARA ENVIAR</h4>
								
                                    <form action="?val=s&id=<?=$_GET['id']?>&descricao=<?=$_GET['descricao']?>" class="grid_12" method="post" enctype="multipart/form-data">
                                      
                                            <div class="form-row">
												

												
                                                <div class="col-12 col-md-10 mb-3">
                                                   
                                                    <input type="file" id="arq" name="arq" required/>
													

                                                </div>												
												
                                                <div class="col-12 col-md-2 mb-3">
													  <button class="btn btn-primary" type="submit" name="a">Enviar Arquivo</button>
                                     
													
													

                                                </div>														
												
                                            </div>
                                          

                                    </form>
								
                            </div>
		 
                                    <div class="table-responsive border-bottom" data-toggle="lists" data-lists-values='["js-lists-values-employee-name"]'>


                                        <table class="table mb-0 thead-border-top-0">
                                            <thead>

                                                    <th style="width: 95%">Arquivo</th>
												  <th> </th>
                                                   
                                                </tr>
                                            </thead>
                                            <tbody class="list" id="staff02">
									
            <?php 
				$dir='../images/produtos/'.$_GET['id'];								
				$open = opendir($dir);
				while($arquivo=readdir($open)){
					if($arquivo != '.' && $arquivo != '..'){
			?>
												
                                                <tr <?=$sel?>>
                                                  

													<td><a href="<?=$dir?>/<?=$arquivo?>" target="_blank"><?=$arquivo?></a> </td>
													
													<td>
														<?php if($arquivo!='principal.jpg'){?>
														<a href="?excluir=<?=$arquivo?>&id=<?=$_GET['id']?>&descricao=<?=$_GET['descricao']?>" class="text-muted" onclick="return confirma('<?=$arquivo?>')" title="Apagar"><i class="material-icons">delete_forever</i></a> 
														<?php }?>
													</td>
													
													
                                                </tr>
												
				                            <?php	 }}?>												

                                            </tbody>
                                        </table>
																				
										
                                    </div>
                            <div class="card-body text-right">
								
								<?php if($pagina > 1) {echo '<a href="?pagina='.($pagina - 1).'" class="text-muted-light"><i class="material-icons ml-1">arrow_back</i></a>';}?>
                               
								
								<?php for($i = 1; $i < $numPaginas + 1; $i++) {echo "<a href='?pagina=$i'>".$i."</a>  | "; } ?>
																								
								
								<?php if($pagina < $numPaginas) {echo '<a href="?pagina='.($pagina + 1).'" class="text-muted-light"><i class="material-icons ml-1">arrow_forward</i></a>';}?>
                            </div>

                                </div>
					 </div>
						
                    </div>


                </div>
                <!-- // END drawer-layout__content -->

                <?php require('inc/inc_menu.php')?>
            </div>
            <!-- // END drawer-layout -->

        </div>
        <!-- // END header-layout__content -->

    </div>
    <!-- // END header-layout -->



<?php require('inc/inc_footer.php');?>
	

</body>

</html>