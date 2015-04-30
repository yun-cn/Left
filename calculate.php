<?php
  require_once('utils.php');

  session_start();
  $_SESSION['token'] = session_id();

  $username = $_SESSION['username'];

  if (!isset($username)) {
    redirect_to('login.php');
    exit();
  }
  echo '<h2>'."Hello".$username.'</h2>';	
  
   $spend=$_REQUEST['spend'];                                         
   	$income=$_REQUEST['income'];                                      
  	$date=$_REQUEST['date'];                                          
  	$content=$_REQUEST['content'];                             
  
    if(empty($content))
    { 
    	$content="ちゃんとした内容";
    }
    
    
  $arr=array("date"=>$date,"content"=>$content,"spend"=>$spend,"income"=>$income);       
  $str=implode(",",$arr);
  if('user'===$username)
  {
 		 $filename='user_num';
 	}elseif('admin'===$username)
 	{
 		$filename='admin_num';
 	}
 	
  class cla
  {	 
  		function array2file($arr,$filename)
  	{  
  			file_exists($filename) or touch($filename);
  			file_put_contents($filename,$arr,FILE_APPEND);
  			file_put_contents($filename,PHP_EOL,FILE_APPEND);
    }
  }
  
  $ke=new cla();
  $ke->array2file($str,$filename);
  header("location:list.php?filename=$filename");
  
  
  