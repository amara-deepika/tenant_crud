<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "root"; // change to your MySQL username
$password = "Omganapati@1"; // change to your MySQL password
$dbname = "crud_tenant_db"; // change to your database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(['message' => 'Connection failed: ' . $conn->connect_error]));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $url = isset($_POST['url']) ? $_POST['url'] : '';
    $portal_count = isset($_POST['portal_count']) ? $_POST['portal_count'] : 0;
    $edition_id = isset($_POST['edition_id']) ? $_POST['edition_id'] : 0;
    $status = isset($_POST['status']) ? $_POST['status'] : 1;
    $admin_uid = isset($_POST['admin_uid']) ? $_POST['admin_uid'] : '';
    $region = isset($_POST['region']) ? $_POST['region'] : '';
    $default_time_zone = isset($_POST['timezone']) ? $_POST['timezone'] : '';
    $allowed_storage = isset($_POST['allowedstorage']) ? $_POST['allowedstorage'] : 0;
    $used_storage = isset($_POST['usedstorage']) ? $_POST['usedstorage'] : 0;
    $contact_name = isset($_POST['contact_name']) ? $_POST['contact_name'] : '';
    $contact_email = isset($_POST['contact_email']) ? $_POST['contact_email'] : '';
    $contact_phone = isset($_POST['contact_phone']) ? $_POST['contact_phone'] : '';
    $customer_vertical = isset($_POST['customer_vertical']) ? $_POST['customer_vertical'] : '';
    $total_users = isset($_POST['total_users']) ? $_POST['total_users'] : 0;
    $custom0 = isset($_POST['customer0']) ? $_POST['customer0'] : '';
    $custom1 = isset($_POST['customer1']) ? $_POST['customer1'] : '';
    $custom2 = isset($_POST['customer2']) ? $_POST['customer2'] : '';
    $custom3 = isset($_POST['customer3']) ? $_POST['customer3'] : '';
    $custom4 = isset($_POST['customer4']) ? $_POST['customer4'] : '';
    $created_on = isset($_POST['createdon']) ? $_POST['createdon'] : '';
    $updated_by = isset($_POST['updated_by']) ? $_POST['updated_by'] : '';
    $created_by = isset($_POST['created_by']) ? $_POST['created_by'] : '';
    $updated_on = isset($_POST['updatedon']) ? $_POST['updatedon'] : '';
    $insertdata="INSERT INTO tenant(name, url, portal_count, edition_id, status, admin_uid, region, default_time_zone, allowed_storage, used_storage, contact_name, contact_email, contact_phone, customer_vertical, total_users, created_on, created_by, updated_on, updated_by, custom0, custom1, custom2, custom3, custom4
) VALUES ('".$name."','".$url."',".$portal_count.",".$edition_id.",".$status.",'".$admin_uid."','".$region."','".$default_time_zone."',".$allowed_storage.",".$used_storage.",'".$contact_name."','".$contact_email."','".$contact_phone."','".$customer_vertical."',".$total_users.",'".$created_on."','".$created_by."','".$updated_on."','".$updated_by."','".$custom0."','".$custom1."','".$custom2."','".$custom3."','".$custom4."')";
    echo $insertdata;//exit;
   $stmt = $conn->prepare($insertdata);
    //$stmt->bind_param($name, $number, $varcharField);

    if ($stmt->execute()) {
        echo json_encode(['message' => 'Data inserted successfully']);
    } else {
        echo json_encode(['message' => 'Error: ' . $stmt->error]);
    }

    $stmt->close(); 
} else {
    echo json_encode(['message' => 'Invalid Request']);
}

$conn->close();
?>
