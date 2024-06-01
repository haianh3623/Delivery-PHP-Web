<?php
include('dbconn.php');
include('header.php');
include('sidebar.php');
?>

  <main id="main" class="main">

  <h1>Tổng quan:</h1>
  <div class="card-deck">
        <div class="card text-white bg-success mb-3">
            <div class="card-body">
                <h5 class="card-title">Đơn hàng</h5>
                <?php
                $query = "SELECT COUNT(*) as order_count FROM orders";
                $result = $conn->query($query);
                $row = $result->fetch_assoc();
                echo "<p>Số lượng đơn hàng: " . $row['order_count'] . "</p>";
                ?>
                <a href="orders.php" class="btn btn-light btn-sm">Quản lý đơn hàng</a>
            </div>
        </div>
        <div class="card text-white bg-success mb-3">
            <div class="card-body ">
                <h5 class="card-title">Nhân viên</h5>
                <?php
                $query = "SELECT COUNT(*) as employee_count FROM employees WHERE state = 1";
                $result = $conn->query($query);
                $row = $result->fetch_assoc();
                echo "<p>Số lượng nhân viên: " . $row['employee_count'] . "</p>";
                ?>
                <a href="employees.php" class="btn btn-light btn-sm">Quản lý nhân viên</a>
            </div>
        </div>
        <div class="card text-white bg-success mb-3">
            <div class="card-body">
                <h5 class="card-title">Người gửi</h5>
                <?php
                $query = "SELECT COUNT(*) as sender_count FROM sender WHERE state = 1";
                $result = $conn->query($query);
                $row = $result->fetch_assoc();
                echo "<p>Số lượng người gửi: " . $row['sender_count'] . "</p>";
                ?>
                <a href="sender.php" class="btn btn-light btn-sm">Quản lý người gửi</a>
            </div>
        </div>
        <div class="card text-white bg-success mb-3">
            <div class="card-body">
                <h5 class="card-title">Người nhận</h5>
                <?php
                $query = "SELECT COUNT(*) as receiver_count FROM receiver WHERE state = 1";
                $result = $conn->query($query);
                $row = $result->fetch_assoc();
                echo "<p>Số lượng người nhận: " . $row['receiver_count'] . "</p>";
                ?>
                <a href="receiver.php" class="btn btn-light btn-sm">Quản lý người nhận</a>
            </div>
        </div>
    </div>

    <div class="container row">

        <div class="col">
        <h3>Top 3 nhân viên tạo nhiều đơn hàng nhất</h2>
        <?php
        echo "<table>";
        echo "<tr><th>STT</th><th>Nhân viên</th><th>Số lượng đơn hàng</th></tr>";

        $query = "SELECT employees.Name, COUNT(*) as order_count 
        FROM orders 
        INNER JOIN employees ON orders.E_ID = employees.E_ID 
        GROUP BY orders.E_ID 
        ORDER BY order_count DESC 
        LIMIT 3";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            $count = 1;
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $count . "</td><td>" . $row['Name'] . "</td><td>" . $row['order_count'] . "</td></tr>";
                $count++;
            }
        } else {
            echo "<tr><td colspan='3'>No orders found.</td></tr>";
        }

        echo "</table>";
        ?>
        </div>
        <!-- <br> -->
        <div class="col">
        <h3>Top 3 người gửi nhiều đơn hàng nhất</h2>
        <?php
        echo "<table>";
        echo "<tr><th>STT</th><th>Nhân viên</th><th>Số lượng đơn hàng</th></tr>";

        $query = "SELECT sender.name, COUNT(*) as order_count 
        FROM orders 
        INNER JOIN sender ON orders.S_ID = sender.S_ID 
        GROUP BY orders.S_ID 
        ORDER BY order_count DESC 
        LIMIT 3";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            $count = 1;
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $count . "</td><td>" . $row['name'] . "</td><td>" . $row['order_count'] . "</td></tr>";
                $count++;
            }
        } else {
            echo "<tr><td colspan='3'>No orders found.</td></tr>";
        }

        echo "</table>";
        ?>
        </div>
    </div>


  </main>


<?php
include('footer.php')
?>