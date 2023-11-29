<?php
include 'db.php'; // Include your database connection file

// Fetch events from the database
$sqlEvents = "SELECT * FROM Events";
$resultEvents = $conn->query($sqlEvents);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>View Bookings - Divine Event Planner</title>
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
    <h2>View Bookings</h2>
    <div class="row">
      <div class="col-md-6">
        <h4>Select an Event</h4>
        <form action="" method="get">
          <div class="form-group">
            <label for="event">Select Event:</label>
            <select class="form-control" id="event" name="event">
              <?php
              if ($resultEvents->num_rows > 0) {
                while ($rowEvent = $resultEvents->fetch_assoc()) {
                  echo "<option value='" . $rowEvent["EventID"] . "'>" . $rowEvent["EventName"] . "</option>";
                }
              } else {
                echo "<option value=''>No events available</option>";
              }
              ?>
            </select>
          </div>
          <button type="submit" class="btn btn-primary">View Bookings</button>
        </form>
      </div>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['event'])) {
      $selectedEventID = $_GET['event'];

      // Fetch bookings for the selected event
      $sqlBookings = "SELECT Users.UserName, Users.Email 
                      FROM Bookings 
                      INNER JOIN Users ON Bookings.UserID = Users.UserID 
                      WHERE Bookings.EventID = '$selectedEventID'";
      $resultBookings = $conn->query($sqlBookings);

      if ($resultBookings->num_rows > 0) {
        echo "<hr><h3>Bookings for the selected event</h3>";
        echo "<table class='table'>
                <thead>
                  <tr>
                    <th>User Name</th>
                    <th>Email</th>
                  </tr>
                </thead>
                <tbody>";
        while ($rowBooking = $resultBookings->fetch_assoc()) {
          echo "<tr>
                  <td>" . $rowBooking["UserName"] . "</td>
                  <td>" . $rowBooking["Email"] . "</td>
                </tr>";
        }
        echo "</tbody></table>";
      } else {
        echo "<p>No bookings found for the selected event</p>";
      }
    }
    ?>
  </div>


  <!-- Bootstrap JS and jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
