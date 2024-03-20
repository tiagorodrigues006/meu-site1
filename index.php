<?php
include("ligacao.php");
?>


 <?php 
 if(isset($_POST['login'])){
 	 $email=$_POST["email"];
     $pass=$_POST["password"];
     $procura="select * from utilizadores where email='".$email."';";
     $result=mysqli_query($ligax,$procura);
     if ($result) {
         $nregistos=mysqli_num_rows($result);
         if ($nregistos==1) {
         $registo=mysqli_fetch_assoc($result);
         $perfil=$registo["tipo_perfil"];
         if($perfil==-1){?>
             <script> alert("Conta desativada por favor contacte o administrador! Email")</script><?php
         } else {
                 $passwordbd=$registo["password"];
                 $pass=$pass; //ou if(password_verify($pass,$passwordbd)) no caso de ter utilizado
                 
                                   //$pass=password_hash($pass, PASSWORD_DEFAULT); no login.php
                 if($pass==$passwordbd) {
                     $_SESSION["cod_utilizador"]=$registo["cod_utilizador"];
                     $_SESSION["status"]=1;
                     $_SESSION["nome"]=$registo["nome"];
                     $_SESSION["email"]=$registo["email"];
                     $_SESSION["tipo_perfil"]=$registo["tipo_perfil"];
 
                    
                 } else {?>
                         <script> alert("Password incorreta")</script>
                         <?php
                     }
             }
     } else {?>
             <script> alert("Email incorreto ")</script>
			 <?php
if(isset($_GET['pagina'])) {
    $pagina = $_GET['pagina'];
    header("Location: $pagina");
    exit();
} else {
    echo "Nenhuma página selecionada.";
}
?>

 <?php
     }
 }}
 ?>
 

<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>mixtime</title>
		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="JSOFT Admin - Responsive HTML5 Template">
		<meta name="author" content="JSOFT.net">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="assets/vendor/fontawesome/css/all.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/vendor/fontawesome/css/all.css" />
		<link rel="stylesheet" href="assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css" />
		<link rel="stylesheet" href="assets/vendor/morris/morris.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="assets/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme-custom12.css">

		<!-- Head Libs -->
		<script src="assets/vendor/modernizr/modernizr.js"></script>

	</head>
	<body>
		<section class="body">
            

<?php

    if(isset($_SESSION["tipo_perfil"])){
        if($_SESSION["tipo_perfil"]==1){
            include("sidebar_admin.php");
        } elseif($_SESSION["tipo_perfil"]==0){
            include("sidebar_tecnico.php");
        }
        if(!isset($_GET["pagina"])) {include("home.php");}
    } else {
        include("login.php");
    }


 if(isset($_GET["pagina"])){
    $pagina=$_GET["pagina"];
    if($pagina=="registar") include("registar.php");

	if($pagina=="listar_tecnico") include("listar_tecnico.php");
	if($pagina=="listar_tecnico2") include("listartecnico2.php");
	if($pagina=="listar_tecnico3") include("listartecnico3.php");
	if($pagina=="editar_perfil") include("editar_perfil.php");
	if($pagina=="editar_perfil3") include("editar_perfil3.php");
	if($pagina=="listar_equipamentos") include("listar_equipamentos.php");
	if($pagina=="listar_cliente") include("listar_cliente.php");
	if($pagina=="password") include("password.php");
	if($pagina=="home") include("home.php");
	if($pagina=="listar_marcas") include("listar_marcas.php");
	if($pagina=="listar_avarias") include("listar_avarias.php");
	if($pagina=="listar_acessorios") include("listar_acessorios.php");
	if($pagina=="listar_tipoequipamentos") include("listar_tipoequipamentos.php");
	if($pagina=="registar_cliente") include("registar_cliente.php");
	if($pagina=="registar_acessorios") include("registar_acessorios.php");
	if($pagina=="registar_equipamentos") include("registar_equipamentos.php");
	if($pagina=="Editar_Cliente") include("editar_cliente.php");
	if($pagina=="registar_reparacoes") include("registar_reparacoes.php");
	if($pagina=="listar_reparacoes") include("listar_reparacoes.php");
	if($pagina=="registar_marcas") include("registar_marcas.php");
	if($pagina=="registar_acessorios") include("registar_acessorios.php");
	if($pagina=="registar_acessorios2") include("registar_acessorios2.php");
	if($pagina=="editar_reparacao") include("editar_reparacao.php");
	if($pagina=="nova_reparacao") include("nova_reparacao.php");
	if($pagina=="aberto") include("aberto.php");
	if($pagina=="reparado") include("reparado.php");
	if($pagina=="fechado") include("fechado.php");
	if($pagina=="adicionar_reparacao") include("adicionar_reparacao.php");
	if($pagina=="historico") include("historico.php");
	if($pagina=="verhistorico") include("verhistorico.php");
	if($pagina=="verhistoricoperfil") include("verhistoricoperfil.php");
	if($pagina=="dc") include("sopa.php");
	if($pagina=="etiquetas") include("etiquetas.php");
	if($pagina=="logs") include("logs.php");
	if($pagina=="editar_clientehistorico") include("editar_clientehistorico.php");
	if($pagina=="listar_intervencao") include ("listar_intervencao.php");
	if($pagina=="listar_checklist") include ("listar_checklist.php");
	if($pagina=="transferenciaequipamento") include("transferenciaequipamento.php");
	if($pagina=="registar_tipotreino") include("registar_tipotreino.php");
	if($pagina=="registar_avarias")	include("registar_avarias.php");
	if($pagina=="registar_intervencao") include("registar_intervencao.php");
	if($pagina=="registar_checklist") include("registar_checklist.php");
	if($pagina=="listar_reparacoesmenu") include("listar_reparacoesmenu.php");
	if($pagina=="logstransferencia") include("logstransferencia.php");
	if($pagina=="marcacao_treino") include("marcacao_treino.php");
	if($pagina=="editar_marcacao") include("editar_marcacao.php");
	if($pagina=="treinos_registados") include("treinos_registados.php");
	if($pagina=="treinos_registados2") include("treinos_registados2.php");
	if($pagina=="treinos_registados3") include("treinos_registados3.php");
	if($pagina=="treinos_registados4") include("treinos_registados4.php");
	if($pagina=="treinos_registados5") include("treinos_registados5.php");
	if($pagina=="treinos_registados6") include("treinos_registados6.php");
	if($pagina=="treinos_registados7") include("treinos_registados7.php");
	if($pagina=="treinos_registados8") include("treinos_registados8.php");
	if($pagina=="treinos_registados9") include("treinos_registados9.php");
	if($pagina=="treinos_registados10") include("treinos_registados10.php");
	if($pagina=="treinos_registados11") include("treinos_registados11.php");
	if($pagina=="treinos_registados12") include("treinos_registados12.php");
	if($pagina=="treinos_registados13") include("treinos_registados13.php");
	if($pagina=="treinos_registados14") include("treinos_registados14.php");
	if($pagina=="treinos_registados15") include("treinos_registados15.php");
	if($pagina=="teste1") include("teste1.php");
	if($pagina=="teste3") include("teste3.php");
	if($pagina=="teste4") include("teste4.php");
	if($pagina=="teste5") include("teste5.php");
	if($pagina=="teste6") include("teste6.php");
	if($pagina=="teste7") include("teste7.php");
	if($pagina=="teste8") include("teste8.php");
	if($pagina=="teste9") include("teste9.php");
	if($pagina=="teste10") include("teste10.php");	
	if($pagina=="teste11") include("teste11.php");
	if($pagina=="teste12") include("teste12.php");
	if($pagina=="teste13") include("teste13.php");
	if($pagina=="teste14") include("teste14.php");
	if($pagina=="teste15") include("teste15.php");
	if($pagina=="tipos_treino") include("tipos_treino.php");
	if($pagina=="tabelacarregamentos") include("tabelacarregamentos.php");
	if($pagina=="eliminar_tipotreino") include("eliminar_tipotreino.php");
	if($pagina=="eliminar_treinoregistado") include("eliminar_treinoregistado.php");
	if($pagina=="edita_tipotreino") include("edita_tipotreino.php");

} else {
   
}

?>

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
		<script src="assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
		<script src="assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js"></script>
		<script src="assets/vendor/jquery-appear/jquery.appear.js"></script>
		<script src="assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
		<script src="assets/vendor/jquery-easypiechart/jquery.easypiechart.js"></script>
		<script src="assets/vendor/flot/jquery.flot.js"></script>
		<script src="assets/vendor/flot-tooltip/jquery.flot.tooltip.js"></script>
		<script src="assets/vendor/flot/jquery.flot.pie.js"></script>
		<script src="assets/vendor/flot/jquery.flot.categories.js"></script>
		<script src="assets/vendor/flot/jquery.flot.resize.js"></script>
		<script src="assets/vendor/jquery-sparkline/jquery.sparkline.js"></script>
		<script src="assets/vendor/raphael/raphael.js"></script>
		<script src="assets/vendor/morris/morris.js"></script>
		<script src="assets/vendor/gauge/gauge.js"></script>
		<script src="assets/vendor/snap-svg/snap.svg.js"></script>
		<script src="assets/vendor/liquid-meter/liquid.meter.js"></script>
		<script src="assets/vendor/jqvmap/jquery.vmap.js"></script>
		<script src="assets/vendor/jqvmap/data/jquery.vmap.sampledata.js"></script>
		<script src="assets/vendor/jqvmap/maps/jquery.vmap.world.js"></script>
		<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.africa.js"></script>
		<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.asia.js"></script>
		<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.australia.js"></script>
		<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.europe.js"></script>
		<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.north-america.js"></script>
		<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.south-america.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js"></script>


		<!-- Examples -->
		<script src="assets/javascripts/dashboard/examples.dashboard.js"></script>
	</body>
</html>