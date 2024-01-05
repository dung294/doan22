<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem các khóa tồn tại trong mảng $_POST hay không
    $name = isset($_POST["name"]) ? $_POST["name"] : "";
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $message = isset($_POST["messenger"]) ? $_POST["messenger"] : "";

    // Thực hiện các thao tác xử lý dữ liệu
    $query = "INSERT INTO lienhe(name, email, messenger) VALUES ('$name', '$email', '$message')";
    $connect->query($query);

    echo "<script>alert('Thông tin liên hệ của bạn đã được gửi thành công!');</script>";
}
?>

<main class="main">
    <div class="container">
        <h3>Gửi tin nhắn cho chúng tôi</h3>
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-md-6">
                        <form method="post">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Tên*">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Email*">
                            </div>
<!--                            <div class="form-group">-->
<!--                                <input type="text" class="form-control" placeholder="Điện thoại*">-->
<!--                            </div>-->
                            <div class="form-group">
                                <textarea class="form-control" name="messenger" placeholder="Nội dung tin nhắn"></textarea>
                            </div>
                            <input type="submit" class="btn btn-primary form-control" value="Gửi liên hệ">
                        </form>
                    </div>
                    <div class="col-md-6">
                        <div class="item">
                            <div class="info">
                                <i class="fa fa-map-marker"></i>
                                <div>
                                    <label>Địa chỉ liên hệ</label><br>
                                    <a>Xã Thạch Trị, Huyện Thạch Hà, Tĩnh Hà Tĩnh</a>
                                </div>


                            </div>
                            <div class="info">
                                <i class="fa fa-phone"></i>
                                <div>
                                    <label>Mrs Hường</label><br>
                                    <a href="tel:0943810958">0943810958</a>
                                </div>

                            </div>
                            <div class="info">
                                <i class="fa fa-phone"></i>
                                <div>
                                    <label>Mr Ninh</label><br>
                                    <a href="tel:0977430569">0977430569</a>
                                </div>
                            </div>
                            <div class="info">
                                <i class="fa fa-envelope"></i>
                                <div>
                                    <label>Email</label><br>
                                    <a href="mailto:dungff38@gmail.com">dungff38@gmail.com</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 bando">
                <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d4513.264069278034!2d105.97846090240914!3d18.358347766004606!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTjCsDIxJzI2LjAiTiAxMDXCsDU4JzQ3LjciRQ!5e1!3m2!1svi!2s!4v1685213186782!5m2!1svi!2s" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>

    </div>
</main>