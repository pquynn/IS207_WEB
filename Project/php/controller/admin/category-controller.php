<?php
// Include the database configuration file
include '../connect.php';

//FETCH DATA
function fetchCategories() {
    global $conn;

    // Define the number of records per page
    $records_per_page = 20;

    // Get the current page number from the URL
    if (isset($_GET['page']) && is_numeric($_GET['page'])) {
        $page = intval($_GET['page']);
    } else {
        $page = 1;
    }

    // Get the total number of records from the database
    $totalRecordsQuery = "SELECT COUNT(*) as total FROM category";
    $totalRecordsResult = $conn->query($totalRecordsQuery);
    $totalRecords = $totalRecordsResult->fetch_assoc()['total'];

    // Calculate the total number of pages
    $totalPages = ceil($totalRecords / $records_per_page);


    // Calculate the offset for the query
    $offset = ($page - 1) * $records_per_page;

    // Fetch data from the database with pagination
    $sql = "SELECT category_id, category_name FROM category LIMIT $offset, $records_per_page";
    $result = $conn->query($sql);

    $data = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    // Create an associative array with multiple values
    $response = array(
        'data' => $data,
        'totalPages' => $totalPages
    );

        //return ['data' => $data, 'totalPages' => $totalPages];
        return $response;
}


//INSERT 
function insertCategory() {
    global $conn;

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $categoryName = $_GET['category_name'];

        $exist = checkCategory($categoryName);
        if($exist){
            return false;
        }
        else{
            $sql = "INSERT INTO category (category_name) VALUES ('$categoryName')";
            $result = $conn->query($sql);

            return $result; 
        }
    }
    else
    return false;
}

//UPDATE 
function updateCategory() {
    global $conn;

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $categoryName = $_GET['category_name'];
        $categoryId = $_GET['category_id'];

        $exist = checkCategory($categoryName);
        if($exist){
            return false;
        }
        else{
            $sql = "UPDATE category SET category_name = '$categoryName' WHERE category_id = '$categoryId'";
            $result = $conn->query($sql);
            return $result;
        }
    }
    else
        return false;
}

//DELETE
function deleteCategory() {
    global $conn;

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $categoryId = $_GET['category_id'];
    
        $sql = "DELETE FROM category WHERE category_id = '$categoryId'";
        $result = $conn->query($sql);

        return $result; 
    }
    else
        return ['result' => false];
}


//CHECK VALIDATION
function checkCategory($categoryName) { 
    global $conn;
    // Check if the category name already exists
    $sql = "SELECT COUNT(*) as count FROM category WHERE category_name = '$categoryName'";
    $result = $conn->query($sql);

    if ($result) {
        $row = $result->fetch_assoc();
        if($row['count'] > 0)
            return true;
        else
            return false;
        
    } else {
        // Error in the query
        return true;
    }
}

//SEARCH CATEGORIES
function searchCategories(){
    global $conn;

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $searchTerm = $_GET['searchTerm'];
        $records_per_page = 20;

        // Get the current page number from the URL
        if (isset($_GET['page']) && is_numeric($_GET['page'])) {
            $page = intval($_GET['page']);
        } else {
            $page = 1;
        }

        // Get the total number of records from the database
        $totalRecordsQuery = "SELECT COUNT(*) as total FROM category WHERE category_name LIKE '%$searchTerm%'";
        $totalRecordsResult = $conn->query($totalRecordsQuery);
        $totalRecords = $totalRecordsResult->fetch_assoc()['total'];

        // Calculate the total number of pages
        $totalPages = ceil($totalRecords / $records_per_page);


        // Calculate the offset for the query
        $offset = ($page - 1) * $records_per_page;

        // Fetch data from the database with pagination
        $sql = "SELECT category_id, category_name FROM category WHERE category_name LIKE '%$searchTerm%' LIMIT $offset, $records_per_page";
        $result = $conn->query($sql);

        $data = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }

        // Create an associative array with multiple values
        $response = array(
            'data' => $data,
            'totalPages' => $totalPages
        );
        return $response;
    }
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
            echo json_encode(insertCategory());
            break;
        case 'delete':
            echo json_encode(deleteCategory());
            break;
        case 'update':
            echo json_encode(updateCategory());
            break;
        case 'search':
            echo json_encode(searchCategories());
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




