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

        $username = ($_GET['username']);
        $name = ($_GET['name']);
        $phone = ($_GET['phone']);
        $birthday = ($_GET['birthday']);
        $gender = ($_GET['gender']);
        $address = ($_GET['address']);
        $role = ($_GET['role']);
        $password = generateRandomPassword();
        $id = generateUserId();

        if (checkExist($username)) {
            return ['result' => false, 'message' => 'Tên đăng nhập đã có trong hệ thống'];
            // $response = false;
        } 
        else {
            //TODO: CHECK LẠI NHỮNG CÁI NGƯỜI DÙNG NHẬP VÀO VÀ NGĂN CHẶN SQL INJECTION
            //todo csdl phải thêm trigger tạo day_add tự động
            $sql1 = "INSERT INTO login (user_login, user_password, role_id)
                    VALUES ('$username', '$password', '$role')";
            $result1 = $conn->query($sql1);

            if($result1){
            $sql2 = "INSERT INTO users (user_id, user_login, user_name, user_telephone, birthday, gender, addresss)
            VALUES ('$id', '$username', '$name', '$phone', '$birthday', '$gender', '$address')";
            $result2 = $conn->query($sql2);
                
            if($result2)
                return ['result' => true, 'message' => 'Thêm thành công'];
            else
                return (['result' => true, 'message' => 'Thêm không thành công']);
        }
        else
            return (['result' => true, 'message' => 'Thêm không thành công']);
                
        }
        // return $response;
    }
    else
        return (['result' => false, 'message' => 'Thêm không thành công']);
}


            // $sql1 = "INSERT INTO login (user_login, user_password role_id)
            //         VALUES (
            //             '" . mysqli_real_escape_string($conn, $employee['username']) . "',
            //             '".generateRandomPassword()."',
            //             '" . mysqli_real_escape_string($conn, $employee['role']) . "'
            //         )";
            // $result1 = $conn->query($sql1);
            // $row = $result1->fetch_assoc();
    
            // if($row['count'] > 0){
            //     $sql2 = "INSERT INTO users (username, name, phone, date_of_birth, gender, address, role_id)
            //         VALUES (
            //             '" . mysqli_real_escape_string($conn, $employee['username']) . "',
            //             '" . mysqli_real_escape_string($conn, $employee['name']) . "',
            //             '" . mysqli_real_escape_string($conn, $employee['phone']) . "',
            //             '" . mysqli_real_escape_string($conn, $employee['date_of_birth']) . "',
            //             '" . mysqli_real_escape_string($conn, $employee['gender']) . "',
            //             '" . mysqli_real_escape_string($conn, $employee['address']) . "',
            //             '" . mysqli_real_escape_string($conn, $employee['role']) . "'
            //         )";
            //     $result2 = $conn->query($sql2);
            // }
            // else
            //     return false; 
        // }

        // return array('message' => $message, 'result' => $result);
    // }
    // else
    // return false;
// }

//function to automatically generate password
function generateRandomPassword() {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $password = '';

    for ($i = 0; $i < 10; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $password .= $characters[$index];
    }

    return $password;
}
//function to automatically generate user_id
function generateUserId($prefix = 'NV') {
    // Use a combination of prefix and a unique identifier (timestamp and random number)
    $uniqueId = time() . mt_rand(1000, 9999);

    // Concatenate the prefix and unique identifier to create the user_id
    $userId = $prefix . $uniqueId;

    return $userId;
}

//CHECK VALIDATION
function checkExist($username) { 
    global $conn;
    // Check if the category name already exists
    // $user_login = trim(mysqli_real_escape_string($conn, $employee['username']). " ");
    $sql = "SELECT COUNT(*) as count FROM login WHERE user_login like '$username'";
    $result = $conn->query($sql);

    $row = $result->fetch_assoc();
    // echo 'login find '. $row['count'];
    return  $row['count'] > 0;
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
        $employeeId = trim($_GET['employee_id'], " ");
        $employeeLogin = trim($_GET['employee_login'], " ");
        
        $sql1 = "DELETE FROM users WHERE user_id LIKE '$employeeId'";
        // $sql1 = "SELECT count(*) as total from users WHERE user_id LIKE '$employeeId' ";
        $result1 = $conn->query($sql1);
        // $totalRecordsResult = $conn->query($sql1);
        // $totalRecords = $totalRecordsResult->fetch_assoc()['total'];
        if($result1){
            $sql2 = "DELETE FROM login WHERE user_login LIKE '$employeeLogin'";
            $result2 = $conn->query($sql2);
            return $result2;
        }
        else
            return ['result' => false]; 
    }
    
         return ['result' => false];
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
        ORDER BY user_id
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




