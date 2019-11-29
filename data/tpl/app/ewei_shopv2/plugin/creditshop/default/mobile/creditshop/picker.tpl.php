<?php defined('IN_IA') or exit('Access Denied');?><div id="option-picker" style="display: none;">
	<div class="option-picker">
		<div class="option-picker-inner">
			<div class="option-picker-cell goodinfo">
				<div class="closebtn"><i class="icon icon-roundclose"></i></div>
				<div class="img"><img class='thumb option_thumb' src="" /></div>
				<div class="info info-price text-danger2" style="background: none;"><span>&yen;<span class='price'><span class="option_money"></span>+<span class="option_credit"></span><?php  echo $_W['shopset']['trade']['credittext'];?></span></span></div>
				<div class="info info-total">
					库存 <span class='total text-danger2 option_total' style="background: none;">10</span>
				</div>
				<div class="info info-titles">请选择规格</div>
			</div>
			<div class="option-picker-options">

			</div>
			<div class="fui-navbar">
				<a href="javascript:;" class="nav-item btn confirmbtn" >确定</a>
			</div>
		</div>
	</div>
</div>
<script type="text/html" id="option-picker-tpl">
	<%each specs as spec%>
	<div class="option-picker-cell option spec">
		<div class="title"><%spec.title%></div>
		<div class="select">
			<%each spec.items as item%>
			<a href="javascript:;" class="btn btn-default btn-sm nav spec-item"  data-id="<%item.id%>" data-thumb="<%item.thumb%>"><%item.title%></a>
			<%/each%>
		</div>
	</div>
	<%/each%>
</script>
<!--青岛易联互动网络科技有限公司-->