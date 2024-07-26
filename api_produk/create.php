<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

$conn = new mysqli('localhost', 'root', '', 'db_produk');
$nama_produk = $_POST['nama_produk'];
$harga_produk = $_POST['harga_produk'];
$data = mysqli_query($conn, "INSERT INTO tb_produk SET nama_produk='$nama_produk', harga_produk='$harga_produk'");
if ($data) {
    echo json_encode([
        'status' => 'success',
        'message' => 'Data berhasil disimpan'
    ]);
} else {
    echo json_encode([
        'status' => 'error',
        'message' => 'Data gagal disimpan'
    ]);
}
?>
