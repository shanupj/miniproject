<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    // If not logged in, redirect to login page
    header("Location: login_user.php");
    exit();
}

// Include your database connection file
include 'db.php';

// Fetch events from the database
$sql = "SELECT * FROM Events";
$result = $conn->query($sql);

// Handle form submission (booking)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if event ID is selected
    if (isset($_POST['event'])) {
        $eventID = $_POST['event'];

        // Get the user ID from the session or user table (whichever holds the user ID)
        // Replace 'userID' with the appropriate column name from your user table
        $userID = $_SESSION['userID']; // Example: $_SESSION['userID'] or fetch from the user table

        // Insert the booking details into the booking table
        $insertBooking = "INSERT INTO Bookings (UserID, EventID) VALUES ('$userID', '$eventID')";
        if ($conn->query($insertBooking) === TRUE) {
            // Redirect to events.php after successful booking
            header("Location: events.php");
            exit();
        } else {
            echo "Error: " . $insertBooking . "<br>" . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Book Events -Divine Event Planner</title>
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
        <a class="nav-link" href="events.php">Back</a>
        </li>
      </ul>
    </div>
  </nav>

  <!-- Main Content Area -->
  <div class="container mt-4">
    <div class="row">
      <div class="col-md-6">
        <h5>User ID: <?php echo $_SESSION['userID']; ?></h5> <!-- Display user ID -->
        <h5>Email: <?php echo $_SESSION['email']; ?></h5> <!-- Display email -->
      </div>
    </div>
    <hr>
  <div class="container mt-4">
    <h2>Book Events</h2>
    <form action="" method="post">
      <div class="form-group">
        <label for="event">Select Event:</label>
        <select class="form-control" id="event" name="event" required>
          <?php
          if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                  echo "<option value='" . $row["EventID"] . "'>" . $row["EventName"] . "</option>";
              }
          } else {
              echo "<option value=''>No events available</option>";
          }
          ?>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Book Event</button>
    </form>
  </div>

  <!-- Bootstrap JS and jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
