<?php/* * To change this license header, choose License Headers in Project Properties. * To change this template file, choose Tools | Templates * and open the template in the editor. */global $_GPC;global $_W;if (!$this->is_weixin()) {    message('请在微信中打开');}if($_GPC['op']=='hexiao'){    $hexiaomima=$_GPC['hexiaomima'];    $order_on=$_GPC['order_on'];    $hotelid=$_GPC['hotelid'];        $re=pdo_fetch('SELECT hotelid FROM ' . tablename($this->order) . 'WHERE uniacid=' . $this->_weid . '  and order_on=\'' . $order_on . '\' and order_status = 1 ');    if(empty($re)){        echo json_encode(array('success'=>-1,'msg'=>"订单不存在，或者没有支付，请联系商家！"));exit;    }else{        $hxre=pdo_fetch('SELECT hexiaomima FROM ' . tablename($this->hotel) . 'WHERE uniacid=' . $this->_weid . '  and id=\'' . $re['hotelid'] . '\' ');        if(empty($hxre)){            echo json_encode(array('success'=>-3,'msg'=>"商家不存在！"));exit;        }else{            if($hxre['hexiaomima']==$hexiaomima){                pdo_update($this->order,array('order_status'=>3),array('order_on'=>$order_on));                 echo json_encode(array('success'=>1,'msg'=>"核销完成，请尽快安排客人入住，谢谢！"));exit;            }else{                echo json_encode(array('success'=>-2,'msg'=>"核销密码不正确！"));exit;            }                   }    }}$orderlist = pdo_fetchall('SELECT * FROM ' . tablename($this->order) . 'WHERE uniacid=' . $this->_weid . '  and openid=\'' . $this->openid . '\' and order_status < 4  ORDER BY ordertime DESC');$orderjie = pdo_fetchall('SELECT * FROM ' . tablename($this->order) . 'WHERE uniacid=' . $this->_weid . ' and openid=\'' . $this->openid . '\' and order_status > 3  ORDER BY ordertime DESC ');include $this->template('orderlist');