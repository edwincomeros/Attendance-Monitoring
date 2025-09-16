<?php
session_start();
include "db.php"; // include your db connection

// If already logged in, go to dashboard
if (isset($_SESSION["user_id"])) {
    header("Location: dashboard.php");
    exit;
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    // Query user
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($user_id, $db_password);
        $stmt->fetch();

        if ($password === $db_password) { // plain-text check
            $_SESSION["user_id"] = $user_id;
            $_SESSION["username"] = $username;
            header("Location: dashboard.php");
            exit;
        } else {
            $error = "Invalid password!";
        }
    } else {
        $error = "No user found with that username!";
    }

    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>WMSU ILS Attendance Tracking</title>
  <style>
    * {
      box-sizing: border-box;
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    body {
      background: url('./images/shs.jpg') no-repeat center center fixed;
      background-size: cover;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .login-box {
      background-color: white;
      padding: 30px 40px;
      border-radius: 8px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
      width: 320px;
      text-align: center;
    }

    .login-box img {
      width: 80px;
      margin-bottom: 10px;
    }

    .login-box h2 {
      font-size: 18px;
      margin-bottom: 15px;
      font-weight: bold;
      color: #000;
    }

    .login-box label {
      display: block;
      text-align: left;
      margin: 10px 0 5px;
      font-size: 14px;
    }

    .login-box input[type="text"],
    .login-box input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border-radius: 4px;
      border: 1px solid #ccc;
      font-size: 14px;
    }

    .forgot-password {
      text-align: right;
      font-size: 13px;
      margin-bottom: 15px;
    }

    .forgot-password a {
      color: #d00;
      text-decoration: none;
    }

    .login-box button {
      background-color: #d00;
      color: white;
      padding: 10px;
      width: 100%;
      border: none;
      border-radius: 4px;
      font-size: 16px;
      cursor: pointer;
      margin-bottom: 15px;
    }

    .login-box .signup {
      font-size: 13px;
    }

    .login-box .signup a {
      color: #d00;
      text-decoration: none;
    }
  </style>
</head>
<body>
  <div class="login-box">
    <img src="./images/logo.jpg" alt="logo">
    <h2>WMSU ILS Attendance Tracking</h2>
     <form method="POST" action="">
      <?php if (!empty($error)) echo "<div class='error-message'>$error</div>"; ?>

      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required>

      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>

      <div class="forgot-password">
        <a href="#">Forgot Password</a>
      </div>

      <button type="submit">Log in</button>
    </form>
    <div class="signup">
      Doesn't have an account? <a href="signup.php">Sign up here</a>
    </div>
  </div>
</body>
</html>
