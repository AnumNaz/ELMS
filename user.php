<?php
// signup.php

include('connection.php');

if (isset($_POST['submit'])) {
    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $user_type = mysqli_real_escape_string($conn, $_POST['usertype']);

    if ($user_type === "admin") {
        // Check if the email already exists in the admins table
        $sql_email_check = "SELECT * FROM admins WHERE email='$email'";
    } else {
        // Check if the email already exists in the signup table
        $sql_email_check = "SELECT * FROM users WHERE email='$email'";
    }

    $result_email_check = mysqli_query($conn, $sql_email_check);

    if (mysqli_num_rows($result_email_check) > 0) {
        echo '<script>
                alert("Email already exists!!");
                window.location.href = "index.php";
              </script>';
    } else {
        // Password Hashing is used here.
        $hash = password_hash($password, PASSWORD_DEFAULT);

        if ($user_type === "admin") {
            $sql_insert = "INSERT INTO admins (full_name, email, password, user_type) VALUES ('$full_name', '$email', '$hash', '$user_type')";
        } else {
            $sql_insert = "INSERT INTO users (full_name, email, password, user_type) VALUES ('$full_name', '$email', '$hash', '$user_type')";
        }

        $result_insert = mysqli_query($conn, $sql_insert);

        if ($result_insert) {
            session_start();

            // Store user data in session variables
            $_SESSION["full_name"] = $full_name;
            $_SESSION["email"] = $email;
            $_SESSION["user_type"] = $user_type;

            if ($user_type === "admin") {
                header("Location: admin.php");
            } else {
                header("Location: indexx.php");
            }
            // It's a good practice to exit the script after a redirect.
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>
