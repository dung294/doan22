<?php
ob_start(); // Start output buffering
// Rest of your code
?>
<!--//lấy dữ liệu hiển thị-->
<!--//    echo md5("123456");//mã hóa xác xuất trùng mk là ko-->
<!--//    $query = "select*from member";-->
<!--//    $result = $connect->query($query);-->
<!--//    foreach ($result as $key=>$item):-->
<!--//        echo"<br>".$item['fullname'];-->
<!--//    endforeach;-->
<?php
//tiếp nhận username từ nút sbt,mysqli num row là lấy số lượng bản ghi
if (isset($_POST['username'])){
    $username = $_POST['username'];
    $password = ($_POST['password']);
    $query = "select * from member where username='$username' and password='$password'";
    $result = $connect->query($query);
    if (mysqli_num_rows($result)==0){
        $alert="Sai tên đăng nhập hoặc mật khẩu";
    }else{
        $result= mysqli_fetch_array($result);
        if ($result['status']==0){
            $alert= "Tài khoản của bạn đang bị khóa hoặc đang trong quá trình sửa lỗi";
        }else{
            $_SESSION['member'] = $username;
            //echo "<script>location='?option=home';</script>";
            if (isset($_GET['order'])){
                header("location: ?option=order");
            }elseif ($_GET['productid']){
                $memberid = $result['id'];
                $productid = $_GET['productid'];
                $content = $_SESSION['content'];
                $connect->query("insert comments(memberid,productid,date,content) values($memberid,$productid,now(),'$content')");
                echo "<script>alert('Bỉnh luận của bạn đã được thực hiện!'); location='?option=productdetail&id=$productid';</script>";
            }else{
                header("location: ?option=home ");
            }

        }
    }
}
?>
<section>

    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                     class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form method="post">
                    <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                        <p class="lead fw-normal mb-0 me-3">Sign in with</p>
                        <button type="button" class="btn btn-primary btn-floating mx-1">
                            <i class="fab fa-facebook-f"></i>
                        </button>

                        <button type="button" class="btn btn-primary btn-floating mx-1">
                            <i class="fab fa-twitter"></i>
                        </button>

                        <button type="button" class="btn btn-primary btn-floating mx-1">
                            <i class="fab fa-linkedin-in"></i>
                        </button>
                    </div>

                    <div class="divider d-flex align-items-center my-4">
                        <p class="text-center fw-bold mx-3 mb-0"><?=isset($alert)?$alert:""?></p>
                    </div>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="text" name="username" class="form-control form-control-lg" placeholder="Enter the Username" required/>
                        <label class="form-label">Username</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-3">
                        <input type="password" name="password" class="form-control form-control-lg" placeholder="Enter a password" />
                        <label class="form-label">Password</label>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Checkbox -->
                        <div class="form-check mb-0">
                            <input class="form-check-input me-2" type="checkbox" value=""/>
                            <label class="form-check-label" >
                                Remember me
                            </label>
                        </div>
                    </div>

                    <div class="text-center text-lg-start mt-4 pt-2">
                        <input type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;" value="Login">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="?option=register"
                                                                                          class="link-danger">Register</a></p>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>
