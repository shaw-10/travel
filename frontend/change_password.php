<?php 
session_start();
require_once('../function/connection.php');

if(isset($_POST['EditForm']) && $_POST['EditForm'] == "UPDATE"){
  $sql= "UPDATE members SET password=:password, updated_at=:updated_at WHERE memberID=".$_POST['memberID'];
  $sth = $db ->prepare($sql);
  $sth ->bindParam(":password", $_POST['Password_new'], PDO::PARAM_STR);
  $sth ->bindParam(":updated_at", $_POST['updated_at'], PDO::PARAM_STR);
  $sth ->execute();

  $_SESSION['member']['password'] = $_POST['Password_new'];
  

  

header('Location: customer-account.php');


}



?>