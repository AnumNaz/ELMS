<?php
// signin.php

include('connection.php');

if (isset($_POST['submit'])) {
    
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $user_type = mysqli_real_escape_string($conn, $_POST['usertype']);

    $query = "";
    $nameColumn = "full_name";
    if ($user_type === "admin") {
        $query = "SELECT * FROM admins WHERE email='$email'";
    }
    if ($user_type === "user") {
        $query = "SELECT * FROM users WHERE email='$email'";
    }
    if ($user_type === "student") {
        $query = "SELECT * FROM students WHERE email='$email'";
        $nameColumn = "first_name";
    }
    if ($user_type === "teacher") {
        $query = "SELECT * FROM teachers WHERE email='$email'";
        $nameColumn = "first_name";
    }

    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        if ($row && password_verify($password, $row['password'])) {
            session_start();
            $_SESSION["email"] = $email;
            $_SESSION["user_type"] = $user_type;
            $_SESSION["username"] = $row[$nameColumn];

            if ($user_type === "admin") {
                header("Location: admin.php");
            } else if ($user_type === "user") {
                header("Location: indexx.php");
            } else if ($user_type === "student") {
                header("Location: indexx.php");
            } else if ($user_type === "teacher") {
                header("Location: indexx.php");
            }
            exit();
        } else {
            echo '<script>
                    alert("Wrong email or password. Please try again.");
                    window.location.href = "index.php";
                  </script>';
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
