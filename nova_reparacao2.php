<html>

<head>

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
        	max-width: 700px;
        	padding: 0 15px;
        	position:relative; 
        	margin-top: 50px;
        }
.provisorio{
	   	position:relative; 
		 left:200px; top:450px;
		 
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
} else if(isset($_POST['ide'])){
    $idequipamento=$_POST['ide'];
}

    
	
	$consultaequipamento="select * from equipamentos where id_equipamento='".$idequipamento."' ";
	$resultconsultaequipamento=mysqli_query($ligax,$consultaequipamento);
	$registo = mysqli_fetch_assoc($resultconsultaequipamento);
	$marca=$registo['marca'];
	$modelo=$registo['modelo'];
	$sn=$registo['sn'];
	$idcliente=$registo['id_cliente'];
	$idc=$idcliente;
	$ide=$idequipamento;
	$tipoequipamento=$registo['tipo'];
	
	$consultacliente="select * from cliente where id='".$idcliente."' ";
	$resultconsultaids=mysqli_query($ligax,$consultacliente);
	$registo = mysqli_fetch_assoc($resultconsultaids);
	$nome=$registo['nome'];
	$telefone1=$registo['telefone1'];
	
    
    date_default_timezone_set('UTC');

    $dataentrada=date("Y-m-d");
    ?>				
 <section class="body-sign">

            <div class="center-sign">
             

                <div class="panel panel-sign" >
				
                    <div class="panel-body">
                                <div class="tabs">
                                
								<ul class="nav nav-tabs tabs-primary"> 
									<li class="active">
										<a href="#overview" data-toggle="tab">Entrada</a>
									</li>
								<div style="float: right; padding-left: 1%">
										<a href="ficha_informativa.php?idc=<?php echo $idcliente; ?>&idr=<?php echo $idreparacao; ?>&ide=<?php echo $idequipamento; ?>" target="_blank"><button value="FI" class="btn btn-primary hidden-xs"> <i class="fa fa-print"></i> FI</button></a>
								</div>
									<div style="float: right; padding-left: 1%">
										<a href="selo.php?idc=<?php echo $idcliente; ?>&idr=<?php echo $idreparacao; ?>&ide=<?php echo $idequipamento; ?>" target="_blank"><button value="SELO" class="btn btn-primary hidden-xs"> <i class="fa fa-print"></i> Selo</button></a>
								</div>
									<div style="float: right; padding-left: 1%">
										<a href="print_saida.php?idc=<?php echo $idcliente; ?>&idr=<?php echo $idreparacao; ?>&ide=<?php echo $idequipamento; ?>" target="_blank"><button value="SAI" class="btn btn-primary hidden-xs"> <i class="fa fa-print"></i> SAI</button></a>
								</div>
									<div style="float: right; padding-left: 1%">
										<a href="print_entrada.php?idc=<?php echo $idcliente; ?>&idr=<?php echo $idreparacao; ?>&ide=<?php echo $idequipamento; ?>" target="_blank"><button value="ENT" class="btn btn-primary hidden-xs"> <i class="fa fa-print"></i> ENT</button></a>
								</div>
								</ul>
								
								<div class="tab-content">
									<div id="overview" class="tab-pane active">
                        <form method="POST" action="index.php?pagina=editar_reparacao&idr=<?php echo $idreparacao; ?>&ide=<?php echo $idequipamento; ?>">
                        <input name="idreparacao" type="hidden" value="<?php echo $idreparacao; ?>">  

                        <div class="form-group mb-lg" style="width: 45%; float: left; overflow: hidden;">
                            <p style="margin-top: 0;">Estado</p>
                            <select name="estado" style="width: 100%; margin-top: 0;">
                                
                                <?php 
                                    $estados="Select * from  estado";
                                    $pesquisaestados=mysqli_query($ligax,$estados);
                                    //$idestado=$registo['id_estado'];
                                    ?>
                                        <?php
                                    while($registo=mysqli_fetch_assoc($pesquisaestados)){
                                        $idestado=$registo['id_estado'];
                                        $estado=$registo['estado'];
                                        if($idestado==$estadoatual){
                                        ?>
                                        <option selected value="<?php echo $idestado; ?>"><?php echo $estado; ?></option>
                                        <?php
                                        } else {
                                        ?>
                                        <option  value="<?php echo $idestado; ?>"><?php echo $estado; ?></option>
                                        <?php
                                        }
                                    }
                                ?>

                            </select>
                        </div>

                        <div class="form-group mb-lg" style="width: 45%; float: right; overflow: hidden;">
                            <p style="margin-top: 0;">Data de Entrada</p>
                              <input name="dataentrega" type="date" class="form-control" value="<?php echo $dataentrada; ?>"/>
                        </div>
                    <div class="form-group mb-lg">
                    <h4 style="width: 100%; float: left; margin-top: 0; margin-top: -10px;">Cliente</h4>

                            <div style="width: 13%; float: left; overflow: hidden;">
                                    <label style="margin-top: 0;">ID_Cliente</label>
                                    <input name="idcliente" type="text" class="form-control input-lg" value="<?php echo $idcliente; ?>" readonly/>
                                </div>
                                <div style="width: 35%; float: left; overflow: hidden; padding-left:3%; ">
                                
										
                                    <label>Nome</label>
                                    <label title="Tel1: <?php echo $telefone1; ?> 
Tel2: <?php echo $telefone2; ?> 
Tel3: <?php echo $telefone3; ?> 
Mail: <?php echo $email; ?>" style="margin-top: 0; float: right; color: #0088cc">Contacto</label>
                                    <input name="nome" type="text" class="form-control input-lg" value="<?php echo $nome; ?>" readonly/>
                                </div>
                                
                                <div style="width: 15%; float: left; overflow: hidden; padding-left:3%; padding-top:6%; ">
                                    <a href="index.php?pagina=Editar_Cliente&id=<?php echo $idcliente; ?>" target="_blank"><label class="form-control  btn btn-primary hidden-xs" style="">Perfil</label> </a>
                                </div>
                            </div>
                    
                        <div style="float: left; width: 75%; margin: 0 auto; margin-top: -10px;">
                            
                            <h4 style="margin-top: 0;">Equipamento</h4>
                            
                            <div class="form-group mb-lg" style="width: 30%; overflow: hidden; float: left;margin-right:10px;">
                                <label style="margin-top: 0;">ID_Equipamento</label>
                                <input name="idequipamento" type="text" class="form-control input-lg"  value="<?php echo $idequipamento; ?>" readonly/>
                            </div>
                            
                        	 <?php
								$consultatipo="select * from tipo_equipamento where id_tipo='".$tipoequipamento."'";
                                    $resultconsultatipo=mysqli_query($ligax,$consultatipo);

                                    if($resultconsultatipo){

                                    while($registo = mysqli_fetch_assoc($resultconsultatipo)){
                                        $id_tipo=$registo['id_tipo'];
                                        $equipamento=$registo['equipamento'];
                                        ?>
                                       
                                        <?php
                                    }
                                    
                                }
                                ?>
                            <div class="form-group mb-lg" style="width: 60%; overflow: hidden; float : right;">
                                <label style="margin-top: 0;">Tipo</label>
                                <input name="tipo" type="text" class="form-control input-lg"  value="<?php echo $equipamento; ?>" readonly/>
                            </div>
                            </div>
                        
                    
                    
                        <div style="float: right; width: 25%; margin: 0 auto; margin-top: -10px;">
                            
                            <h4 style="margin-top: 0;float:right;">Reparação</h4>
                            
                            <div class="form-group mb-lg" style="width: 60%; overflow: hidden;float:right;">
                                <label style="margin-top: 0;">ID_Reparação</label>
                                <input name="idreparacao" type="text" class="form-control input-lg"  value="<?php echo $idreparacao; ?>" readonly/>
                            </div>
                        </div>
                            

                       
                            <div class="form-group mb-lg" style="width: 30%; margin: 0 auto;  float: left; overflow: hidden;">
                            <label style="margin-top: 0;">Marca</label>
                           
                             
												<?php 
												$marcaatual="select * from marca where id_marca='".$marca."' ";
												$resultmarca=mysqli_query($ligax,$marcaatual);
												$registo = mysqli_fetch_assoc($resultmarca);
												$marcaatual=$registo['marca'];
												?>
												
												 <input name="tipo" type="text" class="form-control input-lg"  value="<?php echo $marcaatual; ?>" readonly />
											
											
                        </div>
                        <div class="form-group mb-lg" style="width: 30%; float: right; overflow: hidden;">
                            <label style="margin-top: 0;">Nº Série</label>
                            <input name="nserie" type="text" class="form-control input-lg"  value="<?php echo $sn ;?>" readonly />
                        </div>

                        <div class="form-group mb-lg" style="width: 30%; margin: 0 auto; overflow: hidden;">
                            <label style="margin-top: 0;">Modelo</label>
                            <input name="modelo" type="text" class="form-control input-lg"  value="<?php echo $modelo; ?>" readonly />
                        </div>
  <div class="form-group mb-lg" style="width: 100%; float: left; overflow: hidden;">
                        <div style="width: 40%; float: left; overflow: hidden;">
                            <label style="margin-top: 0;">Password SO</label>
                            <input name="pass" type="text" class="form-control input-lg"  value="<?php echo $pass ;?>" />
                        </div>
                        
                        <div style="width: 40%; float: right; overflow: hidden;">
                            <label style="margin-top: 0;">Password BIOS</label>
                            <input name="passbios" type="text" class="form-control input-lg"  value="<?php echo $passbios ;?>"  />
                        </div>
                        </div>
                    <h4 style="margin-top: 0; margin-bottom: 25px;">Acessórios</h4>

                        <?php

                            $altera="Select * from acessorios";
                            $result= mysqli_query($ligax,$altera); 

                            
                            while($registo = mysqli_fetch_assoc($result)){
                            $id_acessorio=$registo['id_acessorio'];
                            $acessorios=$registo['acessorios'];
                            
                           $procura_acessorio="select id_acessorio from reparacao_acessorio where id_reparacao='".$idreparacao."' and id_acessorio='".$id_acessorio."';";
		                   
		                   $result_procura_acessorio=mysqli_query($ligax,$procura_acessorio);
		                    if ($result_procura_acessorio){
			                    $num=mysqli_num_rows($result_procura_acessorio);
			                    if($num>0){
                        ?>

                        <div class="form-group mb-lg" style="width: 25%; float: left; margin-top: -20px;">
                            <input name="acessorio[]"   value="<?php echo $id_acessorio; ?>" type="checkbox" class="" style="transform: scale(1.5); margin-right: 2%; margin-top: 0;"/>
                            <label style="margin-top: 0;"><?php echo $acessorios; ?></label>
                        </div>
                        <?php 
                        } else { ?>
                             <div class="form-group mb-lg" style="width: 25%; float: left; margin-top: -20px;">
                            <input name="acessorio[]"  value="<?php echo $id_acessorio; ?>" type="checkbox" class="" style="transform: scale(1.5); margin-right: 2%; margin-top: 0;"/>
                            <label style="margin-top: 0;"><?php echo $acessorios; ?></label>
                        </div>
                            
                        <?php }
		                        
		                        
		                    }
		                        
		                    }
                        ?>
                        <div class="form-group mb-lg" style="width: 100%; float: left; overflow: hidden; margin-top: -20px;">
                            <label style="margin-top: 0;">Outro</label>
                            <input name="outroacess" type="text" class="form-control input-lg" value="<?php echo $outroacess; ?>" />
                        </div>

                    <h4 style="width: 100%; float: left; margin-top: 0; margin-bottom: 25px;">Avaria</h4>
                    
                        <?php

                        $altera="Select * from avarias";
                        $result= mysqli_query($ligax,$altera); 

                        //Vai à base de dados selecionar os registos entre dois limites
                        while($registo = mysqli_fetch_assoc($result)){
                        $id_avaria=$registo['id_avaria'];
                        $avarias=$registo['avarias'];
                 
                        $procura_avaria="select id_avaria from reparacao_avaria where id_reparacao='".$idreparacao."' and id_avaria='".$id_avaria."';";
		                   
		                   $result_procura_avaria=mysqli_query($ligax,$procura_avaria);
		                    if ($result_procura_avaria) {
			                    $num=mysqli_num_rows($result_procura_avaria);
			                    if($num>0){
                        ?>
                        <div class="form-group mb-lg" style="width: 25%; float: left; margin-top: -20px;">
                        <input name="avaria[]" value="<?php echo $id_avaria; ?>" type="checkbox"  class="" style="transform: scale(1.5); margin-right: 2%;"/>
                        <label style="margin-top: 0;"><?php echo $avarias ?></label>
                        </div>
                        <?php } else {
                        ?>

                        <div class="form-group mb-lg" style="width: 25%; float: left; margin-top: -20px;">
                        <input name="avaria[]" value="<?php echo $id_avaria; ?>" type="checkbox" class="" style="transform: scale(1.5); margin-right: 2%;"/>
                        <label style="margin-top: 0;"><?php echo $avarias ?></label>
                        </div>
                        <?php } } } ?>
                        <div class="form-group mb-lg" style="width: 100%; float: left; overflow: hidden; margin-top: -20px;">
                        <input name="outraavaria" type="text" class="form-control input-lg" value="<?php echo $outraavaria; ?>" />
                        </div>

                        <div class="form-group mb-lg" style="width: 100%; float: left; overflow: hidden; margin-top: -20px;">
                        <label style="margin-top: 0;">Descrição</label>
                        <textarea name="descricao" type="textarea" class="form-control input-lg" value="<?php echo $descricao; ?>" ></textarea>
                        </div>

                            <div class="row">
                                <div class="col-sm-12 mb-lg">
                                    <input name="inserir_reparacao" value="Inserir reparação" type="submit" class="btn btn-primary hidden-xs" style="width: 100%;"></input>
                                </div>
                            </div>
                        </form>
</div>
			
                    </div>
                </div>

            <p class="text-center text-muted mt-md mb-md">&copy; Copyright 2018. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
        </div>

    </section>

</body>

