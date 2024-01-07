<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link rel="stylesheet" href="view-video.css">
    <title>Document</title>
</head>

<body>
<div>

<div class="nav">

    <nav class="nav-0">

    <img src="logo.png" alt="book logo" class="nav-1" style="margin-top: -8px; width:60px; height:60px;"  ><span  style="  font-size: 28px;   " >ELMS</span>


        <ul class="nav-2">
            <li><a href="indexx.php" class="nav-3">Home</a></li>
            <li><a href="aboutus.html" class="nav-3">About Us</a></li>
            <li><a href="online-books.php" class="nav-3">Explore</a></li>
            <li><a href="books-reserve.php" class="nav-3">Books</a></li>
            
            <li><a href="view-video.php" class="nav-3">Videos</a></li>
           
            
           
        </ul>

    </nav>

</div>




</div>
    <div style=" width:500px; text-align: center; margin-left:450px; margin-bottom:100px; padding-top:120px; padding-bottom:120px;padding-left:50px; padding-right:50px; margin-top:100px; background-color: #a3cedf; ">
   
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
                // Handle user profile picture upload
                if (isset($_POST['upload'])) {
                    // Define the directory where uploaded images will be stored
                    $uploadDir = 'profile_pics/';

                    // Check if the directory exists; if not, create it
                    if (!file_exists($uploadDir)) {
                        mkdir($uploadDir, 0777, true);
                    }

                    // Check if a file has been uploaded
                    if (isset($_FILES['profile_pic'])) {
                        $file = $_FILES['profile_pic'];
                        $fileName = $file['name'];
                        $filePath = $uploadDir . $fileName;

                        // Move the uploaded file to the profile_pics directory
                        if (move_uploaded_file($file['tmp_name'], $filePath)) {
                            // Display the uploaded profile picture
                            echo '<div style="width: 150px; height: 150px; border-radius: 50%; overflow: hidden; margin: 0 auto;">';
                            echo '<img src="' . $filePath . '" alt="Profile Image" style="width: 100%; height: auto;">';
                            echo '</div>';
                        }
                    }
                }

                // Display the user's type and email
                echo '<p style="font-size: 15px; font-weight: bold;margin-top:10px; ">Name: ' . $user_name . '</p>';
                echo '<p style="font-size: 15px; font-weight: bold; margin-top:10px; margin-bottom:5px;">User Type: ' . $user_type . '</p>';
                echo '<p style="font-size: 15px; font-weight: bold;">Email: ' . $user_email . '</p>';
                $sql = "SELECT isbn, reservation_status FROM reservation WHERE user_email = '$user_email'";
                $result = mysqli_query($conn, $sql);
                echo '<p style="font-size: 15px; font-weight: bold; margin-top:20px; margin-bottom:10px;">Reserved Books:</p>';
                echo '<ol>';
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<li>ISBN: ' . $row['isbn'] . ' - Status: ' . $row['reservation_status'] . '</li>';
                }
                echo '</ol>';
                
        ?>
        <form method="post" enctype="multipart/form-data">
            <!-- Input for uploading profile picture -->
            <input style="margin-left:105px;margin-top:80px;" type="file" name="profile_pic" accept="image/*">
            <button style="border:none; padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; margin-top:20px;" type="submit" name="upload">Upload</button>
        </form>
        <?php
            }
        } else {
            header("Location: index.php");
            exit();
        }
        ?>
    </div>
    <section class="section-7">
        <footer>
            <div class="container">
                <p>&copy; 2023 Your Website. All rights reserved.</p>
            </div>
        </footer>
    </section>
</body>

</html>
