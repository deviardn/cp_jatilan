<?php

/**
 * File koneksi
 */
$host = "localhost";
$user = "root";
$pass = "sukses45";
$database = "jatilan";

$mysqli = new mysqli($host, $user, $pass, $database);

if ($mysqli->connect_errno) {
    echo "Failed to connect MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_errno;
} else {
    echo "";
}

