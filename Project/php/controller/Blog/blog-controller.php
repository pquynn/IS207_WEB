<?php
// Include the database configuration file
include '../connect.php';

//FETCH DATA
function fetchBlog() {
    global $conn;

    // Define the number of records per page
    $records_per_page = 3;

    // Get the current page number from the URL
    if (isset($_GET['page']) && is_numeric($_GET['page'])) {
        $page = intval($_GET['page']);
    } else {
        $page = 1;
    }

    // Get the total number of records from the database
    $totalRecordsQuery = "SELECT COUNT(*) as total FROM blog";
    $totalRecordsResult = $conn->query($totalRecordsQuery);
    $totalRecords = $totalRecordsResult->fetch_assoc()['total'];

    // Calculate the total number of pages
    $totalPages = ceil($totalRecords / $records_per_page);


    // Calculate the offset for the query
    $offset = ($page - 1) * $records_per_page;

    // Fetch data from the database with pagination
    $sql = "SELECT BLOG_IMG, CONTENT FROM blog LIMIT $offset, $records_per_page";
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
function insertBlog() {
    global $conn;

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $blogTitle = $_GET['BLOG_TITLE'];

        $exist = checkBlog($blogTitle);
        if($exist){
            return false;
        }
        else{
            $sql = "INSERT INTO blog (BLOG_TITLE) VALUES ('$blogTitle')";
            $result = $conn->query($sql);

            return $result; 
        }
    }
    else
    return false;
}



//DELETE
function deleteBlog() {
    global $conn;

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $blogID = $_GET['BLOG_ID'];
    
        $sql = "DELETE FROM blog WHERE BLOG_ID = '$blogID'";
        $result = $conn->query($sql);

        return $result; 
    }
    else
        return ['result' => false];
}


//CHECK VALIDATION
function checkBlog($blogTitle) { 
    global $conn;
    // Check if the category name already exists
    $sql = "SELECT COUNT(*) as count FROM blog WHERE BLOG_TITLE = '$blogTitle'";
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

//SEARCH BLOG
function searchBlog(){
    global $conn;

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $searchTerm = $_GET['searchTerm'];
        $records_per_page = 2;

        // Get the current page number from the URL
        if (isset($_GET['page']) && is_numeric($_GET['page'])) {
            $page = intval($_GET['page']);
        } else {
            $page = 1;
        }

        // Get the total number of records from the database
        $totalRecordsQuery = "SELECT COUNT(*) as total FROM blog WHERE BLOG_TITLE LIKE '%$searchTerm%'";
        $totalRecordsResult = $conn->query($totalRecordsQuery);
        $totalRecords = $totalRecordsResult->fetch_assoc()['total'];

        // Calculate the total number of pages
        $totalPages = ceil($totalRecords / $records_per_page);


        // Calculate the offset for the query
        $offset = ($page - 1) * $records_per_page;

        // Fetch data from the database with pagination
        $sql = "SELECT BLOG_IMG, BLOG_TITLE, CONTENT FROM blog WHERE BLOG_TITLE LIKE '%$searchTerm%' LIMIT $offset, $records_per_page";
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
            echo json_encode(fetchBlog());
            break;
        case 'insert':
            echo json_encode(insertBlog());
            break;
        case 'delete':
            echo json_encode(deleteBlog());
            break;
        case 'search':
            echo json_encode(searchBlog());
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