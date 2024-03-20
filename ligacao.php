<?php

		session_start();
		$host = "localhost";
		$user = "root";
		$pwd = "";
		$db = "mixtime";
		$ligax = mysqli_connect($host, $user, $pwd, $db) or die ("Não consegui fazer a conexão ao servidor da base de dados");
		mysqli_select_db($ligax,$db);
		$mysqli = new mysqli($host, $user, $pwd, $db);

	$mysqli->query("SET NAMES 'utf8'");
$mysqli->query('SET character_set_connection=utf8');
$mysqli->query('SET character_set_client=utf8');
$mysqli->query('SET character_set_results=utf8');


?>
