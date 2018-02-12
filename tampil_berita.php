<?php
// include file koneksi
require 'koneksi.php';
// buat QUery perintah untuk menampilkan semua data
// Secara Descending berdasarkan ID
$sql_get_berita = "SELECT * FROM tb_berita ORDER BY id DESC";
$query = $conn->query($sql_get_berita);

// Variable penampung array sementara
$response_data = null;

while ($data = $query->fetch_assoc()) {
	// tambahkan data yg di seleksi ke dalam array
	$response_data[] = $data;
}

// Cek apakah datanya null ?
if (is_null($response_data)) {
	// jika ya, buat status untuk response jadi false
	$status = false;
} else {
	// jika tidak, buat status untuk response jadi true
	$status = true;
}
// Set type header response ke Json
header('Content-Type: application/json');
// Bungkus data dalam array
$response = ['status' => $status, 'berita' => $response_data];
// tampilkan dan convert ke format json
echo json_encode($response);