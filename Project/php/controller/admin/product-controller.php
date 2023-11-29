<?php
// Include the database configuration file
include '../connect.php';

//Fetch Product data
function fetchProducts() {
    global $conn;
    
    $sql = $sql = " SELECT DISTINCT products.product_id, products.product_name, products.color, 
                          products.price, products.description, products.gender, 
                          category.category_name, products.image 
                    FROM products
                    INNER JOIN category ON products.category_id = category.category_id
                    ORDER BY products.product_id";
    $result = $conn->query($sql);

    $data = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $row['image'] = base64_encode($row['image']); //end code image data
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

