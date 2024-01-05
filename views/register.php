<?php
    if (isset($_POST['username'])){
        $username = $_POST['username'];
        $query = "select * from member where username='$username'";
        $result = $connect->query($query);
        if (mysqli_num_rows($result)!=0){
            $alert="Tên đăng nhập không có sẵn hãy chọn tên đăng nhập khác";
        }else{
        $password = $_POST['password'];
        $fullname = $_POST['fullname'];
        $mobile = $_POST['mobile'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $query = "insert member(username,password,fullname,mobile,address,email) values('$username','$password','$fullname','$mobile','$address','$email')";
        $connect->query($query);
        echo"<script>alert('Bạn đã đăng ký thành công tài khoản, chúng tôi sẽ liên hệ đên bạn!');location='?option=home';</script>";
        }
    }
?>
<section>
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-6">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                     class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-6">
                <form method="post" onsubmit="if (repassword.value!=password.value){alert('Xác nhận mật khẩu không chính xác!');return false;}">
                    <div class="text-center mb-4">
                        <p class="lead fw-normal mb-0">Sign up with</p>
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

                    <div class="divider d-flex align-items-center my-3">
                        <p class="text-center fw-bold mx-3 mb-0"><?=isset($alert)?$alert:""?></p>
                    </div>

                    <div class="row mb-2">
                        <div class="col">
                            <div class="form-outline">
                                <input type="text" name="username" class="form-control form-control-lg" placeholder="Username" required/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" required/>
                            </div>
                        </div>
                    </div>

                    <div class="form-outline mb-2">
                        <input type="password" name="repassword" class="form-control form-control-lg" placeholder="Confirm Password" required/>
                    </div>

                    <div class="form-outline mb-2">
                        <input type="text" name="fullname" class="form-control form-control-lg" placeholder="Fullname" required/>
                    </div>

                    <div class="form-outline mb-2">
                        <input type="tel" name="mobile" class="form-control form-control-lg" placeholder="Mobile" pattern="(0|\+84\d{9})" required/>
                    </div>

                    <div class="form-outline mb-2">
                        <textarea type="text" name="address" class="form-control form-control-lg" placeholder="Address" required></textarea>
                    </div>

                    <div class="form-outline mb-2">
                        <input type="email" name="email" class="form-control form-control-lg" placeholder="Email" required/>
                    </div>

                    <div class="form-check mb-3">
                        <input class="form-check-input me-2" type="checkbox" value="" required/>
                        <label class="form-check-label">
                            I agree to the terms and conditions
                        </label>
                    </div>

                    <div class="text-center mt-4">
                        <input type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;" value="Register">
                        <p class="small fw-bold mt-2 mb-0">Already have an account? <a href="?option=login" class="link-danger">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
