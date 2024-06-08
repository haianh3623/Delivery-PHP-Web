<?php
include('dbconn.php');
include('header.php');
include('sidebar.php');

if($_SESSION['auth'] != 2){
    header("Location: index.php");
    exit();
}

$sql = "SELECT * FROM employees";
$result = $conn->query($sql);
?>

 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
  function deleteRecord(id) {
      if(confirm('Bạn muốn xóa nhân viên này?')) {
          $.ajax({
              url: 'delete_record_e.php',
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
  <button class="btn btn-success" onclick="location.href='add_e.php'">Thêm</button>
    <table>
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Ngày sinh</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Giới tính</th>
            <th>Địa chỉ</th>
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
                echo "<tr><td>" . $id. "</td><td>" . $row["Name"]. "</td><td>" . $row["birth"]. "</td><td>" . $row["email"]. "</td><td>" . $row["phone"]. "</td><td>" . $row["gender"]. "</td><td>" . $row["address"]. "</td>";
                echo "<td><button style='margin-right: 10px; border-radius: 10px; background-color: white;' onclick=\"location.href='edit_e.php?id=" . $row["E_ID"]. "'\">Sửa</button>";
                echo "<button style='background-color: red;border-radius: 10px;' onclick=\"deleteRecord(" . $row["E_ID"]. ")\">Xóa</button></td></tr>";
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
