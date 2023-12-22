<?php
include '../connect.php';

$sql_Blog = "SELECT BLOG_TITLE, CONTENT, BLOG_IMG FROM blog";

$resultBlog = $conn->query($sql_Blog);

// Thông tin blog
$dataBlog = [];

if ($resultBlog->num_rows > 0) {
    while ($rowBlog = $resultBlog->fetch_assoc()) {
        $rowBlog['BLOG_IMG'] = base64_encode($rowBlog['BLOG_IMG']); //end code image data
        $dataBlog[] = $rowBlog;
    }
}

echo json_encode($dataBlog);

// Đóng kết nối CSDL
$conn->close();
?>