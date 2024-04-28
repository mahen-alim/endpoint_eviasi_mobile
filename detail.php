<?php

require_once 'koneksi.php';

$data       = mysqli_query($connection, "SELECT * FROM note_app WHERE id=" . $_GET['id']);
$getData       = mysqli_fetch_array($data, MYSQLI_ASSOC);

header('Access-Control-Allow-Origin: *');
echo json_encode($getData);
