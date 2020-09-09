<?php
session_start();
$config=mysqli_connect("localhost","root","","php_test");

if($_COOKIE['user_remember'] && $_COOKIE['pass_remember'] ){
    $sql1="SELECT * FROM users_tbl WHERE username='$_COOKIE[user_remember]'" ;
    $row1=mysqli_query($config,$sql1);
    $res1=mysqli_fetch_array($row1);
   // var_dump($res1);die("11111");
    if($res1['password']==sha1($_COOKIE['pass_remember'])){
        $_SESSION['name']=$res1['name'];
        header("location:welcome.php");
    }

}

if(isset($_POST['btn'])){
    $data=$_POST['frm'];
    //var_dump($data);
    $sql="SELECT * FROM users_tbl WHERE username='$data[username]'" ;
    $row=mysqli_query($config,$sql);
    $res=mysqli_fetch_array($row);
    //var_dump($res);
    $username=$data['username'];
    $password=$data['password'];
        if(isset($data['remember'])){
            setcookie('user_remember',$username,time()+60);
            setcookie('pass_remember',$password,time()+60);
        }
        else{
            echo "B";
        }

    if($res['password']==sha1($data['password'])){

        $_SESSION['name']=$res['name'];
        header("location:welcome.php");
    }
    else{
       // header("location:login.php?login=error");
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/fontawesome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<div class="logo">
    <i class="fa fa-unlock" aria-hidden="true"></i>
    ضمن عرض خوش آمد گویی ، لطفا برای دسترسی به بخش مدیریت از فرم زیر استفاده نمایید
</div>
<form method="post" class="mainfrm">
    <div class="lable">
        نام کاربری شما
    </div>
    <div class="frmrow">
        <i class="fa fa-user" aria-hidden="true"></i>
        <input type="text" name="frm[username]"/>
    </div>
    <div class="lable">
        کلمه عبور
    </div>
    <div class="frmrow">
        <i class="fa fa-lock" aria-hidden="true"></i>
        <input type="password" name="frm[password]"/>
    </div>
    <div class="frmrow1">
        <input type="checkbox" name="frm[remember]" />
مرا به خاطر بسپار
    </div>
    <div class="frmrow1">
        <input type="submit" value="ورود" name="btn" class="login"/>
    </div>
    <div class="frmrow1">
        <?php if(isset($_GET['login'])){
            if($_GET['login']=="error"){
                echo "<i class=\"fa fa-bullhorn\" aria-hidden=\"true\"></i><p class='alert'>نام کاربری یا کلمه عبور اشتباه است</p>";
            }
            else if($_GET['login']=="error1"){
                echo "<i class=\"fa fa-bullhorn\" aria-hidden=\"true\"></i><p class='alert'>لطفا ابتدا وارد شوید </p>";
            }
            else if($_GET['login']=="logout"){
                echo "<i class=\"fa fa-bullhorn\" aria-hidden=\"true\"></i><p class='alert'>خروج با موفقیت انجام شد</p>";
            }
        } ?>
    </div>
</form>

</body>
</html>