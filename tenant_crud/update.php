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

$data = array();
if($_POST){
    //echo "hi there";
    $id = $_POST['id'];
    
    // Fetch data from new_table_1
    $sql = "SELECT * FROM tenant WHERE id = $id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // Output data of each row
        $data = $result->fetch_assoc();

       echo json_encode($data); 
    }
} else {
    echo json_encode([]);
    exit;
}

$conn->close();

//echo json_encode($data);
?>
