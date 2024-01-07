<?php 
    include("con-std.php");
    include("addbook.php");
//     session_start();

// if (isset($_SESSION['email'], $_SESSION['user_type'])) {
//     $user_email = $_SESSION['email']; 
//     $user_type = $_SESSION['user_type']; 

//     // Check the user type and email as needed
//     if ($user_type === 'admin') {
//         // This user is an admin, allow access to admin-specific content
//     } else {
//         header("Location: index.php"); 
//     }
// } else {
    
//     header("Location: index.php"); 
//     exit();
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="add-std.css">
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
                                <li class="nav-elmnt"><a href="add-std.html" class="nav-elmnt">Add student</a></li>
                                <li class="nav-elmnt"><a href="del-std.html" class="nav-elmnt">Delete Account</a></li>
                                <li class="nav-elmnt"><a href="upt-std.html" class="nav-elmnt">Update Account</a></li>
                                <li class="nav-elmnt"><a href="view-std.html" class="nav-elmnt">View List</a></li>
                            </ul>
                        </li>
                        <li class="buton"><button class="button" id="teacher-btn">Teacher</button>
                            <ul class="ul-sub" id="teacher">
                                <li class="nav-elmnt"><a href="add-teach.html" class="nav-elmnt">Add Teacher</a></li>
                                <li class="nav-elmnt"><a href="del-tech.html" class="nav-elmnt">Delete Account</a></li>
                                <li class="nav-elmnt"><a href="updt-teach.html" class="nav-elmnt">Update Account</a></li>
                                <li class="nav-elmnt"><a href="view-tech.html" class="nav-elmnt">View List</a></li>
        
                            </ul>
                        </li>
                        <li class="buton"><button class="button" id="books-btn">Books</button>
                            <ul class="ul-sub" id="books">
                                <li class="nav-elmnt"><a href="book-cat.html" class="nav-elmnt">Add category</a></li>
                                <li class="nav-elmnt"><a href="#" class="nav-elmnt">Add Book</a></li>
                                
                                <li class="nav-elmnt"><a href="view-books.html" class="nav-elmnt">View list</a></li>
                                <li class="nav-elmnt"><a href="updt-book.html" class="nav-elmnt">Update info</a></li>
                            </ul>
                        </li>
                        <li class="buton"><button class="button" id="author-btn">Author</button>
                            <ul class="ul-sub" id="author">
        
                                <li class="nav-elmnt"><a href="approve-authors.html" class="nav-elmnt">Approve</a></li>
                                <li class="nav-elmnt"><a href="view-author.html" class="nav-elmnt">View Author</a></li>
                                <!-- <li class="nav-elmnt"><a href="" class="nav-elmnt">Remove</a></li> -->
                            </ul>
                        </li>
                        <li class="buton"><button class="button" id="review-btn">Book Reviews</button>
                            <ul class="ul-sub" id="review">
                                <li class="nav-elmnt"><a href="" class="nav-elmnt">View</a></li>
                                <li class="nav-elmnt"><a href="" class="nav-elmnt">Delete</a></li>
                                <li class="nav-elmnt"><a href="" class="nav-elmnt">Details</a></li>
                            </ul>
                        </li>
                        <li class="buton"><button class="button" id="reserve-btn">Book Reservation</button>
                            <ul class="ul-sub" id="reserve">
                                <li class="nav-elmnt"><a href="" class="nav-elmnt">View requests</a></li>
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
                <p style="font-weight: bold; font-size: 20px; padding-left: 18px;">Book Library</p>
                <div id="datetime">
                    <span id="date" class="date"></span> <span style="margin-left: 50px;  padding-top: 7px; font-weight: bold;">Account</span> <img src="teacher.png" alt="" style="width: 35px; height: 35px; margin-left: 15px; border-radius: 100px; margin-right: -70px;">
                </div>

            </div>
            <div class="page">
                <div class="form">

                <form action="addbook.php" method="post" enctype="multipart/form-data" id="form">

                        <div >
                            <h3
                                style="margin-left: 320px; padding: 10px;  width: 470px; font-weight: bold; color: rgb(12, 12, 12); margin-bottom: 50px; margin-top: 20px;">
                                Add Books
                            </h3><hr>
                        </div>
                        <div class="fullname">
                            <div class="name"><label for="firstname" class="fname">Book Title</label><br>
                                <input type="text" id="firstname" class="firstname" name="firstname" placeholder="Enter Book Name"
                                    required style="width: 800px;" >
                            </div>
                        </div>
                        <div class="email-1">
                            <label for="email" class="email-label">Author Name</label><br>
                            <input type="text" id="link" class="email" name="author-name" placeholder="Author Name" required>
                        </div>
                        <div style="margin-top:20px;" class="email-1">
                        <label for="category" class="email-label"  >Select a category</label>
        <select style="padding:10px; border:none; " id="category" name="category-name">
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
                        </div>
                        <!-- <div class="email-1">
                            <label for="email" class="email-label">Category Name</label><br>
                            <input type="text" id="isbn" class="email" name="category-name" placeholder="Enter category" required>
                        </div> -->
                        <div class="email-1">
                            <label for="email" class="email-label">Book ISBN </label><br>
                            <input type="text" id="isbn" class="email" name="isbn" placeholder="Enter ISBN" required>
                        </div>
                        <!-- <div class="email-1">
                            <label for="email" class="email-label">Book Status</label><br>
                            <input type="text" id="status" class="email" name="status" placeholder="Availibility" required>
                        </div> -->
                        <div class="email-1">
    <label for="quantity" class="email-label">Number of Books</label><br>
    <input type="number" id="quantity" class="email" name="quantity" placeholder="Enter quantity" required>
</div>
                        <div class="email-1">
    <label for="email" class="email-label">Book Cover Photo</label><br>
    <input style="background-color:white; margin-left:20px;" type="file" name="book_cover" id="book_cover" required>
</div>

                        <div class="date">
                            <label for="date" class="date-label">Date</label><br>
                            <input type="datetime-local" id="date" class="date" name="date" placeholder="Date" required style="margin-left: -7px;">
                        </div>
                        
                        <div style="display: flex; flex-direction: row;">
                        <button class="reset-btn" type="reset">Reset</button>
                    <button class="sub-btn" type="submit" name="submit">Submit</button>
                        </div>
                            
                    
        
                    </form>
                </div>
                <section class="section-7" >
                    <footer>
                        <div class="container">
                            <p>&copy; 2023 Your Website. All rights reserved.</p>
                        </div>
                    </footer>
                </section>
            </div>
        <!-- </div> -->
    </div>

    </div>
    <script src="test.js"></script>

</body>
</html>