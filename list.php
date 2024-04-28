<?php

require_once 'koneksi.php';

$data       = mysqli_query($connection, "SELECT * FROM note_app");
$getData      = mysqli_fetch_all($data, MYSQLI_ASSOC);

header('Access-Control-Allow-Origin: *');
echo json_encode($getData);
