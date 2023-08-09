<?php 

include_once "inc/config.php";
include('inc/start.php');

    $pgatual='Familias';
    $pgbusca='familias.php';
     
   

 if($_GET['val']=='s'){
	 
  $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
	 
  $qry = "UPDATE familias SET descricao=:descricao, veiculo_id=:veiculo_id where id=:id"; 

  $insert_qry = $conn->prepare($qry);
  $insert_qry->bindParam(':descricao', $dados['descricao']);
	 $insert_qry->bindParam(':veiculo_id', $dados['veiculo_id']);
  $insert_qry->bindParam(':id', $dados['id']);


if ($insert_qry->execute()) {

	
   $file = $_FILES["arq"]; 
	
if(!empty($file) and is_file($file['tmp_name'])){
	
	
	$dir = '../images/familia/'; 
	

	
   //$extensao = pathinfo($file["name"], PATHINFO_EXTENSION);	
   unlink($dir.$dados['id'].".jpg");
	
   if (!move_uploaded_file($file["tmp_name"], $dir.$dados['id'].".jpg")) { 
       alerta("Erro, o arquivo nao pode ser enviado.");
    } 

}   	
	
   redir($pgbusca);
} else {
    alerta('Erro ao gravar, tente novamente!');
	redir($pgbusca);
}
 
 }
if($_GET['val']==''){
    $qry = "SELECT * FROM familias where id=".$_GET['id'];
    $resultado = $conn->prepare($qry);
    $resultado->execute();

    $tab = $resultado->fetch(PDO::FETCH_ASSOC);
 
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
												
 									            <div class="col-12 col-md-4 mb-3" style="float: left">
                                                 <label for="veiculo_id">Veiculo</label>
                                                 <select id="veiculo_id" data-toggle="select" class="form-control" name='veiculo_id'>
											     <option value="" selected=""> </option>
									            <?php 
                                                  $qrye = "SELECT * FROM veiculos order by site, descricao";
                                                  $resultado = $conn->prepare($qrye);
                                                  $resultado->execute();										
									              while($tab2 = $resultado->fetch(PDO::FETCH_ASSOC)){	
									            ?>												
                                                    <option value="<?=$tab2['id']?>" <?php if($tab['veiculo_id']==$tab2['id']){?>selected=""<?php }?>><?=$tab2['site']?> - <?=$tab2['descricao']?></option>
                                   
                                                <?php }?>  
                                            
                                                </select>
									           </div>												
												
                                                <div class="col-12 col-md-5 mb-3">
                                                    <label for="validationSample02">Descrição</label>
                                                    <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição" required="" value="<?=$tab['descricao']?>">
													
													<input type="hidden" id="id" name="id" value="<?=$tab['id']?>">


                                                </div>
												
                                                <div class="col-12 col-md-3 mb-3">
                                                    <label for="descricao">Selecione a Imagem</label>
                                                    <input type="file" class="form-control" id="arq" name="arq"  placeholder="Imagem" />
													

                                                </div>	
												
												
                                            </div>
											
                                            <div class="form-row">
												
                                                <div class="col-12 col-md-6 mb-3">



                                                </div>
												
                                                <div class="col-12 col-md-6 mb-3" style="text-align: right !important">
                                                  <label for="descricao">Imagem Atual</label><br>

                                                 <img src="../images/familia/<?=$_GET['id'].".jpg"?>" alt="<?=$tab['descricao']?>" width="150">
													

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