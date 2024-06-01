<?php
include('dbconn.php');
include('header.php');
include('sidebar.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Create a prepared statement
    $stmt = $conn->prepare("INSERT INTO sender (name, address, email, phone) VALUES (?, ?, ?, ?)");

    // Bind parameters
    $stmt->bind_param("ssss", $name, $address, $email, $phone);

    // Execute the statement
    if ($stmt->execute()) {
        header("Location: sender.php"); // Redirect to the list page
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>


  <main id="main" class="main">
  <div class="container">
        <h2>Thêm người gửi mới</h2>
        <form method="post" action="add_s.php">
            <div class="form-group">
                <label for="name">Tên:</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="address">Địa chỉ:</label>
                <input type="text" class="form-control" id="address" name="address">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="phone">Số điện thoại:</label>
                <input type="text" class="form-control" id="phone" name="phone">
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Thêm</button>
        </form>
    </div>    
  </main>


<?php
include('footer.php')
?>
