<?php
include 'db.php'; // Include your database connection file

// Fetch user details from the database
$sql = "SELECT * FROM Users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>View Users - Divine Event Planner</title>
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
    <h2>View Users</h2>
    <table class="table">
      <thead>
        <tr>
          <th>User ID</th>
          <th>User Name</th>
          <th>Email</th>
          <th>Password</th>
          <th>Action</th> <!-- Column for remove action -->
          <!-- Add more columns as per your user table structure -->
        </tr>
      </thead>
      <tbody>
        <?php
        if ($result->num_rows > 0) {
          // Output data of each row
          while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["UserID"] . "</td>
                    <td>" . $row["UserName"] . "</td>
                    <td>" . $row["Email"] . "</td>
                    <td>" . $row["Password"] . "</td>
                    <td>
                      <a href='removeuser.php?id=" . $row["UserID"] . "' class='btn btn-sm btn-danger'>Remove</a> <!-- Link to remove user -->
                    </td>
                    <!-- Output more columns here -->
                  </tr>";
          }
        } else {
          echo "<tr><td colspan='5'>No users found</td></tr>";
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
