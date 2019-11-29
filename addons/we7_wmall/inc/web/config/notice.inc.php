<?php
defined('IN_IA') || exit('Access Denied');
global $_W;
global $_GPC;
$op = ((trim($_GPC['op']) ? trim($_GPC['op']) : 'wxtemplate'));
if ($op == 'wxtemplate') 
{
	$_W['page']['title'] = '微信模板消息';
	if ($_W['ispost']) 
	{
		$public_tpl = ((trim($_GPC['wechat']['public_tpl']) ? trim($_GPC['wechat']['public_tpl']) : imessage(error(-1, '订单状态变更模板不能为空'), '', 'ajax')));
		$wx_template = $_GPC['wechat'];
		set_system_config('notice.wechat', $wx_template);
		imessage(error(0, '微信模板消息设置成功'), referer(), 'ajax');
	}
	$wechat = $_config['notice']['wechat'];
	include itemplate('config/notice-wechat');
}
if ($op == 'wxtemplate_init') 
{
	$_W['page']['title'] = '微信模板消息';
	$templates = array( 'TM00017' => array('id' => 'TM00017', 'title' => '订单状态变更', 'name' => 'public_tpl') );
	mload()->classs('wxaccount');
	$acc = new WxAccount();
	$error = array();
	$wx_template = $_config['notice']['wechat'];
	foreach ($templates as $template ) 
	{
		$result = $acc->api_add_template($template['id']);
		if (is_error($result)) 
		{
			$error[] = $template['title'] . '模板添加失败:' . $result['message'];
		}
		else 
		{
			$wx_template[$template['name']] = $result;
		}
	}
	set_system_config('notice.wechat', $wx_template);
	if (!(empty($error))) 
	{
		imessage(error(-1, implode('<br>', $error)), referer(), 'ajax');
	}
	else 
	{
		imessage(error(0, '模板消息设置成功'), referer(), 'ajax');
	}
	include itemplate('config/notice-wechat');
}
if ($op == 'sms') 
{
	$_W['page']['title'] = '短信消息';
	if ($_W['ispost']) 
	{
		$data = array( 'clerk' => array('status' => intval($_GPC['clerk']['status']), 'tts_code' => trim($_GPC['clerk']['tts_code']), 'called_show_num' => trim($_GPC['clerk']['called_show_num'])), 'deliveryer' => array('status' => intval($_GPC['deliveryer']['status']), 'tts_code' => trim($_GPC['deliveryer']['tts_code']), 'called_show_num' => trim($_GPC['deliveryer']['called_show_num'])), 'errander_deliveryer' => array('status' => intval($_GPC['errander_deliveryer']['status']), 'version' => intval($_GPC['errander_deliveryer']['version']), 'tts_code' => trim($_GPC['errander_deliveryer']['tts_code']), 'called_show_num' => trim($_GPC['errander_deliveryer']['called_show_num'])), 'work_status_change' => array('status' => intval($_GPC['work_status_change']['status']), 'version' => intval($_GPC['work_status_change']['version']), 'tts_code' => trim($_GPC['work_status_change']['tts_code']), 'called_show_num' => trim($_GPC['work_status_change']['called_show_num'])) );
		set_system_config('notice.sms', $data);
		imessage(error(0, '微信模板消息设置成功'), referer(), 'ajax');
	}
	$sms = $_config['notice']['sms'];
	include itemplate('config/notice-sms');
}
?>