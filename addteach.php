<?php
// process-form.php

// Include the connection.php file to establish a database connection
include('con-std.php');

if (isset($_POST['submit'])) {
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $department = mysqli_real_escape_string($conn, $_POST['department']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);

    // Check if the email already exists
    $sql_email = "SELECT * FROM teachers WHERE email='$email'";
    $result_email = mysqli_query($conn, $sql_email);
    $count_email = mysqli_num_rows($result_email);

    if ($count_email == 0) {
        // Password Hashing is used here.
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $sql_insert = "INSERT INTO teachers (first_name, last_name, email, password, department, date) VALUES ('$firstname', '$lastname', '$email', '$hash', '$department', '$date')";
        $result_insert = mysqli_query($conn, $sql_insert);

        if ($result_insert) {
            echo "Teacher added successfully!";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Email already exists!";
    }
}
?>
