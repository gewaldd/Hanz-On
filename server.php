<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'login_db'); 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle registration
$success = '';
$errors = [];
if (isset($_POST['register'])) {
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);
    $confirm_password = $conn->real_escape_string($_POST['confirm_password']);

    // Validate form inputs
    if ($password !== $confirm_password) {
        $errors[] = "Passwords do not match.";
    }

    // Check for duplicate username or email
    $duplicate_check_sql = "SELECT * FROM members WHERE username='$username' OR email='$email'";
    $duplicate_result = $conn->query($duplicate_check_sql);

    if ($duplicate_result->num_rows > 0) {
        $errors[] = "Username or email is already in use.";
    }

    if (empty($errors)) {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert into members table
        $sql = "INSERT INTO members (username, email, password) VALUES ('$username', '$email', '$hashed_password')";
        if ($conn->query($sql) === TRUE) {
            $success = "Account created successfully!";
        } else {
            $errors[] = "Error: " . $conn->error;
        }
    }
}

// Handle login
if (isset($_POST['login'])) {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);
    $login_type = $_POST['login_type']; // 'member' or 'admin'

    if ($login_type === 'member') {
        $sql = "SELECT * FROM members WHERE username='$username'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) { // Hashed password check for members
                header("Location: Landing Page (Soteria's Game Archive).php");
                exit();
            } else {
                $errors[] = "Incorrect password.";
            }
        } else {
            $errors[] = "Member user not found.";
        }
    } else if ($login_type === 'admin') {
        $sql = "SELECT * FROM admin WHERE username='$username'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if ($password === $row['password']) { // Plain-text comparison for admins
                header("Location: Landing Page (Soteria's Game Archive)Admin.php");
                exit();
            } else {
                $errors[] = "Incorrect password.";
            }
        } else {
            $errors[] = "Admin user not found.";
        }
    }
}

$conn->close();
?>