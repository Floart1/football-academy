<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$conn = new mysqli("localhost", "root", "", "football_academy");

if ($conn->connect_error) {
  die("DB connection failed");
}

$result = $conn->query("SELECT * FROM players");
while ($row = $result->fetch_assoc()) {
  echo "<tr>
    <td>{$row['name']}</td>
    <td>{$row['age']}</td>
    <td>{$row['team']}</td>
    <td><span class='status {$row['status']}'>{$row['status']}</span></td>
  </tr>";
}