<?php session_start();
require_once('../../connector.ini.php');
require_once('../../Controller/Validation/validate_string.php');
$photo_name=$_POST["photo_name"];
$sql_find_photo_id="select photo_id, photo_description from photos where photo_name='".urldecode($photo_name)."'";
$query_photo_id=mysql_query($sql_find_photo_id);
$photo_id=mysql_fetch_array($query_photo_id);
$sql_all_comments="select content,sender_id,photo_id,sender_name,date,sender_head_photo from photo_comment where photo_id=".$photo_id['photo_id'];
$query_all_comment=mysql_query($sql_all_comments);
//echo $sql_find_photo_id;
$respone_html="";
 //echo "photo_name:".$photo_id['photo_id']."<br/>";
while($out=mysql_fetch_array($query_all_comment))
{
	$head_photo=$out["sender_head_photo"];
	$nick_name=$out["sender_name"];
	$date=$out["date"];
	$content=$out["content"];
	$respone_html.=<<<EOF
                        <div class="row-fluid">
                            <div class="span1">
                                <img class="img-small" src="$head_photo" alt="id-3223-profile-img" >
                            </div>
                            <div class="span10">
                                <p><a class="user-name" href="#">"$nick_name"</a> 回复<a class="user-name" href="#">ANGLED1</a>:"$content"</p>
                                <p class="muted"><sub>"$date"</sub></p>
                                <hr class="no-space"/>
                            </div>
                            <div class="span1">
                                <a href="#"><p>回复</p></a>
                            </div>
                        </div>
EOF;
}
echo $respone_html;
?>