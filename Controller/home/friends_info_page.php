<?php session_start();
//这个页面是用来显示 关注  粉丝 贴友的  
require_once('../../connector.ini.php');
require_once('../../Controller/Validation/validate_string.php');
require_once('../../Controller/Image_Handle/Generate_Thumbnail.php');
//贴友墙动态, 这里显示所有贴友的新发部的照片
$personal_info=Find_Myself();
$concern=$personal_info["concern"]["concern_count"];
$fans=$personal_info["fans"]["fans_count"];
$friends=$personal_info["friends"]["friends_count"];
$location=$personal_info["province"].",".$personal_info["city"];
$head_photo_big_thumbnail="../Project_Images/head_photo_big_thumbnail/".$personal_info["user_id"]."_".$personal_info["head_photo_big_thumbnail"];
//先把自己的信息显示出来
function Find_Myself()
{
	$sql_find_myself="select user_id, login_name, province, head_photo_big_thumbnail, city from user where user_id='".$_SESSION['user_id']."'";
	$query=mysql_query($sql_find_myself);
	$myself=mysql_fetch_array($query);
	$my_info=array("user_id"=>$myself["user_id"],"login_name"=>$myself["login_name"],"head_photo_big_thumbnail"=>$myself["head_photo_big_thumbnail"],
	               "province"=>$myself["province"],"city"=>$myself["city"],"concern"=>Find_My_Concern(),"fans"=>Find_My_Fans(),
	               "friends"=>Find_My_Friends());
	return $my_info;
}
function Find_My_Concern()
{
	$sql_concern="select concern.goal_id, user.head_photo, user.user_id, user.nick_name, user.login_name from concern, user where 
              concern.follower_id='".$_SESSION['user_id']."' and concern.goal_id=user.user_id";
    //返回时把记录数和结果集装到一个数组里返回,避免再查一次数据库
    $query=mysql_query($sql_concern);
    $count=mysql_num_rows($query);
    $result=array("concern_count"=>$count,"ResultSet"=>$query);
    return $result;
}
function Find_My_Fans()
{
	$sql_fans="select concern.follower_id, user.head_photo, user.user_id, user.nick_name, user.login_name from concern, user where
              concern.goal_id='".$_SESSION['user_id']."' and concern.follower_id=user.user_id";
	//返回时把记录数和结果集装到一个数组里返回,避免再查一次数据库
    $query=mysql_query($sql_fans);
    $count=mysql_num_rows($query);
    $result=array("fans_count"=>$count,"ResultSet"=>$query);
    return $result;
}
function Find_My_Friends()
{
	$sql_friend1="select friends.reviewer_id, user.head_photo, user.user_id, user.nick_name, user.login_name from friends,user where
              friends.applicant_id='".$_SESSION['user_id']."' and friends.reviewer_id=user.user_id";
    $sql_friend2="select friends.applicant_id, user.head_photo, user.user_id, user.nick_name, user.login_name from user,friends where
              friends.reviewer_id='".$_SESSION['user_id']."' and friends.applicant_id=user.user_id";
    $sql=$sql_friend1." UNION ".$sql_friend2;
    $query1=mysql_query($sql_friend1);
    $query2=mysql_query($sql_friend2);
    $count=mysql_num_rows($query1)+mysql_num_rows($query2);
    //这里有两个贴友结果集
    $result=array("friends_count"=>$count,"ResultSet1"=>$query1,"ResultSet"=>$query2);
    return $result;
}

