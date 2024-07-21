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
    $created_on = isset($_POST['createdon']) ? $_POST['createdon'] : '0000-00-00';
    $updated_by = isset($_POST['updated_by']) ? $_POST['updated_by'] : '';
    $created_by = isset($_POST['created_by']) ? $_POST['created_by'] : '';
    $updated_on = isset($_POST['updatedon']) ? $_POST['updatedon'] : '0000-00-00';
    //echo $name;
    // Fetch data from new_table_1
    $sql = "UPDATE tenant SET 
    name='".$name."', 
    url='".$url."', 
    portal_count=".$portal_count.", 
    edition_id=".$edition_id.", 
    status=".$status.", 
    admin_uid='".$admin_uid."', 
    region='".$region."', 
    default_time_zone='".$default_time_zone."', 
    allowed_storage='".$allowed_storage."', 
    used_storage='".$used_storage."', 
    contact_name='".$contact_name."', 
    contact_email='".$contact_email."', 
    contact_phone='".$contact_phone."', 
    customer_vertical='".$customer_vertical."', 
    total_users=".$total_users.", 
    custom0='".$custom0."', 
    custom1='".$custom1."', 
    custom2='".$custom2."', 
    custom3='".$custom3."', 
    custom4='".$custom4."', 
    created_on='".$created_on."', 
    created_by='".$created_by."', 
    updated_on='".$updated_on."', 
    updated_by='".$updated_by."'
    WHERE id='".$id."'";
    echo $sql;
    $stmt = $conn->prepare($sql);
    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => $conn->error]);
    }

    $stmt->close();
    echo $sql;
    
} 
else {
    echo "sorry";
    exit;
}

$conn->close();

//echo json_encode($data);
?>
