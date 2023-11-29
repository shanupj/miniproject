<?php
include 'db.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $eventID = $_GET['id'];

    // Delete event from the database based on the provided event ID
    $sql = "DELETE FROM Events WHERE EventID = $eventID";

    if ($conn->query($sql) === TRUE) {
        // Redirect to viewevent.php after successful deletion
        header("Location: viewevent.php");
        exit();
    } else {
        echo "Error deleting event: " . $conn->error;
    }

    $conn->close();
} else {
    // Redirect to viewevent.php if event ID is not provided
    header("Location: viewevent.php");
    exit();
}
?>
