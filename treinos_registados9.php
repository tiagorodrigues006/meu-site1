
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

.sidebar {
    width: 250px; /* Largura inicial do sidebar */
    height: 100%; /* Altura total do sidebar */
    background-color: #f4f4f4;
    position: fixed;
    left: 0;
    top: 0;
    transition: width 0.3s ease;
    z-index: 1000;
    overflow-y: auto; /* Adicione rolagem vertical se o conteúdo for maior que a altura do sidebar */
}

.sidebar-toggle {
    position: fixed;
    left: 0;
    top: 0;
    background-color: #333;
    color: #fff;
    border: none;
    padding: 10px;
    cursor: pointer;
    z-index: 1100;
}
<style>
        /* Estilos para o botão */
        .btn-blue {
            background-color: #007bff; /* Cor de fundo azul */
            color: #fff; /* Cor do texto branco */
            padding: 10px 20px; /* Espaçamento interno */
            border: none; /* Sem borda */
            border-radius: 5px; /* Cantos arredondados */
            cursor: pointer; /* Cursor de ponteiro */
        }

        /* Estilos para quando o cursor passar sobre o botão */
        .btn-blue:hover {
            background-color: #0056b3; /* Cor de fundo azul mais escura */
        }
    </style>
</head>


<?php

//include 'includestransferencia.php';


$existe = false;

$id = "";
$idcnovo = "";
$nome2 = "";
$saldo = "";
$fatura = "";
$clienteatual="";

date_default_timezone_set('Europe/London');

$datahora = date("Y-m-d H:i:s");



if(isset($_POST['show']))
{
    $query = "SELECT * FROM cliente WHERE nome='".$_POST['nomec']."'";
    $statement = $ligax->prepare($query);
    $statement->execute();
    $statement->bind_result($id,$nome,$morada,$nif,$telefone,$email,$creditos_min,$saldo,$contrato,$tecnico);

    if($statement->fetch()) {
        $existe = true;
    
    }
    else {
        //echo "Erro: ('. $mysqli->errno .') '. $mysqli->error";
    }
    $statement->close();
}

if(isset($_POST['carregar']))
{
    $consultasaldo="select * from cliente where nome='".$_POST['nomec']."'";
    $resultconsultaids=mysqli_query($ligax,$consultasaldo);
    $registo = mysqli_fetch_assoc($resultconsultaids);
    $saldo=$registo['saldo'];



    $saldonovo = $_POST['saldonovo'];
    $saldoatualizado = intval($saldo) + intval($saldonovo);





    //echo $saldoatualizado;
    $query = "UPDATE cliente SET saldo='".$saldoatualizado."' WHERE nome='".$_POST['nomec']."'";
    $st = $ligax->prepare($query);
    
   if ($st->execute() && $st->affected_rows>0){ 

            $insere="INSERT INTO saldos
            (movimento,cliente,datacarregamento,fatura,tecnico)
            VALUES ('".$saldonovo."', '".$_POST['nomec'] ."','".$datahora ."','".$_POST['fatura']."','".$_SESSION["nome"] ."')";
            //Código PHP que executa o SQL
            $result=mysqli_query($ligax,$insere);
            //Se $result for 1, então o registo foi inserido com sucesso
            if($result==1){    
                $id=mysqli_insert_id($ligax);
                
            }

   
        ?>
    
    <script>
        alert ("Carregamento efetuado com sucesso");
    </script>

<?php
    }
}

?>





<body>
<section class="body">



    <div class="inner-wrapper">


        <section role="main" class="content-body">
            <header class="page-header">
                <h2>Bombeiros Feira</h2>

                <div class="right-wrapper pull-right">
                    <ol class="breadcrumbs" style=" margin-right: 30px;">
                        
                        <li><span>Bombeiros Feira</span></li>
                    </ol>
                </div>
            </header>


                <section class="panel">
                    <div class="panel-body">








                   

                   

                                
 <?php 
$estados="SELECT * FROM cliente ORDER BY nome";
$pesquisaestados=mysqli_query($ligax, $estados);
//$idestado=$registo['id_estado'];
?>

    <body>
    <!-- Botão que redireciona para a página http://localhost/mixtime/index.php?pagina=teste9 -->
    <button onclick="window.location.href = 'http://localhost/mixtime/index.php?pagina=teste9'" class="btn-blue">Ir para a empresa</button>
</body>



                   

              
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