<?php
 	include ("config.php");

$cod_cat = $_GET['cod_cat']; 

$query_evento = "SELECT 
  `events`.`id`,
  `events`.`title`,
  `events`.`color`,
  `events`.`start`,
  `events`.`end`,
  `events`.`paciente_id`,
  `events`.`usuario_id`,
  `events`.`tipo`,
  `events`.`tratamento_id`,
  `events`.`obs`,
  `events`.`procedi`,
  `events`.`status`,
  `usuarios`.`nome`
FROM
  `events`
  INNER JOIN `usuarios` ON (`events`.`usuario_id` = `usuarios`.`id`) where `events`.`id`=".$cod_cat;
$resultado_evento = $conn->prepare($query_evento);
$resultado_evento->execute();

$tab_evento = $resultado_evento->fetch(PDO::FETCH_ASSOC);


if($tab_evento['status']==1){$status2='Compareceu'; $cor='#436EEE';}elseif($tab_evento['status']==2){$status2='Faltou'; $cor='#8B0000';}

if($tab_evento['status']<1){
echo '

                                <input type="hidden" name="id" id="id" value="'.$tab_evento['id'].'">
								<input type="hidden" name="tipo" id="tipo" value="'.$tab_evento['tipo'].'">
								
                                <div class="form-group row">

								
                                <dt class="col-sm-2">Paciente</dt>
                                <dd class="col-sm-9" >'.$tab_evento['title'].'</dd>                                 
                                </div>
								
                                <div class="form-group row">
                                   
                                <dt class="col-sm-2">Profissional</dt>
                                <dd class="col-sm-9" >'.$tab_evento['nome'].'</dd>     									
                                 
                                </div>
								
                                <div class="form-group row">
                                 
                                <dt class="col-sm-2">Tratamento</dt>
                                <dd class="col-sm-9" >'.$tab_evento['procedi'].'</dd>  									
                                 
                                </div>
								
								<div class="form-group row">
								
                                <dt class="col-sm-2">Observacoes</dt>
                                <dd class="col-sm-9" >'.$tab_evento['obs'].'</dd>  	
								
								</div>
                                 
                                </div>								
								
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Início</label>
                                    <div class="col-sm-5">
                                        <input type="text" name="start" class="form-control" id="start" onkeypress="DataHora(event, this)" value="'.$tab_evento['start'].'">
										
										<input type="hidden" id="tratamento_id" name="tratamento_id" value="'.$tab_evento['tratamento_id'].'">
										<input type="hidden" id="paciente_id" name="paciente_id" value="'.$tab_evento['paciente_id'].'">
										
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Final</label>
                                    <div class="col-sm-5">
                                        <input type="text" name="end" class="form-control" id="end"  onkeypress="DataHora(event, this)" value="'.$tab_evento['end'].'">
                                    </div>
                                </div>
								
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Status</label>
                                    <div class="col-sm-5">
                                        <select name="status" class="form-control" id="status">
                                            <option value="">Selecione</option>			
                                            <option value="1">Confirmado</option>
                                            <option value="2">Faltou</option>
                                        </select>
                                    </div>
                                </div>	
<script type="text/javascript">
	$(document).ready(function(){
       $("#CadEvent2").show();
	});
</script>	
											
								';
}else{
	
echo '

                                <input type="hidden" name="id" id="id" value="'.$tab_evento['id'].'">
								
                                <div class="form-group row">

								
                                <dt class="col-sm-2">Paciente</dt>
                                <dd class="col-sm-9" >'.$tab_evento['title'].'</dd>                                 
                                </div>
								
                                <div class="form-group row">
                                   
                                <dt class="col-sm-2">Profissional</dt>
                                <dd class="col-sm-9" >'.$tab_evento['nome'].'</dd>     									
                                 
                                </div>
								
                                <div class="form-group row">
                                 
                                <dt class="col-sm-2">Tratamento</dt>
                                <dd class="col-sm-9" >'.$tab_evento['procedi'].'</dd>  									
                                 
                                </div>
								
                                <div class="form-group row">

                                <dt class="col-sm-2">Início</dt>
                                <dd class="col-sm-9" >'.$tab_evento['start'].'</dd>  										
									
                                </div>
                                <div class="form-group row">
                                <dt class="col-sm-2">Final</dt>
                                <dd class="col-sm-9" >'.$tab_evento['end'].'</dd>  									
									
                                </div>
								
								<div class="form-group row">
								
                                <dt class="col-sm-2">Observacoes</dt>
                                <dd class="col-sm-9" >'.$tab_evento['obs'].'</dd>  	
								
								</div>								
								
                                <div class="form-group row">

                                <dt class="col-sm-2">Status</dt>
                                <dd class="col-sm-9" style="color='.$cor.';">'.$status2.'</dd>  									
									
                                </div>	
								
								

<script type="text/javascript">
	$(document).ready(function(){
       $("#CadEvent2").hide();
	});
</script>	
								
								';	
	
	
}


?>