<?php
// Start the session to access session variables
session_start();

// Check if the user is logged in, otherwise redirect to login page
if (!isset($_SESSION['user_email'])) {
    header("Location: login.html");
    exit;
}

// User data
$user_name = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : 'Guest';  // Get the user's name from the session
$user_role = isset($_SESSION['user_role']) ? $_SESSION['user_role'] : 'user';  // 'user' or 'admin'
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : ''; // Optional, but useful for user-specific data

// Database connection
$conn = mysqli_connect('localhost', 'root', '', 'jobdb');

// Check the database connection
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Query to get the user's applied jobs
$query = "
    SELECT jobs.title AS job_title, applied_jobs.application_date, applied_jobs.status
    FROM applied_jobs
    JOIN jobs ON applied_jobs.job_id = jobs.id
    WHERE applied_jobs.user_id = '$user_id'
";


$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
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

/* Applied Jobs Section */
.jobs-section {
    margin-top: 30px;
}

.jobs-section h2 {
    font-size: 24px;
    color: #333;
    margin-bottom: 20px;
}

.jobs-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
}

.jobs-table th, .jobs-table td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.jobs-table th {
    background-color: #4caf50;
    color: #fff;
}

.jobs-table tr:nth-child(even) {
    background-color: #f9f9f9;
}

.no-jobs {
    color: #999;
    font-size: 16px;
}

/* Button Styling */
.btn {
    display: inline-block;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 5px;
    font-weight: 500;
    text-align: center;
}

.btn-primary {
    background-color: #4caf50;
    color: #fff;
}

.btn-primary:hover {
    background-color: #45a049;
}

.btn-secondary {
    background-color: #f44336;
    color: #fff;
}

.btn-secondary:hover {
    background-color: #e53935;
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
                <p><?php echo $user_name; ?></p> <!-- Display the user's name -->
            </div>
            <ul class="sidebar-menu">
                <li><a href="user_dashboard.php" class="active">Dashboard</a></li>
                <li><a href="apply_job.php">Apply for a Job</a></li>
                <li><a href="./index.html">Logout</a></li>
            </ul>
        </div>

        <!-- Main Content Section -->
        <div class="main-content">
            <div class="dashboard-header">
                <h1>Welcome, <?php echo $user_name; ?>!</h1> <!-- Display the user's name -->
                <p>Your role: <strong><?php echo ucfirst($user_role); ?></strong></p> <!-- Display the user's role -->
            </div>
            
            <!-- Applied Jobs Section -->
            <div class="jobs-section">
                <h2>Your Applied Jobs</h2>
                <?php if (mysqli_num_rows($result) > 0) { ?>
                    <table class="jobs-table">
                        <thead>
                            <tr>
                                <th>Job Title</th>
                                <th>Application Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td><?php echo $row['job_title']; ?></td>
                                    <td><?php echo $row['application_date']; ?></td>
                                    <td><?php echo ucfirst($row['status']); ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                <?php } else { ?>
                    <p class="no-jobs">You have not applied for any jobs yet.</p>
                <?php } ?>
            </div>


            <!-- Apply for New Job Button -->
            <div class="actions">
                <a href="apply_job.php" class="btn btn-primary">Apply for a New Job</a>
            </div>

           
        </div>
    </div>

</body>
</html>

<?php
// Close the database connection
mysqli_close($conn);
?>
