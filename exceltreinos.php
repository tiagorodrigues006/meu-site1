<meta charset="utf-8" />

<?php

$connect = mysqli_connect("localhost", "root", "", "mixtime");
$output = '';


$sql = "SELECT * FROM treinos ORDER BY id DESC";
$result = mysqli_query($connect,$sql);
if(mysqli_num_rows($result) > 0)
{
    $output .= '
            <table class="table" border="1" >
                <tr>
                    <th>Id</th>
                    <th>Cliente </th>
                    <th>Pessoa </th>
                    <th>Remoto / Presencial</th>
                    <th>Data Ini</th>
                    <th>Data Fim</th>
                    <th>Tempo</th>
                    <th>Tipo Intervencao</th>
                    <th>Descrição</th>
                    <th>Créditos Gastos</th>
                    <th>Contrato</th>                    
                    <th>Faturar</th>
                    <th>Faturar</th>
                    <th>Técnico</th>
                </tr>
            ';
        while($row = mysqli_fetch_array($result))
        {

            $query2="select contrato from cliente where nome='".$row["cliente"]."'";
            $result2=mysqli_query($connect,$query2);
            while($registo2=mysqli_fetch_assoc($result2)){
                
                
                $contrato=$registo2['contrato'];
                
            }    
            $output .= '

        
                <tr>
                    <td>'.$row["id"].'</td>
                    <td>'.$row["cliente"].'</td>
                    <td>'.$row["pessoa"].'</td>
                    <td>'.$row["remoto"].'</td>
                    <td>'.$row["data_inicio"].'</td>
                    <td>'.$row["data_fim"].'</td>
                    <td>'.$row["tempo"].'</td>
                    <td>'.$row["tipo_intervencao"].'</td>
                    <td>'.$row["descricao"].'</td>
                    <td>'.$row["creditos_gastos"].'</td>
                    <td>'.$contrato.'</td>
                    <td>'.$row["faturar"].'</td>
                    <td>'.$row["faturado"].'</td>
                    <td>'.$row["tecnico"].'</td>                    
                </tr>
            ';
        }
        $output .= '<table>';
        mb_convert_encoding($output, 'UTF-16LE', 'UTF-8');
        header("Content-Type: application/xls");
        header("Content-Disposition: attachment; filename=intervencoesMixTime.xls");
        header('Content-Encoding: UTF-8');
        header('Content-type: text/csv; charset=UTF-8');
        echo $output;

}



?>