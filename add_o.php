<?php
include('dbconn.php');
include('header.php');
include('sidebar.php');

if($_SERVER["REQUEST_METHOD"] == "POST") {
  $E_ID = $_POST['E_ID'];
  $R_ID = $_POST['R_ID'];
  $S_ID = $_POST['S_ID'];
  $status = $_POST['status'];
  $Date = $_POST['Date'];
  $address = $_POST['address'];
  $infor = $_POST['infor'];

  $sql = "INSERT INTO orders (E_ID, R_ID, S_ID, status, Date, address, infor) VALUES ('$E_ID', '$R_ID', '$S_ID', '$status', '$Date', '$address', '$infor')";

  if ($conn->query($sql) === TRUE) {
      echo "New order created successfully";
      header("Location: orders.php");
      exit;
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

?>


  <main id="main" class="main">
    <div class="container">
        <h2>Thêm đơn hàng mới</h2>
        <form method="post">
            <div class="form-group">
                <label for="E_ID">Nhân viên:</label>
                <select class = "form-select form-control-lg" name="E_ID" >
                <?php
                $query = "SELECT * FROM employees";
                $e_array = $conn->query($query);
                while($row = $e_array->fetch_assoc()) {
                    echo "<option value='".$row['E_ID']."'>".$row['Name']."</option>";
                }

                ?>
                </select>
            </div> 
            <div class="form-group">
                <label for="R_ID">Người nhận:</label>
                <select class = "form-select form-control-lg" name="R_ID" >
                  <?php
                  $query = "SELECT * FROM receiver";
                  $e_array = $conn->query($query);
                  while($row = $e_array->fetch_assoc()) {
                      echo "<option value='".$row['R_ID']."'>".$row['name']."</option>";
                  }

                  ?>
                </select>
            </div>
            <div class="form-group">
                <label for="S_ID">Người gửi:</label>
                <select class = "form-select form-control-lg" name="S_ID" >
                <?php
                  $query = "SELECT * FROM sender";
                  $e_array = $conn->query($query);
                  while($row = $e_array->fetch_assoc()) {
                      echo "<option value='".$row['S_ID']."'>".$row['name']."</option>";
                  }

                  ?>
                </select>
            </div>
            <div class="form-group">
                <label for="status">Trạng thái:</label>
                <select class = "form-select form-control-lg" name="status">
                  <option value="Đang xử lý">Đang xử lý</option>
                  <option value="Đang giao hàng">Đang giao hàng</option>
                  <option value="Hoàn thành">Hoàn thành</option>
                  <option value="Đã hủy">Đã hủy</option>
                </select>
            </div>
            <div class="form-group">
                <label for="Date">Ngày tạo đơn hàng:</label>
                <input type="date" class="form-control" id="Date" name="Date">
            </div>
            <div class="form-group">
                <label for="address">Địa chỉ giao hàng:</label>
                <input type="text" class="form-control" id="address" name="address">
            </div>
            <div class="form-group">
                <label for="infor">Thông tin:</label>
                <input type="text" class="form-control" id="infor" name="infor">
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Thêm</button>
        </form>  
    </div>
</main>


<?php
include('footer.php')
?>
