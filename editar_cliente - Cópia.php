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
	if(isset($_GET['id'])){
		$id=$_GET['id'];
		}
	 $query="select * from utilizadores where cod_utilizador='".$_SESSION['cod_utilizador']."'";
		$result=mysqli_query($ligax,$query);
		while($registo=mysqli_fetch_assoc($result)){
			$nome=$registo['nome'];
		}


		if(isset($_POST['atualizar'])){
			$tipo=$_POST['tipo'];
			$marca=$_POST['marca'];
			$numeroserie=$_POST['sn'];
			$modelo=$_POST['modelo'];
			$idequipamento=$_POST['id_equipamento'];
			$status=$_POST['status'];


			$atualizarequipamento="UPDATE equipamentos set marca='".$marca."', tipo='".$tipo."', sn='".$numeroserie."', modelo='".$modelo."', ativo='".$status."' where id_equipamento='".$idequipamento."'  ";
			$atualizarbd=mysqli_query($ligax,$atualizarequipamento);

			$logs="INSERT INTO logs (nome_utilizador,tarefa,data_realizacao) VALUES ('".$nome."',now())"; //, '".$outroacess."'
                        $resulte=mysqli_query($ligax,$logs);
		}

if(isset($_POST['atualizarcliente'])){


	$nome=$_POST['nome'];
	$telefone1=$_POST['telefone1'];
	$telefone2=$_POST['telefone2'];
	$telefone3=$_POST['telefone3'];
	$email=$_POST['email'];
	$localidade=$_POST['localidade'];


		$atualizar="UPDATE cliente set nome='".$nome."',localidade='".$localidade."',telefone1='".$telefone1."',
		telefone2='".$telefone2."',telefone3='".$telefone3."',email='".$email."' where id='".$_GET["id"]."'";

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

if(isset($_POST["adicionarequipamento"])){
													    
			$marca=$_POST['marca'];
			$tipo=$_POST["tipo"];
			$sn=$_POST["sn"];
			$modelo=$_POST["modelo"];
			$id_cliente=$_POST["id_cliente"];
			
			$pesquisa="select * from equipamentos where sn='".$sn."'";
			$result=mysqli_query($ligax,$pesquisa);
			$n=mysqli_num_rows($result);
			if($n==0){

			$insere="INSERT INTO equipamentos
(id_cliente,marca,tipo,sn,modelo)
VALUES ('".$id_cliente ."','".$marca ."', '".$tipo ."', '".$sn ."', '".$modelo ."')";

$result=mysqli_query($ligax,$insere);

 } }
 
 
 if(isset($_GET["apagarequipamento"])){ 
            $idequipamento=$_GET['apagarequipamento'];								    
			$apagar="delete from equipamentos where id_equipamento=$idequipamento";
		//	echo $apagar;
            $result=mysqli_query($ligax,$apagar);
 } 
 
 
 

		$query="select * from cliente where id='".$_GET["id"]."'";
			$result=mysqli_query($ligax,$query);
			while($registo=mysqli_fetch_assoc($result)){
				$nome=$registo['nome'];
				$telefone1=$registo['telefone1'];
				$telefone2=$registo['telefone2'];
				$telefone3=$registo['telefone3'];
				$email=$registo['email'];
				$localidade=$registo['localidade'];
			}
			
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
													<label class="col-md-3 control-label" for="profileFirstName"> Nome</label>
													<div class="col-md-8">
														<input type="text" class="form-control" id="profileFirstName" name="nome" value="<?php echo $nome;?>">
														
													</div>
												</div>
												
											
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileCompany">Email</label>
													<div class="col-md-8">
														<input type="text" class="form-control" id="profileCompany" name="email" value="<?php echo $email;?>">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileAddress">Telemóvel</label>
													<div class="col-md-8">
														<input type="text" class="form-control" id="profileAddress" name="telefone1" value="<?php echo $telefone1;?>">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileAddress">2ºTelemóvel</label>
													<div class="col-md-8">
														<input type="text" class="form-control" id="profileAddress" name="telefone2" value="<?php echo $telefone2;?>">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileAddress">Telemóvel Estrangeiro</label>
													<div class="col-md-8">
														<input type="text" class="form-control" id="profileAddress" name="telefone3" value="<?php echo $telefone3;?>">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileAddress">Localidade</label>
													<div class="col-md-8">
														<input type="text" class="form-control" id="profileAddress" name="localidade" value="<?php echo $localidade;?>">
													</div>
												</div>
												<div class="row">
													<div class="col-md-9 col-md-offset-5">
														<a href="javascript:history.back()"><label class="btn btn-primary">Regressar</label></a>
														<input type="submit" name="atualizarcliente" class="btn btn-primary" value="Atualizar Cliente">
													</div>
												</div>
					</form>
											</fieldset>
											
                                            <h4 class="mb-xlg">Equipamentos associados</h4>
											<?php
											$consulta="select * from equipamentos where id_cliente='".$_GET["id"]."'";
											$result=mysqli_query($ligax,$consulta);
											while($registo=mysqli_fetch_assoc($result)){
												$id_equipamento=$registo['id_equipamento'];
												$sn=$registo['sn'];
												$marca=$registo['marca'];
												$modelo=$registo['modelo'];
												$tipo=$registo['tipo'];
												$ativo=$registo['ativo'];
									


?>
											<fieldset>
											<form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileFirstName"> Tipo</label>
													<div class="col-md-3">
														<select class="form-control input-sm mb-md" name="tipo">
												
                                <?php
								
								$tiposelected1="select * from equipamentos where id_cliente='".$id."' AND id_equipamento='".$id_equipamento."' ";
								$resultconsultatiposelect=mysqli_query($ligax,$tiposelected1);
								$registo = mysqli_fetch_assoc($resultconsultatiposelect);
								$tiposelected=$registo['tipo'];
								$tiposconsulta="select equipamento from tipo_equipamento where id_tipo='".$tiposelected."' ";
								$queryequipamentos=mysqli_query($ligax,$tiposconsulta);
								$registo = mysqli_fetch_assoc($queryequipamentos);
								$tiposelected1=$registo['equipamento'];
								?>
								 <option selected value=" <?php echo $tiposelected; ?> "><?php echo  $tiposelected1; ?></option>
								 <?php
								$consultatipo="select * from tipo_equipamento ";
                                    $resultconsultatipo=mysqli_query($ligax,$consultatipo);

                                    if($resultconsultatipo){

                                    while($registo = mysqli_fetch_assoc($resultconsultatipo)){
                                        $id_tipo=$registo['id_tipo'];
                                        $equipamento=$registo['equipamento'];
                                        ?>
                                        <option value="<?php echo $id_tipo ?>"><?php echo $equipamento ?> </option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
													
													</div>
													<label class="col-md-2 control-label" for="profileCompany">Marca</label>
													<div class="col-md-2">
													
														<select class="textoSelect" name="marca">
												<?php 
												$marcaatual="select * from marca where id_marca='".$marca."' ";
												$resultmarca=mysqli_query($ligax,$marcaatual);
												$registo = mysqli_fetch_assoc($resultmarca);
												$marcaatual=$registo['marca'];
												?>
												<option selected value=" <?php echo $marca; ?>"><?php echo $marcaatual; ?></option>
												
												<?php $consultamarca="select * from marca";
													$resultmarcaconsulta=mysqli_query($ligax,$consultamarca);

													if($resultmarcaconsulta){

													while($registo = mysqli_fetch_assoc($resultmarcaconsulta)){
														$id_marca=$registo['id_marca'];
														$marca2=$registo['marca'];
														?>
														<option value="<?php echo $id_marca; ?>"><?php echo $marca2; ?> </option>
														<?php
													}
												}
												?>
												</select>

													</div>
												</div>
												
											

												<div class="form-group">
												<label class="col-md-3 control-label" for="profileAddress">SN:</label> 
												<div class="col-md-3">
												<input type="text" class="form-control" name="sn" value="<?php echo $sn; ?>"   >
											</div>
											<label class="col-md-2 control-label" for="profileAddress">Modelo:</label> 
												<div class="col-md-3">
												<input type="text" class="form-control" name="modelo" value="<?php echo $modelo; ?>"   >
												</div>

												</div>
			                                    
			                                    <div class="form-group">
												<label class="col-md-3 control-label">Id:</label> 
													<div class="col-md-3">
												<input type="hidden" name="id_equipamento" value="<?php echo $id_equipamento; ?>">
													<label><?php echo $id_equipamento; ?></label>
													</div>
													<label class="col-md-3 control-label" for="profileAddress">Estado:</label> 
													<div class="col-md-3">
													    <?php if($ativo==1){ ?>
												<input type="radio"  name="status" value="1" checked="checked"  >
                                                <label for="status">Ativo</label>
                                                <input type="radio" name="status" value="0">
                                                <label for="status">Inativo</label>
                                                <?php } else { ?>
                                                <input type="radio"  name="status" value="1" >
                                                <label for="status">Ativo</label>
                                                <input type="radio" name="status" value="0" checked="checked">
                                                <label for="status">Inativo</label>
                                                <?php } ?>
													</div>
													</div>
												<div class="row">
												    <div class="col-md-12">
													<div class="col-md-2 col-md-offset-3">
														<input type="submit" name="atualizar" class="btn btn-primary" value="Atualizar Equipamento">
													</div>
												
													<div class="col-md-2 col-md-offset-1">
														<a href="index.php?pagina=listar_reparacoes&idc=<?php echo $id; ?>&ide=<?php echo $id_equipamento; ?>" class="btn btn-primary">Listar Reparação</a>
													</div>
													
														<?php	
												        $reparacoes="select * from reparacao where id_equipamento='".$id_equipamento."' ";
												        //echo $reparacoes;
								                        $resultreparacoes=mysqli_query($ligax,$reparacoes);
								                        $n = mysqli_num_rows($resultreparacoes);
								                        if ($n<1) { ?>
								                            <div class="col-md-2 col-md-offset-1">
								                            
     <a href="index.php?pagina=Editar_Cliente&id=<?php echo $_GET['id'];?>&apagarequipamento=<?php echo $id_equipamento; ?>" onclick="return confirm('Tem a certeza que deseja apagar este equipamento?')">Apagar</a>
		
														    <!--<input type="submit" name="apagarequipamento" class="btn btn-primary" value="Apagar Equipamento">-->
													        </div>
								                        <?php } ?>
												    
													</div>
												</div>
										<hr>
										</form>
											</fieldset>
										<?php
												}
												?>

												<?php 
										
												if(isset($_POST["ativar"])){
												    
												}
												
													
												?>
												<!--- Esse formulario-->

										<div id="forminvisivel">

										<form method="POST" action="#">	
											<input name="id_cliente" type="hidden" class="form-control input-lg" value="<?php echo $id; ?>" />
											<div class="form-group">
														<label class="col-md-3 control-label" for="inputSuccess">Tipo</label>
														<div class="col-md-6">
																	
														<select class="form-control input-sm mb-md" name="tipo">
												<?php $consulta2="select * from tipo_equipamento";
													$result2=mysqli_query($ligax,$consulta2);

													if($result2){

													while($registo = mysqli_fetch_assoc($result2)){
														$id_tipo=$registo['id_tipo'];
														$equipamento=$registo['equipamento'];
														?>
														<option value="<?php echo $id_tipo ?>"><?php echo $equipamento ?> </option>
														<?php
													}
												}
												?>
																	</select>
															</div>
											</div>
											<div class="form-group">
													<label class="col-md-3 control-label" for="inputSuccess">Marca</label>
													<div class="col-md-6">
																	
													<select class="form-control input-sm mb-md" name="marca">
													<?php $consulta1="select * from marca";
													$result1=mysqli_query($ligax,$consulta1);

													if($result1){

													while($registo = mysqli_fetch_assoc($result1)){
														$id_marca=$registo['id_marca'];
														$marca=$registo['marca'];
														?>
														<option value="<?php echo $id_marca ?>"><?php echo $marca ?> </option>
														<?php
														}
														}
														?>
												</select>
													</div>
											</div>
											
	                                       <div class="form-group mb-lg">
												<label>Modelo</label>
												<input name="modelo" type="text" class="form-control input-lg" />
											</div>

											<div class="form-group mb-lg">
												<label>SN</label>
												<input name="sn" type="text" class="form-control input-lg" />
											</div>

										
										
										

												<div class="row">
												<div class="col-md-6 col-md-offset-5">
												<input type="submit" name="adicionarequipamento" class="btn btn-primary" value="Adicionar Equipamento">
											</div>
									</div>
								</form>

						</div>
						<!--- Esse formulario-->
						<br>
											<div class="col-md-9 col-md-offset-5">
												<input type="submit" name="mostrarform" id="addinvisivel" class="btn btn-primary" onclick="javascript:showDiv();" value="Novo Equipamento">
											</div>	

										<br><br>
										
									</div>


								
							</div>
						</div>
					

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