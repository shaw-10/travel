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
                              <?php if($result){ ?> 
                                <?php if(isset($_POST['url']) && $_POST['url'] == 'basket'){ ?>
                                    <script> window.location.href="checkout1.php"</script>
                                <?php }else{ ?>
                                <h3>註冊成功</h3>
                                <h4 class="text-muted">恭喜您加入會員</h4>

                                <p class="text-center">您可前往產品頁面瀏覽商品。<a href="shop.php?category_id=1">前往購物</a></p>
                                <p class="buttons"><a href="../index.php" class="btn btn-primary"><i class="fa fa-home"></i> 回首頁</a>
                                </p>
                                <?php } ?>
                              <?php }else{ ?>
                                <h3>註冊失敗</h3>
                                <h4 class="text-muted">請聯繫客服或前往註冊頁面重新註冊</h4>

                               
                                <p class="buttons"><a href="login.php" class="btn btn-primary"><i class="fa fa-home"></i> 回註冊頁面</a>
                                </p>
                              <?php } ?>
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
