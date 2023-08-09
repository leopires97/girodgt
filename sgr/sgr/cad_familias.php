<?php 

include_once "inc/config.php";
include('inc/start.php');

    $pgatual='Familias';
    $pgbusca='familias.php';
     
   

 if($_GET['val']=='s'){
	 
  $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
	 
  $qry = "INSERT INTO familias (descricao, veiculo_id) VALUES (:descricao, :veiculo_id)"; 

  $insert_qry = $conn->prepare($qry);
  $insert_qry->bindParam(':descricao', $dados['descricao']);
	 $insert_qry->bindParam(':veiculo_id', $dados['veiculo_id']);


if ($insert_qry->execute()) {
	
	$dir = '../images/familia/'; 
	
	$id_insert=$conn->lastInsertId();	
	
  

   $file = $_FILES["arq"]; 
	
   //$extensao = pathinfo($file["name"], PATHINFO_EXTENSION);	

   if (!move_uploaded_file($file["tmp_name"], $dir.$id_insert.".jpg")) { 
       alerta("Erro, o arquivo nao pode ser enviado."); 
    } 
 
	
redir($pgbusca);
   
} else {
    alerta('Erro ao gravar, tente novamente!');;
}


	 
 }
 

?>
<!DOCTYPE html>
<html lang="pt-br" dir="ltr">

<head>

<?php require('inc/inc_header.php')?>


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
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item"><a href="<?=$pgbusca?>">Busca</a></li>
                                        <li class="breadcrumb-item active" aria-current="page"><?=$pgatual?></li>
                                    </ol>
                                </nav>                              
                            </div>
                           
                        </div>
						
						
                 <div class="col-lg-12 ">
     <div class="card">
							 
                            <div class="card-header card-header-large bg-white">
                                <h4 class="card-header__title"><?=$pgatual?></h4>
                            </div>
							 
							 
                                <div class="col-lg-12 card-form__body " style="padding-top: 20px;">
                                    <form method="post" action="?val=s" enctype="multipart/form-data">
                                        <div class="was-validated">
                                            <div class="form-row"> 
												
                                               <div class="col-12 col-md-4 mb-3">
                                                    <label for="veiculo_id">Veiculo</label>
                                                 <select id="veiculo_id"  data-toggle="select" class="form-control" name='veiculo_id' required>
											     <option value="" selected="">  </option>
									            <?php 
                                                  $qrye = "SELECT * FROM veiculos order by site, descricao";
                                                  $resultadoe = $conn->prepare($qrye);
                                                  $resultadoe->execute();										
									              while($tabe = $resultadoe->fetch(PDO::FETCH_ASSOC)){	
									            ?>												
                                                    <option value="<?=$tabe['id']?>"><?=$tabe['site']?> - <?=$tabe['descricao']?></option>
                                   
                                                <?php }?>  
                                            
                                                </select>
																										

                                                </div>												
												
                                                <div class="col-12 col-md-5 mb-3">
                                                    <label for="descricao">Descrição</label>
                                                    <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição" required="">

                                                </div>
												
                                                <div class="col-12 col-md-3 mb-3">
                                                    <label for="descricao">Selecione a Imagem</label>
                                                    <input type="file" class="form-control" id="arq" name="arq"  placeholder="Imagem" required/>
													

                                                </div>													
                                            </div>
                                          
                                        </div>
                                        <div class="form-group">

                                        </div>
                                        <button class="btn btn-primary" type="submit">Gravar</button>
                                    </form>
                                </div>


                     

                            <div class="card-body text-right">
                                <a href="javascript: window.history.go(-1)" class="text-muted-light"><i class="material-icons ml-1">arrow_back</i></a>
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