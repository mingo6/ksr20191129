<?php
defined('IN_IA') || exit('Access Denied');
global $_W;
global $_GPC;
mload()->model('plugin');
pload()->model('cloudGoods');
$ta = ((trim($_GPC['ta']) ? trim($_GPC['ta']) : 'index'));
if ($ta == 'index') 
{
	$_W['page']['title'] = '商品极速录入';
	$categorys = store_fetchall_goods_category($sid, -1, true, 'other');
	$menus = cloudgoods_getall_menus();
	$goods = cloudgoods_getall_goods();
}
if ($ta == 'search') 
{
	$keywords = trim($_GPC['keywords']);
	$menus = cloudgoods_getall_menus(array('keywords' => $keywords));
	$goods = cloudgoods_getall_goods(array('keywords' => $keywords));
	$data = array('menus' => $menus, 'goods' => $goods);
	imessage($data, '', 'ajax');
}
if ($ta == 'menu_detail') 
{
	$id = intval($_GPC['id']);
	if (0 < $id) 
	{
		$data = cloudgoods_menu_fetch($id);
	}
	imessage($data, '', 'ajax');
}
if ($ta == 'goods_writed') 
{
	$id = intval($_GPC['goods_id']);
	$goods = pdo_get('tiny_wmall_cloudgoods_goods', array('uniacid' => $_W['uniacid'], 'id' => $id));
	if (empty($goods)) 
	{
		imessage(error(-1, '商品不存在或已删除'), '', 'ajax');
	}
	$goods['title'] = trim($_GPC['title']);
	$goods['sid'] = $sid;
	$goods['price'] = ((floatval($_GPC['price']) ? floatval($_GPC['price']) : $goods['price']));
	if (!(empty($_GPC['category_parentid']))) 
	{
		$goods['cid'] = intval($_GPC['category_parentid']);
		if (0 < $_GPC['category_childid']) 
		{
			$goods['child_id'] = intval($_GPC['category_childid']);
		}
	}
	else 
	{
		$goods_category = pdo_get('tiny_wmall_cloudgoods_goods_category', array('uniacid' => $_W['uniacid'], 'id' => $goods['category_id']), array('uniacid', 'title', 'status', 'displayorder'));
		$old_category = pdo_get('tiny_wmall_goods_category', array('uniacid' => $_W['uniacid'], 'title' => $goods_category['title'], 'parentid' => 0), array('id'));
		if (!(empty($old_category))) 
		{
			$goods['cid'] = $old_category['id'];
		}
		else 
		{
			$goods_category['sid'] = $sid;
			pdo_insert('tiny_wmall_goods_category', $goods_category);
			$goods['cid'] = pdo_insertid();
		}
	}
	unset($goods['category_id'], $goods['menu_id'], $goods['id']);
	pdo_insert('tiny_wmall_goods', $goods);
	$goods_id = pdo_insertid();
	$options_new = (($_GPC['options'] ? $_GPC['options'] : array()));
	if ($goods['is_options']) 
	{
		$options = pdo_getall('tiny_wmall_cloudgoods_goods_options', array('uniacid' => $_W['uniacid'], 'goods_id' => $id));
	}
	if (!(empty($options)) && $goods_id) 
	{
		foreach ($options as $option ) 
		{
			$option['goods_id'] = $goods_id;
			$option['sid'] = $sid;
			if (!(empty($options_new))) 
			{
				foreach ($options_new as $value ) 
				{
					if (intval($value['id']) == $option['id']) 
					{
						$option['price'] = intval($value['price']);
					}
				}
			}
			unset($option['id']);
			pdo_insert('tiny_wmall_goods_options', $option);
		}
	}
	imessage(error(0, '商品录入成功'), '', 'ajax');
}
include itemplate('store/goods/cloudgoods');
?>