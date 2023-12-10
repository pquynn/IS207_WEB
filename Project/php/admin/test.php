<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
    <form method="post" id="modal-form"  enctype='multipart/form-data'>
        <!-- Your other form elements -->

            <input type="file" name="product-images" class="form-control" >

        <!-- Your other form elements -->

            <button type="submit" name="submit" class="btn btn-confirm admin">Thêm mới</button>
        
    </form>
    <!-- <script>
        $(document).ready(function () {
        $('.btn-confirm').on('click', function () {
            var formData = new FormData();
            var files = $('#product-images')[0].files;

            // Check if at least 3 files are selected
            if (files.length < 3) {
                alert('Yêu cầu chọn ít nhất 3 hình ảnh.');
                return;
            }

            for (var i = 0; i < 3; i++) {
                formData.append('product-images[]', files[i]);
            }

            $.ajax({
                url: './test-controller.php',
                type: 'POST',
                // data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (response) {
                    // Handle the response from the server
                    // console.log(response);
                },
                error: function (error) {
                    // console.error('Error uploading files: ', error);
                }
            });
        });
    });

    </script> -->

    <?php
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "image_db";

// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);
// $first_picture = $_FILES['product-images']['tmp_name'][0];
// echo file_get_contents($first_picture);

if (isset($_POST['submit'])) {
    // $tempFile[1] = $_FILES['product-images']['tmp_name'][1];
    // $tempFile[0] = $_FILES['product-images']['tmp_name'][0];
    // $tempFile[2] = $_FILES['product-images']['tmp_name'][2];

    $product_id = 6; // Set your product_id here

    // echo $_FILES['product-images']['tmp_name'];
    echo base64_decode(file_get_contents($first_picture));

    // echo addslashes(file_get_contents($first_picture));
//  $sql = "INSERT INTO images_tb (id, image)
//  VALUES (?, ?)";

// $stmt = $conn->prepare($sql);
// $stmt->bind_param('is', $product_id, $first_picture_blob);


//     if ($stmt->execute()) echo json_encode('ok');
//     else  echo json_encode('no');
   
    
} else {
    // echo json_encode(['error' => 'Invalid request.']);
}
    

$conn->close();


?>

</body>
</html>
