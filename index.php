<?php 
    include("connection.php");
    // include("signup.php")

    include("user.php");
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="signin.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://www.gstatic.com/firebasejs/9.22.1/firebase-app-compat.js"></script>
        <script src="https://www.gstatic.com/firebasejs/9.22.1/firebase-firestore-compat.js"></script>
        <script src="https://www.gstatic.com/firebasejs/9.22.1/firebase-auth-compat.js"></script>
    

    <title>Document</title>
</head>

<body>
    <section class="section-1">
        <div>
            <div class="nav">
                <nav class="nav-0">
                <img src="logo.png" alt="book logo" class="nav-1" style="margin-top: -8px; width:60px; height:60px;"  ><span  style="  font-size: 28px;   " >ELMS</span>

                    <ul class="nav-2">
                        <li><a href="indexx.php" class="nav-3">Home</a></li>
                        <li><a href="aboutus.html" class="nav-3">About Us</a></li>
                        <li><a href="online-books.php" class="nav-3">Explore</a></li>
                       
                       
                    </ul>
                </nav>
            </div>
    </section>
    <section class="section-2">
    <div style="width: 200px; margin-top: 200px; margin-left: 200px;">
            <p style="width: 410px; font-size: 15px; font-weight: bold; margin-left: -30px; "><span style="font-size: 30px; color: #86adbd ; ">Get Started</span> and unlock a world of possibilities! Start your journey now and discover what awaits you!</p>
            <img src="magic book.png" alt="bookimage" style=" margin-top: -70px; width: 500px; margin-left: -130px;">
        </div>
    <div class="form">

        <form action="user.php" method="POST" id="form">

                <div>
                    <h3
                        style="margin-left: 200px; padding: 10px;  width: 270px; font-weight: bold; color: rgb(14, 13, 13);">
                        Sign Up!
                    </h3>
                    <p style="margin-left: 120px; padding-top: 10px; padding-bottom: 40px;">Unlock a world of knowledge
                        - Sign up today!</p>
                </div>
                <div class="fullname">
                    <div class="name"><label for="firstname" class="fname">Full Name</label><br>
                        <input style="width:565px; margin-left:14px" type="text" id="firstname" class="firstname" maxlength="30" pattern="[A-Za-z]+" name="full_name" placeholder="Full name"
                            required>
                    </div>
                   
                </div>
                <div class="email-1">
                    <label for="email" class="email-label">Email</label><br>
                    <input type="email" id="email" class="email" name="email" placeholder="Email"  pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" required>
                </div>
                <div class="pass">
                    <label for="password" class="password-label">Password</label><br>
                    <input type="password" id="password" class="password" name="password" minlength="8" maxlength="20"  placeholder="Password"
                        required>
                </div>

                <div class="usertype">
    <label for="usertype" class="email-label">User Type</label><br>
    <select id="usertype" name="usertype" style="width:560px; margin-left: 15px; border: none; padding:10px; border-radius: 50px;">
        <option value="admin">Admin</option>
        <option value="user">User</option>
    </select>
</div>

                <!-- <div class="gen">
                    <p class="gender-label">Gender</p>
                    <div class="genclass">
                        <input type="radio" name="gender" id="male" class="gender">
                        <label for="male">Admin</label>

                        <br>
                        <input type="radio" name="gender" id="female" class="gender">
                        <label for="female">Student</label>
                    </div>

                </div> -->
                <!-- <div class="submit"> -->
                    <!-- <input type="submit" value="Sign Up" class="sub-btn"> -->
                    <button class="sub-btn" name="submit" type="submit">Sign Up</button>
                <!-- </div> -->
                <div class="signin">
                    <p style="margin-left: 260px; margin-top: 20px;">OR</p>
                    <button class="signin-btn">Already have an account?<a href="signIn.php" class="signinbtn">Sign
                            In</a></button>
                </div>

            </form>
    </div>
    </section>
 
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>

</html>