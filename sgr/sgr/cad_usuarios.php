<?php 

include_once "inc/config.php";
include('inc/start.php');

    $pgatual='Usuarios';
    $pgbusca='usuarios.php';
     
   

 if($_GET['val']=='s'){
	 
  $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
	 
  $qry = "INSERT INTO 
  `usuarios`
(
  `login`,
  `email`,
  `senha`,
  `nome_usuario`,
  `nivel`,
  `ativo`) 
VALUE (
  :login,
  :email,
  :senha,
  :nome_usuario,
  :nivel,
  :ativo)"; 

  $insert_qry = $conn->prepare($qry);
  $insert_qry->bindParam(':login', $dados['login']);
  $insert_qry->bindParam(':email', $dados['email']);
  $insert_qry->bindParam(':senha', $dados['senha']);
  $insert_qry->bindParam(':nome_usuario', $dados['nome_usuario']);
  $insert_qry->bindParam(':nivel', $dados['nivel']);
  $insert_qry->bindParam(':ativo', $dados['ativo']);



if ($insert_qry->execute()) {
	
 	
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
                                    <form method="post" action="?val=s">
                                        <div class="was-validated"> 
											
										
											
                                            <div class="form-row">
												
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label for="nome_usuario">Nome</label>
                                                    <input type="text" class="form-control" id="nome_usuario" name="nome_usuario" placeholder="Nome" required="">

                                                </div>
											
 									<div class="col-12 col-md-3 mb-3" style="float: left">
                                        <label for="nivel">Nivel</label>
                                        <select id="nivel"  class="form-control" name='nivel'>
                                            <option value="2" selected="">Usuario</option>
                                            <option value="1">Administrador</option>
                                            
                                        </select>
									</div>
												
 									<div class="col-12 col-md-3 mb-3" style="float: left">
                                        <label for="ativo">Ativo</label>
                                        <select id="ativo" class="form-control" name='ativo'>
                                            <option value="1" selected="">Sim</option>
                                            <option value="0">Não</option>
                                            
                                        </select>
									</div>										
												
                                            </div>											
											
                                            <div class="form-row">
												
                                                <div class="col-12 col-md-4 mb-3">
                                                    <label for="login">Login </label>
                                                    <input type="text" class="form-control" id="login" name="login" placeholder="login " required="">

                                                </div>
												
                                                <div class="col-12 col-md-4 mb-3">
                                                    <label for="senha">Senha</label>
                                                    <input type="text" class="form-control" id="senha" name="senha" placeholder="Senha" required="">

                                                </div>					
												
                                                <div class="col-12 col-md-4 mb-3">
                                                    <label for="email">Email</label>
                                                    <input type="text" class="form-control" id="email" name="email" placeholder="Email" data-mask-selectonfocus="true">

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