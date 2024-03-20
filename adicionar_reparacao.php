

<head>

    <style>

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

    </style>

</head>

<body>


    <!-- start: page -->
    <section class="body-sign">
        <div class="center-sign">
            <a href="index.php?pagina=home" class="logo pull-left">
                <img src="mixtura.png" height="54" alt="Porto Admin" style="width: 250px;"/>
            </a>

            <div class="panel panel-sign">
                <div class="panel-title-sign mt-xl text-right">
                    <h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Adicionar Reparação</h2>
                </div>
                <div class="panel-body">
                    <form method="POST" action="">

                        <div class="form-group mb-lg">
                            <label>Id equipamento</label>
                            <input name="ide" id="ide" type="text" class="form-control input-lg" />
                            <input type="hidden" id="ide2" value="">
                        </div>
                        <div class="row">
                            <div class="col-sm-12 mb-lg">
                                <input name="adicionar" value="Adicionar reparação" type="submit" class="btn btn-primary hidden-xs" style="width: 100%;" onclick="fazedordesopas();">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
     </section>
                
     
<?php
    if(isset($_POST['adicionar'])) {
       $sopa= $_POST['ide'];
       
       $query="Select * from equipamentos where id_equipamento='".$sopa."'";
       $result=mysqli_query($ligax,$query);
       
           
           if(mysqli_num_rows($result)>0){

               ?>
               
               <script type='text/javascript'>
                   
                   
                   var sopa = <?php echo $sopa; ?>
                   
                  
                   window.location.replace('index.php?pagina=nova_reparacao&ide='+sopa);
                   
                   
               </script>
               
               <?php
                
           } else {
               
               ?>
               <script>
               alert('Equipamento inexistente');
               </script>
               
               <?php
           }
       }
    
?>

         

</body>
