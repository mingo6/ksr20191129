<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<div class="page-heading">
    <span class="pull-right">
        <a href="<?php  echo webUrl('task.extension.'.$action,array('taskfunc'=>'add'),1);?>" class="btn btn-danger btn-sm"><i class="fa fa-plus"></i> 添加新任务</a>
    </span>
    <h2>所有任务</h2>
</div>

<form action="" method="get" class="form-horizontal" role="form">
    <input type="hidden" name="c" value="site">
    <input type="hidden" name="a" value="entry">
    <input type="hidden" name="m" value="ewei_shopv2">
    <input type="hidden" name="do" value="web">
    <input type="hidden" name="r" value="<?php  echo $_GPC['r'];?>">
    <div class="page-toolbar row m-b-sm m-t-sm">
        <div class="col-sm-4">
            <div class="input-group-btn">
                <button class="btn btn-default btn-sm" type="button" data-toggle="refresh"><i class="fa fa-refresh"></i></button>
                <button class="btn btn-default btn-sm" type="button" data-toggle="batch-remove" data-confirm="确认要删除?" data-href="<?php  echo webUrl('task/extension/'.$this->action,array('taskfunc'=>'delete'));?>" disabled="disabled"><i class="fa fa-trash"></i> 删除</button>
            </div>
        </div>
        <div class="col-sm-4 pull-right">
            <div class="input-group">
                <input type="text" class="input-sm form-control" name="keyword" value="" placeholder="请输入关键词"><span class="input-group-btn">
                <button class="btn btn-sm btn-primary" type="submit"> 搜索</button> </span>
            </div>
        </div>
    </div>
</form>
<form action="" method="post">
    <table class="table table-hover table-responsive">
        <thead>
        <tr>
            <th style="width:25px;"><input type="checkbox"></th>
            <th style="width:180px;">任务名称</th>
            <th style="width:180px;">开启时间</th>
            <th style="width:100px;">状态</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php  if(is_array($list)) { foreach($list as $k => $v) { ?>
        <tr>
            <td><input type="checkbox" value="<?php  echo $v['id'];?>"></td>
            <td><?php  echo $v['title'];?></td>
            <td><?php  echo date('Y-m-d H:i', $v['starttime'])?> <br><?php  echo date('Y-m-d H:i', $v['endtime'])?></td>
            <td>
                <?php  if(!empty($v['status'])) { ?>
                    <span class="label label-success">开启</span>
                <?php  } else { ?>
                    <span class="label label-danger">关闭</span>
                <?php  } ?>
            </td>
            <td>
                <!--<a class="btn btn-default btn-sm" href="<?php  echo webUrl('task/extension/'.$this->action,array('taskfunc'=>'record','id'=>$v['id']));?>"><i class="fa fa-qrcode"></i> 参与记录</a>-->
                <a class="btn btn-default btn-sm" href="<?php  echo webUrl('task/extension/'.$this->action,array('taskfunc'=>'add','id'=>$v['id']));?>"><i class="fa fa-edit"></i> 编辑</a>
                <a class="btn btn-default btn-sm" data-toggle="ajaxRemove" href="<?php  echo webUrl('task/extension/'.$this->action,array('taskfunc'=>'delete','ids'=>$v['id']));?>" title="删除" data-confirm="确认删除此任务吗？"><i class="fa fa-trash"></i> 删除</a>
            </td>
        </tr>
        <?php  } } ?>
        </tbody>
    </table>
</form>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
