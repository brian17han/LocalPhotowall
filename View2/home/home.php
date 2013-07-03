<?php include "../temp/generalheader1.inc"; ?>
<link rel="stylesheet" type="text/css" href="../../View/resources/css/walls.css">
<?php include "../temp/generalheader2.inc"; ?>
	<div class="main_content">
    	<div class="row-fluid">
        	<div class="span8">
            	<div class="row-fluid">
                    <div class="span12 bg-gray">
                        <div class="line_holder"></div>
                        <p class="text-error text-right"><big>Photowall.cc 公测版1.0正式启动面世。打造您的照片墙吧！&nbsp;&nbsp;</big></p>
                        <p class="text-right">“贴”在您的照片展示墙上，打造您的个性相册；“贴”在您好友的信息墙上，分享您的每时每刻！&nbsp;&nbsp;</p>
                        <div id="myCarousel" class="carousel slide">
                          <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                          </ol>
                          <!-- Carousel items -->
                          <div class="carousel-inner" style="height:150px;">
                            <div class="active item"><img src="http://twitter.github.io/bootstrap/assets/img/bootstrap-mdo-sfmoma-01.jpg">
                                <div class="carousel-caption">
                                    <h4>图1</h4>
                                    <p>photowall上线啦</p>
                                </div>
                            </div>
                            <div class="item"><img src="http://twitter.github.io/bootstrap/assets/img/bootstrap-mdo-sfmoma-02.jpg"></div>
                            <div class="item"><img src="http://twitter.github.io/bootstrap/assets/img/bootstrap-mdo-sfmoma-03.jpg"></div>
                          </div>
                          <!-- Carousel nav -->
                          <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
                          <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
                        </div>
                    </div><!--span8>span12-1 ends-->
                </div>
            	<div class="row-fluid">
                	<div class="line_holder">
                    	<p></p>
                    </div>
                </div>
            	<div class="row-fluid">
                    <div class="span12 bg-gray">
                        <div class="tabbable">
                            <ul class="red-bar nav nav-tabs" id="myTabs">
                                <li class="active"><a href="#home" data-toggle="tab">贴友墙动态 <span class="badge">{#$index_friends_movement#}</span></a></li>
                                <li><a href="#bar" data-toggle="tab">照片墙动态 <span class="badge">1</span></a></li>
                            </ul>

                            <div class="news-box tab-content">
                                <div class="tab-pane active" id="home">
                                	{#section name=index loop=$result_friend_movement#}
                                	<div class="row-fluid photo-info">
                                        <div class="span4">
                                            <a href="#myModal" class="no-link offset1" data-toggle="modal">
                                                <img onclick="see_single_photo(this);" src="{#$result_friend_movement[index].photo_path#}" class="img-polaroid img-large"/>
                                            </a>
                                        </div>
                                        <div class="span7">
                                            <h5>{#$result_friend_movement[index].marker_nick_name#}</h5>
                                            <p>于{#$result_friend_movement[index].date#}上传<span class="text-error">1</span>张新照片！</p>
                                            <p>通过网页版客户端</p>
                                            <i class="icon-map-marker"></i><a class="location" href="#">五四广场</a>
                                            <hr/>
                                        </div>
                                    </div>
                                	{#/section#}
                                    <div class="row-fluid photo-info">
                                        <div class="span4">
                                            <a href="#myModal" class="no-link offset1" data-toggle="modal">
                                                <img onclick="see_single_photo(this);" src="../../View/resources/img/follower/profile_img_test1.png" class="img-polaroid img-large"/>
                                            </a>
                                        </div>
                                        <div class="span7">
                                            <h5>ANGLED1</h5>
                                            <p>于2012年12月10日11:36上传<span class="text-error">3</span>张新照片！</p>
                                            <p>通过网页版客户端</p>
                                            <i class="icon-map-marker"></i><a class="location" href="#">五四广场</a>
                                            <hr/>
                                        </div>
                                    </div>
                                    <!--single img-info-->
                                    
                                    <!--single img-info-->
                                    <div class="pagination pagination-centered">
                                        <ul>
                                            <li><a href="#">&laquo;</a></li>
                                            <li class="disabled"><a href="#">{#$index_ptw_movement#}</a></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li><a href="#">4</a></li>
                                            <li><a href="#">5</a></li>
                                            <li><a href="#">&raquo;</a></li>
                                        </ul>
                                    </div>
                                </div><!--tab1 ends-->
                                <div class="tab-pane" id="bar">
                                	{#section name=index loop=$result_photowall_movement#}
                                	<div class="row-fluid photo-info">
                                        <div class="span4">
                                            <a href="#myModal" class="no-link offset1" data-toggle="modal">
                                                <img onclick="see_single_photo(this);" src="{#$result_photowall_movement[index].one_of_photo_path#}" class="img-polaroid img-large"/>
                                            </a>
                                        </div>
                                        <div class="span7">
                                            <h5>{#$result_photowall_movement[index].nick_name#}</h5>
                                            <p>于{#$result_photowall_movement[index].date#}上传<span class="text-error">{#$result_photowall_movement[index].photo_uploaded_amount#}</span>张新照片！</p>
                                            <p>通过网页版客户端</p>
                                            <i class="icon-map-marker"></i><a class="location" href="#">五四广场</a>
                                            <hr/>
                                        </div>
                                    </div>
                                	{#/section#}
                                    <div class="row-fluid photo-info">
                                        <div class="span4">
                                            <a href="#myModal" class="no-link offset1" data-toggle="modal">
                                                <img src="../../View/resources/img/follower/profile_img_test1.png" class="img-polaroid img-large"/>
                                            </a>
                                        </div>
                                        <div class="span7">
                                            <h5>BrianHan</h5>
                                            <p>于2012年12月10日11:36上传<span class="text-error">3</span>张新照片！</p>
                                            <p>通过网页版客户端</p>
                                            <i class="icon-map-marker"></i><a class="location" href="#">五四广场</a>
                                            <hr/>
                                        </div>
                                    </div>
                                    
                                    <!--single img-info-->
                                    <div class="row-fluid photo-info">
                                        <div class="line_holder"></div>
                                        <div class="span4">
                                            <div class="span1"></div>
                                            <img src="../../View/resources/img/follower/profile_img_test1.png" class="img-polaroid img-large"/>
                                        </div>
                                        <div class="span7">
                                            <h5>Bill2</h5>
                                            <p>于2012年12月10日11:36上传<span class="text-error">3</span>张新照片！</p>
                                            <p>通过网页版客户端</p>
                                            <i class="icon-map-marker"></i><a class="location" href="#">五四广场</a>
                                            <hr/>
                                        </div>
                                    </div><!--single img-info-->
                                    
                                    <!--single img-info-->
                                    <div class="pagination pagination-centered">
                                        <ul>
                                            <li><a href="#">&laquo;</a></li>
                                            <li class="disabled"><a href="#">1</a></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li><a href="#">4</a></li>
                                            <li><a href="#">5</a></li>
                                            <li><a href="#">&raquo;</a></li>
                                        </ul>
                                    </div>
                                </div><!--tab2 ends-->
                            </div><!--table content ends-->
                        </div>
                    </div><!--span8>span12-2 ends-->
                </div>
            </div><!--left col end-->
            <div class="span4"><!--right col-->
                <div class="row-fluid"><!--personal info-->
                    <div class="span12 bg-gray">
                        <div class="line_holder"></div>
                        <div class="span7">
                            <img src="{#$head_photo_big_thumbnail#}" class="img-polaroid img-large"/>
                            <p></p>
                            <i class="icon-map-marker"></i><a class="location" href="#">{#$location#}</a>
                            <p></p>
                        </div>
                        <div class="span4">
                            <br />
                            <h4>{#$nick_name#}</h4>
                            <h5 class="vip">VIP</h5>
                            <p></p>
                            <i class="icon-star"></i><h6>&nbsp;关注&nbsp;&nbsp;</h6><h6>{#$concern#}</h6><br />
                            <i class="icon-heart"></i><h6>&nbsp;粉丝&nbsp;&nbsp;</h6><h6>{#$fans#}</h6><br />
                            <i class="icon-user"></i><h6>&nbsp;贴友&nbsp;&nbsp;</h6><h6>{#$friends#}</h6><br />
                        </div>
                    </div>
                </div><!--personal info end -->
				<div class="row-fluid">
                	<div class="line_holder">
                    	<p></p>
                    </div>
                </div>                
                <div class="row-fluid"><!--recommended friend-->
                    <div class="span12 bg-gray">
                        <div class="span12 red-bar">
                            <div class="span4">
                                <a href="#"><p class="bar-title">贴友圈子</p></a>
                            </div>
                        </div><!--red top bar of the block end-->
                        <div class="span12">
                        	{#foreach key=k item=index from=$recommendation_friends#}
                        	<div class="row-fluid rec-friend">
                                <div class="line_holder"></div>
                            	<div class="span4">
                                	<img src="{$recommendation_friends[$k].head_photo}" class="img-polaroid  img-mid"/>
                                </div>
                                <div class="span5">
                                	<h5>{#$recommendation_friends[$k].nick_name#}</h5>
                                    <p class="no-space">有<span class="text-error">{#$recommendation_friends[$k].common_friends_num#}</span>个共同贴友</p>
                        			<i class="icon-map-marker"></i><a class="location" href="#">{#$recommendation_friends[$k].province#},{#$recommendation_friends[$k].city#}</a>
                                </div>
                                <div class="span2">
                                	<a href="#"><p class="no-space">忽略</p></a>
                                    <a href="#"><p>关注</p></a>
                                </div>
                            </div>
                        	{#/foreach#}
                        	<div class="row-fluid rec-friend">
                                <div class="line_holder"></div>
                            	<div class="span4">
                                	<img src="../../View/resources/img/follower/profile_img_test1.png" class="img-polaroid  img-mid"/>
                                </div>
                                <div class="span5">
                                	<h5>刘嘉阳</h5>
                                    <p class="no-space">有<span class="text-error">8</span>个共同贴友</p>
                        			<i class="icon-map-marker"></i><a class="location" href="#">青岛，中国</a>
                                </div>
                                <div class="span2">
                                	<a href="#"><p class="no-space">忽略</p></a>
                                    <a href="#"><p>关注</p></a>
                                </div>
                            </div><!--single recommended friend info end-->
                        	<div class="row-fluid rec-friend">
                                <div class="line_holder"></div>
                            	<div class="span4">
                                	<img src="../../View/resources/img/follower/profile_img_test1.png" class="img-polaroid  img-mid"/>
                                </div>
                                <div class="span5">
                                	<h5>孙小圣</h5>
                                    <p class="no-space">有<span class="text-error">6</span>个共同贴友</p>
                        			<i class="icon-map-marker"></i><a class="location" href="#">青岛，中国</a>
                                </div>
                                <div class="span2">
                                	<a href="#"><p class="no-space">忽略</p></a>
                                    <a href="#"><p>关注</p></a>
                                </div>
                            </div><!--single recommended friend info end-->
                        	<div class="row-fluid rec-friend">
                                <div class="line_holder"></div>
                            	<div class="span4">
                                	<img src="../../View/resources/img/follower/profile_img_test1.png" class="img-polaroid  img-mid"/>
                                </div>
                                <div class="span5">
                                	<h5>张小懒</h5>
                                    <p class="no-space">有<span class="text-error">4</span>个共同贴友</p>
                        			<i class="icon-map-marker"></i><a class="location" href="#">青岛，中国</a>
                                </div>
                                <div class="span2">
                                	<a href="#"><p class="no-space">忽略</p></a>
                                    <a href="#"><p>关注</p></a>
                                </div>
                            </div><!--single recommended friend info end-->
                        	<div class="row-fluid rec-friend">
                                <div class="line_holder"></div>
                            	<div class="span4">
                                	<img src="../../View/resources/img/follower/profile_img_test1.png" class="img-polaroid  img-mid"/>
                                </div>
                                <div class="span5">
                                	<h5>韩</h5>
                                    <p class="no-space">有<span class="text-error">2</span>个共同贴友</p>
                        			<i class="icon-map-marker"></i><a class="location" href="#">青岛，中国</a>
                                </div>
                                <div class="span2">
                                	<a href="#"><p class="no-space">忽略</p></a>
                                    <a href="#"><p>关注</p></a>
                                </div>
                            </div><!--single recommended friend info end-->
                        	<div class="row-fluid rec-friend">
                                <div class="line_holder"></div>
                            	<div class="span4">
                                	<img src="../../View/resources/img/follower/profile_img_test1.png" class="img-polaroid  img-mid"/>
                                </div>
                                <div class="span5">
                                	<h5>SISI</h5>
                                    <p class="no-space">有<span class="text-error">1</span>个共同贴友</p>
                        			<i class="icon-map-marker"></i><a class="location" href="#">青岛，中国</a>
                                </div>
                                <div class="span2">
                                	<a href="#"><p class="no-space">忽略</p></a>
                                    <a href="#"><p>关注</p></a>
                                </div>
                            </div><!--single recommended friend info end-->
                            <div class="line_holder"></div>
                        </div>
                    </div>
                </div><!--recommended friend end-->
				<div class="row-fluid">
                	<div class="line_holder">
                    	<p></p>
                    </div>
                </div>                
                <div class="row-fluid"><!--same-interest friend-->
                    <div class="span12 bg-gray">
                        <div class="span12 red-bar">
                            <div class="span4">
                                <a href="#"><p class="bar-title">兴趣圈子</p></a>
                            </div>
                        </div><!--red top bar of the block end-->
                        <div class="span12">
                        	<div class="row-fluid rec-friend">
                                <div class="line_holder"></div>
                            	<div class="span4">
                                	<img src="../../View/resources/img/follower/profile_img_test1.png" class="img-polaroid  img-mid"/>
                                </div>
                                <div class="span5">
                                	<h5>刘嘉阳</h5>
                                    <p class="no-space">有<span class="text-error">8</span>个共同兴趣标签</p>
                        			<i class="icon-map-marker"></i><a class="location" href="#">青岛，中国</a>
                                </div>
                                <div class="span2">
                                	<a href="#"><p class="no-space">忽略</p></a>
                                    <a href="#"><p>关注</p></a>
                                </div>
                            </div><!--single recommended friend info end-->
                        	<div class="row-fluid rec-friend">
                                <div class="line_holder"></div>
                            	<div class="span4">
                                	<img src="../../View/resources/img/follower/profile_img_test1.png" class="img-polaroid  img-mid"/>
                                </div>
                                <div class="span5">
                                	<h5>孙小圣</h5>
                                    <p class="no-space">有<span class="text-error">6</span>个共同兴趣标签</p>
                        			<i class="icon-map-marker"></i><a class="location" href="#">青岛，中国</a>
                                </div>
                                <div class="span2">
                                	<a href="#"><p class="no-space">忽略</p></a>
                                    <a href="#"><p>关注</p></a>
                                </div>
                            </div><!--single recommended friend info end-->
                        	<div class="row-fluid rec-friend">
                                <div class="line_holder"></div>
                            	<div class="span4">
                                	<img src="../../View/resources/img/follower/profile_img_test1.png" class="img-polaroid  img-mid"/>
                                </div>
                                <div class="span5">
                                	<h5>张小懒</h5>
                                    <p class="no-space">有<span class="text-error">4</span>个共同兴趣标签</p>
                        			<i class="icon-map-marker"></i><a class="location" href="#">青岛，中国</a>
                                </div>
                                <div class="span2">
                                	<a href="#"><p class="no-space">忽略</p></a>
                                    <a href="#"><p>关注</p></a>
                                </div>
                            </div><!--single recommended friend info end-->
                        	<div class="row-fluid rec-friend">
                                <div class="line_holder"></div>
                            	<div class="span4">
                                	<img src="../../View/resources/img/follower/profile_img_test1.png" class="img-polaroid  img-mid"/>
                                </div>
                                <div class="span5">
                                	<h5>韩</h5>
                                    <p class="no-space">有<span class="text-error">2</span>个共同兴趣标签</p>
                        			<i class="icon-map-marker"></i><a class="location" href="#">青岛，中国</a>
                                </div>
                                <div class="span2">
                                	<a href="#"><p class="no-space">忽略</p></a>
                                    <a href="#"><p>关注</p></a>
                                </div>
                            </div><!--single recommended friend info end-->
                        	<div class="row-fluid rec-friend">
                                <div class="line_holder"></div>
                            	<div class="span4">
                                	<img src="../../View/resources/img/follower/profile_img_test1.png" class="img-polaroid  img-mid"/>
                                </div>
                                <div class="span5">
                                	<h5>SISI</h5>
                                    <p class="no-space">有<span class="text-error">1</span>个共同兴趣标签</p>
                        			<i class="icon-map-marker"></i><a class="location" href="#">青岛，中国</a>
                                </div>
                                <div class="span2">
                                	<a href="#"><p class="no-space">忽略</p></a>
                                    <a href="#"><p>关注</p></a>
                                </div>
                            </div><!--single recommended friend info end-->
                            <div class="line_holder"></div>
                        </div>
                    </div>
                </div><!--same-interest friend end-->

            </div><!--right col end-->
        </div>
        
	</div><!--main_content ends-->
<?php include '../temp/hardestfooter.inc'?>