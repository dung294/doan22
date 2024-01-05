<?php
ob_start(); // Start output buffering
// Rest of your code
?>
<?php
//
if (empty($_SESSION['cart'])){
    $_SESSION['cart']= array();
}
if (isset($_GET['action'])){
    $id = isset($_GET['id'])?$_GET['id']:'';
    switch($_GET['action']){
        case 'add':
            //nếu có thì aray key dùng để check trong mảng có id hay ko
            if (array_key_exists($id, array_keys($_SESSION['cart']))){
                $_SESSION['cart'][$id]++;
            }else{
                $_SESSION['cart'][$id]=1;
            }
            header("location: ?option=cart");
            break;
        case 'delete':
            unset($_SESSION['cart'][$id]);
            break;
        case 'deleteall':
            unset($_SESSION['cart']);
            break;
        case 'update':
            if ($_GET['type']=='asc')
                $_SESSION['cart'][$id]++;
            else
                if ($_SESSION['cart'][$id]>1)
                    $_SESSION['cart'][$id]--;
            header("location: ?option=cart");
            break;
        case 'order':
            if (isset($_SESSION['member'])){
                header("location: ?option=order");
            }else{
                header("location: ?option=signin&order=1");
            }
            break;
    }
}
?>
<section class="cart">
    <?php
    if (!empty($_SESSION['cart'])):
//            $ids= "0";
//            foreach(array_keys($_SESSION['cart']) as $key)
//            //lay cacs id luu vao ids
//            $ids.= ",".$key;
        $ids = implode(',',array_keys($_SESSION['cart']));
        $query = "select * from products where id in($ids)";
        $result = $connect->query($query);
        ?>
        <div class="container-fluid pt-5 row">

            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                    <tr>
                        <th>Products</th>
                        <th>Price (vnđ)</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Remove</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $toTal = 0;
                    foreach ($result as $item):?>
                        <tr>
                            <td class="align-middle"><img src="images/<?=$item['image'];?>" alt="ảnh" style="width: 50px;"><?=$item['name'];?></td>
                            <td class="align-middle"><?=number_format($item['price'],0,',','.')?></td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-minus" onclick="location='?option=cart&action=update&type=desc&id=<?=$item['id']?>';">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <div class="form-control form-control-sm bg-secondary text-center"><?=$_SESSION['cart'][$item['id']]?></div>
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-plus" onclick="location='?option=cart&action=update&type=asc&id=<?=$item['id']?>';">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle"><?=number_format($subTotal=$item['price']*$_SESSION['cart'][$item['id']],0,',','.')?></td>
                            <td class="align-middle"><button class="btn btn-sm btn-primary " onclick="location='?option=cart&action=delete&id=<?=$item['id'];?>'"><i class="fa fa-times"></i></button></td>
                        </tr>
                        <?php
                        $toTal +=$subTotal;
                        $ship =30000;
                        ?>
                    <?php endforeach;?>
                    </tbody>
                </table>
                <div class="text-center mt-4">
                    <button class="btn btn-primary" onclick="if (confirm('Are you sure?'))location='?option=cart&action=deleteall';">DelAll</button>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium"><?=number_format($toTal,0,',','.');?></h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium"><?=$ship?></h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold"><?=number_format($toTal+$ship,0,',','.');?></h5>
                        </div>
                        <button class="btn btn-block btn-primary my-3 py-3" onclick="location='?option=cart&action=order';">Đặt hàng</button>
                    </div>
                </div>
            </div>
        </div>

    <?php
    //nếu koo có sp nào trong giỏ hàng
    else:
        ?>
        <section style="text-align: center; color:red;">Không có sp nào trong giỏ!</section>
    <?php
    endif;
    ?>
</section>

