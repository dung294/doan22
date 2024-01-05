<?php
    $query = "select * from lienhe";
    $result = $connect->query($query);
?>
<div class="container">
    <h1 class="mt-4 mb-4">TIN NHẮN PHẢN HỒI</h1>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>STT</th>
            <th>ID</th>
            <th>Tên</th>
            <th>Email</th>
            <th>Tin nhắn phản hồi</th>
        </tr>
        </thead>
        <tbody>
        <?php $count = 1; ?>
        <?php foreach ($result as $item): ?>
            <tr>
                <td><?= $count++; ?></td>
                <td><?= $item['id'] ?></td>
                <td><?= $item['name'] ?></td>
                <td><?= $item['email'] ?></td>
                <td><?= $item['messenger'] ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
