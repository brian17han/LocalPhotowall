<?php session_start();
//这个页面最后把photo_name, 描述什么的存进数据库,随后整个上传照片过程完毕
require_once('../../connector.ini.php');
require_once('../../Controller/Validation/validate_string.php');
$user_id=$_SESSION["user_id"];
$album_id=$_POST["album_id"];
$date_now=date("Y-m-d h:m:s");
$sql_insert_photo="insert into photos (photo_name,photo_description,photo_path,album_id,
                   photo_big_thumbnail,photo_small_thumbnail,created_at) values 
                   (";
for ($i=0; $i <count($_POST["photo_name"]); $i++) 
{ 
    $sql_insert_photo.="'".$_POST['photo_name'][$i]."','".$_POST['photo_description'][$i]."',
                       '".$_POST['photo_path'][$i]."','".$album_id."','','','".$date_now."')";
    //echo $sql_insert_photo."<br/>";
    
	mysql_query($sql_insert_photo);
	$sql_insert_photo="insert into photos (photo_name,photo_description,photo_path,album_id,
                   photo_big_thumbnail,photo_small_thumbnail,created_at) values 
                   (";
}
//this is to inert data into photowall_movement table, the "one_of_photo_path" column store the first uploaded photo's path.
$user_id=$_SESSION["user_id"];$nick_name=$_SESSION["nick_name"];
$photo_uploaded_amount=count($_POST["photo_name"]);
$one_of_photo_path=$_POST["photo_name"][0];
$sql_insert_into_movement="insert into photowall_movement (date,user_id,album_id,photo_uploaded_amount,one_of_photo_path,
                           nick_name) values ('".date("Y-m-d h:m:s")."','".$user_id."','".$album_id."','".$photo_uploaded_amount."',
                           '".$one_of_photo_path."','".$nick_name."')";
$query_movement=mysql_query($sql_insert_into_movement);



//--------------------above is to store photo into album,below is to handle the marked info--------------------
//--------------------whenever there is marked info, above always be executed!------------------
function handle_brackets($number_with_bracket)//used to handle the number that included by "()" e.g. (45)
{
	return substr($number_with_bracket, 1,strlen($number_with_bracket)-2);
}
//this function is to get marked user's nick name by query their user_id through DB
function Get_Users_Nick_Name($user_id_array)//return an array, including selected user's nick_name
{
	$sql_select_nick_name="select nick_name from user where user_id IN (";
	for ($i=0; $i <count($user_id_array) ; $i++) { 
		$sql_select_nick_name.=handle_brackets($user_id_array[$i]).",";
	}
	$sql_select_nick_name=substr($sql_select_nick_name, 0,strlen($sql_select_nick_name)-1).")";
	$query_users_nick_name=mysql_query($sql_select_nick_name);
	$nick_name=array();
	$index=0;
	while($out=mysql_fetch_array($query_users_nick_name))
	{	
		$nick_name[$index]=$out["nick_name"];
		$index++;
    }	
	return $nick_name;
}
//this is to store the marked information, this will be stored separetly from the above
//the $_POST["mark_info"] is a string seperated by "|"
if(isset($_POST["mark_info"])&&$_POST["mark_info"]!=""&&strlen($_POST["mark_info"])>0)
{
	$mark_info_array=explode("|", $_POST["mark_info"]);
	
	for ($i=0; $i <count($mark_info_array) ; $i++) {
		//every element in this array was seperated by ",", stands for every single marked photos
		$row=explode(",", $mark_info_array[$i]); 
		$row[0]=urldecode($row[0]);
		$row[4]=urldecode($row[4]);//marked_description
		preg_match_all("/\([0-9]+\)/", $row[3], $matches_user_ids);
		$nick_name_array=Get_Users_Nick_Name($matches_user_ids[0]);
		$user_id_string="";
		$nick_name_string="";
		for ($j=0; $j <count($matches_user_ids[0]); $j++) { 
			$user_id_string.=handle_brackets($matches_user_ids[0][$j]).",";
			$nick_name_string.=$nick_name_array[$j].",";
		}
		
		$sql="insert into marked_photo (marker_user_id,marker_username,be_marked_user_id,be_marked_nickname,
	         photo_path,group_hobby,show_to_fans,date,marked_description) values ('".$_SESSION['user_id']."','".$_SESSION['login_name']."',
	         '".substr($user_id_string,0,strlen($user_id_string)-1)."','".substr($nick_name_string,0,strlen($nick_name_array)-1)."','".$row[0]."',
	         '".$row[1]."','".$row[2]."','".date("Y-m-d h:m:s")."','".$row[4]."')";
		mysql_query($sql);
		$sql_insert_to_friend_news="insert into friends_movement (marked_user_id,marker_nick_name,
		                            marker_login_name,be_marked_user_id,photo_path,date) values ('".$user_id."',
									'".$_SESSION['nick_name']."','".$_SESSION['login_name']."','".substr($user_id_string,0,strlen($user_id_string)-1)."',
									'".$row[0]."','".date("Y-m-d h:m:s")."')";
	    mysql_query($sql_insert_to_friend_news);
	}
}
?>