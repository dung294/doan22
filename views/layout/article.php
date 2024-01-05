<?php
if(isset($_GET['option'])){
    switch ($_GET['option']){
        case 'ordersuccess':
            include "views/ordersuccess.php";
            break;
        case 'order':
            include "views/order.php";
            break;
        case 'cart':
            include "views/cart.php";
            break;
        case 'showproducts':
            include"views/showproducts.php";
            break;
        case 'productdetail':
            include "views/productdetail.php";
            break;
        case 'home':
            include"views/home.php";
            break;
        case 'signin':
            include"views/signin.php";
            break;
        case 'logout':
            unset($_SESSION['member']);
            header("location: ?option=home");
            break;
        case 'register':
            include"views/register.php";
            break;
        case 'contact':
            include "views/contact.php";
            break;
        case 'gioithieu':
            include "views/gioithieu.php";
            break;
    }
}else{
    include"views/home.php";
}
?>
