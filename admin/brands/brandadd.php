<?php
    if (isset($_POST['name'])){
        $name = $_POST['name'];
        $query = "select * from brands where name='$name'";
        if (mysqli_num_rows($connect->query($query))!=0){
            $alert = "Đã tồn tại hàng này";
        }else{
            $status = $_POST['status'];
            $query = "insert brands(name,status) values('$name','$status')";
            $connect->query($query);
            header("Location: ?option=brand");
        }
    }
?>
<h1>THÊM HÃNG SẢN PHẨM</h1>
<section style="text-align: center"><?=isset($alert)?$alert:''?></section>
<section class=" container col-md-6">
    <form method="post">
        <section class="form-group">
            <label>Tên hãng</label>
            <input name="name" class="form-control">
        </section>
        <section class="form-group">
            <label>Trạng thái hãng:</label><br>
            <input type="radio" name="status" value="1" checked> Active
            <input type="radio" name="status" value="0"> Unactive
        </section>
        <section>
            <input type="submit" value="Thêm" class="btn btn-success">
            <a href="?option=brand" class="btn btn-outline-secondary">< < Back</a>
        </section>
    </form>

</section>
