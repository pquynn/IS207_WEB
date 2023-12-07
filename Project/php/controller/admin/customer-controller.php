<?php
// Include the database configuration file
include '../connect.php';

//FETCH DATA
function fetchCustomers() {
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
    $totalRecordsQuery = "SELECT COUNT(*) as total 
                          FROM users, login
                          WHERE users.user_login = login.user_login
                          and role_id = 3";
    $totalRecordsResult = $conn->query($totalRecordsQuery);
    $totalRecords = $totalRecordsResult->fetch_assoc()['total'];

    // Calculate the total number of pages
    $totalPages = ceil($totalRecords / $records_per_page);


    // Calculate the offset for the query
    $offset = ($page - 1) * $records_per_page;

    // Fetch data from the database with pagination
    $sql = "SELECT * 
            FROM users, login
            WHERE users.user_login = login.user_login
            and role_id = 3
            LIMIT $offset, $records_per_page";

    $result = $conn->query($sql);

    $data = array();

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


//UPDATE 
function updateCustomer() {
    global $conn;

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {

        $id = ($_GET['id']);
        $name = ($_GET['name']);
        $phone = ($_GET['phone']);
        $birthday = ($_GET['birthday']);
        $gender = ($_GET['gender']);
        $address = ($_GET['address']);

        //TODO: CHECK LẠI NHỮNG CÁI NGƯỜI DÙNG NHẬP VÀO VÀ NGĂN CHẶN SQL INJECTION
        $sql = "UPDATE users 
                SET user_name = '$name', user_telephone = '$phone', birthday = '$birthday',
                gender = '$gender', addresss = '$address'
                WHERE user_id = '$id'";
        $result = $conn->query($sql);
            
        if($result)
            return (['result' => true, 'message' => 'Thêm thành công']);
        else
            return (['result' => true, 'message' => 'Thêm không thành công']); 
    }
    else
        return (['result' => false, 'message' => 'Thêm không thành công']);
}

//DELETE
function deleteCustomer() {
    global $conn;

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $customerId = trim($_GET['customer_id'], " ");
        $customerLogin = trim($_GET['customer_login'], " ");
    
        $sql1 = "DELETE FROM users WHERE user_id = '$customerId'";
        $result1 = $conn->query($sql1);

        if($result1){
            $sql2 = "DELETE FROM login WHERE user_login = '$customerLogin'";
            $result2 = $conn->query($sql2);
            return $result2;
        }
        else
            return ['result' => false]; 
    }
    
         return ['result' => false];
    
}


//CHECK VALIDATION
// function checkExist($categoryName) { 
//     global $conn;
//     // Check if the category name already exists
//     $sql = "SELECT COUNT(*) as count FROM category WHERE category_name = '$categoryName'";
//     $result = $conn->query($sql);

//     if ($result) {
//         $row = $result->fetch_assoc();
//         if($row['count'] > 0)
//             return true;
//         else
//             return false;
        
//     } else {
//         // Error in the query
//         return true;
//     }
// }

//SEARCH CATEGORIES
function searchCustomers(){
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
        $totalRecordsQuery = "SELECT COUNT(*) as total  
                            FROM users, login
                            WHERE users.user_login = login.user_login
                            and role_id = 3
                            and user_name LIKE '%$searchTerm%'";

        $totalRecordsResult = $conn->query($totalRecordsQuery);
        $totalRecords = $totalRecordsResult->fetch_assoc()['total'];

        // Calculate the total number of pages
        $totalPages = ceil($totalRecords / $records_per_page);


        // Calculate the offset for the query
        $offset = ($page - 1) * $records_per_page;

        // Fetch data from the database with pagination
        $sql = "SELECT * 
                FROM users, login
                WHERE users.user_login = login.user_login
                and role_id = 3
                and user_name LIKE '%$searchTerm%'
                LIMIT $offset, $records_per_page";

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
            echo json_encode(fetchCustomers());
            break;
        case 'delete':
            echo json_encode(deleteCustomer());
            break;
        case 'update':
            echo json_encode(updateCustomer());
            break;
        case 'search':
            echo json_encode(searchCustomers());
            break;
        // case 'fetch-roles':
        //     echo json_encode(fetchRoles());
        //     break;
        default:
            echo json_encode(['success' => false, 'message' => 'Invalid action']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Action not specified']);
}
// Close the database connection
$conn->close();
?>




