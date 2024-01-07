<?php
include("con-std.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['reservation_id'])) {
        $reservationId = $_POST['reservation_id'];

        // Check if the reservation exists
        $sql_check_reservation = "SELECT * FROM reservation WHERE reservation_id = $reservationId";
        $result_check_reservation = mysqli_query($conn, $sql_check_reservation);

        if (mysqli_num_rows($result_check_reservation) > 0) {
            // Update the reservation status to "disapproved"
            $sql_update_reservation = "UPDATE reservation SET reservation_status = 'disapproved' WHERE reservation_id = $reservationId";

            if ($conn->query($sql_update_reservation) === TRUE) {
                echo "Reservation disapproved successfully.";
            } else {
                echo "Error updating reservation: " . $conn->error;
            }
        } else {
            echo "Reservation not found.";
        }
    } else {
        echo "Invalid request.";
    }
} else {
    echo "Invalid request method.";
}

$conn->close();
?>
