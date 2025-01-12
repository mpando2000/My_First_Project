<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

// Database connection
$conn = mysqli_connect('localhost', 'root', '', 'jobdb');

// Check connection
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Check if the login form was submitted
if (isset($_POST['login'])) {
    // Sanitize user inputs to prevent SQL injection
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Prepare the SQL query to check for the user
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    // Check query success
    if ($result) {
        // Check if exactly one user exists
        if (mysqli_num_rows($result) === 1) {
            // Fetch the user data (including the role and hashed password)
            $user = mysqli_fetch_assoc($result);

            // Verify the password with password_verify
            if (password_verify($password, $user['password'])) {
                // Password is correct, set session variables
                $_SESSION['user_email'] = $user['email']; // Store email in session
                $_SESSION['user_role'] = $user['role']; // Store role in session (admin or user)
                $_SESSION['user_id'] = $user['id']; // Store user ID in session (optional)

                // Redirect based on the user role
                if ($user['role'] === 'admin') {
                    // Admin user, redirect to admin dashboard
                    header("Location: ./Admin/index.php");
                    exit; // Always exit after a redirect
                } else {
                    // Regular user, redirect to user dashboard
                    header("Location: ./user_dashboard.php"); // Redirect to user dashboard
                    exit; // Always exit after a redirect
                }
            } else {
                // Password is incorrect
                echo "Incorrect password. Please try again.";
            }
        } else {
            // No user found
            echo "Incorrect email. Please try again.";
        }
    } else {
        // Query error
        echo "Query error: " . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>
