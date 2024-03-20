<meta charset="utf-8" />

<?php

$connect = mysqli_connect("localhost", "root", "", "mixtime");
$output = '';


$sql = "SELECT * FROM cliente ORDER BY id DESC";
$result = mysqli_query($connect,$sql);
if(mysqli_num_rows($result) > 0)
{
    $output .= '
            <table class="table" border="1" >
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Morada</th>
                    <th>NIF </th>
					<th>Telefone </th>
                    <th>E-mail </th>
                    <th>Créditos Min. </th>
                    <th>Saldo </th>
                    <th>Contrato </th>
                    
                </tr>
            ';
        while($row = mysqli_fetch_array($result))
        {
        $output .= '
                <tr>
                    <td>'.$row["id"].'</td>
                    <td>'.$row["nome"].'</td>
                    <td>'.$row["morada"].'</td>
                    <td>'.$row["nif"].'</td>
					<td>'.$row["telefone"].'</td>
                    <td>'.$row["email"].'</td>
                    <td>'.$row["creditos_min"].'</td>
                    <td>'.$row["saldo"].'</td>
                    <td>'.$row["contrato"].'</td>
                    
                </tr>
            ';
        }
        $output .= '<table>';
        mb_convert_encoding($output, 'UTF-16LE', 'UTF-8');
        header("Content-Type: application/xls");
        header("Content-Disposition: attachment; filename=clientesMixTime.xls");
        header('Content-Encoding: UTF-8');
        header('Content-type: text/csv; charset=UTF-8');
        echo $output;

}



?>