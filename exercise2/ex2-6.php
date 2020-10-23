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

mysqli_query($conn, "CREATE VIEW RouterInfo AS SELECT * FROM tbl_router");

$query = "insert into tbl_router (sapid, loopback, hostname, mac_address, type, added_at, updated_at) values ";
$values = '';

for ($i = 1; $i <= 10; $i++) {
    $randIP = mt_rand(0, 255) . "." . mt_rand(0, 255) . "." . mt_rand(0, 255) . "." . mt_rand(0, 255);
    $chars1 = '0123456789abcdefghijklmnopqrstuvwxyz';
    $randSapId = substr(str_shuffle($chars1), 0, 18);
    $chars2 = 'abcdefghijklmnopqrstuvwxyz';
    $randHostName = substr(str_shuffle($chars2), 0, 10) . '.com';
    $randMac = implode(':', str_split(str_pad(base_convert(mt_rand(0, 0xffffff), 10, 16) . base_convert(mt_rand(0, 0xffffff), 10, 16), 12), 2));
    $types = ['AG1', 'CSS'];
    $randType = $types[rand(0, count($types) - 1)];
    $ipExists = mysqli_query($conn, "select loopback from tbl_router where loopback = '$randIP'");
    if (mysqli_num_rows($ipExists) > 0) {
        $i--;
        return;
    }
    $sapIdExists = mysqli_query($conn, "select sapid from tbl_router where sapid = '$randSapId'");
    if (mysqli_num_rows($sapIdExists) > 0) {
        $i--;
        return;
    }
    $hostNameExists = mysqli_query($conn, "select hostname from tbl_router where hostname = '$randHostName'");
    if (mysqli_num_rows($hostNameExists) > 0) {
        $i--;
        return;
    }
    $macAddExists = mysqli_query($conn, "select mac_address from tbl_router where mac_address = '$randMac'");
    if (mysqli_num_rows($macAddExists) > 0) {
        $i--;
        return;
    }
    $q = "insert into tbl_router (sapid, loopback, hostname, mac_address, type, added_at, updated_at)
    values ('$randSapId', '$randIP', '$randHostName', '$randMac', '$randType', '" . date("Y-m-d H:i:s") . "' ,'" . date("Y-m-d H:i:s") . "')";
    if ($conn->query($q) !== TRUE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$values = substr($values, 0, strlen($values) - 1);
mysqli_query($conn, $query);
