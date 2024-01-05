<?php
ob_start(); // Start output buffering
// Rest of your code
?>
<section class="mb-4">
    <h5 class="mb-3">Tìm theo giá</h5>
    <div class="border p-4">
    <form>
        <input type="hidden" name="option" value="showproducts">
        <div class="mb-3">
            <label for="range" class="form-label">Chọn mức giá:</label>
            <input type="range" class="form-range" id="range" name="range" min="100000" max="10000000" step="10000" oninput="updateRangeValue(this.value)" value="<?= isset($_GET['range']) ? $_GET['range'] : "" ?>">
        </div>
        <div class="mb-3">
            <label for="max" class="form-label">Mức giá hiện tại: <span id="max"><?= isset($_GET['range']) ? number_format($_GET['range'], 0, ',', '.') : "" ?></span></label>
        </div>
        <button type="submit" class="btn btn-primary">Tìm kiếm</button>
    </form>
    </div>
</section>
