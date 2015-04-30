<?php
  require_once('utils.php');

  session_start();
  $_SESSION['token'] = session_id();

  $username = $_SESSION['username'];

  if (!isset($username)) {
    redirect_to('login.php');
    exit();
  }
		 echo '<h2>'."Hello  ,".$username.'</h2>';	
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
		<title>一覧画面</title>
	</head>

	<body>
		<center>
     <table border="1" cellspacing="0px" width="90%" height=30px >
     	<caption >一覧画面</title>
     <tr>
     	<th colspan="2">日付</th>
     	<th colspan="4">内容</th>     
     	<th>出金</th>
     	<th>入金</th>
    </tr>
	</body>
</html>
<?php
		$filename=$_REQUEST['filename'];
		function hl($file_path)
		{
     if(file_exists($file_path))
     {
     	$fp=fopen($file_path,"r");
       while(!feof($fp))
       {
					$line=fgets($fp);
					$result=array();
					$result=explode(",",$line);
					echo '<tr>';
					echo '<td colspan="2">'.$result[0].'</td>';
					echo '<td colspan="4">'.$result[1].'</td>';
					echo '<td>'.$result[2]."</td>";
					echo '<td>'.$result[3]."</td>";
					echo '<tr>';
       }
     }else
     {
    	echo "文件不存在!";
     }
   }
   if('user'===$username)
   {
   	 $filename='user_num';
   }elseif('admin'===$username)
   {
   	$filename='admin_num';
   }
   hl($filename);
?>	

<a href="record.php"><h1>出納記録に戻ります</h1></a><br>


	
		
		
		
		
		
		 