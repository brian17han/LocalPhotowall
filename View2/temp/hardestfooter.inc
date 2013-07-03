<div class="footer">
    	<div class="copyright">
        	<p>Copyright© 2012-2022 Photowall Inc, All Rights Reserved.</p>
            <p>照片墙 版权所有</p>
            <a href="http://www.tangerteq.com"><p>Powered by Tanger TEQ LLC.</p></a>
        </div>
    </div><!--footer ends-->

    <!-- Modal Photo Popup-->
    <div id="myModal" class="modal hide fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="cancel_upload();">×</button>
            <h4 id="myModalLabel">冰天雪地 (3/15)</h4>
        </div>
        <div class="modal-body photo-popup">
            <div class="row-fluid">
                <div class="span12 img-box">
                    <img id="photo_for_comment_display" class="img-polaroid img-orig" width="600" src="../../View/resources/img/photos/snow-covered-trees.jpg" />
                    <p></p>
                    <p class="no-space">郊外美丽的雪景，一片银白</p>
                    <hr />
                </div>
            </div>
            <div class="row-fluid">
                <div class="span8">
                    <form class="form-inline" id="photo_comment_form" action="../comment/add_photo_comment.php" method="post">
                        <input type="text" style="width:290px;" placeholder="评论此照片" id="comment" name="comment">
                        <input type="hidden" id="photo_name_for_comment" name="photo_name_for_comment" value="" />
                        <label><sub class="muted">还可输入<span id="replyInputLimiter"></span>字</sub></label>
                        <button type="button" class="btn btn-small" onclick="send_comment()">发表</button>
                    </form>
                    <div class="row-fluid" id="comment-box">
                        <div class="row-fluid"><!--single comment starts-->
                            <div class="span1">
                                <img class="img-small" src="../../View/resources/img/follower/profile_img_test1.png" alt="id-3223-profile-img" >
                            </div>
                            <div class="span10">
                                <p><a class="user-name" href="#">阿Y</a> 回复<a class="user-name" href="#">ANGLED1</a>: 哈哈，是啊，景色确实很好啊！</p>
                                <p class="muted"><sub>2013-3-29 22:20</sub></p>
                                <hr class="no-space"/>
                            </div>
                            <div class="span1">
                                <a href="#"><p>回复</p></a>
                            </div>
                        </div><!--single comment ends-->
                        <div class="row-fluid"><!--single comment starts-->
                            <div class="span1">
                                <img class="img-small" src="../../View/resources/img/follower/profile_img_test1.png" alt="id-3223-profile-img" >
                            </div>
                            <div class="span10">
                                <p><a class="user-name" href="#">ANGLED1</a>: 下雪了啊 很漂亮啊。这是在哪里？是在你那边吗？过一阵我过去还能看得到么？</p>
                                <p class="muted"><sub>2013-3-22 14:20</sub></p>
                                <hr class="no-space"/>
                            </div>
                            <div class="span1">
                                <a href="#"><p>回复</p></a>
                            </div>
                        </div><!--single comment ends-->
                        <div class="row-fluid"><!--single comment starts-->
                            <div class="span1">
                                <img class="img-small" src="../../View/resources/img/follower/profile_img_test1.png" alt="id-3223-profile-img" >
                            </div>
                            <div class="span10">
                                <p><a class="user-name" href="#">刘嘉阳</a>: 这是哪里啊？这个季节还有雪。</p>
                                <p class="muted"><sub>2013-3-21 05:10</sub></p>
                                <hr class="no-space"/>
                            </div>
                            <div class="span1">
                                <a href="#"><p>回复</p></a>
                            </div>
                        </div><!--single comment ends-->
                    </div>
                </div>
                <div class="span4" id="img-preview">
                    <div class="row-fluid"><a class="offset11 no-space" id="load-pre-imgs" href="#"><i class="icon-chevron-up"></i></a></div>
                    <div class="row-fluid photo-preview-row">
                        <div class="span4" id="preview-img1"><img src="../../View/resources/img/photos/thumbnails/beauty_thumbnails.jpg" /></div>
                        <div class="span4" id="preview-img2"><img src="../../View/resources/img/photos/thumbnails/bird_thumbnails.jpg" /></div>
                        <div class="span4" id="preview-img3"><img src="../../View/resources/img/photos/thumbnails/car_thumbnails.jpg" /></div>
                    </div>
                    <div class="row-fluid photo-preview-row">
                        <div class="span4" id="preview-img4"><img src="../../View/resources/img/photos/thumbnails/child_thumbnails.jpg" /></div>
                        <div class="span4" id="preview-img5"><img src="../../View/resources/img/photos/thumbnails/disney_thumbnails.jpg" /></div>
                        <div class="span4" id="preview-img6"><img src="../../View/resources/img/photos/thumbnails/flower_thumbnails.jpg" /></div>
                    </div>
                    <div class="row-fluid photo-preview-row">
                        <div class="span4" id="preview-img7"><img src="../../View/resources/img/photos/thumbnails/horse_thumbnails.jpg" /></div>
                        <div class="span4" id="preview-img8"><img src="../../View/resources/img/photos/thumbnails/lake_thumbnails.jpg" /></div>
                        <div class="span4" id="preview-img9"><img src="../../View/resources/img/photos/thumbnails/plane_thumbnails.jpg" /></div>
                    </div>
                    <div class="row-fluid"><a class="offset11 no-space" id="load-next-imgs" href="#"><i class="icon-chevron-down"></i></a></div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Photo Two options-->
    <div id="photoUploadOption" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-footer row-fluid">
            <div class="span4">
                <a href="#atFriendModal" class="span12 btn btn-large btn-primary" data-dismiss="modal" aria-hidden="true" data-toggle="modal">贴给贴友</a>
            </div>
            <div class="span4 text-center">
                <a href="#" class="span12 btn btn-large disabled"><i class="icon-arrow-left"></i> 上传照片 <i class="icon-arrow-right"></i></a>
            </div>
            <div class="span4">
                <a href="#uploadModal" class="span12 btn btn-large btn-primary" data-dismiss="modal" aria-hidden="true" data-toggle="modal">存至相册</a>
            </div>
        </div>
    </div>

    <!-- Modal Photo Upload and @ Friends-->
    <div id="atFriendModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4><i class="icon-camera icon-white"></i> 上传照片 贴给贴友</h4>
        </div>
        <form action="../photo/store_info_to_DB.php" method="post" id="upload_final1" >
            <div class="modal-body photo-upload-container" id="modal_body1" >
            	
                <div class="upload-img">
                    <img src="../../View/resources/img/follower/profile_img_test1.png" class="img-polaroid img-large"/>
                    <div class="upload-descript-box">
                        <span class="descript-arrow"></span>
                        <i class="icon-remove upload-remove-img" onclick="removeImg()" title="删除"></i></a>
                        <textarea placeholder="添加描述" maxlength="240" class="upload-descript-content"></textarea>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer row-fluid photo-upload-footer">
                    <div class="row-fluid" style="margin-top:10px;">
                        <div class="span4">
                            <div class="control-group no-space">
                                <label class="control-label span6">贴给指定贴友</label>
                                <div class="controls span6">
                                    <input type="text" class="postToFriend" class="input-small" />
                                </div>
                            </div>
                            <div class="control-group no-space">
                                <label class="control-label span6" for="postToTag">贴给标签分组</label>
                                <div class="controls span6">
                                    <select id="postToTagAtFriend" class="input-small">
                                        <option value="groupId1002">美食</option> <!--load groups names and id to this select-->
                                        <option value="groupId1985">风景</option>
                                        <option value="groupId1045">足球</option>
                                        <option value="groupId1024">篮球</option>
                                        <option value="groupId1025">美女</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group no-space">
                                <label class="control-label span6" for="postToAll">贴给所有粉丝</label>
                                <div class="controls span6">
                                    <select id="postToAllAtFriend" class="input-small">
                                        <option value="yes">是</option>
                                        <option value="no" selected="selected">否</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="span7">
                            <div class="single-photo-descript-box">
                                <span class="descript-arrow"></span>
                                <textarea placeholder="添加描述" col="50" row="8" class="upload-descript-content"></textarea>
                            </div>
                        </div>
                    </div>
                <div class="row-fluid">
                    <div class="span4">
                        <p style="font-size:10px;">按住Ctrl键可多选照片<br/>每次最多上传100张照片</p>
                    </div>
                    <a href="#" class="btn btn-large" onclick='imgUploadAtFriend();'>选择照片</a>
                    <a href="#" class="btn btn-large btn-primary" onclick='javascript:finish_upload_photo();'>完成上传</a>

                </form>
                <form action="../photo/add_photo_to_at_friends_action.php" method="post" enctype="multipart/form-data" id="selectImgAtFriend_form" >
                    <!--   <a href="#" class="btn btn-large">选择照片</a> -->
                    <input type="file" name="selectImgAtFriend[]" id="selectImgAtFriend" multiple="multiple" class="hide" />  <!--change id of upload to Album to "selectImgToAlbum"-->
                </form>
    </div>
</div>
</div>

    <!-- Modal Photo Upload to Album-->
    <div id="uploadModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4><i class="icon-camera icon-white"></i> 上传照片 存至相册</h4>
        </div>
        <form action="../photo/store_info_to_DB.php" method="post" id="upload_final" >
        <div class="modal-body photo-upload-container" id="modal_body">

        </div>
        <div class="modal-footer row-fluid photo-upload-footer">
            <div class="span5">
                <div class="row-fluid" style="padding-top: 7px;">
                    <a href="#newAlbumModal" data-toggle="modal"><h4 class="text-error span5" style="line-height:10px;">+ 新建相册</h4></a>
                    <select class="span7" name="album_id" id="album_id">
                        <!-- <option selected="selected" disabled>选择相册</option>
                        <option>1</option>
                        <option>2</option> -->
                        {#$album_html#}
                    </select>
                </div>
            </div>
            <div class="span7">
                <div class="span4">
                    <p style="font-size:10px;">按住Ctrl键可多选照片<br/>每次最多上传100张照片</p>
                </div>
                <a href="#" class="btn btn-large" onclick='imgUploadToAlbum();'>选择照片</a>
                <a href="#" class="btn btn-large btn-primary" onclick='javascript:finish_upload_photo();'>完成上传</a>
        </form>
        <form action="../photo/add_photo_action.php" method="post" enctype="multipart/form-data" id="upload_photo_form" >
        <!-- <form action="../photo/multi_file_upload_action.php" method="post" enctype="multipart/form-data" id="upload_photo_form" > -->
            <!--   <a href="#" class="btn btn-large">选择照片</a> -->
            <input type="hidden" id="MAX_FILE_SIZE" name="MAX_FILE_SIZE" value="10000000" />
            <input type="file" id="selectImgToAlbum" name="selectImgToAlbum" style="display: none;"/>
        </form>
            </div>
        </div>
    </div>


    <!-- Modal Photo New Album-->
    <div id="newAlbumModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4><i class="icon-plus icon-white"></i> 新建相册</h4>
        </div>
        <form class="form-horizontal" id="create_album" method="post" action="../album/add_album_action.php">
            <div class="modal-body new-album-container row-fluid">
                <div class="span6 offset3">
                    <div class="control-group">
                        <label class="control-label" for="albumName">相册名称</label>
                        <div class="controls">
                            <input type="text" id="albumName" placeholder="新相册" name="albumName">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="albumPrivacy">阅览权限</label>
                        <div class="controls">
                            <select id="albumPrivacy" name="albumPrivacy">
                                <option value="albumPrivacy-everyone">所有人可见</option>
                                <option value="albumPrivacy-friend">贴友可见</option>
                                <option value="albumPrivacy-follow">关注可见</option>
                                <option value="albumPrivacy-fans">粉丝可见</option>
                                <option value="albumPrivacy-self">只自己可见</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="albumDiscription">相册简介</label>
                        <div class="controls">
                            <textarea type="password" id="albumDiscription" placeholder="填写相册简介..." name="albumDiscription"></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="albumPassword">设定密码</label>
                        <div class="controls">
                            <input type="password" id="albumPassword" name="albumPassword" placeholder="选填">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-large" data-dismiss="modal" aria-hidden="true">取消新建</a>
                <button type="button" class="btn btn-large btn-primary" onclick="create_album();">完成新建</button>
            </div>
        </form>
    </div>

    <!-- Modal Photo New Single Photo-->
    <div id="newSinglePhotoModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4><i class="icon-camera icon-white"></i> 贴照设定</h4>
        </div>
        <div class="modal-body new-single-photo-container">
                <div class="img-box">
                    <img class="img-polaroid img-orig" src="../../View/resources/img/photos/snow-covered-trees.jpg" id="at_people" />
                </div>
            <form class="form-horizontal">
                <div class="row-fluid" style="margin-top:10px;">
                    <div class="span4">
                        <div class="control-group no-space">
                            <label class="control-label span6">贴给指定贴友</label>
                            <div class="controls span6">
                                <input type="text" class="postToFriend" class="input-small" id="postToFriend" name="postToFriend" />
                            </div>
                        </div>
                        <div class="control-group no-space">
                            <label class="control-label span6" for="postToTag">贴给标签分组</label>
                            <div class="controls span6">
                                <select id="postToTag" class="input-small">
                                    <option value="food">美食</option> <!--load groups names and id to this select-->
                                    <option value="view">风景</option>
                                    <option value="soccer">足球</option>
                                    <option value="basketball">篮球</option>
                                    <option value="girls">美女</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group no-space">
                            <label class="control-label span6" for="postToAll">贴给所有粉丝</label>
                            <div class="controls span6">
                                <select id="postToFans" class="input-small">
                                    <option value="yes">是</option>
                                    <option value="no" selected="selected">否</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="span7">
                        <div class="single-photo-descript-box">
                            <span class="descript-arrow"></span>
                            <textarea placeholder="添加描述" col="50" row="8" class="upload-descript-content" id="mark_description"></textarea>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <a href="#" class="btn btn-large" data-dismiss="modal" aria-hidden="true">取消设定</a>
            <button type="submit" data-dismiss="modal" aria-hidden="true" class="btn btn-large btn-primary" onclick="finish_mark_people();">完成设定</button>
        </div>
    </div>


<!-- Placed at the end of the document so the pages load faster -->
  <!--   <script type="text/javascript" src="../../View/resources/js/directly_at_friends/filedrag.js"></script> -->
    <script type="text/javascript" src="../../View/resources/js/bootstrap-tab.js"></script>
    <script type="text/javascript" src="../../View/resources/js/comment/comment.js"></script>
    <script type="text/javascript" src="../../View/resources/js/directly_at_friends/at_friends.js"></script>
    <script type='text/javascript' src="http://twitter.github.com/bootstrap/assets/js/bootstrap-typeahead.js"></script>
    <script type='text/javascript' src="../../View/resources/js/mention.js"></script>
    <script type='text/javascript' src="../../View/resources/js/jquery.tinylimiter.js"></script>
    <script>
        $(function () {
            $('#myTab a:last').tab('show');
        })
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $(".upload-remove-img").tooltip({
                'trigger': 'hover',
                'placement': 'top'
            });
            $('.upload-remove-img').click(function() {$(this).parents('.upload-img').fadeOut("slow",function(){$(this).remove()}); }); /*remove upload img*/
            /*input limiter*/
            var elem = $("#replyInputLimiter");
            $("#replyInputBox").limiter(100, elem);
        });
        function imgUploadAtFriend(){
             $('#selectImgAtFriend').click();
        };
        function imgUploadToAlbum(){
            $('#selectImgToAlbum').click();
        };
    </script>
   <!--   <script type="text/javascript" src="../../View/resources/js/filedrag.js"></script> -->
    <script>/*Mock data*/
    // $(document).ready(function(){
    	// alert("askjldslkjfskjflks");
        // $(".postToFriend").mention({
            // users:{#$users#}
            // });
        // });
    </script>
    <!-- prepare for ajax tab load
    <script>
    $(function() {
        var baseURL = 'http://yourdomain.com/ajax/';
        //load content for first tab and initialize
        $('#home').load(baseURL+'home', function() {
            $('#myTabs').tab(); //initialize tabs
        });
        $('#myTabs').bind('show', function(e) {
           var pattern=/#.+/gi //use regex to get anchor(==selector)
           var contentID = e.target.toString().match(pattern)[0]; //get anchor
           //load content for selected tab
            $(contentID).load(baseURL+contentID.replace('#',''), function(){
                $('#myTabs').tab(); //reinitialize tabs
            });
        });
    });
    </script>-->
    <!-- Placed at the end of the document so the pages load faster -->
</div>
</body>
</html>