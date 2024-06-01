<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link " href="orders.php">
          <i class="bi bi-bag-check"></i>
          <span>Đơn hàng</span>
        </a>
      </li>

      <?php
      if($_SESSION['auth'] == 2){
      echo '<li class="nav-item">
        <a class="nav-link " href="employees.php">
          <i class="bi bi-person-fill"></i>
          <span>Nhân Viên</span>
        </a>
      </li>';
      }
      ?>
      <li class="nav-item">
        <a class="nav-link " href="sender.php">
          <i class="bi bi-person-fill-up"></i>
          <span>Người gửi</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link " href="receiver.php">
          <i class="bi bi-person-fill-down"></i>
          <span>Người nhận</span>
        </a>
      </li>

      
    </ul>
  </aside>