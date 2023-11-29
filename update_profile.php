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

// Fetch user details from the database based on session email
$userEmail = $_SESSION['email'];
$sql = "SELECT * FROM Users WHERE Email = '$userEmail'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Fetched user details
    $userID = $row['UserID'];
    $userName = $row['UserName'];
    $password = $row['Password'];
    // Add more fields as per your user table structure
} else {
    // Redirect or handle case when user details are not found
    header("Location: error_page.php");
    exit();
}

// Handle form submission for updating profile
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and update the user's profile details in the database
    // Implement your logic here to update the user's profile data
    // For instance:
       $newUserName = $_POST['username'];
       $newEmail = $_POST['email'];
       $newPassword = $_POST['password'];

    // Update the user's profile in the database
      $updateQuery = "UPDATE Users SET UserName = '$newUserName', Email = '$newEmail', Password = '$newPassword' WHERE UserID = '$userID'";
       if ($conn->query($updateQuery) === TRUE) {
         // Redirect to the user's home page after successful update
            echo "<script>alert('Profile updated successfully!');</script>";
            header("Location: events.php");
              exit();
        } else {
          echo "Error updating profile: " . $conn->error;
        }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Profile - Divine Event Planner</title>
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
                    <a class="nav-link" href="events.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content Area -->
    <div class="container mt-4">
        <h2>Update Profile</h2>
        <!-- Add a form for updating profile details -->
        <form action="" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="<?php echo $userName; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $userEmail; ?>" required>
            </div>
            <!-- Add more fields as needed (e.g., password) -->
            <!-- Example for password update (Add a password field and uncomment the lines below) -->
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" value="<?php echo $password; ?>" required>
            </div> 
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
