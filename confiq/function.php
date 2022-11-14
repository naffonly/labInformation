<?php 


$hostname = "localhost";
$username = "root";
$password = "";
$database = "db_labinformasion";

$conn = mysqli_connect("$hostname","$username","$password","$database");

function query($query)
{
    global $conn;
   $result = mysqli_query($conn, $query);
   $rows = [];

    while ( $row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function TambahDataUser($data){
    global $conn;

    $iduser = htmlspecialchars(strtoupper(stripslashes($data["iduser"])));
    
    $username = htmlspecialchars(strtolower(stripslashes($data["username"])));
    $password = mysqli_real_escape_string($conn,$data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    $nama = htmlspecialchars(strtolower(stripslashes($data["name"])));
    $divisi = htmlspecialchars(strtolower(stripslashes($data["divisi"])));

    //cek username
    $result = mysqli_query($conn,"SELECT username FROM users WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)){
        echo "<script>
                alert('username sudah terdaftar');
            </script>";
            return false;
    }

    // password sesuai
    if ($password !== $password2) {
        echo "<script>
                  alert('password tidak sesuai');
                </script>";
        return false;
    } 

    // enkripsi
    $password = password_hash($password, PASSWORD_DEFAULT);
    // tambah user
    mysqli_query($conn,"INSERT INTO users
    VALUE ('$iduser','$username','$password','$nama','$divisi')");

    return mysqli_affected_rows($conn);
}

function updateDataUsers($data)
    {
        global $conn;
        $id =  $data["id"];
        $username = htmlspecialchars($data["username"]);
        $nama = htmlspecialchars($data["name"]); 
        $divisi = htmlspecialchars($data["divisi"]);
        
        // masukan data
        $query = "UPDATE users SET
                username = '$username',
                nama = '$nama',
                idStatusPegawai = '$divisi' 
                WHERE idUsers = '$id'
            ";
            mysqli_query($conn,$query);
            return mysqli_affected_rows($conn);
    }

    
function TambahDataDokter($data){
    global $conn;

    $iddokter = htmlspecialchars(strtoupper(stripslashes($data["id"])));
    $nama = htmlspecialchars(strtolower(stripslashes($data["nama"])));
    $gelar = htmlspecialchars(strtoupper(stripslashes($data["gelar"])));

    //cek data
    $result = mysqli_query($conn,"SELECT nama FROM dokter WHERE nama = '$nama'");

    if (mysqli_fetch_assoc($result)){
        echo "<script>
                alert('dokter sudah terdaftar');
            </script>";
            return false;
    }
    // tambah user
    mysqli_query($conn,"INSERT INTO dokter
    VALUE ('$iddokter','$nama','$gelar')");
    return mysqli_affected_rows($conn);
}

function updateDataDokter($data)
    {
        global $conn;
        $id =  $data["id"];
        $nama = htmlspecialchars($data["name"]); 
        $gelar = htmlspecialchars($data["gelar"]);
        
        // masukan data
        $query = "UPDATE dokter SET
                nama = '$nama',
                gelar = '$gelar' 
                WHERE idDokter = '$id'
            ";
            mysqli_query($conn,$query);
            return mysqli_affected_rows($conn);
    }

    


function deleteDataDokter($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM dokter WHERE idDokter = '$id'");
    return mysqli_affected_rows($conn);
}


function deleteDataUser($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM users WHERE idUsers = '$id'");
    return mysqli_affected_rows($conn);
}


function TambahDataPasien($data){
    global $conn;

    $idpasien = htmlspecialchars(strtoupper(stripslashes($data["id"])));
    $nama = htmlspecialchars(strtolower(stripslashes($data["nama"])));
    $alamat = htmlspecialchars(strtolower(stripslashes($data["alamat"])));
    $tgllahir = htmlspecialchars(strtolower(stripslashes($data["tgllahir"])));
    $tlpn = htmlspecialchars(strtolower(stripslashes($data["tlpn"])));
    $iddokter = htmlspecialchars(strtolower(stripslashes($data["iddokter"])));
    $catatan = htmlspecialchars(strtolower(stripslashes($data["catatan"])));
    $hasil = htmlspecialchars(strtolower(stripslashes($data["hasil"])));
    $biaya = htmlspecialchars(strtolower(stripslashes($data["biaya"])));
    // $statusdata = htmlspecialchars(strtolower(stripslashes($data["status"])));

  
    
    // tambah user
    mysqli_query($conn,"INSERT INTO pasien
    VALUE ('$idpasien','$nama','$alamat','$tgllahir','$tlpn','$iddokter','$catatan','$hasil','$biaya','')");
    return mysqli_affected_rows($conn);
}

 ?>

