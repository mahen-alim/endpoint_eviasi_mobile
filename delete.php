<?php

require_once 'koneksi.php';

// Ambil ID dari input POST
$id = $_POST['id'];

// Persiapkan kueri delete menggunakan parameter
$stmt = $connection->prepare("DELETE FROM note_app WHERE id = ?");
$stmt->bind_param("i", $id);

// Eksekusi kueri
if ($stmt->execute()) {
    header('Access-Control-Allow-Origin: *');
    echo json_encode([
        'message' => 'Data deleted successfully'
    ]);
} else {
    echo json_encode([
        'message' => 'Failed to delete data: ' . $stmt->error
    ]);
}

// Tutup koneksi
$stmt->close();
$connection->close();
