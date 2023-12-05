<?php
// Include the database configuration file
include '../connect.php';

// Fetch order counts for different statuses
$statuses = array("Đang chuẩn bị hàng", "Đang giao hàng", "Đã hủy");
$counts = array();

foreach ($statuses as $status) {
    $sql = "SELECT COUNT(*) as count FROM orders WHERE status = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("s", $status);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $counts[$status] = $row['count'];
}

echo json_encode($counts);


// Close the MySQL connection
$connection->close();

// // Return JSON response
// header('Content-Type: application/json');

?>
