<?php
include("con-std.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['reservation_id'])) {
        $reservationId = $_POST['reservation_id'];

        // Update the reservation status to "approved" and calculate the expiry date
        $expiryDate = date('Y-m-d', strtotime('+10 days'));
        $sql_update_reservation = "UPDATE reservation SET reservation_status = 'approved', expiry_date = '$expiryDate' WHERE reservation_id = $reservationId";

        if ($conn->query($sql_update_reservation) === TRUE) {
            echo "Reservation approved successfully.";
        } else {
            echo "Error updating reservation: " . $conn->error;
        }
    } else {
        echo "Invalid request.";
    }
} else {
    echo "Invalid request method.";
}

$conn->close();
?>
