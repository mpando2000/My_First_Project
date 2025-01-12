<?php
// Start session and check user login
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit;
}

// Database connection
$conn = mysqli_connect('localhost', 'root', '', 'jobdb');
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Fetch the logged-in user's job applications
$user_id = $_SESSION['user_id'];
$query = "SELECT jobs.title AS job_title, job_applications.status, job_applications.applied_at
          FROM job_applications
          JOIN jobs ON job_applications.job_id = jobs.id
          WHERE job_applications.user_id = $user_id";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Job Applications</title>
</head>
<body>
    <h1>My Job Applications</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Job Title</th>
                <th>Status</th>
                <th>Applied At</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['job_title']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td><?php echo $row['applied_at']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>

<?php mysqli_close($conn); ?>
