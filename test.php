<?php

class test
{
    private $result;
    private $fetch_all;
    private $fetch_array;

    public function DBLink_Query($sql, $fetch = null)
    {// ( 輸入SQL語法, [選擇要fetch_all 還是fetch_array] )
        $db_link = mysqli_connect("127.0.0.1", "root", "ABC1283570", "enterprise") or die("資料庫連結失敗");
        mysqli_query($db_link, $sql);

        if($fetch == "fetch_all")
        {//回傳所有行(row)和列(column)的資料，Array[][]
            $this->result = mysqli_query($db_link, $sql);
            $this->fetch_all = mysqli_fetch_all($this->result, MYSQLI_ASSOC);//默認是數字
        }elseif ($fetch == "fetch_array")
        {//擷取一行(row)的資料，再次擷取會是第二行資料以此類推，Array[]
            $this->result = mysqli_query($db_link, $sql);
            $this->fetch_array = mysqli_fetch_array($this->result);
        }
    }

    public function SearchResults_SaveHistory($search)
    {
        if($search!=null)
        {
            //搜尋結果
            $this->DBLink_Query("SELECT * FROM `product` WHERE p_name LIKE '%$search%'", "fetch_all");
            if($this->fetch_all == null)
                echo "查無結果";
            else
            {
                echo "<h2>$search 的查詢結果</h2>";
                echo "<div class='row'>";
                foreach ($this->fetch_all as $item)
                {
                    echo"
                        <div class='col-lg-2 col-sm-6'>
                            <div class='card'>
                                <div class='card-img'>
                                    <img class='card-img-top' src='./images/".$item['p_image']."' alt='".$item['p_image']."'>
                                </div>
                                <div class='card-body'>
                                    <p class='card-text'>".$item['p_name']."</p>
                                    <span>NT$ '".$item['price']."'</span>
                                    <a href='product-detail.php?p_id=".$item['p_id']."' class='stretched-link'></a>
                                </div>
                            </div>
                        </div>
                        ";
                }
                echo "</div>";
                echo "<hr>";
            }

            //儲存紀錄(類別)
            $save=$this->fetch_all[0]['p_categ'];
            $this->DBLink_Query("INSERT INTO `history`(`id`, `h`) VALUES (1, '$save')");#
        }
    }

    public function Cart($act, $product_id, $customer_id)
    {//add delete display
        //使用購物車
        switch ($act)
        {
            case "add":
                //要新增商品的ID
                $id = $this->DBLink_Query("SELECT `id` FROM `cart` order by id DESC", "fetch_array");
                $id = $this->fetch_array["id"] + 1;

                //新增至購物車
                $this->DBLink_Query("INSERT INTO `cart`(`cart_id`, `p_id`, `id`) VALUES ($id, $product_id, $customer_id)");
                break;
            case "delete":
                $this->DBLink_Query("DELETE FROM `cart` WHERE `p_id` = $product_id");
                break;
            case "display":
                $this->DBLink_Query("SELECT `p_id`, `p_name`, `p_des`, `p_image`, `price` FROM `product`, `cart`, `customer`
                                            WHERE `product`.`p_id` = `cart`.`p_id` AND `customer`.`id` = $customer_id", "fetch_all");
                echo "<div class='row'>";
                foreach ($this->fetch_all as $item)
                {
                    echo"
                        <div class='col-lg-2 col-sm-6'>
                            <div class='card'>
                                <div class='card-img'>
                                    <img class='card-img-top' src='./images/".$item['p_image']."' alt='".$item['p_image']."'>
                                </div>
                                <div class='card-body'>
                                    <p class='card-text'>'".$item['p_name']."'</p>
                                    <span>NT$ '".$item['price']."'</span>
                                    <a href='product-detail.php?p_id=".$item['p_id']."' class='stretched-link'></a>
                                </div>
                            </div>
                        </div>
                        ";
                }
                echo "</div>";
                echo "<hr>";
                break;
        }
    }

    public function Login($name, $pwd)
    {
        session_start();
        if($name != null && $pwd != null)
        {
            $_SESSION['name'] = $name;
            $_SESSION['pwd'] = $pwd;
        }

        //isset: null無設置->false; ""有設置(空值)->true
        if (isset($_SESSION['name'], $_SESSION['pwd']))
        {
            //搜尋帳號密碼是否正確
            $this->DBLink_Query("SELECT * FROM `customer` where c_name ='".$_SESSION['name']."' and c_pword ='".$_SESSION['pwd']."'", fetch_array);

            if(isset($this->fetch_array))
            {
                /* header前面不能有輸出，例如:echo...; header(...); 或者(很重要)，同一頁CSS寫太多，用外部連結CSS就解決了 */
                header("Location: index.php");
            }
            else
            {
                echo "查無此帳號";
                $_SESSION['name'] = null;
                $_SESSION['pwd'] = null;
            }
        }

    }

    public function Register($name, $pwd, $phone, $sex)
    {
        if($name != null && $pwd != null && $phone != null && $sex != null)
        {
            //搜尋帳號是否已被申請
            $this->DBLink_Query("SELECT * FROM `customer` where c_name = '$name'", "fetch_array");

            if ($this->fetch_array == null)
            {
                //自動編號碼
                $this->DBLink_Query("SELECT id FROM `customer` order by id DESC", "fetch_array");
                $id = $this->fetch_array['id'] + 1;
                //註冊
                $this->DBLink_Query("INSERT INTO `customer`(`id`, `c_name`, `c_pword`, `phone`, `sex`, `level`) 
                                VALUES ('$id', '$name', '$pwd', '$phone', '$sex', '0')");

                session_start();
                $_SESSION['name'] = $name;
                $_SESSION['pwd'] = $pwd;
                header("Location: index.php");
            }
            else
            {
                echo "已經有人使用";
            }
        }
    }

    public function Product($act, $name = null, $description = null, $image = null, $category = null, $price = null, $quantity = null)
    {//add
        switch ($act)
        {
            case "add":
                if($name != null && $description != null && $image != null && $category != null && $price != null && $quantity != null)
                {
                    //自動編號碼
                    $this->DBLink_Query("SELECT p_id FROM `product` order by p_id DESC", "fetch_array");
                    $id = $this->fetch_array['p_id'] + 1;

                    //新增商品
                    $this->DBLink_Query("INSERT INTO `product`(`p_id`,`id`,`p_name`,`p_des`,`p_image`,`p_categ`,`price`,`p_quan`) VALUES 
                    ('$id', '1', '$name', '$description', '$image', '$category', '$price', '$quantity')");#
                }
                break;
            case "delete":
                //
                break;
        }

        //display
        $this->DBLink_Query("SELECT * FROM `product` ORDER BY `p_id` DESC", "fetch_all");
        foreach ($this->fetch_all as $item){
            echo "<div class='display-group'>";
            echo "
                        <img src='images/".$item['p_image']."'>
                        <div class='display-item'>
                            <div>
                                <span>產品名稱：".$item['p_name']."</span>
                            </div>
                            <div>
                                <span>產品描述：".$item['p_des']."</span>
                            </div>
                            <div>
                                <span>產品類型：".$item['p_categ']."</span>
                            </div>
                            <div>
                                <span>售價：$".$item['price']."</span>
                            </div>
                            <div>
                                <span>數量：".$item['p_quan']."</span>
                            </div>
                        </div>
                        ";
            echo "</div>";
        }
    }

    public function ProductDetail($p_id){
        $this->DBLink_Query("SELECT * FROM `product` WHERE p_id='$p_id'", "fetch_array");

        $prise=round($this->fetch_array['price']*4/3);
        echo "
            <section class='product'>
                <div class='product-pic'>
                    <img src='images/".$this->fetch_array['p_image']."'>
                </div>
    
                <div class='product-detail'>
                    <h1>".$this->fetch_array['p_name']."</h1>
                    <div class='prise'>
                        <span>原價：$$prise</span>
                        <h2>$".$this->fetch_array['price']."</h2>
                    </div>
                    <table>
                    <tr>
                        <td>數量：</td>
                        <td><input type='number' name='quantity' min='0' value='1'></td>
                    </tr>
                    <tr>
                        <td>剩餘數量：</td>
                        <td>".$this->fetch_array['p_quan']."件</td>
                    </tr>
                    </table>
                    <div class='cart'>
                        <a href='#' class=''>加入購物車</a>
                        <a href='#' class=''>直接購買</a>
                    </div>
                </div>
            </section>
    
            <section>
                <p>商品描述：</p>
                <pre>".$this->fetch_array['p_des']."</pre>
            </section>
        ";
    }

    public function Category($category)
    {
        $this->DBLink_Query("SELECT * FROM `product` WHERE p_categ = '$category'", "fetch_all");
        foreach ($this->fetch_all as $item)
        {
            echo "
                <div class='col-lg-2 col-sm-6'>
                    <div class='card'>
                        <div class='card-img'>
                            <img class='card-img-top' src='./images/".$item['p_image']."' alt='".$item['p_image']."'>
                        </div>
                        <div class='card-body'>
                            <p class='card-text'>'".$item['p_name']."'</p>
                            <span>NT$ '".$item['price']."'</span>
                            <a href='product-detail.php?p_id=".$item['p_id']."' class='stretched-link'></a>
                        </div>
                    </div>
                </div>
                  ";

        }
    }

    public function HistorySearch(){
        $this->DBLink_Query("SELECT `h` FROM `history` WHERE id=1", "fetch_array");#
        $category=$this->fetch_array[0];

        $this->DBLink_Query("SELECT `p_id`, `p_name`, `p_image`, `price` FROM `product` WHERE p_categ='$category'", "fetch_all");
        $item=$this->fetch_all;
        for ($i=0; $i<6; $i++)
        {
            if($item[$i]['p_id'] != null)
            {
                echo "
                    <div class='col-lg-2 col-sm-6'>
                        <div class='card'>
                            <div class='card-img'>
                                <img class='card-img-top' src='./images/".$item[$i]['p_image']."' alt='".$item[$i]['p_image']."'>
                            </div>
                            <div class='card-body'>
                                <p class='card-text'>'".$item[$i]['p_name']."'</p>
                                <span>NT$ '".$item[$i]['price']."'</span>
                                <a href='product-detail.php?p_id=".$item[$i]['p_id']."' class='stretched-link'></a>
                            </div>
                        </div>
                    </div>
                    ";
            }
        }
    }
}
/*########
<div class='col-lg-2 col-sm-6'>
    <div class='card'>
        <div class='card-img'>
            <img class='card-img-top' src='./images/".$item['']."' alt='".$item['']."'>
        </div>
        <div class='card-body'>
            <p class='card-text'>'".$item['']."'</p>
            <span>NT$ '".$item['']."'</span>
            <a href='product-detail.php' class='stretched-link'></a>
        </div>
    </div>
</div>
#######*/