<?php/* * To change this license header, choose License Headers in Project Properties. * To change this template file, choose Tools | Templates * and open the template in the editor. */global $_GPC;global $_W;if (!$this->is_weixin()) {    message('请在微信中打开');} $couponlist = $this->get_couoiund(2);$zkcouponlist = $this->get_couoiund(1);$time = time();include $this->template('credit');