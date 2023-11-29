<?php

include 'db.php'; // Include your database connection file
session_start();

if (!isset($_SESSION['email']) || $_SESSION['email'] !== 'admin@admin.com') {
  // If not authenticated or not an admin, redirect to the login page or an error page
  header("Location: login_user.php");
  exit();
}
// Fetch events from the database
$sql = "SELECT * FROM Events";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>View Events - Divine Event Planner</title>
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
    <h2>View Events</h2>
    <table class="table">
      <thead>
        <tr>
          <th>Event Name</th>
          <th>Date</th>
          <th>Description</th>
          <th>Actions</th> <!-- Column for update and remove actions -->
        </tr>
      </thead>
      <tbody>
        <?php
        if ($result->num_rows > 0) {
          // Output data of each row
          while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["EventName"] . "</td>
                    <td>" . $row["EventDate"] . "</td>
                    <td>" . $row["EventDescription"] . "</td>
                    <td>
                      <a href='update_event.php?id=" . $row["EventID"] . "' class='btn btn-sm btn-info'>Update</a> <!-- Link to update event -->
                      <a href='remove_event.php?id=" . $row["EventID"] . "' class='btn btn-sm btn-danger'>Remove</a> <!-- Link to remove event -->
                    </td>
                  </tr>";
          }
        } else {
          echo "<tr><td colspan='4'>No events found</td></tr>";
        }
        ?>
      </tbody>
    </table>
  </div>

  <!-- Bootstrap JS and jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
