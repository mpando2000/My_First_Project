<?php
// Start session and check if admin is logged in
session_start();
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: login.html");
    exit;
}

// Database connection
$conn = mysqli_connect('localhost', 'root', '', 'jobdb');
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Get all applications
$query = "SELECT aj.id, u.name AS user_name, j.title AS job_title, aj.status 
          FROM applied_jobs aj
          JOIN users u ON aj.user_id = u.id
          JOIN jobs j ON aj.job_id = j.id";
$applications = mysqli_query($conn, $query);

// Handle status update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $application_id = intval($_POST['application_id']);
    $status = $_POST['status'];

    $update_query = "UPDATE applied_jobs SET status='$status' WHERE id='$application_id'";
    mysqli_query($conn, $update_query);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Review Applications</title>
</head>
<body>
    <h1>Applications</h1>
    <table border="1">
        <thead>
            <tr>
                <th>User</th>
                <th>Job</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($application = mysqli_fetch_assoc($applications)) { ?>
                <tr>
                    <td><?php echo $application['user_name']; ?></td>
                    <td><?php echo $application['job_title']; ?></td>
                    <td><?php echo $application['status']; ?></td>
                    <td>
                        <form method="post" style="display: inline;">
                            <input type="hidden" name="application_id" value="<?php echo $application['id']; ?>">
                            <select name="status">
                                <option value="Pending">Pending</option>
                                <option value="Agreed">Agreed</option>
                                <option value="Disagreed">Disagreed</option>
                            </select>
                            <input type="submit" value="Update">
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>

<?php mysqli_close($conn); ?>
