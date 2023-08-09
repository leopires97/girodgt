<?php 
require_once('inc/config.php'); 

 if($_GET['v']=='s'){
	
	
  $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT); 
	
  if(!empty($dados['usuario']) and !empty($dados['password'])){
	  
    $qry = "SELECT * FROM usuarios where login=:login and senha=:senha and nivel=1";
    $resultado = $conn->prepare($qry);
	$resultado->bindParam(':login', $dados['usuario']);  
    $resultado->bindParam(':senha', $dados['password']);  	  
	  
    $resultado->execute();	  
	  
	$total = $total=$resultado->rowCount();
	  
		if($total > 0){
			
			$tab_resultado = $resultado->fetch(PDO::FETCH_ASSOC);
			
			$_SESSION['nome'] = $tab_resultado['nome'];
			$_SESSION['login'] = $tab_resultado['login'];
			$_SESSION['usercod'] = $tab_resultado['id'];
			$_SESSION['nivel'] = $tab_resultado['nivel'];

			
			redir(URL);
		}else{$erro = 1;} 
	  
  }
 }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>

    <!-- Prevent the demo from appearing in search engines -->
    <meta name="robots" content="noindex">

    <!-- Simplebar -->
    <link type="text/css" href="assets/vendor/simplebar.min.css" rel="stylesheet">

    <!-- App CSS -->
    <link type="text/css" href="assets/css/app.css" rel="stylesheet">
    <link type="text/css" href="assets/css/app.rtl.css" rel="stylesheet">

    <!-- Material Design Icons -->
    <link type="text/css" href="assets/css/vendor-material-icons.css" rel="stylesheet">
    <link type="text/css" href="assets/css/vendor-material-icons.rtl.css" rel="stylesheet">

    <!-- Font Awesome FREE Icons -->
    <link type="text/css" href="assets/css/vendor-fontawesome-free.css" rel="stylesheet">
    <link type="text/css" href="assets/css/vendor-fontawesome-free.rtl.css" rel="stylesheet">



</head>

<body class="layout-login">





    <div class="layout-login__overlay"></div>
    <div class="layout-login__form bg-white" data-simplebar>
        <div class="d-flex justify-content-center mt-2 mb-5 navbar-light">
			
            <a href="index.html" class="navbar-brand" style="min-width: 0">
                <img class="navbar-brand-icon" src="assets/images/logo_especifer.png" width="150" alt="Stack">
                
            </a>
        </div>

        <h4 class="m-0">Sistema Gerenciamento</h4>
        <p class="mb-5">Loja Iveco</p>

        <form action="?v=s" novalidate method="post">
            <div class="form-group">
                <label class="text-label" for="email_2">Usuário:</label>
                <div class="input-group input-group-merge">
                    <input id="usuario" name="usuario" type="email" required="" class="form-control form-control-prepended" placeholder="Digite seu usuário ou DN">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="far fa-user"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="text-label" for="password_2">Senha:</label>
                <div class="input-group input-group-merge">
                    <input id="password" name="password" type="password" required="" class="form-control form-control-prepended" placeholder="Digite sua senha">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-key"></span>
                        </div>
                    </div>
                </div>
            </div>
			<?php if($erro==1){?>
                                        <div class="alert alert-danger" role="alert">
                                            <strong>Erro: </strong> Usuário ou senha inválida!
                                        </div>
			<?php }?>
            <div class="form-group text-center">
                <button class="btn btn-primary mb-5" type="submit">Entrar</button><br>
                
            </div>
        </form>
    </div>


    <!-- jQuery -->
    <script src="assets/vendor/jquery.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/vendor/popper.min.js"></script>
    <script src="assets/vendor/bootstrap.min.js"></script>

    <!-- Simplebar -->
    <script src="assets/vendor/simplebar.min.js"></script>

    <!-- DOM Factory -->
    <script src="assets/vendor/dom-factory.js"></script>

    <!-- MDK -->
    <script src="assets/vendor/material-design-kit.js"></script>

    <!-- App -->
    <script src="assets/js/toggle-check-all.js"></script>
    <script src="assets/js/check-selected-row.js"></script>
    <script src="assets/js/dropdown.js"></script>
    <script src="assets/js/sidebar-mini.js"></script>
    <script src="assets/js/app.js"></script>

    <!-- App Settings (safe to remove) -->
    <script src="assets/js/app-settings.js"></script>





</body>

</html>