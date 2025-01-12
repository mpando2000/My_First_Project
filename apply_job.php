<?php
// Start session and check if user is logged in
session_start();
if (!isset($_SESSION['user_email'])) {
    header("Location: login.html");
    exit;
}

// Database connection
$conn = mysqli_connect('localhost', 'root', '', 'jobdb');
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Get all jobs
$query = "SELECT * FROM jobs";
$jobs_result = mysqli_query($conn, $query);

// Handle job application
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $job_id = intval($_POST['job_id']);
    $user_id = intval($_SESSION['user_id']); // User ID from session

    $apply_query = "INSERT INTO applied_jobs (user_id, job_id) VALUES ('$user_id', '$job_id')";
    if (mysqli_query($conn, $apply_query)) {
        $success_message = "Job application submitted successfully!";
    } else {
        $error_message = "Error applying for job: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply jobs</title>
    <link rel="stylesheet" href="styles.css"> <!-- Your custom styles -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="./modified-css/main.css">

    <style>
    /* General Reset */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Roboto', sans-serif;
    }

    /* Body Styling */
    body {
        background-color: #f4f7fc;
        color: #333;
        font-size: 16px;
    }

    /* Container for the dashboard layout */
    .dashboard-container {
        display: flex;
        min-height: 100vh;
    }

    /* Sidebar Styling */
    .sidebar {
        width: 250px;
        background-color: #4caf50;
        color: #fff;
        padding: 30px 20px;
        position: fixed;
        height: 100%;
        top: 0;
        left: 0;
        box-shadow: 2px 0px 10px rgba(0, 0, 0, 0.1);
    }

    .sidebar-header h2 {
        font-size: 22px;
        margin-bottom: 10px;
    }

    .sidebar-menu {
        list-style-type: none;
        padding: 0;
    }

    .sidebar-menu li {
        margin: 15px 0;
    }

    .sidebar-menu li a {
        color: #fff;
        text-decoration: none;
        font-size: 18px;
        display: block;
        padding: 8px;
        border-radius: 5px;
    }

    .sidebar-menu li a:hover,
    .sidebar-menu li a.active {
        background-color: #45a049;
    }

    /* Main Content Section */
    .main-content {
        margin-left: 250px;
        padding: 30px;
        width: 100%;
        background-color: #fff;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    /* Header Section for the Main Content */
    .dashboard-header h1 {
        font-size: 28px;
        color: #4caf50;
    }

    .dashboard-header p {
        font-size: 18px;
        color: #666;
    }

    /* Job Application Form Styling */
    .apply-job-form {
        margin-top: 30px;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        max-width: 500px;
        margin: 0 auto;
    }

    .apply-job-form label {
        font-size: 18px;
        margin-bottom: 10px;
        display: block;
        color: #333;
    }

    .apply-job-form select {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 16px;
    }

    .apply-job-form input[type="submit"] {
        width: 100%;
        padding: 10px;
        font-size: 18px;
        background-color: #4caf50;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .apply-job-form input[type="submit"]:hover {
        background-color: #45a049;
    }

    .success-message {
        color: green;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .error-message {
        color: red;
        font-weight: bold;
        margin-bottom: 20px;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .dashboard-container {
            flex-direction: column;
        }

        .sidebar {
            width: 100%;
            position: relative;
            height: auto;
            box-shadow: none;
        }

        .main-content {
            margin-left: 0;
        }
    }

</style>

</head>
<body>

<div class="dashboard-container">
    <!-- Sidebar Section -->
    <div class="sidebar">
        <div class="sidebar-header">
            <h2>Welcome</h2>
        </div>
        <ul class="sidebar-menu">
            <li><a href="user_dashboard.php" class="active">Dashboard</a></li>
            <li><a href="apply_job.php">Apply for a Job</a></li>
            <li><a href="./index.html">Logout</a></li>
        </ul>
    </div>

    <!-- Main Content Section -->
    <div class="main-content">
        <h1>Available Jobs</h1>
        <?php if (!empty($success_message)) echo "<p class='success-message'>$success_message</p>"; ?>
        <?php if (!empty($error_message)) echo "<p class='error-message'>$error_message</p>"; ?>

        <form method="post" class="apply-job-form">
            <label>Select Job:</label>
            <select name="job_id" required>
                <?php while ($job = mysqli_fetch_assoc($jobs_result)) { ?>
                    <option value="<?php echo $job['id']; ?>"><?php echo $job['title']; ?></option>
                <?php } ?>
            </select><br><br>
            <input type="submit" value="Apply">
        </form>
    </div>
</div>

</body>
</html>

<?php mysqli_close($conn); ?>

