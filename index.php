<?php session_start(); ?>
<?php
$connect = new MySQLi('localhost','root','','webv2');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Website</title>
    <link rel="stylesheet" type="text/css" href="CSS/css.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
<section class="wrapper">
    <header><?php include "views/layout/header.php"?></header>
    <nav><?php include "views/layout/menu_top.php";?></nav>                                                                                                                            `                                                                                                                                                                                                                                                                                                                    
    <section class="body container-fluid pt-5 row">
        <aside class="col-lg-3 col-md-12">
            <div class="col-12"><?php include "views/layout/Left.php";?></div>
            <div class="col-12"><?php include "views/layout/Right.php";?></div>
        </aside>
        <article class="col-lg-9 col-md-12">
            <?php include "views/layout/article.php";?>
        </article>

    </section>
    <footer><?php include "views/layout/footer.php";?></footer>
</section>
<script>
    function updateRangeValue(value) {
        // Format the number with commas and display it in the span
        document.getElementById('max').innerHTML = Number(value).toLocaleString('en-US');
    }
</script>
<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>

</body>
</html>
