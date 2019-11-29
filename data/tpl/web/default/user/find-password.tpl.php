<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header-base', TEMPLATE_INCLUDEPATH)) : (include template('common/header-base', TEMPLATE_INCLUDEPATH));?>
<div class="system-forget">
	<!--手机验证找回密码-->
	<div class="logo"><img src="<?php  if(!empty($_W['setting']['copyright']['blogo'])) { ?><?php  echo tomedia($_W['setting']['copyright']['blogo'])?><?php  } else { ?>./resource/images/logo/logo.png<?php  } ?>" class="img-responsive"></div>
	<div class="container" id="js-users-find-password" ng-controller="UsersFindMobilePwd" ng-cloak>
		<div class="steps">
			<div class="steps-item steps-status-finish">
				<div class="steps-line"><span class="steps-num">1</span></div>
				<div class="steps-state">验证手机号</div>
			</div>
			<div class="steps-item steps-status-wait step-set-pwd">
				<div class="steps-line"><span class="steps-num">2</span></div>
				<div class="steps-state">设置新密码</div>
			</div>
			<div class="steps-item steps-status-wait step-pwd-success">
				<div class="steps-line"><span class="steps-num">3</span></div>
				<div class="steps-state">完成</div>
			</div>
		</div>
		<!--step: 1-->
		<form action="javascript:;" class="form step-1">
			<div>请输入您绑定的密保手机号</div>
			<div class="form-inline">
				<input type="text" class="form-control" ng-model="mobile">
				<span class="js-timer"></span>
			</div>
			<div>输入验证码</div>
			<div class="form-inline clearfix">
				<input type="text" class="form-control pull-left" ng-model="verify">
				<a href="javascript:;" id="toggle" class="pull-left imgverify" ng-click="changeVerify()"><img id="imgverify" ng-src="{{image}}" title="点击图片更换验证码" /></a>
			</div>
			<div>
				<input type="submit" value="确定" ng-click="validCode()" class="btn btn-primary">
			</div>
		</form>
		<!--step: 2-->
		<form action="javascript:;" class="form step-2 hide">
			<div>请设置新密码</div>
			<div class="form-inline">
				<input type="password" class="form-control" ng-model = "password">
				<span class="text-error password"></span>
			</div>
			<div>再次输入新密码</div>
			<div class="form-inline">
				<input type="password" class="form-control" ng-model = "repassword">
				<span class="text-error repassword"></span>
			</div>
			<div>
				<input type="submit" value="确定" ng-click="changePassword()" class="btn btn-primary">
			</div>
		</form>
		<!--step: 3-->
		<div class="step-3 text-center hide">
			<div><span class="wi wi-right-sign"></span></div>
			<div class="sttus">密码修改成功</div>
			<div>
				<a class="btn btn-primary" href="<?php  echo url('user/login');?>">去登录</a>
			</div>
		</div>
	</div>
	<!--end手机验证找回密码-->
</div>
<script type="text/javascript">
	angular.module('userManageApp').value('config', {
		'image' : "<?php  echo url('utility/code')?>",
		'links' : {
			'valid_code_link': "<?php  echo url('user/find-password/valid_code')?>",
			'set_password_link': "<?php  echo url('user/find-password/set_password')?>",
			'img_verify_link': "<?php  echo url('utility/code')?>",
		},
	});
	angular.bootstrap($('#js-users-find-password'), ['userManageApp']);
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer-base', TEMPLATE_INCLUDEPATH)) : (include template('common/footer-base', TEMPLATE_INCLUDEPATH));?>