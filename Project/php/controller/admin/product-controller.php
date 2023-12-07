<?php
// Include the database configuration file
include '../connect.php';

//Fetch Product data
function fetchProducts() {
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
                        FROM products";
    $totalRecordsResult = $conn->query($totalRecordsQuery);
    $totalRecords = $totalRecordsResult->fetch_assoc()['total'];

    // Calculate the total number of pages
    $totalPages = ceil($totalRecords / $records_per_page);


    // Calculate the offset for the query
    $offset = ($page - 1) * $records_per_page;

    // Fetch data from the database with pagination
    $sql = "SELECT DISTINCT products.product_id, products.product_name, products.color, 
                products.price, products.description, products.gender, 
                category.category_name, first_picture 
            FROM products, product_pictures, category
            WHERE products.category_id = category.category_id
            and products.product_id = product_pictures.product_id
            ORDER BY products.product_id 
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

        //return ['data' => $data, 'totalPages' => $totalPages];
        return $response;
}

//INSERT 
function insertProduct() {
    global $conn;

}

//INSERT 
function updateProduct() {
    global $conn;

}

//INSERT 
function deleteProduct() {
    global $conn;

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $productId = trim($_GET['product_id'], " ");

        //todo: add constraint in database on delete cascade table product_img;
        //todo: cannot delete because a lot of constraint
        $sql1 = "DELETE FROM product_pictures WHERE product_id like '$productId'";
        $result1 = $conn->query($sql1);
        
        if($result1){
            $sql = "DELETE FROM products WHERE product_id like '$productId'";
            $result = $conn->query($sql);
            return $result;
        }
        else return  ['result' => false];
    }
    else
        return ['result' => false];

    // echo $productId;
    
}

//INSERT 
function searchProducts() {
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
                            FROM products
                            WHERE product_name LIKE '%$searchTerm%'";

        $totalRecordsResult = $conn->query($totalRecordsQuery);
        $totalRecords = $totalRecordsResult->fetch_assoc()['total'];

        // Calculate the total number of pages
        $totalPages = ceil($totalRecords / $records_per_page);


        // Calculate the offset for the query
        $offset = ($page - 1) * $records_per_page;

        // Fetch data from the database with pagination
        $sql = "SELECT DISTINCT products.product_id, products.product_name, products.color, 
                products.price, products.description, products.gender, category.category_name, first_picture 
                FROM products, product_pictures, category
                WHERE products.category_id = category.category_id
                and products.product_id = product_pictures.product_id
                and product_name LIKE '%$searchTerm%'
                ORDER BY products.product_id  
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
}

//FETCH category TABLE
function fetchCategories(){
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

// Check the action parameter in the request
if (isset($_GET['action'])) {
    $action = $_GET['action'];

    // Execute the corresponding function based on the action
    switch ($action) {
        case 'fetch':
            // Return the fetched data as JSON response
            echo json_encode(fetchProducts());
            break;
        case 'insert':
            echo json_encode(insertProduct());
            break;
        case 'delete':
            echo json_encode(deleteProduct());
            break;
        case 'update':
            echo json_encode(updateProduct());
            break;
        case 'search':
            echo json_encode(searchProducts());
            break;
        case 'fetch-categories':
            echo json_encode(fetchCategories());
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

