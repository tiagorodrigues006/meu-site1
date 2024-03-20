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
	
	#profiledisplay{
			display: block;
			width:100px;
   			height:100px;
   			object-fit:cover;
   			object-position:50% 50%;
		}
    </style>

</head>

<body>

<?php


    $query="select * from utilizadores where cod_utilizador='".$_SESSION['cod_utilizador']."'";
	$result=mysqli_query($ligax,$query);
    while($registo=mysqli_fetch_assoc($result)){
        $nome=$registo['nome'];
    }
  
    if(isset($_POST["inserir_reparacao"])){
   
/* Guardar os dados do vetor $_POST para a respetiva variável */
$estado=$_POST['estado'];
$outroacess=$_POST['outroacess'];
$outraavaria=$_POST["outraavaria"];
$descricao=$_POST["descricao"];
$dataentrega=$_POST["dataentrega"];

$pass=$_POST["pass"];
$passbios=$_POST["passbios"];
$idcliente=$_POST["idcliente"];
$idequipamento=$_POST["idequipamento"];

$insere="INSERT INTO reparacao (id_cliente,id_equipamento,estado,outroacess,outraavaria,descricao,dataentrada,pass,passbios)
                    VALUES ('".$idcliente."', '".$idequipamento ."','".$estado ."', '".$outroacess ."', '".$outraavaria ."', '".$descricao ."','".$dataentrega ."','".$pass ."','".$passbios ."')";
               echo $insere;    
			       
			       $result=mysqli_query($ligax,$insere);
			       $_SESSION['idr']=mysqli_insert_id($ligax);
                   $idreparacao=$_SESSION['idr'];
                    if($result==1){ 

            //Insere na tabela reparacao_acessorio o id_reparacao e respetivos ids acessorios
           
			if (isset($_POST['acessorio'])) {
				foreach ($_POST['acessorio'] as &$value) {
					$insere="INSERT INTO reparacao_acessorio(id_reparacao,id_acessorio) VALUES ('".$idreparacao."','".$value."')";
					$result_acessorio=mysqli_query($ligax,$insere);
				}
			} 
			
			//Insere na tabela reparacao_avaria o id_reparacao e respetivos ids avarias
           
			if (isset($_POST['avaria'])) {
				foreach ($_POST['avaria'] as &$value_avaria) {
					$insere_avaria="INSERT INTO reparacao_avaria(id_reparacao,id_avaria) VALUES ('".$idreparacao."','".$value_avaria."')";
					$result_avaria=mysqli_query($ligax,$insere_avaria);
				}
			} 
			
			


                     } 
                    } 
/*Se o utilizador clicou no botão registar vamos receber os dados do formulário */

//INSERIR REPARAÇÃO

//REGISTAR REPARACAO
 
	       if(isset($_GET['idc'])){
        $idcliente=$_GET['idc'];
    }
   
    
    if(isset($_GET['ide'])){
        $idequipamento=$_GET['ide'];
    }
    
        if(isset($_GET['idr'])){
        $idreparacao=$_GET['idr'];
    } else  if(isset($_SESSION['idr'])){
        $idreparacao=$_SESSION['idr'];
    } 


    $inforep="Select * from reparacao where id_reparacao='".$idreparacao."' ";
    $pesqrep=mysqli_query($ligax,$inforep);
    
    $registo=mysqli_fetch_assoc($pesqrep);
    $idcliente2=$registo['id_cliente'];
    $idequipamento2=$registo['id_equipamento'];
    $estadoatual2=$registo['estado'];
    $outroacess2=$registo['outroacess'];
    $outraavaria2=$registo['outraavaria'];
    $descricao2=$registo['descricao'];
    $dataentrada2=$registo['dataentrada'];
    $data2=$registo['data'];
    $dataentrega2=$registo['dataentrega'];
    $dataconclusao2=$registo['dataconclusao'];
    $outraint2=$registo['outraint'];
    $outrachckl2=$registo['outrachckl'];
    $observacao2=$registo['observacao'];
    $pass=$registo['pass'];
    $anexo_nome2=$registo['anexo_nome'];
    $passbios=$registo['passbios'];
    $valor2=$registo['valor'];
    $aviso2=$registo['aviso'];
    $pago2=$registo['pago'];
    $estado2=$registo['estado'];
    $label2[1]=$registo['label1'];
    $label2[2]=$registo['label2'];
    $label2[3]=$registo['label3'];
    $label2[4]=$registo['label4'];
    $label2[5]=$registo['label5'];
    $label2[6]=$registo['label6'];
    $label2[7]=$registo['label7'];
    $label2[8]=$registo['label8'];
    $label2[9]=$registo['label9'];
    $label2[10]=$registo['label10'];
    
    



//EDITAR REPARACAO



if(isset($_POST["registar_reparacao"])){

/* Guardar os dados do vetor $_POST para a respetiva variável */
$estado=$_POST['estado'];
$outroacess=$_POST['outroacess'];
$outraavaria=$_POST["outraavaria"];
$descricao=$_POST["descricao"];
$dataentrega=$_POST["dataentrega"];
$dataconclusao=$_POST["dataconclusao"];
$pass=$_POST["pass"];
$passbios=$_POST["passbios"];

    $tarefa = "";

    if($estado != $estado2){
       

            if($estado=="1") {
                $estado3= "Entrada";
                  
                } else if($estado=="2") {
                $estado3="Urgente";
                }
                else if($estado=="3") {
                 $estado3= "Em Reparação";
                }
                else if($estado=="4") {
                    $estado3= "Aguarda Orçamento";
                }
                else if($estado=="5") {
                    $estado3= "Aguarda Material";
                }
                else if($estado=="6") {
                    $estado3= "Standby / Exterior";
                }
                else if($estado=="7") {
                    $estado3= "Sem reparação";
                }
                else if($estado=="8") {
                    $estado3= "Reparado";
                 }
                else if($estado=="9") {
                    $estado3= "Fechado";
                   }
               
                else {
                    $estado3= "Erro";
                }
    

        $tarefa_estado = "Estado $estado3";

        $tarefa = "$tarefa $tarefa_estado";

    }

    if($outroacess != $outroacess2){

        $tarefa_outroacess = "Outro acessório $outroacess";

        $tarefa = "$tarefa, $tarefa_outroacess";

    }

    if($outraavaria != $outraavaria2){

        $tarefa_outraavaria = "Outra avaria $outraavaria";

        $tarefa = "$tarefa, $tarefa_outraavaria";

    }

    if($descricao != $descricao2){

        $tarefa_descricao = "Descrição $descricao";

        $tarefa = "$tarefa, $tarefa_descricao";

    }

    if($pass != $pass2){

        $tarefa_pass = "Pass $pass";

        $tarefa = "$tarefa, $tarefa_pass";

    }

    if($passbios != $passbios2){

        $tarefa_passbios = "Passbios $passbios";

        $tarefa = "$tarefa, $tarefa_passbios";

    }



                    $atualizar="UPDATE reparacao set estado='".$estado."', outroacess='".$outroacess."',
                    outraavaria='".$outraavaria."', descricao='".$descricao."', dataentrega='".$dataentrega."', dataconclusao='".$dataconclusao."', pass='".$pass."', passbios='".$passbios."' 
                    where id_reparacao='".$_POST['idreparacao']."'";
			        $result=mysqli_query($ligax,$atualizar);

                    if($result==1){ 

                        $logs="INSERT INTO logs (nome_utilizador,tarefa,data_realizacao) VALUES ('".$nome."', '".$tarefa."',now())";
			            $resulte=mysqli_query($ligax,$logs);

            //Insere na tabela reparacao_acessorio o id_reparacao e respetivos ids acessorios
            $delete="delete from reparacao_acessorio where id_reparacao='".$_POST['idreparacao']."'";
			$result_delete=mysqli_query($ligax,$delete);
			if (isset($_POST['acessorio'])) {
				foreach ($_POST['acessorio'] as &$value) {
					$insere="INSERT INTO reparacao_acessorio(id_reparacao,id_acessorio) VALUES ('".$_POST['idreparacao']."','".$value."')";
					$result_acessorio=mysqli_query($ligax,$insere);
				}
			} 
			
			//Insere na tabela reparacao_avaria o id_reparacao e respetivos ids avarias
            $delete="delete from reparacao_avaria where id_reparacao='".$_POST['idreparacao']."'";
			$result_delete=mysqli_query($ligax,$delete);
			if (isset($_POST['avaria'])) {
				foreach ($_POST['avaria'] as &$value_avaria) {
					$insere_avaria="INSERT INTO reparacao_avaria(id_reparacao,id_avaria) VALUES ('".$_POST['idreparacao']."','".$value_avaria."')";
					$result_avaria=mysqli_query($ligax,$insere_avaria);
				}
			} 
			
			


                    } 
                    } 
                    
//REGISTAR INTERVENCAO

if(isset($_POST["registar_intervencao"])){
if (isset($_POST['intervencao'])){
    $i=1;
				foreach ($_POST['intervencao'] as &$value) {
				    $interv[$i]=$value; $i=$i+1;
				} }
/* Guardar os dados do vetor $_POST para a respetiva variável */
        $estado=$_POST['estado'];
        $dataconclusao=$_POST["dataconclusao"];
         $dataentrega=$_POST["dataentrega"];
        $outraint=$_POST["outraint"];
        $outrachckl=$_POST["outrachckl"];
        $observacao=$_POST["observacao"];
        $pass=$_POST["pass"];
        $passbios=$_POST["passbios"];
        $valor=$_POST['valor'];
        if(isset($_POST['aviso'])) { $aviso=1;} else { $aviso=0;} ;
        if(isset($_POST['pago'])) { $pago=1;} else { $pago=0;} ;

        $tarefa = "";
        

        if($estado != $estado2){

            if($estado=="1") {
                $estado3= "Entrada";
                  
                } else if($estado=="2") {
                $estado3="Urgente";
                }
                else if($estado=="3") {
                 $estado3= "Em Reparação";
                }
                else if($estado=="4") {
                    $estado3= "Aguarda Orçamento";
                }
                else if($estado=="5") {
                    $estado3= "Aguarda Material";
                }
                else if($estado=="6") {
                    $estado3= "Standby / Exterior";
                }
                else if($estado=="7") {
                    $estado3= "Sem reparação";
                }
                else if($estado=="8") {
                    $estado3= "Reparado";
                 }
                else if($estado=="9") {
                    $estado3= "Fechado";
                   }
               
                else {
                    $estado3= "Erro";
                }
    
    
            $tarefa_estado = "Estado $estado3";

   
            $tarefa = "$tarefa $tarefa_estado";
    
        }
    
        if($dataconclusao != $dataconclusao2){
    
            $tarefa_dataconclusao = "Data de conclusão $dataconclusao";
    
            $tarefa = "$tarefa, $tarefa_dataconclusao";
    
        }
    
        if($data_entrega != $data_entrega2){
    
            $tarefa_data_entrega = "Data de Entrega $data_entrega";
    
            $tarefa = "$tarefa, $tarefa_data_entrega";
    
        }
    
        if($outraint != $outraint2){
    
            $tarefa_outraint = "Outra intervenção $outraint";
    
            $tarefa = "$tarefa, $tarefa_outraint";
    
        }
    
        if($outrachckl != $outrachckl2){
    
            $tarefa_outrachckl = "Outra checklist $outrachckl";
    
            $tarefa = "$tarefa, $tarefa_outrachckl";
    
        }
    
        if($observacao != $observacao2){
    
            $tarefa_observacao = "Observação $observacao";
    
            $tarefa = "$tarefa, $tarefa_observacao";
    
        }
        if($pass != $pass2){
    
            $tarefa_pass = "Password $pass";
    
            $tarefa = "$tarefa, $tarefa_pass";
    
        }
        if($passbios != $passbios2){

            $tarefa_passbios = "Passbios $passbios";
    
            $tarefa = "$tarefa, $tarefa_passbios";
    
        }
        if($valor != $valor2){

            $tarefa_valor = "Valor $valor";
    
            $tarefa = "$tarefa, $tarefa_valor";
    
        }

        //AINDA NAO ESTA A FUNCIONAR(esta a mandar os dados da ultima atualizacao)
        if($interv[1] != $label2[1]){
            if($interv[1]=="1") {
                $interv3[1]= "Atualizar Drivers";
                  
                } 
                else if($interv[1]=="2") {
                    $interv3[1]="Drivers Instalados";
                    }
                    else if($interv[1]=="3") {
                        $interv3[1]="Formatar";
                        }
                        else if($interv[1]=="4") {
                            $interv3[1]="Guardar Dados";
                            }
                            else if($interv[1]=="5") {
                                $interv3[1]="Instalar Office";
                                }
                                else if($interv[1]=="6") {
                                    $interv3[1]="Windows 10";
                                    }
               
                else {
                    $interv3[1]= "Erro";
                }
    

            $tarefa_label = "Label1 $interv3[1]";
    
            $tarefa = "$tarefa, $tarefa_label";
    
        }
        if($interv[2] != $label2[2]){
            if($interv[2]=="1") {
                $interv3[2]= "Atualizar Drivers";
                  
                } 
                else if($interv[2]=="2") {
                    $interv3[2]="Drivers Instalados";
                    }
                    else if($interv[2]=="3") {
                        $interv3[2]="Formatar";
                        }
                        else if($interv[2]=="4") {
                            $interv3[2]="Guardar Dados";
                            }
                            else if($interv[2]=="5") {
                                $interv3[2]="Instalar Office";
                                }
                                else if($interv[2]=="6") {
                                    $interv3[2]="Windows 10";
                                    }
               
                else {
                    $interv3[2]= "Erro";
                }

            $tarefa_label2 = "Label2 $interv3[2]";
    
            $tarefa = "$tarefa, $tarefa_label2";
    
        }
        if($interv[3] != $label2[3]){

            $tarefa_label3 = "Label3 $interv[3]";
    
            $tarefa = "$tarefa, $tarefa_label3";
    
        }
        if($interv[3] != $label2[3]){

            $tarefa_label3 = "Label3 $interv[3]";
    
            $tarefa = "$tarefa, $tarefa_label3";
    
        }
        if($interv[4] != $label2[4]){

            $tarefa_label4 = "Label4 $interv[4]";
    
            $tarefa = "$tarefa, $tarefa_label4";
    
        }
        if($interv[5] != $label2[5]){

            $tarefa_label5 = "Label5 $interv[5]";
    
            $tarefa = "$tarefa, $tarefa_label5";
    
        }
        if($interv[6] != $label2[6]){

            $tarefa_label6 = "Label6 $interv[6]";
    
            $tarefa = "$tarefa, $tarefa_label6";
    
        }
        if($interv[7] != $label2[7]){

            $tarefa_label7 = "Label7 $interv[7]";
    
            $tarefa = "$tarefa, $tarefa_label7";
    
        }
        if($interv[8] != $label2[8]){

            $tarefa_label8 = "Label8 $interv[8]";
    
            $tarefa = "$tarefa, $tarefa_label8";
    
        }
        

    

        $atualizar="UPDATE reparacao set estado='".$estado."',  label1='".$interv[1]."', label2='".$interv[2]."', label3='".$interv[3]."', 
            label4='".$interv[4]."', label5='".$interv[5]."', label6='".$interv[6]."', label7='".$interv[7]."', label8='".$interv[8]."', label9='".$interv[9]."', label10='".$interv[10]."', dataentrega='".$dataentrega."', dataconclusao='".$dataconclusao."', outraint='".$outraint."', 
        valor='".$valor."', aviso='".$aviso."', pago='".$pago."', outrachckl='".$outrachckl."', observacao='".$observacao."' where id_reparacao='".$_POST['idreparacao']."'";
			        $result=mysqli_query($ligax,$atualizar);
			        
                    if($result==1){ 

                        $logse="INSERT INTO logs (nome_utilizador,tarefa,data_realizacao) VALUES ('".$nome."', '".$tarefa."',now())";
			            $resultee=mysqli_query($ligax,$logse);
                        
                        if($_FILES['foto']['error']==0){
				$file_name=$_FILES['foto']['name'];
				$file_type=$_FILES['foto']['type'];
				$file_size=$_FILES['foto']['size'];
				$file_tmp=$_FILES['foto']['tmp_name'];
				$data=base64_encode(file_get_contents($file_tmp));
				$query="Update reparacao set anexo_nome='".$file_name."',anexo_tipo='".$file_type."',
		        anexo_tamanho='".$file_size."', anexo_dados='".$data."' where id_reparacao='".$_POST['idreparacao']."'";
		        echo $query;
				$result_up=mysqli_query($ligax,$query);
			}

            //Insere na tabela reparacao_checklist o id_reparacao e respetivos ids checklist
            $delete="delete from reparacao_checklist where  id_reparacao='".$_POST['idreparacao']."'";
			$result_delete=mysqli_query($ligax,$delete);
			if (isset($_POST['checklist'])) {
				foreach ($_POST['checklist'] as &$value) {
					$insere="INSERT INTO reparacao_checklist(id_reparacao,id_checklist) VALUES ('".$_POST['idreparacao']."','".$value."')";
					$result_checklist=mysqli_query($ligax,$insere);
				}
			} 
			
		
			


                        } 
                    } 




//APRESENTAR DADOS
    

    
    
    $inforep="Select * from reparacao where id_reparacao='".$idreparacao."' ";
    $pesqrep=mysqli_query($ligax,$inforep);
    
    $registo=mysqli_fetch_assoc($pesqrep);
    $idcliente=$registo['id_cliente'];
    $idequipamento=$registo['id_equipamento'];
    $estadoatual=$registo['estado'];
    $outroacess=$registo['outroacess'];
    $outraavaria=$registo['outraavaria'];
    $descricao=$registo['descricao'];
    $dataentrada=$registo['dataentrada'];
    $data=$registo['data'];
    $dataentrega=$registo['dataentrega'];
    $dataconclusao=$registo['dataconclusao'];
    $outraint=$registo['outraint'];
    $outrachckl=$registo['outrachckl'];
    $observacao=$registo['observacao'];
    $pass=$registo['pass'];
    $anexo_nome=$registo['anexo_nome'];
    $passbios=$registo['passbios'];
    $valor=$registo['valor'];
    $aviso=$registo['aviso'];
    $pago=$registo['pago'];
    $label[1]=$registo['label1'];
    $label[2]=$registo['label2'];
    $label[3]=$registo['label3'];
    $label[4]=$registo['label4'];
    $label[5]=$registo['label5'];
    $label[6]=$registo['label6'];
    $label[7]=$registo['label7'];
    $label[8]=$registo['label8'];
    $label[9]=$registo['label9'];
    $label[10]=$registo['label10'];

								
	$consultacliente="select * from cliente where id='".$idcliente."' ";
	$resultconsultaids=mysqli_query($ligax,$consultacliente);
	$registo = mysqli_fetch_assoc($resultconsultaids);
	$nome=$registo['nome'];
	$telefone1=$registo['telefone1'];
	$telefone2=$registo['telefone2'];
	$telefone3=$registo['telefone3'];
	$email=$registo['email'];
	
	$consultaequipamento="select * from equipamentos where id_equipamento='".$idequipamento."' ";
	$resultconsultaequipamento=mysqli_query($ligax,$consultaequipamento);
	$registo = mysqli_fetch_assoc($resultconsultaequipamento);
	$marca=$registo['marca'];
	$modelo=$registo['modelo'];
	$sn=$registo['sn'];
	$tipo=$registo['tipo'];
	
	$consultareparacao="select * from reparacao where id_reparacao='".$idreparacao."' ";
	$resultconsultareparacao=mysqli_query($ligax,$consultareparacao);
	$registo = mysqli_fetch_assoc($resultconsultareparacao);
	$idreparacao=$registo['id_reparacao'];
	$data=$registo['data'];
	$outroacess=$registo['outroacess'];
	$outraavaria=$registo['outraavaria'];
	$descricao=$registo['descricao'];
	$pass=$registo['pass'];
	$passbios=$registo['passbios'];
							
							
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
									<li>
										<a href="#edit" data-toggle="tab">Intervenção</a>
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
                        <form method="POST" action="" enctype="multipart/form-data">
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
                              <input name="data" type="date" class="form-control" value="<?php echo $dataentrada; ?>"/>
                        </div>
                    <div class="form-group mb-lg">
                    <h4 style="width: 100%; float: left; margin-top: 0; margin-top: -10px;">Cliente</h4>

                            <div style="width: 13%; float: left; overflow: hidden;">
                                    <label style="margin-top: 0;">ID_Cliente</label>
                                    <input name="idcliente" type="text" class="form-control input-lg" value="<?php echo $idcliente; ?>" disabled=""/>
                                </div>
                                <div style="width: 35%; float: left; overflow: hidden; padding-left:3%; ">
                                
										
                                    <label>Nome</label>
                                    <label title="Tel1: <?php echo $telefone1; ?> 
Tel2: <?php echo $telefone2; ?> 
Tel3: <?php echo $telefone3; ?> 
Mail: <?php echo $email; ?>" style="margin-top: 0; float: right; color: #0088cc">Contacto</label>
                                    <input name="nome" type="text" class="form-control input-lg" value="<?php echo $nome; ?>" disabled=""/>
                                </div>
                                
                                <div style="width: 15%; float: left; overflow: hidden; padding-left:3%; padding-top:6%; ">
                                    <a href="index.php?pagina=Editar_Cliente&id=<?php echo $idcliente; ?>"><label class="form-control  btn btn-primary hidden-xs" style="">Perfil</label> </a>
                                </div>
                            </div>
                    
                        <div style="float: left; width: 75%; margin: 0 auto; margin-top: -10px;">
                            
                            <h4 style="margin-top: 0;">Equipamento</h4>
                            
                            <div class="form-group mb-lg" style="width: 30%; overflow: hidden; float: left;margin-right:10px;">
                                <label style="margin-top: 0;">ID_Equipamento</label>
                                <input name="idequipamento" type="text" class="form-control input-lg"  value="<?php echo $idequipamento; ?>" disabled=""/>
                            </div>
                            
                        	 <?php
								$consultatipo="select * from tipo_equipamento where id_tipo='".$tipo."'";
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
                                <input name="tipo" type="text" class="form-control input-lg"  value="<?php echo $equipamento; ?>" disabled=""/>
                            </div>
                            </div>
                        
                    
                    
                        <div style="float: right; width: 25%; margin: 0 auto; margin-top: -10px;">
                            
                            <h4 style="margin-top: 0;float:right;">Reparação</h4>
                            
                            <div class="form-group mb-lg" style="width: 60%; overflow: hidden;float:right;">
                                <label style="margin-top: 0;">ID_Reparação</label>
                                <input name="idreparacao" type="text" class="form-control input-lg"  value="<?php echo $idreparacao; ?>" disabled=""/>
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
												
												 <input name="tipo" type="text" class="form-control input-lg"  value="<?php echo $marcaatual; ?>" disabled="" />
											
											
                        </div>
                        <div class="form-group mb-lg" style="width: 30%; float: right; overflow: hidden;">
                            <label style="margin-top: 0;">Nº Série</label>
                            <input name="nserie" type="text" class="form-control input-lg"  value="<?php echo $sn ;?>" disabled="" />
                        </div>

                        <div class="form-group mb-lg" style="width: 30%; margin: 0 auto; overflow: hidden;">
                            <label style="margin-top: 0;">Modelo</label>
                            <input name="modelo" type="text" class="form-control input-lg"  value="<?php echo $modelo; ?>" disabled="" />
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
                            <input name="acessorio[]" checked  value="<?php echo $id_acessorio; ?>" type="checkbox" class="" style="transform: scale(1.5); margin-right: 2%; margin-top: 0;"/>
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
                            <label style="margin-top: 0;"></label>
                            <input name="outroacess" type="text" class="form-control input-lg" value="<?php echo $outroacess; ?>" placeholder="Outro Acessório" />
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
                        <input name="avaria[]" value="<?php echo $id_avaria; ?>" type="checkbox" checked class="" style="transform: scale(1.5); margin-right: 2%;"/>
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
                        <label style="margin-top: 0;"></label>
                        <input name="outraavaria" type="textarea" class="form-control input-lg" value="<?php echo $outraavaria; ?>" placeholder="Outra Avaria" />
                        </div>

                        <div class="form-group mb-lg" style="width: 100%; float: left; overflow: hidden; margin-top: -20px;">
                        <label style="margin-top: 0;">Descrição</label>
                        <input name="descricao" type="textarea" class="form-control input-lg" value="<?php echo $descricao; ?>" />
                        </div>

                            <div class="row">
                                <div class="col-sm-12 mb-lg">
                                    <input name="registar_reparacao" value="Editar reparação" type="submit" class="btn btn-primary hidden-xs" style="width: 100%;"></input>
                                </div>
                            </div>
                        </form>
</div>
			<div id="edit" class="tab-pane">
                        <form method="POST" action="" enctype="multipart/form-data">
                        <input name="idreparacao" type="hidden" value="<?php echo $idreparacao; ?>"> 
                        <div class="form-group mb-lg" style="width: 55%; float: left; overflow: hidden; height: 285px;">
                       
                        <h4 style="margin-top: 0;">Trabalho Efetuado</h4>
                          
                          
                           <?php 
                           $i=1;
                           while($i<=10){
                              
                               ?>
                               <select name="intervencao[]" style="width: 40%; font-size: 12px;" >
                                
                                <option value="" selected></option>
                                <?php 
                                    $intervencoes="Select * from  intervencao order by intervencao asc";
                                    $pesqintervencoes=mysqli_query($ligax,$intervencoes);
                                    while($registo=mysqli_fetch_assoc($pesqintervencoes)){
                                        $idinterv=$registo['id_intervencao'];
                                        $interv=$registo['intervencao'];
                                        ?>
                                        <option <?php if( $label[$i]==$idinterv) { echo "selected"; } ?> value="<?php echo $idinterv; ?>"><?php echo $interv; ?></option>
                                       
                                        <?php
                                    }
                                    
                                ?>
                            </select>
                            &nbsp;
                               <?php   $i=$i+1; } ?>
                               
                              </div>
                               
                              
                           
                            
                            
                            
                        <div class="form-group mb-lg" style="width: 45%; float: right; height: 285px;">
                           <h4 style="margin-top: 0;">Check List</h4>

                        <?php

                            $altera="Select * from checklist";
                            $result= mysqli_query($ligax,$altera); 

                            //Vai à base de dados selecionar os registos entre dois limites
                            while($registo = mysqli_fetch_assoc($result)){
                            $id_checklist=$registo['id_checklist'];
                            $check=$registo['check'];
                            
                            
                            $procura_checklist="select id_checklist from reparacao_checklist where id_reparacao='".$idreparacao."' and id_checklist='".$id_checklist."';";
		                   
		                   $result_procura_checklist=mysqli_query($ligax,$procura_checklist);
		                    if ($result_procura_checklist){
			                    $num=mysqli_num_rows($result_procura_checklist);
			                    if($num>0){
                        ?>
                            <div class="form-group mb-lg" style="width: 50%; float: right; margin-top:0.2%;">
                            <input name="checklist[]" checked value="<?php echo $id_checklist; ?>" type="checkbox" class="" style="transform: scale(1.5); margin-right: 2%;"/>
                            <label style="margin-top: 0;"><?php echo $check; ?></label>
                        </div>
                        <?php  } else {
                        ?>

                        <div class="form-group mb-lg" style="width: 50%; float: right; margin-top:0.2%;">
                            <input name="checklist[]" value="<?php echo $id_checklist; ?>" type="checkbox" class="" style="transform: scale(1.5); margin-right: 2%;"/>
                            <label style="margin-top: 0;"><?php echo $check; ?></label>
                        </div>
                        <?php }
		                    }
                        
                         } ?>
                         </div>
                         
                          <div class="form-group mb-lg" style="width: 60%; overflow: hidden; float: left;">
                            <label style="margin-top: 0;">Outra Intervenção</label>
                            <textarea name="outraint" type="text" class="form-control input-lg" ><?php echo $outraint; ?></textarea>
                        </div>
                         
                            <div class="form-group mb-lg" style="width: 30%; float: right; overflow: hidden;">
                                <div class="input-group">
                				<label>Anexo</label>
                					<?php if($anexo_nome==NULL){ ?>
                		    			<img src='../img/image2.png' onclick="triggerclick()" id="profiledisplay" >
                		    		<?php } else { ?>
                		    			<img src="showfile_anexo.php?id_reparacao=<?php echo $idreparacao;?>" onclick="triggerclick()" id="profiledisplay" />
                		    			
                		    		<?php } ?>
                						<input type="file" name="foto" onchange="displayimage(this)" id="foto" style="display: none;" />
                				</div>
                        </div>
                  
                        <div class="form-group mb-lg" style="width: 60%; float: left; overflow: hidden;">
                            <label style="margin-top: 0;">Observações</label>
                            <textarea name="observacao" type="text" class="form-control input-lg" style="height: 70px;" /><?php echo $observacao; ?></textarea>
                        </div>
                        
                        
                        <div class="form-group mb-lg" style="width: 30%; float: right; overflow: hidden;">
                            <label style="margin-top: 0;">Valor</label>
                            <input name="valor" type="number" min="0.00" step="0.01" class="form-control input-lg" value="<?php echo $valor; ?>" />
                        

                       
                            <label style="margin-top: 0;">Pago</label>
                            <input name="pago" value="1" type="checkbox" class="form-group mb-lg"  <?php if($pago==1) echo "checked";?> />
  
                        <br>
  
                            <label style="margin-top: 0;">Data de Conclusão</label>
                            <input name="dataconclusao" type="date" class="form-control" value="<?php echo $dataconclusao; ?>" style="font-size: 16px;" />
                            
                            
                            <label style="margin-top: 0;">Cliente Avisado</label>
                            <input name="aviso" value="1" type="checkbox" class="form-group mb-lg"  <?php if($aviso==1) echo "checked";?> />
                            
                        <br>
                      
                            <label style="margin-top: 0;">Data de Entrega</label>
                            <input name="dataentrega" type="date" class="form-control" value="<?php echo $dataentrega; ?>" />
                     
                        <br>
                     
                           
                           
                        </div>
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
                     
                        
                            <div class="row">
                                <div class="col-sm-12 mb-lg">
                                    <input name="registar_intervencao" value="Registar intervenção" type="submit" class="btn btn-primary hidden-xs" style="width: 100%;"></input>
                                </div>
                            </div>
                        </form>
</div>
                    </div>
                </div>

            <p class="text-center text-muted mt-md mb-md">&copy; Copyright 2018. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
        </div>

    </section>

    <script>
			function triggerclick(){
				document.querySelector('#foto').click();
			}
			function displayimage(e){
				if (e.files[0]) {
					var reader = new FileReader();

					reader.onload = function(e){
						document.querySelector('#profiledisplay').setAttribute('src',e.target.result);
					}
					reader.readAsDataURL(e.files[0]);
				}
			}
		</script>

</body>

</html>