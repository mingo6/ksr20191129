<?php
defined('IN_IA') || exit('Access Denied');
global $_W;
global $_GPC;
icheckauth(true);
$superRedpacket = superRedpacket_grant_show();
imessage($superRedpacket, '', 'ajax');
?>