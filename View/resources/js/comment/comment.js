var comment_html="";
function comment_success(responseText, statusText)
{
    comment_html+=responseText;
     $("#comment-box").append(responseText);
}
function send_comment()
{
    var photo_name=document.getElementById("photo_name_for_comment").value;
    $("#photo_comment_form").ajaxForm({
        data:{photo_name:photo_name},
       // target: '#comment-box',
        success:comment_success
    }).submit();
}