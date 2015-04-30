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
		 
		 
    if(!empty($_FILES['data']['name']))
    {
    	if($_FILES['data']['error']>0)
    	{
    		switch($_FILES['data']['error'])
    		{
    			case 1:
    				$errorMsg="php.iniの設定範囲を超えます！";
    				    break;
    			case 2:
    				$errorMsg="アップロードが最大範囲を超えて!";
    			case 3:
    						break;
    				$errorMsg="アップロードファイルが不完全です!";
    						break;
    			case 4:			
    				$errorMsg="ファイルがアップロードされていないです!";
    						break;
    		}
    		echo "Error:";
    		echo $errorMsg;
    	}else{
    		if(is_uploaded_file($_FILES['data']['tmp_name']))
    		{
    	  	 $toFileName="./".$_FILES['data']['name'];
    	  	     	  	 
    	  	 if(move_uploaded_file($_FILES['data']['tmp_name'],$toFileName))
    	  	 {
    	  	 		$filename="admin_num";
    	  	  	echo "<script>alert('uploaded!');</script>";
    	  	  	file_exists($filename) or touch($filename);
    	  	  	$fpout=fopen($filename,"a+");
    	        $fpin=fopen($_FILES['data']['name'],"r");
    	        
    	        while(!feof($fpin))
    	        {
    	        	$line=fgets($fpin);
    	        	fwrite($fpout,$line);
    	        	fwrite($fpout,PHP_EOL);
    	        }
    	        fclose($fpout);
    	        fclose($fpin);
    	        
    	          	  	
    	  	 }else
    	  	 {
    	  	 	echo "<script>alert('error!')<script>";
    	  	 }
    	}
    }
  }
  ?>  
 <html>
 	<head>
 		<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
 		<title>アップロードファイル</title>
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
   $filename=$_FILES['data']['name'];
   hl($filename); 	
 	     
    