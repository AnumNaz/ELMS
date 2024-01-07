<?php
// Include the connection.php file to establish a database connection
include('con-std.php');
session_start();

if (isset($_SESSION['email'], $_SESSION['user_type'])) {
    $user_email = $_SESSION['email']; 
    $user_type = $_SESSION['user_type']; 

    // Check the user type and email as needed
    if ($user_type === 'admin') {
        header("Location: index.php"); 
    } else {
        
    }
} else {
    
    header("Location: index.php"); 
    exit();
}

// Fetch video details from the database
$sql_select_videos = "SELECT * FROM video";
$result_select_videos = mysqli_query($conn, $sql_select_videos);

$videos = array();

if (mysqli_num_rows($result_select_videos) > 0) {
    while ($row = mysqli_fetch_assoc($result_select_videos)) {
        $videos[] = $row;
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>ELMS</title>
    <link rel="shortcut icon" href="magic11.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@500&family=Poppins:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="view-video.css">

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
                        <li><a href="books-reserve.php" class="nav-3">Books</a></li>
                        <li><a href="signin.php" class="nav-3">Sign In</a></li>
                        <li><a href="index.php"  class="nav-3">Sign Up</a></li>
                    </ul>

                </nav>

            </div>

           

            


        </div>

    </section>
 
    <div style="height: auto; margin-left: 30px; margin-top: 10px; margin-right: 30px; background-color: black; position: relative;">
                <img src="video4.jpg" alt="" style="width: 100%; opacity: 0.5; height: 605px;">
                <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center; color: white;  ">
                    <h3 style="font-size: 50px; font-weight: bolder; font-family: 'Poppins', sans-serif;">Explore Videos </h3>
                    <p style="margin-left: 0px; padding-top: 20px; ">Unlock a world of knowledge with our immersive video tutorials.</p>
                </div>
            </div>

    
    <section class="section-4" style=" padding-top: 60px; padding-bottom: 120px;">
    <div>
        <h3 style="margin-left: 550px; padding: 20px; margin-bottom: 10px; width: 230px;">
            Video Library
        </h3>
        <p style="margin-left: 430px; padding-top: 10px; padding-bottom: 100px;">Unlock your potential with our
            immersive video tutorial experience.</p>
    </div>
    <div class="card-group" style="padding-left: 100px; padding-right: 100px;">
        <?php foreach ($videos as $video): ?>
            <div class="col-md-4" style="margin-bottom: 100px;">
                <div class="card" style="border-radius: 40px; margin-right:70px;">
                    <iframe width="370px" height="350px" src="<?php echo $video['video_link']; ?>"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen style="border-radius: 40px;"></iframe>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>



    <!-- <hr> -->

    
   
    <section class="section-7">
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