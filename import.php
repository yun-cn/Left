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
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
		<title>出納</title>
</head>
	
		
<body>		
	<h1>出納データインポート</h1>
	<h4>adminでログインしています。</h4><br>
	<h4>出納CSVファイルアップロード</h4><br>
	<hr>
		
	<form action="Demo01.php" method="post" enctype="multipart/form-data">
		<input type="hidden" name="MAX_FILE__SIZE" values="200000"/>
		ファイルを選択:<input type="file" name="data"/><br>
		<input type="submit" value="アップロード"/>
	</form>
</body>
	
</html>





