<?php session_start();
  $conn=mysql_connect("localhost","root","");
  mysql_select_db("new_photowall",$conn);
  $_SESSION["user_id"]=18;
  //仅搜索好友
function find_only_friends()
{
  
  if(isset($_POST["keyword"])&&$_POST["keyword"]!="")
  {
  	 $key_word=$_POST["keyword"];
  	 if(preg_match("/\'\"/", $key_word))
  	 {
  	 	echo "<script>alert('请输入合法参数!');</script>";
  	 	echo "<script>history.go(-1);</script>";
  	 }
  	 //先搜好友,这条语句可以用concern_friends_fans.php里的$sql_friend1及$sql_friend2两者合并
  	 $sql_friend="select friends.*,  user.user_id, user.head_photo, user.login_name, user.nick_name  from friends, user
  	              where ((user.user_id=friends.reviewer_id and (friends.reviewer_id='".$_SESSION['user_id']."' or 
  	              friends.applicant_id='".$_SESSION['user_id']."')) or (user.user_id=friends.applicant_id and 
  	              (friends.reviewer_id='".$_SESSION['user_id']."' or friends.applicant_id='".$_SESSION['user_id']."'))) and 
                  user.user_id!='".$_SESSION['user_id']."' group by user.login_name";
  	 $query=mysql_query($sql_friend);
  	 return $query;
  }
} 
//此时才开始找别人
function find_people()
{
	if(isset($_POST["keyword"])&&$_POST["keyword"]!="")
	{
		$keyword=mysql_escape_string($_POST["keyword"]);
		$sql_search_people="select user_id, head_photo, login_name, nick_name from user where login_name LIKE '".$keyword."%' or
		                    login_name LIKE '%".$keyword."%' or login_name LIKE '%".$keyword."'";
		$query=mysql_query($sql_search_people);
		return $query;
	}
}
//加好友时往文件里写入好友的user_id,供加好友的action调用, 我的user_id就是txt文件名
function write_friend_user_id($my_user_id,$his_user_id)
{
	$fp=fopen($my_user_id.".txt", "a+");
	$data=fread($fp, filesize($my_user_id.".txt"));
	fwrite($fp, $data.",".$his_user_id);
}
$query=find_only_friends();
while($out=@mysql_fetch_array($query))
{
	echo $out["head_photo"]."<br/>";
}
$query=find_people();
while($out=@mysql_fetch_array($query))
{
	echo $out["head_photo"]."<br/>";
}
?>