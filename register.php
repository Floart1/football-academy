<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = new mysqli("localhost", "root", "", "football_academy");

if ($conn->connect_error) {
    http_response_code(500);
    echo "Database connection failed";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = trim($_POST["name"] ?? "");
    $age = intval($_POST["age"] ?? 0);
    $position = trim($_POST["position"] ?? "");
    $email = trim($_POST["email"] ?? "");

    if ($name === "" || $age <= 0 || $position === "" || $email === "") {
        http_response_code(400);
        echo "Invalid input";
        exit;
    }

    $stmt = $conn->prepare(
        "INSERT INTO registrations (player_name, age, position, parent_email)
         VALUES (?, ?, ?, ?)"
    );

    if (!$stmt) {
        http_response_code(500);
        echo "Prepare failed";
        exit;
    }

    $stmt->bind_param("siss", $name, $age, $position, $email);

    if ($stmt->execute()) {
        echo "✅ Registration saved successfully!";
    } else {
        http_response_code(500);
        echo "Insert failed";
    }

    $stmt->close();
}

$conn->close();