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
		<meta http-equiv="Content-Type" Content="text/html;charset=utf-8">
			<title>ユーザーの出納記録</title>
	</head>
	
	<body>
		<h2>出納記録</h2>
		<hr>
		<form method="post" action="calculate.php">
  		
  	日付<br><input type="text" name="date"/><br>
  	内容<br><input type="text" name="content"/>円<br>
  	出金<br><input type="text" name="spend"/>円<br>
  	入金<br><input type="text" name="income"/>円<br>
  		  
  	<input type="submit" value="記録する"/>
  	</form>
  </body>
</html>