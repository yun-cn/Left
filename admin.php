<?php
require_once('utils.php');

  session_start();
  $_SESSION['token'] = session_id();

  $username = $_SESSION['username'];

  if (!isset($username)) {
    redirect_to('login.php');
    exit();
  }
		 echo '<h1>'."Hello, ".$username.'</h1>';
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		 <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
		<title>ユーザー</title>
	</head>
	
	<body>
		<h1>家計簿メニュー</h1><br>
		<h3>userでログインしています</h3><br>
		 <ul class="nav navbar-nav">
 		<li>
      <a class="navbar-brand" href="record.php">登録する</a>
    </li>
    <br>
    <li>
      <a class="navbar-brand" href="list.php">家計簿を見る</a>
    </li>	
    <br>
    <li>
    	<a class="navbar-brand" href="import.php">インポート</a>
    </li>
     </ul>
	</body>
</html>
	
	 