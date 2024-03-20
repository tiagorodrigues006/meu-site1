
	<head>

    <meta charset="utf-8"/>
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
                <h2>Lista de Avarias</h2>
            
                <div class="right-wrapper pull-right">
                    <ol class="breadcrumbs" style=" margin-right: 30px;">
                        <li>
                            <a href="index.php">
                                <i class="fa fa-home"></i>
                            </a>
                        </li>
                        <li><span>Listar Avarias</span></li>
                    </ol>
                </div>
            </header>
                
                <section class="panel">
                <div class="panel-body">
								<div class="row">
									<div class="col-sm-6">
										<div class="mb-md">
										<form method="POST" action="">
										 <a href="index.php?pagina=registar_avarias"><label class="btn btn-primary">Adicionar <i class="fa fa-plus"></i></label></a>
										 &nbsp;
										 <a href="index.php"><label class="btn btn-primary">Regressar</label></a>
										</form>
										</div>
									</div>
								</div>
                       
                        <table class="table mb-none" id="datatable-details">
										<thead>
											<tr>
                                            <th>ID Avaria</th>
                                            <th>Avarias</th>
										</tr>
										</thead>
										<tbody>
                                        <?php

                                            $altera="Select * from avarias";
                                            $result= mysqli_query($ligax,$altera); 


                                            if ($result) {

                                            //Vai à base de dados selecionar os registos entre dois limites
                                            while($registo = mysqli_fetch_assoc($result)){
                                            $id_avaria=$registo['id_avaria'];
                                            $avarias=$registo['avarias'];

                                            ?>

                                            <tr class="gradeX">
                                                <td> <?php echo $id_avaria; ?> </td>
                                                <td> <?php echo $avarias; ?> </td>
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
</body>
</html>