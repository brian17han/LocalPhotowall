<?php session_start();
require_once('../../connector.ini.php');
require_once('../../Controller/Validation/validate_string.php');
require_once('../../Controller/Image_Handle/Generate_Thumbnail.php');
$photo_index=$_POST["photo_index"];
//绉诲姩鍒板師澶у皬鐨勬枃浠跺す閲屽悗绔嬪嵆鏍规嵁鍏惰矾寰勫厛鍙栧嚭鏉� 鍐嶈窡鎹叾鐢熸垚缂╃暐鍥� 缂╃暐鍥惧湪鏂囦欢澶逛腑鐨勫瓨鍌ㄥ拰鍘熷浘鐨勬枃浠跺す涓瓨鍌ㄦ槸涓�牱鐨�
//鍏堝疄渚嬪寲绫�
$image_handle=Resizeimage::getInstance();
// $image_handle->resizeimage("../Project_Images/head_photo/".$new_picture_name, 200, 200,0,"../Project_Images/head_photo_big_thumbnail/".$new_picture_name);
// $image_handle->resizeimage("../Project_Images/head_photo/".$new_picture_name, 100, 100,0,"../Project_Images/head_photo_small_thumbnail/".$new_picture_name);
$user_id=$_SESSION["user_id"];
$path = "../Project_Images/photos/";
//echo "the length is:".count($_FILES['photoimg']);
//for($i=0;$i<count($_FILES["photoimg"]["name"]);$i++){
	
	$valid_formats = array("jpg", "png", "gif", "bmp");
	if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
	{
			$name = $_FILES['selectImgToAlbum']['name'];
			$size = $_FILES['selectImgToAlbum']['size'];
			
			if(strlen($name))
				{
					list($txt, $ext) = explode(".", $name);
					 // if(in_array($ext,$valid_formats))
					 // {
					    if($size<(1024*1024*10))
						{
							$tmp = $_FILES['selectImgToAlbum']['tmp_name'];
							$file=$path.$user_id."_".$_FILES["selectImgToAlbum"]["name"];
							$file=iconv("UTF-8", "gb2312", $file);
							if(file_exists($file))
							{
								$file=$path.$user_id."_".time()."_".$_FILES["selectImgToAlbum"]["name"];
								$file=iconv("UTF-8","gb2312", $file);
							}
							if(move_uploaded_file($_FILES["selectImgToAlbum"]["tmp_name"],$file))
								{
									//echo "<img src='".$path.$_FILES["photoimg"]["name"]."'>";
									$var=$path.$user_id."_".$_FILES["selectImgToAlbum"]["name"];
									$photo_name=$user_id."_".$_FILES["selectImgToAlbum"]["name"];
									echo <<<EOF
<div class="upload-img">
                <a href="#newSinglePhotoModal" data-toggle="modal">   
                    <img src='$var' class="img-polaroid img-large" onclick="At_People('$var')"/>
                </a>
                <div class="upload-descript-box">
                    <span class="descript-arrow"></span>
                    <i class="icon-remove upload-remove-img" id='$photo_index' onclick="removeImg(this,'$photo_name');" title="删除"></i></a>
                    <textarea placeholder="添加描述" maxlength="240" name="photo_description[]" id="photo_description[]" class="upload-descript-content"></textarea>
                    <input type="hidden" name="photo_name[]" id="photo_name[]" value='$photo_name' />
                    <input type="hidden" name="photo_path[]" id="photo_path[]" value='$var' />
                </div>
            </div> 
EOF;
								}
							else
								echo "failed";
						}
						else
						    echo "Image file size max 10 MB";					
					//}
					// else
					    // echo "Invalid file format..";	
				}
				
			else
				echo "Please select image..!";
				
			exit;
	}
//}
?>

