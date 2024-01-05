<!--<h1>ĐĂNG NHẬP TRANG QUẢN TRỊ</h1>-->
    <section><?=isset($alert)?$alert:''?></section>
<div class="wrapper">
    <div class="logo">
        <img src="../images/huni1.png" alt="">
    </div>
    <div class="text-center mt-4 name">
        Đăng nhập trang admin
    </div>
    <form method="post" class="p-3 mt-3">
        <div class="form-field d-flex align-items-center">
            <span class="far fa-user"></span>
            <input name="username" placeholder="Username">
        </div>
        <div class="form-field d-flex align-items-center">
            <span class="fas fa-key"></span>
            <input type="password" name="password" placeholder="Password">
        </div>
        <input type="submit" value="Đăng nhập" class="btn mt-3">
    </form>
</div>