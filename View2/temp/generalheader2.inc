</head>
<body>
<div class="wrapper">
    <div class="header">
        <!--nav bar starts-->
        <div id="nav_bar">
            <div class="banner">
            	<div id="page_name"><p>个人主页</p><br /><p>HOMEPAGE</p></div>
            	<img class="logo" src="../../View/resources/img/logo_login.png" width="270px" height="108px" alt="photowall" longdesc="http://www.photowall.cc">
            </div>
        <ul id="nav">
            <li class="current"><a href="../home/home.php" style="width:20px;"><i class="icon-home icon-white"></i></a></li>
            <li><a href="#">我的墙</a>
                <ul>
                    <li><a href="#">展示墙</a>
                    <!--
                        <ul>
                            <li><a href="#">Sub-Level Item</a></li>
                            <li><a href="#">Sub-Level Item</a>
                                <ul>
                                    <li><a href="#">Sub-Level Item</a></li>
                                    <li><a href="#">Sub-Level Item</a></li>
                                    <li><a href="#">Sub-Level Item</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Sub-Level Item</a></li>
                        </ul>
                        </ul>-->
                    </li>
                    <li><a href="#">贴友墙</a></li>
                </ul>
            </li>
            <li><a href="../relation/profile_people.php?see_what=null">贴友薄</a>
                <ul>
                    <li><a href="../relation/profile_people.php?see_what=friends">我的贴友</a></li>
                    <li><a href="../relation/profile_people.php?see_what=concerns">我的关注</a></li>
                    <li><a href="../relation/profile_people.php?see_what=fans">我的粉丝</a></li>
                </ul>
            </li>
            <li><a href="#">个人资料</a>
                <ul>
                    <li><a href="../profile/profile_form.php">详细资料</a></li>
                    <li><a href="#">个人头像</a></li>
                </ul>
            </li>
            <li><a href="#">设置中心</a>
                <ul>
                    <li><a href="#">账号</a></li>
                    <li><a href="#">安全</a></li>
                    <li><a href="#">隐私</a></li>
                    <li><a href="#">绑定</a></li>
                </ul>
            </li>
			<li style="width:250px; height:34px;">
                <form method="get" action="/search" id="search">
                  	<input name="q" type="text" size="30" placeholder="搜索-贴友/粉丝/关注" />
                    <button type="submit" class="btn btn-nav" value="submit"><i class="icon-search"></i></button>
                </form>
            </li>
            <li class="current">
                <a href="#photoUploadOption" data-toggle="modal" style="width:15px; margin-left:30px;"><i class="icon-camera icon-white"></i></a>
            </li>
        </ul>
        </div>
       <!--nav bar ends-->
    </div>