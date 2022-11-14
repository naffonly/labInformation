<?php
session_start();

if (!isset($_SESSION['login'])) {
  header("Location: ../../index.php");
  exit;
}

include '../../confiq/function.php' ;

$id = $_GET["id"];
if(deleteDataUser($id)>0){
    echo"
    <script>
                alert('data berhasil dihapus');
                document.location.href = 'admin-read-users-data.php';
            </script>
    ";
}else{

    echo"
    <script>
                alert('data gagal dihapus');
                document.location.href = 'admin-read-users-data.php';
            </script>
    ";

}

?>  