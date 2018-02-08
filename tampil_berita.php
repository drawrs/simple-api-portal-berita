<?php
require 'koneksi.php';

$sql_get_berita = "SELECT * FROM tb_berita";
$query = $conn->query($sql_get_berita);

$response_data = null;

while ($data = $query->fetch_assoc()) {
	$response_data[] = $data;
}

if (is_null($response_data)) {
	$status = false;
} else {
	$status = true;
}
header('Content-Type: application/json');

$response = ['status' => $status, 'berita' => $response_data];
echo json_encode($response);