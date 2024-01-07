<?php
include("con-std.php"); // Include the database connection file

if(isset($_POST['submit'])) {
    $bookPdf = $_FILES['book_pdf'];
    $bookName = $_POST['book_name'];
    $authorName = $_POST['author_name'];
    $bookCover = $_FILES['book_cover'];
    $date = $_POST['date'];

    // Validate and process the file uploads
    if($bookPdf['error'] === 0 && $bookCover['error'] === 0) {
        $allowedExtensions = ['pdf', 'ppt', 'pptx', 'doc', 'docx'];
        $pdfExtension = strtolower(pathinfo($bookPdf['name'], PATHINFO_EXTENSION));
        $coverExtension = strtolower(pathinfo($bookCover['name'], PATHINFO_EXTENSION));

        if(in_array($pdfExtension, $allowedExtensions) && in_array($coverExtension, ['jpg', 'jpeg', 'png'])) {
            // Move uploaded files to a directory
            $pdfPath = 'uploads/' . uniqid() . '.' . $pdfExtension;
            $coverPath = 'uploads/' . uniqid() . '.' . $coverExtension;
            move_uploaded_file($bookPdf['tmp_name'], $pdfPath);
            move_uploaded_file($bookCover['tmp_name'], $coverPath);

            // Insert data into the database
            $sql = "INSERT INTO upload_books (upload_book, book_name, author_name, book_cover, date) VALUES ('$pdfPath', '$bookName', '$authorName', '$coverPath', '$date')";

            if(mysqli_query($conn, $sql)) {
                echo "Book uploaded successfully!";
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        } else {
            echo "Invalid file format. Allowed formats: PDF, PPT, PPTX, DOC, DOCX for book and JPG, JPEG, PNG for cover.";
        }
    } else {
        echo "Error uploading files.";
    }
}
?>