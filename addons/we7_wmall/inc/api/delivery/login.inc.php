<?php
defined('IN_IA') || exit('Access Denied');
global $_W;
global $_GPC;
$_POST = &$_POST;
$mobile = trim($_POST['mobile']);
$password = trim($_POST['password']);
if (empty($mobile) || empty($password)) 
{
	message(ierror(-1, '手机号或密码为空'), '', 'ajax');
}
$deliveryer = deliveryer_login($mobile, $password);
message($deliveryer, '', 'ajax');
?>