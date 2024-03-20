<?php
include("ligacao.php");
// TENS DE FAZER A LIGAÇÃO A BD EM TODOS OS PRINTS PQ NÃO DAMOS INCLUDE NO INDEX E O FICHEIRO DE LIGAÇÃO É SEPARADO
?>

<html>
	<head>
		<title>Ficha Informativa</title>
		<!-- Web Fonts  -->
		<link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />

		<!-- Invoice Print Style -->
		<link rel="stylesheet" href="assets/stylesheets/invoice-print.css" />
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		
		<style>
		    header{
		        display: none !important;
		    }
		    
		    aside{
		        display: none !important;
		    }
		   

		</style>
	</head>
	<body>
	    
	    <?php
	    
	    if(isset($_GET['idc'])){
	        $idc=$_GET['idc'];
	    }
	    
	    if(isset($_GET['idr'])){
	        $idr=$_GET['idr'];
	    }
	    
	    if(isset($_GET['ide'])){
	        $ide=$_GET['ide'];
	    }
	    
	    
	    $pesquisa="Select * from cliente where id='".$idc."'";
	    $resultcliente=mysqli_query($ligax,$pesquisa);
	    $registo=mysqli_fetch_assoc($resultcliente);
	    
	    $nomecl=$registo['nome'];
	    
	    $inforep="Select * from reparacao where id_reparacao='".$idr."' ";
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
	
	$consultaequipamento="select * from equipamentos where id_equipamento='".$idequipamento."' ";
	$resultconsultaequipamento=mysqli_query($ligax,$consultaequipamento);
	$registo = mysqli_fetch_assoc($resultconsultaequipamento);
	$marca=$registo['marca'];
	$modelo=$registo['modelo'];
	$sn=$registo['sn'];
	$tipo=$registo['tipo'];
	    ?>
		<div class="invoice">
			<div class="bill-info">
				<div class="row">
    					<div class="col-md-6">
    						<div class="bill-to">
    							<p class="h5 mb-xs text-dark text-semibold">Nº Reparação: <?php echo $idr; ?> </p>
    						</div>
    					</div>
    					<div class="col-md-4" style="margin-top: 7px;">
    					    <div class="bill-to">
    						    <p style="h5 mb-xs text-dark text-semibold">Data Entrada <?php echo $dataentrada; ?> | Estado <?php echo $estadoatual; ?> </p>
    						</div>
    					</div>
    					<div class="col-md-12">
    					    <div class="bill-to">
    						    <h4 class="mb-xs text-dark text-bold" style="text-transform: uppercase; text-decoration: underline; font-weight: bold; margin-top: -20px;"> Ficha de Reparação </h4>
    						</div>
    					</div>
    					<div class="col-md-12">
    					    <div class="bill-to">
    						    <img style="float:left; margin-right: 5px;" src="mixtura 2.jpg" />
    						    <p class="h6 mb-xs text-dark text-semibold">Rua 15, nº751 | 4500-150 Espinho</p>
    							<p class="h6 mb-xs text-dark text-semibold" style=" margin-top: -5px;">tel. 220 180 486 | geral@mixtura.pt</p>
    							<p class="h6 mb-xs text-dark text-semibold" style=" margin-top: -5px;">www.mixtura.pt</p>
    						</div>
    					</div>
				</div>
			</div>
			
			<div class="col-md-12">
    			<div class="bill-to" style="margin-top: -20px;">
    				<p class="h5 mb-xs text-dark text-semibold" style="float:left; padding-right: 10px; font-weight: bold;">Código Cliente</p>
    				<label class="h5 mb-xs text-dark text-semibold" style="width: 150px;"><?php echo $idc; ?></label>
    				<br>
    				<p class="h5 mb-xs text-dark text-semibold" style="float:left; margin-right: 5px; font-weight: bold;">Código Equipamento:</p>
    				<label class="h5 mb-xs text-dark text-semibold" style="width: 20px;"><?php echo $ide; ?></label><br>
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
                                 <label class="h5 mb-xs text-dark text-semibold;" style="font-weight: bold;"> Tipo: </label>
                                 <label class="h5 mb-xs text-dark text-semibold" style="margin-right: 10px;"><?php echo $equipamento;?></label>
                                 <label class="h5 mb-xs text-dark text-semibold;" style="font-weight: bold;"> S/N </label>
                                 <label class="h5 mb-xs text-dark text-semibold;"> <?php echo $sn;?> </label>
                                 
    				
    				<br>
    					<?php 
												$marcaatual="select * from marca where id_marca='".$marca."' ";
												$resultmarca=mysqli_query($ligax,$marcaatual);
												$registo = mysqli_fetch_assoc($resultmarca);
												$marcaatual=$registo['marca'];
												?>
    				<p class="h5 mb-xs text-dark text-semibold" style="float:left; padding-right: 10px; font-weight: bold;">Marca:</p>
    				<label class="h5 mb-xs text-dark text-semibold" style="float: left;width: 50px;"><?php echo $marcaatual;?></label><br>
    				<p class="h5 mb-xs text-dark text-semibold" style="float: left;padding-right: 10px; font-weight: bold;">Modelo:</p>
    				<label class="h5 mb-xs text-dark text-semibold" style="width: 50px;"><?php echo $modelo;?></label>
    				<br>
    				
    				<p class="h5 mb-xs text-dark text-semibold" style="padding-right: 10px; font-weight: bold;">Acessórios:</p>
    				<br>
    				
    				  <?php


                           $procura_acessorio="select * from reparacao_acessorio, acessorios where reparacao_acessorio.id_reparacao='".$idr."' and acessorios.id_acessorio=reparacao_acessorio.id_acessorio";

		                   
		                   $result_procura_acessorio=mysqli_query($ligax,$procura_acessorio);
		                    while($registo = mysqli_fetch_assoc($result_procura_acessorio)){
			                    $num=mysqli_num_rows($result_procura_acessorio);
			                    if($num>0){
			                        
			                        
                        ?>

                        <div class="form-group mb-lg" style="float: left; margin-top: -20px; margin-right: 15px;">
                            <label style="margin-top: 0;"><?php echo $registo['acessorios']; ?></label>
                        </div>
                        <?php 
                        } else { ?>
                             <div class="form-group mb-lg" style="float: left; margin-top: -20px; margin-right: 15px;">
                            <label style="margin-top: 0;"><?php echo $acessorios; ?></label>
                        </div>
                            
                        <?php }
		                        
		                        
		                    }
		                        
                        ?>
    				<br>
    				 <div class="form-group mb-lg" style="width: 100%; float: left; overflow: hidden; margin-top: -20px;">
                        <label style="margin-top: 0; font-weight: bold;">Outro</label>
                        <p style="width: 100%;"> <?php echo $outroacess; ?> <p/>
                    </div>
    				<br>
    				
    				<p class="h5 mb-xs text-dark text-semibold" style="padding-right: 10px; font-weight: bold;">Avarias:</p>
    				<br>

    				
    				  <?php


                           $procura_avaria="select * from reparacao_avaria, avarias where reparacao_avaria.id_reparacao='".$idr."' and avarias.id_avaria=reparacao_avaria.id_avaria";
                       
		                   
		                   $result_procura_avaria=mysqli_query($ligax,$procura_avaria);
		                    while($registo2 = mysqli_fetch_assoc($result_procura_avaria)){
			                    $num2=mysqli_num_rows($result_procura_avaria);
			                    if($num2>0){
			                        
			                        
                        ?>

                        <div class="form-group mb-lg" style="float: left; margin-top: -20px; margin-right: 15px;">
                            <label style="margin-top: 0;"><?php echo $registo2['avarias']; ?></label>
                        </div>
                        <?php 
                        } else { ?>
                             <div class="form-group mb-lg" style="float: left; margin-top: -20px; margin-right: 15px;">
                            <label style="margin-top: 0;"><?php echo $avarias; ?></label>
                        </div>
                            
                        <?php }
		                        
		                        
		                    }
		                        
                        ?>
    				<br>
    				<div class="form-group mb-lg" style="width: 100%; float: left; overflow: hidden; margin-top: -20px;">
                        <label style="margin-top: 0; font-weight: bold;">Descrição</label>
                        <p style="width: 100%;"> <?php echo $outraavaria; ?> <p/>
                    </div>
    				<br>
    			</div>
    		</div>
    		
    		<div id="edit" class="tab-pane">
                        <input name="idreparacao" type="hidden" value="<?php echo $idreparacao; ?>"> 
                        <div class="form-group mb-lg" style="width: 55%; float: left; overflow: hidden; height: 285px;">
                       
                        <p style="margin-top: 0; font-weight: bold;">Trabalho Efetuado</p>
                          
                          
                           <?php 
                           $i=1;
                           while($i<=10){
                              
                               ?>
                            
                                
                                <?php 
                                    $intervencoes="Select * from  intervencao order by intervencao asc";
                                    $pesqintervencoes=mysqli_query($ligax,$intervencoes);
                                    while($registo=mysqli_fetch_assoc($pesqintervencoes)){
                                    
                                        $idinterv=$registo['id_intervencao'];
                                        $interv=$registo['intervencao'];
                                        ?>
                                           <p name="intervencao[]" style="width: 40%; float:left;" >
                                       <?php echo $interv;?>
                                        </p>
                                        <?php
                                        
                                    }
                                    
                                ?>
                           
                            &nbsp;
                               <?php   $i=$i+1; } ?>
                               
                              </div>
                               
                              
                           
                            
                            
                            
                        <div class="form-group mb-lg" style="width: 45%; float: right; height: 285px;">
                           <p style="margin-top: 0; font-weight: bold;">Check List</p>
                           <br>

                       <?php


                           $procura_checklist="select * from reparacao_checklist, checklist where reparacao_checklist.id_reparacao='".$idr."' and checklist.id_checklist=reparacao_checklist.id_checklist";
                       
                       
		                   
		                   $result_procura_checklist=mysqli_query($ligax,$procura_checklist);
		                    while($registo2 = mysqli_fetch_assoc($result_procura_checklist)){
			                    $num2=mysqli_num_rows($result_procura_checklist);
			                    if($num2>0){
			                        
			                        
                        ?>

                        <div class="form-group mb-lg" style="width: 33%; float: left; margin-top: -20px;">
                            <input name="acessorio[]" checked  value="<?php echo $registo2['id_checklist']; ?>" type="checkbox" disabled class="" style="transform: scale(1.5); margin-right: 2%; margin-top: 0;"/>
                            <label style="margin-top: 0;"><?php echo $registo2['nomecheck']; ?></label>
                        </div>
                        <?php 
                        } else { ?>
                             <div class="form-group mb-lg" style="width: 25%; float: left; margin-top: -20px;">
                            <input name="acessorio[]"  value="<?php echo $id_checklist; ?>" type="checkbox" class="" style="transform: scale(1.5); margin-right: 2%; margin-top: 0;"/>
                            <label style="margin-top: 0;"><?php echo $checklist; ?></label>
                        </div>
                            
                        <?php }
		                        
		                        
		                    }
		                        
                        ?>
                         </div>
                         
                          <div class="" style="width: 60%; overflow: hidden; float: left;">
                            <label style="margin-top: 0; font-weight: bold;">Outra Intervenção</label>
                            <p style="width: 100%;"> <?php echo $outraint; ?></p>
                        </div>
                       
                         
                            <div class="" style="width: 30%; float: right; overflow: hidden;">
                            <label style="margin-top: 0; font-weight: bold;">Outro</label>
                            <p style="width: 100%;"> <?php echo $outrachckl; ?> </p>
                        </div>
                  
                        <div class="" style="width: 60%; float: left; overflow: hidden;">
                            <label style="margin-top: 0; font-weight: bold;">Observações</label>
                           <p style="width: 100%;"> <?php echo $observacao; ?></p>
                        </div>
                        
                        
                        <div class="" style="width: 30%; float: right; overflow: hidden;">
                            <label style="margin-top: 0; font-weight: bold;">Valor</label>
                           <p style="width: 100%;"> <?php echo $valor; ?> </p>
                        </div>

  
                        <br>
  
                        <div class="" style="width: 30%; float: right; overflow: hidden;">
                            <label style="margin-top: 0; font-weight: bold;">Data de Conclusão</label>
                          <p style="width: 100%;">  <?php echo $dataconclusao; ?></p>
                        
                            
                        <br>
                      
                            <label style="margin-top: 0; font-weight: bold;">Data de Entrega</label>
                          <p style="width: 100%;"> <?php echo $dataentrega;?> </p>
                      
                            
                            
                       
                             <label style="margin-top: 0; font-weight: bold;">Pago</label>
                            <input style="margin-top: 0;" name="pago" value="1" type="checkbox" class="form-group mb-lg"  <?php if($pago==1) echo "checked";?> />
                      
                     
                        <br>
                     
         

</div>
    		



		</div>


		<script>
			window.print();
		</script>

	</body>
</html>