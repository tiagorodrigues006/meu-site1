<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Editable Tables | Okler Themes | Porto-Admin</title>
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

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/select2/select2.css" />
		<link rel="stylesheet" href="assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />

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
						<h2>Listar Técnicos</h2>
					
						<div class="right-wrapper pull-right" style="padding-right: 30px">
							<ol class="breadcrumbs">
								<li>
									<a href="index.php">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Gestão</span></li>
								<li><span>Listar Clientes</span></li>
							</ol>
						</div>
					</header>

					<!-- start: page -->
						<section class="panel">
							<div class="panel-body">
							<div class="row">
									<div class="col-sm-6">
										<div class="mb-md">
									<a href="index.php?pagina=registar"><button id="" class="btn btn-primary">Adicionar <i class="fa fa-plus"></i></button>
                                    </a>
										</div>
									</div>
								</div>
								<table class="table table-bordered table-striped mb-none" id="datatable-editable">
									<thead>
										<tr>
											<th>Cod_Utilizador</th>
											<th>Nome</th>
											<th>Email</th>
											<th>Telemóvel</th>
                                            <th>Função</th>
										</tr>
									</thead>
									<tbody>
                                    <?php

                                        $altera="Select * from utilizadores";
                                        $result= mysqli_query($ligax,$altera); 


                                        if ($result) {

                                        //Vai à base de dados selecionar os registos entre dois limites
                                        while($registo = mysqli_fetch_assoc($result)){
                                        $cod_utilizador=$registo['cod_utilizador'];
                                        $nome=$registo['nome'];
                                        $email=$registo['email'];
                                        $tipo_perfil=$registo['tipo_perfil'];
                                        $telemovel=$registo['telemovel']; 

                                    ?>

										<tr class="gradeX">
											<td><?php echo $cod_utilizador; ?></td>
											<td><?php echo $nome; ?></td>
											<td><?php echo $email; ?></td>
                                            <td><?php echo $telemovel; ?></td>
											<td class="actions">
												<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
												<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
												<a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
												<a href="#" name="delete" id="delete" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
											</td>
										</tr>

                                        <?php }} ?>

									</tbody>

								</table>
							</div>
						</section>
					<!-- end: page -->
				</section>
			</div>
		</section>

		<div id="dialog" class="modal-block mfp-hide">
			<section class="panel">
				<header class="panel-heading">
					<h2 class="panel-title">ATENÇÃO!</h2>
				</header>
				<div class="panel-body">
					<div class="modal-wrapper">
						<div class="modal-text">
							<p>Tem a certeza que deseja eliminar este registo?</p>
						</div>
					</div>
				</div>
				<footer class="panel-footer">
					<div class="row">
						<div class="col-md-12 text-right">
							<form method="POST" enctype="multipart/form-data">
							<button id="dialogConfirm" class="btn btn-primary">Confirmar</button>
							<button id="dialogCancel" class="btn btn-default">Cancelar</button>
							</form>
						</div>
					</div>
				</footer>
			</section>
		</div>

		<!-- Vendor -->
		<script src="assets/vendor/jquery/jquery.js"></script>
		<script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		
		<!-- Specific Page Vendor -->
		<script src="assets/vendor/select2/select2.js"></script>
		<script src="assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
		<script src="assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom1.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js"></script>


		<!-- Examples -->
		
	</body>
</html>