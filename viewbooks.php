<?php
include("con-std.php");

// Fetch the first 10 book records from the 'books' table
$sql_select = "SELECT * FROM books LIMIT 10";
$result_select = mysqli_query($conn, $sql_select);

// Check if there are any records
if (mysqli_num_rows($result_select) > 0) {
    // Loop through the records and display book information in the HTML table
    while ($row = mysqli_fetch_assoc($result_select)) {
        echo "<tr>";
        echo "<td>" . $row['book_id'] . "</td>";
        echo "<td>" . $row['book_title'] . "</td>";
        echo "<td>" . $row['category_name'] . "</td>";
        echo "<td>" . $row['isbn'] . "</td>";
        echo "<td>" . $row['author_name'] . "</td>";
        echo "<td>" . $row['status'] . "</td>";
        echo "<td><button class='edit-button' onclick='deleteRow(this)'>Delete</button></td>";
        echo "</tr>";
    }
} else {
    // If no records found, display a message in the table
    echo "<tr><td colspan='7'>No books found.</td></tr>";
}
?>
