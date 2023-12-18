<?php
// Include the database configuration file
include '../connect.php';

function fetchCategories() {
    global $conn;
    
    $sql = "SELECT category_id, category_name FROM category";
    $result = $conn->query($sql);

    $data = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    return $data;
}

function insertCategory($categoryName) {
    global $conn;

    // Validate input, perform the insertion, handle errors, etc.
    // Example:
    // $sql = "INSERT INTO category (category_name) VALUES ('$categoryName')";
    // $result = $conn->query($sql);
    // return $result;
    
    //return ['success' => true, 'message' => 'Category inserted successfully'];

}

function deleteCategory($categoryId) {
    global $conn;

    // Validate input, perform the deletion, handle errors, etc.
    // Example:
    // $sql = "DELETE FROM category WHERE category_id = $categoryId";
    // $result = $conn->query($sql);
    // return $result;
}

// Check the action parameter in the request
if (isset($_GET['action'])) {
    $action = $_GET['action'];

    // Execute the corresponding function based on the action
    switch ($action) {
        case 'fetch':
            // Return the fetched data as JSON response
            echo json_encode(fetchCategories());
            break;
        case 'insert':
            // Check if required parameters are present

            // if (isset($_POST['category_name'])) {
            //     $categoryName = $_POST['category_name'];
            //     echo json_encode(insertCategory($categoryName));
            // } else {
            //     echo json_encode(['success' => false, 'message' => 'Category name not provided']);
            // }
            break;
        // Add more cases for other actions if needed
        // ...
        default:
            echo json_encode(['success' => false, 'message' => 'Invalid action']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Action not specified']);
}
// Close the database connection
$conn->close();
?>




