<?php session_start();
require_once('../../connector.ini.php');
require_once('../../Controller/Validation/validate_string.php');
require_once 'friends_info_page.php';//���ҳ����������ʾ ��ע  ��˿ ���ѵ�  
require_once 'load_all_friends.php';////����ļ���ר����������ݿ���������к���id��д��txt�ļ���
require_once 'friends_recommendations.php';//�����ר���������������Ƽ����ѵ�
$smarty->assign("concern",$concern);
$smarty->assign("head_photo_big_thumbnail",$head_photo_big_thumbnail);
$smarty->assign("fans",$fans);
$smarty->assign("friends",$friends);
$smarty->assign("location",$location);
$smarty->assign("nick_name",$_SESSION["nick_name"]);
$smarty->assign("recommendation_friends",$recommendation_friends);
//load all your own albums
$sql_album="select album_id, album_name from album where user_id=".$user_id;
$query_album=mysql_query($sql_album);
$album_html="";
if(mysql_num_rows($query_album)==0)
	$album_html.="<option>您现在还没有相册!</option>";
else
{
	$album_html.="<option>请选择相册</option>";
	while($out=mysql_fetch_array($query_album))
	{
		$album_html.="<option value='".$out['album_id']."'>".$out["album_name"]."</option>";
	}
}
//load all of friends to put them in the text so that the autocomplete textbox can read it!
$sql_friend1="select friends.reviewer_id, user.head_photo, user.user_id, user.nick_name, user.login_name from friends,user where
              friends.applicant_id='".$_SESSION['user_id']."' and friends.reviewer_id=user.user_id";
$sql_friend2="select friends.applicant_id, user.head_photo, user.user_id, user.nick_name, user.login_name from user,friends where
              friends.reviewer_id='".$_SESSION['user_id']."' and friends.applicant_id=user.user_id";
$result_array=array();
//this is to store friends and concerns id so that it can be used to load the photowall_movement new info
$my_friends_and_concern_id=array();
$only_friends_id=array();
$query1=mysql_query($sql_friend1);
$query2=mysql_query($sql_friend2);
$index_mention=0;
$path="../Project_Images/head_photo/";
while($out=mysql_fetch_array($query1))
{
	$temp=array("name"=>$out["nick_name"],"user_id"=>$out["reviewer_id"],"image"=>$path.$out['reviewer_id']."_".$out["head_photo"]);
	$result_array[$index_mention]=$temp;
	$my_friends_and_concern_id[$index_mention]=$out["reviewer_id"];
	$only_friends_id[$index_mention]=$out["reviewer_id"];
	$index_mention++;
}
while($out=mysql_fetch_array($query2))
{
	$temp=array("name"=>$out["nick_name"],"user_id"=>$out["applicant_id"],"image"=>$path.$out['applicant_id']."_".$out["head_photo"]);
	$result_array[$index_mention]=$temp;
	$my_friends_and_concern_id[$index_mention]=$out["applicant_id"];
	$only_friends_id[$index_mention]=$out["applicant_id"];
	$index_mention++;
}

//photowall_movement includes my concern's and my friends' new info, so I need to get all my concerns besides friends
//first I need to load all my concerns
$sql_concerns="select goal_id from concern where follower_id='".$_SESSION['user_id']."'";
$query_concern=mysql_query($sql_concerns);
while($out=mysql_fetch_array($query_concern))
{
	$my_friends_and_concern_id[$index_mention]=$out["goal_id"];
	$index_mention++;
}

//this is to load all of the news in photowall_movement
$sql_photowall_news="select nick_name, date, one_of_photo_path,photo_uploaded_amount from photowall_movement where 
                     user_id IN (";
for ($i=0; $i <count($my_friends_and_concern_id); $i++)
	$sql_photowall_news.=$my_friends_and_concern_id[$i].",";
$sql_photowall_news=substr($sql_photowall_news, 0,strlen($sql_photowall_news)-1).")";
//die($sql_photowall_news);
$query_photowall_movement=mysql_query($sql_photowall_news);
$result_photowall_movement=array();$index_ptw_movement=0;
while($out=mysql_fetch_array($query_photowall_movement))
{
	$temp=array("nick_name"=>$out["nick_name"],"date"=>$out["date"],"one_of_photo_path"=>"../Project_Images/photos/".$out["one_of_photo_path"],
	            "photo_uploaded_amount"=>$out["photo_uploaded_amount"]);
	$result_photowall_movement[$index_ptw_movement]=$temp;
	$index_ptw_movement++;
}


//this is to load all of the news in friends_movement
$sql_friends_news="select marker_nick_name,be_marked_user_id,photo_path,date from friends_movement where marker_user_id
                   IN (";
for ($i=0; $i <count($only_friends_id) ; $i++)  
	$sql_friends_news.=$only_friends_id[$i].",";
$sql_friends_news=substr($sql_friends_news, 0,strlen($sql_friends_news)-1).")";     
$result_friend_movement=array();
$query_friends_movement=mysql_query($sql_friends_news);$index_friends_movement=0;
while($out=mysql_fetch_array($query_friends_movement))
{
	$single_line_of_ids=explode(",", $out["be_marked_user_id"]);//return an array
	if(in_array($_SESSION["user_id"], $single_line_of_ids))
	{
	   $temp=array("marker_nick_name"=>$out["marker_nick_name"],"be_marked_user_id"=>$out["be_marked_user_id"],
	               "photo_path"=>$out["photo_path"],"date"=>$out["date"]);
	   $result_friend_movement[$index_friends_movement]=$temp;
	   $index_friends_movement++;
	}
}
$smarty->assign("result_photowall_movement",$result_photowall_movement);
$smarty->assign("result_friend_movement",$result_friend_movement);
$smarty->assign("index_friends_movement",$index_friends_movement);
$smarty->assign("index_ptw_movement",($index_ptw_movement));
$smarty->assign("users",json_encode($result_array));
$smarty->assign("album_html",$album_html);
$smarty->display("home/home.html");

