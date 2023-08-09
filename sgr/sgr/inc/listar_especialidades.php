<?php
include_once "config.php";

$pagina = filter_input(INPUT_POST, 'pagina', FILTER_SANITIZE_NUMBER_INT);
$qnt_result_pg = filter_input(INPUT_POST, 'qnt_result_pg', FILTER_SANITIZE_NUMBER_INT);
//calcular o inicio visualização
$inicio = ($pagina * $qnt_result_pg) - $qnt_result_pg;

//consultar no banco de dados
//$result_usuario = "SELECT * FROM especialidades ORDER BY id DESC";
//$resultado_usuario = mysqli_query($conn, $result_usuario);

$$result_usuario = "SELECT * FROM usuarios ORDER BY id DESC LIMIT $inicio, $qnt_result_pg";
$$resultado_usuario = $conn->prepare($$result_usuario);
$$resultado_usuario->execute();


//Verificar se encontrou resultado na tabela "usuarios"
if(($resultado_usuario) AND ($resultado_usuario->num_rows != 0)){
	?>
                                        <table class="table mb-0 thead-border-top-0">
                                            <thead>
                                                <tr>                                                    
                                                    <th style="width: 37px;">id</th>
                                                    <th>Descricao</th>
                                                    <th style="width: 100px;"></th>
                                                </tr>
                                            </thead>
                                            <tbody class="list" id="staff02">
									
			<?php			
			while($row_usuario = $resultado_usuario->fetch(PDO::FETCH_ASSOC)){	
				?>
                                                <tr>

                                                    <td><small><?php echo $row_usuario['id']; ?></small></span></td>
                                                    <td><?php echo $row_usuario['descricao']; ?></td>                                                                                                 
                                                    <td>
														<a href="#" class="text-muted"><i class="material-icons">description</i></a>
														<a href="#" class="text-muted"><i class="material-icons">delete_forever</i></a>
													
													</td>
                                                </tr>
												
				<?php
			}?>												

                                            </tbody>
                                        </table>


<?php
//Paginação - Somar a quantidade de usuários
$result_pg = "SELECT COUNT(id) AS num_result FROM especialidades";
$resultado_pg = mysqli_query($conn, $result_pg);
$row_pg = mysqli_fetch_assoc($resultado_pg);

//Quantidade de pagina
$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

//Limitar os link antes depois
$max_links = 2;

echo "<a href='#' onclick='listar_usuario(1, $qnt_result_pg)'>Primeira</a> ";

for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
	if($pag_ant >= 1){
		echo " <a href='#' onclick='listar_usuario($pag_ant, $qnt_result_pg)'>$pag_ant </a> ";
	}
}

echo " $pagina ";

for ($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++) {
	if($pag_dep <= $quantidade_pg){
		echo " <a href='#' onclick='listar_usuario($pag_dep, $qnt_result_pg)'>$pag_dep</a> ";
	}
}

echo " <a href='#' onclick='listar_usuario($quantidade_pg, $qnt_result_pg)'>Última</a>";
}else{
	echo "<div class='alert alert-danger' role='alert'>Nenhum usuário encontrado!</div>";
}
