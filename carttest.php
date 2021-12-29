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
    <style>
        p{
            margin: 5px 0;
        }
        .cart-total{
            display: flex;
            justify-content: center;
        }
        .cart-total p{
            margin-right: 30px;
            text-align: right;
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
</header>

<main class="container">
    <form method="POST">
        <div class="cart">
            <?php
            include "test.php";
            $cart = new test();

            $cart->Cart($_SESSION['name']);

            if($_POST['123'] == "delete")
            {
                $cart->Cart($_SESSION['name'], "delete", $_POST['p_id']);
                $_POST['123']=null;
                $_POST['p_id']=null;
                echo "<script>window.location='carttest.php'</script>";
            }
            ?>
        </div>
        <div class="cart-total">
            <div>
                <p>總計： $1072</p>
            </div>
            <div>
                <button type="submit" class="btn btn-danger">去買單</button>
            </div>
        </div>
    </form>



</main>

</body>

</html>

