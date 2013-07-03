<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- <script type="text/javascript" src="../../Controller/resources/JQuery_Plugins/ajax_form/jquery.min.js"></script> -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="../../View/resources/js/jquery.js"></script>
    <script type="text/javascript" src="../../Controller/resources/JQuery_Plugins/ajax_form/jquery.form.js"></script>
    <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
    <script type="text/javascript" src="../../View/resources/js/validation.js"></script>
    <script type="text/javascript" src="../../View/resources/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../View/resources/js/friends_news/home.js"></script>
    <link rel="stylesheet" type="text/css" href="../../View/resources/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../View/resources/css/bootstrap-responsive.css">
    <link rel="stylesheet" type="text/css" href="../../View/resources/css/recommended-styles.css">
    <link rel="stylesheet" type="text/css" href="../../View/resources/css/styles.css">
    <script>
        var html=new Array();
        var marked_people_photo_array=new Array();
        function create_album_success(){alert("创建成功!");}
        function create_album()
        {
        	$("#create_album").ajaxForm({
                    // data:{photo_index:index},
                    success:create_album_success
                }).submit();
        }
        function finish_mark_people()
        {
            var postToTag=$("#postToTag").val();
            var postToFans=$("#postToFans").val();
            var postToFriend=$("#postToFriend").val();
            var mark_description=$("#mark_description").val();
            var photo_path=document.getElementById("at_people").src;
            marked_people_photo_array.push(photo_path+","+postToTag+","+postToFans+","+postToFriend+","+mark_description);
        }
        var index=0;
        function cancel_upload()
        {
            for(var i=0;i<html.length;i++)
                html[i]="";
            html=new Array();
        }
        function At_People(full_path)
        {
            var at_people=document.getElementById("at_people");
            at_people.src=full_path;
        }
        function finish()
        {
            alert("上传成功!");
            for(var i=0;i<html.length;i++){html[i]="";}
            html=new Array();
            marked_people_photo_array=new Array();
            document.getElementById("modal_body").innerHTML="";
        }
        function Change_MkPple_Array_To_String(array)
        {
            var result="";
            for(var i=0;i<array.length;i++)
            {
                if(i==array.length-1)
                    result+=array[i];
                else
                    result+=array[i]+"|";
                    // alert("row:"+result);
            }
            return result;
        }
        function finish_upload_photo()
        {
            //var form_obj=document.getElementById("upload_final").submit();
            var marked_string=Change_MkPple_Array_To_String(marked_people_photo_array);
            //alert(marked_string);
            $("#upload_final").ajaxForm({
                data:{mark_info:marked_string},
                success:finish
            }).submit();   
        }
        function removeImg(obj,photo_name)
        {
            var id=obj.id;
            html[id]="";
            var name=photo_name;
          //  if user delete a photo, then delete the corresponding marked info of people in marked_people_photo_array
            for(var i=0;i<marked_people_photo_array.length;i++)
            {
            	//alert(marked_people_photo_array[i]);
            	var string_before_index=marked_people_photo_array[i].indexOf(",");
            	var string_before=marked_people_photo_array[i].substring(0,string_before_index);
            	var result_index=string_before.lastIndexOf("/");
            	var result=string_before.substring(result_index+1);
            	// alert(decodeURI(result));
            	// alert(photo_name);
            	if(decodeURI(result)==photo_name)
            	{
            		marked_people_photo_array.splice(i,1);
            	}
            }
            $.ajax({
                type: "POST",
                url: "../photo/delete_photo_action.php",
                data: { photo_path:name }
            }).done(function( msg ) {
                    });
        }

        function showResponse(responseText, statusText)
        {
            //alert(responseText+","+statusText);
            html.push(responseText);
            //html+=responseText;
            var html_str="";
            for(var i=0;i<html.length;i++)
            {
                html_str+=html[i];
            }
            index=index+1;
            $("#modal_body").html(html_str);
            $(".upload-remove-img").tooltip({
                'trigger': 'hover',
                'placement': 'top'
            });
            $('.upload-remove-img').click(function() {$(this).parents('.upload-img').fadeOut("slow",function(){$(this).remove()}); }); /*remove upload img*/
        }
        $(document).ready(function(){
        	$(".postToFriend").mention({
            users:{#$users#}
            });
            $(":text").each(function(){
                $(this).val("");
            });
            $(":password").val("");

            $('#selectImgAtFriend').live('change', function(){
                $("#modal_body1").append('<img src="../../Controller/resources/img/loader.gif" alt="Uploading...."/>');
                $("#selectImgAtFriend_form").ajaxForm({
                   // data:{photo_index:index},
                    target: '#modal_body1',
                    success:showResponse
                }).submit();
            });
            $('#selectImgToAlbum').live('change', function(){
                $("#modal_body").append('<img src="../../Controller/resources/img/loader.gif" alt="Uploading...."/>');
                $("#upload_photo_form").ajaxForm({
                    data:{photo_index:index},
                    target: '#modal_body',
                    success:showResponse
                }).submit();
            });
        });
    </script>
    <title>Photowall-个人主页</title>