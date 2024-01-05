<?php
ob_start(); // Start output buffering
// Rest of your code
?>
<?php
    $query = "select * from brands where status";
    $result = $connect->query($query);
?>
<div class="border-bottom mb-4 pb-4">
    <h5 class="font-weight-semi-bold mb-4">Danh mục</h5>
    <ul class="list-group">
        <?php foreach ($result as $item): ?>
            <li class="list-group-item">
                <a href="?option=showproducts&brandid=<?= $item['id'] ?>">
                    <?= $item['name'] ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
