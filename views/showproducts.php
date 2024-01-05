<?php
    $option = 'home';
    $query="select * from products where status=1";
    if (isset($_GET['brandid'])){
        $query .=" and brandid=".$_GET['brandid'];
        $option = 'showproducts&brandid='.$_GET['brandid'];
    }
    elseif (isset($_GET['keyword'])) {
        $query .=" and name like'%" . $_GET['keyword'] . "%'";
        $option = 'showproducts&keyword='.$_GET['keyword'];
    }
    elseif (isset($_GET['range'])){
        $query .=" and price<=".$_GET['range'];
        $option = 'showproducts&range='.$_GET['range'];
    }

    //$page: xem các sp ở trang số bao nhiêu
    $page = 1;
    if (isset($_GET['page'])){
        $page = $_GET['page'];
    }
    //luwu lại sp muốn
//    số lượng sản phẩm mỗi trang
    $productsperpage = 3;
    //lấy các sản phẩm bắt đầu từ chỉ số bao nhiêu trong bảng (0 là bắt từ bansr ghi đầu tiên)
    $from = ($page-1) * $productsperpage;
    //lấy tổng số sản phẩm
    $totalProducts = $connect->query($query);
    //tính tổng số trang có được
    $totalPages = ceil(mysqli_num_rows($totalProducts)/$productsperpage);
    //lấy các sp ở trang hiện thời
    $query.=" limit $from,$productsperpage";
    $result = $connect->query($query);

?>
<div class=" showproducts container-fluid pt-5">
    <div class="row px-xl-5 pb-3">
        <?php foreach ($result as $item):?>
        <h2></h2>
            <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class=" card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class=" img-fluid w-100" src="images/<?=$item['image']?>" alt="">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="name text-truncate mb-3"><?=$item['name']?></h6>
                        <div class=" d-flex justify-content-center">
                            <h6><?=number_format($item['price'],0,',','.')?></h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="?option=productdetail&id=<?=$item['id']?>" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                        <!--                        <input class="btn btn-sm text-dark p-0" type="button" value="Đặt mua">-->
                        <a onclick="location='?option=cart&action=add&id=<?=$item['id']?>';" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Đặt hàng</a>
                    </div>
                </div>
            </div>

        <?php endforeach;?>
        <div class="col-12 pb-1">
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <li class="page-item <?=(empty($_GET['page']) && $i == 1) || (isset($_GET['page']) && $_GET['page'] == $i) ? 'active' : '' ?>">
                            <a class="page-link" href="?option=<?=$option?>&page=<?=$i?>"><?=$i?></a>
                        </li>
                    <?php endfor;?>
                </ul>
            </nav>
        </div>

    </div>
</div>