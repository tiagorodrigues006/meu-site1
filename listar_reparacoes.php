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
    
    if(isset($_GET['ide'])){
        $idequipamento=$_GET['ide'];
    }
    
    ?>
	    
		<section class="body">

			

			<div class="inner-wrapper">


				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Histórico</h2>
					
						<div class="right-wrapper pull-right" style="padding-right: 30px">
							<ol class="breadcrumbs">
								<li>
									<a href="index.php">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Histórico</span></li>
			
							</ol>
					
							
						</div>
					</header>
					
					
					<div id="abc">
						<div id="popupContact">
						    
						    
						    <?php


/*Se o utilizador clicou no botão registar vamos receber os dados do formulário */
if(isset($_POST["registar"])) {

/* Guardar os dados do vetor $_POST para a respetiva variável */


        $estado=$_POST['estado'];
        $outroacess=$_POST['outroacessorio'];
        $outraavaria=$_POST['outraavaria'];
        $descricao=$_POST['descricao'];
        $dataentrega=$_POST['dataentrega'];
        $pass=$_POST['pass'];
        $passbios=$_POST['passbios'];
  
                    // Caso não hajam erros - os dados vão ser enviados para a BD;
                    //Código SQL para inserir 1 registo na tabela cliente
                    $insere="INSERT INTO reparacao
                    (id_cliente,id_equipamento,estado,outroacess,outraavaria,descricao,dataentrega,pass,passbios)
                    VALUES ('".$idcliente."', '".$idequipamento ."','".$estado ."', '".$outroacess ."', '".$outraavaria ."', '".$descricao ."','".$dataentrega ."','".$pass ."','".$passbios ."')";
                    //Código PHP que executa o SQL
                    echo $insere;
                    $result=mysqli_query($ligax,$insere);
                    //Se $result for 1, então o registo foi inserido com sucesso
                    if($result==1){ ?>

                        <script>
                              alert("Reparação adicionada com sucesso");
  
                        </script>
                        <div class="pag">Clique <a href="index.php">aqui</a> para voltar para a página inicial</div>

                    <?php } else { ?>

                        <div class="error">
                            <h1>Erro ao criar a Reparação!</h1>
                        </div>
                            
                    <?php }
                    } 
								
								$consultacliente="select * from cliente where id='".$idcliente."' ";
								$resultconsultaids=mysqli_query($ligax,$consultacliente);
								$registo = mysqli_fetch_assoc($resultconsultaids);
								$nome=$registo['nome'];
								$telefone1=$registo['telefone1'];
								$email=$registo['email'];
								
								$consultaequipamento="select * from equipamentos where id_equipamento='".$idequipamento."' ";
								$resultconsultaequipamento=mysqli_query($ligax,$consultaequipamento);
								$registo = mysqli_fetch_assoc($resultconsultaequipamento);
								$marca=$registo['marca'];
								$modelo=$registo['modelo'];
								$sn=$registo['sn'];
								$ativo=$registo['ativo'];
							
							
							
						?>
							
							

    <section class="body-sign" style="max-width: 700px; margin-top: 50px;">

            <div class="center-sign">
             

                <div class="panel panel-sign" >
				
                    <div class="panel-body">
                                <div class="tabs">
								<ul class="nav nav-tabs tabs-primary">
									<li class="active">
										<a href="#overview" data-toggle="tab">Entrada</a>
									</li>
									<li>
										<a href="#edit" data-toggle="tab">Intervenção</a>
									</li>
								</ul>
								<div class="tab-content">
									<div id="overview" class="tab-pane active">
                        <form method="POST" action="">
                            <img id="close" src="assets/images/close.png" onclick ="div_hide()">


                        <div class="form-group mb-lg" style="width: 45%; float: left; overflow: hidden;">
                            <p>Estado</p>
                            <select name="estado" style="width: 100%;">
                                
                                <?php 
                                    $estados="Select * from  estado";
                                    $pesquisaestados=mysqli_query($ligax,$estados);
                                    while($registo=mysqli_fetch_assoc($pesquisaestados)){
                                        $idestado=$registo['id_estado'];
                                        $estado=$registo['estado'];
                                        ?>
                                        <option value="<?php echo $idestado; ?>"><?php echo $estado; ?></option>
                                        <?php
                                        
                                    }
                                ?>

                            </select>
                        </div>

                        <div class="form-group mb-lg" style="width: 45%; float: right; overflow: hidden;">
                            <p>Data de Entrega</p>
                            <input name="dataentrega" type="text"  class="form-control input-lg" />
                        </div>

                    <h4 style="width: 100%; float: left;">Cliente</h4>

                            <div class="form-group mb-lg" style="width: 45%; float: right; overflow: hidden;">
                                <label>ID_Cliente</label>
                                <input name="idcliente" type="text" class="form-control input-lg" placeholder="<?php echo $idcliente ?>" disabled=""/>
                            </div>
                            <div class="form-group mb-lg" style="width: 45%; float: left; overflow: hidden;">
                                <label>Nome</label>
                                <input name="nome" type="text" class="form-control input-lg" placeholder="<?php echo $nome ?>" disabled=""/>
                            </div>
                            <div class="form-group mb-lg" style="width: 45%; float: right; overflow: hidden;">
                                <label>Telemóvel</label>
                                <input name="telefone1" type="text" class="form-control input-lg" placeholder="<?php echo $telefone1 ?>" disabled=""/>
                            </div>
                            <div class="form-group mb-lg" style="width: 45%; float: left; overflow: hidden;">
                                <label>Email</label>
                                <input name="email" type="text" class="form-control input-lg" placeholder="<?php echo $email ?>" disabled=""/>
                            </div>

                    <h4>Equipamento</h4>

                            <div class="form-group mb-lg" style="width: 15%; overflow: hidden;">
                                <label>ID_Equipamento</label>
                                <input name="idequipamento" type="text" class="form-control input-lg"  placeholder="<?php echo $idequipamento ?>" disabled=""/>
                            </div>

                       
                            <div class="form-group mb-lg" style="width: 30%; margin: 0 auto;  float: left; overflow: hidden;">
                            <label>Marca</label>
                            <input name="marca" type="text" class="form-control input-lg"  placeholder="<?php echo $marca ?>" disabled="" />
                        </div>

                        <div class="form-group mb-lg" style="width: 30%; float: right; overflow: hidden;">
                            <label>Nº Série</label>
                            <input name="sn" type="text" class="form-control input-lg"  placeholder="<?php echo $sn ?>" disabled="" />
                        </div>

                        <div class="form-group mb-lg" style="width: 30%; margin: 0 auto; overflow: hidden;">
                            <label>Modelo</label>
                            <input name="modelo" type="text" class="form-control input-lg"  placeholder="<?php echo $modelo ?>" disabled=""/>
                        </div>

                    <h4>Acessórios</h4>

                        <?php

                            $altera="Select * from acessorios";
                            $result= mysqli_query($ligax,$altera); 

                            //Vai à base de dados selecionar os registos entre dois limites
                            while($registo = mysqli_fetch_assoc($result)){
                            $id_acessorio=$registo['id_acessorio'];
                            $acessorios=$registo['acessorios'];

                        ?>

                        <div class="form-group mb-lg" style="width: 25%; float: left;">
                            <input name="acessorio" type="checkbox" class="" style="transform: scale(1.5); margin-right: 2%;"/>
                            <label><?php echo $acessorios; ?></label>
                        </div>
                        <?php } ?>
                        <div class="form-group mb-lg" style="width: 100%; float: left; overflow: hidden;">
                            <label>Outro</label>
                            <input name="outroacessorio" type="textarea" class="form-control input-lg" />
                        </div>

                    <h4 style="width: 100%; float: left;">Avaria</h4>
                    
                        <?php

                        $altera="Select * from avarias  ";
                        $result= mysqli_query($ligax,$altera); 

                        //Vai à base de dados selecionar os registos entre dois limites
                        while($registo = mysqli_fetch_assoc($result)){
                        $id_avaria=$registo['id_avaria'];
                        $avarias=$registo['avarias'];

                        ?>

                        <div class="form-group mb-lg" style="width: 25%; float: left;">
                        <input name="avaria" type="checkbox" class="" style="transform: scale(1.5); margin-right: 2%;"/>
                        <label><?php echo $avarias ?></label>
                        </div>
                        <?php } ?>
                        <div class="form-group mb-lg" style="width: 100%; float: left; overflow: hidden;">
                        <label>Outro</label>
                        <input name="outraavaria" type="textarea" class="form-control input-lg" />
                        </div>

                        <div class="form-group mb-lg" style="width: 100%; float: left; overflow: hidden;">
                        <label>Descrição</label>
                        <input name="descricao" type="textarea" class="form-control input-lg" />
                        </div>

                            <div class="row">
                                <div class="col-sm-12 mb-lg">
                                    
                                    <?php if($ativo == 1){ ?>
                                    
                                        <input name="registar" value="Registar" type="submit" class="btn btn-primary hidden-xs" style="width: 100%;"></input>
                                        
                                    <?php } else{ ?>
                                    
                                        <input onclick="myFunction()" value="Registar" type="submit" class="btn btn-primary hidden-xs" style="width: 100%;"></input>
                                        
                                    <?php } ?>
                                    
                                </div>
                            </div>
                        </form>
            </div>
            
            
            
            							<div id="edit" class="tab-pane">
                        <form method="POST" action="">
                            <img id="close" src="assets/images/close.png" onclick ="div_hide()">


                        <div class="form-group mb-lg" style="width: 45%; float: left; overflow: hidden;">
                            <p>Trabalho Efectuado</p>
                            <select name="label1" style="width: 100%;">
                                
                                <?php 
                                    $estados="Select * from  avarias";
                                    $pesquisaestados=mysqli_query($ligax,$estados);
                                    while($registo=mysqli_fetch_assoc($pesquisaestados)){
                                        $id_avaria=$registo['id_avaria'];
                                        $avarias=$registo['avarias'];
                                        ?>
                                        <option value="<?php echo $id_avaria; ?>"><?php echo $avarias; ?></option>
                                       
                                        <?php
                                        
                                    }
                                ?>

                            </select>
                        </div>
                          <div class="form-group mb-lg" style="width: 45%; float: right; overflow: hidden;">
                            <select name="label2" style="width: 100%;">
                                
                                <?php 
                                    $estados="Select * from  avarias";
                                    $pesquisaestados=mysqli_query($ligax,$estados);
                                    while($registo=mysqli_fetch_assoc($pesquisaestados)){
                                        $id_avaria=$registo['id_avaria'];
                                        $avarias=$registo['avarias'];
                                        ?>
                                        <option value="<?php echo $id_avaria; ?>"><?php echo $avarias; ?></option>
                                       
                                        <?php
                                        
                                    }
                                ?>

                            </select>
                        </div>
                        

                        <div class="form-group mb-lg" style="width: 45%; float: right; overflow: hidden;">
                            <p>Data de Entrega</p>
                            <input name="dataentrega" type="date" class="form-control input-lg" />
                        </div>

                    <h4 style="width: 100%; float: left;">Cliente</h4>

                            <div class="form-group mb-lg" style="width: 45%; float: right; overflow: hidden;">
                                <label>ID_Cliente</label>
                                <input name="idcliente" type="text" class="form-control input-lg" placeholder="<?php echo $idcliente ?>" disabled=""/>
                            </div>
                            <div class="form-group mb-lg" style="width: 45%; float: left; overflow: hidden;">
                                <label>Nome</label>
                                <input name="nome" type="text" class="form-control input-lg" placeholder="<?php echo $nome ?>" disabled=""/>
                            </div>

                    <h4>Equipamento</h4>

                            <div class="form-group mb-lg" style="width: 15%; overflow: hidden;">
                                <label>ID_Equipamento</label>
                                <input name="idequipamento" type="text" class="form-control input-lg"  placeholder="<?php echo $idequipamento ?>" disabled=""/>
                            </div>

                       
                            <div class="form-group mb-lg" style="width: 30%; margin: 0 auto;  float: left; overflow: hidden;">
                            <label>Marca</label>
                            <input name="marca" type="text" class="form-control input-lg"  placeholder="<?php echo $marca ?>" disabled="" />
                        </div>

                        <div class="form-group mb-lg" style="width: 30%; float: right; overflow: hidden;">
                            <label>Nº Série</label>
                            <input name="sn" type="text" class="form-control input-lg"  placeholder="<?php echo $sn ?>" disabled="" />
                        </div>

                        <div class="form-group mb-lg" style="width: 30%; margin: 0 auto; overflow: hidden;">
                            <label>Modelo</label>
                            <input name="modelo" type="text" class="form-control input-lg"  placeholder="<?php echo $modelo ?>" disabled=""/>
                        </div>

                    <h4>Acessórios</h4>

                        <?php

                            $altera="Select * from acessorios";
                            $result= mysqli_query($ligax,$altera); 

                            //Vai à base de dados selecionar os registos entre dois limites
                            while($registo = mysqli_fetch_assoc($result)){
                            $id_acessorio=$registo['id_acessorio'];
                            $acessorios=$registo['acessorios'];

                        ?>

                        <div class="form-group mb-lg" style="width: 25%; float: left;">
                            <input name="acessorio" type="checkbox" class="" style="transform: scale(1.5); margin-right: 2%;"/>
                            <label><?php echo $acessorios; ?></label>
                        </div>
                        <?php } ?>
                        <div class="form-group mb-lg" style="width: 100%; float: left; overflow: hidden;">
                            <label>Outro</label>
                            <input name="outroacessorio" type="textarea" class="form-control input-lg" />
                        </div>

                    <h4 style="width: 100%; float: left;">Avaria</h4>
                    
                        <?php

                        $altera="Select * from avarias  ";
                        $result= mysqli_query($ligax,$altera); 

                        //Vai à base de dados selecionar os registos entre dois limites
                        while($registo = mysqli_fetch_assoc($result)){
                        $id_avaria=$registo['id_avaria'];
                        $avarias=$registo['avarias'];

                        ?>

                        <div class="form-group mb-lg" style="width: 25%; float: left;">
                        <input name="avaria" type="checkbox" class="" style="transform: scale(1.5); margin-right: 2%;"/>
                        <label><?php echo $avarias ?></label>
                        </div>
                        <?php } ?>
                        <div class="form-group mb-lg" style="width: 100%; float: left; overflow: hidden;">
                        <label>Outro</label>
                        <input name="outraavaria" type="textarea" class="form-control input-lg" />
                        </div>

                        <div class="form-group mb-lg" style="width: 100%; float: left; overflow: hidden;">
                        <label>Descrição</label>
                        <input name="descricao" type="textarea" class="form-control input-lg" />
                        </div>

                            <div class="row">
                                <div class="col-sm-12 mb-lg">
                                    
                                    <?php if($ativo == 1){ ?>
                                    
                                        <input name="registar" value="Registar" type="submit" class="btn btn-primary hidden-xs" style="width: 100%;"></input>
                                        
                                    <?php } else{ ?>
                                    
                                        <input onclick="myFunction()" value="Registar" type="submit" class="btn btn-primary hidden-xs" style="width: 100%;"></input>
                                        
                                    <?php } ?>
                                    
                                </div>
                            </div>
                        </form>
            </div>
                    </div>
                </div>

        </div>


    </section>
						    
						</div>
				    </div>

    <section class="body-sign">

    
							<div class="panel-body">
								<div class="row">
									<div class="col-sm-6">
										<div class="mb-md">
									<a href="index.php?pagina=nova_reparacao&idc=<?php echo $_GET['idc'];?>&ide=<?php echo $_GET['ide']; ?>"><button id="addToTable" class="btn btn-primary" onclick="div_show()">Adicionar <i class="fa fa-plus"></i></button>
                                    </a>
										</div>
									</div>
								</div>
								<table class="table table-bordered table-striped mb-none" id="datatable-details">
									<thead>
										<tr>
											<th style="width : 5%;">ID_Rep</th>
										
											<th style="width : 20%;">Nome</th>
											<th style="width : 5%;">ID_Equip</th>
											<th style="width : 5%;">Estado</th>
                                            <th style="width : 3%;">Valor</th>
											<th style="width : 3%;">Pago</th>
                                            <th style="width : 8%;">Entrada</th>
											<th style="width : 8%;">Conclusão</th>
											<th style="width : 8%;">Entrega</th>
                                            <th style="width : 3%;">Perfil</th>
										</tr>
									</thead>
									<tbody>
									
									
                                    <?php
										if(isset($_POST['procurar_cliente'])){
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
											$outroa=$_POST['outroacess'];
											if($outroa==""){
												$outroa=-1;
											}
											$outraa=$_POST['outraavaria'];
											if($outraa==""){
												$outraa=-1;
											}
											$pass=$_POST['pass'];
											if($pass==""){
												$pass=-1;
											}
											$passbios=$_POST['passbios'];
											if($passbios==""){
												$passbios=-1;
											}
											$descricaor=$_POST['descricao'];
											if($descricaor==""){
												$descricaor=-1;
											}
											$dataentregar=$_POST['dataentrega'];
											if($dataentregar==""){
												$dataentregar=-1;
											}

										$altera="Select * from reparacao where id_reparacao = '".$_POST['idr']."' or id_cliente like '%".$idc."%'
										or id_equipamento like '%".$ide."%' or estado like '".$est."%' or data like '".$datar."%' or outroacess like '".$outroa."%'
										or outraavaria like '".$outraa."%' or descricao like '".$descricaor."%' or dataentrega like '".$dataentregar."%' or pass like '".$pass."%' or passbbios like '".$passbios."%' ORDER BY data DESC " ;
										}else{
                                        
                                        $query="select * from reparacao where id_cliente='".$idcliente."' AND id_equipamento='".$idequipamento."' ORDER BY data DESC";
                                			$result=mysqli_query($ligax,$query);

                                        if ($result) {

                                        //Vai à base de dados selecionar os registos entre dois limites
                                        while($registo=mysqli_fetch_assoc($result)){
                                				$id_reparacao=$registo['id_reparacao'];
                                				$estado=$registo['estado'];
												$valor=$registo['valor'];
												$pago=$registo['pago'];
                                				$data=$registo['dataentrada'];
                                				$dataentrega=$registo['dataentrega'];
												$dataconclusao=$registo['dataconclusao'];
                                				$idc=$registo['id_cliente'];
                                				$ide=$registo['id_equipamento'];
                                			

                                    ?>

										<tr class="gradeX">
											<td style=" width: 60px"; ><?php echo $id_reparacao; ?></td>
											<td><?php echo $nome; ?></td>
											<td style=" width: 60px; font-weight: bold; "><?php echo $idequipamento; ?></td>
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
                                         else if($estado=="7") {
                                         echo "Sem Reparação";
                                        }
                                         else if($estado=="8") {
                                         echo "Reparado";
                                        }
                                         else if($estado=="9") {
                                         echo "Fechado";
                                        }
                                       
                                        else {
                                         echo "Erro";
                                        }
                                    ?>
                                        </td>
										
										<td><?php echo $valor; ?></td>
											<td>
                                            <?php
                                        if($pago=="1") {
                                        echo "Sim";
                                          
                                        } 
                                        else {
                                         echo "";
                                        }
                                    ?></td>
									
                            
										
										
                                            <td><?php echo $data; ?></td>
                                            <td><?php echo $dataconclusao; ?></td>
                                            <td><?php echo $dataentrega; ?></td>
											<td><a href="index.php?pagina=editar_reparacao&idr=<?php echo $id_reparacao; ?>" ><i class="fa fa-pencil"></i></a></td>
										</tr>

                                        <?php }}} ?>

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