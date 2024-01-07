<?php
include("con-std.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $review_text = $_POST['review_text'];
    $book_id = $_GET['id']; // Get book ID from the URL

    // Insert the review data into the reviews table
    $sql = "INSERT INTO reviews (book_id, review_text) 
            VALUES ('$book_id', '$review_text')";

    if (mysqli_query($conn, $sql)) {
        echo "Review submitted successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    $conn->close();
}
?>
