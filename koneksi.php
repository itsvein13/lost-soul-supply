<?php
$conn = mysqli_connect("localhost", "root", "", "lostsoul");

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
    