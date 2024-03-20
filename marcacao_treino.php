

<head>

<style>

	.error {
		color: #a94442; 
		background: #f2dede; 
		border: 1px solid #a94442;
		text-align: center;
		font-size: 12px;
		width: 100%;
		margin: 0 auto;
	}

	.success {
		color: #3c763d; 
		background: #dff0d8; 
		border: 1px solid #3c763d;
		margin-bottom: 20px;
		font-size: 12px;
		text-align: center;
		width: 100%;
		margin: 0 auto;
	}
	.pag{
		font-size: 18px;
		text-align: center;
		width: 100%;
		margin: 0 auto;
	}

	.custom-checkbox {
    display: inline-block;
    width: 16px;
    height: 16px;
    background-color: #fff; /* Adjust the background color as needed */
    border: 1px solid #ccc; /* Adjust the border color as needed */
    vertical-align: middle;
    margin-right: 5px; /* Adjust the spacing between the checkbox and the label as needed */
	}

	/* Style for the custom checkbox when it's checked */
	input[type="checkbox"][disabled]:checked + .custom-checkbox {
		background-color: #007bff; /* Adjust the background color for checked state as needed */
		border-color: #007bff; /* Adjust the border color for checked state as needed */
	}

	

</style>

</head>

<body>

<?php
$contrato= "";
$saldo = "";
if(isset($_POST['show']))
{
    $query = "SELECT id, nome, creditos_min, saldo, contrato FROM cliente WHERE nome='".$_POST['nomec']."'";
    $statement = $ligax->prepare($query);
    $statement->execute();
    $statement->bind_result($id,$nomecliente,$creditos_min,$saldo, $contrato);

    if($statement->fetch()) {
        $existe = true;
    
    }
    else {
        //echo "Erro: ('. $mysqli->errno .') '. $mysqli->error";
    }
    $statement->close();

	$nome_cliente = $_POST['nomec'];
}



/*Se o utilizador clicou no botão registar vamos receber os dados do formulário */
if(isset($_POST["registar"])){




$flag_email=false;
$id = "";
$nome=$_POST['nomec'];
$saldo=$_POST['saldo'];
$creditos_min =$_POST['creditos_min'];
$tipotreino=$_POST['tipotreino'];
$remoto=$_POST['remoto'];
$data_inicio = $_POST['data_inicio'];
$data_fim = $_POST['data_fim'];
$creditos_gastos = $_POST['creditos_gastos'];



date_default_timezone_set('Europe/London');

if(!isset($_POST['datahota'])) {
	$datahora = date("Y-m-d H:i:s");
}

//$valortreino = 25;

$consultaequipamento="select * from cliente where nome='".$nome."'";
$resultconsultaequipamento=mysqli_query($ligax,$consultaequipamento);
$registo = mysqli_fetch_assoc($resultconsultaequipamento);



$novosaldo = intval($saldo) - intval($creditos_gastos);




?>

<!-- start: page -->
<section class="body-sign">
	<div class="center-sign">
		<a href="index.php?pagina=home" class="logo pull-left">
			<img src="mixtura.png" height="54" alt="Porto Admin" style="width: 250px;"/>
		</a>

		<div class="panel panel-sign">
			<div class="panel-title-sign mt-xl text-right">
				<h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Registar</h2>
			</div>
			<div class="panel-body">
				<form method="POST" action="#">

				<?php  
				
					if($flag_email==true){
				
				?>

					<div class="form-group mb-lg">
						<label>Nome</label>
						<input name="name" type="text" class="form-control input-lg" />
					</div>

					<div class="form-group mb-lg">
						<label>Créditos Mínimos</label>
						<input name="creditos_min" type="text" class="form-control input-lg" placeholder="Esse email já existe" />
					</div>

				  
					

					
				</form>
			</div>
		</div>
	</div>
 </section>



			
 
				<?php }else {
					

				// Caso não hajam erros - os dados vão ser enviados para a BD;
				//Código SQL para inserir 1 registo na tabela cliente
				
				if($_POST["saldo"] == ""){
					echo '<script>alert("ATENÇÃO!!! O campo saldo tem de estar preenchido com o saldo do cliente!!!")</script>';
					?> <script> window.location.href="index.php?pagina=marcacao_treino"; </script> <?php 
				}

				else {

					
				
					$insere = "INSERT INTO treinos
					(cliente, pessoa, tipo_intervencao,remoto, data_inicio, data_fim, tempo,descricao, creditos_gastos, faturar, faturado, tecnico)
					VALUES ('".$nome."','".$_POST['pessoa_nome']."','".$tipotreino	."','".$_POST['remoto']."','".$data_inicio."','".$data_fim."','".$_POST['tempo']."','".$_POST['descricao']."','".$_POST['creditos_gastos']."','". $_POST['faturar_checkbox'] ."','". $_POST['faturado_checkbox']."','". $_SESSION["nome"] ."')";
		 
				$result=mysqli_query($ligax,$insere);
				//Se $result for 1, então o registo foi inserido com sucesso
				if($result==1){ 
					
					
						$id=mysqli_insert_id($ligax);
						//header("Location: index.php?pagina=Editar_Cliente&id='".$id."'");
						//include ("index.php?pagina=editar_cliente&id='".$id."'");

						$query = "UPDATE cliente SET saldo='".$novosaldo."' WHERE nome='".$_POST['nomec']."'";
						$st = $ligax->prepare($query);

						if ($st->execute() && $st->affected_rows>0){ 

						}
						
				
				?>

				 
					<script> window.location.href="index.php?pagina=editar_marcacao&id=<?php echo $id; ?>"; </script>
				

				<?php } else { ?>

					<div class="error">
						<h1>Erro ao criar a conta!</h1>
					</div>
						
				<?php }
				}
				} } else{ ?>

<section class="body-sign" style="margin-top:20px;">

		<div class="center-sign">
			<a href="index.php?pagina=home" class="logo pull-left">
				<img src="mixtura.png" height="0" alt="Mixtura Logo" />
			</a>

			<div class="panel panel-sign">
				<div class="panel-title-sign mt-xl text-right">
					<h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i>Resgistar Intervenção</h2>
				</div>
				<div class="panel-body">

						<form method="POST" action="#">

						    
						
						<div class="form-group mb-lg">
                            <label>Cliente</label>
                            <form method="POST" enctype="multipart/form-data">
                            <select name="nomec" id="nomec" style="width: 100%; margin-top: 0;">




                                <?php 


                                    $estados="Select * from  cliente order by nome";
                                    $pesquisaestados=mysqli_query($ligax,$estados);
                                    //$idestado=$registo['id_estado'];
                                    ?>
                                        <?php
                                    while($registo=mysqli_fetch_assoc($pesquisaestados)){
                                        $idcliente=$registo['id'];
                                        $nome=$registo['nome'];
                                        if($idcliente==$id){
                                        ?>
                                        <option selected value="<?php echo $nome; ?>"><?php echo $nome; ?></option>
                                        <?php
											$existe = true;
                                        } else {
                                        ?>
                                        <option value="<?php echo $nome; ?>"><?php echo $nome; ?></option>
                                        <?php
											$existe = true;
                                        }
                                    }



									
                                ?>

                            </select>

                    </div>

					<div class="row">
                            <div class="col-sm-12 mb-lg">
                                <input name="show" value="Pesquisar" type="submit" class="btn btn-primary hidden-xs" style="width: 100%;">
                            </div>
                    </div>
						
					<div class="form-group mb-lg">
						<label for="pessoas">Pessoa:</label>
						
						<select name="pessoa_nome" id="pessoas" class="form-control">
							<?php

							$query_pessoas = "SELECT nome FROM pessoas WHERE cliente = '". $_POST['nomec']. "' AND ativo = 'ativo' ORDER BY nome ASC";
							$result_pessoas = mysqli_query($ligax, $query_pessoas);
							// Check if query returned any result
							if ($result_pessoas && mysqli_num_rows($result_pessoas) > 0) {
								// Iterate over the result set
								while ($pessoa = mysqli_fetch_assoc($result_pessoas)) {
									$pessoa_nome = $pessoa['nome'];
									// Output an <option> element for each pessoa
									echo "<option value='$pessoa_nome'>$pessoa_nome</option>";
								}
							} else {
								// If no pessoas found
								echo "<option value='' disabled>Não foram encontradas pessoas</option>";
							}
							?>
						</select>
					</div>

                    <div class="form-group mb-lg">
						<label>Saldo Cliente</label>
						<input name="saldo" id="saldo" type="number" class="form-control input-lg" <?php if ($saldo<=0) { ?> style="color:red; font-weight:bold;" <?php } ?> <?php if ($saldo>0) { ?> style="color:green; font-weight:bold;" <?php } ?> value="<?php echo ($existe ? $saldo : ''); ?>" readonly/>
                    </div>
					<input type='hidden' id='creditos_min' value="<?php echo"$creditos_min";?>">
					
					<div class="form-group mb-lg">
						<label><b>Tipo</b></label>
						<select name="remoto" id="remoto" >
							<option name='remoto' selected value='Remoto'>Remoto</option>
							<option name='remoto' value='Presencial'>Presencial</option>
							<option name='remoto' value='Telefonica'>Telefónica</option>							
						</select>
					</div>

					<div class="form-group mb-lg">
                            <label>Tipo de Intervenção</label>
                            <form method="POST" enctype="multipart/form-data">
                            <select name="tipotreino" id="tipotreino" style="width: 100%; margin-top: 0;">


                                
                                <?php 


                                    $estados="Select * from  tipostreino ORDER BY tipo_treino ASC";
                                    $pesquisaestados=mysqli_query($ligax,$estados);
                                    //$idestado=$registo['id_estado'];
                                    ?>
                                        <?php
                                    while($registo=mysqli_fetch_assoc($pesquisaestados)){
                                        $idtreino=$registo['id'];
                                        $tipotreino=$registo['tipo_treino'];
                                        if($idtreino==$id){
                                        ?>
                                        <option name="tipotreino" selected value="<?php echo $tipotreino; ?>"><?php echo $tipotreino; ?></option>
                                        <?php
											$existe = true;
                                        } else {
                                        ?>
                                        <option name="tipotreino" value="<?php echo $tipotreino; ?>"><?php echo $tipotreino; ?></option>
                                        <?php
											$existe = true;
                                        }
                                    }




                                ?>

                            </select>

                    </div>
					
					<div class="form-group mb-lg">
						<label>Descrição</label>
						<textarea id="descricao" name="descricao" class="form-control" placeholder="Descrição" rows="3" cols="50"></textarea>
					</div>
								

					<div class="form-group mb-lg">
						<label>Data de Início</label>
						<input name="data_inicio" id="data_inicio" type="datetime-local" class="form-control input-lg" value="" onchange="calculateCredits()" />
					</div>

					<div class="form-group mb-lg">
						<label>Data de Fim</label>
						<input name="data_fim" id="data_fim" type="datetime-local" class="form-control input-lg" value="" onchange="calculateCredits()" />
					</div>

					<div class="form-group mb-lg">
						<label>Tempo (Minutos)</label>
						<input name="tempo" id="tempo" type="text" class="form-control input-lg" value="" readonly/>
					</div>

					<div class="form-group mb-lg">
						<label>Créditos Gastos</label>
						<input name="creditos_gastos" id="creditos_gastos" type="text" class="form-control input-lg" value="" />
					</div>

					<script>
						// Function to set default values to current date and time
						function setDefaultDateTime() {
							var now = new Date();
							var year = now.getFullYear();
							var month = ('0' + (now.getMonth() + 1)).slice(-2);
							var day = ('0' + now.getDate()).slice(-2);
							var hours = ('0' + now.getHours()).slice(-2);
							var minutes = ('0' + now.getMinutes()).slice(-2);
							
							var currentDate = year + '-' + month + '-' + day + 'T' + hours + ':' + minutes;
							
							document.getElementById("data_inicio").value = currentDate;
							document.getElementById("data_fim").value = currentDate;
						}

						// Call the function to set default values when the page loads
						window.onload = setDefaultDateTime;

						function calculateCredits(creditos_min) {
							var startTime = new Date(document.getElementById("data_inicio").value);
							var endTime = new Date(document.getElementById("data_fim").value);

							var creditos_min = document.getElementById("creditos_min").value;

							
							// Calculate the duration in milliseconds
							var durationMs = endTime - startTime;

							// Convert milliseconds to minutes
							var durationMinutes = durationMs / (1000 * 60);

							if(durationMinutes < 0){
								alert("Data final antes da data inicial");
								return;
							}
							// Calculate credits (1 credit = 15 minutes)
							var credits = Math.ceil(durationMinutes / 15); // Round up to the nearest whole number of credits

							// Update the "Créditos Gastos" field
							if(credits > creditos_min){
								document.getElementById("creditos_gastos").value = credits;
							}
							
							else{
								document.getElementById("creditos_gastos").value = creditos_min;
							}

							document.getElementById("tempo").value = durationMinutes;
						}
					</script>
					
					<div class="form-group mb-lg">
						
							<?php if($contrato == "sim"){
								echo"<label style='width:32%;'><input type='checkbox' name='contrato_checkbox' id='contrato_checkbox' value='sim' checked onclick='return false;'>Contrato</label>";
							}
							else{
								echo"<label style='width:32%;'><input type='checkbox' name='contrato_checkbox' id='contrato_checkbox' value='sim' onclick='return false;'> Contrato</label>";
							}
								
							?>						
							<label style="width:32%;"><input type="checkbox" name="faturar_checkbox" id="faturar_checkbox" value="sim"> Faturar</label>
							<label style="width:32%;"><input type="checkbox" name="faturado_checkbox" id="faturado_checkbox" value="sim"> Faturado</label>
						
					</div>
					

					

					
					<div class="form-group mb-lg">
						<label>Tecnico</label>
						<input name="tecnico" type="text" class="form-control input-lg" value="<?php echo $_SESSION["nome"]; ?>" readonly/>
					</div>


						<div class="row">
							<div class="col-sm-12 mb-lg">
								<input name="registar" value="Registar" type="submit" class="btn btn-primary hidden-xs" style="width: 100%;"></input>
							</div>
						</div>
					</form>

				</div>
			</div>

	</div>

	<?php } ?>

</section>

</body>
