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
    $birth = date('Y-m-d', strtotime($_POST['birth'])); // Convert the date format
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];

    // Create a prepared statement
    $stmt = $conn->prepare("INSERT INTO employees (Name, birth, email, phone, gender, address) VALUES (?, ?, ?, ?, ?, ?)");

    // Bind parameters
    $stmt->bind_param("ssssss", $Name, $birth, $email, $phone, $gender, $address);

    // Execute the statement
    if ($stmt->execute()) {
        header("Location: employees.php"); // Redirect to the list page
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}

?>

  <main id="main" class="main">
  <div class="container">
        <h2>Thêm nhân viên</h2>
        <form method="post" action="add_e.php">
            <div class="form-group">
                <label for="name">Tên:</label>
                <input type="text" class="form-control" id="Name" name="Name">
            </div>
            <div class="form-group">
                <label for="birth">Ngày sinh:</label>
                <input type="text" class="form-control" id="birth" name="birth" >
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="phone">Số điện thoại:</label>
                <input type="text" class="form-control" id="phone" name="phone">
            </div>
            <div class="form-group">
              <label for="gender">Giới tính:</label>
              <select class="form-control" id="gender" name="gender">
                  <option value="">Chọn giới tính...</option>
                  <option value="Nam">Nam</option>
                  <option value="Nữ">Nữ</option>
                  <option value="Khác">Khác</option>
              </select>
           </div>
            <div class="form-group">
                <label for="address">Địa chỉ:</label>
                <input type="text" class="form-control" id="address" name="address" >
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Thêm</button>
        </form>
    </div> 
  </main>


<?php
include('footer.php')
?>