<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = 'teksystem';

$conn = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_query($conn, "CREATE VIEW vw_RouterInfo AS SELECT * FROM tbl_router");
$conn->close();
