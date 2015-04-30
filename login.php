<?php

require_once('utils.php');
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

if (isset($_POST['login'])) {

  if ($username === 'user' && $password === 'user.pass') {
    session_regenerate_id(TRUE);
    $_SESSION['username']=$username;
    
    redirect_to('user.php');

    exit();
  }elseif($username==='admin' && $password ==='admin.pass')
  {
  	session_regenerate_id(TRUE);
  	$_SESSION['username']=$username;
  	
     redirect_to('admin.php');
    
    exit();
  }
   else {
    $errormsg = 'ユーザ名かパスワードが一致しません';
  }

}
?>
<html>
  <head>
    <meta charset="utf-8">
    <title>blog template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link href="css/todc-bootstrap.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; 
      }
      .signin {
        width: 335px;
        margin: 0 auto;
      }
      .signin-box {
        padding: 20px 25px 0 15px;
        background: #f1f1f1;
        border: 1px solid #e5e5e5;
      }
      .signin-box h2 {
        font-size: 16px;
        font-weight: normal;
        line-height: 17px;
        height: 16px;
        margin: 0 0 19px;
      }
      .signin-box input[type=text],
      .signin-box input[type=password] {
        width: 100%;
        font-size: 15px;
        color: black;
        line-height: normal;
        height: 32px;
        margin: 0 0 20px;
        box-sizing: border-box;
      }
      .signin-box input[type=submit] {
        margin: 0 20px 15px 0;
      }
      .signin-box label {
        color: #222;
        margin: 0 0 5px;
        display: block;
        font-weight: bold;
        font-size: 13px;
      }
    </style>
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
            <ul class="nav">
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="container">

      <div class="signin">
      	<?php if (isset($errormsg)) { ?>
    	  <p class="text-error"><?php echo $errormsg; ?></p>
 		  	<?php } ?>
        <div class="signin-box">
          <h2>ログイン</h2>

          <form action="login.php" method="POST">
            <fieldset>
              <label for="username">ユーザ名</label>
              <input type="text" name="username" id="username">
              <label for="password">パスワード</label>
              <input type="password" name="password" id="password">

              <input type="submit" class="btn btn-primary" name="login" value="ログイン">
            </fieldset>
          </form>

        </div>
      </div>

    </div>
    <script src="js/jquery.js"></script>
  </body>
</html>