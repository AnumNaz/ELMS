<?php
// process-add-book.php

// Include the connection.php file to establish a database connection
include('con-std.php');

if (isset($_POST['submit'])) {
    // Process other book info fields (e.g., title, author, etc.)
    $title = $_POST['firstname'];
    $author = $_POST['author-name'];
    $category = $_POST['category-name'];
    $isbn = $_POST['isbn'];
    $quantity = $_POST['quantity'];
    $date = $_POST['date'];

    if ($quantity > 0) {
        $status = 'Available';
    } else {
        $status = 'Unavailable';
    }

    // Check if book with the same ISBN already exists
    $sql_check_isbn = "SELECT * FROM books WHERE isbn = '$isbn'";
    $result_check_isbn = mysqli_query($conn, $sql_check_isbn);

    if (mysqli_num_rows($result_check_isbn) > 0) {
        echo "Error: Book with the same ISBN already exists. Please try another ISBN.";
    } else {
        // Process book cover photo upload
        $targetDir = "uploads/"; // Directory where the uploaded images will be stored
        $targetFile = $targetDir . basename($_FILES["book_cover"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if the file already exists (by comparing with existing cover photo paths)
        $sql_check_cover = "SELECT * FROM books WHERE book_cover = '$targetFile'";
        $result_check_cover = mysqli_query($conn, $sql_check_cover);

        if (mysqli_num_rows($result_check_cover) > 0) {
            echo "Error: Book with the same cover photo already exists.";
            $uploadOk = 0;
        }}

    // Process book cover photo upload
    $targetDir = "uploads/"; // Directory where the uploaded images will be stored
    $targetFile = $targetDir . basename($_FILES["book_cover"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if the uploaded file is an image
    $check = getimagesize($_FILES["book_cover"]["tmp_name"]);
    if ($check === false) {
        echo "Error: File is not an image.";
        $uploadOk = 0;
    }

    // Check if the file already exists
    // if (file_exists($targetFile)) {
    //     $newFileName = uniqid() . '.' . $imageFileType;
    //     $targetFile = $targetDir . $newFileName;
    // }

    // Check file size (optional, you can set your own limit)
    if ($_FILES["book_cover"]["size"] > 500000) {
        echo "Error: File is too large.";
        $uploadOk = 0;
    }

    // Allow only certain file formats (optional, you can set your own allowed formats)
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        echo "Error: Only JPG, JPEG, and PNG files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Error: Your file was not uploaded.";
    } else {
        // If everything is ok, try to upload the file
        if (move_uploaded_file($_FILES["book_cover"]["tmp_name"], $targetFile)) {
            // File uploaded successfully, now save the file path in the database
            $bookCoverPath = $targetFile;

            // Insert book info into the database
            // Replace the following lines with your actual database insertion query
            $sql_insert = "INSERT INTO books (book_title, author_name, category_name, isbn, status, quantity , date, book_cover) VALUES ('$title', '$author', '$category', '$isbn', '$status', '$quantity', '$date', '$bookCoverPath')";
            $result_insert = mysqli_query($conn, $sql_insert);

            if ($result_insert) {
                echo "Book added successfully!";
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        } else {
            echo "Error: There was an error uploading your file.";
        }
    }
}


?>
