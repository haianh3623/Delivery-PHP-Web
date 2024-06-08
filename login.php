<?php
    include('dbconn.php');

    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["uname"];
    $password = $_POST["psw"];

    $stmt = $conn->prepare("SELECT username, password, auth FROM users WHERE username = ? ");

    $stmt->bind_param("s", $username);
 
    $stmt->execute();

    $stmt->bind_result($uname, $pass, $auth);
    
    while($stmt->fetch()){
        // echo "$uname , $pass, $auth";
        if($pass == $password && $uname == $username ){
            $_SESSION['username'] = $uname;
            $_SESSION['auth'] = $auth;
            header("Location: index.php");
            exit();
        } else {
            $error_message = "Invalid username or password!";
        }
    }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Đăng nhập</title>
    <style>
        html {
            background-color: #4CAF50;
        }
        body {
            font-family: Arial, Helvetica, sans-serif;
        }
        .container {
            width: 300px;
            padding: 16px;
            background-color: white;
            margin: 0 auto;
            margin-top: 100px;
            border: 1px solid black;
            border-radius: 4px;
        }
        input[type=text], input[type=password] {
            width: 90%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }
        input[type=text]:focus, input[type=password]:focus {
            background-color: #ddd;
            outline: none;
        }
        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 16px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 0.9;
        }
        .btn:hover {
            opacity:1;
        }
    </style>
</head>
<body>
<form action="login.php" method="post" class="container">
        <label for="uname"><b>Tên đăng nhập</b></label>
        <input type="text" placeholder="Enter Username" name="uname" required>

        <label for="psw"><b>Mật khẩu</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required>

        <?php
        if (isset($error_message)) {
            echo '<p style="color:red;">' . $error_message . '</p>';
        }
        ?>

        <button type="submit" class="btn">Login</button>
    </form>
</body>
</html>