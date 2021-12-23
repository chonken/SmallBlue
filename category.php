<!DOCTYPE html>
<html lang="en">
<head>
    <title>小藍網購</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <!-- bootstrap js -->
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- style -->
    <style>
        footer{
            margin-top: 50px;
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

    </style>

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
                <ul class="navbar-nav me-auto">
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
                <ul class="navbar-nav ml-auto">
                    <?php

                    //顯示會員
                    echo "<li class='nav-item'><a class='nav-link' href='#' data-toggle='modal' data-target='#myLogin'>";
                    session_start();
                    if($_SESSION['uid'] == null)
                        echo "會員登入</li></a>";
                    else
                    {
                        echo "歡迎".$_SESSION['uid']."</li></a>";
                        //跳destroy.php執行session destroy
                        echo "<li class='nav-item'><a class='nav-link' href='destroy.php'>登出</a></li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>

</header>

<main class="container">

    <form method='GET'>
        <div class="input-group mb-3 mt-3">
            <input type="text" class="form-control" placeholder="搜尋" name="category">
            <button class="btn btn-secondary" type="submit">Go</button>
        </div>

        <?php
        include "test.php";

        if($_GET['category'] != null){
            echo "<h4>".$_GET['category']." 的搜尋結果</h4>";
        }

        $SearchResults = new test();
        $SearchResults->Category($_GET['category']);
        ?>

    </form>

</main>

<footer class="fixed-bottom py-5 bg-dark">
    <div class="container">

    </div>
</footer>

</body>



