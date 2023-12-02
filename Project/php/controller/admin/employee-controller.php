<?php
// Include the database configuration file
include '../connect.php';

//FETCH DATA
function fetchEmployees() {
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
                          FROM users, login, role
                          WHERE users.user_login = login.user_login
                          and login.role_id = role.role_id
                          and (role.role_id = 1 or role.role_id = 2)";
    $totalRecordsResult = $conn->query($totalRecordsQuery);
    $totalRecords = $totalRecordsResult->fetch_assoc()['total'];

    // Calculate the total number of pages
    $totalPages = ceil($totalRecords / $records_per_page);


    // Calculate the offset for the query
    $offset = ($page - 1) * $records_per_page;

    // Fetch data from the database with pagination
    $sql = "SELECT * 
            FROM users, login, role
            WHERE users.user_login = login.user_login
            and login.role_id = role.role_id
            and (role.role_id = 1 or role.role_id = 2)
            ORDER BY user_id
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

//FETCH ROLE TABLE
// function fetchRoles(){
//     global $conn;

//     $sql = "SELECT role_id, role_name FROM role";
//     $result = $conn->query($sql);

//     $data = [];

//     if ($result->num_rows > 0) {
//         while ($row = $result->fetch_assoc()) {
//             $data[] = $row;
//         }
//     }

//     return $data;
// }


//INSERT 
function insertEmployee() {
    global $conn;

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $employee = $_GET['employee'];

        $exist = checkExist($employee);

        if($exist){
            return false;
        }
        else{
            $sql = "INSERT INTO category (category_name) VALUES ('')";
            $result = $conn->query($sql);

            return $result; 
        }
    }
    else
    return false;
}

//UPDATE 
function updateEmployee() {
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
function deleteEmployee() {
    global $conn;

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $employeeId = $_GET['employee_id'];
        $employeeLogin = $_GET['employee_login'];
        $sql1 = "DELETE FROM users WHERE user_id LIKE '$employeeId'";
        $result1 = $conn->query($sql1);

        if($result1){
            $sql2 = "DELETE FROM `login` WHERE user_login LIKE '$employeeLogin'";
            $result2 = $conn->query($sql2);
            //return $result2;
        }
        //else
            //return $result1; 
    
    return $employeeLogin;
    }
    
         //return ['result' => false];
}


//CHECK VALIDATION
function checkExist($categoryName) { 
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
function searchEmployees(){
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
                            FROM users, login, role
                            WHERE users.user_login = login.user_login
                            and login.role_id = role.role_id
                            and (role.role_id = 1 or role.role_id = 2) 
                            and user_name LIKE '%$searchTerm%'";

        $totalRecordsResult = $conn->query($totalRecordsQuery);
        $totalRecords = $totalRecordsResult->fetch_assoc()['total'];

        // Calculate the total number of pages
        $totalPages = ceil($totalRecords / $records_per_page);


        // Calculate the offset for the query
        $offset = ($page - 1) * $records_per_page;

        // Fetch data from the database with pagination
        $sql = "SELECT * 
        FROM users, login, role
        WHERE users.user_login = login.user_login
        and login.role_id = role.role_id
        and (role.role_id = 1 or role.role_id = 2) 
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
            echo json_encode(fetchEmployees());
            break;
        case 'insert':
            echo json_encode(insertEmployee());
            break;
        case 'delete':
            echo json_encode(deleteEmployee());
            break;
        case 'update':
            echo json_encode(updateEmployee());
            break;
        case 'search':
            echo json_encode(searchEmployees());
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




