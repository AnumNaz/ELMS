<?php
// signup.php

include('connection.php');

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['firstname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Check if the username already exists
    $sql_user = "SELECT * FROM signup WHERE username='$username'";
    $result_user = mysqli_query($conn, $sql_user);
    $count_user = mysqli_num_rows($result_user);

    // Check if the email already exists
    $sql_email = "SELECT * FROM signup WHERE email='$email'";
    $result_email = mysqli_query($conn, $sql_email);
    $count_email = mysqli_num_rows($result_email);

    if ($count_user == 0 && $count_email == 0) {
        // Password Hashing is used here.
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $sql_insert = "INSERT INTO signup (username, email, password) VALUES ('$username', '$email', '$hash')";
        $result_insert = mysqli_query($conn, $sql_insert);

        if ($result_insert) {
            session_start();

            // Store user data in session variables
            $_SESSION["user_name"] = $username;
            
            $_SESSION["email"] = $email;
            header("Location: books-reserve.php");
             // It's a good practice to exit the script after a redirect.
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        if ($count_user > 0) {
            echo '<script>
                    alert("Username already exists!!");
                    window.location.href = "index.php";
                  </script>';
        }
        if ($count_email > 0) {
            echo '<script>
                    alert("Email already exists!!");
                    window.location.href = "index.php";
                  </script>';
        }
    }

}
?>
