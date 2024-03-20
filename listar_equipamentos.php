
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
        top:-14px;
        cursor:pointer;
        width: 20px;
    }
    div#popupContact {
        position:absolute;
        left:50%;
        top:17%;
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
    .body-sign {
	display: table;
	height: 0vh;
	margin: 0 auto;
	max-width: 500px;
	padding: 0 15px;
	width: 100%;
	position:relative; 
		 
}
</style>

</head>
<body>

<section class="body">

    

    <div class="inner-wrapper">
        

        <section role="main" class="content-body">
            <header class="page-header">
                <h2>Lista de Equipamentos</h2>

                <form method="POST" action="#">
                <div class="right-wrapper pull-right">
                    <ol class="breadcrumbs" style=" margin-right: 30px;">
                        <li>
                            <a href="index.php">
                                <i class="fa fa-home"></i>
                            </a>
                        </li>
                        <li><span>Equipamentos</span></li>
                        <li><span>Lista de Equipamentos</span></li>
                    </ol>
                </div>
            </header>
          
            <div id="abc">
						<div id="popupContact">
					
								
								
<?php
/*Se o utilizador clicou no botão registar vamos receber os dados do formulário */
if(isset($_POST["registar"])){

$id_equipamento=$_POST['id_equipamento'];
$marca=$_POST['marca'];
$tipo=$_POST["tipo"];
$sn=$_POST["sn"];
$modelo=$_POST["modelo"];





?>
    <!-- start: page -->
    <section class="body-sign">
        <div class="center-sign">
            <a href="/" class="logo pull-left">
                <img src="assets/images/logo.png" height="54" alt="Porto Admin" />
            </a>

            <div class="panel panel-sign">
                <div class="panel-title-sign mt-xl text-right">
                <a href="index.php?pagina=listar_equipamentos"><h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Listar</h2></a>
                </div>
                <div class="panel-body">
                    <form method="POST" action="#">
					<img id="close" src="assets/images/close.png" onclick ="div_hide()">
                    <?php  
                    
                        if($flag==true){
                      
                    ?>

                        <div class="form-group mb-lg">
                            <label>Nome</label>
                            <input name="name" type="text" class="form-control input-lg" />
                        </div>

                        <div class="form-group mb-lg">
                            <label>E-mail</label>
                            <input name="email" type="email" class="form-control input-lg" />
                        </div>

                      
                        <div class="form-group mb-lg">
                            <label>Telemovel</label>
                            <input name="telefone1" type="text" class="form-control input-lg" />
                        </div>
                        <div class="form-group mb-lg">
                            <label>Telemovel2</label>
                            <input name="telefone2" type="text" class="form-control input-lg" />
                        </div>
                        <div class="form-group mb-lg">
                            <label>Telemovel-Estrangeiro</label>
                            <input name="telefone3" type="text" class="form-control input-lg" />
                        </div>

                        <div class="row">
                            <div class="col-sm-12 mb-lg">
                                <input name="registar" value="Registar" type="submit" class="btn btn-primary hidden-xs" style="width: 100%;"></input>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
     </section>
                
     
                    <?php }else {

                    // Caso não hajam erros - os dados vão ser enviados para a BD;
                    //Código SQL para inserir 1 registo na tabela cliente
                    $insere="INSERT INTO equipamentos
                    (id_equipamento,id_cliente,marca,tipo,sn,modelo)
                    VALUES ('".$id_equipamento."', '".$id_cliente ."','".$marca ."', '".$tipo ."', '".$sn ."', '".$modelo ."')";
                    //Código PHP que executa o SQL
                    $result=mysqli_query($ligax,$insere);
                    //Se $result for 1, então o registo foi inserido com sucesso
                    if($result==1){ ?>

                        <div class="success">
                            <h1>Conta criada com sucesso!</h1>
                            
                        </div>
                        <div class="pag">Clique <a href="index.php">aqui</a> para voltar para a página inicial</div>

                    <?php } else { ?>

                        <div class="error">
                            <h1>Erro ao criar a conta!</h1>
                        </div>
                            
                    <?php }
                    }
                    } else{ ?>

    <section class="body-sign">

            <div class="center-sign">
            <a href="index.php" class="logo pull-left">
					<img src="mixtura.png" height="54" alt="Mixtura" />
				</a>

                <div class="panel panel-sign">
					<div class="panel-title-sign mt-xl text-right">
					<a href="index.php?pagina=listar_equipamentos"	><h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Listar</h2></a>
                    </div>
                    <div class="panel-body">

                            <form method="POST" action="#">
							<img id="close" src="assets/images/close.png" onclick ="div_hide()">

                        
												
											
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

                            <div class="form-group mb-lg">
                            <label>Id_Cliente</label>
                            <input name="id_cliente" type="text" class="form-control input-lg" />
                        </div>

                        <div class="form-group mb-lg">
                            <label>SN</label>
                            <input name="sn" type="text" class="form-control input-lg" />
                        </div>

                      
                        <div class="form-group mb-lg">
                            <label>Modelo</label>
                            <input name="modelo" type="text" class="form-control input-lg" />
                        </div>
                       

                            <div class="row">
                                <div class="col-sm-12 mb-lg">
                                    <input name="registar" id="registar" value="Registar" type="submit" class="btn btn-primary hidden-xs" style="width: 100%;"></input>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

        </div>

        <?php } ?>

    </section>

						</div>
					</div>

<section class="panel">
							
						
<?php 
							if(isset($_POST["registar"])){
	
	/* Guardar os dados do vetor $_POST para a respetiva variável */
	$marca=$_POST['marca'];
	$id_cliente=$_POST['id_cliente'];
	$tipo=$_POST['tipo'];
	$sn=$_POST["sn"];
	$modelo=$_POST["modelo"];
	

		$insere="INSERT INTO equipamentos (id_cliente,marca,tipo,sn,modelo) VALUES ('".$id_cliente."','".$marca."', '".$tipo."','".$sn."', '".$modelo."' ) " ;
				//Código PHP que executa o SQL
				$result=mysqli_query($ligax,$insere);
				
				//Se $result for 1, então o registo foi inserido com sucesso
				if($result){ 
					?>

					<div class="success">
						<h1>Equipamento criado com sucesso!</h1>
						
					</div>
					<!--<div class="pag">Clique <a href="index.php">aqui</a> para voltar para a página inicial</div>-->

				<?php } else { ?>

					<div class="error">
						<h1>Erro ao criar o equipamento! Tente novamente!</h1>
					</div>
						
				<?php 
					}
				} 
				
				?>
							<div class="panel-body">
								<div class="row">
									<div class="col-sm-6">
										<div class="mb-md">
										
										<form method="POST" action="">
										    <label id="addToTable" class="btn btn-primary" onclick="div_show()">Adicionar <i class="fa fa-plus"></i></label>
										    &nbsp;
                                            <a href="index.php"><label class="btn btn-primary">Regressar</label></a>
										</form>
										</div>
									</div>
								</div>
								<table class="table table-bordered table-striped mb-none" id="datatable-details">
									<thead>
										<tr>
											<th style=" width: 60px;">ID Equipamento</th>
											<th style=" width: 60px;">ID Cliente</th>
											<th>Tipo</th>
											<th style=" width: 60px">Marca</th>
											<th style=" width: 60px">Modelo</th>
											<th style=" width: 60px">SN</th>
                                            <th style=" width: 30px">Perfil</th>
										</tr>
									</thead>
									<tbody>
                                    <?php
                                    $altera="Select * from equipamentos ORDER BY id_equipamento DESC";
										if(isset($_POST['procurar_equipamento'])){
											$id_cliente=$_POST['id_cliente'];
											
                                            if($tipo!="-1" && $marca!="-1"){
                                              $altera="Select * from equipamentos where id_equipamento = '".$_POST['id_equipamento']."' or id_cliente like '".$id_cliente."'
										or tipo = '".$tipo."' and marca = '".$marca."' or modelo like '".$modelo."'
										or sn like '".$sn."' ORDER BY id_equipamento DESC" ; 
                                            } else if($tipo=="-1" || $marca!="-1") {
										$altera="Select * from equipamentos where id_equipamento = '".$_POST['id_equipamento']."' or id_cliente like '".$id_cliente."'
										or tipo like '".$tipo."' or marca like '".$marca."' or modelo like '".$modelo."'
										or sn like '".$sn."' ORDER BY id_equipamento DESC" ;
                                            } else if($tipo!="-1" || $marca=="-1") {
										$altera="Select * from equipamentos where id_equipamento = '".$_POST['id_equipamento']."' or id_cliente like '".$id_cliente."'
										or tipo like '".$tipo."' or marca like '".$marca."' or modelo like '".$modelo."'
										or sn like '".$sn."' ORDER BY id_equipamento DESC" ;
										} else {
										    $altera="Select * from equipamentos ORDER BY id_equipamento DESC";
										}
										}
                                        $result= mysqli_query($ligax,$altera); 
                                        
                                        if ($result) {

                                            //Vai à base de dados selecionar os registos entre dois limites
                                            while($registo = mysqli_fetch_assoc($result)){
                                            $id_equipamento=$registo['id_equipamento'];
                                            $id_cliente=$registo['id_cliente'];
                                            $marca=$registo['marca'];
                                            $tipo=$registo['tipo'];
                                            $sn=$registo['sn']; 
                                            $modelo=$registo['modelo'];
            
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
                                            }?>

										<tr class="gradeX">
											<td style=" width: 60px; font-weight: bold; "><?php echo $id_equipamento; ?></td>
											<td><?php echo $id_cliente; ?></td>
											<td><?php echo $tipoequipamento; ?></td>
                                            <td><?php echo $marcaequipamento; ?></td>
                                            <td><?php echo $modelo; ?></td>
                                            <td><?php echo $sn; ?></td>
											<td><center><a href="index.php?pagina=Editar_Cliente&id=<?php echo $id_cliente; ?>" ><i class="fas fa-user-edit"></i></a></center></td>
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
</body>
</html>