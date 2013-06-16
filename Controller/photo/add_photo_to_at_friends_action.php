<?php @session_start();
//$fn = (isset($_SERVER['HTTP_X_FILENAME']) ? $_SERVER['HTTP_X_FILENAME'] : false);
// if ($fn) {
	// // AJAX call
	// file_put_contents(
		// '../Project_Images/temp_uploaded_photos/' . $_SESSION["user_id"]."_".$fn,
		// file_get_contents('php://input')
	// );
	// echo "$fn uploaded";
	// exit();
// 
// }
// else {

	// form submit
$reponse_html="";
$temp_store_path="../Project_Images/temp_uploaded_photos/";
	$files = $_FILES['selectImgAtFriend'];

	foreach ($files['name'] as $id => $err) {
	//	if ($err == UPLOAD_ERR_OK) {
		//	$fn = iconv("UTF-8","gb2312",$files['name'][$id]);
		    $fn = $temp_store_path.$_SESSION["user_id"]."_".$files['name'][$id];
			if(file_exists($fn))
			    $fn=$temp_store_path.$_SESSION["user_id"]."_".str_replace(" ","", substr(microtime(), 2))."_".$files['name'][$id];
			$fn=iconv("UTF-8", "gb2312", $fn);
			if(move_uploaded_file($files['tmp_name'][$id], $fn))
			{
				$fn=iconv("gb2312","UTF-8",$fn);
				$path=$fn;
                $temp=<<<EOF
                <div class="upload-img">
                    <img src="$path" class="img-polaroid img-large"/>
                    <div class="upload-descript-box">
                        <span class="descript-arrow"></span>
                        <i class="icon-remove upload-remove-img" onclick="removeImg(this)" title="删除"></i></a>
                        <textarea placeholder="添加描述" maxlength="240" class="upload-descript-content"></textarea>
                    </div>
                </div>
EOF;
                $reponse_html.=$temp;
			}
	//	}
	}
    echo $reponse_html;

//}
?>