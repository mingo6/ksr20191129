<?php
defined('IN_IA') || exit('Access Denied');
global $_W;
global $_GPC;
$op = ((trim($_GPC['op']) ? trim($_GPC['op']) : 'index'));
if ($op == 'index') 
{
	$_W['page']['title'] = '跑腿设置';
	if ($_W['ispost']) 
	{
		$errander = array( 'status' => intval($_GPC['status']), 'close_reason' => trim($_GPC['close_reason']), 'map' => array('location_x' => trim($_GPC['map']['lat']), 'location_y' => trim($_GPC['map']['lng'])), 'city' => trim($_GPC['city']), 'serve_radius' => floatval($_GPC['serve_radius']), 'mobile' => trim($_GPC['mobile']), 'pay_time_limit' => intval($_GPC['pay_time_limit']), 'handle_time_limit' => intval($_GPC['handle_time_limit']), 'auto_success_hours' => intval($_GPC['auto_success_hours']), 'delivery_before_limit' => intval($_GPC['delivery_before_limit']), 'delivery_timeout_limit' => intval($_GPC['delivery_timeout_limit']), 'auto_refresh' => intval($_GPC['auto_refresh']), 'verification_code' => intval($_GPC['verification_code']), 'dispatch_mode' => intval($_GPC['dispatch_mode']), 'can_collect_order' => intval($_GPC['can_collect_order']), 'deliveryer_fee_type' => intval($_GPC['deliveryer_fee_type']), 'deliveryer_collect_max' => intval($_GPC['deliveryer_collect_max']), 'over_collect_max_notify' => intval($_GPC['over_collect_max_notify']), 'deliveryer_transfer_status' => intval($_GPC['deliveryer_transfer_status']), 'deliveryer_transfer_max' => intval($_GPC['deliveryer_transfer_max']), 'deliveryer_transfer_reason' => explode("\n", trim($_GPC['deliveryer_transfer_reason'])), 'deliveryer_cancel_reason' => explode("\n", trim($_GPC['deliveryer_cancel_reason'])) );
		$order['deliveryer_transfer_reason'] = array_filter($order['deliveryer_transfer_reason'], trim);
		$order['deliveryer_cancel_reason'] = array_filter($order['deliveryer_cencel_reason'], trim);
		if ($errander['deliveryer_fee_type'] == 1) 
		{
			$errander['deliveryer_fee'] = trim($_GPC['deliveryer_fee_1']);
		}
		else if ($errander['deliveryer_fee_type'] == 2) 
		{
			$errander['deliveryer_fee'] = trim($_GPC['deliveryer_fee_2']);
		}
		else if ($errander['deliveryer_fee_type'] == 3) 
		{
			$errander['deliveryer_fee'] = array('start_fee' => floatval($_GPC['deliveryer_fee_3']['start_fee']), 'start_km' => floatval($_GPC['deliveryer_fee_3']['start_km']), 'pre_km' => floatval($_GPC['deliveryer_fee_3']['pre_km']), 'max_fee' => floatval($_GPC['deliveryer_fee_3']['max_fee']));
		}
		$errander['anonymous'] = array();
		if (!(empty($_GPC['anonymous']))) 
		{
			foreach ($_GPC['anonymous'] as $anonymous ) 
			{
				if (empty($anonymous)) 
				{
					continue;
				}
				$errander['anonymous'][] = $anonymous;
			}
		}
		set_plugin_config('errander', $errander);
		set_config_text('跑腿服务用户协议', 'agreement_errander', htmlspecialchars_decode($_GPC['agreement']));
		imessage(error(0, '设置跑腿服务参数成功'), 'refresh', 'ajax');
	}
	$config_errander = get_plugin_config('errander');
	$config_errander['map']['lat'] = $config_errander['map']['location_x'];
	$config_errander['map']['lng'] = $config_errander['map']['location_y'];
	if (!(empty($config_errander['deliveryer_transfer_reason']))) 
	{
		$config_errander['deliveryer_transfer_reason'] = implode("\n", $config_errander['deliveryer_transfer_reason']);
	}
	if (!(empty($config_errander['deliveryer_cancel_reason']))) 
	{
		$config_errander['deliveryer_cancel_reason'] = implode("\n", $config_errander['deliveryer_cancel_reason']);
	}
	$agreement_errander = get_config_text('agreement_errander');
}
include itemplate('config');
?>