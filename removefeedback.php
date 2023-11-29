<?php
include 'db.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $feedbackID = $_GET['id'];

    // Delete feedback from the database
    $sql = "DELETE FROM feedback WHERE FeedbackID = '$feedbackID'";
    
    if ($conn->query($sql) === TRUE) {
        // Redirect back to the view feedback page after successful deletion
        header("Location: feedback.php");
        exit();
    } else {
        echo "Error removing feedback: " . $conn->error;
    }
}
?>
