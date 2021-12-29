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

    //3
    $sql_acc = "SELECT * FROM `account` LIMIT 4";
    $account = $db->fetchAll($sql_acc);
    //4

    //5
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
                                            <p>Tính theo doanh thu cao nhất</p>
                                            <h3 class="m-0">@ViewBag.Max</h3>
                                        </div>
                                        <div>
                                            
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

                    <!--  -->
                    <div class="col-lg-12 col-md-12">

                        <div class="card">
                            <div class="chart-wrapper mb-4">
                                <div class="px-4 pt-4 d-flex justify-content-between">
                                    <div>
                                        <h4>Sales Activities</h4>
                                        <p>Last 6 Month</p>
                                    </div>
                                    <div>
                                        <span><i class="fa fa-caret-up text-success"></i></span>
                                        <h4 class="d-inline-block text-success">720</h4>
                                        <p class=" text-danger">+120.5(5.0%)</p>
                                    </div>
                                </div>
                                <div>
                                    <canvas id="chart_widget_3"></canvas>
                                </div>
                            </div>
                            <div class="card-body border-top pt-4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <ul>
                                            <li>5% Negative Feedback</li>
                                            <li>95% Positive Feedback</li>
                                        </ul>

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
                                        <table class="table table-xs mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Customers</th>
                                                    <th>Product</th>
                                                    <th>Country</th>
                                                    <th>Status</th>
                                                    <th>Payment Method</th>
                                                    <th>Activity</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><img src="./images/avatar/1.jpg" class=" rounded-circle mr-3" alt="">Sarah Smith</td>
                                                    <td>iPhone X</td>
                                                    <td>
                                                        <span>United States</span>
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <div class="progress" style="height: 6px">
                                                                <div class="progress-bar bg-success" style="width: 50%"></div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><i class="fa fa-circle-o text-success  mr-2"></i> Paid</td>
                                                    <td>
                                                        <span>Last Login</span>
                                                        <span class="m-0 pl-3">10 sec ago</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><img src="./images/avatar/2.jpg" class=" rounded-circle mr-3" alt="">Walter R.</td>
                                                    <td>Pixel 2</td>
                                                    <td><span>Canada</span></td>
                                                    <td>
                                                        <div>
                                                            <div class="progress" style="height: 6px">
                                                                <div class="progress-bar bg-success" style="width: 50%"></div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><i class="fa fa-circle-o text-success  mr-2"></i> Paid</td>
                                                    <td>
                                                        <span>Last Login</span>
                                                        <span class="m-0 pl-3">50 sec ago</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><img src="./images/avatar/3.jpg" class=" rounded-circle mr-3" alt="">Andrew D.</td>
                                                    <td>OnePlus</td>
                                                    <td><span>Germany</span></td>
                                                    <td>
                                                        <div>
                                                            <div class="progress" style="height: 6px">
                                                                <div class="progress-bar bg-warning" style="width: 50%"></div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><i class="fa fa-circle-o text-warning  mr-2"></i> Pending</td>
                                                    <td>
                                                        <span>Last Login</span>
                                                        <span class="m-0 pl-3">10 sec ago</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><img src="./images/avatar/6.jpg" class=" rounded-circle mr-3" alt=""> Megan S.</td>
                                                    <td>Galaxy</td>
                                                    <td><span>Japan</span></td>
                                                    <td>
                                                        <div>
                                                            <div class="progress" style="height: 6px">
                                                                <div class="progress-bar bg-success" style="width: 50%"></div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><i class="fa fa-circle-o text-success  mr-2"></i> Paid</td>
                                                    <td>
                                                        <span>Last Login</span>
                                                        <span class="m-0 pl-3">10 sec ago</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><img src="./images/avatar/4.jpg" class=" rounded-circle mr-3" alt=""> Doris R.</td>
                                                    <td>Moto Z2</td>
                                                    <td><span>England</span></td>
                                                    <td>
                                                        <div>
                                                            <div class="progress" style="height: 6px">
                                                                <div class="progress-bar bg-success" style="width: 50%"></div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><i class="fa fa-circle-o text-success  mr-2"></i> Paid</td>
                                                    <td>
                                                        <span>Last Login</span>
                                                        <span class="m-0 pl-3">10 sec ago</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><img src="./images/avatar/5.jpg" class=" rounded-circle mr-3" alt="">Elizabeth W.</td>
                                                    <td>Notebook Asus</td>
                                                    <td><span>China</span></td>
                                                    <td>
                                                        <div>
                                                            <div class="progress" style="height: 6px">
                                                                <div class="progress-bar bg-warning" style="width: 50%"></div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><i class="fa fa-circle-o text-warning  mr-2"></i> Pending</td>
                                                    <td>
                                                        <span>Last Login</span>
                                                        <span class="m-0 pl-3">10 sec ago</span>
                                                    </td>
                                                </tr>
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



    (function($) {
        "use strict"

        let ctx = document.getElementById("chart_widget_2");
        ctx.height = 280;
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["2010", "2011", "2012", "2013", "2014", "2015", "2016"],
                type: 'line',
                defaultFontFamily: 'Montserrat',
                datasets: [{
                    data: [0, 15, 57, 12, 85, 10, 50],
                    label: "iPhone X",
                    backgroundColor: '#847DFA',
                    borderColor: '#847DFA',
                    borderWidth: 0.5,
                    pointStyle: 'circle',
                    pointRadius: 5,
                    pointBorderColor: 'transparent',
                    pointBackgroundColor: '#847DFA',
                }, {
                    label: "Pixel 2",
                    data: [0, 30, 5, 53, 15, 55, 0],
                    backgroundColor: '#F196B0',
                    borderColor: '#F196B0',
                    borderWidth: 0.5,
                    pointStyle: 'circle',
                    pointRadius: 5,
                    pointBorderColor: 'transparent',
                    pointBackgroundColor: '#F196B0',
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

    (function($) {
        "use strict"

        let ctx = document.getElementById("chart_widget_3");
        ctx.height = 130;
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
                type: 'line',
                defaultFontFamily: 'Montserrat',
                datasets: [{
                        data: [0, 15, 57, 12, 85, 10],
                        label: "iPhone X",
                        backgroundColor: 'transparent',
                        borderColor: '#847DFA',
                        borderWidth: 2,
                        pointStyle: 'circle',
                        pointRadius: 5,
                        pointBorderColor: '#847DFA',
                        pointBackgroundColor: '#fff',
                    },
                    {
                        data: [0, 2, 50, 12, 11, 10],
                        label: "VCL X",
                        backgroundColor: 'transparent',
                        borderColor: '#F196B0',
                        borderWidth: 2,
                        pointStyle: 'circle',
                        pointRadius: 5,
                        pointBorderColor: '#F196B0',
                        pointBackgroundColor: '#fff',
                    }
                ]
            },
            options: {
                responsive: !0,
                maintainAspectRatio: true,
                tooltips: {
                    mode: 'index',
                    titleFontSize: 12,
                    titleFontColor: '#fff',
                    bodyFontColor: '#fff',
                    backgroundColor: '#000',
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