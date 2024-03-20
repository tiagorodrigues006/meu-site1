    <?php
      require_once("ligacao.php");

      $alert = '';

      $existe = false;

      $id = $_GET['id'];

      $query = "DELETE FROM tipostreino WHERE id=?";
      $statement = $ligax->prepare($query);
      $statement->bind_param('i',$id);
      if ($statement->execute() && $statement->affected_rows>0) {
        $alert = '<div class="alert-success">
                    <span>Tipo de Treino eliminado com sucesso!</span>
                  </div>';
        ?>
        <script type="text/javascript">
        window.open('index.php?pagina=tipos_treino','_self');
        </script>         
        <?php
      }
      else{
        $alert = '<div class="alert-danger">
                    <span>Tipo de Treino não eliminado! Tente novamente!</span>
                  </div>';        
      }
      $statement->close();



        ?>
