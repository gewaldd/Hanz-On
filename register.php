<?php
include "db.php";
$err = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $name  = trim($_POST["name"]);
  $email = trim($_POST["email"]);
  $pass  = $_POST["password"];

  if (!$name || !$email || !$pass) {
    $err = "All fields are required.";
  } else {
    $stmt = $conn->prepare("SELECT id FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute(); $stmt->store_result();

    if ($stmt->num_rows > 0) {
      $err = "Email already registered.";
    } else {
      $hash = password_hash($pass, PASSWORD_DEFAULT);
      $stmt2 = $conn->prepare("INSERT INTO users(name,email,password_hash) VALUES(?,?,?)");
      $stmt2->bind_param("sss", $name, $email, $hash);
      if ($stmt2->execute()) {
        $_SESSION['user_id'] = $stmt2->insert_id;
        $_SESSION['user_email'] = $email;
        $_SESSION['user_name']  = $name;
        header("Location: index.php");
        exit;
      } else { $err = "Registration failed."; }
    }
  }
}
?>
<!doctype html><html><head><title>Register</title></head>
<body style="background:#000;color:#fff;font-family:Arial">
  <h2>Register</h2>
  <?php if ($err) echo "<p style='color:#ff6b6b'>$err</p>"; ?>
  <form method="post">
    <input name="name" placeholder="Full name" required><br><br>
    <input name="email" type="email" placeholder="Email" required><br><br>
    <input name="password" type="password" placeholder="Password" required><br><br>
    <button type="submit">Create Account</button>
  </form>
  <p><a href="login.php">Already have an account? Login</a></p>
</body></html>
