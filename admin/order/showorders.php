<?php
    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $connect->query("delete from orderdetail where orderid=$id");
        $connect->query("delete from orders where id=$id");
        header("Location: ?option=order&status=4");
    }
?>

<?php
$status = $_GET['status'];
$query = "select * from orders where status=".$_GET['status'];
$result = $connect->query($query);
?>
<div class="container mt-4">
    <div class="mt-4 mb-5">
        <h1>DANH SÁCH ĐƠN HÀNG</h1>
        <span class="custombg"><?= $status == 1 ? 'Chưa xử lý' : ($status == 2 ? 'Đang xử lý' : ($status == 3 ? 'Đã xử lý' : 'HỦY')) ?></p>
    </div>
    <table class="table table-bordered">
        <thead class="thead-dark">
        <tr>
            <th>STT</th>
            <th>ID</th>
            <th>Ngày tạo</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php $count = 1; ?>
        <?php foreach ($result as $item) : ?>
            <tr>
                <td><?= $count++; ?></td>
                <td><?= $item['id'] ?></td>
                <td><?= $item['orderdate'] ?></td>
                <td>
                    <a class="btn btn-sm btn-info" href="?option=orderdetail&id=<?= $item['id'] ?>">Detail</a>
                    <a style="display: <?= $status == 4 ? '' : 'none' ?>" href="?option=product&id=<?= $item['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>