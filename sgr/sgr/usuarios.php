<?php 

include_once "inc/config.php";
include('inc/start.php');

    $pgatual='Usuarios';
    $pg='usuarios.php';
    


    if(!empty($_GET['del'])){
		
$id = filter_input(INPUT_GET, 'del', FILTER_SANITIZE_NUMBER_INT);
		


if (!empty($id)) {
    $qrydel = "DELETE FROM usuarios WHERE id=:id";
    $delete = $conn->prepare($qrydel);
    
    $delete->bindParam("id", $id);
    
    if($delete->execute()){
        header("Location: ".$pg);
    }else{
      alerta('Erro ao tentar excluir!');
       header("Location: ".$pg);
    }
} else {
    alerta('Erro ao tentar excluir!');
   header("Location: ".$pg);
}
		
	
	}
     
    //verifica a página atual caso seja informada na URL, senão atribui como 1ª página 
    $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1; 
 
    //seleciona todos os itens da tabela    
    $qry = "SELECT 
  `usuarios`.`id`,
  `usuarios`.`login`,
  `usuarios`.`email`,
  `usuarios`.`nome_usuario`
FROM
  `usuarios`
   order by id DESC ";
    $resultado = $conn->prepare($qry);
    $resultado->execute();


    //conta o total de itens 
    $total = $total=$resultado->rowCount();
 
    //seta a quantidade de itens por página, neste caso, 2 itens 
    $registros = 50;  
    //calcula o número de páginas arredondando o resultado para cima 
    $numPaginas = ceil($total/$registros); 
 
    //variavel para calcular o início da visualização com base na página atual 
    $inicio = ($registros*$pagina)-$registros; 
 
    //seleciona os itens por página 
   $qry = "SELECT 
  `usuarios`.`id`,
  `usuarios`.`login`,
  `usuarios`.`senha`,
  `usuarios`.`nome_usuario`,
  `usuarios`.`email`
FROM
  `usuarios`
 Order by nome_usuario LIMIT $inicio,$registros";
   $resultado = $conn->prepare($qry);
   $resultado->execute();
 
    //conta o total de itens 
    $total = $total=$resultado->rowCount();

   
 


?>
<!DOCTYPE html>
<html lang="pt-br" dir="ltr">

<head>

<?php require('inc/inc_header.php')?>

<script type="text/javascript">
	function confirma(x){
		if(confirm("Confirma a exclusao do registro: "+x+" ?")){
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

                                <h1 class="m-0"><?=$pgatual?></h1>
                            </div>
                            <a href="cad_usuarios.php" class="btn btn-success ml-3">Novo</a>
                        </div>
						
                 <div class="col-lg-12 ">
	 <div class="card">
			 
                            <div class="card-header card-header-large ">
                                <h4 class="card-header__title"><?=$pgatual?> <small>cadastrados</small></h4>
                            </div>

                                    <div class="table-responsive border-bottom" data-toggle="lists" data-lists-values='["js-lists-values-employee-name"]'>

                                        <div class="search-form search-form--light m-3 bg-light-gray">
                                            <input type="text" class="form-control search" placeholder="Procurar na Página">
                                            <button class="btn" type="button" role="button"><i class="material-icons">search</i></button>
                                        </div>

                                        <table class="table mb-0 thead-border-top-0">
                                            <thead>
                                                <tr>                                                    
                                                    <th style="width: 37px;">id</th>
                                                    <th>Nome</th>
													<th>Login</th>
													<th >Email</th>
													
                                                    <th style="width: 115px;"></th>
                                                </tr>
                                            </thead>
                                            <tbody class="list" id="staff02">
									
			                                <?php
	                                          $i=0;
			                                  while($tab = $resultado->fetch(PDO::FETCH_ASSOC)){
												  
												  if($i==0){$sel='class="selected"'; $i++;}else{$sel=''; $i=0;}
				                            ?>
												
                                                <tr <?=$sel?>>

                                                    <td><small><?php echo $tab['id']; ?></small></span></td>
                                                    <td><span class="js-lists-values-employee-name"><?php echo $tab['nome_usuario']; ?></span></td>  
										            <td><?php echo $tab['login']; ?></td>
					                                <td><?php echo $tab['email']; ?></td>
										            
                                                    <td>
														<a href="ed_usuarios.php?id=<?=$tab['id']?>" class="text-muted"><i class="material-icons" >description</i></a>
<!--														<a href="?email=<?=$tab['login']?>&pw=<?=$tab['senha']?>&nome=<?=$tab['nome_usuario']?>" class="text-muted"><i class="material-icons" >mail</i></a>-->
														<a href="?del=<?=$tab['id']?>" class="text-muted" onclick="return confirma('<?=$tab['id']?>')"><i class="material-icons">delete_forever</i></a>
													
													</td>
                                                </tr>
												
				                            <?php	 }?>												

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