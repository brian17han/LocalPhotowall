<?php /* Smarty version Smarty-3.0.8, created on 2013-06-13 14:20:43
         compiled from "D:/xampp/htdocs/Local_Photowall/View\login/login_form.html" */ ?>
<?php /*%%SmartyHeaderCode:1102451b9d53b7840a1-25879676%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '41bdf051326f2c1425f76bc4369a6b0e038a4197' => 
    array (
      0 => 'D:/xampp/htdocs/Local_Photowall/View\\login/login_form.html',
      1 => 1369623032,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1102451b9d53b7840a1-25879676',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<script>
		function goto_register_form()
		{
			window.location.href="../register/register_form.php";
		}
	</script>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Photowall-用户登录</title>
    <link rel="stylesheet" type="text/css" href="../../View/resources/css/login.css">
    <link rel="stylesheet" type="text/css" href="../../View/resources/css/bootstrap.css">
    <script type="text/javascript" src="../../View/resources/js/bootstrap.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
    <script src="http://twitter.github.com/bootstrap/assets/js/bootstrap-tooltip.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $(".shadow-input").tooltip({
                'trigger': 'focus',
                'placement': 'left'
            });
        });
    </script>

</head>
<body>
<div class="wrapper">
    <div class="header">
        <div class="banner">
            <img src="../../View/resources/img/logo_login.png" width="311" height="126" alt="photowall" longdesc="http://www.photowall.cc"/>
        </div>
    </div>
    <div class="main_content row-fluid">
        <div class="login span4 offset4">
            <form id="login_form" action="login_action.php" method="post" class="form-horizontal text-center">
            	<input type="hidden" name="submit_test" value="submit_test" />
                <div class="control-group">
                    <div class="controls">
                        <input type="text" class="shadow-input"id="login_name" name="login_name" title="登陆账号" placeholder="登陆账号">
                    </div>
                </div>
                <div class="control-group no-space">
                    <div class="controls">
                        <input type="password" class="shadow-input" id="password" name="password" title="登陆密码" placeholder="登陆密码">
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <label class="checkbox inline" for="remember_me" title="为了确保您的信息安全，请不要在网吧或者公共机房勾选此项!">
                            <input type="checkbox" name="remember_me" value="remember_me"> 下次自动登录
                        </label>
                        <label class="checkbox inline" for="forget_pwd" title="找回忘记的密码!">
                            <a href="http://www.baidu.com" stats="forget_pwd" >忘记密码</a>
                        </label>
                        <label class="space20"></label>
                        <button type="submit" class="btn btn-primary btn-large"  value="submit">登陆</button>
                        <button type="button" class="btn btn-large offset1"  value="register" onclick="goto_register_form()"><a href="../register/register_form.php">注册</a></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="footer">
    	<div class="copyright">
        	<p>Copyright? 2012-2022 Photowall Inc, All Rights Reserved.</p>
            <p>照片墙 版权所有 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;版本：1.0.0</p>
            <a href="http://www.tangerteq.com"><p>Powered by Tanger TEQ LLC.</p></a>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<!--Effect script-->
<script>
        $('.link').tooltip();
</script>
</body>
</html>