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
    <section class="wrap">
        <form class="item_form" method="post" enctype="multipart/form-data">
            <div class="item">
                <span>使用者名稱</span>
                <input type="text" class="" name="name">
            </div>
            <div class="item">
                <span>密碼</span>
                <input type="password" class="" name="pwd">
            </div>
            <div class="item">
                <span>電話</span>
                <input type="tel" class="" name="phone" pattern="[0-9]{10}" required>
            </div>
            <div class="item item_radio">
                <span style="margin-right: 50px">性別</span>
                <span style="margin-right: 15px">男<input type="radio" style="width: auto; margin-left: 5px" name="sex" value="male"></span>
                <span >女<input type="radio" style="width: auto" name="sex" value="female"></span>
            </div>
            <div class="item">
                <button type="submit">註冊</button>
            </div>
        </form>
        <?php
        include "test.php";

        $register = new test();
        $register->Register($_POST['name'], $_POST['pwd'], $_POST['phone'], $_POST['sex']);
        ?>
    </section>

</main>

</body>

</html>