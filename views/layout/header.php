<section class="d-flex justify-content-between align-items-center p-2">

    <form class="form-inline" autocomplete="off" action="?option=showproducts" method="GET">
        <input type="hidden" name="option" value="showproducts">
        <div class="input-group">
            <input autocomplete="on" type="search" name="keyword" class="form-control" placeholder="Search for products" value="<?= isset($_GET['keyword']) ? $_GET['keyword'] : "" ?>">
            <div class="input-group-append">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-search"></i> Search
                </button>
            </div>
        </div>
    </form>
    <div class="mt-2 mt-md-0 d-none d-md-flex">
        <i class="fa fa-clock mr-2"></i><span class="mr-2"> 7:00 - 18:00</span>
        <i class="fa fa-phone mr-2"></i><a                    href="tel:0384423451"> 0384 423 451</a>
    </div>
</section>
