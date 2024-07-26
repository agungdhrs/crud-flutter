<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

$conn = new mysqli('localhost', 'root', '', 'db_produk');

$id_produk = $_POST['id_produk'];
$nama_produk = $_POST['nama_produk'];
$harga_produk = $_POST['harga_produk'];

$data = mysqli_query($conn, "UPDATE tb_produk SET nama_produk='$nama_produk', harga_produk='$harga_produk' WHERE id_produk='$id_produk'");
if ($data) {
    echo json_encode([
        'status' => 'success',
        'message' => 'Data berhasil update'
    ]);
} else {
    echo json_encode([
        'status' => 'error',
        'message' => 'Data gagal update'
    ]);
}
?>
