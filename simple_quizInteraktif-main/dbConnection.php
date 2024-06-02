<?php
//all the variables defined here are accessible in all the files that include this one
// $con= new mysqli('localhost','root','','project')or die("Could not connect to mysql".mysqli_error($con));

// Konfigurasi database
$host = "localhost";
$user = "root";
$password = "";
$database = "id21075343_project";

// Membuat koneksi
$conn = new mysqli($host, $user, $password, $database);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
echo "Koneksi berhasil!";

?>

