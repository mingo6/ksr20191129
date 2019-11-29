<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" href="../addons/ewei_shopv2/plugin/product/template/mobile/default/css/mobile.css" />
<div class='fui-page  fui-page-current member-log-page'>
    <div class="fui-header">
        <div class="fui-header-left">
            
        </div>
        <div class="title">产品注册</div>
    </div>

    <div class='fui-content navbar' >
        
            <div class="fui-cell-group">

            <div class="fui-cell">
                <div class="fui-cell-label">产品类型</div>
                <div class="fui-cell-info"><input type="text" class='fui-input'  name='productname' id="productname"  value="QS-P无针注射器" readonly /></div>
                
            </div>

            <div class="fui-cell">
                <div class="fui-cell-label">产品注册码</div>
                <div class="fui-cell-info"><input type="text" class='fui-input' id='num' name='num' maxlength="16"  value="" placeholder="请输入16位纯数字" /></div>
            </div>
        
            <div class="fui-cell">

                <div class="fui-cell-label">验证码</div>

                <div class="fui-cell-info">

                    <input type="tel" class="fui-input" value="" placeholder="请输入验证码" name="verifycode2" id="verifycode2" maxlength="4" />

                </div>

                <div class="remark noremark">

                    <img src="../web/index.php?c=utility&a=code&r=<?php  echo time()?>" style="width: 3.5rem; height: 1.5rem; vertical-align: middle;" id="btnCode2">

                </div>

            </div>

        </div>
        <a  id="btnSubmit" class="btn-bd">提交</a>
        <div class="image" style="margin-top: 20%;">
            <img style="width: 320px;height: auto;" src="../addons/ewei_shopv2/plugin/product/template/mobile/default/img/images/newinfo.png" />
        </div>
    </div>

   

    <script language='javascript'>
    require(['../addons/ewei_shopv2/plugin/product/static/js/index.js'], function (modal) {
        modal.init();
    });
    </script>
    
</div>

<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>