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
						<h2>Editar Tipo de Treino</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs" style="margin-right:30px;">
								<li>
									<a href="index.php">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Treinos</span></li>
								<li><span>Tipos de Treino</span></li>
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


if(isset($_POST['atualizartipotreino'])){


	    $tipotreino=$_POST['tipotreino'];

		$atualizar="UPDATE tipostreino set tipo_treino='".$tipotreino."' where id='".$_GET["id"]."'";



		$result=mysqli_query($ligax,$atualizar);

		if($result==1){
		

		?>
			<div class="success">
				<h1>Tipo de Treino Atualizado com Sucesso!</h1>
			</div>
		<?php
		} else {
			?>
				<div class="error">
					<p>Tipo de treino não inserido! Tente novamente!</p>
				</div>
			<?php
		}


}

		$query="select * from tipostreino where id='".$_GET["id"]."'";
			$result=mysqli_query($ligax,$query);
			while($registo=mysqli_fetch_assoc($result)){
				$tipotreino=$registo['tipo_treino'];

		}




			
	?>


					<div class="row">
						<div class="col-md-4 col-lg-3">


						</div>
						<div class="col-md-8 col-lg-6">

							<div class="tabs">
								<ul class="nav nav-tabs tabs-primary">
									<li class="active">
										<a href="#overview" data-toggle="tab">Editar Tipo de Treino</a>
									</li>
								
								</ul>
								<div class="tab-content">
									<div id="overview" class="tab-pane active">
										

                                    <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
										
									
											<h4 class="mb-xlg">Informação acerca do Tipo de Treino</h4>
											<fieldset>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileFirstName"> Tipo de Treino</label>
													<div class="col-md-8">
														<input type="text" class="form-control" id="profileFirstName" name="tipotreino" value="<?php echo $tipotreino;?>">
														
													</div>
												</div>
											
											

												<div class="row">
													<div class="col-md-9 col-md-offset-5">
														<a href="index.php?pagina=tipos_treino"><label class="btn btn-primary">Regressar</label></a>
														<input type="submit" name="atualizartipotreino" class="btn btn-primary" value="Atualizar Informação">
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