<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

   
    $conn = new mysqli("localhost", "root", "", "football_academy");

    if ($conn->connect_error) {
        echo "Database connection failed";
        exit;
    }

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $message = trim($_POST["message"]);

    if (empty($name) || empty($email) || strlen($message) < 10) {
        echo "Invalid input!";
        exit;
    }

    $stmt = $conn->prepare(
        "INSERT INTO messages (name, email, message) VALUES (?, ?, ?)"
    );
    $stmt->bind_param("sss", $name, $email, $message);

    if ($stmt->execute()) {
        echo "✅ Message saved successfully!";
    } else {
        echo "❌ Error saving message";
    }

    $stmt->close();
    $conn->close();
}
?>
