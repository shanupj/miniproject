<?php
include 'db.php'; // Include your database connection file
session_start();

if (!isset($_SESSION['email']) || $_SESSION['email'] !== 'admin@admin.com') {
  // If not authenticated or not an admin, redirect to the login page or an error page
  header("Location: login_user.php");
  exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle the form submission for updating the event

    $eventID = $_POST['event_id'];
    $eventName = $_POST['event_name'];
    $eventDate = $_POST['event_date'];
    $eventDescription = $_POST['event_description'];

    // Update event in the database
    $sql = "UPDATE Events SET EventName='$eventName', EventDate='$eventDate', EventDescription='$eventDescription' WHERE EventID=$eventID";

    if ($conn->query($sql) === TRUE) {
        // If the update was successful, redirect to the view events page
        header("Location: viewevent.php");
        exit();
    } else {
        echo "Error updating event: " . $conn->error;
    }
}

// Fetch event details based on the event ID from the URL parameter
if (isset($_GET['id'])) {
    $eventID = $_GET['id'];

    $sql = "SELECT * FROM Events WHERE EventID=$eventID";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Event not found";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Event - Divine Event Planner</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Add your custom CSS here -->
    <style>
        /* Add your custom styles */
        /* For example: */
        body {
            padding-top: 60px;
            padding-bottom: 60px;
        }
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            height: 60px;
            line-height: 60px;
            background-color: #f5f5f5;
        }
        .jumbotron {
            background-image: url('/event_mgm/images/4.jpg');
            background-size: cover;
            color: #fff;
            text-align: center;
            padding: 100px 25px;
            margin-bottom: 0;
        }
    </style>
</head>
<body>
<!-- Header -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">Divine Event Planner</a>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="admin_dashboard.php">Back</a> <!-- Link back to the admin dashboard -->
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>
        </ul>
    </div>
</nav>

<!-- Main Content Area -->
<div class="container mt-4">
    <h2>Update Event</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="hidden" name="event_id" value="<?php echo $row['EventID']; ?>">
        <div class="form-group">
            <label for="event_name">Event Name:</label>
            <input type="text" class="form-control" id="event_name" name="event_name" value="<?php echo $row['EventName']; ?>" required>
        </div>
        <div class="form-group">
            <label for="event_date">Event Date:</label>
            <input type="date" class="form-control" id="event_date" name="event_date" value="<?php echo $row['EventDate']; ?>" required>
        </div>
        <div class="form-group">
            <label for="event_description">Event Description:</label>
            <textarea class="form-control" id="event_description" name="event_description" rows="4" required><?php echo $row['EventDescription']; ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Event</button>
    </form>
</div>

<!-- Bootstrap JS and jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
