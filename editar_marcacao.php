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
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

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

			#forminvisivel{
				display: none;
			}

		</style>

	</head>
	<body>
		<section class="body">

			<div class="inner-wrapper">


				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Editar Marcação</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs" style="margin-right:30px;">
								<li>
									<a href="index.php">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Intervenções</span></li>
								<li><span>Editar Intervenção</span></li>
							</ol>
						</div>
					</header>

					<!-- start: page -->
                    <?php
					
	
	if(isset($_GET['id'])){
		$id=$_GET['id'];
		}

		
	 $query="select * from utilizadores where cod_utilizador='".$_SESSION['cod_utilizador']."'";
		$result=mysqli_query($ligax,$query);
		while($registo=mysqli_fetch_assoc($result)){
			$nome=$registo['nome'];
		}


if(isset($_POST['atualizarcliente'])){


	$nome=$_POST['nome'];
	$pessoa=$_POST['pessoa'];
	$tipotreino=$_POST['tipotreino'];
	$data_inicio=$_POST['data_inicio'];
	$data_fim=$_POST['data_fim'];
	$descricao=$_POST['descricao'];
	$creditos_gastos=$_POST['creditos_gastos'];
	$faturar = isset($_POST['faturar_checkbox']) ? $_POST['faturar_checkbox'] : '';
    $faturado = isset($_POST['faturado_checkbox']) ? $_POST['faturado_checkbox'] : '';
	
	


		$atualizar="UPDATE treinos set cliente='".$nome."',pessoa='".$pessoa."',tipo_intervencao='".$tipotreino."',remoto='".$_POST['remoto']."',data_inicio='".$data_inicio."',data_fim='".$data_fim."',descricao='".$descricao."',creditos_gastos='".$creditos_gastos."',faturar='".$faturar."',faturado='".$faturado."' where id='".$_GET["id"]."'";



		$result=mysqli_query($ligax,$atualizar);

		if($result==1){
		

		?>
			<div class="success">
				<h1>Perfil Atualizado com Sucesso!</h1>
			</div>
		<?php
		} else {
			?>
				<div class="error">
					<p>Dados não inseridos! Tente novamente!</p>
				</div>
			<?php
		}


}

		$query="select * from treinos where id='".$_GET["id"]."'";
			$result=mysqli_query($ligax,$query);
			while($registo=mysqli_fetch_assoc($result)){
				
				$nome=$registo['cliente'];
				$pessoa=$registo['pessoa'];
				$tipo_intervencao=$registo['tipo_intervencao'];
				$remoto=$registo['remoto'];
				$data_inicio=$registo['data_inicio'];
				$data_fim=$registo['data_fim'];
				$tempo=$registo['tempo'];
				$descricao=$registo['descricao'];
				$creditos_gastos=$registo['creditos_gastos'];
				$faturar=$registo['faturar'];
				$faturado=$registo['faturado'];
				$tecnico=$registo['tecnico'];
			}

			$query="select saldo, contrato, creditos_min from cliente where nome='$nome'";
			$result=mysqli_query($ligax,$query);
			while($registo=mysqli_fetch_assoc($result)){
				
				$saldo=$registo['saldo'];
				$contrato=$registo['contrato'];
				$creditos_min=$registo['creditos_min'];
			}

		




			
	?>


					<div class="row">
						<div class="col-md-4 col-lg-3">


						</div>
						<div class="col-md-8 col-lg-6">

							<div class="tabs">
								<ul class="nav nav-tabs tabs-primary">
									<li class="active">
										<a href="#overview" data-toggle="tab">Editar Intervenção</a>
									</li>
								
								</ul>
								<div class="tab-content">
									<div id="overview" class="tab-pane active">
										

                                    <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
										
									
											<h4 class="mb-xlg">Informação acerca da Intervenção</h4>
											<fieldset>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileFirstName"> Cliente</label>
													<div class="col-md-8">
														<input type="text" class="form-control" id="profileFirstName" name="nome" value="<?php echo $nome;?>">
														
													</div>
												</div>
											
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileAddress">Pessoa</label>
													<div class="col-md-8">
														<input type="text" class="form-control" id="profileAddress" name="pessoa" value="<?php echo $pessoa;?>" readonly>
													</div>
												</div>
												<div class="form-group">
														<label class="col-md-3 control-label" style="width: 25%;">Tipo</label>
														<form method="POST" enctype="multipart/form-data">
														<div class="col-md-8" style="width: 60%;">
														<select name="remoto" id="remoto" >
													
															<?php 
																if($remoto == "Remoto"){
																	echo "<option name='remoto' selected value='Remoto'>Remoto</option>
																		  <option name='remoto' value='Presencial'>Presencial</option>
																		  <option name='remoto' value='Telefonica'>Telefonica</option>";
																}
																else if($remoto == "Presencial"){
																	echo "<option name='remoto' selected value='Presencial'>Presencial</option>
																		  <option name='remoto' value='Remoto'>Remoto</option>
																		  <option name='remoto' value='Telefonica'>Telefonica</option>";
																}
																else if($remoto == "Telefonica"){
																	echo "<option name='remoto' selected value='Telefonica'>Telefonica</option>
																		  <option name='remoto' value='Remoto'>Remoto</option>
																		  <option name='remoto' value='Presencial'>Presencial</option>";
																}
																else{
																	echo "<option name='remoto' value='Presencial'>Presencial</option>
																		  <option name='remoto' selected value='Remoto'>Remoto</option>
																		  <option name='remoto' value='Telefonica'>Telefonica</option>";
																}

															?>

														</select>
														</div>

												</div>

												<div class="form-group">
														<label class="col-md-3 control-label">Tipo de Intervenção</label>
														<form method="POST" enctype="multipart/form-data">
														<div class="col-md-8">
														<select name="tipotreino" id="tipotreino" >
															

															
														<?php 


															$estados="Select * from  tipostreino ORDER BY tipo_treino ASC";
															$pesquisaestados=mysqli_query($ligax,$estados);
															//$idestado=$registo['id_estado'];
															?>
																<?php
															while($registo=mysqli_fetch_assoc($pesquisaestados)){
																$idtreino=$registo['id'];
																$tipotreino=$registo['tipo_treino'];
																if($tipotreino==$tipo_intervencao){
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

												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="descricao">Descricao</label>
													<div class="col-md-8">
													<textarea id="descricao" name="descricao" id="descricao" class="form-control" placeholder="Descrição" rows="5" cols="50"><?php echo $descricao;?></textarea>
													</div>
												</div>
												<input type="hidden" id="creditos_min" value="<?php echo"$creditos_min";?>">
												<div class="form-group">
													<label class="col-md-3 control-label" for="data_inicio">Data de Início</label>
													<div class="col-md-8">
														<input type="datetime-local" class="form-control" id="data_inicio" name="data_inicio" value="<?php echo $data_inicio;?>" onchange="calculateCredits()">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="data_fim">Data de Fim</label>
													<div class="col-md-8">
														<input type="datetime-local" class="form-control" id="data_fim" name="data_fim" value="<?php echo $data_fim;?>" onchange="calculateCredits()">
													</div>
												</div>
												<script>
													
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
												<div class="form-group">
													<label class="col-md-3 control-label" for="tempo">Tempo (Minutos)</label>
													<div class="col-md-8">
														<input type="text" class="form-control" id="tempo" name="tempo" value="<?php echo $tempo;?>" readonly>
													</div>
												</div>
												
												<div class="form-group">
													<label class="col-md-3 control-label" for="creditos_gastos">Créditos Gastos</label>
													<div class="col-md-8">
														<input type="text" class="form-control" id="creditos_gastos" name="creditos_gastos" value="<?php echo $creditos_gastos;?>">
													</div>
												</div>

												<div class="form-group mb-lg" style="width: 90%; float: right;">
														<?php if($contrato == "sim"){
																echo"<label style='width:32%;'><input type='checkbox' name='contrato_checkbox' id='contrato_checkbox' value='sim' checked onclick='return false;'>Contrato</label>";
															}
															else{
																$contrato="";
																echo"<label style='width:32%;'><input type='checkbox' name='contrato_checkbox' id='contrato_checkbox' value='sim' onclick='return false;'> Contrato</label>";
															}
														?>
													
														<?php
															if($faturar == "sim"){
																echo "<label style='width:32%;'><input type='checkbox' name='faturar_checkbox' id='faturar_checkbox' value='sim' checked> Faturar</label>";
															}
															else{
																$_POST['faturar_checkbox'] = "";
																echo "<label style='width:32%;'><input type='checkbox' name='faturar_checkbox' id='faturar_checkbox' value='sim'> Faturar</label>";
															}
														?>											
													

												
														<?php
															if($faturado == "sim"){
																echo "<label style='width:32%;'><input type='checkbox' name='faturado_checkbox' id='faturado_checkbox' value='sim' checked> Faturado</label>";
															}
															else{
																$_POST['faturado_checkbox'] = "";
																echo "<label style='width:32%;'><input type='checkbox' name='faturado_checkbox' id='faturado_checkbox' value='sim'> Faturado</label>";
															}
														?>
													
												</div>

												
												


												<div class="form-group">
													
													<label class="col-md-3 control-label" for="profileAddress">Saldo</label>
													<div class="col-md-8">
														<input readonly type="number" class="form-control" id="profileAddress" name="quantia" <?php if ($saldo<=0) { ?> style="color:red; font-weight:bold;" <?php } ?> <?php if ($saldo>0) { ?> style="color:green; font-weight:bold;" <?php } ?>  value="<?php echo $saldo;?>">
													</div>
												</div>

												


												<div class="row">
													<div class="col-md-9 col-md-offset-5">
														<a href="index.php?pagina=treinos_registados"><label class="btn btn-primary">Regressar</label></a>
														<input type="submit" name="atualizarcliente" class="btn btn-primary" value="Atualizar Informação">
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
								<div data-plugin-datepicker data-plugin-skin="dark" ></div>
			
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