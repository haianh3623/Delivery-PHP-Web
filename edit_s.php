<?php
include('dbconn.php');
include('header.php');
include('sidebar.php');

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Create a prepared statement
    $stmt = $conn->prepare("UPDATE sender SET name = ?, address = ?, email = ?, phone = ? WHERE S_ID = ?");

    // Bind parameters
    $stmt->bind_param("ssssi", $name, $address, $email, $phone, $id);

    // Execute the statement
    if ($stmt->execute()) {
        header("Location: sender.php"); // Redirect to the list page
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    // Get the current data
    $stmt = $conn->prepare("SELECT * FROM sender WHERE S_ID = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();
}
?>

  <main id="main" class="main">
  <div class="container">
        <h2>Chỉnh sửa thông tin người gửi</h2>
        <form method="post" action="edit_s.php?id=<?php echo $id; ?>">
            <div class="form-group">
                <label for="name">Tên:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>">
            </div>
            <div class="form-group">
                <label for="address">Địa chỉ:</label>
                <input type="text" class="form-control" id="address" name="address" value="<?php echo $row['address']; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>">
            </div>
            <div class="form-group">
                <label for="phone">Số điện thoại:</label>
                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $row['phone']; ?>">
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Sửa</button>
        </form>
    </div>
  </main>


<?php
include('footer.php')
?>