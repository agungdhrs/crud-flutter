<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

$conn = new mysqli('localhost', 'root', '', 'db_produk');
$query = mysqli_query($conn, "SELECT * FROM tb_produk");
$data = mysqli_fetch_all($query, MYSQLI_ASSOC);
echo json_encode($data); ?>