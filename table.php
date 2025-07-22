<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sql"; // your database

$name= $_POST["name"];
$age= $_POST["age"];

echo $name;
echo "<br>";
echo $age;
echo "<br>";


$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

// Check if form data exists
if (!empty($_POST['name']) && !empty($_POST['age'])) {
$name = $conn->real_escape_string($_POST['name']);
$age = (int)$_POST['age'];

$sql = "INSERT INTO DEEM (ID, NAME, AGE) VALUES ('','$name', '$age')";

if ($conn->query($sql) === TRUE) {
$last_id = $conn->insert_id;
echo "✅ New record created successfully. ID: " . $last_id;
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
} else {
echo "❌ Please provide both name and age.";
}

$conn->close();
?>