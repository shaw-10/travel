<?php
session_start();
require_once('../function/connection.php');
$sql= "INSERT INTO customer_orders (memberID, status, order_no, order_date, name, phone, address, total, shipping, pay_method, receive_method, created_at) VALUES (:memberID, :status, :order_no, :order_date, :name, :phone, :address, :total, :shipping, :pay_method, :receive_method, :created_at)";

if($_SESSION['order']['delivery'] == 1){
    $receive_method = "宅配";
}else if($_SESSION['order']['delivery'] == 2){
    $receive_method = "超商取貨付款";
}else{
    $receive_method = "貨到付款";
}

$sth = $db ->prepare($sql);
$sth ->bindParam(":memberID", $_SESSION['member']['memberID'], PDO::PARAM_INT);
$sth ->bindParam(":status", $_POST['status'], PDO::PARAM_INT);
$sth ->bindParam(":order_no", $_POST['order_no'], PDO::PARAM_STR);
$sth ->bindParam(":order_date", $_POST['order_date'], PDO::PARAM_STR);
$sth ->bindParam(":name", $_SESSION['order']['name'], PDO::PARAM_STR);
$sth ->bindParam(":phone", $_SESSION['order']['phone'], PDO::PARAM_STR);
$sth ->bindParam(":address", $_SESSION['order']['address'], PDO::PARAM_STR);
$sth ->bindParam(":total", $_SESSION['order']['total_price'], PDO::PARAM_STR);
$sth ->bindParam(":shipping", $_SESSION['order']['delivery'], PDO::PARAM_STR);
$sth ->bindParam(":pay_method", $_SESSION['order']['payment'], PDO::PARAM_STR);
$sth ->bindParam(":receive_method", $receive_method, PDO::PARAM_STR);
$sth ->bindParam(":created_at", $_POST['created_at'], PDO::PARAM_STR);
$sth ->execute();

$query = $db ->query("SELECT * FROM customer_orders Order BY created_at DESC");
$latest_order = $query ->fetch(PDO::FETCH_ASSOC);

for($i = 0; $i < count($_SESSION['Cart']); $i++){ 
    $sql2= "INSERT INTO order_details  (customer_orderID, productID, picture, name, price, quantity, created_at) VALUES (:customer_orderID, :productID, :picture, :name, :price, :quantity, :created_at)";
    $sth2 = $db ->prepare($sql2);
    $sth2 ->bindParam(":customer_orderID", $latest_order['customer_orderID'], PDO::PARAM_INT);
    $sth2 ->bindParam(":productID", $_SESSION['Cart'][$i]['product_id'], PDO::PARAM_INT);
    $sth2 ->bindParam(":picture", $_SESSION['Cart'][$i]['pic'], PDO::PARAM_STR);
    $sth2 ->bindParam(":name", $_SESSION['Cart'][$i]['product_name'], PDO::PARAM_STR);
    $sth2 ->bindParam(":price", $_SESSION['Cart'][$i]['price'], PDO::PARAM_STR);
    $sth2 ->bindParam(":quantity", $_SESSION['Cart'][$i]['quantity'], PDO::PARAM_STR);
    $sth2 ->bindParam(":created_at", $latest_order['created_at'], PDO::PARAM_STR); 
    $sth2 ->execute();

}
// 記得寫入完成後要清空購物車
unset($_SESSION['Cart']);

?>

<!doctype html>
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>Login / Registration || Hurst</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<?php require_once('template/head.php'); ?>
		
	</head>
	<body>
<?php require_once('template/nav.php'); ?>
    <!-- *** NAVBAR END *** -->

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">

                    <ul class="breadcrumb">
                        
                    </ul>
                    <div class="container-fluid">
                    <div class="row" id="error-page">
                        <div class="col-md-6 col-sm-6 col-xs-12 text-center" style="margin:auto;float: none;">
                            <div class="customer-login" style="margin: 0 0 50px;">

                                <p class="text-life">
                                    <img src="../img/logo/logo.png" alt="Cake House template">
                                    </p>
                              
                              <h3>結帳成功</h3>
                              
                              <p class="text-center">您已成功完成購物，您可前往</p>
                            <a href="order.php" class="button-one submit-button mt-15">我的訂單</a>
                            </div>
                        </div>
                    </div>
                    </div>


                </div>
                <!-- /.col-md-9 -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


        <?php require_once('template/footer.php'); ?>



</body>
</html>
