<?php 
require_once('../is_login.php');
require_once('../../function/connection.php');

if(isset($_POST['AddForm']) && $_POST['AddForm'] == "INSERT"){
  if (!file_exists('../../uploads/products')) {
    mkdir('../../uploads/products', 0755, true);
  }


  
  if(isset($_FILES['picture']['name'])&&$_FILES['picture']['name']!=null){
  $date=date('Ymdhis');//得到當前時間,如;20070705163148
  $filename=$_FILES['picture']['name'];//得到上傳檔案的名字
  $name=explode('.',$filename);//將檔名以'.'分割得到字尾名,得到一個數組
  $newPath=$date.'.'.$name[1];//得到一個新的檔案為'20070705163148.jpg',即新的路徑
  $oldPath=$_FILES['picture']['tmp_name'];//臨時資料夾,即以前的路徑

  $file_path = "../../uploads/products/".$newPath;
  rename($oldPath,$file_path);// 就可以重新命名了! 

    // $filename = $_FILES['picture']['name'];
    // $file_path = "../../uploads/products/".$newPath;
    // move_uploaded_file($_FILES['picture']['tmp_name'], $file_path);
    // echo $file_path;
  }else{
    $filename = null;
  }

  if(isset($_FILES['picture1']['name'])&&$_FILES['picture1']['name']!=null){
    $date1=date('Ymdhis-1');
    $filename1=$_FILES['picture1']['name'];
    $name1=explode('.',$filename1);
    $newPath1=$date1.'.'.$name1[1];
    $oldPath1=$_FILES['picture1']['tmp_name'];
  
    $file_path1 = "../../uploads/products/".$newPath1;
    rename($oldPath1,$file_path1);
  }else{
    $filename1 = null;
  }


  if(isset($_FILES['picture2']['name'])&&$_FILES['picture2']['name']!=null){
    $date2=date('Ymdhis-2');
    $filename2=$_FILES['picture2']['name'];
    $name2=explode('.',$filename2);
    $newPath2=$date2.'.'.$name2[1];
    $oldPath2=$_FILES['picture2']['tmp_name'];
  
    $file_path2 = "../../uploads/products/".$newPath2;
    rename($oldPath2,$file_path2);
  }else{
    $filename2 = null;
  }

  if(isset($_FILES['picture3']['name'])&&$_FILES['picture3']['name']!=null){
    $date3=date('Ymdhis-3');
    $filename3=$_FILES['picture3']['name'];
    $name3=explode('.',$filename3);
    $newPath3=$date3.'.'.$name3[0];
    $oldPath3=$_FILES['picture3']['tmp_name'];
  
    $file_path3 = "../../uploads/products/".$newPath3;
    rename($oldPath3,$file_path3);
  }else{
    $filename3 = null;
  }

  if(isset($_FILES['picture4']['name'])&&$_FILES['picture4']['name']!=null){
    $date4=date('Ymdhis-4');
    $filename4=$_FILES['picture4']['name'];
    $name4=explode('.',$filename4);
    $newPath4=$date4.'.'.$name4[1];
    $oldPath4=$_FILES['picture4']['tmp_name'];
  
    $file_path4 = "../../uploads/products/".$newPath4;
    rename($oldPath4,$file_path4);
  }else{
    $filename4 = null;
  }

  if(isset($_FILES['picture5']['name'])&&$_FILES['picture5']['name']!=null){
    $date5=date('Ymdhis-5');
    $filename5=$_FILES['picture5']['name'];
    $name5=explode('.',$filename5);
    $newPath5=$date5.'.'.$name5[1];
    $oldPath5=$_FILES['picture5']['tmp_name'];
  
    $file_path5 = "../../uploads/products/".$newPath5;
    rename($oldPath5,$file_path5);
  }else{
    $filename5 = null;
  }
  

  $sql= "INSERT INTO products (product_categoryID, picture, picture1, picture2, picture3, picture4, picture5, name, price, description, created_at) VALUES ( :product_categoryID, :picture, :picture1, :picture2, :picture3, :picture4, :picture5, :name, :price, :description, :created_at)";
  $sth = $db ->prepare($sql);
  $sth ->bindParam(":product_categoryID",$_POST['product_categoryID'], PDO::PARAM_STR);
  $sth ->bindParam(":picture", $newPath, PDO::PARAM_STR);
  $sth ->bindParam(":picture1", $newPath1, PDO::PARAM_STR);
  $sth ->bindParam(":picture2", $newPath2, PDO::PARAM_STR);
  $sth ->bindParam(":picture3", $newPath3, PDO::PARAM_STR);
  $sth ->bindParam(":picture4", $newPath4, PDO::PARAM_STR);
  $sth ->bindParam(":picture5", $newPath5, PDO::PARAM_STR);
  $sth ->bindParam(":name", $_POST['name'], PDO::PARAM_STR);
  $sth ->bindParam(":price", $_POST['price'], PDO::PARAM_STR);
  $sth ->bindParam(":description", $_POST['description'], PDO::PARAM_STR);
  $sth ->bindParam(":created_at", $_POST['created_at'], PDO::PARAM_STR);
  $sth ->execute();

   header('Location: list.php?product_categoryID='.$_POST['product_categoryID']);
}
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
          <h1 class="mb-4">產品管理</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"> <a href="news/list.php"><i class="fa fa-home"></i> 主控台</a> </li>
            <li class="breadcrumb-item active"><a href="list.php?product_categoryID=<?php echo $_GET['product_categoryID']; ?>">產品管理</a></li>
            <li class="breadcrumb-item active">新增一筆</li>
          </ul>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 text-right">
          <form id="c_form-h" class="" method="post" action="create.php" enctype="multipart/form-data">
            <div class="form-group row"> <label for="picture" class="col-2 col-form-label">圖片</label>
              <div class="col-10">
                <input type="file" class="form-control-file" id="picture" name="picture"> </div>
            </div>

            <div class="form-group row"> <label for="picture1" class="col-2 col-form-label">圖片1</label>
              <div class="col-10">
                <input type="file" class="form-control-file" id="picture1" name="picture1"> </div>
            </div>

            <div class="form-group row"> <label for="picture2" class="col-2 col-form-label">圖片2</label>
              <div class="col-10">
                <input type="file" class="form-control-file" id="picture2" name="picture2"> </div>
            </div>

            <div class="form-group row"> <label for="picture3" class="col-2 col-form-label">圖片3</label>
              <div class="col-10">
                <input type="file" class="form-control-file" id="picture3" name="picture3"> </div>
            </div>

            <div class="form-group row"> <label for="picture4" class="col-2 col-form-label">圖片4</label>
              <div class="col-10">
                <input type="file" class="form-control-file" id="picture4" name="picture4"> </div>
            </div>

            <div class="form-group row"> <label for="picture5" class="col-2 col-form-label">圖片5</label>
              <div class="col-10">
                <input type="file" class="form-control-file" id="picture5" name="picture5"> </div>
            </div>

            <div class="form-group row"> <label for="name" class="col-2 col-form-label">產品名稱</label>
              <div class="col-10">
                <input type="text" class="form-control" id="name" name="name"> </div>
            </div>
            <div class="form-group row">
              <label for="price" class="col-2 col-form-label">價格</label>
              <div class="col-10">
                <input type="text" class="form-control" id="price" name="price"> </div>
            </div>
            <div class="form-group row">
              <label for="description" class="col-2 col-form-label">產品說明</label>
              <div class="col-10">
                <textarea class="form-control" id="description" name="description"></textarea> 
              </div>
            </div>
            <a class="btn btn-outline-primary" href="list.php?product_categoryID=<?php echo $_GET['product_categoryID']; ?>">回上一頁</a>
            <button type="submit" class="btn btn-primary">確認</button>
            <input type="hidden" name="created_at" value="<?php echo date('Y-m-d H:i:s'); ?>">
            <input type="hidden" name="AddForm" value="INSERT">
            <input type="hidden" name="product_categoryID" value="<?php echo $_GET['product_categoryID']; ?>">
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php include_once('../layouts/footer.php'); ?>
  <script>
  
  tinymce.init({
  selector: 'textarea',
  height: 500,
  menubar: false,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen image imagetools',
    'insertdatetime media table paste code help wordcount'
  ],
  toolbar: 'undo redo | formatselect | ' +
  ' bold italic forecolor backcolor image | alignleft aligncenter ' +
  ' alignright alignjustify | bullist numlist outdent indent |' +
  ' removeformat | help code',
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tiny.cloud/css/codepen.min.css'
  ],
  imagetools_cors_hosts: ['mydomain.com', 'otherdomain.com'],
  imagetools_proxy: 'proxy.php'
});

  </script>
</body>

</html>