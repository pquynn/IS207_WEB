<?php
// Include the database configuration file
include '../connect.php';

//FETCH DATA
function fetchEmployees() {
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


//INSERT 
function insertEmployee() {
    global $conn;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = ($_POST['username']);
        $name = ($_POST['name']);
        $phone = ($_POST['phone']);
        $birthday = ($_POST['birthday']);
        $gender = ($_POST['gender']);
        $address = ($_POST['address']);
        $role = ($_POST['role']);
        $password = generateRandomPassword();
        $id = generateUserId();

        if (checkExist($username)) {
            return ['result' => false, 'message' => 'Tên đăng nhập đã có trong hệ thống'];
        } else {
            // Use prepared statement to avoid SQL injection
            $sql1 = "INSERT INTO login (user_login, user_password, role_id) VALUES (?, ?, ?)";
            $stmt1 = $conn->prepare($sql1);
            $stmt1->bind_param('ssi', $username, $password, $role);
            $result1 = $stmt1->execute();
            $stmt1->close();

            if ($result1) {
                $sql2 = "INSERT INTO users (user_id, user_login, user_name, user_telephone, birthday, gender, address) VALUES (?, ?, ?, ?, ?, ?, ?)";
                $stmt2 = $conn->prepare($sql2);
                $stmt2->bind_param('sssssss', $id, $username, $name, $phone, $birthday, $gender, $address);
                $result2 = $stmt2->execute();
                $stmt2->close();

                if ($result2) {
                    return ['result' => true, 'message' => 'Thêm thành công'];
                } else {
                    return ['result' => false, 'message' => 'Thêm không thành công'];
                }
            } else {
                return ['result' => false, 'message' => 'Thêm không thành công'];
            }
        }
    } else {
        return ['result' => false, 'message' => 'Thêm không thành công'];
    }
}

// function insertEmployee() {
//     global $conn;

//     if ($_SERVER['REQUEST_METHOD'] === 'POST') {

//         $username = ($_POST['username']);
//         $name = ($_POST['name']);
//         $phone = ($_POST['phone']);
//         $birthday = ($_POST['birthday']);
//         $gender = ($_POST['gender']);
//         $address = ($_POST['address']);
//         $role = ($_POST['role']);
//         $password = generateRandomPassword();
//         $id = generateUserId();

//         if (checkExist($username)) {
//             return ['result' => false, 'message' => 'Tên đăng nhập đã có trong hệ thống'];
//             // $response = false;
//         } 
//         else {
//             //TODO: CHECK LẠI NHỮNG CÁI NGƯỜI DÙNG NHẬP VÀO VÀ NGĂN CHẶN SQL INJECTION
//             $sql1 = "INSERT INTO login (user_login, user_password, role_id)
//                     VALUES ('$username', '$password', '$role')";
//             $result1 = $conn->query($sql1);

//             if($result1){
//             $sql2 = "INSERT INTO users (user_id, user_login, user_name, user_telephone, birthday, gender, address)
//             VALUES ('$id', '$username', '$name', '$phone', '$birthday', '$gender', '$address')";
//             $result2 = $conn->query($sql2);
                
//             if($result2)
//                 return ['result' => true, 'message' => 'Thêm thành công'];
//             else
//                 return (['result' => true, 'message' => 'Thêm không thành công']);
//         }
//         else
//             return (['result' => true, 'message' => 'Thêm không thành công']);
                
//         }
//         // return $response;
//     }
//     else
//         return (['result' => false, 'message' => 'Thêm không thành công']);
// }
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
    return  $row['count'] > 0;
}

//UPDATE 
function updateEmployee() {
    global $conn;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = ($_POST['id']);
        $username = ($_POST['username']);
        $name = ($_POST['name']);
        $phone = ($_POST['phone']);
        $birthday = ($_POST['birthday']);
        $gender = ($_POST['gender']);
        $address = ($_POST['address']);
        $role = ($_POST['role']);

        // Use prepared statement to avoid SQL injection
        $sql = "UPDATE users SET user_name = ?, user_telephone = ?, birthday = ?, gender = ?, address = ? WHERE user_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssssss', $name, $phone, $birthday, $gender, $address, $id);
        $result = $stmt->execute();
        $stmt->close();

        if ($result) {
            $sql = "UPDATE login SET role_id = ? WHERE user_login = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('is', $role, $username);
            $result = $stmt->execute();
            $stmt->close();

            if ($result) {
                return ['result' => true, 'message' => 'Cập nhật thành công'];
            } else {
                return ['result' => false, 'message' => 'Cập nhật không thành công'];
            }
        } else {
            return ['result' => false, 'message' => 'Cập nhật không thành công'];
        }
    } else {
        return ['result' => false, 'message' => 'Cập nhật không thành công'];
    }
}

// function updateEmployee() {
//     global $conn;

//     if ($_SERVER['REQUEST_METHOD'] === 'POST') {

//         $id = ($_POST['id']);
//         $username = ($_POST['username']);
//         $name = ($_POST['name']);
//         $phone = ($_POST['phone']);
//         $birthday = ($_POST['birthday']);
//         $gender = ($_POST['gender']);
//         $address = ($_POST['address']);
//         $role = ($_POST['role']);

//         //TODO: CHECK LẠI NHỮNG CÁI NGƯỜI DÙNG NHẬP VÀO VÀ NGĂN CHẶN SQL INJECTION
//         $sql = "UPDATE users 
//                 SET user_name = '$name', user_telephone = '$phone', birthday = '$birthday',
//                 gender = '$gender', address = '$address'
//                 WHERE user_id = '$id'";
//         $result = $conn->query($sql);
            
//         if($result){
//             $sql = "UPDATE login 
//                 SET role_id = '$role'
//                 WHERE user_login = '$username'";
//             $result = $conn->query($sql);

//             if($result)
//                 return ['result' => true, 'message' => 'Thêm thành công'];
//             else
//                 return (['result' => true, 'message' => 'Thêm không thành công']); 
//         } 
//         else
//             return (['result' => true, 'message' => 'Thêm không thành công']); 
//     }
//     else
//         return (['result' => false, 'message' => 'Thêm không thành công']);
// }

// //DELETE
function deleteEmployee() {
    global $conn;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $employeeId = trim($_POST['employee_id'], " ");
        $employeeLogin = trim($_POST['employee_login'], " ");

        // Use prepared statement to avoid SQL injection
        $sql1 = "DELETE FROM users WHERE user_id = ?";
        $stmt1 = $conn->prepare($sql1);
        $stmt1->bind_param('s', $employeeId);
        $result1 = $stmt1->execute();
        $stmt1->close();

        if ($result1) {
            $sql2 = "DELETE FROM login WHERE user_login = ?";
            $stmt2 = $conn->prepare($sql2);
            $stmt2->bind_param('s', $employeeLogin);
            $result2 = $stmt2->execute();
            $stmt2->close();

            return $result2;
        } else {
            return ['result' => false];
        }
    }

    return ['result' => false];
}

// function deleteEmployee() {
//     global $conn;

//     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//         $employeeId = trim($_POST['employee_id'], " ");
//         $employeeLogin = trim($_POST['employee_login'], " ");
        
//         $sql1 = "DELETE FROM users WHERE user_id LIKE '$employeeId'";
//         // $sql1 = "SELECT count(*) as total from users WHERE user_id LIKE '$employeeId' ";
//         $result1 = $conn->query($sql1);
//         // $totalRecordsResult = $conn->query($sql1);
//         // $totalRecords = $totalRecordsResult->fetch_assoc()['total'];
//         if($result1){
//             $sql2 = "DELETE FROM login WHERE user_login LIKE '$employeeLogin'";
//             $result2 = $conn->query($sql2);
//             return $result2;
//         }
//         else
//             return ['result' => false]; 
//     }
    
//          return ['result' => false];
// }



// //SEARCH CATEGORIES
function searchEmployees() {
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
        $totalRecordsQuery = "SELECT COUNT(*) as total  
                            FROM users, login, role
                            WHERE users.user_login = login.user_login
                            and login.role_id = role.role_id
                            and (role.role_id = 1 or role.role_id = 2) 
                            and user_name LIKE ?";

        $stmt = $conn->prepare($totalRecordsQuery);
        $stmt->bind_param('s', $searchTerm);
        $stmt->execute();
        $totalRecordsResult = $stmt->get_result();
        $totalRecords = $totalRecordsResult->fetch_assoc()['total'];
        $stmt->close();

        // Calculate the total number of pages
        $totalPages = ceil($totalRecords / $records_per_page);

        // Calculate the offset for the query
        $offset = ($page - 1) * $records_per_page;

        // Fetch data from the database with pagination using prepared statement
        $sql = "SELECT * 
        FROM users, login, role
        WHERE users.user_login = login.user_login
        and login.role_id = role.role_id
        and (role.role_id = 1 or role.role_id = 2) 
        and user_name LIKE ?
        ORDER BY user_id
        LIMIT ?, ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sii', $searchTerm, $offset, $records_per_page);
        $stmt->execute();
        $result = $stmt->get_result();

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

        $stmt->close();
        return $response;
    }
}

// function searchEmployees(){
//     global $conn;

//     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//         $searchTerm = $_POST['searchTerm'];
//         $records_per_page = 20;

//         // Get the current page number from the URL
//         if (isset($_POST['page']) && is_numeric($_POST['page'])) {
//             $page = intval($_POST['page']);
//         } else {
//             $page = 1;
//         }

//         // Get the total number of records from the database
//         $totalRecordsQuery = "SELECT COUNT(*) as total  
//                             FROM users, login, role
//                             WHERE users.user_login = login.user_login
//                             and login.role_id = role.role_id
//                             and (role.role_id = 1 or role.role_id = 2) 
//                             and user_name LIKE '%$searchTerm%'";

//         $totalRecordsResult = $conn->query($totalRecordsQuery);
//         $totalRecords = $totalRecordsResult->fetch_assoc()['total'];

//         // Calculate the total number of pages
//         $totalPages = ceil($totalRecords / $records_per_page);


//         // Calculate the offset for the query
//         $offset = ($page - 1) * $records_per_page;

//         // Fetch data from the database with pagination
//         $sql = "SELECT * 
//         FROM users, login, role
//         WHERE users.user_login = login.user_login
//         and login.role_id = role.role_id
//         and (role.role_id = 1 or role.role_id = 2) 
//         and user_name LIKE '%$searchTerm%'
//         ORDER BY user_id
//         LIMIT $offset, $records_per_page";

//         $result = $conn->query($sql);

//         $data = [];

//         if ($result->num_rows > 0) {
//             while ($row = $result->fetch_assoc()) {
//                 $data[] = $row;
//             }
//         }

//         // Create an associative array with multiple values
//         $response = array(
//             'data' => $data,
//             'totalPages' => $totalPages
//         );

//         return $response;
//     }
// }

// Check the action parameter in the request
if (isset($_POST['action'])) {
    $action = $_POST['action'];

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




