<?php
header('Content-Type: application/json');

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "Omganapati@1";   
$dbname = "crud_tenant_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from users table
$sql = "SELECT id, name,url , portal_count, edition_id ,status,admin_uid FROM tenant";
$result = $conn->query($sql);

$data = array();

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    echo json_encode([]);
}

$conn->close();

echo json_encode($data);
?>
