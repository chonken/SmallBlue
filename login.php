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
                    header("#");
                    ?>
                </ul>
                <ul class="navbar-nav">
                    <?php
                    //顯示會員
                    echo "<li class='nav-item'><a class='nav-link' href='login.php'>";
                    session_start();
                    if($_SESSION['name'] == null)
                        echo "會員登入</li></a>";
                    else
                    {
                        echo "歡迎".$_SESSION['name']."</li></a>";
                        //跳destroy.php執行session destroy
                        echo "<li class='nav-item'><a class='nav-link' href='destroy.php'>登出</a></li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
</header>

<main>
    <!-- 登入 -->
    <section class="wrap">
        <form class="item_form" method="post">
            <div class="item">
                <span>使用者名稱</span>
                <input type="text" name="name">
            </div>
            <div class="item">
                <span>密碼</span>
                <input type="password" name="pwd">
            </div>
            <div class="item item_button">
                <button type="submit">登入</button>
                <a href="register.php">註冊</a>
            </div>
        </form>
        <?php
        include "test.php";

        $login = new test();
        $login->Login($_POST['name'], $_POST['pwd']);
        ?>
    </section>
</main>

</body>

</html>

