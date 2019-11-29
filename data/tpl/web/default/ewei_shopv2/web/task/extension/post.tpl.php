<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<style>
    .task-active{
        background: #ff5460;
        color: #fff;
    }
    .task-done{
        background: #1ab394;
        color: #fff;
    }
    .task-wait{
        background: #f5f5f5;
        color: #333;
    }
    .task-y{
        margin-top: 0.75rem
    }
    .goodslist{
        width: 100%;height: 3rem;float: left;line-height: 3rem;font-size: 0.5rem;
        background: #d9edf7;border-bottom: 1px #D9D9D9 solid;overflow: hidden;
    }
    .couponlist{
        width: 100%;height: 3rem;float: left;text-align: center;line-height: 3rem;font-size: 1rem;
        background: #d9edf7;border-bottom: 1px #D9D9D9 solid;overflow: hidden;
    }
</style>
<div class="page-heading"><h2>添加一个<?php  echo $this->taskType?></h2></div>

<div style="width: 100%;height: 2.3rem;float: left;text-align: center;line-height: 2.3rem;font-size: 1.5rem;float: left">
    <div style="width: 20%;height: 100%;float: left;"></div>
    <div style="width: 20%;height: 100%;float: left;" class="task-active" id="basic"><i class="fa fa-circle-o"></i> 基础设置</div>
    <div style="width: 20%;height: 100%;float: left;" class="task-wait" id="task"><i class="fa"></i> 任务要求</div>
    <div style="width: 20%;height: 100%;float: left;" class="task-wait" id="reward"><i class="fa"></i> 选择奖励</div>
</div>
<br><br><br>
<form action="<?php  echo webUrl('task.extension.'.$this->action,array('taskfunc'=>add,'id'=>$id))?>" method="post" class="form-horizontal form-validate" enctype="multipart/form-data" novalidate="novalidate">
    <div class="well" id="well1">
        <br>
        <div class="form-group">
            <label class="col-sm-2 control-label must">任务名称</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="data[title]" value="<?php  echo $data['title'];?>">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label must">任务图标</label>
            <div class="col-sm-9">
                <?php  echo tpl_form_field_image('data[logo]',$data['logo']);?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">开启时间 <a data-toggle="popover" data-trigger="hover" data-html="true" data-placement="top" data-content="这个时间段内可以领取此任务"><i class="fa fa-question-circle"></i></a></label>
            <div class="col-sm-9">
                <div class="input-group">
                    <?php  echo tpl_form_field_daterange('data[time1]',array('start'=>$data['starttime'],'end'=>$data['endtime']), true)?>
                </div>
            </div>
        </div>
        <?php  if($this->action=='single' || $this->action=='first' || $this->action=='point') { ?>
        <?php  } else { ?>
        <div class="form-group">
            <label class="col-sm-2 control-label">领取间隔
                <a data-toggle="popover" data-html="true" data-placement="top" data-trigger="hover" data-content="领取任务的间隔时间<br>0或空为不限制"><i class="fa fa-question-circle"></i>
                </a>
            </label>
            <div class="col-sm-9">
                <div class="input-group">
                    <input type="text" name="data[repeat]" class="form-control" value="<?php  echo $data['repeat'];?>">
                    <span class="input-group-addon">小时</span>
                </div>
            </div>
        </div>
        <?php  } ?>

        <?php  if($this->action=='repeat') { ?>
        <div class="form-group">
            <label class="col-sm-2 control-label"></label>
            <div class="col-sm-9">
                <div class="input-group">
                    <span class="input-group-addon">每</span>
                    <input type="text" name="data[everyhours]" class="form-control" value="<?php  echo floatval($data['everyhours']);?>">
                    <span class="input-group-addon">小时 最多可接</span>
                    <input type="text" name="data[maxtimes]" class="form-control" value="<?php  echo $data['maxtimes'];?>">
                    <span class="input-group-addon">次本任务</span>
                </div>

            </div>
        </div>
        <?php  } ?>
        <div class="form-group">
            <label class="col-sm-2 control-label">任务限时
                <a data-toggle="popover" data-html="true" data-placement="top" data-content="领取任务后必须在时限内完成<br>30分钟=0.5小时，1天=24小时" data-trigger="hover">
                    <i class="fa fa-question-circle"></i>
                </a>
            </label>
            <div class="col-sm-9">
                <div class="input-group">
                    <input type="text" name="data[timelimit]" class="form-control" value="<?php  echo $data['timelimit'];?>">
                        <span class="input-group-addon">小时</span>
                </div>

            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">任务状态</label>
            <div class="col-sm-9 col-xs-12">
                <label class="radio-inline">
                    <input type="radio" name="data[status]" value="1" <?php  if(!empty($data['status'])) { ?>checked<?php  } ?>> 启用
                </label>
                <label class="radio-inline">
                    <input type="radio" name="data[status]" value="0" <?php  if(empty($data['status'])) { ?>checked<?php  } ?>> 禁用
                </label>
            </div>
        </div>
        <br>
        <div class="form-group next-button">
            <label class="col-sm-2 control-label"></label>
            <div class="col-sm-9 col-xs-12">
                <a class="btn btn-danger" id="next1">下一步</a>
            </div>
        </div>
    </div>
    <div class="well" id="well2" style="display: none">
        <br>
        <div class="form-group">
            <label class="col-sm-2 control-label">选择任务</label>
            <div class="col-sm-9">
                <div class="input-group">
                    <select id="task-selecter" class="form-control">
                        <?php  if(is_array($taskList)) { foreach($taskList as $tk => $tv) { ?>
                        <option value="<?php  echo $tv['taskclass'];?>" id="opt-<?php  echo $tv['taskclass'];?>" data-taskname="<?php  echo $tv['taskname'];?>" data-type="<?php  echo $tv['classify'];?>" data-verb="<?php  echo $tv['verb'];?>" data-unit="<?php  echo $tv['unit'];?>"><?php  echo $tv['taskname'];?></option>
                        <?php  } } ?>
                    </select>
                    <a class="btn btn-primary input-group-addon" style="background-color: #18a689;color: #fff" id="task-addbtn"> 添加</a>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label"> 任务需求 <a data-toggle="popover" data-html="true" data-placement="top" data-content="必须完成所有需求项才算完成此任务" data-trigger="hover"><i class="fa fa-question-circle"></i></a></label>
            <div class="col-sm-9">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label"></label>
            <div class="col-sm-9" id="task-list">
                <?php  if(is_array($data['require_data'])) { foreach($data['require_data'] as $dk => $dv) { ?>
                <?php  if($dv['classify'] == 'number') { ?>
                <div id="<?php  echo $dk;?>"><div class="input-group"><span class="input-group-addon" style="background: #f8ac59;color: #fff;">
                    <?php  echo $this->model->returnTaskname($dk);?>
                </span><span class="input-group-addon"><?php  echo $dv['verb'];?></span><input class="form-control" name="data[require_data][<?php  echo $dk;?>][num]" value="<?php  echo $dv['num'];?>"><input type="hidden" class="form-control" name="data[require_data][<?php  echo $dk;?>][classify]" value="number"><input type="hidden" class="form-control" name="data[require_data][<?php  echo $dk;?>][verb]" value="<?php  echo $dv['verb'];?>"><input type="hidden" class="form-control" name="data[require_data][<?php  echo $dk;?>][unit]" value="<?php  echo $dv['unit'];?>"><span class="input-group-addon"><?php  echo $dv['unit'];?></span><a class="btn btn-danger input-group-addon" style="background-color: #ec4758;color: #fff" onclick="$('#<?php  echo $dk;?>').remove()">X</a></div><br></div>
                <?php  } else if($dv['classify'] == 1) { ?>
                <div id="member_info"><div class="input-group"><span class="input-group-addon" style="background: #f8ac59;color: #fff;">绑定手机</span><span class="form-control">绑定手机号（必须开启wap或小程序）</span><input class="form-control" name="data[require_data][member_info]" type="hidden" value="1"><a class="btn btn-danger input-group-addon" style="background-color: #ec4758;color: #fff" onclick="$('#member_info').remove()">X</a></div><br></div>
                <?php  } else { ?>
                <?php  if(empty($cc)) { ?>
                <?php  $cc++;?>
                <div id="cost_goods"><div class="input-group"><span class="input-group-addon" style="background: #f8ac59;color: #fff;">指定商品</span><a class="form-control" style="color: #000" data-toggle="ajaxModal" href="http://cx.foxdev.cn/web/index.php?c=site&amp;a=entry&amp;m=ewei_shopv2&amp;do=web&amp;r=task.extension.single&amp;taskfunc=certain&amp;page=1">点击选择指定商品(组)</a><a class="btn btn-danger input-group-addon" style="background-color: #ec4758;color: #fff" onclick="$('#cost_goods').remove();;$('.certain').text('')">X</a></div><br></div>
                <?php  } ?>
                <?php  } ?>
                <?php  } } ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label"></label>
            <div class="col-sm-9">
                <div class="certain">
                    <?php  if(is_array($data['require_data'])) { foreach($data['require_data'] as $k => $v) { ?>
                    <?php  if(strpos('1'.$k,'cost_goods')) { ?>
                    <?php  $val = str_replace('cost_goods','',$k);?>
                    <div class="input-group" id="c<?php  echo $val;?>">
                        <input type="input" name="data[certain][]" value="<?php  echo $val;?>_<?php  echo $this->model->returnGoodsName($val)?>" class="form-control" readonly=""><a class="btn btn-danger input-group-addon" style="background-color: #ec4758;color: #fff" onclick="$('#c<?php  echo $val;?>').remove();$(this).remove()">X</a>
                    </div>
                    <?php  } ?>
                    <?php  } } ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label"> 任务说明 <a data-toggle="popover" data-html="true" data-placement="top" data-content="任务说明会显示在任务详情中<br>来描述任务详情" data-trigger="hover"><i class="fa fa-question-circle"></i></a></label>
            <div class="col-sm-9">
                <?php  echo tpl_ueditor('data[explain]',$data['explain']);?>
            </div>
        </div>
        <br>
        <div class="form-group next-button">
            <label class="col-sm-2 control-label"></label>
            <div class="col-sm-9 col-xs-12">
                <a class="btn btn-success" id="prev2">上一步</a>
                <a class="btn btn-danger" id="next2">下一步</a>
            </div>
        </div>
    </div>
    <div class="well" id="well3" style="display: none">
        <br>
        <div class="form-group">
            <label class="col-sm-3 control-label">积分奖励</label>
            <div class="col-sm-7">
                <div class="input-group">
                    <input type="text" class="form-control" name="data[reward_data][score]" value="<?php  echo $data['reward_data']['score'];?>">
                    <span class="input-group-addon">积分</span>
                </div>

            </div>
        </div>
        <br>
        <div class="form-group">
            <label class="col-sm-3 control-label">余额奖励</label>
            <div class="col-sm-7">
                <div class="input-group">
                    <input type="text" class="form-control" name="data[reward_data][balance]" value="<?php  echo $data['reward_data']['balance'];?>">
                    <span class="input-group-addon">元</span>
                </div>
            </div>
        </div>
        <br>
        <div class="form-group">
            <label class="col-sm-3 control-label">红包奖励</label>
            <div class="col-sm-7">
            <div class="input-group">
                <input type="text" class="form-control" name="data[reward_data][redpacket]" value="<?php  echo $data['reward_data']['redpacket'];?>">
                <span class="input-group-addon">元</span>
            </div>
            </div>
        </div>
        <br>
        <div class="form-group">
            <label class="col-sm-3 control-label">优惠券奖励</label>
            <div class="col-sm-7">
                <a class="form-control" href="<?php  echo webUrl('task.extension.'.$this->action,array('taskfunc'=>goods,'page'=>1,'type'=>'coupon'));?>" data-toggle="ajaxModal" style="text-align: center;background: #1ab394;color: #fff;">点击选择优惠券</a>
                <div id="couponlist">
                    <?php  if(is_array($data['reward_data']['coupon'])) { foreach($data['reward_data']['coupon'] as $ck => $cv) { ?>
                    <span class="couponlist" id="coupon<?php  echo $cv['id'];?>"><?php  echo $cv['name'];?> <span class="badge badge-warning">x1</span><a class="btn btn-danger" onclick="$(this).parent().remove()" style="float: right;">X</a><input type="hidden" name="data[reward_data][coupon][<?php  echo $cv['id'];?>][id]" value="<?php  echo $cv['id'];?>"><input type="hidden" name="data[reward_data][coupon][<?php  echo $cv['id'];?>][num]" value="<?php  echo $cv['num'];?>"><input type="hidden" name="data[reward_data][coupon][<?php  echo $cv['id'];?>][name]" value="<?php  echo $cv['name'];?>"></span>
                    <?php  } } ?>
                </div>
            </div>
        </div>
        <br>
        <div class="form-group">
            <label class="col-sm-3 control-label">商品特惠</label>
            <div class="col-sm-7">
                <a class="form-control" data-toggle="ajaxModal" href="<?php  echo webUrl('task.extension.'.$this->action,array('taskfunc'=>goods,'page'=>1));?>" style="text-align: center;background: #1ab394;color: #fff;">点击选择商品</a>
                <div id="goodslist">
                    <?php  if(is_array($data['reward_data']['goods'])) { foreach($data['reward_data']['goods'] as $gk => $gv) { ?>
                    <span class="goodslist" id="goods<?php  echo $gk;?>"><span class="badge badge-success">¥<?php  echo $gv['price'];?></span><span class="badge badge-warning">x<?php  echo $gv['num'];?></span><?php  echo $gv['name'];?><a class="btn btn-danger" onclick="$(this).parent().remove()" style="float: right;">X</a><input type="hidden" name="data[reward_data][goods][<?php  echo $gk;?>][option]" value="<?php  echo $gv['option'];?>"><input type="hidden" name="data[reward_data][goods][<?php  echo $gk;?>][num]" value="1"><input type="hidden" name="data[reward_data][goods][<?php  echo $gk;?>][price]" value="2"><input type="hidden" name="data[reward_data][goods][<?php  echo $gk;?>][id]" value="<?php  echo $gv['id'];?>"><input type="hidden" name="data[reward_data][goods][<?php  echo $gk;?>][name]" value="<?php  echo $gv['name'];?>"></span>
                    <?php  } } ?>
                </div>
            </div>
        </div>
        <br>
        <div class="form-group next-button">
            <label class="col-sm-2 control-label"></label>
            <div class="col-sm-9 col-xs-12">
                <a class="btn btn-success" id="prev3">上一步</a>
                <button class="btn btn-danger" id="next3">保存任务</button>
            </div>
        </div>
    </div>
</form>
<div class="alert alert-info">
    <p>单次任务只允许用户接一次任务，之后不允许再重复接任务。如需完成后再接同一任务，请选择 <a href="<?php  echo webUrl('task/extension/repeat');?>" style="color: #ff4f48">周期任务</a></p>
</div>

<script>
    $(function () {
        $('#next1').click(function () {
            $('#well1').hide();
            $('#basic').addClass('task-done');
            $('#basic i').removeClass('fa-circle-o').addClass('fa-check-circle');
            $('#task').removeClass('task-wait');
            $('#task').addClass('task-active');
            $('#task i').addClass('fa-circle-o');
            $('#well2').show();
        });
        $('#next2').click(function () {
            $('#well2').hide();
            $('#task').addClass('task-done');
            $('#task i').removeClass('fa-circle-o').addClass('fa-check-circle');
            $('#reward').addClass('task-active');
            $('#reward i').addClass('fa-circle-o');
            $('#reward').removeClass('task-wait');
            $('#well3').show();
        });
        $('#prev2').click(function () {
            $('#well2').hide();
            $('#task i').removeClass('fa-circle-o');
            $('#task').removeClass('task-active');
            $('#task').addClass('task-wait');
            $('#basic').removeClass('task-done');
            $('#basic i').addClass('fa-circle-o').removeClass('fa-check-circle');
            $('#well1').show();
        });
        $('#prev3').click(function () {
            $('#well3').hide();
            $('#reward i').removeClass('fa-circle-o');
            $('#reward').removeClass('task-active');
            $('#reward').addClass('task-wait');
            $('#task').removeClass('task-done');
            $('#task i').addClass('fa-circle-o').removeClass('fa-check-circle');
            $('#well2').show();
        });
        $('#task-addbtn').click(function () {
            var addval = $('#task-selecter').selected().val();
            var taskname = $('#opt-'+addval).attr('data-taskname');
            if ($('#'+addval).length > 0){
                alert('此任务已添加过,请勿重复添加');
                return;
            }
            var type = $('#opt-'+addval).attr('data-type');
            var verb = $('#opt-'+addval).attr('data-verb');
            if (type == 'number'){
                var unit = $('#opt-'+addval).attr('data-unit');
                var html = '<div id="'+addval+'">' +
                        '<div class="input-group"><span class="input-group-addon" style="background: #f8ac59;color: #fff;">'+taskname+
                        '</span><span class="input-group-addon">'+verb+'</span>' +
                        '<input class="form-control" name="data[require_data]['+addval+'][num]">' +
                        '<input type="hidden" class="form-control" name="data[require_data]['+addval+'][classify]" value="'+type+'">' +
                        '<input type="hidden" class="form-control" name="data[require_data]['+addval+'][verb]" value="'+verb+'">' +
                        '<input type="hidden" class="form-control" name="data[require_data]['+addval+'][unit]" value="'+unit+'">' +
                        '<span class="input-group-addon">'+unit+'</span>' +
                        '<a class="btn btn-danger input-group-addon" ' +
                        'style="background-color: #ec4758;color: #fff" ' +
                        'onclick="$(\'#'+addval+'\').remove()">X</a>' +
                        '</div><br></div>';
            }else if(type == 'boole') {
                var html = '<div id="'+addval+'">' +
                        '<div class="input-group">' +
                        '<span class="input-group-addon" style="background: #f8ac59;color: #fff;">'+taskname+'</span>' +                                              '<span class="form-control">'+verb+'</span>' +
                        '<input class="form-control" name="data[require_data]['+addval+']" type="hidden" value="1">' +
                        '<a class="btn btn-danger input-group-addon" ' +
                        'style="background-color: #ec4758;color: #fff" ' +
                        'onclick="$(\'#'+addval+'\').remove()">X</a>' +
                        '</div><br></div>';
            }else if(type == 'select'){
                var html = '<div id="'+addval+'">' +
                        '<div class="input-group"><span class="input-group-addon" style="background: #f8ac59;color: #fff;">'+taskname+
                        '</span>' +
                        '<a class="form-control" style="color: #000" data-toggle="ajaxModal" href="<?php  echo webUrl('task.extension.'.$this->action,array('taskfunc'=>certain,'page'=>1));?>">点击选择指定商品(组)</a>' +
                        '<a class="btn btn-danger input-group-addon" ' +
                        'style="background-color: #ec4758;color: #fff" ' +
                        'onclick="$(\'#'+addval+'\').remove();$(\'.certain\').text(\'\')">X</a>' +
                        '</div><br></div>';
            }
            $('#task-list').append(html);
        });
    })
    function clickselect(obj) {
        var num = $(obj).parent().parent().find(".num").val();
        if (num > 0) {}else{alert('请输入数量');return}
        var price = $(obj).parent().parent().find(".price").val();
        if (price > 0) {}else{alert('请输入价格');return}
        var goodsname = $(obj).attr("data-name");
        goodsname = goodsname.slice(0,12);
        var goodsid = $(obj).attr("data-id");
        var option = $("#sel"+goodsid+" :selected");
        var specid = option.val();
        var specname =option.attr('data-name');
        if (specname) specname = specname.slice(0,12);
        var title = goodsname;
        if (specname) title += " | "+specname;
        var divid =  goodsid;
        if (specid > 0)  divid = divid+'-'+ specid;
        if ($("#goods"+divid).length > 0){
            alert('这个商品或规格已存在，请勿重复添加');
            return;
        }
        if (!specid) specid = 0;
        $("#goodslist").append('<span class="goodslist" id="goods'+divid+'"><span class="badge badge-success">¥'+price+'</span><span class="badge badge-warning">x'+num+'</span>'+title+'<a class="btn btn-danger" onclick="$(this).parent().remove()" style="float: right;">X</a><input type="hidden" name="data[reward_data][goods]['+divid+'][option]" value="'+specid+'"><input type="hidden" name="data[reward_data][goods]['+divid+'][num]" value="'+num+'"><input type="hidden" name="data[reward_data][goods]['+divid+'][price]" value="'+price+'"><input type="hidden" name="data[reward_data][goods]['+divid+'][id]" value="'+goodsid+'"><input type="hidden" name="data[reward_data][goods]['+divid+'][name]" value="'+title+'"></span>');
    }

    function clickcoupon(obj) {
        var num = $(obj).parent().parent().find("input").val();
        if (num > 0) {}else{ alert('请输入数量');return }
        var couponid = $(obj).attr("data-id");
        if ($("#coupon"+couponid).length > 0){
            alert('这个优惠券已选择，请勿重复添加');
            return;
        }
        $("#couponlist").append('<span class="couponlist" id="coupon'+couponid+'">'+$(obj).attr("data-name")+' <span class="badge badge-warning">x'+num+'</span><a class="btn btn-danger" onclick="$(this).parent().remove()" style="float: right;">X</a><input type="hidden" name="data[reward_data][coupon]['+couponid+'][id]" value="'+couponid+'"><input type="hidden" name="data[reward_data][coupon]['+couponid+'][num]" value="'+num+'"><input type="hidden" name="data[reward_data][coupon]['+couponid+'][name]" value="'+$(obj).attr("data-name")+'"></span>');
    }

    function getpagecontent(page,type,title) {
        if (type == 'coupon'){
            url = '<?php  echo webUrl("task.extension.single",array("taskfunc"=>certain));?>&page='+page+'&type='+type+'&title='+title;
        }else{
            url = '<?php  echo webUrl("task.extension.single",array("taskfunc"=>goods));?>&page='+page+'&title='+title;
        }
        $.ajax({url:url,type:'get',
            success:function (data) {
                $("#ajaxModal").html('<div class="modal-body"></div>'+data);
            }}
        );
    }

    function so2() {
        getpagecontent(1,'coupon',$('#title2').val());
    }
    function certain(obj) {
        var goodsid = $(obj).attr('data-id');
        var name = $(obj).attr('data-name');
        var txt = "<div class=\"input-group\" id='c"+goodsid+"'><input type='input' name='data[certain][]' value='"+goodsid+'_'+name+"' class='form-control' readonly><a class=\"btn btn-danger input-group-addon\" style=\"background-color: #ec4758;color: #fff\" onclick=\"$('#c"+goodsid+"').remove();$(this).remove()\">X</a></div>";
        if($("#c"+goodsid).length >0){
            alert('已存在');
        }else{
            $('.certain').append(txt);
        }
    }
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
