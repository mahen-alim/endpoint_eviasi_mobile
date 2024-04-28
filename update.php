<?php

require_once 'koneksi.php';

// Ambil data dari input POST
$car_type   = $_POST['car_type'];
$complain = $_POST['complain'];
$det_serve = $_POST['detailing_serve'];
$price = $_POST['price'];
$id      = $_POST['id'];

// Persiapkan kueri update menggunakan parameter
$stmt = $connection->prepare("UPDATE note_app SET car_type = ?, complain = ?, detailing_serve = ?, price = ? WHERE id = ?");
$stmt->bind_param("ssi", $car_type, $complain, $det_serve, $price, $id);

// Eksekusi kueri
if ($stmt->execute()) {
    header('Access-Control-Allow-Origin: *');
    echo json_encode([
        'message' => 'Data edit successfully'
    ]);
} else {
    echo json_encode([
        'message' => 'Failed to update data: ' . $stmt->error
    ]);
}

// Tutup koneksi
$stmt->close();
$connection->close();
