<?php
    $query = "select * from member where username='".$_SESSION['member']."'";
    $member = mysqli_fetch_array($connect->query($query));
?>
<?php
    if (isset($_POST['name'])){
        $name = $_POST['name'];
        $mobile = $_POST['mobile'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $note = $_POST['note'];
        $ordermethodid = $_POST['ordermethodid'];
        $memberid = $member['id'];
        $query = "insert orders (ordermethodid,memberid,name,address,mobile,email,note) values ($ordermethodid,$memberid,'$name','$address','$mobile','$email','$note')";
        $connect->query($query);
        $query= "select id from orders order by id desc limit 1";
        $orderid = mysqli_fetch_array($connect->query($query))['id'];
        foreach($_SESSION['cart'] as $key=>$values){
            $productid = $key;
            $number = $values;
            $query = "select price from products where id=$key";
            //lấy bản ghi
            $price = mysqli_fetch_array($connect->query($query))['price'];
            $query = "insert orderdetail values ($productid,$orderid,$number,$price)";
            $connect->query($query);

        }
        unset($_SESSION['cart']);
        header("location: ?option=ordersuccess");
    }
?>
<div class="container mt-5">
    <h1 class="mb-4">Đặt hàng</h1>
    <form method="post">
        <h2>Thông tin người nhận hàng</h2>
        <div class="form-group">
            <label for="name">Họ tên:</label>
            <input type="text" class="form-control" id="name" name="name" value="<?=$member['fullname']?>" required>
        </div>
        <div class="form-group">
            <label for="mobile">Điện thoại:</label>
            <input type="tel" class="form-control" id="mobile" name="mobile" value="<?=$member['mobile']?>" required>
        </div>
        <div class="form-group">
            <label for="address">Địa chỉ:</label>
            <textarea class="form-control" id="address" name="address" rows="3" required><?=$member['address']?></textarea>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="<?=$member['email']?>" required>
        </div>
        <div class="form-group">
            <label for="note">Ghi chú:</label>
            <textarea class="form-control" id="note" name="note" rows="3"></textarea>
        </div>

        <h2>Chọn phương thức thanh toán</h2>
        <?php
        $query = "SELECT * FROM ordermethod WHERE status";
        $result = $connect->query($query);
        ?>
        <div class="form-group">
            <select class="form-control" name="ordermethodid">
                <?php foreach ($result as $item):?>
                    <option value="<?=$item['id'];?>"><?=$item['name'];?></option>
                <?php endforeach;?>
            </select>
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Đặt hàng">
        </div>
    </form>
</div>