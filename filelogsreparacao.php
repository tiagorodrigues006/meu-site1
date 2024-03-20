<?php

include('ligacao.php');

$file = fopen("logsreparacao.txt","r");

while(!feof($file)) {
    $content = fgets($file);
    $carry = explode(",", $content);
    list($idr,$ide,$stade,$time,$tecnic) = $carry;
    $sql = "INSERT INTO logsreparacao (`idreparacao`,`idequipamento`,`estado`,`data_hora`,`tecnico`) VALUES ('$idr','$ide','$stade','$time','$tecnic')";
    $ligax ->query($sql);
}

fclose($file);




?>