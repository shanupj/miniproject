<?php
include 'db.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $userID = $_GET['id'];

    // Delete user from the database
    $deleteUser = "DELETE FROM Users WHERE UserID = '$userID'";
    if ($conn->query($deleteUser) === TRUE) {
        // Redirect to view_users.php after successful removal
        header("Location: viewuser.php");
        exit();
    } else {
        echo "Error removing user: " . $conn->error;
    }
} else {
    // Redirect if the request method is not GET or if ID is not set
    header("Location: view_users.php");
    exit();
}
?>
