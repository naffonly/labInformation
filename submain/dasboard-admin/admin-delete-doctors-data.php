<?php 
include '../../confiq/function.php' ;
session_start();

if (!isset($_SESSION['login'])) {
  header("Location: ../../index.php");
  exit;
}

$id = $_GET["id"];

if(deleteDataDokter($id)>0){
    echo"
    <script>
                alert('data berhasil dihapus');
                document.location.href = 'admin-read-doctors-data.php';
            </script>
    ";
}else{

    echo"
    <script>
                alert('data gagal dihapus');
                document.location.href = 'admin-read-doctors-data.php';
            </script>
    ";

}

?>  