<?php
include("con-std.php");

// Check if the book ID is provided in the URL
if (isset($_GET['id'])) {
    $bookId = $_GET['id'];

    // Fetch book details using the book_id from the database
    $sql = "SELECT * FROM upload_books WHERE id = '$bookId'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $book = mysqli_fetch_assoc($result);

        
    }

    $conn->close();
} else {
    echo '<p>Book ID not provided.</p>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Add your head content here -->
</head>

<body>
    <!-- Display the "Explore Books!" heading -->
    <div>
        <h2 style="margin-left: 530px; padding: 30px;">Explore Books!</h2>
        <p style="margin-left: 440px;">Embark on a literary adventure with our extensive collection of books.</p>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4" style="margin:100px">
            <!-- PHP code will generate book cards here -->
            <?php if (!empty($book)): ?>
                
                    <div class="col">
                        <div class="card h-100">
                        
                    <img src="<?php echo $book['book_cover']; ?>" class="card-img-top" alt=""
                                style="width: 200px; border-radius: 50px; margin-left: 80px; margin-top: 20px; height: 250px; margin-bottom:20px;">
                                        
                            
                        </div>
                        
                    </div>
                    
                        
                                        
                            <div class="card-body" style="margin-left: 100px; margin-top: 50px;">
                                <h5 class="card-title"><a href="<?php echo $book['upload_book']; ?>"
                                        style="text-decoration: none; font-size: 35px;  color: #86adbd;"><?php echo $book['book_name']; ?></a></h5>
                                <p class="card-text" style="font-size: 20px;  margin-top: 10px; margin-bottom: 50px; " ><?php echo $book['author_name']; ?></p>
                                
    
 <a href="<?php echo $book['upload_book']; ?>"  style="text-decoration: none;   color: #86adbd; padding: 10px 20px; 
    background-color: #86adbd;
    color: white;
    border: none;
    border-radius: 10px;
    cursor: pointer;">Download</a> 
                            </div>
                       
                
            <?php else: ?>
                <p>No books available.</p>
            <?php endif; ?>
        </div>

        </section>
    <!-- <hr> -->

    
    
        <footer>
            <div class="container">
                <p>&copy; 2023 Your Website. All rights reserved.</p>
            </div>
        </footer>
    </section>


    <!-- Rest of your HTML content for reviews.php -->
</body>

</html>
