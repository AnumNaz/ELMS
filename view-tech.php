<?php
// view_students.php
session_start();

if (isset($_SESSION['email'], $_SESSION['user_type'])) {
    $user_email = $_SESSION['email']; 
    $user_type = $_SESSION['user_type']; 

    // Check the user type and email as needed
    if ($user_type === 'admin') {
        // This user is an admin, allow access to admin-specific content
    } else {
        header("Location: index.php"); 
    }
} else {
    
    header("Location: index.php"); 
    exit();
}

// Include the connection.php file to establish a database connection
include('con-std.php');

// Fetch the first 10 student records from the database
$sql = "SELECT * FROM teachers LIMIT 10";
$result = mysqli_query($conn, $sql);
if (isset($_GET['delete_email'])) {
    $deleteEmail = $_GET['delete_email'];
    $deleteSql = "DELETE FROM teachers WHERE email = '$deleteEmail'";
    if (mysqli_query($conn, $deleteSql)) {
        header("Location: view-tech.php"); // Redirect to the same page after deletion
    } else {
        echo "Error deleting student: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="add-std.css">
    <link rel="stylesheet" href="view.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="bar">
        <!-- <div class="fullbar"> -->
        <div class="sidebar">

            <div><img src="magic11.png" alt="logo"
                    style="height: 60px; margin-top: 10px; margin-left: 15px; margin-bottom: 30px;"></div>
                    <ul class="ul-main">
                <li class="main-elmnt" style="margin-top: 0px;"><a href="admin.html" class="main-elmnt">Dashboard</a></li>
                <li class="buton">
                    <button class="button" id="student-btn">Student</button>
                    <ul id="student" class="ul-sub">
                        <li class="nav-elmnt"><a href="add-std.php" class="nav-elmnt">Add student</a></li>
                        <li class="nav-elmnt"><a href="del-std-form.php" class="nav-elmnt">Delete Account</a></li>
                        <li class="nav-elmnt"><a href="upt-std.php" class="nav-elmnt">Update Account</a></li>
                        <li class="nav-elmnt"><a href="view-std.php" class="nav-elmnt">View List</a></li>
                    </ul>
                </li>
                <li class="buton"><button class="button" id="teacher-btn">Teacher</button>
                    <ul class="ul-sub" id="teacher">
                        <li class="nav-elmnt"><a href="add-teach.php" class="nav-elmnt">Add Teacher</a></li>
                        <li class="nav-elmnt"><a href="del-tech.php" class="nav-elmnt">Delete Account</a></li>
                        <li class="nav-elmnt"><a href="updt-teach.php" class="nav-elmnt">Update Account</a></li>
                        <li class="nav-elmnt"><a href="view-tech.php" class="nav-elmnt">View List</a></li>

                    </ul>
                </li>
                <li class="buton"><button class="button" id="books-btn">Books</button>
                    <ul class="ul-sub" id="books">
                        <li class="nav-elmnt"><a href="book-cat.html" class="nav-elmnt">Add category</a></li>
                        <li class="nav-elmnt"><a href="add-book.php" class="nav-elmnt">Add Book</a></li>

                        <li class="nav-elmnt"><a href="view-books.php" class="nav-elmnt">View list</a></li>
                        <li class="nav-elmnt"><a href="updt-book.php" class="nav-elmnt">Update info</a></li>
                    </ul>
                </li>
                <li class="buton"><button class="button" id="author-btn">Author</button>
                    <ul class="ul-sub" id="author">

                        <li class="nav-elmnt"><a href="approve-authors." class="nav-elmnt">Approve</a></li>
                        <li class="nav-elmnt"><a href="view-author.html" class="nav-elmnt">View Author</a></li>
                        <!-- <li class="nav-elmnt"><a href="" class="nav-elmnt">Remove</a></li> -->
                    </ul>
                </li>
                <li class="buton"><button class="button" id="review-btn">Book Reviews</button>
                    <ul class="ul-sub" id="review">
                        <li class="nav-elmnt"><a href="view-reviews.php" class="nav-elmnt">View</a></li>
                      
                    </ul>
                </li>
                <li class="buton"><button class="button" id="reserve-btn">Book Reservation</button>
                    <ul class="ul-sub" id="reserve">
                        <li class="nav-elmnt"><a href="view-res.php" class="nav-elmnt">View requests</a></li>
                        <li class="nav-elmnt"><a href="" class="nav-elmnt">Extend period</a></li>
                        <li class="nav-elmnt"><a href="" class="nav-elmnt">Cancel</a></li>
                        <li class="nav-elmnt"><a href="" class="nav-elmnt">Reports</a></li>
                        <li class="nav-elmnt"><a href="" class="nav-elmnt">Setting</a></li>
                    </ul>
                </li>


                <li class="main-elmnt"><a href="video.html" class="main-elmnt">Video tutorials</a></li>
                <li class="main-elmnt"><a href="logout.html" class="main-elmnt">Logout</a></li>

            </ul>

        </div>
        <div class="header">
            <div class="right">
                <p style="font-weight: bold; font-size: 20px; padding-left: 18px;">Teacher</p>
                <div id="datetime">
                    <span id="date" class="date"></span> <span
                        style="margin-left: 50px;  padding-top: 7px; font-weight: bold;">Account</span> <img
                        src="teacher.png" alt=""
                        style="width: 35px; height: 35px; margin-left: 15px; border-radius: 100px; margin-right: -70px;">
                </div>

            </div>
            <div class="page" style="background-color:#d7eaf1e0; ">
                <div class="form" style="background-color: rgba(240, 248, 255, 0);">
                    <h3
                        style="margin-left: 300px; padding: 10px;  width: 270px; font-weight: bold; color: rgb(12, 12, 12); margin-bottom: 10px; margin-top: 10px;">
                        Teachers List!
                    </h3>
                    <div class="search-container">
                        <input type="text" id="searchInput" placeholder="Search " onkeyup="searchTable()">
                        <button onclick="searchTable()">Search</button>
                    </div>
                    <hr>
                    <table id="studentTable">
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Department</th>
                            <th>Date</th>
                            <th>Edit Detail</th>
                            <th>Delete</th>
                        </tr>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['first_name']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['last_name']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['department']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['date']) . "</td>";
                            echo '<td><a class="edit-button" href="updt-teach.php">Edit</a></td>';
                            echo '<td><a class="edit-button" href="view-tech.php?delete_email=' . htmlspecialchars($row['email']) . '">Delete</a></td>'; // Add the delete button
        echo "</tr>";
                        }
                        ?>
                    </table>

                </div>

                <section class="section-7">
                    <footer>
                        <div class="container">
                            <p>&copy; 2023 Your Website. All rights reserved.</p>
                        </div>
                    </footer>
                </section>
            </div>


        </div>
        <script src="test.js"></script>
        <script src="view-tech.js"></script>

</body>

</html>