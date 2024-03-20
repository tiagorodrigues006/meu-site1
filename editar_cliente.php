<!doctype html>
<html class="fixed">

<head>

	<!-- Basic -->
	<meta charset="UTF-8">

	<title>User Profile | Okler Themes | Porto-Admin</title>
	<meta name="keywords" content="HTML5 Admin Template" />
	<meta name="description" content="Porto Admin - Responsive HTML5 Template">
	<meta name="author" content="okler.net">

	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

	<!-- Web Fonts  -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light"
		rel="stylesheet" type="text/css">

	<!-- Vendor CSS -->
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css" />
	<link rel="stylesheet" href="assets/vendor/magnific-popup/magnific-popup.css" />
	<link rel="stylesheet" href="assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

	<!-- Theme CSS -->
	<link rel="stylesheet" href="assets/stylesheets/theme.css" />

	<!-- Skin CSS -->
	<link rel="stylesheet" href="assets/stylesheets/skins/default.css" />

	<!-- Theme Custom CSS -->
	<link rel="stylesheet" href="assets/stylesheets/theme-custom.css">

	<!-- Head Libs -->
	<script src="assets/vendor/modernizr/modernizr.js"></script>

	<style>
		#forminvisivel {
			display: none;
		}
	</style>

</head>

<body>
	<section class="body">

		<div class="inner-wrapper">
<label for="cliente">Selecionar Cliente:</label>
<select id="cliente" name="cliente">
    <option value="">Selecione um cliente</option>
    <!-- Aqui você pode preencher as opções com os nomes dos clientes disponíveis -->
    <!-- Por exemplo: -->
    <option value="cliente1">Cliente 1</option>
    <option value="cliente2">Cliente 2</option>
    <!-- Adicione mais opções conforme necessário -->
</select>

			<section role="main" class="content-body">
				<header class="page-header">
					<h2>Editar Cliente</h2>

					<div class="right-wrapper pull-right">
						<ol class="breadcrumbs" style="margin-right:30px;">
							<li>
								<a href="index.php">
									<i class="fa fa-home"></i>
								</a>
							</li>
							<li><span>Clientes</span></li>
							<li><span>Editar Cliente</span></li>
						</ol>
					</div>
				</header>

				<!-- start: page -->
				<?php
				if (isset($_GET['id'])) {
					$id = $_GET['id'];
				}
				
				$query = "select * from utilizadores where cod_utilizador='" . $_SESSION['cod_utilizador'] . "'";
				$result = mysqli_query($ligax, $query);
				while ($registo = mysqli_fetch_assoc($result)) {
					$nome = $registo['nome'];
				}


				if (isset($_POST['atualizarcliente'])) {

					


					$nome = $_POST['nome'];
					$morada = $_POST['morada'];
					$nif = $_POST['nif'];
					$email = $_POST['email'];
					$telefone = $_POST['telefone'];
					$creditos_min = $_POST['creditos_min'];
					$contrato = isset($_POST['contrato']) ? $_POST['contrato'] : '';
				
					// Update client information
					$atualizar_cliente = "UPDATE cliente SET nome='$nome',morada='$morada',nif='$nif',telefone='$telefone',email='$email', creditos_min='$creditos_min', contrato='". $contrato."' WHERE id='" . $_GET["id"] . "'";
					$result_cliente = mysqli_query($ligax, $atualizar_cliente);


					$pessoas = $_POST['pessoas'];

					
                    // Process pessoas data
					if(isset($_POST['pessoas']) && !empty($_POST['pessoas'])) {
						// Loop through each pessoa in $_POST['pessoas']
						foreach($_POST['pessoas'] as $pessoa) {
							// Check if $pessoa is not empty before inserting
							if(!empty($pessoa)) {
								// Insert each pessoa into the database
								$inserePessoa = "INSERT INTO pessoas (cliente, nome, ativo) VALUES ('$nome', '$pessoa', 'ativo')";
								mysqli_query($ligax, $inserePessoa);
								// You may want to handle errors or validations here
							}
						}
					}
                   
				
					if ($result_cliente === false) {
						// Handle error
					}
					
					// Update pessoa status
					foreach ($_POST['pessoa_status'] as $pessoa_nome => $status) {
						$update_query = "UPDATE pessoas SET ativo = '$status' WHERE nome = '$pessoa_nome'";
						$update_result = mysqli_query($ligax, $update_query);
				
						if ($update_result === false) {
							// Handle error
						}
					}
				
					// Check if client and associated pessoas updates were successful
					if ($result_cliente && $update_result) {
						?>
						<div class="success">
							<h1>Perfil do Cliente e Pessoas Associadas Atualizado com Sucesso!</h1>
						</div>
						<?php
					} else {
						?>
						<div class="error">
							<p>Ocorreu um erro ao atualizar o perfil do Cliente ou das Pessoas Associadas. Por favor, tente novamente!</p>
						</div>
						<?php
					}
				}

				


				$query = "select * from cliente where id='" . $_GET["id"] . "'";
				$result = mysqli_query($ligax, $query);
				while ($registo = mysqli_fetch_assoc($result)) {
					$nome = $registo['nome'];
					$morada = $registo['morada'];
					$nif = $registo['nif'];
					$telefone = $registo['telefone'];
					$email = $registo['email'];
					$creditos_min = $registo['creditos_min'];
					$saldo = $registo['saldo'];
					$contrato = $registo['contrato'];

				}

				$query_pessoas = "SELECT * FROM pessoas WHERE cliente = '$nome'";
				$result_pessoas = mysqli_query($ligax, $query_pessoas);
				?>


				<div class="row">
					<div class="col-md-4 col-lg-3">


					</div>
					<div class="col-md-8 col-lg-6">

						<div class="tabs">
							<ul class="nav nav-tabs tabs-primary">
								<li class="active">
									<a href="#overview" data-toggle="tab">Editar Perfil</a>
								</li>

							</ul>
							<div class="tab-content">
								<div id="overview" class="tab-pane active">


									<form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">


										<h4 class="mb-xlg">Informação Pessoal</h4>
										<fieldset>
											<div class="form-group">
												<label class="col-md-3 control-label" for="profileFirstName">
													Nome</label>
												<div class="col-md-8">
													<input type="text" class="form-control" id="profileFirstName"
														name="nome" value="<?php echo $nome; ?>">

												</div>
											</div>

											
											<fieldset>
												<legend class="mb-xlg">Pessoas Associadas</legend>
												<?php
												while ($pessoa = mysqli_fetch_assoc($result_pessoas)) {                                                        
													$pessoa_nome = $pessoa['nome'];
													$pessoa_status = $pessoa['ativo'];

													// Display pessoa details
													echo "<div class='form-group' style='width: 100%;'>";
													echo "<label class='col-md-3 control-label'><b>$pessoa_nome</b></label>";
													echo "<div class='col-md-8' style='width: 35%;'>";
													echo "<select class='form-control' name='pessoa_status[$pessoa_nome]' >";
													echo "<option value='ativo' ".($pessoa_status == 'ativo' ? 'selected' : '').">Ativo</option>";
													echo "<option value='inativo' ".($pessoa_status == 'inativo' ? 'selected' : '').">Inativo</option>";
													echo "</select>";
													echo "</div>";
													echo "</div>";
												}
												?>
											</fieldset>
											<div class="form-group" style="margin-top: 10px;">
												<label class="col-md-3 control-label">Pessoas</label>
												<!-- Add array notation for input name -->
												<div class="col-md-8" id="pessoas-container">
													<input name="pessoas[]" type="text" class="form-control"/>
												</div>
											</div>
											<script>
												function addPessoaField() {
													var div = document.createElement('div');
													div.innerHTML = '<input name="pessoas[]" type="text" class="form-control" style="margin-top:10px;"/>';
													document.getElementById('pessoas-container').appendChild(div);
												}
											</script>

											
											<div class="form-group" style="">
												<div class="col-md-8">
													<button type="button" class="btn btn-primary" onclick="addPessoaField()" style="">Add Pessoa</button>
												</div>
											</div>
											
											
											<!-- Add this block of code to handle pessoa activation/deactivation -->
											
											<div class="form-group" style="margin-top:10px;">
												<label for="morada" class="col-md-3 control-label">Morada</label><br>
												<div class="col-md-8">
													
													<textarea id="morada" name="morada" class="form-control" placeholder="Morada" rows="3" cols="50"><?php echo $morada; ?></textarea>
												</div>
											</div>
											<div class="form-group" style="margin-top:10px;">
													<label class="col-md-3 control-label">NIF</label>
													<div class="col-md-8">
														<input name="nif" type="text" class="form-control" value="<?php echo $nif; ?>" />
													</div>
											</div>
											
											<div class="form-group" style="margin-top:10px;">
													<label class="col-md-3 control-label">Telefone</label>
													<div class="col-md-8">
														<input name="telefone" type="text" class="form-control" value="<?php echo $telefone; ?>" />
													</div>
											</div>
											
											<div class="form-group" style="margin-top:10px;">
													<label class="col-md-3 control-label">E-mail</label>
													<div class="col-md-8">
														<input name="email" type="email" class="form-control" value="<?php echo $email; ?>" />
													</div>
											</div>

											<div class="form-group" style="margin-top:10px;">
												<label class="col-md-3 control-label" for="profileAddress">Créditos
													Mínimos</label>
												<div class="col-md-8">
													<input type="text" class="form-control" id="profileAddress"
														name="creditos_min" value="<?php echo $creditos_min; ?>">
												</div>
											</div>


											<div class="form-group">
												<label class="col-md-3 control-label" for="profileAddress">Saldo</label>
												<div class="col-md-8">
													<input readonly type="number" class="form-control" id="profileAddress"
														name="saldo" <?php if ($saldo <= 0) { ?>
															style="color:red; font-weight:bold;" <?php } ?> <?php if ($saldo > 0) { ?> style="color:green; font-weight:bold;" <?php } ?> value="<?php echo $saldo; ?>">
												</div>
											</div>
											<div class="form-group mb-lg">
												<label style="font-size: 20px;">Contrato</label>
												<?php 
												if($contrato == "sim"){
													echo "<input name='contrato' type='checkbox' value='sim' class='' checked/>";
												}
												else{
													echo "<input name='contrato' type='checkbox' value='sim' class=''/>";
												}
												?>
												
											</div>

											<style>
    .button-container {
        text-align: center;
    }
</style>

					

<div class="row">								
    <div class="col-md-9 col-md-offset-3">
        <div class="button-container">
            <!-- Botões -->
            <a href="index.php?pagina=listar_cliente" class="btn btn-primary">Regressar</a>
            <input type="submit" name="atualizarcliente" class="btn btn-primary" value="Atualizar Cliente">
           <a href="index.php?pagina=treinos_registados" class="btn btn-primary">Ir para Cliente </a>




        </div>
    </div>
</div>





</div>

									</form>
									</fieldset>

									<fieldset>
									</fieldset>
									<?php
									?>


								</div>
								<!-- end: page -->
			</section>
		</div>

		<aside id="sidebar-right" class="sidebar-right">
			<div class="nano">
				<div class="nano-content">
					<a href="#" class="mobile-close visible-xs">
						Collapse <i class="fa fa-chevron-right"></i>
					</a>

					<div class="sidebar-right-wrapper">

						<div class="sidebar-widget widget-calendar">
							<h6>Upcoming Tasks</h6>
							<div data-plugin-datepicker data-plugin-skin="dark"></div>

							<ul>
								<li>
									<time datetime="2014-04-19T00:00+00:00">04/19/2014</time>
									<span>Company Meeting</span>
								</li>
							</ul>
						</div>



					</div>
				</div>
			</div>
		</aside>
	</section>

	<script>

		function showDiv() {
			div = document.getElementById('forminvisivel');
			div.style.display = "block";

			div = document.getElementById('addinvisivel');
			div.style.display = "none";
		}

	</script>

	<!-- Vendor -->
	<script src="assets/vendor/jquery/jquery.js"></script>
	<script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
	<script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
	<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script src="assets/vendor/magnific-popup/magnific-popup.js"></script>
	<script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>

	<!-- Specific Page Vendor -->
	<script src="assets/vendor/jquery-autosize/jquery.autosize.js"></script>

	<!-- Theme Base, Components and Settings -->
	<script src="assets/javascripts/theme.js"></script>

	<!-- Theme Custom -->
	<script src="assets/javascripts/theme.custom.js"></script>

	<!-- Theme Initialization Files -->
	<script src="assets/javascripts/theme.init.js"></script>


</body>

</html>