<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once(__DIR__ . '/layout/header.php'); ?>
    <title>Admin</title>

</head>
<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // 1
    $sql_prd  = "SELECT COUNT(*) as 'count' FROM `prdchill` WHERE 1;";
    $sql_bill  = "SELECT COUNT(*) as 'count' FROM `bill` WHERE 1;";
    $sql_bill_chuathanhtoan  = "SELECT COUNT(*) as 'count' FROM `bill` WHERE `status` = 0";
    $sql_cat  = "SELECT COUNT(*) as 'count' FROM `category` WHERE 1;";
    $sql_DoanhThu  = "SELECT SUM(total) as 'count' FROM `bill` WHERE MONTH(`bill`.`date`) = MONTH(NOW()) and `status` = 1";


    $prd = $db->fetchOne($sql_prd);
    $bill = $db->fetchOne($sql_bill);
    $bill_chuathanhtoan = $db->fetchOne($sql_bill_chuathanhtoan);
    $cat = $db->fetchOne($sql_cat);
    $DoanhThu = $db->fetchOne($sql_DoanhThu);

    //2

    $state = 0;
    $sql_char1;
    if(isset($_GET['i'])){
        $state = $_GET['i'];
    }
    if($state == 0){
        $sql_char1 = "SELECT SUM(total) as `total`,DAY(date) as 'time'  FROM `bill` WHERE MONTH(`date`) = MONTH(NOW()) GROUP BY DAY(date) ";
    }else{
        $sql_char1 = "SELECT SUM(total) as `total`,MONTH(date) as 'time'  FROM `bill` GROUP BY MONTH(date)";
    }
    $char1 = $db->fetchAll($sql_char1);
    $lableChar1 = [];
    $dataChar1 = [];
    foreach ($char1 as $item) {
        $lableChar1[] = $item['time'];
        $dataChar1[] = $item['total'];
    }
    //3
    $sql_prdTop = "SELECT `product`.`name` as 'name1', `prdchill`.`name` as 'name2', SUM(`billinfor`.`qty`) as 'qty' FROM `bill`, `billinfor`, `product`, `prdchill` WHERE `bill`.`id` = `billinfor`.`billID` and `billinfor`.`prdChillID` = `prdchill`.`id` AND  `product`.`id` = `prdchill`.`prdID`\n"

    . "and MONTH(date) = 12\n"

    . "GROUP BY `prdchill`.`id`  \n"
    . "ORDER BY `qty` DESC LIMIT 5;";
    $prdTop = $db->fetchAll($sql_prdTop);
    //4 account
    $sql_acc = "SELECT * FROM `account` LIMIT 4";
    $account = $db->fetchAll($sql_acc);
    

}


?>

<body>
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <?php require_once(__DIR__ . '/layout/nav_header.php') ?>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <?php require_once(__DIR__ . '/layout/side_bar.php') ?>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="container-fluid mt-3">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-1">
                            <div class="card-body">
                                <h3 class="card-title text-white">Sản Phẩm</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"><?php echo $bill['count'] ?></h2>
                                    <p class="text-white mb-0"></p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-laptop"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-2">
                            <div class="card-body">
                                <h3 class="card-title text-white">Hóa Đơn</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"><?php echo $bill['count'] ?></h2>
                                    <p class="text-white mb-0">Chưa Thanh Toán <?php echo $bill_chuathanhtoan['count'] ?></p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-3">
                            <div class="card-body">
                                <h3 class="card-title text-white">Doanh Thu Tháng</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"><?php echo number_format($DoanhThu['count']) ?></h2>
                                    <p class="text-white mb-0">VND</p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-4">
                            <div class="card-body">
                                <h3 class="card-title text-white">Danh Mục</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"><?php echo $cat['count'] ?></h2>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-heart"></i></span>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body pb-0 d-flex justify-content-between">
                                        <div>
                                            <h4 class="mb-1">Doanh Thu Theo Tháng</h4>
                                            <h3 class="m-0"><?php echo number_format($DoanhThu['count']) ?> VND</h3>
                                            <p>Tính theo doanh thu cao nhất</p>
                                        </div>
                                        <div>
                                            <ul>
                                                <li class="d-inline-block mr-3"><a class="text-dark" href="./index.php?i=0">Ngày</a></li>
                                                <li class="d-inline-block mr-3"><a class="text-dark" href="./index.php?i=1">Tháng</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="chart-wrapper">
                                        <canvas id="chart_widget_2"></canvas>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div class="w-100 mr-2">
                                                <h6>Doanh Thu</h6>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="active-member">
                                    <div class="table-responsive">
                                        <h4>Top 5 Sản Phẩm Bán Chạy Trong Tháng</h4>
                                        <table class="table table-xs mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Tên SP</th>
                                                    <th></th>
                                                    <th>Số Lượng</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($prdTop as $item) : ?>
                                                <tr>
                                                    <td><?php echo $item['name1'] ?></td>
                                                    <td><?php echo $item['name2'] ?></td>
                                                    <td><?php echo $item['qty'] ?></td>
                                                    
                                                </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row justify-content-center">
                    <?php foreach ($account as $item) : ?>
                        <div class="col-lg-3 col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-center">
                                        <img src="<?php echo $base_url . $item['avatarImg'] ?>" width="100" height="100" class="rounded-circle" alt="">
                                        <h5 class="mt-3 mb-1"><?php echo $item['displayName'] ?></h5>
                                        <p class="m-0">email</p>
                                        <!-- <a href="javascript:void()" class="btn btn-sm btn-warning">Send Message</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>

                </div>


                <div class="row">
                    <div class="col-lg-4 col-sm-6">
                        <div class="card">
                            <div class="social-graph-wrapper widget-facebook">
                                <span class="s-icon"><i class="fa fa-facebook"></i></span>
                            </div>
                            <div class="row">
                                <div class="col-6 border-right">
                                    <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                        <h4 class="m-1">89k</h4>
                                        <p class="m-0">Friends</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                        <h4 class="m-1">119k</h4>
                                        <p class="m-0">Followers</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6">
                        <div class="card">
                            <div class="social-graph-wrapper widget-googleplus">
                                <span class="s-icon"><i class="fa fa-instagram"></i></span>
                            </div>
                            <div class="row">
                                <div class="col-6 border-right">
                                    <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                        <h4 class="m-1">89k</h4>
                                        <p class="m-0">Friends</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                        <h4 class="m-1">119k</h4>
                                        <p class="m-0">Followers</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="card">
                            <div class="social-graph-wrapper widget-twitter">
                                <span class="s-icon"><i class="fa fa-twitter"></i></span>
                            </div>
                            <div class="row">
                                <div class="col-6 border-right">
                                    <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                        <h4 class="m-1">89k</h4>
                                        <p class="m-0">Friends</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                        <h4 class="m-1">119k</h4>
                                        <p class="m-0">Followers</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <!-- <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; Designed & Developed by <a href="https://themeforest.net/user/quixlab">Quixlab</a> 2018</p>
            </div>
        </div> -->
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <?php require_once(__DIR__ . '/layout/script.php') ?>

</body>

<!-- Chartjs -->
<script src=" <?php echo $base_url ?>public/admin/plugins/chart.js/Chart.bundle.min.js"></script>
<!-- Circle progress -->
<script src=" <?php echo $base_url ?>public/admin/plugins/circle-progress/circle-progress.min.js"></script>
<!-- Datamap -->
<script src=" <?php echo $base_url ?>public/admin/plugins/d3v3/index.js"></script>
<script src=" <?php echo $base_url ?>public/admin/plugins/topojson/topojson.min.js"></script>
<script src=" <?php echo $base_url ?>public/admin/plugins/datamaps/datamaps.world.min.js"></script>
<!-- Morrisjs -->
<script src=" <?php echo $base_url ?>public/admin/plugins/raphael/raphael.min.js"></script>
<script src=" <?php echo $base_url ?>public/admin/plugins/morris/morris.min.js"></script>
<!-- Pignose Calender -->
<script src=" <?php echo $base_url ?>public/admin/plugins/moment/moment.min.js"></script>
<script src=" <?php echo $base_url ?>public/admin/plugins/pg-calendar/js/pignose.calendar.min.js"></script>
<!-- ChartistJS -->
<script src=" <?php echo $base_url ?>public/admin/plugins/chartist/js/chartist.min.js"></script>
<script src=" <?php echo $base_url ?>public/admin/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>



<script>
    (function($) {
        "use strict"


        $('#todo_list').slimscroll({
            position: "right",
            size: "5px",
            height: "250px",
            color: "transparent"
        });

        $('#activity').slimscroll({
            position: "right",
            size: "5px",
            height: "390px",
            color: "transparent"
        });





    })(jQuery);

    let lable = <?php echo json_encode($lableChar1) ?>;
    let data = <?php echo json_encode($dataChar1) ?>;

    (function($) {
        "use strict"

        let ctx = document.getElementById("chart_widget_2");
        ctx.height = 280;
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: lable,
                type: 'line',
                defaultFontFamily: 'Montserrat',
                datasets: [{
                    data: data,
                    label: "Doanh Thu",
                    backgroundColor: '#847DFA',
                    borderColor: '#847DFA',
                    borderWidth: 0.5,
                    pointStyle: 'circle',
                    pointRadius: 5,
                    pointBorderColor: 'transparent',
                    pointBackgroundColor: '#847DFA',
                }]
            },
            options: {
                responsive: !0,
                maintainAspectRatio: false,
                tooltips: {
                    mode: 'index',
                    titleFontSize: 12,
                    titleFontColor: '#000',
                    bodyFontColor: '#000',
                    backgroundColor: '#fff',
                    titleFontFamily: 'Montserrat',
                    bodyFontFamily: 'Montserrat',
                    cornerRadius: 3,
                    intersect: false,
                },
                legend: {
                    display: false,
                    position: 'top',
                    labels: {
                        usePointStyle: true,
                        fontFamily: 'Montserrat',
                    },


                },
                scales: {
                    xAxes: [{
                        display: false,
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        scaleLabel: {
                            display: false,
                            labelString: 'Month'
                        }
                    }],
                    yAxes: [{
                        display: false,
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        scaleLabel: {
                            display: true,
                            labelString: 'Value'
                        }
                    }]
                },
                title: {
                    display: false,
                }
            }
        });





    })(jQuery);
</script>


</html>