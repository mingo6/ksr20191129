<?php
defined('IN_IA') || exit('Access Denied');
function is_favorite_store($sid, $uid = 0) 
{
	global $_W;
	if (empty($uid)) 
	{
		$uid = $_W['member']['uid'];
	}
	$is_ok = pdo_get('tiny_wmall_store_favorite', array('sid' => $sid, 'uid' => $uid));
	if (!(empty($is_ok))) 
	{
		return true;
	}
	return false;
}
function store_set_data($sid, $key, $value) 
{
	global $_W;
	$data = store_get_data($sid);
	$keys = explode('.', $key);
	$counts = count($keys);
	if ($counts == 1) 
	{
		$data[$keys[0]] = $value;
	}
	else if ($counts == 2) 
	{
		if (!(is_array($data[$keys[0]]))) 
		{
			$data[$keys[0]] = array();
		}
		$data[$keys[0]][$keys[1]] = $value;
	}
	else if ($counts == 3) 
	{
		if (!(is_array($data[$keys[0]]))) 
		{
			$data[$keys[0]] = array();
		}
		else if (!(is_array($data[$keys[0]][$keys[1]]))) 
		{
			$data[$keys[0]][$keys[1]] = array();
		}
		$data[$keys[0]][$keys[1]][$keys[2]] = $value;
	}
	pdo_update('tiny_wmall_store', array('data' => iserializer($data)), array('uniacid' => $_W['uniacid'], 'id' => $sid));
	return true;
}
function store_get_data($sid, $key = '') 
{
	global $_W;
	$store = pdo_get('tiny_wmall_store', array('uniacid' => $_W['uniacid'], 'id' => $sid), array('data'));
	$data = iunserializer($store['data']);
	if (!(is_array($data))) 
	{
		$data = array();
	}
	if (empty($key)) 
	{
		return $data;
	}
	$keys = explode('.', $key);
	$counts = count($keys);
	if ($counts == 1) 
	{
		return $data[$key];
	}
	if ($counts == 2) 
	{
		return $data[$keys[0]][$keys[1]];
	}
	if ($counts == 3) 
	{
		return $data[$keys[0]][$keys[1]][$keys[1]];
	}
	return true;
}
function clerk_manage($id) 
{
	global $_W;
	$perm = pdo_getall('tiny_wmall_store_clerk', array('uniacid' => $_W['uniacid'], 'clerk_id' => $id, 'role' => 'manager'), array(), 'sid');
	if (empty($perm)) 
	{
		return array();
	}
	return array_keys($perm);
}
function store_fetch($id, $field = array()) 
{
	global $_W;
	if (empty($id)) 
	{
		return false;
	}
	$field_str = '*';
	if (!(empty($field))) 
	{
		$field_str = implode(',', $field);
	}
	$data = pdo_fetch('SELECT ' . $field_str . ' FROM ' . tablename('tiny_wmall_store') . ' WHERE uniacid = :uniacid AND id = :id', array(':uniacid' => $_W['uniacid'], ':id' => $id));
	if (empty($data)) 
	{
		return error(-1, '门店不存在或已删除');
	}
	$data['origin_logo'] = $data['logo'];
	$data['logo'] = tomedia($data['logo']);
	$data['delivery_title'] = (($data['delivery_mode'] == 2 ? $_W['we7_wmall']['config']['mall']['delivery_title'] : ''));
	$cid = array_filter(explode('|', $data['cid']));
	$cid = implode(',', $cid);
	if (!(empty($data['cid'])) && !(empty($cid))) 
	{
		$category = pdo_fetchall('select title from ' . tablename('tiny_wmall_store_category') . ' where uniacid = :uniacid and id in (' . $cid . ')', array(':uniacid' => $_W['uniacid']));
		$data['category'] = array();
		if (!(empty($category))) 
		{
			foreach ($category as $val ) 
			{
				$data['category'][] = $val['title'];
			}
			$data['category'] = implode('、', $data['category']);
		}
	}
	$se_fileds = array('thumbs', 'delivery_areas', 'delivery_extra', 'sns', 'payment', 'business_hours', 'remind_reply', 'qualification', 'comment_reply', 'wechat_qrcode', 'custom_url', 'serve_fee', 'order_note', 'delivery_times', 'data');
	foreach ($se_fileds as $se_filed ) 
	{
		if (isset($data[$se_filed])) 
		{
			if (!(in_array($se_filed, array('thumbs', 'delivery_areas')))) 
			{
				$data[$se_filed] = (array) iunserializer($data[$se_filed]);
			}
			else 
			{
				$data[$se_filed] = iunserializer($data[$se_filed]);
			}
		}
	}
	$data['is_in_business_hours'] = intval($data['is_in_business']);
	if (isset($data['business_hours'])) 
	{
		if ($data['is_in_business'] == 1) 
		{
			$data['is_in_business_hours'] = $data['is_in_business_hours'] && store_is_in_business_hours($data['business_hours']);
		}
		$hour = array();
		foreach ($data['business_hours'] as $li ) 
		{
			if (!(is_array($li))) 
			{
				continue;
			}
			$hour[] = $li['s'] . '~' . $li['e'];
		}
		$data['business_hours_cn'] = implode(',', $hour);
	}
	if (isset($data['score'])) 
	{
		$data['score_cn'] = round($data['score'] / 5, 2) * 100;
	}
	if (isset($data['delivery_fee_mode'])) 
	{
		if ($data['delivery_fee_mode'] == 1) 
		{
			$data['order_address_limit'] = 1;
			if (!($data['not_in_serve_radius']) && (0 < $data['serve_radius'])) 
			{
				$data['order_address_limit'] = 2;
			}
		}
		else if ($data['delivery_fee_mode'] == 2) 
		{
			$data['delivery_price_extra'] = iunserializer($data['delivery_price']);
			$data['delivery_price'] = $data['delivery_price_extra']['start_fee'];
			if (!($data['not_in_serve_radius']) && (0 < $data['serve_radius'])) 
			{
				$data['order_address_limit'] = 2;
			}
			else 
			{
				$data['order_address_limit'] = 3;
			}
		}
		else if ($data['delivery_fee_mode'] == 3) 
		{
			$data['order_address_limit'] = 4;
			$price = store_order_condition($data);
			$data['delivery_price'] = $price['delivery_price'];
			$data['send_price'] = $price['send_price'];
		}
	}
	if (isset($data['data'])) 
	{
		$data['data'] = iunserializer($data['data']);
	}
	return $data;
}
function store_manager($sid) 
{
	global $_W;
	$perm = pdo_get('tiny_wmall_store_clerk', array('uniacid' => $_W['uniacid'], 'sid' => $sid, 'role' => 'manager'));
	$clerk = array();
	if (!(empty($perm))) 
	{
		$clerk = pdo_get('tiny_wmall_clerk', array('uniacid' => $_W['uniacid'], 'id' => $perm['clerk_id']));
	}
	return $clerk;
}
function store_fetchall($field = array()) 
{
	global $_W;
	$field_str = '*';
	if (!(empty($field))) 
	{
		$field_str = implode(',', $field);
	}
	$data = pdo_fetchall('SELECT ' . $field_str . ' FROM ' . tablename('tiny_wmall_store') . ' WHERE uniacid = :uniacid', array(':uniacid' => $_W['uniacid']), 'id');
	$se_fileds = array('thumbs', 'sns', 'mobile_verify', 'payment', 'business_hours', 'thumbs', 'remind_reply', 'comment_reply', 'wechat_qrcode', 'custom_url');
	foreach ($se_fileds as $se_filed ) 
	{
		if (isset($data[$se_filed])) 
		{
			if ($se_filed != 'thumbs') 
			{
				$data[$se_filed] = (array) iunserializer($data[$se_filed]);
			}
			else 
			{
				$data[$se_filed] = iunserializer($data[$se_filed]);
			}
		}
	}
	if (isset($data['business_hours'])) 
	{
		$data['is_in_business_hours'] = store_is_in_business_hours($data['business_hours']);
		$hour = array();
		foreach ($data['business_hours'] as $li ) 
		{
			$hour[] = $li['s'] . '~' . $li['e'];
		}
		$data['business_hours_cn'] = implode(',', $hour);
	}
	if (isset($data['score'])) 
	{
		$data['score_cn'] = round($data['score'] / 5, 2) * 100;
	}
	return $data;
}
function store_fetchall_category() 
{
	global $_W;
	global $_GPC;
	$data = pdo_fetchall('select id,thumb,link,wxapp_link,title from ' . tablename('tiny_wmall_store_category') . ' where uniacid = :uniacid and agentid = :agentid and status = 1 order by displayorder desc', array(':uniacid' => $_W['uniacid'], ':agentid' => $_W['agentid']));
	if (!(empty($data))) 
	{
		foreach ($data as &$da ) 
		{
			$da['thumb'] = tomedia($da['thumb']);
			$da['is_sys'] = 0;
			if (empty($da['link'])) 
			{
				$da['is_sys'] = 1;
				$da['link'] = imurl('wmall/home/search', array('cid' => $da['id'], 'order' => $_GPC['order'], 'dis' => $_GPC['dis']));
			}
			if (empty($da['wxapp_link'])) 
			{
				$da['wxapp_link'] = 'pages/home/category?cid=' . $da['id'];
			}
		}
	}
	return $data;
}
function store_fetch_category() 
{
	global $_W;
	global $_GPC;
	$cid = intval($_GPC['cid']);
	$category = pdo_get('tiny_wmall_store_category', array('uniacid' => $_W['uniacid'], 'id' => $cid, 'status' => 1));
	if (!(empty($category))) 
	{
		if (!(empty($category['nav'])) && ($category['nav_status'] == 1)) 
		{
			$category['nav'] = iunserializer($category['nav']);
			foreach ($category['nav'] as &$value ) 
			{
				$value['thumb'] = tomedia($value['thumb']);
			}
		}
		if (!(empty($category['slide'])) && ($category['slide_status'] == 1)) 
		{
			$category['slide'] = iunserializer($category['slide']);
			array_sort($category['slide'], 'displayorder', SORT_DESC);
			foreach ($category['slide'] as &$v ) 
			{
				$v['thumb'] = tomedia($v['thumb']);
			}
		}
	}
	return $category;
}
function store_fetch_activity($sid, $type = array()) 
{
	global $_W;
	$condition = ' where uniacid = :uniacid and sid = :sid and status = 1';
	$params = array(':uniacid' => $_W['uniacid'], ':sid' => $sid);
	if (!(empty($type))) 
	{
		$type = implode('\',\'', $type);
		$type = '\'' . $type . '\'';
		$condition .= ' and type in (' . $type . ')';
	}
	$condition .= ' order by displayorder desc';
	$data = pdo_fetchall('SELECT title,type FROM ' . tablename('tiny_wmall_store_activity') . $condition, $params, 'type');
	$activity['num'] = count($data);
	$activity['items'] = $data;
	return $activity;
}
function store_is_in_business_hours($business_hours) 
{
	if (!(is_array($business_hours))) 
	{
		return true;
	}
	$business_hours_flag = false;
	foreach ($business_hours as $li ) 
	{
		if (!(is_array($li)) || empty($li['s']) || empty($li['e'])) 
		{
			continue;
		}
		$starttime = strtotime($li['s']);
		$endtime = strtotime($li['e']);
		if ($endtime <= $starttime) 
		{
			$endtime = $endtime + 86399;
		}
		$now = TIMESTAMP;
		if (($starttime <= $now) && ($now <= $endtime)) 
		{
			$business_hours_flag = true;
			break;
		}
	}
	return $business_hours_flag;
}
function store_business_hours_init($sid = 0) 
{
	global $_W;
	if (0 < $sid) 
	{
		$store = store_fetch($sid, array('business_hours', 'is_in_business'));
		$is_rest = 1;
		if ($store['is_in_business'] && store_is_in_business_hours($store['business_hours'])) 
		{
			$is_rest = 0;
		}
		pdo_update('tiny_wmall_store', array('is_rest' => $is_rest), array('uniacid' => $_W['uniacid'], 'id' => $sid));
	}
	else 
	{
		$stores = pdo_fetchall('select id,business_hours,is_in_business from ' . tablename('tiny_wmall_store') . ' where uniacid = :uniacid', array(':uniacid' => $_W['uniacid']));
		if (!(empty($stores))) 
		{
			foreach ($stores as $row ) 
			{
				$row['business_hours'] = iunserializer($row['business_hours']);
				$is_rest = 1;
				if ($row['is_in_business'] && store_is_in_business_hours($row['business_hours'])) 
				{
					$is_rest = 0;
				}
				pdo_update('tiny_wmall_store', array('is_rest' => $is_rest), array('uniacid' => $_W['uniacid'], 'id' => $row['id']));
			}
		}
	}
	return true;
}
function store_fetchall_goods_category($store_id, $status = '-1', $ignore_bargain = true, $type = 'parent', $category_type = 'all') 
{
	global $_W;
	$condition = ' where uniacid = :uniacid and sid = :sid';
	$params = array(':uniacid' => $_W['uniacid'], ':sid' => $store_id);
	if ($type == 'parent') 
	{
		$condition .= ' and parentid = 0';
	}
	if (0 <= $status) 
	{
		$condition .= ' and status = :status';
		$params[':status'] = $status;
	}
	$categorys = pdo_fetchall('select * from ' . tablename('tiny_wmall_goods_category') . $condition . ' order by displayorder desc, id asc', $params, 'id');
	if (($type == 'parent') && ($category_type == 'available')) 
	{
		foreach ($categorys as &$val ) 
		{
			if (!(empty($val['is_showtime']))) 
			{
				$now_week = date('N', TIMESTAMP);
				$start_time = intval(strtotime($val['start_time']));
				$end_time = intval(strtotime($val['end_time']));
				$week = explode(',', $val['week']);
				if ((!(empty($val['week'])) && !(in_array($now_week, $week))) || (!(empty($start_time)) && ((TIMESTAMP < $start_time) || ($end_time < TIMESTAMP)))) 
				{
					unset($categorys[$val['id']]);
				}
			}
		}
	}
	if ($type == 'all') 
	{
		foreach ($categorys as &$val ) 
		{
			if (!(empty($val['parentid']))) 
			{
				$categorys[$val['parentid']]['child'][] = $val;
				unset($categorys[$val['id']]);
			}
			else if ($category_type == 'available') 
			{
				if (!(empty($val['is_showtime']))) 
				{
					$now_week = date('N', TIMESTAMP);
					$start_time = intval(strtotime($val['start_time']));
					$end_time = intval(strtotime($val['end_time']));
					$week = explode(',', $val['week']);
					if ((!(empty($val['week'])) && !(in_array($now_week, $week))) || (!(empty($start_time)) && ((TIMESTAMP < $start_time) || ($end_time < TIMESTAMP)))) 
					{
						unset($categorys[$val['id']]);
					}
				}
			}
		}
	}
	else if ($type == 'other') 
	{
		foreach ($categorys as &$value ) 
		{
			$value['name'] = $value['title'];
			if (empty($value['parentid'])) 
			{
				if ($category_type == 'available') 
				{
					if (!(empty($value['is_showtime']))) 
					{
						$now_week = date('N', TIMESTAMP);
						$start_time = intval(strtotime($value['start_time']));
						$end_time = intval(strtotime($value['end_time']));
						$week = explode(',', $value['week']);
						if ((!(empty($value['week'])) && !(in_array($now_week, $week))) || (!(empty($start_time)) && ((TIMESTAMP < $start_time) || ($end_time < TIMESTAMP)))) 
						{
							unset($categorys[$value['id']]);
						}
					}
				}
				$parent[$value['id']] = $value;
			}
			else 
			{
				$child[$value['parentid']][$value['id']] = $value;
			}
		}
		unset($categorys);
		$categorys['parent'] = $parent;
		$categorys['child'] = $child;
	}
	if (!($ignore_bargain)) 
	{
		$condition = ' where uniacid = :uniacid and sid = :sid and status = :status order by id limit 2';
		$params = array(':uniacid' => $_W['uniacid'], ':sid' => $store_id, ':status' => 1);
		$bargains = pdo_fetchall('select id,title from ' . tablename('tiny_wmall_activity_bargain') . $condition, $params, 'id');
		if (!(empty($bargains))) 
		{
			foreach ($bargains as &$bargain ) 
			{
				array_unshift($categorys, array('id' => 'bargain_' . $bargain['id'], 'title' => $bargain['title'], 'bargain_id' => $bargain['id']));
			}
		}
	}
	foreach ($categorys as &$row ) 
	{
		$row['total'] = 0;
		if (!(isset($row['child'])) && defined('IN_VUE')) 
		{
			$row['child'] = array();
		}
	}
	return $categorys;
}
function get_goods_child_category($sid, $parentid) 
{
	global $_W;
	global $_GPC;
	if (empty($parentid)) 
	{
		$parentid = intval($_GPC['parentid']);
	}
	$child_category = pdo_fetchall('select id,title from' . tablename('tiny_wmall_goods_category') . 'where uniacid = :uniacid and sid = :sid and parentid = :parentid and status = 1 order by displayorder desc', array(':uniacid' => $_W['uniacid'], ':sid' => $sid, ':parentid' => $parentid));
	return $child_category;
}
function store_fetch_goods($id, $field = array('basic', 'options')) 
{
	global $_W;
	$goods = pdo_get('tiny_wmall_goods', array('uniacid' => $_W['uniacid'], 'id' => $id));
	if (empty($goods)) 
	{
		return error(-1, '商品不存在或已删除');
	}
	$goods['thumb_'] = tomedia($goods['thumb']);
	if (in_array('options', $field) && $goods['is_options']) 
	{
		$goods['options'] = pdo_getall('tiny_wmall_goods_options', array('uniacid' => $_W['uniacid'], 'goods_id' => $id));
	}
	return $goods;
}
function store_comment_stat($sid, $update = true) 
{
	global $_W;
	$stat = array();
	$stat['goods_quality'] = round(pdo_fetchcolumn('select avg(goods_quality) from ' . tablename('tiny_wmall_order_comment') . ' where uniacid = :uniacid and sid = :sid and status = 1', array(':uniacid' => $_W['uniacid'], ':sid' => $sid)), 1);
	$stat['delivery_service'] = round(pdo_fetchcolumn('select avg(delivery_service) from ' . tablename('tiny_wmall_order_comment') . ' where uniacid = :uniacid and sid = :sid and status = 1', array(':uniacid' => $_W['uniacid'], ':sid' => $sid)), 1);
	$stat['score'] = round(($stat['goods_quality'] + $stat['delivery_service']) / 2, 1);
	if ($update) 
	{
		pdo_update('tiny_wmall_store', array('score' => $stat['score']), array('uniacid' => $_W['uniacid'], 'id' => $sid));
	}
	$stat['goods_quality_star'] = score_format($stat['goods_quality']);
	$stat['delivery_service_star'] = score_format($stat['delivery_service']);
	return $stat;
}
function store_status() 
{
	$data = array( array('css' => 'label label-default', 'text' => '隐藏中', 'color' => ''), array('css' => 'label label-success', 'text' => '显示中'), array('css' => 'label label-info', 'text' => '审核中'), array('css' => 'label label-danger', 'text' => '审核未通过'), array('css' => 'label label-danger', 'text' => '回收站') );
	return $data;
}
function store_account($sid, $fileds = array()) 
{
	global $_W;
	$account = pdo_get('tiny_wmall_store_account', array('uniacid' => $_W['uniacid'], 'sid' => $sid), $fileds);
	if (!(empty($account))) 
	{
		$se_fileds = array('wechat', 'alipay', 'fee_goods', 'fee_takeout', 'fee_selfDelivery', 'fee_instore', 'fee_paybill', 'fee_eleme', 'fee_meituan');
		foreach ($se_fileds as $se_filed ) 
		{
			if (isset($account[$se_filed])) 
			{
				$account[$se_filed] = (array) iunserializer($account[$se_filed]);
			}
		}
	}
	return $account;
}
function store_update_account($sid, $fee, $trade_type, $extra, $remark = '') 
{
	global $_W;
	$account = pdo_get('tiny_wmall_store_account', array('uniacid' => $_W['uniacid'], 'sid' => $sid));
	if (empty($account)) 
	{
		return error(-1, '账户不存在');
	}
	if (!(empty($extra))) 
	{
		$is_exist = pdo_get('tiny_wmall_store_current_log', array('uniacid' => $_W['uniacid'], 'sid' => $sid, 'trade_type' => 1, 'extra' => $extra), array('id'));
	}
	if ($is_exist) 
	{
		return error(-1, '订单已经入账');
	}
	$now_amount = $account['amount'] + $fee;
	pdo_update('tiny_wmall_store_account', array('amount' => $now_amount), array('uniacid' => $_W['uniacid'], 'sid' => $sid));
	$log = array('uniacid' => $_W['uniacid'], 'sid' => $sid, 'trade_type' => $trade_type, 'extra' => $extra, 'fee' => $fee, 'amount' => $now_amount, 'addtime' => TIMESTAMP, 'remark' => $remark);
	pdo_insert('tiny_wmall_store_current_log', $log);
	return true;
}
function store_getcash_status() 
{
	$data = array( 1 => array('css' => 'label label-success', 'text' => '提现成功'), 2 => array('css' => 'label label-danger', 'text' => '申请中'), 3 => array('css' => 'label label-default', 'text' => '提现失败') );
	return $data;
}
function store_delivery_times($sid, $force_update = false) 
{
	global $_W;
	$cache_key = 'we7wmall_store_delivery_times|' . $sid . '|' . $_W['uniacid'];
	if (!($force_update)) 
	{
		$data = cache_read($cache_key);
		if (!(empty($data)) && (TIMESTAMP < $data['updatetime'])) 
		{
			return $data;
		}
	}
	$store = store_fetch($sid, array('id', 'delivery_reserve_days', 'delivery_within_days', 'delivery_time', 'delivery_times', 'delivery_fee_mode', 'delivery_price'));
	$days = array();
	$totaytime = strtotime(date('Y-m-d'));
	if (0 < $store['delivery_reserve_days']) 
	{
		$days[] = date('m-d', $totaytime + ($store['delivery_reserve_days'] * 86400));
	}
	else if (0 < $store['delivery_within_days']) 
	{
		$i = 0;
		while ($i <= $store['delivery_within_days']) 
		{
			$days[] = date('m-d', $totaytime + ($i * 86400));
			++$i;
		}
	}
	else 
	{
		$days[] = date('m-d');
	}
	$times = $store['delivery_times'];
	$timestamp = array();
	if (!(empty($times))) 
	{
		foreach ($times as $key => &$row ) 
		{
			if (empty($row['status'])) 
			{
				unset($times[$key]);
				continue;
			}
			if ($store['delivery_fee_mode'] == 1) 
			{
				$row['delivery_price'] = $store['delivery_price'] + $row['fee'];
				$row['delivery_price_cn'] = $row['delivery_price'] . '元配送费';
			}
			else 
			{
				$row['delivery_price'] = $store['delivery_price'] + $row['fee'];
				$row['delivery_price_cn'] = '配送费' . $row['delivery_price'] . '元起';
			}
			$end = explode(':', $row['end']);
			$row['timestamp'] = mktime($end[0], $end[1]);
			$timestamp[$key] = $row['timestamp'];
		}
	}
	else 
	{
		$start = mktime(8, 0);
		$end = mktime(22, 0);
		$i = $start;
		while ($i < $end) 
		{
			if ($store['delivery_fee_mode'] == 1) 
			{
				$store['delivery_price_cn'] = $store['delivery_price'] . '元配送费';
			}
			else 
			{
				$store['delivery_price_cn'] = '配送费' . $store['delivery_price'] . '元起';
			}
			$times[] = array('start' => date('H:i', $i), 'end' => date('H:i', $i + 1800), 'timestamp' => $i + 1800, 'fee' => 0, 'delivery_price' => $store['delivery_price'], 'delivery_price_cn' => $store['delivery_price_cn']);
			$timestamp[] = $i + 1800;
			$i += 1800;
		}
	}
	$data = array('days' => $days, 'times' => $times, 'timestamp' => $timestamp, 'updatetime' => strtotime(date('Y-m-d')) + 86400, 'reserve' => (0 < $store['delivery_reserve_days'] ? 1 : 0));
	cache_write($cache_key, $data);
	return $data;
}
function store_delivery_modes() 
{
	$data = array( 1 => array('css' => 'label label-danger', 'text' => '店内配送员', 'color' => ''), 2 => array('css' => 'label label-success', 'text' => '平台配送员') );
	return $data;
}
function store_fetchall_by_condition($type = 'hot', $option = array()) 
{
	global $_W;
	if (empty($option['limit'])) 
	{
		$option['limit'] = 6;
	}
	if (empty($option['extra_type'])) 
	{
		$option['extra_type'] = 'all';
	}
	$condition = ' where uniacid = :uniacid and agentid = :agentid and status = 1';
	$params = array(':uniacid' => $_W['uniacid'], ':agentid' => $_W['agentid']);
	if (isset($option['is_rest'])) 
	{
		$condition .= ' and is_rest = :is_rest';
		$params[':is_rest'] = intval($option['is_rest']);
	}
	if ($type == 'hot') 
	{
		$stores = pdo_fetchall('select id, title from ' . tablename('tiny_wmall_store') . $condition . ' order by click desc, displayorder desc limit 4', $params);
	}
	else if ($type == 'recommend') 
	{
		$condition .= ' and is_recommend = 1 and position = 1';
		$stores = pdo_fetchall('select id,title,logo,content,business_hours,delivery_fee_mode,delivery_price,delivery_areas,send_price,delivery_time,forward_mode,forward_url,score,location_y,location_x,sailed,is_rest from ' . tablename('tiny_wmall_store') . $condition . ' order by is_rest asc, displayorder desc limit ' . $option['limit'], $params);
	}
	if (!(empty($stores))) 
	{
		foreach ($stores as &$row ) 
		{
			$row['logo'] = tomedia($row['logo']);
			$row['scores_original'] = $row['score'];
			$row['scores'] = score_format($row['score']);
			$row['url'] = store_forward_url($row['id'], $row['forward_mode'], $row['forward_url'], $_W['channel']);
			if ($option['extra_type'] == 'all') 
			{
				$row['activity'] = store_fetch_activity($row['id']);
				$row['activity']['items'] = array_values($row['activity']['items']);
				if ($row['delivery_fee_mode'] == 2) 
				{
					$row['delivery_price'] = iunserializer($row['delivery_price']);
					$row['delivery_price'] = $row['delivery_price']['start_fee'];
				}
				else if ($row['delivery_fee_mode'] == 3) 
				{
					$row['delivery_areas'] = iunserializer($row['delivery_areas']);
					if (!(is_array($row['delivery_areas']))) 
					{
						$row['delivery_areas'] = array();
					}
					$price = store_order_condition($row);
					$row['delivery_price'] = $price['delivery_price'];
					$row['send_price'] = $price['send_price'];
				}
			}
		}
	}
	return $stores;
}
function store_forward_url($sid, $forward_mode, $forward_url = '', $channel = '') 
{
	global $_W;
	if (empty($channel)) 
	{
		$channel = $_W['channel'];
	}
	if ($channel == 'wechat') 
	{
		if ($forward_mode == 0) 
		{
			$url = imurl('wmall/store/goods', array('sid' => $sid));
		}
		else if ($forward_mode == 1) 
		{
			$url = imurl('wmall/store/index', array('sid' => $sid));
		}
		else if ($forward_mode == 3) 
		{
			$url = imurl('wmall/store/assign', array('sid' => $sid));
		}
		else if ($forward_mode == 4) 
		{
			$url = imurl('wmall/store/reserve', array('sid' => $sid));
		}
		else if ($forward_mode == 6) 
		{
			$url = imurl('wmall/store/paybill', array('sid' => $sid));
		}
		else if ($forward_mode == 5) 
		{
			$url = $forward_url;
		}
	}
	else 
	{
		$url = '/pages/store/goods?sid=' . $sid;
		if ($forward_mode == 0) 
		{
			$url = '/pages/store/goods?sid=' . $sid;
		}
		else if ($forward_mode == 1) 
		{
			$url = '/pages/store/home?sid=' . $sid;
		}
		else if ($forward_mode == 4) 
		{
			$url = '/pages/reserve/index?sid=' . $sid;
		}
		else if ($forward_mode == 6) 
		{
			$url = '/pages/store/paybill?sid=' . $sid;
		}
	}
	return $url;
}
function store_order_serial_sn($store_id) 
{
	global $_W;
	$serial_sn = pdo_fetchcolumn('select serial_sn from' . tablename('tiny_wmall_order') . ' where uniacid = :uniacid and sid = :sid and order_plateform = :order_plateform and addtime > :addtime order by serial_sn desc', array(':uniacid' => $_W['uniacid'], ':sid' => $store_id, ':order_plateform' => 'we7_wmall', ':addtime' => strtotime(date('Y-m-d'))));
	$serial_sn = intval($serial_sn) + 1;
	return $serial_sn;
}
function store_check() 
{
	global $_W;
	global $_GPC;
	if (!(defined('IN_MOBILE'))) 
	{
		if (!(empty($_GPC['_sid']))) 
		{
			$sid = intval($_GPC['_sid']);
			isetcookie('__sid', $sid, 86400);
		}
		else 
		{
			$sid = intval($_GPC['__sid']);
		}
	}
	else 
	{
		$sid = intval($_GPC['sid']);
	}
	if (!(defined('IN_MOBILE'))) 
	{
		if (($_W['role'] != 'manager') && empty($_W['isfounder'])) 
		{
			if ($_W['we7_wmall']['store']['id'] != $sid) 
			{
				message('您没有该门店的管理权限', '', 'error');
			}
		}
	}
	$store = pdo_fetch('SELECT id, title, status, pc_notice_status, delivery_mode FROM ' . tablename('tiny_wmall_store') . ' WHERE uniacid = :aid AND id = :id', array(':aid' => $_W['uniacid'], ':id' => $sid));
	if (empty($store)) 
	{
		if (!(defined('IN_MOBILE'))) 
		{
			message('门店信息不存在或已删除', '', 'error');
		}
		exit();
	}
	$store['manager'] = pdo_get('tiny_wmall_clerk', array('uniacid' => $_W['uniacid'], 'sid' => $store['id'], 'role' => 'manager'));
	$store['account'] = pdo_get('tiny_wmall_store_account', array('uniacid' => $_W['uniacid'], 'sid' => $store['id']));
	$_W['we7_wmall']['store'] = $store;
	return $store;
}
function store_serve_fee_items() 
{
	return array( 'yes' => array('price' => '商品费用', 'box_price' => '餐盒费', 'pack_fee' => '包装费', 'delivery_fee' => '配送费'), 'no' => array('store_discount_fee' => '商户活动补贴') );
}
function is_in_store_radius($sid, $lnglat, $area_id = 0) 
{
	global $_W;
	if (is_array($sid)) 
	{
		$store = $sid;
	}
	if (empty($store)) 
	{
		$store = store_fetch($sid, array('location_y', 'location_x', 'delivery_fee_mode', 'delivery_price', 'delivery_areas', 'serve_radius', 'not_in_serve_radius'));
		if (empty($store)) 
		{
			return false;
		}
	}
	$flag = false;
	if (($store['delivery_fee_mode'] == 1) || ($store['delivery_fee_mode'] == 2)) 
	{
		if (!($store['not_in_serve_radius']) && (0 < $store['serve_radius'])) 
		{
			if (empty($lnglat[0]) || empty($lnglat[1])) 
			{
				return false;
			}
			$dist = distanceBetween($lnglat[0], $lnglat[1], $store['location_y'], $store['location_x']);
			if ($dist <= $store['serve_radius'] * 1000) 
			{
				$flag = true;
			}
		}
		else 
		{
			$flag = true;
		}
	}
	else if ($store['delivery_fee_mode'] == 3) 
	{
		if (empty($lnglat[0]) || empty($lnglat[1])) 
		{
			return false;
		}
		if (empty($store['delivery_areas'])) 
		{
			return false;
		}
		if (!(empty($area_id))) 
		{
			$store['delivery_areas'] = array($store['delivery_areas'][$area_id]);
		}
		foreach ($store['delivery_areas'] as $area ) 
		{
			while ($flag) 
			{
				$flag = isPointInPolygon($area['path'], array($lnglat[0], $lnglat[1]));
				break;
			}
		}
	}
	return $flag;
}
function store_order_condition($sid, $lnglat = array()) 
{
	global $_GPC;
	if (is_array($sid)) 
	{
		$store = $sid;
	}
	if (empty($store)) 
	{
		$store = store_fetch($sid, array('location_y', 'location_x', 'delivery_fee_mode', 'delivery_price', 'delivery_areas', 'delivery_price', 'delivery_free_price', 'send_price'));
		if (empty($store)) 
		{
			return error(-1, '门店不存在');
		}
	}
	$price = array('send_price' => $store['send_price'], 'delivery_price' => $store['delivery_price'], 'delivery_free_price' => $store['delivery_free_price']);
	if ($store['delivery_fee_mode'] == 3) 
	{
		if (empty($lnglat)) 
		{
			if (0 < $_GPC['address_id']) 
			{
				$address = member_fetch_address($_GPC['address_id']);
				$lnglat = array($address['location_y'], $address['location_x']);
			}
			else 
			{
				$lnglat = array($_GPC['__lng'], $_GPC['__lat']);
			}
		}
		$delivery_price_arr = array();
		$send_price_arr = array();
		$delivery_free_price_arr = array();
		foreach ($store['delivery_areas'] as $key => $area ) 
		{
			$in = isPointInPolygon($area['path'], $lnglat);
			if ($in) 
			{
				if ($_GPC['op'] == 'goods') 
				{
					isetcookie('_guess_area', $key, 300);
				}
				$price['delivery_price'] = $area['delivery_price'];
				$price['send_price'] = $area['send_price'];
				$price['delivery_free_price'] = $area['delivery_free_price'];
				break;
			}
			$delivery_price_arr[] = $area['delivery_price'];
			$send_price_arr[] = $area['send_price'];
			$delivery_free_price_arr[] = $area['delivery_free_price'];
		}
		if (!($in)) 
		{
			$price['delivery_price'] = min($delivery_price_arr);
			$price['send_price'] = min($send_price_arr);
			$price['delivery_free_price'] = min($delivery_free_price_arr);
		}
	}
	return $price;
}
function store_notice_stat($clerk_id = 0) 
{
	global $_W;
	if (empty($clerk_id)) 
	{
		$clerk_id = $_W['clerk']['id'];
	}
	$new_id = pdo_fetchcolumn('SELECT notice_id FROM' . tablename('tiny_wmall_notice_read_log') . ' WHERE uid = :uid ORDER BY notice_id DESC LIMIT 1', array(':uid' => $clerk_id));
	$new_id = intval($new_id);
	$notices = pdo_fetchall('SELECT id FROM ' . tablename('tiny_wmall_notice') . ' WHERE status = 1 AND type = :type AND id > :id', array(':type' => 'store', ':id' => $new_id));
	if (!(empty($notices))) 
	{
		foreach ($notices as &$notice ) 
		{
			$insert = array('uid' => $clerk_id, 'notice_id' => $notice['id'], 'is_new' => 1);
			pdo_insert('tiny_wmall_notice_read_log', $insert);
		}
	}
	$total = intval(pdo_fetchcolumn('SELECT COUNT(*) FROM' . tablename('tiny_wmall_notice_read_log') . ' WHERE uid = :uid AND is_new = 1', array(':uid' => $clerk_id)));
	return $total;
}
function store_getcash_transfers($id) 
{
	global $_W;
	$id = intval($id);
	$log = pdo_get('tiny_wmall_store_getcash_log', array('uniacid' => $_W['uniacid'], 'id' => $id));
	if (empty($log)) 
	{
		return error(-1, '提现记录不存在');
	}
	if ($log['status'] == 1) 
	{
		return error(-1, '该提现记录已处理');
	}
	$store = store_fetch($log['sid'], array('title'));
	$log['account'] = iunserializer($log['account']);
	mload()->classs('wxpay');
	if ($log['channel'] == 'wxapp') 
	{
		$pay = new WxPay('wxapp');
		if (empty($log['account']['openid_wxapp'])) 
		{
			return error(-1, '模块版本为小程序版。未获取到提现账户针对小程序的openid,请重新编辑提现账户');
			$pay = new WxPay();
		}
	}
	else 
	{
		$pay = new WxPay();
	}
	$params = array('partner_trade_no' => $log['trade_no'], 'openid' => ($log['channel'] == 'wxapp' ? $log['account']['openid_wxapp'] : $log['account']['openid']), 'check_name' => 'FORCE_CHECK', 're_user_name' => $log['account']['realname'], 'amount' => $log['final_fee'] * 100, 'desc' => $store['title'] . date('Y-m-d H:i', $log['addtime']) . '提现申请');
	$response = $pay->mktTransfers($params);
	if (is_error($response)) 
	{
		pdo_update('tiny_wmall_store_getcash_log', array('status' => 2), array('id' => $id));
		return error(-1, '打款未成功，等待管理员审核。详细错误信息：' . $response['message']);
	}
	pdo_update('tiny_wmall_store_getcash_log', array('status' => 1, 'endtime' => TIMESTAMP), array('uniacid' => $_W['uniacid'], 'id' => $id));
	sys_notice_store_getcash($log['sid'], $id, 'success');
	return error(0, '打款成功');
}
function store_stat_init($name, $sid = 0, $day = 30) 
{
	global $_W;
	$limittime = TIMESTAMP - (86400 * $day);
	$routers = array('sailed' => 'count(*) as sailed', 'delivery_time' => 'avg(delivery_success_time - paytime) as delivery_time, data');
	if (empty($sid)) 
	{
		$orders = pdo_fetchall('select sid, ' . $routers[$name] . ' from' . tablename('tiny_wmall_order') . 'where uniacid = :uniacid and agentid = :agentid and status = 5 and addtime > ' . $limittime . ' and delivery_success_time > 0 group by sid', array(':uniacid' => $_W['uniacid'], ':agentid' => $_W['agentid']), 'sid');
		$sids = array();
		if (!(empty($orders))) 
		{
			$sids = array_keys($orders);
		}
		$stores = pdo_fetchall('select id,sailed,delivery_time,data from ' . tablename('tiny_wmall_store') . ' where uniacid = :uniacid and agentid = :agentid', array(':uniacid' => $_W['uniacid'], ':agentid' => $_W['agentid']));
		foreach ($stores as &$da ) 
		{
			if ($name == 'delivery_time') 
			{
				$da['data'] = iunserializer($da['data']);
				if (!(empty($da['data'])) && ($da['data']['delivery_time_type'] == 1)) 
				{
					continue;
				}
			}
			$update = array();
			if (in_array($da['id'], $sids)) 
			{
				$value = intval($orders[$da['id']][$name]);
				if ($name == 'delivery_time') 
				{
					$value = floor($value / 60);
					$value = min($value, 255);
				}
				$update[$name] = $value;
			}
			else 
			{
				$update[$name] = 0;
			}
			pdo_update('tiny_wmall_store', $update, array('id' => $da['id']));
		}
	}
	else 
	{
		$store = pdo_fetch('select id,sailed,delivery_time from' . tablename('tiny_wmall_store') . ' where uniacid = :uniacid and agentid = :agentid and id = :id', array(':uniacid' => $_W['uniacid'], ':agentid' => $_W['agentid'], ':id' => $sid));
		if (empty($store)) 
		{
			return error(-1, '商店不存在');
		}
		if ($name == 'delivery_time') 
		{
			$store['data'] = iunserializer($store['data']);
			if (!(empty($store['data'])) && ($store['data']['delivery_time_type'] == 1)) 
			{
				return error(-1, '门店预计送达时间计算方式为门店手动设置');
			}
		}
		$orders = pdo_fetch('select sid,{$routers[$name]} from' . tablename('tiny_wmall_order') . 'where uniacid = :uniacid and agentid = :agentid and status = 5 and addtime > ' . $limittime . ' and sid = :sid', array(':uniacid' => $_W['uniacid'], ':agentid' => $_W['agentid'], ':sid' => $sid));
		$update = array();
		if (!(empty($orders))) 
		{
			$value = intval($orders[$name]);
			if ($name == 'delivery_time') 
			{
				$value = floor($value / 60);
				$value = min($value, 255);
			}
			$update[$name] = $value;
		}
		else 
		{
			$update[$name] = 0;
		}
		pdo_update('tiny_wmall_store', $update, array('id' => $sid));
	}
	return true;
}
?>