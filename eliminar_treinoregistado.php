<?php
require_once("ligacao.php");

$alert = '';
$id = $_GET['id'];







$existe = false;



$query = "DELETE FROM treinos WHERE id=?";
$statement = $ligax->prepare($query);
$statement->bind_param('i',$id);
if ($statement->execute() && $statement->affected_rows>0) {
  
  $saldoo=$registo['saldo'];
  $valortreinoo=$registo['valortreino'];


  $novosaldo = intval($saldoo) + intval($valortreinoo);

  $query = "UPDATE cliente SET saldo='".$novosaldo."' WHERE nome='".$nome."'";
  $st = $ligax->prepare($query);

  if ($st->execute() && $st->affected_rows>0){ 

  }

  $alert = '<div class="alert-success">
              <span>Treino eliminado com sucesso!</span>
            </div>';
  ?>
  <script type="text/javascript">
  window.open('index.php?pagina=treinos_registados','_self');
  </script>         
  <?php
}
else{
  $alert = '<div class="alert-danger">
              <span>Treino não eliminado! Tente novamente!</span>
            </div>';        
}
$statement->close();



  ?>
