<?php
include("con-std.php");


$selectedCategory = "";
$books = [];
// Check if a category is selected
if (isset($_GET['category'])) {
    $selectedCategory = $_GET['category'];
}

if (!empty($selectedCategory)) {
    // Use the selected category in the SQL query
    $sql = "SELECT * FROM upload_books WHERE category_name = '$selectedCategory'";
    $result = mysqli_query($conn, $sql);
    while ($row = $result->fetch_assoc()) {
        $books[] = $row;
    }

} else {
    // If no category is selected, fetch the first ten books from all categories
    $sql = "SELECT * FROM upload_books ";
    $result = mysqli_query($conn, $sql);
    while ($row = $result->fetch_assoc()) {
        $books[] = $row;
    }
}

// $books = [];

// // Fetch book records from the upload_book table
// $sql = "SELECT * FROM upload_books";
// $result = mysqli_query($conn, $sql);

// if ($result) {
//     while ($row = mysqli_fetch_assoc($result)) {
//         $books[] = $row;
//     }
// } else {
//     echo "Error fetching books: " . mysqli_error($conn);
// }



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
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@500&family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="magicbook.png" type="image/x-icon">
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
                        <li><a href="books-reserve.php" class="nav-3">Books</a></li>
                        <li><a href="signin.php" class="nav-3">Sign In</a></li>
                        <li><a href="index.php"  class="nav-3">Sign Up</a></li>
                        
                    </ul>

                </nav>

            </div>

    
            


            
        </div>

    </section>
    
    
    <div style="height: auto; margin-left: 30px; margin-top: 10px; margin-right: 30px; background-color: black; position: relative;">
                <img src="video7.jpg" alt="" style="width: 100%; opacity: 0.5; height: 610px;">
                <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center; color: white;  ">
                    <h3 style="font-size: 50px; font-weight: bolder; font-family: 'Poppins', sans-serif;">Explore Books </h3>
                    <p style="margin-left: 0px; padding-top: 20px; font-size: 20px; ">Embark on a literary adventure with our extensive collection of books.</p>
                </div>
            </div>

    <section id="section-3" class="section-3" style="margin-top: 150px;">

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
       
        <div class="row row-cols-1 row-cols-md-3 g-4" style="margin:100px">
            <!-- PHP code will generate book cards here -->
            <?php if (!empty($books)): ?>
                <?php foreach ($books as $book): ?>
                    <div class="col">
                        <div class="card h-100">
                        <a href="<?php echo $book['upload_book']; ?>"
                                    ><img src="<?php echo $book['book_cover']; ?>" class="card-img-top" alt=""
                                style="width: 200px; border-radius: 50px; margin-left: 80px; margin-top: 20px; height: 250px;"></a></h5>
                                        
                            <div class="card-body" style="margin-left: 40px; margin-top: 20px;">
                                <h5 class="card-title"><a href="<?php echo $book['upload_book']; ?>"
                                        style="text-decoration: none; font-size: 25px;  color: #86adbd;"><?php echo $book['book_name']; ?></a></h5>
                                <p class="card-text" style="font-size: 20px;  " ><?php echo $book['author_name']; ?></p>
                                <a href="reviews.php?id=<?php echo $book['id']; ?>"
   class="btn btn-primary"
   style="width: 40%; margin-left: 160px; background-color: #86adbd; border:none;">Reviews</a>


                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
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

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>

</html>