<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

$conn = new mysqli('localhost', 'root', '', 'db_produk');

$id_produk = $_POST['id_produk'];

$data = mysqli_query($conn, "DELETE FROM tb_produk WHERE id_produk='$id_produk'");
if ($data) {
    echo json_encode([
        'status' => 'success',
        'message' => 'Data berhasil delete'
    ]);
} else {
    echo json_encode([
        'status' => 'error',
        'message' => 'Data gagal delete'
    ]);
}
?>
