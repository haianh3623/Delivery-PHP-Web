<?php
include('dbconn.php');
include('header.php');
include('sidebar.php');

if($_SESSION['auth'] != 2){
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Name = $_POST['Name'];
    $birth = date('Y-m-d', strtotime($_POST['birth']));
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    // Create a prepared statement
    $stmt = $conn->prepare("UPDATE employees SET Name = ?, birth = ?,  email = ?, phone = ?,gender = ?, address = ? WHERE E_ID = ?");

    // Bind parameters
    $stmt->bind_param("ssssssi", $Name, $birth, $email, $phone, $gender, $address, $id);

    // Execute the statement
    if ($stmt->execute()) {
        header("Location: employees.php"); // Redirect to the list page
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    // Get the current data
    $stmt = $conn->prepare("SELECT * FROM employees WHERE E_ID = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();
}
?>


  <main id="main" class="main">
  <div class="container">
        <h2>Chỉnh sửa thông tin nhân viên</h2>
        <form method="post" action="edit_e.php?id=<?php echo $id; ?>">
            <div class="form-group">
                <label for="name">Tên:</label>
                <input type="text" class="form-control" id="Name" name="Name" value="<?php echo $row['Name']; ?>">
            </div>
            <div class="form-group">
                <label for="birth">Ngày sinh:</label>
                <input type="text" class="form-control" id="birth" name="birth" value="<?php echo $row['birth']; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>">
            </div>
            <div class="form-group">
                <label for="phone">Số điện thoại:</label>
                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $row['phone']; ?>">
            </div>
            <div class="form-group">
              <label for="gender">Giới tính:</label>
              <select class="form-control" id="gender" name="gender">
                  <option value="Nam" <?php echo ($row['gender'] == 'Nam') ? 'selected' : ''; ?>>Nam</option>
                  <option value="Nữ" <?php echo ($row['gender'] == 'Nữ') ? 'selected' : ''; ?>>Nữ</option>
                  <option value="Khác" <?php echo ($row['gender'] == 'Khác') ? 'selected' : ''; ?>>Khác</option>
              </select>
            </div>
            <div class="form-group">
                <label for="address">Địa chỉ:</label>
                <input type="text" class="form-control" id="address" name="address" value="<?php echo $row['address']; ?>">
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Sửa</button>
        </form>
    </div>
  </main>


<?php
include('footer.php');
?>