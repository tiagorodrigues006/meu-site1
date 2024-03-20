<meta charset="utf-8" />

<?php

$connect = mysqli_connect("localhost", "root", "", "mixtime");
$output = '';


$sql = "SELECT * FROM saldos ORDER BY id DESC";
$result = mysqli_query($connect,$sql);
if(mysqli_num_rows($result) > 0)
{
    $output .= '
            <table class="table" border="1" >
                <tr>
                    <th>Id</th>
                    <th>Movimento </th>
                    <th>Cliente </th>
                    <th>Data/Hora </th>
					<th>Fatura </th>
					<th>Técnico </th>
                </tr>
            ';
        while($row = mysqli_fetch_array($result))
        {
        $output .= '
                <tr>
                    <td>'.$row["id"].'</td>
                    <td>'.$row["movimento"].'</td>
                    <td>'.$row["cliente"].'</td>
                    <td>'.$row["datacarregamento"].'</td>
					<td>'.$row["fatura"].'</td>
					<td>'.$row["tecnico"].'</td>
					
                </tr>
            ';
        }
        $output .= '<table>';
        mb_convert_encoding($output, 'UTF-16LE', 'UTF-8');
        header("Content-Type: application/xls");
        header("Content-Disposition: attachment; filename=carregamentosFitMix.xls");
        header('Content-Encoding: UTF-8'); // vilh, change to UTF-8!
        header("Content-type: application/x-msexcel; charset=utf-8");  // vilh, chang


        echo $output;


}


?>