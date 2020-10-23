<?php

$server = '127.0.0.1';
$port = '22';
$conn = ssh2_connect($server, $port);

$username = "";
$password = "";
ssh2_auth_password($conn, $username, $password);
