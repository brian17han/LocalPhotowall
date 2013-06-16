function see_single_photo(img_obj)
{
    var photo_for_comment_display_obj=document.getElementById("photo_for_comment_display");
    photo_for_comment_display_obj.src=img_obj.src;
    //because the photo_name is unique, so we just get the photo_name to acquire the photo_id
    var photo_name_first_slash_index=img_obj.src.lastIndexOf("/");
    var photo_name=img_obj.src.substring(photo_name_first_slash_index+1);
    var photo_name_for_comment_obj=document.getElementById("photo_name_for_comment");
    photo_name_for_comment_obj.value=photo_name;
    //start to load all comments for this photo
    $.ajax({
        type: "POST",
        url: "../comment/load_all_comment.php",
        data: { photo_name:photo_name }
      }).done(function( msg ) {
        $("#comment-box").html(msg);
    });
}
