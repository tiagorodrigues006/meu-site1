

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <a href="#" class="logo pull-left">
                <img src="mixtura.png" height="54" alt="Mixtura Logo" style="width: 250px;"/>
            </a>

            <div class="panel panel-sign">
                <div class="panel-title-sign mt-xl text-right">
                    <h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i>Ver Etiquetas</h2>
                </div>
                <div class="panel-body">

                    <form method="POST" action="selos_etiquetas_normal.php" target="_blank" >

                        <div class="form-group mb-lg">
                            <label>Id Equipamento</label>
                            <input name="ide" id="ide" type="text" class="form-control input-lg" />
                        </div>


                        <div class="row">
                            <div class="col-sm-12 mb-lg">
                                <input name="ver" id="ver" value="Visualizar" type="submit" class="btn btn-primary hidden-xs" style="width: 100%;"></input>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
     </section>
                
     
                   

         

</body>
