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
    $sql = "SELECT DISTINCT blog.BLOG_ID, blog.BLOG_TITLE, blog.USER_ID, blog.USER_NAME, blog.CONTENT, blog.BLOG_DAY, blog.BLOG_IMG 
                
            FROM blog, users
            WHERE blog.USER_ID = users.USER_ID
            
            ORDER BY blog.BLOG_ID
            LIMIT $offset, $records_per_page";

    $result = $conn->query($sql);

    $data = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $row['first_picture'] = base64_encode($row['first_picture']); //end code image data
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

//INSERT 
// function insertProduct() {
//     global $conn;

//     if ($_SERVER['REQUEST_METHOD'] === 'POST') {

//         $name = ($_POST['name']);
//         $price = (int) ($_POST['price']);
//         $category_id = (int) ($_POST['category_id']);
//         $color = ($_POST['color']);
//         $description = ($_POST['description']);
//         $gender = ($_POST['gender']);
//         $product_variants = ($_POST['product_variants']);

//         if(!checkExist($name)){
//             //TODO: CHECK LẠI NHỮNG CÁI NGƯỜI DÙNG NHẬP VÀO VÀ NGĂN CHẶN SQL INJECTION
//             $sql1 = "INSERT INTO products (product_name, color, price, description, gender, category_id)
//             VALUES ('$name', '$color', $price, '$description', '$gender', $category_id)";
//             $result1 = $conn->query($sql1);

//             if($result1){
//                 //TÌM PRODUCT_ID CỦA SẢN PHẨM MỚI ĐƯỢC THÊM VÀO
//                 $sql = "SELECT product_id FROM products WHERE product_name like '$name'";
//                 $result = $conn->query($sql);

//             if ($result) {
//                 $row = $result->fetch_assoc();
//                 $id = (int) $row['product_id'];

//                 foreach ($product_variants as $variant) {
//                     $size = (int)$variant['size'];
//                     $quantity =(int)$variant['quantity'];

//                     $sql2 = "INSERT INTO product_size (product_id, size, quantity)
//                     VALUES ($id, $size, $quantity)";
//                     $result2 = $conn->query($sql2);

//                     if(!$result2)
//                         break;
//                 }

//                 if($result2)
//                     return ['result' => true, 'message' => 'Thêm thành công'];
//                 else
//                     return (['result' => false, 'message' => 'Thêm product_size không thành công']);
//             }
//             else
//                 return (['result' => false, 'message' => 'Không tìm thấy product_id']);
//         }
//         else
//             return (['result' => false, 'message' => 'Thêm bảng products không thành công']);
                    
//         }
//         else
//             return (['result' => false, 'message' => 'Tên sản phảm đã tồn tại']);
        
//     }
//     else
//     return (['result' => false, 'message' => 'Thêm không thành công. Không lấy được giá trị']);
// }
function insertBlog() {
    global $conn;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = ($_POST['BLOG_ID']);
        $user_id = (int) ($_POST['USER_ID']);
        $user_name = (int) ($_POST['USER_NAME']);
        $date = ($_POST['BLOG_DAY']);
        $content = (int) ($_POST['CONTENT']);
        $img = (int) ($_POST['BLOG_IMG']);
        $name = (int) ($_POST['BLOG_title']);

        if (!checkExist($name)) {
            // Use prepared statement to avoid SQL injection
            $sql1 = "INSERT INTO blog (BLOG_ID, USER_ID, USER_NAME, BLOG_DAY, CONTENT, BLOG_IMG, BLOG_TITLE)
            VALUES (?, ?, ?, ?, ?, ?)";
            $stmt1 = $conn->prepare($sql1);
            $stmt1->bind_param('ssissi', $id, $user_id, $user_name, $date, $content, $img, $name);
            $result1 = $stmt1->execute();
            $stmt1->close();

            if ($result1) {
                // Find PRODUCT_ID of the newly added product
                $sql = "SELECT BLOG_ID FROM blog WHERE BLOG_TITLE like ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('s', $name);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result) {
                    $row = $result->fetch_assoc();
                    $id = (int) $row['BLOG_ID'];

                    
                    }
                }
                
                    if ($result2) {
                        return ['result' => true, 'message' => 'Thêm thành công'];
                   
                    }
                }else {
                    return (['result' => false, 'message' => 'Không tìm thấy blog_id']);
                }
              else {
                return (['result' => false, 'message' => 'Thêm bảng Blog không thành công']);
            }
        else {
            return (['result' => false, 'message' => 'Tên Blog đã tồn tại']);
        }
    else {
        return (['result' => false, 'message' => 'Thêm không thành công. Không lấy được giá trị']);
    }
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



// function updateProduct() {
//     global $conn;

//     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//         $name = trim($_POST['name'], " ");
//         $id = trim($_POST['id'], " ");
//         $price = (int) ($_POST['price']);
//         $category_id = (int) ($_POST['category_id']);
//         $color = ($_POST['color']);
//         $description = ($_POST['description']);
//         $gender = ($_POST['gender']);
//         $product_variants = ($_POST['product_variants']);

//         $sql = "SELECT COUNT(*) as count FROM products 
//                 WHERE product_name like '$name' and product_id <> $id";
//         $result = $conn->query($sql);
    
//         $row = $result->fetch_assoc();
//         $isExist = $row['count'] > 0;

//         if(!$isExist){
//             //TODO: CHECK LẠI NHỮNG CÁI NGƯỜI DÙNG NHẬP VÀO VÀ NGĂN CHẶN SQL INJECTION
//             $sql = "UPDATE products
//                      SET product_name = '$name', color = '$color', price= $price, description = '$description', gender = '$gender', category_id = $category_id
//                      WHERE product_id = $id";
            
//             $result = $conn->query($sql);

//             if ($result) {
//                 return updateVariants($id, $product_variants);
        
//             }
//             else
//                 return (['result' => false, 'message' => 'Cập nhật bảng products không thành công']);   
//         }
//         else
//             return (['result' => false, 'message' => 'Tên sản phảm đã tồn tại']); 
//     }
//     else
//     return (['result' => false, 'message' => 'Cập nhật không thành công. Không lấy được giá trị']);
// }


// function updateVariants($id, $variants){
//     global $conn;
//     // Assuming $variants is an array with each element having 'size' and 'quantity' properties
//     // and $data is the result of a select statement "SELECT size, quantity FROM product_size WHERE product_id = $id"
//     $sql = "SELECT size, quantity FROM product_size WHERE product_id = $id";
//     $result = $conn->query($sql);

//     $data = [];

//     if ($result->num_rows > 0) {
//         while ($row = $result->fetch_assoc()) {
//             $data[] = $row;
//         }
    
//         // Loop through $variants
//         foreach ($variants as $variant) {
//             $size = $variant['size'];
//             $quantity = $variant['quantity'];

//             // Check if the size exists in $data
//             $sizeExists = false;
//             foreach ($data as $existingData) {
//                 if ($existingData['size'] == $size) {
//                     $sizeExists = true;

//                     // Update the quantity if the size exists
//                     $updateSql = "UPDATE product_size SET quantity = $quantity WHERE product_id = $id AND size = $size";
//                     $updateResult = $conn->query($updateSql);

//                     if (!$updateResult) {
//                         return ['result' => false, 'message' => 'Cập nhật product_size không thành công'];
//                     }

//                     break; // Exit the loop once the size is found
//                 }
//             }

//             // If the size does not exist in $data, insert a new entry
//             if (!$sizeExists) {
//                 $insertSql = "INSERT INTO product_size (product_id, size, quantity) VALUES ($id, $size, $quantity)";
//                 $insertResult = $conn->query($insertSql);

//                 if (!$insertResult) {
//                     return ['result' => false, 'message' => 'Cập nhật product_size không thành công'];
//                 }
//             }
//         }

//         // Loop through $data to find sizes that need deletion
//         foreach ($data as $existingData) {
//             $existingSize = $existingData['size'];

//             // Check if the existing size is not in $variants
//             $sizeToDelete = true;
//             foreach ($variants as $variant) {
//                 if ($variant['size'] == $existingSize) {
//                     $sizeToDelete = false;
//                     break; // Exit the loop once the size is found in $variants
//                 }
//             }

//             // If the size needs deletion, delete the entry
//             if ($sizeToDelete) {
//                 $deleteSql = "DELETE FROM product_size WHERE product_id = $id AND size = $existingSize";
//                 $deleteResult = $conn->query($deleteSql);

//                 if (!$deleteResult) {
//                     return ['result' => false, 'message' => 'Cập nhật product_size không thành công'];
//                 }
//             }
//         }
//         return ['result' => true, 'message' => 'Cập nhật thành công'];
//     }
//     return ['result' => false, 'message' => 'Không có product_size thỏa yêu cầu'];
// }

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
            return ['result' => true]
        } else {
            return ['result' => false];
        }
    } 
}

// function deleteProduct() {
//     global $conn;

//     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//         $productId = trim($_POST['product_id'], " ");

//         //todo: add constraint in database on delete cascade table product_img;
//         //todo: cannot delete because a lot of constraint
//         $sql1 = "DELETE FROM product_pictures WHERE product_id like '$productId'";
//         $result1 = $conn->query($sql1);
        
//         if($result1){
//             $sql = "DELETE FROM products WHERE product_id like '$productId'";
//             $result = $conn->query($sql);
//             return $result;
//         }
//         else return  ['result' => false];
//     }
//     else
//         return ['result' => false];

//     // echo $productId;
    
// }

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
        $sql = "SELECT DISTINCT blog.BLOG_ID, blog.BLOG_TITLE, blog.USER_ID, blog.USER_NAME, blog.CONTENT, blog.BLOG_DAY, blog.BLOG_IMG 
                
        FROM blog, users
        WHERE blog.USER_ID = users.USER_ID
        
        ORDER BY blog.BLOG_ID
        LIMIT ?, ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sii', $searchTerm, $offset, $records_per_page);
        $stmt->execute();
        $result = $stmt->get_result();

        $data = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $row['first_picture'] = base64_encode($row['first_picture']); //end code image data
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

// function searchProducts() {
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
//                             FROM products
//                             WHERE product_name LIKE '%$searchTerm%'";

//         $totalRecordsResult = $conn->query($totalRecordsQuery);
//         $totalRecords = $totalRecordsResult->fetch_assoc()['total'];

//         // Calculate the total number of pages
//         $totalPages = ceil($totalRecords / $records_per_page);


//         // Calculate the offset for the query
//         $offset = ($page - 1) * $records_per_page;

//         // Fetch data from the database with pagination
//         $sql = "SELECT DISTINCT products.product_id, products.product_name, products.color, 
//                 products.price, products.description, products.gender, category.category_name, first_picture 
//                 FROM products, product_pictures, category
//                 WHERE products.category_id = category.category_id
//                 and products.product_id = product_pictures.product_id
//                 and product_name LIKE '%$searchTerm%'
//                 ORDER BY products.product_id  
//                 LIMIT $offset, $records_per_page";

//         $result = $conn->query($sql);

//         $data = [];

//         if ($result->num_rows > 0) {
//             while ($row = $result->fetch_assoc()) {
//                 $row['first_picture'] = base64_encode($row['first_picture']); //end code image data
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


// FETCH product_size TABLE
function fetchImages()
{
    global $conn;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['BLOG_ID'];

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
               
            }
        }

        $stmt->close();
        return $data;
    }

    return ['result' => false];
}

// //FETCH product_size TABLE
// function fetchVariants(){
//     global $conn;
//     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//         $id = $_POST['id'];

//         $sql = "SELECT size, quantity FROM product_size WHERE product_id = $id";
//         $result = $conn->query($sql);

//         $data = [];

//         if ($result->num_rows > 0) {
//             while ($row = $result->fetch_assoc()) {
//                 $data[] = $row;
//             }
//         }
//         return $data;
//     }   
//     return ['result' => false];
// }

// //FETCH product_size TABLE
// function fetchImages(){
//     global $conn;
//     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//         $id = $_POST['id'];

//         $sql = "SELECT first_picture, second_picture, third_picture FROM product_pictures WHERE product_id = $id";
//         $result = $conn->query($sql);

//         if ($result->num_rows > 0) {
//             while ($row = $result->fetch_assoc()) {
//                 $row['first_picture'] = base64_encode($row['first_picture']);
//                 $row['second_picture'] = base64_encode($row['second_picture']);
//                 $row['third_picture'] = base64_encode($row['third_picture']);
//                 $data = $row;
//             }
//         }
//         return $data;
//     }   
//     return ['result' => false];
// }


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
            break
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

