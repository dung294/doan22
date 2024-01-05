<?php
    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $products = $connect->query("select * from products where brandid=$id");
        if (mysqli_num_rows($products)!=0){
            $connect->query("update brands set status=0 where id=$id");
        }else{
            $connect->query("delete from brands where id=$id");
        }
    }
?>
<?php
    $query = "select * from brands";
    $result = $connect->query($query);
?>
<div class="container">
<h1 class="mt-4 mb-4">HÃNG SẢN XUẤT</h1>
<section class="text-center mb-4"><a href="?option=brandadd" class="btn btn-success">Thêm hãng</a> </section>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>STT</th>
            <th>Mã hàng</th>
            <th>Tên hãng</th>
            <th>Trạng thái hãng</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $count= 1; ?>
        <?php foreach ($result as $item):?>
            <tr>
                <td><?=$count++;?></td>
                <td><?=$item['id']?></td>
                <td><?=$item['name']?></td>
                <td><?=$item['status']==1?'Active':'Unactive'?></td>
                <td>
                    <a class="btn btn-sm btn-info " href="?option=brandupdate&id=<?=$item['id']?>">Update</a>
                    <a class="btn btn-sm btn-danger" onclick="return confirm(Are you sure?)" href="?option=brand&id=<?=$item['id']?>">Delete</a>
                </td>
            </tr>
        <?php endforeach;?>
    </tbody>
</table>

