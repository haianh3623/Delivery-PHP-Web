<?php
include('dbconn.php');
include('header.php');
include('sidebar.php');

$sql = "SELECT * FROM receiver";
$result = $conn->query($sql);
?>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
  function deleteRecord(id) {
      if(confirm('Bạn muốn xóa người nhận này?')) {
          $.ajax({
              url: 'delete_record_r.php',
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
  <button class="btn btn-success" onclick="location.href='add_r.php'">Thêm</button>
    <table>
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Địa chỉ</th>
            <th>Email</th>
            <th>Số điện thoại</th>
            <th></th>
        </tr>
        <?php
        $id = 0;
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                if($row["state"] == 0){
                    continue;
                }
                $id ++;
                echo "<tr><td>" . $id. "</td><td>" . $row["name"]. "</td><td>" . $row["address"]. "</td><td>" . $row["email"]. "</td><td>" . $row["phone"]. "</td>";
                echo "<td><button style='margin-right: 10px; border-radius: 10px; background-color: white;' onclick=\"location.href='edit_r.php?id=" . $row["R_ID"]. "'\">Sửa</button>";
                echo "<button style='background-color: red;border-radius: 10px;' onclick=\"deleteRecord(" . $row["R_ID"]. ")\">Xóa</button></td></tr>";
              }
        } else {
            echo "<tr><td colspan='3'>No results</td></tr>";
        }
        $conn->close();
        ?>
    </table>
    
  </main>


<?php
include('footer.php')
?>