<?php
// process-form.php

// Include the connection.php file to establish a database connection
include('con-std.php');

if (isset($_POST['submit'])) {
    $video_title = mysqli_real_escape_string($conn, $_POST['video_title']);
    $video_link= mysqli_real_escape_string($conn, $_POST['video_link']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $sql_insert = "INSERT INTO video (video_title, video_Link, date) VALUES ('$video_title', ' $video_link', '$date')";
        $result_insert = mysqli_query($conn, $sql_insert);

        if ($result_insert) {
            echo "Video added successfully!";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    
}
?>
