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
                    header("#");
                    ?>
                </ul>
               <ul class="navbar-nav">
                 --><?php
                       //顯示會員
                       session_start();
                       echo "
                           <li class='nav-item dropdown'>
                               <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown'>
                                   歡迎".$_SESSION['name']."
                                   </a>
                               <ul class='dropdown-menu' >
                                   <li>
                                       <a class='dropdown-item'  href='accountadjust.php' >我的帳戶</a>
                                       <a class='dropdown-item' href='dindan.php'>購買清單</a>
                                       <a class='dropdown-item' href='destroy.php'>登出</a>
                                   </li>
                               </ul>
                          </li>
               </li></a></ul>";
                       ?>

            </div>
        </div>
    </nav>
</header>
<?php
include "test.php";

$adjust = new test();
$adjust->Adjust($_POST['email'], $_POST['pwd'], $_POST['phone'],$_POST['newsex'], $_POST['bd']);
?>
<main>
    <!-- 登入 -->
    <section class="wrap">
        <form class="item_form" method="post" >
            <div class="item">
                <span>信箱</span>
                <input type="text" name="email">
            </div>
            <div class="item">
                <span>密碼</span>
                <input type="password" name="pwd">
            </div>
            <div class="item">
                <span>電話</span>
                <input type="tel" name="phone" pattern="[0-9]{10}">
            </div>
            <div class="item item_radio">
                <span style="margin-right: 50px">性別</span>
                <span style="margin-right: 15px">男<input type="radio" style="width: auto; margin-left: 5px" name="newsex" value="male"></span>
                <span >女<input type="radio" style="width: auto" name="newsex" value="female"></span>
            </div>
            <div class="item">
                <span>生日</span>
                <input type="date" name="bd"">
            </div>
            <div class="item item_button">
                <button type="submit">更改/新增</button>
            </div>
        </form>
    </section>
</main>
</body>

</html>

