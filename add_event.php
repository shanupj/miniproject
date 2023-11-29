<?php
session_start();
include 'db.php'; // Include your database connection file
if (!isset($_SESSION['email']) || $_SESSION['email'] !== 'admin@admin.com') {
  // If not authenticated or not an admin, redirect to the login page or an error page
  header("Location: login_user.php");
  exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $eventName = $_POST['eventName'];
    $eventDate = $_POST['eventDate'];
    $eventDescription = $_POST['eventDescription'];

    // Assuming Events table structure: EventID (auto-increment), EventName, EventDate, EventDescription
    $sql = "INSERT INTO Events (EventName, EventDate, EventDescription) VALUES ('$eventName', '$eventDate', '$eventDescription')";

    if ($conn->query($sql) === TRUE) {
        // If the event is added successfully, redirect to the admin dashboard
        header("Location: admin_dashboard.php");
        exit();
    } else {
        // If there's an error, handle it accordingly (e.g., display an error message)
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Event - Divine Event Planner</title>
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
    <h2>Add Event</h2>
    <form action="" method="post">
      <div class="form-group">
        <label for="eventName">Event Name:</label>
        <input type="text" class="form-control" id="eventName" name="eventName" required>
      </div>
      <div class="form-group">
        <label for="eventDate">Event Date:</label>
        <input type="date" class="form-control" id="eventDate" name="eventDate" required>
      </div>
      <div class="form-group">
        <label for="eventDescription">Event Description:</label>
        <textarea class="form-control" id="eventDescription" name="eventDescription" rows="4" required></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Add Event</button>
    </form>
  </div>

  <!-- Bootstrap JS and jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
