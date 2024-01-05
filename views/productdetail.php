<?php
    if (isset($_POST['content'])):
        $content = $_POST['content'];
        $productid = $_GET['id'];
        if (isset($_SESSION['member'])):
            $memberid = mysqli_fetch_array($connect->query("select * from member where username='".$_SESSION['member']."'"));
            $memberid = $memberid['id'];
            $connect->query("insert comments(memberid,productid,date,content) values($memberid,$productid,now(),'$content')");
            echo "<script>alert('Bỉnh luận của bạn đã được thực hiện!')</script>";
        else:
            $_SESSION['content'] = $content;
            echo "<script>alert('Bạn càn phải đăng nhập để bình luận');location='?option=signin&productid=$productid';</script>";
        endif;
    endif;
?>
<?php
    $id = $_GET['id'];
    $query = "select * from products where id=$id";
    $result=$connect->query($query);
    //chuyển đổi mảng một chiều, nạp thành phần vào
    $item = mysqli_fetch_array($result);
?>
<h1>Chi tiết sản phẩm</h1>
<div class="row">
    <div class="col-lg-5 pb-5">
        <div class="border">
            <!-- Chèn hình ảnh vào đây -->
            <img src="images/<?=$item['image']?>" alt="" class="img-fluid w-100">
        </div>
    </div>

    <div class="col-lg-7 pb-5">
        <h3 class="font-weight-semi-bold"><?=$item['name']?></h3>
        <h3 class="font-weight-semi-bold mb-4" ><?=number_format($item['price'],0,',','.')?> đ</h3>
        <p class="mb-4"><?=$item['discription']?></p>
        <div class="d-flex align-items-center mb-4 pt-2">
            <button class="btn btn-primary px-3" onclick="location='?option=cart&action=add&id=<?=$item['id']?>';"><i class="fa fa-shopping-cart mr-1"></i> Add To Cart</button>
        </div>
    </div>
</div>
<hr>

<section>
    <h2>Bình luận:</h2>

    <?php
    $comments = $connect->query("select * from member a join comments b on a.id=b.memberid join products c on b.productid=c.id where b.status and productid=" . $_GET['id']);
    if (mysqli_num_rows($comments) == 0):
        echo "<div class='alert alert-info'>No comments!</div>";
    else:
        foreach ($comments as $comment):
            ?>
            <div class="media mt-4 border p-3">
                <div class="media-body">
                    <h5 class="font-weight-bold"><?= $comment['username']; ?></h5>
                    <p class="pl-4"><?= $comment['content'] ?></p>
                </div>
            </div>

        <?php
        endforeach;
    endif;
    ?>

    <form method="post" class="mt-4">
        <div class="form-group">
            <label for="commentInput">Bình luận của bạn:</label>
            <textarea name="content" id="commentInput" class="form-control" rows="5" placeholder="Viết bình luận ở đây..."></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Gửi</button>
    </form>
</section>
