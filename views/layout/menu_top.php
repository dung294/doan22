<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="?option=home">
        <img src="images/huni1.png" alt="Logo">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="?option=home">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?option=showproducts">Shop</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?option=cart">Shopping cart</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?option=gioithieu">Giới thiệu</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?option=contact">Liên hệ</a>
            </li>
            <!-- ... Other menu items ... -->
        </ul>
        <ul class="navbar-nav ml-auto">
            <?php if (empty($_SESSION['member'])):?>
                <li class="nav-item">
                    <a class="nav-link" href="?option=signin">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?option=register">Register</a>
                </li>
            <?php else:?>
                <li class="nav-item">
                    <span class="nav-link">Hello: <span style="color: red;"><?=$_SESSION['member']?></span> [<a href="?option=logout">Đăng xuất</a>]</span>
                </li>
            <?php endif;?>
        </ul>
    </div>
</nav>
