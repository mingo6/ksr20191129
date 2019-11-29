<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<style>
    .spec_item_thumb {position: relative;width: 30px;height: 20px;padding: 0;border-left: none;}
    .spec_item_thumb img{cursor: pointer;}
</style>
<div class="page-heading">
	<span class='pull-right'>
		<?php if(cv('creditshop.goods.add')) { ?>
			<a class="btn btn-primary btn-sm" href="<?php  echo webUrl('creditshop/goods/add')?>">添加新商品</a>
		<?php  } ?>
		<a class="btn btn-default  btn-sm" href="<?php  echo webUrl('creditshop/goods')?>">返回列表</a>
	</span>
	<h2><?php  if(!empty($item['id'])) { ?>编辑<?php  } else { ?>添加<?php  } ?>商品
        <small>
            <?php  if(!empty($item['id'])) { ?>修改【<?php  echo $item['title'];?>】
            <a href='javascript:;' title='点击复制链接' class='js-clip' data-url="<?php  echo mobileUrl('creditshop/detail',array('id'=>$item['id']), true)?>">复制链接</a>
            <span style="cursor: pointer;" data-toggle="popover" data-trigger="hover" data-html="true"
                  data-content="<img src='<?php  echo $qrcode;?>' width='130' alt='链接二维码'>" data-placement="auto right">
                <i class="glyphicon glyphicon-qrcode"></i>
            </span>
            <?php  } ?>
        </small>
    </h2>
</div>
<div class="alert alert-danger">注意：为保证数据的准确性，商品类型跟活动类型保存后将不可更改，请谨慎选择。</div>
    <form id="dataform" action="" method="post" class="form-horizontal form-validate">
        <input type='hidden' id='tab' name='tab' value="<?php  echo $_GPC['tab'];?>" />
       <ul class="nav nav-arrow-next nav-tabs" id="myTab">
            <li <?php  if($_GPC['tab']=='basic' || empty($_GPC['tab'])) { ?>class="active"<?php  } ?> ><a href="#tab_basic">商品设置</a></li>
            <li <?php  if($_GPC['tab']=='option') { ?>class="active"<?php  } ?>><a href="#tab_option">库存/规格</a></li>
            <li <?php  if($_GPC['tab']=='notice') { ?>class="active"<?php  } ?>><a href="#tab_notice">详情</a></li>
            <li <?php  if($_GPC['tab']=='act') { ?>class="active"<?php  } ?>><a href="#tab_act">抽奖设置</a></li>
            <li <?php  if($_GPC['tab']=='verify') { ?>class="active"<?php  } ?>><a href="#tab_verify" >线下核销</a></li>
            <li <?php  if($_GPC['tab']=='vip') { ?>class="active"<?php  } ?>><a href="#tab_vip">会员特权</a></li>
            <li <?php  if($_GPC['tab']=='sub') { ?>class="active"<?php  } ?>><a href="#tab_sub">商家管理</a></li>
            <li <?php  if($_GPC['tab']=='share') { ?>class="active"<?php  } ?>><a href="#tab_share">关注及分享</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane <?php  if($_GPC['tab']=='basic' || empty($_GPC['tab'])) { ?>active<?php  } ?>" id="tab_basic"><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('creditshop/goods/basic', TEMPLATE_INCLUDEPATH)) : (include template('creditshop/goods/basic', TEMPLATE_INCLUDEPATH));?></div>
            <div class="tab-pane <?php  if($_GPC['tab']=='option') { ?>active<?php  } ?>" id="tab_option"><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('creditshop/goods/option', TEMPLATE_INCLUDEPATH)) : (include template('creditshop/goods/option', TEMPLATE_INCLUDEPATH));?></div>
            <div class="tab-pane <?php  if($_GPC['tab']=='notice') { ?>active<?php  } ?>" id="tab_notice"><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('creditshop/goods/notice', TEMPLATE_INCLUDEPATH)) : (include template('creditshop/goods/notice', TEMPLATE_INCLUDEPATH));?></div>
            <div class="tab-pane <?php  if($_GPC['tab']=='act') { ?>active<?php  } ?>" id="tab_act"><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('creditshop/goods/act', TEMPLATE_INCLUDEPATH)) : (include template('creditshop/goods/act', TEMPLATE_INCLUDEPATH));?></div>
            <div class="tab-pane <?php  if($_GPC['tab']=='sub') { ?>active<?php  } ?>" id="tab_sub"><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('creditshop/goods/sub', TEMPLATE_INCLUDEPATH)) : (include template('creditshop/goods/sub', TEMPLATE_INCLUDEPATH));?></div>
            <div class="tab-pane <?php  if($_GPC['tab']=='vip') { ?>active<?php  } ?>" id="tab_vip"><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('creditshop/goods/vip', TEMPLATE_INCLUDEPATH)) : (include template('creditshop/goods/vip', TEMPLATE_INCLUDEPATH));?></div>
            <div class="tab-pane <?php  if($_GPC['tab']=='verify') { ?>active<?php  } ?>" id="tab_verify"  <?php  if($_GPC['tab']=='basic') { ?>active<?php  } ?>><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('creditshop/goods/verify', TEMPLATE_INCLUDEPATH)) : (include template('creditshop/goods/verify', TEMPLATE_INCLUDEPATH));?></div>
            <div class="tab-pane <?php  if($_GPC['tab']=='share') { ?>active<?php  } ?>" id="tab_share"><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('creditshop/goods/share', TEMPLATE_INCLUDEPATH)) : (include template('creditshop/goods/share', TEMPLATE_INCLUDEPATH));?></div>
        </div>
        <div class="form-group-title"></div>
        <div class="form-group"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label"></label>
            <div class="col-sm-9 col-xs-12">
                <?php if( ce('creditshop.goods' ,$item) ) { ?>
                    <input type="submit"  value="提交" class="btn btn-primary pull-right" />
                <?php  } ?>
            </div>
        </div>
 </form>
<script language='javascript'>
    require(['bootstrap'],function(){
        $('#myTab a').click(function (e) {
            e.preventDefault();
            $('#tab').val( $(this).attr('href'));
            $(this).tab('show');
        })
    });
     function select_goods(o){
         $("#specs").empty();
         $("#couponid").val('');
         $(":input[name=thumb]").val(o.thumb);
         $(".thumb-container .img-thumbnail").attr('src',o.thumb);
         $(":input[name=total]").val(o.total);
         $(":input[name=price]").val(o.marketprice);
         $(":input[name=productprice]").val(o.productprice);
         $(":input[name=share_title]").val(o.share_title);
         $(":input[name=share_icon]").val(o.share_icon);
         $(":input[name=share_desc]").val(o.description);
         if(o.hasoption>0){
             $("#hasoption").prop("checked","true");
             var obj = $("#hasoption");
             if (obj.get(0).checked){
                 //refreshOptions();
                 $('.hasoption').attr('readonly',true);
                 $("#tboption").show();
                 $("#tbdiscount").show();
                 $("#isdiscount_discounts").show();
                 $("#isdiscount_discounts_default").hide();
                 $("#commission").show();
                 $("#commission_default").hide();
                 $("#discounts_type1").show().parent().show();
             }
             if(o.allspecs){
                 $specs = '';
                 o.allspecs.forEach(function (e) {
                     $specs += "<div class='spec_item' id='spec_"+e.id+"' >";
                     $specs += "<div style='border:1px solid #e7eaec;padding:10px;margin-bottom: 10px;' >";
                     $specs += "<input name='spec_id[]' type='hidden' class='form-control spec_id' value='foxteam"+e.id+"'/>";
                     $specs += "<div class='form-group'>";
                     $specs += "<div class='col-sm-12'>";
                     $specs += "<div class='input-group'>";
                     $specs += "<input name='spec_title[foxteam"+e.id+"]' type='text' class='form-control  spec_title' value='foxteam"+e.title+"' placeholder='规格名称 (比如: 颜色)'/>";
                     $specs += "<div class='input-group-btn'>";
                     $specs += "<a href='javascript:;' id='add-specitem-foxteam"+e.id+"' specid='foxteam"+e.id+"' class='btn btn-info add-specitem' onclick='addSpecItem(foxteam"+e.id+")'><i class='fa fa-plus'></i> 添加规格项</a>";
                     $specs += "<a href='javascript:void(0);' class='btn btn-danger' onclick='removeSpec('foxteam"+e.id+"')'><i class='fa fa-remove'></i></a>";
                     $specs += "</div>";
                     $specs += "</div>";
                     $specs += "</div>";
                     $specs += "</div>";
                     $specs += "<div class='form-group'>";
                     $specs += "<div class='col-md-12'>";
                     $specs += "<div id='spec_item_foxteam"+e.id+"' class='spec_item_items'>";
                    if (e.items){
                        e.items.forEach(function (event) {
                            var cheacked_str = '',has_thumb = '',disnone = '';
                            if(event.show==1){
                                cheacked_str = 'checked';
                            }
                            if(event.thumb!=''){
                                has_thumb = 'has_thumb';
                            }else{
                                disnone = 'style="display:none"';
                            }
                            $specs += '<div class="spec_item_item" style="float:left;margin:5px;width:250px; position: relative">';
                            $specs += '<input type="hidden" class="form-control spec_item_show" name="spec_item_show_foxteam'+e.id+'[]" value="'+event.show+'" />';
                            $specs += '<input type="hidden" class="form-control spec_item_id" name="spec_item_id_foxteam'+e.id+'[]" value="fox'+event.id+'" />';
                            $specs += '<div class="input-group">';
                            $specs += '<span class="input-group-addon">';
                            $specs += '<input type="checkbox" '+cheacked_str+' value="1" onclick="showItem(this)">';
                            $specs += "</span>";
                            $specs += '<input type="text" class="form-control spec_item_title" name="spec_item_title_foxteam'+e.id+'[]" VALUE="'+event.title+'" />';
                            $specs += '<span class="input-group-addon spec_item_thumb '+has_thumb+' ">';
                            $specs += '<input type="hidden"  name="spec_item_thumb_foxteam'+e.id+'[]" value="'+event.thumb+'"/>';
                            $specs += '<img onclick="selectSpecItemImage(this)" onerror="this.src=\'<?php echo EWEI_SHOPV2_LOCAL;?>static/images/nopic100.jpg\'"';
                            if(event.thumb!=''){
                                $specs += 'src="<?php  echo tomedia('+event.thumb+')?>"';
                            }else{
                                $specs += 'src="<?php echo EWEI_SHOPV2_LOCAL;?>static/images/nopic100.jpg" data-toggle="popover" data-html ="true" data-placement="top" data-trigger ="hover" ' +
                                    ' data-content="<img src=\'<?php  echo tomedia("'+event.thumb+'")?>\' style=\'width:100px;height:100px;\' >" ';
                            }
                            $specs += ' width="100%" />';
                            $specs += '<i class="fa fa-times-circle" '+disnone+'></i> ';
                            $specs += "</span>";
                            $specs += '<span class="input-group-addon">';
                            $specs += '<a href="javascript:;" onclick="removeSpecItem(this)" title="删除"><i class="fa fa-times"></i></a>';
                            $specs += '<a href="javascript:;" class="fa fa-arrows" title="拖动调整显示顺序" ></a>';
                            $specs += '</span>';
                            $specs += "</div>";
                            $specs += "</div>";
                        })
                    }
                     $specs += "</div>";
                     $specs += "</div>";
                     $specs += "</div>";
                     $specs += "</div>";
                     $specs += "</div>";
                 })
                 $("#specs").append($specs);
             }
             if(o.options){
                 var html = '<table class="table table-bordered table-condensed"><thead><tr class="active">';
                 var specs = [];
                 /*if(o.allspecs.length<=0){
                     $("#options").html('');
                     $("#discount").html('');
                     $("#isdiscount_discounts").html('');
                     $("#commission").html('');
                     return;
                 }*/
                 if($('.spec_item').length<=0){
                     $("#options").html('');
                     $("#discount").html('');
                     $("#isdiscount_discounts").html('');
                     $("#commission").html('');
                     //isdiscount_change();
                     return;
                 }
                 $(".spec_item").each(function(i){
                     var _this = $(this);
                     var spec = {
                         id: _this.find(".spec_id").val(),
                         title: _this.find(".spec_title").val()
                     };

                     var items = [];
                     _this.find(".spec_item_item").each(function(){
                         var __this = $(this);
                         var item = {
                             id: __this.find(".spec_item_id").val(),
                             title: __this.find(".spec_item_title").val(),
                             virtual: __this.find(".spec_item_virtual").val(),
                             show:__this.find(".spec_item_show").get(0).checked?"1":"0"
                         }
                         items.push(item);
                     });
                     spec.items = items;
                     specs.push(spec);
                 });
                 specs.sort(function(x,y){
                     if (x.items.length > y.items.length){
                         return 1;
                     }
                     if (x.items.length < y.items.length) {
                         return -1;
                     }
                 });

                 var len = specs.length;
                 var newlen = 1;
                 var h = new Array(len);
                 var rowspans = new Array(len);
                 for(var i=0;i<len;i++){
                     html+="<th>" + specs[i].title + "</th>";
                     var itemlen = specs[i].items.length;
                     if(itemlen<=0) { itemlen = 1 };
                     newlen*=itemlen;

                     h[i] = new Array(newlen);
                     for(var j=0;j<newlen;j++){
                         h[i][j] = new Array();
                     }
                     var l = specs[i].items.length;
                     rowspans[i] = 1;
                     for(j=i+1;j<len;j++){
                         rowspans[i]*= specs[j].items.length;
                     }
                 }

                 html += '<th><div class=""><div style="padding-bottom:10px;text-align:center;">库存</div><div class="input-group"><input type="text" class="form-control  input-sm option_total_all"VALUE=""/><span class="input-group-addon"><a href="javascript:;" class="fa fa-angle-double-down" title="批量设置" onclick="setCol(\'option_total\');"></a></span></div></div></th>';
                 html += '<th><div class=""><div style="padding-bottom:10px;text-align:center;">积分</div><div class="input-group"><input type="text" class="form-control  input-sm option_credit_all"VALUE=""/><span class="input-group-addon"><a href="javascript:;" class="fa fa-angle-double-down" title="批量设置" onclick="setCol(\'option_credit\');"></a></span></div></div></th>';
                 html+='<th><div class=""><div style="padding-bottom:10px;text-align:center;">金额</div><div class="input-group"><input type="text" class="form-control  input-sm option_money_all"VALUE=""/><span class="input-group-addon"><a href="javascript:;" class="fa fa-angle-double-down" title="批量设置" onclick="setCol(\'option_money\');"></a></span></div></div></th>';
                 html+='<th><div class=""><div style="padding-bottom:10px;text-align:center;">编码</div><div class="input-group"><input type="text" class="form-control  input-sm option_goodssn_all"VALUE=""/><span class="input-group-addon"><a href="javascript:;" class="fa fa-angle-double-down" title="批量设置" onclick="setCol(\'option_goodssn\');"></a></span></div></div></th>';
                 html+='<th><div class=""><div style="padding-bottom:10px;text-align:center;">条码</div><div class="input-group"><input type="text" class="form-control  input-sm option_productsn_all"VALUE=""/><span class="input-group-addon"><a href="javascript:;" class="fa fa-angle-double-down" title="批量设置" onclick="setCol(\'option_productsn\');"></a></span></div></div></th>';
                 html+='<th><div class=""><div style="padding-bottom:10px;text-align:center;">重量（克）</div><div class="input-group"><input type="text" class="form-control  input-sm option_weight_all"VALUE=""/><span class="input-group-addon"><a href="javascript:;" class="fa fa-angle-double-down" title="批量设置" onclick="setCol(\'option_weight\');"></a></span></div></div></th>';
                 html+='</tr></thead>';

                 for(var m=0;m<len;m++){
                     var k = 0,kid = 0,n=0;
                     for(var j=0;j<newlen;j++){
                         var rowspan = rowspans[m];
                         if( j % rowspan==0){
                             h[m][j]={title: specs[m].items[kid].title, virtual: specs[m].items[kid].virtual,html: "<td class='full' rowspan='" +rowspan + "'>"+ specs[m].items[kid].title+"</td>\r\n",id: specs[m].items[kid].id};
                         }
                         else{
                             h[m][j]={title:specs[m].items[kid].title,virtual: specs[m].items[kid].virtual, html: "",id: specs[m].items[kid].id};
                         }
                         n++;
                         if(n==rowspan){
                             kid++; if(kid>specs[m].items.length-1) { kid=0; }
                             n=0;
                         }
                     }
                 }

                 var hh = "";
                 for(var i=0;i<newlen;i++){
                     hh+="<tr>";
                     var ids = [];
                     var titles = [];
                     var virtuals = [];
                     for(var j=0;j<len;j++){
                         hh+=h[j][i].html;
                         ids.push( h[j][i].id);
                         titles.push( h[j][i].title);
                         virtuals.push( h[j][i].virtual);
                     }
                     ids =ids.join('_');
                     titles= titles.join('+');

                     var val ={ id : "",title:titles, total : "",money : "",credit : "",weight:"",productsn:"",goodssn:"",virtual:virtuals };
                     o.options.forEach(function (e) {
                         if(ids==e.specs){
                             val ={
                                 id : "",
                                 title:titles,
                                 total : e.stock,
                                 money : "",
                                 credit : "",
                                 weight : e.weight,
                                 goodssn : e.goodssn,
                                 productsn : e.productsn,
                                 virtual:virtuals
                             }
                         }
                     });
                     if( $(".option_id_" + ids).length>0){
                         val ={
                             id : $(".option_id_" + ids+":eq(0)").val(),
                             title: titles,
                             total : $(".option_total_" + ids+":eq(0)").val(),
                             credit : $(".option_credit_" + ids+":eq(0)").val(),
                             money : $(".option_money_" + ids +":eq(0)").val(),
                             goodssn : $(".option_goodssn_" + ids +":eq(0)").val(),
                             productsn : $(".option_productsn_" + ids +":eq(0)").val(),
                             weight : $(".option_weight_" + ids+":eq(0)").val(),
                             virtual : virtuals
                         }
                     }

                     hh += '<td>'
                     hh += '<input data-name="option_total_' + ids +'" type="text" class="form-control option_total option_total_' + ids +'" value="' +(val.total=='undefined'?'':val.total )+'"/></td>';
                     hh += '<input data-name="option_id_' + ids+'" type="hidden" class="form-control option_id option_id_' + ids +'" value="' +(val.id=='undefined'?'':val.id )+'"/>';
                     hh += '<input data-name="option_ids" type="hidden" class="form-control option_ids option_ids_' + ids +'" value="' + ids +'"/>';
                     hh += '<input data-name="option_title_' + ids +'" type="hidden" class="form-control option_title option_title_' + ids +'" value="' +(val.title=='undefined'?'':val.title )+'"/></td>';
                     hh += '<input data-name="option_virtual_' + ids +'" type="hidden" class="form-control option_virtual option_virtual_' + ids +'" value="' +(val.virtual=='undefined'?'':val.virtual )+'"/></td>';
                     hh += '</td>';
                     hh += '<td><input data-name="option_credit_' + ids+'" type="text" class="form-control option_credit option_credit_' + ids +'" value="' +(val.credit=='undefined'?'':val.credit )+'"/></td>';
                     hh += '<td><input data-name="option_money_' + ids+'" type="text" class="form-control option_money option_money_' + ids +'" " value="' +(val.money=='undefined'?'':val.money )+'"/></td>';
                     hh += '<td><input data-name="option_goodssn_' +ids+'" type="text" class="form-control option_goodssn option_goodssn_' + ids +'" " value="' +(val.goodssn=='undefined'?'':val.goodssn )+'"/></td>';
                     hh += '<td><input data-name="option_productsn_' +ids+'" type="text" class="form-control option_productsn option_productsn_' + ids +'" " value="' +(val.productsn=='undefined'?'':val.productsn )+'"/></td>';
                     hh += '<td><input data-name="option_weight_' + ids +'" type="text" class="form-control option_weight option_weight_' + ids +'" " value="' +(val.weight=='undefined'?'':val.weight )+'"/></td>';
                     hh += "</tr>";
                 }
                 html+=hh;
                 html+="</table>";
                 $("#options").html(html);
                 refreshDiscount();
                 refreshIsDiscount();
                 <?php  if(p('commission') && !empty($com_set['level'])) { ?>
                 refreshCommission();
                 commission_change();
                 <?php  } ?>
                 isdiscount_change();
             }
         }
         $("#title").val(o.title);
         var ue = UE.getEditor('goodsdetail', {
             autoHeight: false
         });
         ue.ready(function() {
             //设置编辑器的内容
             ue.setContent(o.content);
         });
     }
     window.type = "<?php  echo $item['goodstype'];?>";
     window.virtual = "<?php  echo $item['virtual'];?>";

    window.optionchanged = false;
    $('form').submit(function(){
        <?php  if($pcoupon) { ?>
        if($(':radio[name=goodstype]:checked').val()=='1'){
            if($(':input[name=couponid_text]').val()==''){
                $('#myTab a[href="#tab_basic"]').tab('show');
                return false;
            }

        }
        <?php  } ?>
        /*if($(':radio[name=goodstype]:checked').val()=='0'){
            if($(':input[name=goodsid_text]').val()==''){
                return false;
            }
        }*/
        if($('select[name=cate]').val()==''){
            $('#myTab a[href="#tab_basic"]').tab('show');
            return false;
        }
        var check = true;

        $(".tp_title,.tp_name").each(function(){
            var val = $(this).val();
            if(!val){
                $('#myTab a[href="#tab_diyform"]').tab('show');
                $(this).focus(),$('form').attr('stop',1),tip.msgbox.err('自定义表单字段名称不能为空!');
                check =false;
                return false;
            }
        });

        var diyformtype = $(':radio[name=diyformtype]:checked').val();

        if (diyformtype == 2) {
            if(kw == 0) {
                $('#myTab a[href="#tab_diyform"]').tab('show');
                $(this).focus(),$('form').attr('stop',1),tip.msgbox.err('请先添加自定义表单字段再提交!');
                check =false;
                return false;
            }
        }

        if(!check){return false;}

        window.type = $("input[name='goodstype']:checked").val();
        window.virtual = $("#virtual").val();
        if ($("#goodsname").isEmpty()) {
            $('#myTab a[href="#tab_basic"]').tab('show');
            $('form').attr('stop',1);
            $(this).focus(),$('form').attr('stop',1),tip.msgbox.err('请填写商品名称!');
            return false;
        }

        var inum = 0;
        $('.gimgs').find('.img-thumbnail').each(function(){
            inum++;
        });
        if(inum == 0){
            $('#myTab a[href="#tab_basic"]').tab('show');
            $('form').attr('stop',1),tip.msgbox.err('请上传商品图片!');
            return false;
        }


        var full = true;
        if (window.type == '3') {
            if (window.virtual != '0') {  //如果单规格，不能有规格
                if ($('#hasoption').get(0).checked) {
                    $('form').attr('stop',1),tip.msgbox.err('您的商品类型为：虚拟物品(卡密)的单规格形式，需要关闭商品规格！');
                    return false;
                }
            }
            else {

                var has = false;
                $('.spec_item_virtual').each(function () {
                    has = true;
                    if ($(this).val() == '' || $(this).val() == '0') {
                        $('#myTab a[href="#tab_option"]').tab('show');
                        $(this).next().focus();
                        $('form').attr('stop',1),tip.msgbox.err('请选择虚拟物品模板!');
                        full = false;
                        return false;
                    }
                });
                if (!has) {
                    $('#myTab a[href="#tab_option"]').tab('show');
                    $('form').attr('stop',1),tip.msgbox.err('您的商品类型为：虚拟物品(卡密)的多规格形式，请添加规格！');
                    return false;
                }
            }
        }
        else if(window.type=='10'){
            var spec_itemlen = $(".spec_item").length;
            if (!$('#hasoption').get(0).checked || spec_itemlen<1) {
                $('#myTab a[href="#tab_option"]').tab('show');
                $('form').attr('stop',1),tip.msgbox.err('您的商品类型为：话费流量充值，需要开启并设置商品规格！');
                return false;
            }
            if(spec_itemlen>1){
                $('#myTab a[href="#tab_option"]').tab('show');
                $('form').attr('stop',1),tip.msgbox.err('您的商品类型为：话费流量充值，只可添加一个规格！');
                return false;
            }
        }
        if (!full) {
            return false;
        }

        full = checkoption();
        if (!full) {
            $('form').attr('stop',1),tip.msgbox.err('请输入规格名称!');
            return false;
        }
        if (optionchanged) {
            $('#myTab a[href="#tab_option"]').tab('show');
            $('form').attr('stop',1),tip.msgbox.err('规格数据有变动，请重新点击 [刷新规格项目表] 按钮!');
            return false;
        }
        var spec_item_title = 1;
        $(".spec_item").each(function (i) {
            var _this = this;
            if($(_this).find(".spec_item_title").length == 0){
                spec_item_title = 0;
            }
        });
        if(spec_item_title == 0){
            $('form').attr('stop',1),tip.msgbox.err('详细规格没有填写,请填写详细规格!');
            return false;
        }
        $('form').attr('stop',1);
        //处理规格
        optionArray();
        $('form').removeAttr('stop');
        return true;
    });

    function optionArray()
    {
        var option_total = new Array();
        $('.option_total').each(function (index,item) {
            option_total.push($(item).val());
        });

        var option_id = new Array();
        $('.option_id').each(function (index,item) {
            option_id.push($(item).val());
        });

        var option_ids = new Array();
        $('.option_ids').each(function (index,item) {
            option_ids.push($(item).val());
        });

        var option_title = new Array();
        $('.option_title').each(function (index,item) {
            option_title.push($(item).val());
        });

        var option_virtual = new Array();
        $('.option_virtual').each(function (index,item) {
            option_virtual.push($(item).val());
        });

        var option_credit = new Array();
        $('.option_credit').each(function (index,item) {
            option_credit.push($(item).val());
        });

        var option_money = new Array();
        $('.option_money').each(function (index,item) {
            option_money.push($(item).val());
        });

        var option_goodssn = new Array();
        $('.option_goodssn').each(function (index,item) {
            option_goodssn.push($(item).val());
        });

        var option_productsn = new Array();
        $('.option_productsn').each(function (index,item) {
            option_productsn.push($(item).val());
        });

        var option_weight = new Array();
        $('.option_weight').each(function (index,item) {
            option_weight.push($(item).val());
        });

        var options = {
            option_total : option_total,
            option_id : option_id,
            option_ids : option_ids,
            option_title : option_title,
            option_credit : option_credit,
            option_money : option_money,
            option_goodssn : option_goodssn,
            option_productsn : option_productsn,
            option_weight : option_weight,
            option_virtual : option_virtual
        };
        $("input[name='optionArray']").val(JSON.stringify(options));
    }

    function isdiscountDiscountsArray()
    {

        <?php  if(is_array($levels)) { foreach($levels as $level) { ?>
        var isdiscount_discounts_<?php  echo $level['key'];?> = new Array();
        $(".isdiscount_discounts_<?php  echo $level['key'];?>").each(function (index,item) {
            isdiscount_discounts_<?php  echo $level['key'];?>.push($(item).val());
        });
        <?php  } } ?>

        var isdiscount_discounts_id = new Array();
        $('.isdiscount_discounts_id').each(function (index,item) {
            isdiscount_discounts_id.push($(item).val());
        });

        var isdiscount_discounts_ids = new Array();
        $('.isdiscount_discounts_ids').each(function (index,item) {
            isdiscount_discounts_ids.push($(item).val());
        });

        var isdiscount_discounts_title = new Array();
        $('.isdiscount_discounts_title').each(function (index,item) {
            isdiscount_discounts_title.push($(item).val());
        });

        var isdiscount_discounts_virtual = new Array();
        $('.isdiscount_discounts_virtual').each(function (index,item) {
            isdiscount_discounts_virtual.push($(item).val());
        });

        var options = {
        <?php  if(is_array($levels)) { foreach($levels as $level) { ?>
        isdiscount_discounts_<?php  echo $level['key'];?> : isdiscount_discounts_<?php  echo $level['key'];?>,
        <?php  } } ?>
        isdiscount_discounts_id : isdiscount_discounts_id,
                isdiscount_discounts_ids : isdiscount_discounts_ids,
            isdiscount_discounts_title : isdiscount_discounts_title,
            isdiscount_discounts_virtual : isdiscount_discounts_virtual
    };
        $("input[name='isdiscountDiscountsArray']").val(JSON.stringify(options));
    }

    function discountArray()
    {

        <?php  if(is_array($levels)) { foreach($levels as $level) { ?>
        var discount_<?php  echo $level['key'];?> = new Array();
        $(".discount_<?php  echo $level['key'];?>").each(function (index,item) {
            discount_<?php  echo $level['key'];?>.push($(item).val());
        });
        <?php  } } ?>

        var discount_id = new Array();
        $('.discount_id').each(function (index,item) {
            discount_id.push($(item).val());
        });

        var discount_ids = new Array();
        $('.discount_ids').each(function (index,item) {
            discount_ids.push($(item).val());
        });

        var discount_title = new Array();
        $('.discount_title').each(function (index,item) {
            discount_title.push($(item).val());
        });

        var discount_virtual = new Array();
        $('.discount_virtual').each(function (index,item) {
            discount_virtual.push($(item).val());
        });

        var options = {
        <?php  if(is_array($levels)) { foreach($levels as $level) { ?>
        discount_<?php  echo $level['key'];?> : discount_<?php  echo $level['key'];?>,
        <?php  } } ?>
        discount_id : discount_id,
                discount_ids : discount_ids,
            discount_title : discount_title,
            discount_virtual : discount_virtual
    };
        $("input[name='discountArray']").val(JSON.stringify(options));
    }

    function commissionArray()
    {
        var specs = [];
        $(".spec_item").each(function (i) {
            var _this = $(this);

            var spec = {
                id: _this.find(".spec_id").val(),
                title: _this.find(".spec_title").val()
            };

            var items = [];
            _this.find(".spec_item_item").each(function () {
                var __this = $(this);
                var item = {
                    id: __this.find(".spec_item_id").val(),
                    title: __this.find(".spec_item_title").val(),
                    virtual: __this.find(".spec_item_virtual").val(),
                    show: __this.find(".spec_item_show").get(0).checked ? "1" : "0"
                }
                items.push(item);
            });
            spec.items = items;
            specs.push(spec);
        });
        specs.sort(function (x, y) {
            if (x.items.length > y.items.length) {
                return 1;
            }
            if (x.items.length < y.items.length) {
                return -1;
            }
        });

        var len = specs.length;
        var newlen = 1;
        var h = new Array(len);
        var rowspans = new Array(len);
        for (var i = 0; i < len; i++) {
            var itemlen = specs[i].items.length;
            if (itemlen <= 0) {
                itemlen = 1
            }
            newlen *= itemlen;
            h[i] = new Array(newlen);
            for (var j = 0; j < newlen; j++) {
                h[i][j] = new Array();
            }
            var l = specs[i].items.length;
            rowspans[i] = 1;
            for (j = i + 1; j < len; j++) {
                rowspans[i] *= specs[j].items.length;
            }
        }

        for (var m = 0; m < len; m++) {
            var k = 0, kid = 0, n = 0;
            for (var j = 0; j < newlen; j++) {
                var rowspan = rowspans[m];
                if (j % rowspan == 0) {
                    h[m][j] = {
                        title: specs[m].items[kid].title,
                        virtual: specs[m].items[kid].virtual,
                        id: specs[m].items[kid].id
                    };
                }
                else {
                    h[m][j] = {
                        title: specs[m].items[kid].title,
                        virtual: specs[m].items[kid].virtual,
                        id: specs[m].items[kid].id
                    };
                }
                n++;
                if (n == rowspan) {
                    kid++;
                    if (kid > specs[m].items.length - 1) {
                        kid = 0;
                    }
                    n = 0;
                }
            }
        }

        var commission = {};
        var commission_level = <?php  echo json_encode($commission_level)?>;
        for (var i = 0; i < newlen; i++) {
            var ids = [];
            for (var j = 0; j < len; j++) {
                ids.push(h[j][i].id);
            }
            ids = ids.join('_');
            $.each(commission_level,function (key,val) {
                if(val.key == 'default')
                {
                    var kkk = "commission_level_"+val.key+"_"+ids;
                    commission[kkk] = {};
                    $("input[data-name=commission_level_"+val.key+"_"+ids+"]").each(function (k,v) {
                        commission[kkk][k] = $(v).val();
                    });
                }
                else
                {
                    var kkk = "commission_level_"+val.id+"_"+ids;
                    commission[kkk] = {};
                    $("input[data-name=commission_level_"+val.id+"_"+ids+"]").each(function (k,v) {
                        commission[kkk][k] = $(v).val();
                    });
                    var kkk = "commission_level_"+val.id+"_"+ids;
                    commission[kkk] = {};
                    $("input[data-name=commission_level_"+val.id+"_"+ids+"]").each(function (k,v) {
                        commission[kkk][k] = $(v).val();
                    });
                }
            })
        }

        var commission_id = new Array();
        $('.commission_id').each(function (index,item) {
            commission_id.push($(item).val());
        });

        var commission_ids = new Array();
        $('.commission_ids').each(function (index,item) {
            commission_ids.push($(item).val());
        });

        var commission_title = new Array();
        $('.commission_title').each(function (index,item) {
            commission_title.push($(item).val());
        });

        var commission_virtual = new Array();
        $('.commission_virtual').each(function (index,item) {
            commission_virtual.push($(item).val());
        });



        var options = {
            commission : commission,
            commission_id : commission_id,
            commission_ids : commission_ids,
            commission_title : commission_title,
            commission_virtual : commission_virtual
        };
        $("input[name='commissionArray']").val(JSON.stringify(options));
    }

    function checkoption() {

        var full = true;
        var $spec_title = $(".spec_title");
        var $spec_item_title = $(".spec_item_title");
        if ($("#hasoption").get(0).checked) {
            if($spec_title.length==0){
                $('#myTab a[href="#tab_option"]').tab('show');
                full = false;
            }
            if($spec_item_title.length==0){
                $('#myTab a[href="#tab_option"]').tab('show');
                full = false;
            }
        }
        if (!full) {
            return false;
        }
        return full;
    }
     
    function select_coupon(o) {
         $("#goodsid").val('');
         $(":input[name=thumb]").val(o.thumb);
         $(".thumb-container  .img-thumbnail").attr('src',o.thumb);
         $("#title").val(o.couponname);
         $(":input[name=total]").val(o.total=='-1'?'':o.total);
         $(":input[name=money]").val(o.money);
         $(":input[name=credit]").val(o.credit);
         $(":checkbox[name=usecredit2]").get(0).checked = o.usecredit2=='1';
         $(":input[name=price]").val('');
    }
    
    function change(type) {
        if(type==1){
            $('.goodstype').hide();
            $('.goodstype1').show();
            var title = $("#couponid_text").val();
            if(title){
                $("#title").val(title);
            }
        }else{
            $('.goodstype').hide();
            $('.goodstype0').show();
            var title = $("#goodsid_text").val();
            if(title){
                $("#title").val(title);
            }
        }
    }
 
</script>




        <script type="text/javascript">
            //  new script
            $(function () {
                require(['bootstrap'],function(){
                    $('#myTab a').click(function (e) {
                        e.preventDefault();
                        $('#tab').val( $(this).attr('href'));
                        $(this).tab('show');
                    })
                });

                $("input[name='goodstype']").unbind('click').click(function () {
                    var val = $(this).val();
                    if(parseInt(val)>0){
                        $("#hasoption-goup").hide();
                    }else{
                        $("#hasoption-goup").show();
                    }
                    $(".cgt").hide();
                    $(".cgt-"+val).show();
                });
            })
        </script>
 
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
 
