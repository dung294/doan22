<?php session_start();?>
<?php
$connect = new MySQLi('localhost','root','','webv2');
?>
<!DOCTYPE html>
<html>
<head>
    <title>ADMIN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" integrity="... integrity key ..." crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="... integrity key ..." crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css.css">
    <script src="../public/ckeditor/ckeditor.js"></script>
</head>
<body>
<?php
    if (isset($_POST['username'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = "select * from admin where username='$username' and password='$password'";
        $result = $connect->query($query);
        if (mysqli_num_rows($result)==0){
            $alert = "Sai tên đăng nhập hoặc mật khẩu";
        }else{
            $result = mysqli_fetch_array($result);
            if ($result['status']==0){
                $alert = "Tài khoản đang bị khóa";
            }else{
                $_SESSION['admin']=$username;
                header("Refresh:0");
            }
        }
    }
?>
<section>
    <?php
        if (isset($_SESSION['admin'])){
            include "admincontrolpanel.php";
        }else{
            include"loginadmin.php";
        }
    ?>
</section>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

</html>