<?php
/**
 * 外送系统
 * @author 微信魔方
 * @QQ 278869155 * @url http://weizan.52jscn.com/
 */
defined('IN_IA') or exit('Access Denied');
global $_W, $_GPC;
$do = 'share';
$this->checkAuth();
$op = trim($_GPC['op']) ? trim($_GPC['op']) : 'index';

if($op == 'index') {

}

include $this->template('share');
