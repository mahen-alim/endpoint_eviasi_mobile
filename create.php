<?php

require_once 'koneksi.php';

if (isset($_POST['car_type'], $_POST['complain'], $_POST['detailing_serve'], $_POST['price'], $_POST['date'])) {
    $car_type = $_POST['car_type'];
    $complain = $_POST['complain'];
    $det_serve = $_POST['detailing_serve'];
    $price = $_POST['price'];
    $date = $_POST['date'];

    // Persiapkan kueri insert menggunakan parameter
    $stmt = $connection->prepare("INSERT INTO note_app (car_type, complain, detailing_serve, price, date) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $car_type, $complain, $det_serve, $price, $date);

    // Eksekusi kueri
    if ($stmt->execute()) {
        header('Access-Control-Allow-Origin: *');
        echo json_encode(array("message" => "Data inserted successfully"));
    } else {
        echo json_encode(array("message" => "Failed to insert data"));
    }

    // Tutup statement
    $stmt->close();
    $connection->close();
} else {
    echo json_encode([
        'message' => 'Title and/or content is not defined'
    ]);
}
