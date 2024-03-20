<?php
	$email=$_POST["email"];
	$pass=$_POST["password"];
	$procura="select * from utilizadores where email='".$email."';";
	$result=mysqli_query($ligax,$procura);
	if ($result) {
		$nregistos=mysqli_num_rows($result);
		$registo=mysqli_fetch_assoc($result);
		$perfil=$registo["tipo_perfil"];
		if($perfil==-1){?>
			<script> alert("Conta desativada por favor contacte o administrador! Email")</script><?php
		} else {
				$passwordbd=$registo["password"];
				$pass=md5($pass); //ou if(password_verify($pass,$passwordbd)) no caso de ter utilizado
				
								  //$pass=password_hash($pass, PASSWORD_DEFAULT); no login.php
				if($pass==$passwordbd) {
					$_SESSION["cod_utilizador"]=$registo["cod_utilizador"];
					$_SESSION["status"]=1;
					$_SESSION["nome"]=$registo["nome"];
					$_SESSION["email"]=$registo["email"];
					$_SESSION["tipo_perfil"]=$registo["tipo_perfil"];

                    echo "logado";
					header("location: index.php?pagina=home");
				} else { include("login.php");?>
						<script> alert("Password incorreta")</script>
						<?php
					}
			}
	} else {  include("login.php");?>
			<script> alert("Email incorreto ")</script>
<?php
	}
?>
