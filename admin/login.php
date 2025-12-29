<?php
session_start();
require_once("../config/db.php");

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $username = $_POST["username"];
  $password = md5($_POST["password"]);

  $sql = "SELECT * FROM admins WHERE username=? AND password=?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ss", $username, $password);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows === 1) {
    $_SESSION["admin"] = $username;
    header("Location: dashboard.php");
    exit;
  } else {
    $error = "Invalid login";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin Login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <style>
    * { margin:0; padding:0; box-sizing:border-box; font-family: Arial, sans-serif; }
    body {
      height:100vh;
      display:flex;
      justify-content:center;
      align-items:center;
      background: linear-gradient(135deg,#14532d,#3b82f6);
    }
    .login-container {
    width: 360px;
    max-width: 90%;
    padding: 40px 30px;
    background: white;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    text-align: center;
    display: flex;
    flex-direction: column;
    gap: 15px;
    }

    .login-container h2 {
      color:#14532d;
      margin-bottom:25px;
      font-size:28px;
    }

    .login-container form {
      display:flex;
      flex-direction:column;
      gap:15px;
    }
    .login-container input[type="email"],
   .login-container input[type="password"],
   .login-container input[type="submit"] {
    width: 100%;         
    box-sizing: border-box; 
    padding: 12px 15px;  
    border-radius: 8px;
    border: 1px solid #ccc;
    font-size: 14px;
   }
   .login-container input[type="submit"] {
  background: #22c55e;
  color: white;
  border: none;
  font-weight: bold;
  cursor: pointer;
  transition: 0.3s;
}

.login-container input[type="submit"]:hover {
  background: #16a34a;
}

    .login-container .return-website {
      display:block;
      margin-top:20px;
      text-decoration:none;
      color:#3b82f6;
      font-weight:bold;
      transition:0.2s;
    }

    .login-container .return-website:hover {
      text-decoration:underline;
      color:#1e40af;
    }

   
    .login-container .logo {
      font-size:40px;
      color:#22c55e;
      margin-bottom:15px;
    }

  </style>
</head>
<body>

<div class="login-container">
    <div class="logo"><i class="fa-solid fa-futbol"></i></div>
  <h2>Admin Login</h2>
  <?php if ($error) echo "<p style='color:red'>$error</p>"; ?>
  <form method="POST">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
  </form>
  <a href="http://localhost:8080/football-academy/" class="return-website"><i class="fa-solid fa-arrow-left"></i> Return to Website</a>
</div>
</body>
</html>