<?php
$sql = "SELECT * FROM category";
$category = $db->fetchAll($sql);
?>

<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>All departments</span>
                    </div>
                    <ul style="display: none;">
                        <?php foreach ($category as $item) : ?>
                            <li style="list-style-position:inside; white-space: nowrap;  overflow: hidden; text-overflow: ellipsis; ">
                                <a href="./category.php?category=<?php echo $item['slug']?>"><?php echo $item['name'] . ' - ' . $item['description'] ?></a>
                            </li>
                        <?php endforeach ?>

                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="./search.php" method="GET">
                            <div class="hero__search__categories">
                                All Categories
                                <span class="arrow_carrot-down"></span>
                            </div>
                            <input type="text" name="name" placeholder="Tìm Tên Sản Phẩm">
                            <button type="submit" class="site-btn">SEARCH</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>0927015206</h5>
                            <span>support 24/7 time</span>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>