<?php
$connection = new mysqli("localhost", "root", "", "practice");

// Cek koneksi database
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
