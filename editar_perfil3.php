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

	</head>
	<body>
		<section class="body">

			<div class="inner-wrapper">


				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Perfil</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.php">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Perfil</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
                    <?php 

if(isset($_POST['atualizar'])){
	$flag=false;
	$flag_email=false;
	$flag_pass=false;

	$nome=$_POST['nome'];
	$telemovel=$_POST['telemovel'];
	$email=$_POST['email'];
	$pass=$_POST['pass'];

	$pass=md5($pass);

		/* confirmar palavra passe */
		$query="select password from utilizadores where cod_utilizador='".$_SESSION["cod_utilizador"]."'";
		$result=mysqli_query($ligax,$query);
		while($registo=mysqli_fetch_assoc($result)){
			$passwordBD=$registo['password'];
			if(($passwordBD!=$pass)){
				$flag=true;
				$flag_pass=true;
			}		
		}
		
	/* Verificar se o email já existe */
	$query="select email,cod_utilizador from utilizadores ";
	$result=mysqli_query($ligax,$query);
	while($registo=mysqli_fetch_assoc($result)){
		$emailBD=$registo['email'];
		$cod_utilizadorBD=$registo['cod_utilizador'];
		if(($emailBD==$email) && ($cod_utilizadorBD!=$_SESSION["cod_utilizador"])){
			$flag=true;
			$flag_email=true;
			}		
		}
	if($flag==true){ 
	

		if($flag_pass==true) {?>
				<div class="error">
					<h1>Erro na Pass!!!</h1>
				</div>
			<?php } 
		if($flag_email==true) {?>
			<div class="px960">
				<div class="coluna">
					<div class="error">
						<h1>Erro no Email!!!</h1>
					</div>
				</div>
			</div>
			<?php }
	
	} else {  
		$atualizar="UPDATE utilizadores set nome='".$nome."',telemovel='".$telemovel."',email='".$email."' where cod_utilizador='".$_SESSION["cod_utilizador"]."'";
		$result=mysqli_query($ligax,$atualizar);
		if($result==1){
			if($_FILES['foto']['error']==0){
			$file_name=$_FILES['foto']['name'];
			$file_type=$_FILES['foto']['type'];
			$file_size=$_FILES['foto']['size'];
			$file_tmp=$_FILES['foto']['tmp_name'];
			$data=base64_encode(file_get_contents($file_tmp));
			$query="update utilizadores set foto_nome='".$file_name."',foto_tipo='".$file_type."',
	foto_tamanho='".$file_size."',foto_dados='".$data."' where cod_utilizador='".$_SESSION["cod_utilizador"]."'";	
			$result_up=mysqli_query($ligax,$query);
		}

		?>
			<div class="success">
				<h1>Perfil Atualizado com Sucesso!</h1>
			</div>
		<?php
		} else {
			?>
				<div class="error">
					<p>Dados não inseridos!</p>
				</div>
			<?php
		}

}
}
	
		$query="select * from utilizadores where cod_utilizador='".$_SESSION["cod_utilizador"]."'";
			$result=mysqli_query($ligax,$query);
			while($registo=mysqli_fetch_assoc($result)){
				$nome=$registo['nome'];
				$telemovel=$registo['telemovel'];
				$email=$registo['email'];
				$password=$registo['password'];
				$foto_nome=$registo['foto_nome'];
	?>


					<div class="row">
						<div class="col-md-4 col-lg-3">

                        <section class="panel">
								<div class="panel-body">
									<div class="thumb-info mb-md">

									<?php if($foto_nome == NULL){ ?> 
										<img src="assets/images/!logged-user.jpg" class="rounded img-responsive" alt="<?php echo $nome; ?>">
									<?php }else{ ?>
										<img src="showfile.php?cod_utilizador=<?php echo $_SESSION['cod_utilizador'];?>" class="rounded img-responsive" alt="<?php echo $nome; ?>">
									<?php } ?>
										
										<div class="thumb-info-title">
											<span class="thumb-info-inner"><?php echo $nome ?></span>
											<span class="thumb-info-type">Administrador</span>
										</div>
									</div>

							

								



								</div>
							</section>

						</div>
						<div class="col-md-8 col-lg-6">

							<div class="tabs">
								<ul class="nav nav-tabs tabs-primary">
									<li class="active">
										<a href="#overview" data-toggle="tab">Editar Perfil</a>
									</li>
									<li>
										<a href="#edit" data-toggle="tab">Editar Password</a>
									</li>
								</ul>
								<div class="tab-content">
									<div id="overview" class="tab-pane active">
										

                                    <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
											<h4 class="mb-xlg">Foto de Perfil</h4>
											<fieldset>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileFirstName">Foto</label>
													<div class="col-md-8">
														<input type="file" class="form-control-pic" name="foto" id="profilePicture">
													</div>
												</div>
											</fieldset>
											<hr class="dotted tall">
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
														<input type="text" class="form-control" id="profileAddress" name="telemovel" value="<?php echo $telemovel;?>">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profilePassword">Confirmar Pass</label>
													<div class="col-md-8">
														<input type="password" class="form-control" id="profilePassword" name="pass" value="" required="">
													</div>
												</div>
											</fieldset>
										
                                            <div class="panel-footer">
												<div class="row">
													<div class="col-md-9 col-md-offset-5">
														<button type="submit" name="atualizar" class="btn btn-primary">Atualizar</button>
														<button type="reset" class="btn btn-default">Limpar</button>
													</div>
												</div>
											</div>
										

										</form>
									</div>

							<?php } ?>

<?php
	if(isset($_POST['atualizar_pass'])){
		$flag=false;
		$flag_pass=false;

		$pass=$_POST['pass'];
		$nova_pass=$_POST['nova_pass'];
		$novare_pass=$_POST['novare_pass'];
	
		$pass = md5($pass);

		/* confirmar palavra passe */
		$query="select password from utilizadores where cod_utilizador='".$_SESSION["cod_utilizador"]."'";
		$result=mysqli_query($ligax,$query);
		while($registo=mysqli_fetch_assoc($result)){
			$passwordBD=$registo['password'];
			if(($passwordBD!=$pass)){
				$flag=true;
				$flag_pass=true;
			}		
		}

		if ($nova_pass!=$novare_pass || $nova_pass=="") {$flag=true; $flag_pass=true;}
		$nova_pass = md5($nova_pass);

		if ($pass==$nova_pass) {$flag=true; $flag_pass=true;}

		if($flag==true){ 

			if($flag_pass==true) {?>
					<div class="error">
						<h1>Erro na Pass!!!</h1>
					</div>
				<?php } 
		} else {  
			$atualizar="UPDATE utilizadores set password='".$nova_pass."' where cod_utilizador='".$_SESSION["cod_utilizador"]."'";
			$result=mysqli_query($ligax,$atualizar);
			if($result==1){
				?>
				<div class="success">
					<h1>Pass Alterada</h1>
					<script> 
					alert("Password alterada com sucesso."); 
					window.location("index.php");
					</script>
				
				</div>
			<?php
			} else {
				?>
					<div class="error">
						<p>Dados não inseridos!</p>
					</div>
				<?php
			}
	}
	}

	?>
									<div id="edit" class="tab-pane">
                                    <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
                                    <h4 class="mb-xlg">Alteraração da Password</h4>
											<fieldset class="mb-xl">
                                            <div class="form-group">
													<label class="col-md-3 control-label" for="profileNewPassword">Password Antiga</label>
													<div class="col-md-8">
														<input type="password" class="form-control" id="profileNewPassword" name="pass">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileNewPassword">Nova Password</label>
													<div class="col-md-8">
														<input type="password" class="form-control" id="profileNewPassword" name="nova_pass">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileNewPasswordRepeat">Repetir a Nova Password</label>
													<div class="col-md-8">
														<input type="password" class="form-control" id="profileNewPasswordRepeat" name="novare_pass">
													</div>
												</div>
											</fieldset>
											<div class="panel-footer">
												<div class="row">
													<div class="col-md-9 col-md-offset-5">
														<button type="submit" name="atualizar_pass" class="btn btn-primary">Atualizar</button>
														<button type="reset" class="btn btn-default">Reset</button>
													</div>
												</div>
											</div>
											
										
										
										

										</form>

									</div>
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