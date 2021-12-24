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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- style -->
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>

        body{
            background: #FFF7E8;
        }
        main{
            margin: 30px 0;
        }

        .navbar{
            padding: 15px 0;
        }
        /* 修改bootstrap的導覽列 */
        .navbar-expand-sm .navbar-collapse{
            justify-content: space-between;
        }

        .input-group{
            border: 4px solid white;
            width: 600px;
        }

        /* 修改bootstrap的form格式 */
        .form-control{
            border-radius: 0;
        }

        .carousel-item{
            height: 300px;
        }
        .carousel-item > img {
            height: 100%;
            margin: auto;
        }

        #btn{
            margin-top: 50px;
        }
        #btn > img{
            height: 50px;
            max-width: 100%;
            margin: auto;
        }
        #btn > p{
            margin-top: 5px;
            text-align: center;
            /*font-family: 微軟正黑體;*/
            font-size: large;
        }
        #category{
            text-align: center;
        }

        footer{
            margin-top: 50px;
        }

    </style>

</head>

<body>

<header>
    <!-- 導覽 -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">小藍網購</a>
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
                    <?php
                    //搜尋
                    echo "<li class='nav-item'>
                            <form method='POST'>
                                <div class='input-group'>
                                    <input type='text' class='form-control' placeholder='搜尋' name='search'>
                                    <button class='btn btn-dark' type='submit'>Go</button> 
                                </div>
                            </form>
                          </li>";
                    ?>
                </ul>

                <ul class="navbar-nav">
                    <?php
                    //顯示會員
                    echo "<li class='nav-item'><a class='nav-link' href='login.php'>";
                    session_start();
                    echo "
                           <li class='nav-item dropdown'>
                               <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown'>
                                   歡迎".$_SESSION['name']."
                                   </a>
                               <ul class='dropdown-menu' >
                                   <li>
                                       <a class='dropdown-item'  href='accountadjust.php' >編輯我的帳戶</a>
                                       <a class='dropdown-item'  href='accountadjust.php' >查看我的帳戶</a>
                                       <a class='dropdown-item' href='dindan.php'>購買清單</a>
                                       <a class='dropdown-item' href='destroy.php'>登出</a>
                                   </li>
                               </ul>
                          </li>
               </li></a></ul>";
                    ?>
                </ul>
            </div>
        </div>
    </nav>
</header>

<main class="container">
    <article>
        <!-- 常用連結 -->
        <section class="row">
            <div id="btn" class="col-lg-2 d-block">
                <img class="d-block" src="images/shopping%20cart.png">
                <p>已完成訂單</p>
            </div>
            <div id="btn" class="col-lg-2 d-block">
                <img class="d-block" src="images/shopping%20cart.png">
                <p>待出貨</p>
            </div>
            <div id="btn" class="col-lg-2 d-block">
                <img class="d-block" src="images/shopping%20cart.png">
                <p>待取貨</p>
            </div>
            <div id="btn" class="col-lg-2 d-block">
                <img class="d-block" src="images/shopping%20cart.png">
                <p>退貨</p>
            </div>
            <div id="btn" class="col-lg-2 d-block">
                <img class="d-block" src="images/shopping%20cart.png">
                <p>取消訂單</p>
            </div>
            <div id="btn" class="col-lg-2 d-block">
                <img class="d-block" src="images/shopping%20cart.png">
                <p>優惠券</p>
            </div>
        </section>
    </article
    <section class="wrap">
        <?php

        ?>
        <center><font size="25px">目前尚未有訂單</font></center>
    </section>

</main>

</body>

</html>
<?php
