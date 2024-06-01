<?php
include('dbconn.php');
include('header.php');
include('sidebar.php')
?>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
  function deleteRecord(id) {
      if(confirm('Bạn muốn xóa đơn hàng này?')) {
          $.ajax({
              url: 'delete_record_o.php',
              type: 'POST',
              data: { id: id },
              success: function(response) {
                  if(response == 1) {
                      location.reload();
                  } else {
                      alert('ID không hợp lệ');
                  }
              }
          });
      }
  }
  </script>
  <main id="main" class="main">
  <button class="btn btn-success" onclick="location.href='add_o.php'">Thêm</button>
    <table>
      <tr>
        <th>ID</th>
        <th>Nhân viên</th>
        <th>Người nhận</th>
        <th>Người gửi</th>
        <th>Trạng thái</th>
        <th>Date</th>
        <th>Địa chỉ giao hàng</th>
        <th>Thông tin</th>
        <th></th>
      </tr>
    <?php
    $sql = "SELECT orders.O_ID, employees.Name as E_Name, receiver.Name as R_Name, sender.Name as S_Name, orders.status, orders.Date, orders.address, orders.infor 
            FROM orders 
            INNER JOIN employees ON orders.E_ID = employees.E_ID 
            INNER JOIN receiver ON orders.R_ID = receiver.R_ID 
            INNER JOIN sender ON orders.S_ID = sender.S_ID";
    $result = $conn->query($sql);
    $id = 0;
    if ($result->num_rows > 0) {
        // Output data of each row
        echo "";
        while($row = $result->fetch_assoc()) {
            $id ++;
            echo "<tr><td>" . $id. "</td><td>" . $row["E_Name"]. "</td><td>" . $row["R_Name"]. "</td><td>" . $row["S_Name"]. "</td><td>" . $row["status"]. "</td><td>" . $row["Date"]. "</td><td>" . $row["address"]. "</td><td>" . $row["infor"]. "</td>";
            echo "<td><button style='margin-right: 10px; border-radius: 10px; background-color: white;' onclick=\"location.href='edit_o.php?id=" . $row["O_ID"]. "'\">Sửa</button><button style='background-color: red;border-radius: 10px;' onclick=\"deleteRecord(" . $row["O_ID"]. ")\">Xóa</button></td></tr>";
            
          }
        
    }
    else {
      echo "<tr><td colspan='3'>No results</td></tr>";
    }
  
    $conn->close();
    ?>
  </table>
  </main>


<?php
include('footer.php')
?>