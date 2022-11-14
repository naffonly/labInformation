<?php
include '../../confiq/function.php' ;

session_start();

if (!isset($_SESSION['login'])) {
  header("Location: ../../index.php");
  exit;
}

$doctors = query("SELECT d.idDokter AS id, d.Nama AS name, d.Gelar as gelar FROM dokter d;");
// var_dump($users);
// die;

if (isset($_POST["update"])) {
                                                                        
    if (updateDataDokter($_POST)>0) {
        echo "
            <script>
                alert('data berhasil diubah');
                document.location.href = './admin-read-doctors-data.php';
            </script>
        ";
    }else{
        echo "
            <script>
            
                alert('data gagal diubah');
                document.location.href = './admin-read-doctors-data.php';
            </script>
        ";
    }
    
}
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.2/css/uikit.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.uikit.min.css">
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
    <div class="content-label">
        <h1 class="d-flex justify-content-center">Data Pegawai</h1>
    </div>
    <div class="form-data">
    <table id="data" class="uk-table uk-table-hover uk-table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>ID Dokter</th>
                    <th>Nama</th>
                    <th>Gelar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($doctors as $row ): ?>
                <tr>
                    <td><?= $row['id']?></td>
                    <td><?= $row['name']?></td>
                    <td><?= $row['gelar']?></td>
                    <td>
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editdata<?= $row['id']?>" >Edit</button>
                    <div class="modal fade" id="editdata<?= $row['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <?php
                         $getid = $row["id"];            
                         $editdata = query("SELECT idDokter as id, nama as name, gelar FROM dokter WHERE idDokter = '$getid'");
                        ?>
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST">
                                    <?php
                                     foreach ($editdata as $rows) :
                                    ?>
                                    <input type="hidden" name="id" value="<?= $rows["id"]?>">  
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Nama</label>
                                    <input type="text" name="name" class="form-control" id="recipient-name" value="<?=$rows['name'] ?>"></input>
                                </div>
                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Gelar</label>
                                    <input class="form-control" name="gelar" id="message-text" value="<?=$rows['gelar'] ?>"></input>
                                </div>
                                <?php endforeach ?>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="update">Simpan</button>
                            </div>
                                </form>
                            </div>
                            
                            </div>
                        </div>
                    </div>
                    <a href="../dasboard-admin/admin-delete-doctors-data.php?id=<?= $row['id'];?>" onclick="return confirm('Yakin?');"><button type="button" class="btn btn-danger btn-sm">Hapus</button></a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
</div>
</div> 
<!--===============================================================================================-->
<script src="https://kit.fontawesome.com/017bf82131.js" crossorigin="anonymous"></script>
<!--===============================================================================================-->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<!--===============================================================================================-->
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<!--===============================================================================================-->
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.uikit.min.js"></script>
<!--===============================================================================================-->
<script src="../../Assets/js/dasboard-main.js"></script>
<!--===============================================================================================-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>