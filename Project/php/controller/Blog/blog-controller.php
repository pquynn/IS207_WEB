<?php
// Include the database configuration file
include '../connect.php';


//Fetch Product data
function fetchBlog() {
    global $conn;

    // Define the number of records per page
    $records_per_page = 20;

    // Get the current page number from the URL
    if (isset($_POST['page']) && is_numeric($_POST['page'])) {
        $page = intval($_POST['page']);
    } else {
        $page = 1;
    }

    // Get the total number of records from the database
    $totalRecordsQuery = "SELECT COUNT(*) as total 
                        FROM blog";
    $totalRecordsResult = $conn->query($totalRecordsQuery);
    $totalRecords = $totalRecordsResult->fetch_assoc()['total'];

    // Calculate the total number of pages
    $totalPages = ceil($totalRecords / $records_per_page);


    // Calculate the offset for the query
    $offset = ($page - 1) * $records_per_page;

    // Fetch data from the database with pagination
    $sql = "SELECT DISTINCT BLOG_ID, BLOG_TITLE, USER_ID, USER_NAME, CONTENT, BLOG_DAY, BLOG_IMG 
            FROM blog
            ORDER BY BLOG_ID
            LIMIT $offset, $records_per_page";

    $result = $conn->query($sql);

    $data = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $row['BLOG_IMG'] = base64_encode($row['BLOG_IMG']); //end code image data
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

//CHECK VALIDATION
function checkExist($name) { 
    global $conn;
    $name = trim($name, " ");
    // Check if the category name already exists
    // $user_login = trim(mysqli_real_escape_string($conn, $employee['username']). " ");
    $sql = "SELECT COUNT(*) as count FROM blog WHERE BLOG_TITLE like '$name'";
    $result = $conn->query($sql);

    $row = $result->fetch_assoc();
    return  $row['count'] > 0;
} 
    
function insertBlog() {
    global $conn;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
       
        $user_id = ($_POST['USER_ID']);
        $user_name = ($_POST['USER_NAME']);
        $date = ($_POST['BLOG_DAY']);
        $content = ($_POST['CONTENT']);
        $img = ($_POST['BLOG_IMG']);
        $name = ($_POST['BLOG_TITLE']);

        $exist = checkBlog($name);
        if ($exist) {
            return false;
        } else {
            // Use prepared statement to avoid SQL injection
            $sql = "INSERT INTO blog (USER_ID, USER_NAME, BLOG_DAY, CONTENT, BLOG_IMG, BLOG_TITLE)
            VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);

            // Bind the parameter
            $stmt->bind_param('s', $name);

            // Execute the statement
            $result = $stmt->execute();

            // Close the statement
            $stmt->close();

            return $result;
        }
    } else {
        return false;
    }
}

function checkBlog($name) { 
    global $conn;
    // Check if the category name already exists
    $sql = "SELECT COUNT(*) as count FROM blog WHERE BLOG_TITLE = '$name'";
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


//INSERT 
function updateBlog() {
    global $conn;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $id = trim($_POST['BLOG_ID'], " ");
        $user_id = (int) ($_POST['USER_ID']);
        $user_name = (int) ($_POST['USER_NAME']);
        $date = ($_POST['BLOG_DAY']);
        $content = ($_POST['CONTENT']);
        $img = ($_POST['BLOG_IMG']);
        $name = trim($_POST['BLOG_TITLE'], " ");

        // Use prepared statement to avoid SQL injection
        $sql = "SELECT COUNT(*) as count FROM blog 
                WHERE BLOG_TITLE like ? AND BLOG_ID <> ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('si', $name, $id);
        $stmt->execute();
        $result = $stmt->get_result();

        $row = $result->fetch_assoc();
        $isExist = $row['count'] > 0;
        $stmt->close();

        if (!$isExist) {
            // Use prepared statement to avoid SQL injection
            $sql = "UPDATE blog
                     SET BLOG_ID = ?, USER_ID = ?, USER_NAME = ?, BLOG_DAY = ?, CONTENT = ?, BLOG_IMG = ?, BLOG_TITLE = ?
                     WHERE BLOG_ID = ?";
            
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ssissii', $id, $user_id, $user_name, $date, $content, $img, $name);
            $result = $stmt->execute();
            $stmt->close();

            if ($result) {
                return (['result' => true, 'message' => 'Cập nhật bảng Blog thành công']);
            } else {
                return (['result' => false, 'message' => 'Cập nhật bảng Blog không thành công']);
            }
        } else {
            return (['result' => false, 'message' => 'Tên Blog đã tồn tại']);
        }
    } else {
        return (['result' => false, 'message' => 'Cập nhật không thành công. Không lấy được giá trị']);
    }
}


//DELETE
function deleteBlog() {
    global $conn;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $productId = trim($_POST['BLOG_ID'], " ");

        // Use prepared statement to avoid SQL injection
        $sql1 = "DELETE FROM blog WHERE BLOG_ID = ?";
        $stmt1 = $conn->prepare($sql1);
        $stmt1->bind_param('i', $productId);
        $result1 = $stmt1->execute();
        $stmt1->close();

        if ($result1) {
            // Use prepared statement to avoid SQL injection
            return ['result' => true];
        } else {
            return ['result' => false];
        }
    } 
}


// //SEARCH
function searchBlog() {
    global $conn;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $searchTerm = '%' . $_POST['searchTerm'] . '%';
        $records_per_page = 20;

        // Get the current page number from the URL
        if (isset($_POST['page']) && is_numeric($_POST['page'])) {
            $page = intval($_POST['page']);
        } else {
            $page = 1;
        }

        // Use prepared statement to avoid SQL injection
        $totalRecordsQuery = "SELECT COUNT(*) as total FROM blog WHERE BLOG_TITLE LIKE ?";
        $stmtTotal = $conn->prepare($totalRecordsQuery);
        $stmtTotal->bind_param('s', $searchTerm);
        $stmtTotal->execute();
        $totalRecordsResult = $stmtTotal->get_result();
        $totalRecords = $totalRecordsResult->fetch_assoc()['total'];
        $stmtTotal->close();

        // Calculate the total number of pages
        $totalPages = ceil($totalRecords / $records_per_page);

        // Calculate the offset for the query
        $offset = ($page - 1) * $records_per_page;

        // Use prepared statement to avoid SQL injection
        $sql = "SELECT BLOG_ID, BLOG_TITLE, USER_ID, USER_NAME, CONTENT, BLOG_DAY, BLOG_IMG 
            FROM blog
            where BLOG_TITLE like ?
            ORDER BY BLOG_ID
            LIMIT ?, ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sii', $searchTerm, $offset, $records_per_page);
        $stmt->execute();
        $result = $stmt->get_result();

        $data = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $row['BLOG_IMG'] = base64_encode($row['BLOG_IMG']); //end code image data
                $data[] = $row;
            }
        }

        $response = array(
            'data' => $data,
            'totalPages' => $totalPages
        );
        $stmt->close();
        return $response;
    }
}


// FETCH product_size TABLE
function fetchImages()
{
    global $conn;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];

        // Use prepared statement to avoid SQL injection
        $sql = "SELECT BLOG_IMG FROM blog WHERE BLOG_ID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();

        $data = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $row['BLOG_IMG'] = base64_encode($row['BLOG_IMG']);
               $data = $row;
            }
        }

        $stmt->close();
        return $data;
    }

    return ['result' => false];
}


// Check the action parameter in the request
if (isset($_POST['action'])) {
    $action = $_POST['action'];

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
        case 'update':
            echo json_encode(updateBlog());
            break;
       
            case 'search':
            echo json_encode(searchBlog());
            break;
        case 'fetch-images':
            echo json_encode(fetchImages());
            break;
        default:
            echo json_encode(['success' => false, 'message' => 'Invalid action']);
    }
} 
else 
{
    echo json_encode(['success' => false, 'message' => 'Action not specified']);
}

// Close the database connection

?>

