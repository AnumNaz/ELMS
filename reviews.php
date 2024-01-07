<?php
include("con-std.php");
session_start();

if (isset($_SESSION['email'], $_SESSION['user_type'])) {
    $user_email = $_SESSION['email']; 
    $user_type = $_SESSION['user_type']; 
    $user_name = $_SESSION['username'];

    // Check the user type and email as needed
    if ($user_type === 'admin') {
        header("Location: index.php"); 
    } else {
        
    }
} else {
    
    header("Location: index.php"); 
    exit();
}

// Check if the book ID is provided in the URL
if (isset($_GET['id'])) {
    $bookId = $_GET['id'];

    // Fetch book details using the book_id from the database
    $sql = "SELECT * FROM upload_books WHERE id = '$bookId'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $book = mysqli_fetch_assoc($result);

        
    }
    $reviews = [];
if (isset($bookId)) {
    $sql = "SELECT user_name, review_text FROM reviews WHERE book_id = '$bookId' LIMIT 10";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $reviews[] = $row;
        }
    }
}

    $conn->close();
} else {
    echo '<p>Book ID not provided.</p>';
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="view-video.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>ELMS</title>
    <link rel="shortcut icon" href="magicbook.png" type="image/x-icon">
     
    <link rel="stylesheet" href="online-books.css">
    <link rel="stylesheet" href="stylee.css">

</head>

<body>
<section id ="section-1">
        <div>

            <div class="nav">

                <nav class="nav-0">

                <img src="logo.png" alt="book logo" class="nav-1" style="margin-top: -8px; width:60px; height:60px;"  ><span  style="  font-size: 28px;   " >ELMS</span>
            
                    <ul class="nav-2">
                        <li><a href="indexx.php" class="nav-3">Home</a></li>
                        <li><a href="aboutus.html" class="nav-3">About Us</a></li>
                        <li><a href="online-books.php" class="nav-3">Explore</a></li>
                        <li><a href="profile.php" class="nav-3">Profile</a></li>
                        <li><a href="view-video.php" class="nav-3">Videos</a></li>
                        
                        
                    </ul>

                </nav>

            </div>

    
            


            
        </div>

    </section>
    
    


    <section id="section-3" class="section-3" style="margin-top: 150px;">
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
        <section id="section-8" style="margin-top: 50px; background-color: white ; padding: 50px;">
        <div>
            <h3 style="margin-left: 520px; padding: 20px; margin-bottom: 10px; width: 230px;">
                Give Reviews!
            </h3>
            <p style="margin-left: 430px; padding-top: 10px; padding-bottom: 50px;">Unlock endless possibilities by
                reaching out to us today!</p>
        </div>
     
<form action="submit_review.php?id=<?php echo $bookId; ?>" method="POST" class="contact-form">
    
    
    <textarea name="review_text" placeholder="Your Review" required></textarea>
    <button type="submit">Send Review</button>
</form>
<?php if (!empty($reviews)): ?>
    <section style="margin-top: 50px; padding: 20px;">
        <h3 style="margin-left: 520px; padding: 20px; margin-bottom: 10px; width: 230px;">
            Book Reviews
        </h3>
        <div style="margin-left: 100px;">
            <?php foreach ($reviews as $review): ?>
                <div style="border: 0.5px solid #ccc; border-radius: 10px; margin-bottom: 20px; padding: 20px;">
                    <p style="font-size: 1.5rem; color: #86adbd; margin-bottom: 10px;"><?php echo '<p style="font-size: 15px; font-weight: bold;margin-top:10px; ">' . $user_name . '</p>'; ?></p>
                    <p style="font-size: 1rem;"><?php echo $review['review_text']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
<?php endif; ?>


    </section>
    </section>
    <!-- <hr> -->

    
    
        <footer>
            <div class="container">
                <p>&copy; 2023 Your Website. All rights reserved.</p>
            </div>
        </footer>
    </section>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>

</html>