<?php
include('dbconn.php');

session_start();
if($_SESSION['auth'] != 2){
    header("Location: index.php");
    exit();
}

$sql = "SELECT * FROM employees";
$result = $conn->query($sql);

if(isset($_POST['id'])) {
    $id = $_POST['id'];

    // Create a prepared statement
    $stmt = $conn->prepare("UPDATE employees SET state = 0 WHERE E_ID = ?");

    // Bind parameters
    $stmt->bind_param("i", $id);

    // Execute the statement
    if ($stmt->execute()) {
        echo 1; // Success
    } else {
        echo 0; // Failure
    }

    $stmt->close();
} else {
    echo 0; // No ID
}
?>