<?php
ob_start(); // Start output buffering
// Rest of your code
?>

<?php
    $chuaXuLy = mysqli_num_rows($connect->query("select * from orders where status=1"));
    $daXuLy = mysqli_num_rows($connect->query("select * from orders where status=2"));
    $dangXuLy = mysqli_num_rows($connect->query("select * from orders where status=3"));
    $daHuy = mysqli_num_rows($connect->query("select * from orders where status=4"));
?>

<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0" style="background-color: #343a40">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">Menu</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li>
                        <a href="?option=brand" class="nav-link px-0 align-middle">
                            <i class="fas fa-industry"></i> <span class="ms-1 d-none d-sm-inline">Loại sản phẩm</span></a>
                    </li>
                    <li>
                        <a href="?option=product" class="nav-link px-0 align-middle">
                            <i class="fas fa-box"></i> <span class="ms-1 d-none d-sm-inline">Sản phẩm</span></a>
                    </li>
                    <li>
                        <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                            <i class="fas fa-shopping-cart"></i> <span class="ms-1 d-none d-sm-inline">Đơn hàng</span> </a>
                        <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="?option=order&status=1" class="nav-link px-0"> <span class="d-none d-sm-inline text-white">Chưa xử lý </span>[<?=$chuaXuLy?>]</a>
                            </li>
                            <li>
                                <a href="?option=order&status=2" class="nav-link px-0"> <span class="d-none d-sm-inline">Đang xử lý </span>[<?=$dangXuLy?>]</a>
                            </li>
                            <li>
                                <a href="?option=order&status=3" class="nav-link px-0"> <span class="d-none d-sm-inline">Đã xử lý </span>[<?=$daXuLy?>]</a>
                            </li>
                            <li>
                                <a href="?option=order&status=4" class="nav-link px-0"> <span class="d-none d-sm-inline">Đã hủy </span>[<?=$daHuy?>]</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="?option=messenger" class="nav-link px-0 align-middle">
                            <i class="fas fa-message"></i> <span class="ms-1 d-none d-sm-inline">Tin nhắn phản hồi</span></a>
                    </li>
<!--                    <li>-->
<!--                        <a href="#" class="nav-link px-0 align-middle">-->
<!--                            <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Customers</span> </a>-->
<!--                    </li>-->
                </ul>
                <hr>
                <div class="dropdown pb-4">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
                        <span class="d-none d-sm-inline mx-1"><?=$_SESSION['admin']?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow">

                        <li><a class="dropdown-item" href="?option=logout">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col py-3">

            <?php
            if (isset($_GET['option'])){
                switch ($_GET['option']){
                    case'logout':
                        unset($_SESSION['admin']);
                        header("Location: .");
                        break;
                    case 'brand':
                        include "brands/showbrands.php";
                        break;
                    case 'brandadd':
                        include "brands/brandadd.php";
                        break;
                    case 'brandupdate':
                        include "brands/brandupdate.php";
                        break;
                    case 'product':
                        include "products/showproducts.php";
                        break;
                    case 'productadd':
                        include "products/productadd.php";
                        break;
                    case 'productupdate':
                        include "products/productupdate.php";
                        break;
                    case 'order':
                        include "order/showorders.php";
                        break;
                    case 'orderdetail':
                        include "order/orderdetail.php";
                        break;
                    case 'messenger':
                        include "mess/showmess.php";
                        break;
                }
            }
            ?>
        </div>
    </div>
</div>
