<?php $product = mysqli_fetch_array($connect->query("select * from products where id=".$_GET['id']));?>
<?php
if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $query = "select * from products where name='$name' and id!=" . $product['id'];
    if (mysqli_num_rows($connect->query($query)) != 0) {
        $alert = "Đã tồn tại sản phẩm này rồi";
    } else {
        $brandid = $_POST['brandid'];
        $price = $_POST['price'];
        $discription = $_POST['discription'];
        $status = $_POST['status'];
        //xử lý phần ảnh
            $store = "../images/";
            $imageName = $_FILES['image']['name'];
            $imageTemp = $_FILES['image']['tmp_name'];
            $exp3 = substr($imageName, strlen($imageName) - 3);
            $exp4 = substr($imageName, strlen($imageName) - 4);
            if ($exp3 == 'jpg' || $exp3 == 'png' || $exp3 == 'gmp') {
                $imageName = time() . '_' . $imageName;
                move_uploaded_file($imageTemp, $store . $imageName);
                unlink($store . $product['image']);
            }else {
                $alert = "File đã chọn không phải file ảnh!";
            }
            if (empty($imageName)) {
                $imageName = $product['image'];
            }
            ///////////////////
            $connect->query("update products set brandid='$brandid',name='$name',price='$price',image='$imageName',discription='$discription',status='$status' where id=" . $product['id']);
            header("Location: ?option=product");
        }
    }
?>

<?php
$brands = $connect->query("select * from brands");
?>
<h1>UPDATE SẢN PHẨM</h1>
<section style="text-align: center"><?=isset($alert)?$alert:''?></section>
<section class=" container col-md-6">
    <form method="post" enctype="multipart/form-data">
        <section class="form-group">
            <label>Hãng:</label>
            <select name="brandid" class="form-control">
                <option hidden>--Chọn hãng--</option>
                <?php foreach ($brands as $item):?>
                    <option value="<?=$item['id']?>" <?=$item['id']==$product['brandid']?'selected':''?>><?=$item['name']?></option>
                <?php endforeach;?>
            </select>
        </section>
        <section class="form-group">
            <label>Tên sản phẩm</label>
            <input name="name" class="form-control" required value="<?=$product['name']?>">
        </section>
        <section class="form-group">
            <label>Giá:</label>
            <input name="price" type="number" min="100000" class="form-control" required value="<?=$product['price']?>">
        </section>
        <section class="form-group">
            <label>Ảnh:</label><br>
            <img src="../images/<?=$product['image']?>" width="70%">
            <input type="file" name="image" class="form-control">
        </section>
        <section class="form-group">
            <label>Mô tả:</label>
            <textarea name="discription" id="discription"><?=$product['discription']?></textarea>
            <script>
                CKEDITOR.replace("discription");
            </script>
        </section>
        <section class="form-group">
            <label>Trạng thái:</label><br>
            <input type="radio" name="status" value="1" <?=$product['status']==1?'checked':''?>> Active
            <input type="radio" name="status" value="0" <?=$product['status']==0?'checked':''?>> Unactive
        </section>
        <section>
            <input type="submit" value="Update" class="btn btn-success">
            <a href="?option=product" class="btn btn-outline-secondary">< < Back</a>
        </section>
    </form>

</section>
