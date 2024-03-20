
	<head>


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
<br><br><br><br>
	<section role="main" class="content-body has-toolbar">
	<header class="page-header">
						<h2>LOGS Transferências</h2>
					
						<div class="right-wrapper pull-right" style="padding-right: 30px">
							<ol class="breadcrumbs">
								<li>
									<a href="index.php">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Tabelas</span></li>
								<li><span>LOGS Transferências</span></li>
							</ol>
						</div>
					</header>

					<!-- start: page -->

					<section class="panel">
						<div class="panel-body tab-content">
							<div id="access-log" class="tab-pane active">
							<table class="table mb-none" id="datatable-details">
									<thead>
										<tr>
											<th style="width: 10%"><span class="text-normal text-sm">Id Log</span></th>
										    <th style="width: 10%"><span class="text-normal text-sm">Id Equipamento</span></th>
											<th style="width: 10%"><span class="text-normal text-sm">Id Cliente Antigo</span></th>
											<th style="width: 15%"><span class="text-normal text-sm">Nome Cliente Antigo</span></th>
											<th style="width: 10%"><span class="text-normal text-sm">Id Cliente Novo</span></th>
											<th style="width: 10%"><span class="text-normal text-sm">Data / Hora</span></th>
											<th style="width: 10%"><span class="text-normal text-sm">Técnico</span></th>
										</tr>
									</thead>
									<tbody>
                                        <?php

                                            $altera="Select * from logstransferencia";
                                            $result= mysqli_query($ligax,$altera); 


                                            if ($result) {

                                            //Vai à base de dados selecionar os registos entre dois limites
                                            while($registo = mysqli_fetch_assoc($result)){
											$idlog=$registo['id_log'];	
											$ideantigo = $registo['ideantigo'];
											$idcantigo = $registo['idcantigo'];
											$cliantigo = $registo['cliantigo'];
											$idcnovo = $registo['idcnovo'];
											$data_hora = $registo['data_hora'];
											$tecnico = $registo['tecnico'];

                                            ?>

                                            <tr class="gradeX">
                                                <td> <?php echo $idlog; ?> </td>
                                                <td style="font-weight:bold;"> <?php echo $ideantigo; ?> </td>
												<td> <?php echo $idcantigo; ?> </td>
                                                <td> <?php echo $cliantigo; ?> </td>
												<td> <?php echo $idcnovo; ?> </td>
												<td> <?php echo $data_hora; ?> </td>
												<td> <?php echo $tecnico; ?> </td>
                                            </tr>

                                            <?php }} ?>
										</tbody>
								</table>
							</div>

					</section>
					<!-- end: page -->
					
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
<script src="assets/vendor/select2/select2.js"></script>
<script src="assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
<script src="assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js"></script>
<script src="assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>

<!-- Theme Base, Components and Settings -->
<script src="assets/javascripts/theme.js"></script>

<!-- Theme Custom -->
<script src="assets/javascripts/theme.custom.datatables.row.with.details.js"></script>

<!-- Theme Initialization Files -->
<script src="assets/javascripts/theme.init.js"></script>


<!-- Examples -->
<script src="assets/javascripts/tables/examples.datatables.default.js"></script>
<script src="assets/javascripts/tables/examples.datatables.tabletools.js"></script>				