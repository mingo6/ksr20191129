<?php defined('IN_IA') or exit('Access Denied');?><?php  $list = $this->model->getAvailableTask(1);?>
<div class='menu-header'>任务中心</div>
<ul>
    <li <?php  if($_W['action']=='') { ?>class="active"<?php  } ?>><a href="<?php  echo webUrl('task');?>">海报任务</a></li>
    <li <?php  if($_W['action']=='extension.single') { ?>class="active"<?php  } ?>><a href="<?php  echo webUrl('task.extension.single');?>">单次任务</a></li>
    <li <?php  if($_W['action']=='extension.repeat') { ?>class="active"<?php  } ?>><a href="<?php  echo webUrl('task.extension.repeat');?>">周期任务</a></li>
    <!--<li <?php  if($_W['action']=='extension.first') { ?>class="active"<?php  } ?>><a href="<?php  echo webUrl('task.extension.first');?>">新手任务</a></li>-->
    <!--<li <?php  if($_W['action']=='extension.period') { ?>class="active"<?php  } ?>><a href="<?php  echo webUrl('task.extension.period');?>">周期任务</a></li>-->
    <!--<li <?php  if($_W['action']=='extension.point') { ?>class="active"<?php  } ?>><a href="<?php  echo webUrl('task.extension.point');?>">目标任务</a></li>-->
</ul>

<div class='menu-header'>系统设置</div>
<ul>
    <li <?php  if($_W['action']=='default') { ?>class="active"<?php  } ?>><a href="<?php  echo webUrl('task/default')?>">通知设置</a></li>
    <li <?php  if($_W['action']=='default.setstart') { ?>class="active"<?php  } ?>><a href="<?php  echo webUrl('task/default/setstart')?>">入口设置</a></li>
    <!--<li <?php  if($_W['action']=='adv') { ?>class="active"<?php  } ?>><a href="<?php  echo webUrl('task/adv')?>">幻灯片设置</a></li>-->
</ul>
