<?php
include('dbconn.php');

$sql = "SELECT * FROM sender";
$result = $conn->query($sql);

if(isset($_POST['id'])) {
    $id = $_POST['id'];

    // Create a prepared statement
    // $stmt = $conn->prepare("DELETE FROM sender WHERE R_ID = ?");
    $stmt = $conn->prepare("UPDATE sender SET state = 0 WHERE S_ID = ?");


    // Bind parameters
    $stmt->bind_param("i", $id);

    // Execute the statement
    if ($stmt->execute()) {
        echo 1; // Success
    } else {
        echo 0; // Failure
    }

    $stmt->close();
    $conn->close();
} else {
    echo 0; // No ID
}
?>