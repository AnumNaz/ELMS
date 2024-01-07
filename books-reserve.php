<?php
include("con-std.php");
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

$selectedCategory = "";
$books = [];
// Check if a category is selected
if (isset($_GET['category'])) {
    $selectedCategory = $_GET['category'];
}

if (!empty($selectedCategory)) {
    // Use the selected category in the SQL query
    $sql = "SELECT * FROM books WHERE category_name = '$selectedCategory'";
    $result = mysqli_query($conn, $sql);
    while ($row = $result->fetch_assoc()) {
        $books[] = $row;
    }

} else {
    // If no category is selected, fetch the first ten books from all categories
    $sql = "SELECT * FROM books LIMIT 10";
    $result = mysqli_query($conn, $sql);
    while ($row = $result->fetch_assoc()) {
        $books[] = $row;
    }
}



// $searchQuery = "";
// $books = [];

// // Check if a search query is submitted
// if (isset($_GET['search'])) {
//     $searchQuery = mysqli_real_escape_string($conn, $_GET['search']);
//     $sql = "SELECT * FROM books WHERE book_title LIKE '%$searchQuery%' LIMIT 10";
//     $result = mysqli_query($conn, $sql);
//     while ($row = $result->fetch_assoc()) {
//         $books[] = $row;
//     }
// } else {
//     // If no search query, fetch the first ten books
//     $sql = "SELECT * FROM books LIMIT 10";
//     $result = mysqli_query($conn, $sql);
//     while ($row = $result->fetch_assoc()) {
//         $books[] = $row;
//     }
// }

if (isset($_POST['reserve'])) {
    // Reservation code
    $selected_isbn = mysqli_real_escape_string($conn, $_POST['isbn']);

    // Check if the book is already reserved by the user
    $check_reservation_sql = "SELECT * FROM reservation WHERE user_email = '$user_email' AND isbn = '$selected_isbn'";
    $check_reservation_result = mysqli_query($conn, $check_reservation_sql);

    if (mysqli_num_rows($check_reservation_result) > 0) {
        echo '<script>
                alert("This book is already reserved by you.");
              </script>';
    } else {
        // Check if the user email and ISBN match a book in the database
        $book_check_sql = "SELECT * FROM books WHERE isbn = '$selected_isbn'";
        $book_check_result = mysqli_query($conn, $book_check_sql);

        if (mysqli_num_rows($book_check_result) > 0) {
            // Book with provided ISBN exists, proceed with reservation
            $reservation_status = 'waiting';
            $reservation_sql = "INSERT INTO reservation (user_email, isbn,reservation_status) VALUES ('$user_email', '$selected_isbn', '$reservation_status')";
            if (mysqli_query($conn, $reservation_sql)) {
                echo '<script>
                        alert("Reservation successful!");
                      </script>';
            } else {
                echo '<script>
                        alert("Error reserving book: ' . mysqli_error($conn) . '");
                      </script>';
            }
        } else {
            echo '<script>
                    alert("Invalid ISBN. Please check the ISBN.");
                  </script>';
        }
    }
} elseif (isset($_POST['cancel'])) {
    // Cancellation code
    $selected_isbn = mysqli_real_escape_string($conn, $_POST['isbn']);

    // Check if the user email and ISBN match a reservation
    $cancel_sql = "DELETE FROM reservation WHERE user_email = '$user_email' AND isbn = '$selected_isbn'";
    $cancel_result = mysqli_query($conn, $cancel_sql);

    if ($cancel_result) {
        if (mysqli_affected_rows($conn) > 0) {
            echo '<script>
                    alert("Reservation canceled successfully!");
                  </script>';
        } else {
            echo '<script>
                    alert("Reservation record not found for cancellation.");
                  </script>';
        }
    } else {
        echo '<script>
                alert("Error canceling reservation: ' . mysqli_error($conn) . '");
              </script>';
    }
}
$bookReservations = [];

// Fetch reservation status for each book
foreach ($books as $book) {
    $isbn = $book['isbn'];
    $reservation_query = "SELECT reservation_status FROM reservation WHERE user_email = '$user_email' AND isbn = '$isbn'";
    $reservation_result = mysqli_query($conn, $reservation_query);

    if ($row = $reservation_result->fetch_assoc()) {
        $bookReservations[$isbn] = $row['reservation_status'];
    } else {
        $bookReservations[$isbn] = '';
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
    <link rel="stylesheet" href="styleee.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>ELMS</title>
    <link rel="shortcut icon" href="magicbook.png" type="image/x-icon">
</head>

<body>
    <section id="section-1">
        <div>

            <div class="nav" style="position: absolute;">

                <nav class="nav-0">

                <img src="logo.png" alt="book logo" class="nav-1" style="margin-top: -8px; width:60px; height:60px;"  ><span  style="  font-size: 28px;   " >ELMS</span>


                    <ul class="nav-2">
                        <li><a href="indexx.php" class="nav-3">Home</a></li>
                        <li><a href="aboutus.html" class="nav-3">About Us</a></li>
                        <li><a href="online-books.php" class="nav-3">Explore</a></li>
                    
                    </ul>

                </nav>

            </div>

            <div style="height: auto; margin-left: 30px; margin-top: 100px; margin-right: 30px; background-color: black; position: relative;">
                <img src="video3.jpg" alt="" style="width: 100%; opacity: 0.5; height: 555px;">
                <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center; color: white;  ">
                    <h3 style="font-size: 50px; font-weight: bolder; font-family: 'Poppins', sans-serif;">Reserve Books!</h3>
                    <p style="margin-left: 0px; padding-top: 20px; ">Embark on a literary adventure with our extensive collection of books.</p>
                </div>
                
            </div>
            <!-- <div class="search-container" style="margin-left: 450px; margin-top: 50px;">
            <input type="text" id="searchInput" placeholder="Search" onkeyup="searchTable()">

                        <button onclick="searchTable()">Search</button>
                    </div> -->
            <section id="section-3" class="section-3" style="margin-top: 50px;">
            
                
</div>
<form method="get" action="">
<select style="padding:10px;  margin-left: 400px; " id="category" name="category">
            <option value="000 Generalities">000 Generalities</option>
            <option value="010 Bibliography">010 Bibliography</option>
            <option value="020 Library and information sciences">020 Library and information sciences</option>
            <option value="030 Encyclopedias and books of facts">030 Encyclopedias and books of facts</option>
            <option value="040 [Unassigned]">040 [Unassigned]</option>
            <option value="050 Magazines, journals, and serials">050 Magazines, journals, and serials</option>
            <option value="060 Associations, organizations, and museums">060 Associations, organizations, and museums</option>
            <option value="070 News media, journalism, and publishing">070 News media, journalism, and publishing</option>
            <option value="080 Quotations">080 Quotations</option>
            <option value="090 Manuscripts and rare books">090 Manuscripts and rare books</option>
            <option value="100 Philosophy">100 Philosophy</option>
            <option value="110 Metaphysics">110 Metaphysics</option>
            <option value="120 Epistemology">120 Epistemology</option>
            <option value="130 Paranormal phenomena">130 Paranormal phenomena</option>
            <option value="140 Philosophical schools of thought">140 Philosophical schools of thought</option>
            <option value="150 Psychology">150 Psychology</option>
            <option value="160 Logic">160 Logic</option>
            <option value="170 Ethics">170 Ethics</option>
            <option value="180 Ancient, medieval, and Eastern philosophy">180 Ancient, medieval, and Eastern philosophy</option>
            <option value="190 Modern Western philosophy">190 Modern Western philosophy</option>
            <option value="200 Religion">200 Religion</option>
            <option value="210 Philosophy and theory of religion">210 Philosophy and theory of religion</option>
            <option value="220 The Bible">220 The Bible</option>
            <option value="230 Christianity">230 Christianity</option>
            <option value="240 Christian practice and observance">240 Christian practice and observance</option>
            <option value="250 Christian orders and local church">250 Christian orders and local church</option>
            <option value="260 Social and ecclesiastical theology">260 Social and ecclesiastical theology</option>
            <option value="270 History of Christianity">270 History of Christianity</option>
            <option value="280 Christian denominations and sects">280 Christian denominations and sects</option>
            <option value="290 Other religions">290 Other religions</option>
            <option value="300 Social sciences">300 Social sciences</option>
            <option value="310 General statistics">310 General statistics</option>
            <option value="320 Political science">320 Political science</option>
            <option value="330 Economics">330 Economics</option>
            <option value="340 Law">340 Law</option>
            <option value="350 Public administration and military science">350 Public administration and military science</option>
            <option value="360 Social problems and services">360 Social problems and services</option>
            <option value="370 Education">370 Education</option>
            <option value="380 Commerce, communications, transportation">380 Commerce, communications, transportation</option>
            <option value="390 Customs, etiquette, folklore">390 Customs, etiquette, folklore</option>
            <option value="400 Language">400 Language</option>
            <option value="410 Linguistics">410 Linguistics</option>
            <option value="420 English and Old English">420 English and Old English</option>
            <option value="430 Germanic languages">430 Germanic languages</option>
            <option value="440 Romance languages">440 Romance languages</option>
            <option value="450 Italian, Romanian, Rhaeto-Romanic">450 Italian, Romanian, Rhaeto-Romanic</option>
            <option value="460 Spanish and Portuguese languages">460 Spanish and Portuguese languages</option>
            <option value="470 Italic languages; Latin">470 Italic languages; Latin</option>
            <option value="480 Classical and modern Greek languages">480 Classical and modern Greek languages</option>
            <option value="490 Other languages">490 Other languages</option>
            <option value="500 Natural sciences and mathematics">500 Natural sciences and mathematics</option>
            <option value="510 Mathematics">510 Mathematics</option>
            <option value="520 Astronomy and allied sciences">520 Astronomy and allied sciences</option>
            <option value="530 Physics">530 Physics</option>
            <option value="540 Chemistry and allied sciences">540 Chemistry and allied sciences</option>
            <option value="550 Earth sciences">550 Earth sciences</option>
            <option value="560 Fossils and prehistoric life">560 Fossils and prehistoric life</option>
            <option value="570 Life sciences; biology">570 Life sciences; biology</option>
            <option value="580 Plants">580 Plants</option>
            <option value="590 Animals">590 Animals</option>
            <option value="600 Technology">600 Technology</option>
            <option value="610 Medicine and health">610 Medicine and health</option>
            <option value="620 Engineering">620 Engineering</option>
            <option value="630 Agriculture">630 Agriculture</option>
            <option value="640 Home and family management">640 Home and family management</option>
            <option value="650 Management and auxiliary services">650 Management and auxiliary services</option>
            <option value="660 Chemical engineering">660 Chemical engineering</option>
            <option value="670 Manufacturing">670 Manufacturing</option>
            <option value="680 Manufacture for specific uses">680 Manufacture for specific uses</option>
            <option value="690 Construction of buildings">690 Construction of buildings</option>
            <option value="700 The arts">700 The arts</option>
            <option value="710 Civic and landscape art">710 Civic and landscape art</option>
            <option value="720 Architecture">720 Architecture</option>
            <option value="730 Plastic arts; sculpture">730 Plastic arts; sculpture</option>
            <option value="740 Drawing and decorative arts">740 Drawing and decorative arts</option>
            <option value="750 Painting and paintings">750 Painting and paintings</option>
            <option value="760 Graphic arts; printmaking and prints">760 Graphic arts; printmaking and prints</option>
            <option value="770 Photography, photographs">770 Photography, photographs</option>
            <option value="780 Music">780 Music</option>
            <option value="790 Sports, games, and entertainment">790 Sports, games, and entertainment</option>
            <option value="800 Literature and rhetoric">800 Literature and rhetoric</option>
            <option value="810 American literature in English">810 American literature in English</option>
            <option value="820 English and Old English literatures">820 English and Old English literatures</option>
            <option value="830 Literatures of Germanic languages">830 Literatures of Germanic languages</option>
            <option value="840 Literatures of Romance languages">840 Literatures of Romance languages</option>
            <option value="850 Italian, Romanian, Rhaeto-Romanic literatures">850 Italian, Romanian, Rhaeto-Romanic literatures</option>
            <option value="860 Spanish and Portuguese literatures">860 Spanish and Portuguese literatures</option>
            <option value="870 Italic literatures; Latin">870 Italic literatures; Latin</option>
            <option value="880 Classical and modern Greek literatures">880 Classical and modern Greek literatures</option>
            <option value="890 Literatures of other languages">890 Literatures of other languages</option>
            <option value="900 Geography and history">900 Geography and history</option>
            <option value="910 Geography and travel">910 Geography and travel</option>
            <option value="920 Biography, genealogy, insignia">920 Biography, genealogy, insignia</option>
            <option value="930 History of ancient world to ca. 499">930 History of ancient world to ca. 499</option>
            <option value="940 History of Europe">940 History of Europe</option>
            <option value="950 History of Asia">950 History of Asia</option>
            <option value="960 History of Africa">960 History of Africa</option>
            <option value="970 History of North America">970 History of North America</option>
            <option value="980 History of South America">980 History of South America</option>
            <option value="990 History of other areas">990 History of other areas</option>
        </select>
        <button style="background-color:#729aaa; padding:10px; border:none; border-radius:5px; color: white;" type="submit">Filter by Category</button>
    </form>
        
                <?php if (!empty($books)): ?>
                    <?php foreach ($books as $book): ?>
                        <div class="book-card">
                            <img src="<?php echo $book['book_cover']; ?>" alt="Book Cover" class="book-image">
                            <div class="book-details">
                                <div class="book-title"><?php echo $book['book_title']; ?></div>
                                <div class="book-author"><?php echo $book['author_name']; ?></div>
                                <div class="book-isbn">ISBN: <?php echo $book['isbn']; ?></div>
                                <div class="book-availability">
                                    Status: <?php echo $book['status']  ?>
                                </div>
                                <div class="reservation-status">
                        Reserve Status: <?php echo $bookReservations[$book['isbn']]; ?>
                    </div>
                    <div class="book-buttons">
                        <form method="post">
                            <input type="hidden" name="isbn" value="<?php echo $book['isbn']; ?>">
                            <button class="button" type="submit" name="cancel">Cancel</button>
                            <button class="button" type="submit" name="reserve" <?php echo $book['status'] === 'Unavailable' ? 'disabled' : ''; ?>>Reserve</button>
                        </form>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No books available.</p>
                <?php endif; ?>
            </section>

        </div>
    </section>
    <script src="test.js"></script>
        <script src="view-tech.js"></script>
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>

       
    

</body>

</html>
