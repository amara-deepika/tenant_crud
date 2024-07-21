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

print_r($_REQUEST);
if (isset($_POST)) {
    $idd = $_POST['id'];
   
    // Prepare and execute the delete statement
    $sql = "DELETE FROM tenant WHERE id = $idd";
    $stmt = $conn->prepare($sql);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => $conn->error]);
    }

    $stmt->close();
} else {
    echo json_encode(['success' => false, 'error' => 'No ID provided']);
}

$conn->close();
?>
