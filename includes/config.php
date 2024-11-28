<?php
//database configuration sql server

$serverName = "ADAMAS"; // Server name or IP
$connectionOptions = array(
    "Database" => "prestasi", // Database name
    "Uid" => "", // SQL username
    "PWD" => ""  // SQL password
);

// Establishes the connection
$conn = sqlsrv_connect( $serverName, $connectionOptions );

if( !$conn ) {
    die( print_r(sqlsrv_errors(), true));
}else{
    // echo "Connected to Database";
}
?>
