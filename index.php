<?php require_once 'db/database.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP ~ Practice</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Header -->
    <?php include_once 'includes/header.php';?>
    <!-- Content Area -->
    <div class="main">
        <section class="slider">
            <ul class="slide owl-carousel">
                <li><img src="img/slide1.jpg" alt=""></li>
                <li><img src="img/slide2.jpg" alt=""></li>
                <!-- <li><img src="img/slide3.jpg" alt=""></li> -->
            </ul>
        </section>
        <section class="featured">
            <h5 class="txt-center msg"></h5>
            <div class="grid-boxes">
                <?php 
                $sql = $db->query('SELECT * FROM `user`');

                if(mysqli_num_rows($sql)> 0){
                while($row = mysqli_fetch_object($sql)):
                    
                ?>
                <div class="item">
                <span class="close">x</span>
                    <a href="javascript:;">
                        <h3 contenteditable='true' data-id="<?=$row->id?>"><?=$row->username?></h3>
                    </a>
                </div>
                <?php endwhile; } else {echo '<h3 class="txt-center g-12">No Data.</h3>';}?>
            </div>
        </section>
    </div>

    <?php include_once 'includes/footer.php';?>
</body>
</html>