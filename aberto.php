<!doctype html>
<html class="fixed">
	<head>
	

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
		<style>
			#abc {
				z-index: 20;
				width:100%;
				height:100%;
				opacity:.95;
				top:0;
				left:0;
				display:none;
				position:fixed;
				background-color:white;
				overflow:auto;
			}

			img#close {
				position:absolute;
				right:-14px;
				top:-2px;
				cursor:pointer;
				width: 20px;
			}
			div#popupContact {
				position:absolute;
				left:50%;
				top:12%;
				margin-left:-202px;
				font-family:'Raleway',sans-serif
			}

			#form {
				max-width:500px;
				min-width:450px;
				padding:10px 50px;
				font-family:raleway;
				background-color:#fff;
				border:2px solid gray;
				border-radius:10px;
			}

			#form p {
				margin-top:30px
			}
			#form h2 {
				background-color:#4169E1;
				padding:20px 35px;
				margin:-10px -50px;
				text-align:center;
				border-radius:10px 10px 0 0;
				color: white;
			}

			#form hr {
				margin:10px -50px;
				border:0;
				border-top:1px solid #ccc
			}
			#form input[type=text] {
				float: left;
				width:40%;
				margin-right: 5%;
				margin-left: 5%;
				padding:10px;
				margin-top:30px;
				border:1px solid #ccc;
				padding-left:40px;
				font-size:16px;
				font-family:raleway;
			}

			#form #name {
				background-image:url(../images/name.jpg);
				background-repeat:no-repeat;
				background-position:5px 7px
			}
			#form #email {
				background-image:url(../images/email.png);
				background-repeat:no-repeat;
				background-position:5px 7px
			}
			#form textarea {
				background-image:url(../images/msg.png);
				background-repeat:no-repeat;
				background-position:5px 7px;
				width:90%;
				height:95px;
				padding:10px;
				resize:none;
				margin-top:30px;
				border:1px solid #ccc;
				padding-left:40px;
				font-size:16px;
				font-family:raleway;
				margin-bottom:30px;
				margin-right: 5%;
				margin-left: 5%;
			}

			#form #submit {
				text-decoration:none;
				width:100%;
				text-align:center;
				display:block;
				background-color:#111;
				color:#fff;
				border:1px solid #BEBEBE;
				padding:10px 0;
				font-size:20px;
				cursor:pointer;
				border-radius:5px
			}
			#form span {
				font-weight:700
			}

			#form button {
				width:10%;
				height:45px;
				border-radius:3px;
				background-color:#cd853f;
				color:#fff;
				font-family:'Raleway',sans-serif;
				font-size:18px;
				cursor:pointer;
			}
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
		.body-sign {
			display: table;
			height: 0vh;
			margin: 0 auto;
			max-width: 100%;
			padding: 0 15px;
			width: 100%;
			position:relative; 
		}
		</style>
	</head>
	<body>
	    
	    <?php
	       if(isset($_GET['idc'])){
        $idcliente=$_GET['idc'];
    }
    
    if(isset($_GET['idr'])){
        $id_reparacao=$_GET['id_reparacao'];
    }
    
    ?>
	    
		<section class="body">

			

			<div class="inner-wrapper">


				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Reparações Aberto</h2>
					
						<div class="right-wrapper pull-right" style="padding-right: 30px">
							<ol class="breadcrumbs">
								<li>
									<a href="index.php">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Reparações</span></li>
								<li><span>Reparações Aberto</span></li>
							</ol>
					
							
						</div>
					</header>
					
					
				
							
							

					

    <section class="body-sign">

    
							<div class="panel-body">
							<form method="POST" action="#">
								<a href="index.php"><label class="btn btn-primary">Regressar</label></a>
							</form>
							<br>
							
								<table class="table table-bordered table-striped mb-none" id="datatable-details" style="width:100%;">
									<thead>
										<tr>
											<th style="width : 5%;">ID_Rep</th>
											<th style="padding-right:50px;">Nome</th>
											<th style="width : 10%;">ID_Equip</th>
											<th style="width : 10%;">Tipo</th>
											<th style="width : 10%;">Marca</th>
											<th style="padding-right:137px;">Estado</th>
                                            <th style="width : 15%;">Data Entrada</th>
                                            <th style="width : 5%;">Perfil</th>
										</tr>
									</thead>
									<tbody>
											
									
                                 <?php
                                 
                                 if(isset($_POST['procurar_cliente'])) {
                                     $altera="Select * from  estado ";
                                     $result= mysqli_query($ligax, $altera);
                                 }
                                 
                                 	if(isset($_POST['procurar_cliente'])) {
											
											$idr=$_POST['idreparacao'];
											if($idr==""){
											    $idr=-1;
											}
											$idc=$_POST['idcliente'];
											if($idc==""){
											    $idc=-1;
											}
											$ide=$_POST['idequipamento'];
											if($ide==""){
											    $ide=-1;
											}
											$est=$_POST['estado'];
											if($est==""){
											    $est=-1;
											}
											$datar=$_POST['data'];
											if($datar==""){
											    $datar=-1;
											}
											$dataentregar=$_POST['dataentrega'];
											if($dataentregar==""){
											    $dataentregar=-1;
											}

                                 $altera="Select * from reparacao where (id_reparacao = '".$idr."' or id_cliente like '".$idc."' or id_equipamento like '".$ide."' 
								  or data like '".$datar."'  or dataentrega like '".$dataentregar."') and estado = '".$est."' ORDER BY data DESC" ;
										
										$result=mysqli_query($ligax,$altera);
                                 	    // echo $altera;
                                 	}else{

										
                                        $altera= "select * from reparacao where estado NOT IN ('7', '8', '9') ORDER BY data DESC";
                                        $result= mysqli_query($ligax, $altera);
                                 	}
                                        if ($result) {

                                        //Vai à base de dados selecionar os registos entre dois limites
                                        while($registo=mysqli_fetch_assoc($result)) {
                                				$id_reparacao=$registo['id_reparacao'];
                                				$estado=$registo['estado'];
                                				$data=$registo['data'];
                                				$dataentrega=$registo['dataentrega'];
                                				$idc=$registo['id_cliente'];
                                				$ide=$registo['id_equipamento'];
                                			    
											$nomec="Select * from cliente where id='".$idc."' order by id desc";
											$pesquisa=mysqli_query($ligax, $nomec);
											$registo=mysqli_fetch_assoc($pesquisa);
											          
											$nomedosauce=$registo['nome'];
											$ntel1=$registo['telefone1'];
											$ntel2=$registo['telefone2'];
											$ntel3=$registo['telefone3'];
											$mail=$registo['email'];


                                            $pesquisadamarca="select * from equipamentos where id_equipamento='".$ide."' ";
                                                $resultadopesquisamarca=mysqli_query($ligax,$pesquisadamarca); 
                                                if($resultadopesquisamarca){
                                               while($registomarca=mysqli_fetch_assoc($resultadopesquisamarca)){
                                               	$marca=$registomarca['marca'];
                                                $tipo=$registomarca['tipo'];
                                               }
                                            }

                                         $pesquisadotipo="select * from tipo_equipamento where id_tipo='".$tipo."' ";
                                            $resultadopesquisatipo=mysqli_query($ligax,$pesquisadotipo); 
                                            if($resultadopesquisatipo){
                                           while($registotipo=mysqli_fetch_assoc($resultadopesquisatipo)){
                                            $tipoequipamento=$registotipo['equipamento'];
                                        }
                                    }

                                        $pesquisadamarca="select * from marca where id_marca='".$marca."' ";
                                                $resultadopesquisamarca=mysqli_query($ligax,$pesquisadamarca); 
                                                if($resultadopesquisamarca){
                                               while($registomarca=mysqli_fetch_assoc($resultadopesquisamarca)){
                                                $marcaequipamento=$registomarca['marca'];
                                               }
                                            }



											


                                    ?>
                                       
										<tr class="gradeX">
											<td style=" width: 60px"; ><?php echo $id_reparacao; ?></td>
											<td title="Tel1: <?php echo $ntel1; ?> 
Tel2: <?php echo $ntel2; ?> 
Tel3: <?php echo $ntel3; ?> 
Mail: <?php echo $mail; ?>">
											<?php echo $nomedosauce; ?></td>
											<td style="font-weight: bold; "><?php echo $ide; ?></td>
											<td style=" width: 60px";><?php echo $tipoequipamento; ?></td>
											<td style=" width: 60px";><?php echo $marcaequipamento; ?></td>
                                            <td> 
                                            <?php
                                        if($estado=="1") {
                                        echo "Entrada";
                                          
                                        } else if($estado=="2") {
                                            ?>
                                        <font color="#ff0000">Urgente</font>
                                        <?php
                                        }
                                        else if($estado=="3") {
                                         echo "Em Reparação";
                                        }
                                        else if($estado=="4") {
                                         echo "Aguarda Orçamento";
                                        }
                                        else if($estado=="5") {
                                         echo "Aguarda Material";
                                        }
                                        else if($estado=="6") {
                                         echo "Standby / Exterior";
                                        }
                                       
                                        else {
                                         echo "Erro";
                                        }
                                    ?>
                                        </td>
                                            <td><?php echo $data; ?></td>
											<td><a href="index.php?pagina=editar_reparacao&idr=<?php echo $id_reparacao; ?>" ><i class="fa fa-pencil"></i></a></td>
										</tr>

                                        <?php 
                                            
                                        }
                                        }
                                         
                                        
                                        ?>

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
		<script src="assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.datatables.row.with.details.js"></script>

		
		<!-- Theme Initialization Files -->
	


		<!-- Examples -->
		<script>
			//Function To Display Popup
				function div_show() {
				document.getElementById('abc').style.display = "block";
				}



			// Validating Empty Field
			function check_empty() {
			if (document.getElementById('name').value == "" || document.getElementById('email').value == "" || document.getElementById('msg').value == "") {
			alert("Fill All Fields !");
			} else {
			document.getElementById('form').submit();
			alert("Form Submitted Successfully...");
			}
			}
			//Function To Display Popup
			function div_show() {
			document.getElementById('abc').style.display = "block";
			}
			//Function to Hide Popup
			function div_hide(){
			document.getElementById('abc').style.display = "none";
			}
		</script>
		
		<script>
        function myFunction() {
          alert("Não é possível criar uma reparação pois este produto encontra-se desativado");
        }
        </script>

	</body>
</html>