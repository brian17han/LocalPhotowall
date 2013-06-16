<?php session_start();
require_once('../../connector.ini.php');
require_once('../../Controller/Validation/validate_string.php');
$smarty->display("album/album_form.html");
