<?php
    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $products = $connect->query("select * from orderdetail where productid=$id");
        if (mysqli_num_rows($products)!=0){
            $connect->query("update products set status=0 where id=$id");
        }else{
            $connect->query("delete from products where id=$id");
            unlink("../images/".$_GET['image']);
        }
    }
?>
<?php
$query = "select * from products";
$result = $connect->query($query);
?>
<div class="container">
    <h1 class="mt-4 mb-4">DANH SÁCH SẢN PHẨM</h1>
    <section class="text-center mb-4">
        <a href="?option=productadd" class="btn btn-success">Thêm sản phẩm</a>
    </section>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>STT</th>
            <th>ID</th>
            <th>Tên</th>
            <th>Giá</th>
            <th>Ảnh</th>
            <th>Trạng thái</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php $count = 1; ?>
        <?php foreach ($result as $item): ?>
            <tr>
                <td><?= $count++; ?></td>
                <td><?= $item['id'] ?></td>
                <td><?= $item['name'] ?></td>
                <td><?= number_format($item['price'], 0, ',', '.') ?></td>
                <td width="30%"><img src="../images/<?= $item['image'] ?>" width="20%" alt="Product Image"></td>
                <td><?= $item['status'] == 1 ? 'Active' : 'Unactive' ?></td>
                <td>
                    <a class="btn btn-sm btn-info" href="?option=productupdate&id=<?= $item['id'] ?>">Update</a>
                    <a class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')" href="?option=product&id=<?= $item['id'] ?>&image=<?= $item['image'] ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>


