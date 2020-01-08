<?php
require_once('../is_login.php');
require_once('../../function/connection.php');
$query = $db->query("SELECT * FROM news Order By published_at DESC");
$news = $query->fetchALL(PDO::FETCH_ASSOC);
$total_Rows = count($news);

?>

<!DOCTYPE html>
<html>

<head>
  <?php include_once('../layouts/head.php'); ?>
  
</head>

<body>
  <?php include_once('../layouts/nav.php'); ?>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="">最新消息管理</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"> <a href="../news/list.php"><i class="fa fa-home"></i>主控台</a> </li>
            
          </ul>
          <div class="col-md-12 utility" style="margin-bottom:20px;">
            <a class="btn btn-outline-primary" href="create.php">新增一筆</a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <table class="table">

            <thead>
              <tr>
                <th scope="col">發布日期</th>
                <th scope="col">圖片</th>
                <th scope="col">標題</th>
                <th scope="col">管理</th>
              </tr>
            </thead>
            <tbody>
            <?php if($total_Rows > 0){ ?>
              <?php foreach($news as $data){ ?>
              <tr>          
                <td><?php echo $data['published_at']; ?></td>
                <td><img src="../../uploads/news/<?php echo $data['picture']; ?>" width="200" alt=""></td>
                <td><?php echo $data['title']; ?></td>
                <td>
                  <a class="btn btn-primary" href="update.php?newsID=<?php echo $data['newsID']; ?>">編輯</a>
                  <a class="btn btn-outline-primary" href="delete.php?newsID=<?php echo $data['newsID']; ?>" onclick="if(!confirm('是否確定刪除此筆資料?刪除後無法回復')){return false;};">刪除</a>
                </td>
              </tr>
              <?php } ?>
            <?php }else{ ?>
              <tr>
                <td colspan="3">目前無資料，請新增一筆</td>
              </tr>
            <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <?php include_once('../layouts/footer.php'); ?>
</body>

</html>