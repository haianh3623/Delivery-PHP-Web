<?php
include('dbconn.php');
include('header.php');
include('sidebar.php');

if(isset($_GET['id'])) {
    $O_ID = $_GET['id'];
    // Fetch order from database
    $sql = "SELECT * FROM orders WHERE O_ID = $O_ID";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $order = $result->fetch_assoc();
    } else {
        die("Order not found.");
    }
} else {
    die("Invalid request.");
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $status = $_POST['status'];
    // Update order in database
    $sql = "UPDATE orders SET status = '$status'  WHERE O_ID = $O_ID";

    if ($conn->query($sql) === TRUE) {
        // echo "Order updated successfully";
        
        header("Location: orders.php");
        exit;
    } else {
        echo "Error updating order: " . $conn->error;
    }
} 

?>


  <main id="main" class="main">
  <div class="container">
        <h2>Chỉnh sửa đơn hàng</h2>
        <form method="post" >
            <div class="form-group">
                <label for="E_ID">Nhân viên:</label>
                <select class = "form-select form-control-lg" name="select-e" disabled>
                  <?php
                    $query = "SELECT * FROM employees where E_ID = '".$order['E_ID']."'";
                   
                    $e_array = $conn->query($query);
                    if($row = $e_array->fetch_assoc()) {
                        echo "<option value='".$row['E_ID']."'>".$row['Name']."</option>";
                    }
                    
                  ?>
                </select>
            </div>
            <div class="form-group">
                <label for="R_Name">Người nhận:</label>
                <select class = "form-select form-control-lg" name="select-r" disabled >
                <?php
                    $query = "SELECT * FROM receiver where R_ID = '".$order['R_ID']."'";
                    $e_array = $conn->query($query);
                    if($row = $e_array->fetch_assoc()) {
                        echo "<option value='".$row['R_ID']."'>".$row['name']."</option>";
                    }
                  ?>
                </select>
            </div>
            <div class="form-group">
                <label for="S_Name">Người gửi:</label>
                <select class = "form-select form-control-lg" name="select-s" disabled >
                <?php
                    $query = "SELECT * FROM sender where S_ID = '".$order['S_ID']."'";
                    $e_array = $conn->query($query);
                    if($row = $e_array->fetch_assoc()) {
                        echo "<option value='".$row['R_ID']."'>".$row['name']."</option>";
                    }
                  ?>
                </select>
            </div>
            <?php
            $query = "SELECT * FROM orders where O_ID = '".$order['O_ID']."'";
            $e_array = $conn->query($query);
            $row = $e_array->fetch_assoc();
            ?>
            <div class="form-group">
                <label for="status">Trạng thái:</label>
                <select class="form-select form-control-lg" name="status">
                  <option value="Đang xử lý" <?php if($row['status'] == 'Đang xử lý') echo 'selected'; ?>>Đang xử lý</option>
                  <option value="Đang giao hàng" <?php if($row['status'] == 'Đang giao hàng') echo 'selected'; ?>>Đang giao hàng</option>
                  <option value="Hoàn thành" <?php if($row['status'] == 'Hoàn thành') echo 'selected'; ?>>Hoàn thành</option>
                  <option value="Đã hủy" <?php if($row['status'] == 'Đã hủy') echo 'selected'; ?>>Đã hủy</option>
                </select>
            </div>
            <div class="form-group" >
                <label for="Date">Ngày tạo đơn hàng:</label>
                <input type="date" class="form-control" id="Date" name="Date" value="<?php echo $row['Date']; ?>" disabled >
            </div>
            <div class="form-group" >
                <label for="address">Địa chỉ giao hàng:</label>
                <input type="text" class="form-control" id="address" name="address" value="<?php echo $row['address']; ?>" disabled>
            </div>
            <div class="form-group" >
                <label for="infor">Thông tin:</label>
                <input type="text" class="form-control" id="infor" name="infor" value="<?php echo $row['infor']; ?>" disabled>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Sửa</button>
        </form>  
    </div>
  </main>



<?php
include('footer.php');
?>