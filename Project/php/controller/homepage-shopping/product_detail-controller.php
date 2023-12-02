<?php
include '../connect.php';

function fetchProducts() {
    global $conn;
    
    $sql = " SELECT products.product_id, product_name, price, first_picture
                    FROM products
                    INNER JOIN product_pictures ON products.product_id = product_pictures.product_id
                    ORDER BY products.product_id";
    $result = $conn->query($sql);

    $data = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $row['first_picture'] = base64_encode($row['first_picture']); //end code image data
            $data[] = $row;
        }
    }

    return $data;
}


// Check the action parameter in the request
if (isset($_GET['action'])) {
    $action = $_GET['action'];

    // Execute the corresponding function based on the action
    switch ($action) {
        case 'fetch':
            // Return the fetched data as JSON response
            echo json_encode(fetchProducts());
            break;
        
        default:
            echo json_encode(['success' => false, 'message' => 'Invalid action']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Action not specified']);
}

// Close the database connection
$conn->close();
?>