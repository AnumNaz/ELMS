<?php
include("con-std.php");

$sql_select_reservations = "SELECT * FROM reservation WHERE reservation_status IN ('waiting', 'approved', 'disapproved')";
$result_select_reservations = mysqli_query($conn, $sql_select_reservations);

if (mysqli_num_rows($result_select_reservations) > 0) {
    while ($row = mysqli_fetch_assoc($result_select_reservations)) {
        echo "<tr>";
        echo "<td>" . $row['reservation_id'] . "</td>";
        echo "<td>" . $row['user_email'] . "</td>";
        echo "<td>" . $row['isbn'] . "</td>";
        echo "<td>" . $row['reserved_at'] . "</td>";
        echo "<td>" . $row['reservation_status'] . "</td>";

        
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6'>No reservation records found.</td></tr>";
}

$conn->close();
?>
