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
        <h3 style="padding-bottom: 50px;">Top 5 nhân viên tạo nhiều đơn hàng nhất</h2>
        <?php
        echo "<table>";
        echo "<tr><th>STT</th><th>Nhân viên</th><th>Số lượng đơn hàng</th></tr>";

        $query = "SELECT employees.Name, COUNT(*) as order_count 
        FROM orders 
        INNER JOIN employees ON orders.E_ID = employees.E_ID 
        GROUP BY orders.E_ID 
        ORDER BY order_count DESC 
        LIMIT 5";
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
        <div class="col-6">
        <h3>Trạng thái đơn hàng</h2>
        <div id="chart-container">
            <canvas id="myChart"></canvas>
        </div>
        </div>
    </div>

    <?php
        $stmt = $conn->prepare("SELECT COUNT(*) AS o FROM orders WHERE status = ?");
        $labels = ['Đang xử lý', 'Đang giao hàng', 'Hoàn thành', 'Đã hủy'];
        $count = ['Đang xử lý'=> 0, 'Đang giao hàng' => 0, 'Hoàn thành' => 0, 'Đã hủy' => 0];
        foreach($labels as $label){
            $stmt->bind_param("s", $label);
            if($stmt->execute()){
                $stmt->bind_result($data);
                while ($stmt->fetch()) {
                    $count[$label] = $data;
                }
            } else{
                echo "Error:" . $stmt->error;
            }
        }

    ?>

    <script>
        const labels = <?php echo json_encode(array_keys($count)); ?>;
        const data = <?php echo json_encode(array_values($count)); ?>;

        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Count',
                    data: data,
                    backgroundColor: [
                        'rgba(250, 250, 2, 0.8)',
                        'rgba(2, 250, 60, 0.8)',
                        'rgba(2, 155, 250, 0.8)',
                        'rgba(250, 2, 2, 0.8)'
                    ],
                    borderColor: [
                        'rgba(250, 250, 2, 1)',
                        'rgba(2, 250, 60, 1)',
                        'rgba(2, 155, 250, 1)',
                        'rgba(250, 2, 2, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'right',
                    },
                    title: {
                        position: 'top'
                    }
                }
            }
        });
    </script>


  </main>


<?php
include('footer.php')
?>