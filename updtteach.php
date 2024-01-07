<?php
include("con-std.php"); // Assuming this file contains the database connection code

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the input data from the form
    $firstName = $_POST["firstname"];
    $lastName = $_POST["lastname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $department = $_POST["description"];
    $date = $_POST["date"];

    // Check if the provided email exists in the database
    $query = "SELECT * FROM teachers WHERE email = '$email'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Email exists, update the student's data
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $updateQuery = "UPDATE teachers
                        SET first_name = '$firstName', last_name = '$lastName', password = '$hash', department = '$department', date = '$date'
                        WHERE email = '$email'";
        $conn->query($updateQuery);

        // You can redirect the user to a success page or display a success message here
        echo "Student data updated successfully!";
    } else {
        // Email not found in the database, show a message
        echo "No record found for the provided email!";
    }
}
?>
