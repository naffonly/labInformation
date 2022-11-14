<?php
require_once __DIR__ . '../../../vendor/autoload.php';
include '../../confiq/function.php' ;

session_start();

if (!isset($_SESSION['login'])) {
  header("Location: ../../index.php");
  exit;
}

$getid = $_GET["id"];

$patients = query(" SELECT p.idPasien as KodePasien, p.nama as nama, p.alamat as alamat,p.tglLahir as tgllahir,p.NoTlpn as tlpn, CONCAT(d.nama,\" \", d.gelar) AS dokter ,p.CatatanPemeriksaan as note,p.HasilPemeriksaan as result,p.Biaya as biaya ,p.StatusData 
                    FROM pasien p JOIN dokter d USING (idDokter)
                    WHERE p.idPasien = '$getid'"); 
$html = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
        }
        .header{
           text-align: center;
        }
        .data{
            width: 90%;
            margin: auto;
        }

        table {
            width: 100%;
        }
        table, th, td {
            border: 1px solid white;
            margin-left: 20px;
        }
        </style>
</head>
<body>
<div class="header">
<h1>Pasien</h1>
</div>
<hr>
    <div class="data">';
    foreach ($patients as $row ){
$html .='   
    <h2> 1. Identitas Pasien</h2>
    <table>
        <tr>
            <td style="width:30%">Kode Pasien</td>
            <td style="width:70%">: '.$row["KodePasien"] .'</td>
        </tr>
        <tr>
            <td style="width:35%">Dokter Penanggung Jawab</td>
            <td style="width:70%">: '.$row["dokter"] .'</td>
        </tr>
        <tr>
            <td style="width:30%">Nama</td>
            <td style="width:70%">: '.$row["nama"] .'</td>
        </tr>
        <tr>
            <td style="width:30%">Alamat</td>
            <td style="width:70%">: '.$row["alamat"] .'</td>
        </tr>
        <tr>
            <td style="width:30%">Tanggal Lahir</td>
            <td style="width:70%">: '.$row["tgllahir"] .'</td>
        </tr>
        <tr>
            <td style="width:30%">No Telepon</td>
            <td style="width:70%">: '.$row["tlpn"] .'</td>
        </tr>
        <tr>
            <td style="width:30%">Tanggal Lahir</td>
            <td style="width:70%">: '.$row["tgllahir"] .'</td>
        </tr>
    </table>
    <h2>2. Catatan Pasien</h2>
    <table>
        <tr>
            <td>Catatan Pemeriksaan :</td>
        </tr>
        <tr> 
            <td>'. $row["note"].'</td>
        </tr>
        <tr>
            <td >Diagnosa :</td>
        </tr>
        <tr>
            <td>'. $row["result"].'</td>
        </tr>
    </table>
 
    <h2> 3. Instansi Biaya</h2>
    <table>
        <tr>
            <td style="width:30%">Total Biaya</td>
            <td style="width:70%">: '. $row["biaya"].'</td>
        </tr>
    </table>';
    };


$html.= '</div>
<hr>
</body>
</html>
';
 
$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output('dokumen pasien.pdf','I');
?>

