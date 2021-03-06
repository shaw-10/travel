<?php 
require_once('../is_login.php');
require_once('../../function/connection.php');
if(isset($_POST['EditForm']) && $_POST['EditForm'] == "UPDATE"){
  $sql= "UPDATE members SET account=:account, password=:password, name=:name, phone=:phone, email=:email, birthday=:birthday, gender=:gender, zipcode=:zipcode, county=:county,district=:district, address=:address, updated_at=:updated_at WHERE memberID=:memberID";
  
  $sth = $db ->prepare($sql);
  $sth ->bindParam(":account", $_POST['account'], PDO::PARAM_STR);
  $sth ->bindParam(":password", $_POST['password'], PDO::PARAM_STR);
  $sth ->bindParam(":name", $_POST['name'], PDO::PARAM_STR);
  $sth ->bindParam(":phone", $_POST['phone'], PDO::PARAM_STR);
  $sth ->bindParam(":email", $_POST['email'], PDO::PARAM_STR);
  $sth ->bindParam(":birthday", $_POST['birthday'], PDO::PARAM_STR);
  $sth ->bindParam(":gender", $_POST['gender'], PDO::PARAM_STR);
  $sth ->bindParam(":zipcode", $_POST['zipcode'], PDO::PARAM_STR);
  $sth ->bindParam(":county", $_POST['county'], PDO::PARAM_STR);
  $sth ->bindParam(":district", $_POST['district'], PDO::PARAM_STR);
  $sth ->bindParam(":address", $_POST['address'], PDO::PARAM_STR);
  $sth ->bindParam(":updated_at", $_POST['updated_at'], PDO::PARAM_STR);
  $sth ->bindParam(":memberID", $_POST['memberID'], PDO::PARAM_INT);
  $sth ->execute();

  header('Location: list.php');
}else{
  $query = $db->query("SELECT * FROM members WHERE memberID=".$_GET['memberID']);
  $one_members = $query->fetch(PDO::FETCH_ASSOC);
}

?>
<!DOCTYPE html>
<html>

<head>
  <?php include_once('../layouts/head.php'); ?>
  <link rel="stylesheet" href="../../js/jquery-ui/jquery-ui.min.css">
</head>

<body>
<?php include_once('../layouts/nav.php'); ?>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="mb-4">會員管理</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"> <a href="#"><i class="fa fa-home"></i> 主控台</a> </li>
            <li class="breadcrumb-item active">會員管理</li>
            <li class="breadcrumb-item active">編輯</li>
          </ul>
        </div>
      </div>
      <div class="row">
      <div class="col-md-12 text-right">
          <form id="c_form-h" class="" method="post" action="update.php" >
          <div class="form-group row"> <label for="account" class="col-2 col-form-label">帳號</label>
              <div class="col-10">
                <input type="text" readonly unselectable="on" class="form-control" id="account" name="account" value="<?php echo $one_members['account']; ?>"> </div>
            </div>
            <div class="form-group row"> <label for="password" class="col-2 col-form-label">密碼</label>
              <div class="col-10">
                <input type="text" class="form-control" id="password" name="password" value="<?php echo $one_members['password']; ?>"> </div>
            </div>
            <div class="form-group row"> <label for="name" class="col-2 col-form-label">姓名</label>
              <div class="col-10">
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $one_members['name']; ?>"> </div>
            </div>
            <div class="form-group row"> <label for="phone" class="col-2 col-form-label">電話</label>
              <div class="col-10">
                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $one_members['phone']; ?>"> </div>
            </div>
            <div class="form-group row"> <label for="mobile" class="col-2 col-form-label">行動電話</label>
              <div class="col-10">
                <input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $one_members['mobile']; ?>">
              </div>
            </div>
            <div class="form-group row">
              <label for="email" class="col-2 col-form-label">email</label>
              <div class="col-10">
                <input type="text" class="form-control" id="email" name="email" value="<?php echo $one_members['email']; ?>"> </div>
            </div>
            <div class="form-group row">
              <label for="email" class="col-2 col-form-label">性別</label>
              <div class="col-1">
                  <label class="radio-inline"><input type="radio" name="gender" value="1" checked>男</label>
                  <label class="radio-inline"><input type="radio" name="gender" value="0" >女</label>
              </div>
            </div>
            <div class="form-group row">
              <label for="birthday" class="col-2 col-form-label">生日</label>
              <div class="col-10">
                <input type="text" class="form-control" id="birthday" name="birthday" value="<?php echo $one_members['birthday']; ?>"> </div>
            </div>
            
                <div id="twzipcode">
                  <div class="form-group row">
                    <label for="zipcode" class="col-2 col-form-label">郵遞區號</label>
                    <div class="col-1">
                      <input type="text" class="form-control" id="zipcode" name="zipcode" value="<?php echo $one_members['zipcode']; ?>">
                    </div>
                    <label for="county" class="col-form-label">城市</label>
                    <div class="col-4">
                      <select class="form-control" id="county" name="county" value="<?php echo $one_members['county']; ?>"></select>
                    </div>
                    <label for="district" class="col-form-label">地區</label>
                    <div class="col-4">
                    <select class="form-control" id="district" name="district" value="<?php echo $one_members['district']; ?>"></select>
                    </div>
                  </div>
                <div class="form-group row">
                    <label for="address" class="col-2 col-form-label">地址</label>
                    <div class="col-10">
                      <input type="text" class="form-control" id="address" name="address" value="<?php echo $one_members['address']; ?>">
                    </div>
                </div>                  
              </div>
            <a class="btn btn-outline-primary" href="list.php">回上一頁</a>
            <button type="submit" class="btn btn-primary">確認</button>
            <input type="hidden" name="update_at" value="<?php echo date('Y-m-d H:i:s'); ?>">
            <input type="hidden" name="EditForm" value="UPDATE">
            <input type="hidden" name="memberID" value="<?php echo $_GET['memberID']; ?>">
          </form>
        </div>
      </div>
      </div>
    </div>
  </div>
  <?php include_once('../layouts/footer.php'); ?>
  <script>
  $(function(){
            $('#twzipcode').twzipcode();
            $('#twzipcode').find('input[name="zipcode"]').eq(1).remove();
            $('#twzipcode').find('select[name="county"]').eq(1).remove();
            $('#twzipcode').find('select[name="district"]').eq(1).remove();
            $('#birthday').datepicker({
            dateFormat: 'yy-mm-dd',
            changeMonth: true,
            changeYear: true,
            yearRange : "1980:2030"
    });

        });
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
  

</html>