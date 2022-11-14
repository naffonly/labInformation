<?php
include '../../confiq/function.php' ;

session_start();

if (!isset($_SESSION['login'])) {
  header("Location: ../../index.php");
  exit;
}

if($_SESSION["idStatusPegawai"] != "1"){
  echo " <script>
  alert('403');
</script>";
  exit;
}

$users = query("SELECT COUNT(*) as datausers FROM users");
$patients = query("SELECT COUNT(*) as datapatients FROM pasien");
$doctors = query("SELECT COUNT(*) as datadoctors FROM dokter");
// var_dump($users);
// die;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dasboard</title>
  <!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../../Assets/images/icons/favicon.ico?v=<?= time();?>"/>
<!--===============================================================================================-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../Assets/css/custom.css?v=<?= time();?>">
	<link rel="stylesheet" type="text/css" href="../../Assets/css/admin-css/style.css?v=<?= time();?>">
<!--===============================================================================================-->
</head>
<body>
<div class="sidebar">
  <div class="logo-item py-2"><a href="admin.php">LabInformation</a></div>
  <div class="sidebar-item">
      <h1>Pasien</h1>
      <a  href="admin-read-patients-data.php"><i class="fa-solid fa-people-group"></i> Data Pasien</a>
      <a href="admin-create-pasients-data.php"><i class="fa-solid fa-person-circle-plus"></i> Tambah Pasien</a>
      <h1>Users</h1>
      <a href="admin-read-users-data.php"><i class="fa-solid fa-user-group"></i> Data Users</a>
      <a href="admin-create-users-data.php"><i class="fa-solid fa-user-plus"></i> Tambah Pegawai</a>
      <h1>Dokter</h1>
      <a href="admin-read-doctors-data.php"><i class="fa-solid fa-hospital-user"></i> Data Dokter</a>
      <a href="admin-create-doctors-data.php"><i class="fa-solid fa-user-doctor"></i> Tambah Dokter </a>
      <a href="logout.php" class="a-bottom"><i class="fa-solid fa-right-from-bracket"></i> Sign Out</a>
  </div>
</div>

<div class="content">
<div class="container pt-4">
<div class="row d-flex justify-content-center">
  
  <div class="content-item"> 
  <?php foreach ($patients as $row):?>
    <h1>Jumlah Data Pasien</h1>
    <h1><?= $row['datapatients']?></h1>
    <?php endforeach?>
  </div>
  <div class="content-item"> 
  <?php foreach ($doctors as $row):?>
    <h1>Jumlah Data Dokter</h1>
    <h1><?= $row['datadoctors']?></h1>
    <?php endforeach?>
  </div>
    <div class="content-item">
   <?php foreach ($users as $row):?>
      <h1>Jumlah Data Pegawai</h1>
      <h1> <?=$row['datausers'];?></h1>
     <?php endforeach?>
    </div>
    
  </div>
</div>
</div> 
<script src="https://kit.fontawesome.com/017bf82131.js" crossorigin="anonymous"></script>
<!--===============================================================================================-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>