<?php
require_once('../function/connection.php');

$sql= "INSERT INTO members  (account, password, name, created_at) VALUES (:account, :password, :name, :created_at)";
  $sth = $db ->prepare($sql);
  $sth ->bindParam(":account", $_POST['account'], PDO::PARAM_STR);
  $sth ->bindParam(":password", $_POST['password'], PDO::PARAM_STR);
  $sth ->bindParam(":name", $_POST['name'], PDO::PARAM_STR);
  $sth ->bindParam(":created_at", $_POST['created_at'], PDO::PARAM_STR);
  $result = $sth ->execute();
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
                                    <img src="../img/logo/logo3.png" alt="Cake House template">
                                </p>
                                <h3>登出成功</h3>
                               

                               
                                <p class="buttons"><a href="shop_f.php" class="button-one submit-button mt-15" data-text="瀏覽商品"><i class="fa fa-home"></i> 瀏覽商品</a>
                                </p>
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
