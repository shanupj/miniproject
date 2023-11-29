<?php
include 'db.php'; // Include your database connection file

// Check if BookingID is set in the URL
if(isset($_GET['id'])) {
    $bookingID = $_GET['id'];

    // Remove the booking based on the BookingID
    $deleteBooking = "DELETE FROM Bookings WHERE BookingID = '$bookingID'";
    
    if ($conn->query($deleteBooking) === TRUE) {
        // Redirect back to the previous page (view_booking.php)
        header("Location: viewbooking.php");
        exit();
    } else {
        echo "Error deleting booking: " . $conn->error;
    }
} else {
    // If BookingID is not set, redirect to an error page or another appropriate action
    header("Location: error.php");
    exit();
}
?>
