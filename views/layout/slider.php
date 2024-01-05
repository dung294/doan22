<?php
ob_start(); // Start output buffering
// Rest of your code
?>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>

    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="images/yphung.jpg" class="d-block w-100 img-fluid" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Chim yến phụng</h5>
                <p>Một trong những loài chim dễ thương và đáng yêu</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="images/choe1.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Chim chích chòe</h5>
                <p>Loài chim có một giọng hót rất thánh thót và rất véo von nhẹ nhàng</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="images/hoami1.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Chim họa mi</h5>
                <p>Đây là loài có giọng hót hay cùng một bộ lông sặc sỡ màu sắc</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="images/vkuyen.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Chim vành khuyên</h5>
                <p>Một trong những loài chim đẹp và quyến rũ</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="images/chaomao.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Chim chào mào bạch tạng</h5>
                <p>Một trong những loài chim đáng yêu và sơ hữu bộ lông trắng quý hiếm</p>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<div>
    <img src="images/backr.jpg" class="img-fluid" alt="Responsive image">
</div>
<div class="container-fluid pt-5">
    <div class="row px-xl-5 pb-3">
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">Quality Product</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                <h5 class="font-weight-semi-bold m-0">Free Shipping</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">14-Day Return</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
            </div>
        </div>
    </div>
</div>