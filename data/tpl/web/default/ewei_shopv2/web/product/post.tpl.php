<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
 
<div class="page-heading">
    <h2><?php  if(!empty($item['id'])) { ?>编辑<?php  } else { ?>注册<?php  } ?>产品 </h2>
  </div>


    <form id="dataform" action="" method="post" class="form-horizontal form-validate" >
        <input type="hidden" name="id" value="<?php  echo $item['id'];?>" />

                 <div class="form-group">
                     <label class="col-sm-2 control-label">产品名称</label>
                    <div class="col-sm-10  col-xs-12">
                        <input type="text" name="productname" class="form-control" value="QS-P无针注射器" readonly data-rule-required=true autocomplete="off" />
                            
                    </div>
                </div>
              

       
                <div class="form-group">
                    <label class="col-sm-2 control-label">微信号</label>
                    <div class="col-sm-10 col-xs-12">
                        <?php if( ce('perm.user' ,$item) ) { ?>
                            <?php  echo tpl_selector('openid',array('key'=>'openid','text'=>'nickname', 'thumb'=>'avatar','multi'=>0,'placeholder'=>'昵称/姓名/手机号','buttontext'=>'选择微信用户', 'items'=>$member,'url'=>webUrl('member/query') ))?>
                        <?php  } else { ?>
                            <div class="input-group multi-img-details container">
                                <div class="multi-item">
                                    <img class="img-responsive img-thumbnail" src="<?php  echo $member['avatar']?>" />
                                    <div class="img-nickname"><?php  echo $member['nickname'];?></div>
                                </div>
                            </div>
                        <?php  } ?>
                        
                    </div>
                </div>
     
              
                  <div class="form-group">
                    <label class="col-sm-2 control-label">产品注册码</label>
                    <div class="col-sm-10  col-xs-12">
                             
                        <input type="text" name="num" class="form-control" value="<?php  echo $item['num'];?>" />
                         
                    </div>
                
                </div>

                
  
             
             
                
              

               
                <div class="form-group"></div>
                 <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-9 col-xs-12">
                        
                            <input type="hidden" name="uid" value="<?php  echo $item['uid'];?>" />
                        <input type="submit" value="提交" class="btn btn-primary" />

                      
                       <input type="button" name="back" onclick='history.back()' <?php if(cv('perm.user.add|perm.user.edit')) { ?>style='margin-left:10px;'<?php  } ?> value="返回列表" class="btn btn-default" />
                    </div>
                </div>

    </form>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
 
<!--913702023503242914-->