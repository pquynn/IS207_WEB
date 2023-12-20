<?php
include '../connect.php';

// Check the product name parameter in the request
if (isset($_GET['blogTitle'])) {

    $blogTitle = $_GET['blogTitle'];

    $blogTitle = mysqli_real_escape_string($conn, $blogTitle);

    $sql_Blog = "SELECT BLOG_TITLE, CONTENT, BLOG_IMG, USER_NAME, BLOG_DAY FROM blog where BLOG_TITLE = '$blogTitle'";

    $resultBlog = $conn->query($sql_Blog);

    //Thông tin blog
    $dataBlog;

    if ($resultBlog && $resultBlog->num_rows > 0) {
        $dataBlog = $resultBlog->fetch_assoc();
        $dataBlog['BLOG_IMG'] = base64_encode($dataBlog['BLOG_IMG']); //end code image data
    }

    echo json_encode($dataBlog);
} else {
    echo json_encode(['success' => false, 'message' => 'Action not specified']);
}
// Đóng kết nối CSDL
$conn->close();
?>