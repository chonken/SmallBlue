<!DOCTYPE html>
<html lang="en">
<head>
    <title>小藍網購</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Latest compiled and minified CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- Latest compiled JavaScript -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script> -->

    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <!-- bootstrap js -->
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- style -->
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
<header>
    <!-- 導覽 -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="javascript:void(0)">小藍網購</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0)">通知</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0)">賣場</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0)">賣家中心</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class='nav-item'>
                        <form method='POST'>
                            <div class='input-group'>
                                <input type='text' class='form-control' placeholder='搜尋' name='search'>
                                <button class='btn btn-dark' type='submit'>Go</button>
                            </div>
                        </form>
                    </li>
                    <?php
                    //跳轉搜尋
                    if($_POST['search'] != null)
                        header("Location: search.php?search=".$_POST['search']);
                    ?>
                </ul>
                <ul class="navbar-nav">
                    <?php
                    //顯示會員
                    session_start();
                    if($_SESSION['name'] == null)
                        echo "<li class='nav-item'><a class='nav-link' href='login.php'>會員登入</a></li>";
                    else
                    {
                        echo "
                            <li class='nav-item dropdown'>
                                <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                                    歡迎".$_SESSION['name']."
                                </a>
                                <ul class='dropdown-menu'>
                                    <li>
                                        <a class='dropdown-item' href='accountadjust.php'>我的帳戶</a>
                                        <a class='dropdown-item' href='dindan.php'>購買清單</a>
                                        <a class='dropdown-item' href='destroy.php'>登出</a>
                                    </li>
                                </ul>
                            </li>
                            ";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- 輪播 -->
    <div id="advertisement" class="carousel slide container" data-bs-ride="carousel">

        <div class="carousel-indicators">
            <button type="button" data-bs-target="#advertisement" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#advertisement" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#advertisement" data-bs-slide-to="2"></button>
            <button type="button" data-bs-target="#advertisement" data-bs-slide-to="3"></button>
        </div>

        <div class="carousel-inner">
            <div class="carousel-item bg-secondary active">
                <img class="d-block" src="images/廣告1.png">
            </div>
            <div class="carousel-item bg-secondary">
                <img class="d-block" src="images/test1.jfif">
            </div>
            <div class="carousel-item bg-secondary">
                <img class="d-block" src="images/test2.jfif">
            </div>
            <div class="carousel-item bg-secondary">
                <img class="d-block" src="images/test3.jfif">
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#advertisement" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#advertisement" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

</header>

<main class="container">
    <!-- 工具欄 -->
    <article>
        <!-- 常用連結 -->
<!--        <section class="row">-->
<!--            <div id="btn" class="col-lg-2 d-block">-->
<!--                <img class="d-block" src="images/shopping%20cart.png">-->
<!--                <p>已完成訂單</p>-->
<!--            </div>-->
<!--            <div id="btn" class="col-lg-2 d-block">-->
<!--                <img class="d-block" src="images/shopping%20cart.png">-->
<!--                <p>待出貨</p>-->
<!--            </div>-->
<!--            <div id="btn" class="col-lg-2 d-block">-->
<!--                <img class="d-block" src="images/shopping%20cart.png">-->
<!--                <p>待取貨</p>-->
<!--            </div>-->
<!--            <div id="btn" class="col-lg-2 d-block">-->
<!--                <img class="d-block" src="images/shopping%20cart.png">-->
<!--                <p>退貨</p>-->
<!--            </div>-->
<!--            <div id="btn" class="col-lg-2 d-block">-->
<!--                <img class="d-block" src="images/shopping%20cart.png">-->
<!--                <p>取消訂單</p>-->
<!--            </div>-->
<!--            <div id="btn" class="col-lg-2 d-block">-->
<!--                <img class="d-block" src="images/shopping%20cart.png">-->
<!--                <p>優惠券</p>-->
<!--            </div>-->
<!--        </section>-->

    </article>

    <!-- 推薦商品(個人化) -->
    <article>
        <h2 class="my-4">推薦商品</h2>
        <section class="row">
            <?php
            include "test.php";

            $aaa=new test();
            $aaa->HistorySearch();
            ?>
        </section>
    </article>

    <!-- 分類 -->
    <article>
        <h3 id="category" class="my-4">分類</h3>
        <section class="row">
            <div id="btn" class="col-lg-2 d-block">
                <img class="d-block" src="images/shopping%20cart.png">
                <p>生活</p>
            </div>
            <div id="btn" class="col-lg-2 d-block">
                <img class="d-block" src="images/shopping%20cart.png">
                <p>服飾</p>
            </div>
            <div id="btn" class="col-lg-2 d-block">
                <img class="d-block" src="images/shopping%20cart.png">
                <p>娛樂</p>
            </div>
            <div id="btn" class="col-lg-2 d-block">
                <img class="d-block" src="images/shopping%20cart.png">
                <p>3C</p>
            </div>
            <div id="btn" class="col-lg-2 d-block">
                <img class="d-block" src="images/shopping%20cart.png">
                <p>遊戲</p>
            </div>
            <div id="btn" class="col-lg-2 d-block">
                <img class="d-block" src="images/shopping%20cart.png">
                <p>家電</p>
            </div>
        </section>

    </article>

    <!-- 暢銷/最新商品 -->
    <article>
        <h2 class="my-4">暢銷商品</h2>
        <section class="row">
            <div class="col-lg-2 col-sm-6">
                <div class="card">
                    <div class="card-img">
                        <img class="card-img-top" src="images/顧客關係.jfif" alt="HyperX Alloy Origins.png">
                    </div>
                    <div class="card-body">
                        <p class="card-text">【現貨】顧客關係管理【現貨】顧客關係管理</p>
                        <span>$200</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-6">
                <div class="card">
                    <div class="card-img">
                        <img class="card-img-top" src="images/顧客關係.jfif" alt="HyperX Alloy Origins.png">
                    </div>
                    <div class="card-body">
                        <p class="card-text">【現貨】顧客關係管理【現貨】顧客關係管理</p>
                        <span>$200</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-6">
                <div class="card">
                    <div class="card-img">
                        <img class="card-img-top" src="images/顧客關係.jfif" alt="HyperX Alloy Origins.png">
                    </div>
                    <div class="card-body">
                        <p class="card-text">【現貨】顧客關係管理【現貨】顧客關係管理</p>
                        <span>$200</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-6">
                <div class="card">
                    <div class="card-img">
                        <img class="card-img-top" src="images/顧客關係.jfif" alt="HyperX Alloy Origins.png">
                    </div>
                    <div class="card-body">
                        <p class="card-text">【現貨】顧客關係管理【現貨】顧客關係管理</p>
                        <span>$200</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-6">
                <div class="card">
                    <div class="card-img">
                        <img class="card-img-top" src="images/顧客關係.jfif" alt="HyperX Alloy Origins.png">
                    </div>
                    <div class="card-body">
                        <p class="card-text">【現貨】顧客關係管理【現貨】顧客關係管理</p>
                        <span>$200</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-6">
                <div class="card">
                    <div class="card-img">
                        <img class="card-img-top" src="images/顧客關係.jfif" alt="HyperX Alloy Origins.png">
                    </div>
                    <div class="card-body">
                        <p class="card-text">【現貨】顧客關係管理【現貨】顧客關係管理</p>
                        <span>$200</span>
                    </div>
                </div>
            </div>
        </section>

        <h2 class="my-4">最新商品</h2>
        <section class="row">
            <div class="col-lg-2 col-sm-6">
                <div class="card">
                    <div class="card-img">
                        <img class="card-img-top" src="images/顧客關係.jfif" alt="HyperX Alloy Origins.png">
                    </div>
                    <div class="card-body">
                        <p class="card-text">【現貨】顧客關係管理【現貨】顧客關係管理</p>
                        <span>$200</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-6">
                <div class="card">
                    <div class="card-img">
                        <img class="card-img-top" src="images/顧客關係.jfif" alt="HyperX Alloy Origins.png">
                    </div>
                    <div class="card-body">
                        <p class="card-text">【現貨】顧客關係管理【現貨】顧客關係管理</p>
                        <span>$200</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-6">
                <div class="card">
                    <div class="card-img">
                        <img class="card-img-top" src="images/顧客關係.jfif" alt="HyperX Alloy Origins.png">
                    </div>
                    <div class="card-body">
                        <p class="card-text">【現貨】顧客關係管理【現貨】顧客關係管理</p>
                        <span>$200</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-6">
                <div class="card">
                    <div class="card-img">
                        <img class="card-img-top" src="images/顧客關係.jfif" alt="HyperX Alloy Origins.png">
                    </div>
                    <div class="card-body">
                        <p class="card-text">【現貨】顧客關係管理【現貨】顧客關係管理</p>
                        <span>$200</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-6">
                <div class="card">
                    <div class="card-img">
                        <img class="card-img-top" src="images/顧客關係.jfif" alt="HyperX Alloy Origins.png">
                    </div>
                    <div class="card-body">
                        <p class="card-text">【現貨】顧客關係管理【現貨】顧客關係管理</p>
                        <span>$200</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-6">
                <div class="card">
                    <div class="card-img">
                        <img class="card-img-top" src="images/顧客關係.jfif" alt="HyperX Alloy Origins.png">
                    </div>
                    <div class="card-body">
                        <p class="card-text">【現貨】顧客關係管理【現貨】顧客關係管理</p>
                        <span>$200</span>
                    </div>
                </div>
            </div>
        </section>
    </article>
</main>

<footer class="py-5 bg-dark">
    <div class="container">

    </div>
</footer>

</body>

</html>