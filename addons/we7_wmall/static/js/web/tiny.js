define(["bootstrap"],function($){var tiny={};return tiny.getUrl=function(a,b){var a=a.split("/"),c="ctrl="+a[0]+"&ac="+a[1]+"&op="+a[2];a[3]&&(c+="&ta="+a[3]);var d="./index.php?c=site&a=entry&m=we7_wmall&do=web&"+c;return 1==window.sysinfo.agent?d="./wagent.php?c=site&a=entry&m=we7_wmall&do=web&"+c+"&i="+window.sysinfo.uniacid:1==window.sysinfo.merchant&&(d="./wmerchant.php?c=site&a=entry&m=we7_wmall&do=web&"+c+"&i="+window.sysinfo.uniacid),b&&("object"==typeof b?d+="&"+$.toQueryString(b):"string"==typeof b&&(d+="&"+b)),d},tiny.countDown=function(a,b,c,d,e,f){if(!a)return!1;var g="string"==typeof a?new Date(a).getTime()/1e3:a,h=parseInt(g-(new Date).getTime()/1e3),i=setInterval(function(){if(h>0){h-=1;var a=Math.floor(h/3600/24),g=Math.floor(h/3600%24),j=Math.floor(h/60%60),k=Math.floor(h%60);a=a<10?"0"+a:a,g=g<10?"0"+g:g,j=j<10?"0"+j:j,k=k<10?"0"+k:k,f?(a=String(a).split(""),g=String(g).split(""),j=String(j).split(""),k=String(k).split(""),$(b+"_0").text(a[0]),$(b+"_1").text(a[1]),$(c+"_0").text(g[0]),$(c+"_1").text(g[1]),$(d+"_0").text(j[0]),$(d+"_1").text(j[1]),$(e+"_0").text(k[0]),$(e+"_1").text(k[1])):($(b).text(a),$(c).text(g),$(d).text(j),$(e).text(k))}else clearInterval(i)},1e3)},tiny.selectLink=function(a){$("#select-link-modal").remove(),$.ajax(tiny.getUrl("common/link"),{type:"get",dataType:"html",cache:!1}).done(function(b){modal=$('<div class="modal fade" id="select-link-modal"></div>'),$(document.body).append(modal),modal.modal("show"),modal.iappend(b,function(){$(document).off("click","#select-link-modal .btn-link").on("click","#select-link-modal .btn-link",function(){var b=$.trim($(this).data("href"));$.isFunction(a)&&(a(b),modal.modal("hide"))})})})},tiny.selectWxappLink=function(a,b){$("#select-wxapp-link-modal").remove(),$.ajax(tiny.getUrl("common/wxapp/link"),{type:"get",dataType:"html",cache:!1,data:b}).done(function(b){modal=$('<div class="modal fade" id="select-wxapp-link-modal"></div>'),$(document.body).append(modal),modal.modal("show"),modal.iappend(b,function(){$(document).off("click","#select-wxapp-link-modal .btn-link").on("click","#select-wxapp-link-modal .btn-link",function(){var b=$.trim($(this).data("href"));$.isFunction(a)&&(a(b),modal.modal("hide"))}),$(document).off("click","#select-wxapp-link-modal .btn-webview").on("click","#select-wxapp-link-modal .btn-webview",function(){var b=$.trim($(this).prev().val());if(!b)return!1;var b="webview:https://"+b;$.isFunction(a)&&(a(b),modal.modal("hide"))}),$(document).off("click","#select-wxapp-link-modal .btn-phone").on("click","#select-wxapp-link-modal .btn-phone",function(){var b=$.trim($(this).prev().val());if(!b)return!1;var b="tel:"+b;$.isFunction(a)&&(a(b),modal.modal("hide"))}),$(document).off("click","#select-wxapp-link-modal .btn-wxapp").on("click","#select-wxapp-link-modal .btn-wxapp",function(){var b=$.trim($(this).parent().parent().find("input[name='appid']").val()),c=$.trim($(this).parent().parent().find("input[name='url']").val());if(!b)return!1;var d="miniProgram:appId_"+b;c&&(c="path_"+c,d=d+","+c),$.isFunction(a)&&(a(d),modal.modal("hide"))})})})},tiny.selectWxappIcon=function(a){$("#select-wxapp-icon-modal").remove(),$.ajax(tiny.getUrl("common/wxapp/icon"),{type:"get",dataType:"html",cache:!1}).done(function(b){modal=$('<div class="modal fade" id="select-wxapp-icon-modal"></div>'),$(document.body).append(modal),modal.modal("show"),modal.iappend(b,function(){$(document).off("click","#select-wxapp-icon-modal .tabbar-list .item").on("click","#select-wxapp-icon-modal .tabbar-list .item",function(){var b=$.trim($(this).data("index")),c={index:b,url:{normal:"../addons/we7_wmall/plugin/wxapp/static/img/tabbar/icon-"+b+".png",active:"../addons/we7_wmall/plugin/wxapp/static/img/tabbar/icon-"+b+"-active.png"},tabbar:{normal:"static/img/tabbar/icon-"+b+".png",active:"static/img/tabbar/icon-"+b+"-active.png"}};$.isFunction(a)&&(a(c),modal.modal("hide"))})})})},tiny.selectIcon=function(a){$("#select-icon-modal").remove(),$.ajax(tiny.getUrl("common/icon"),{type:"get",dataType:"html",cache:!1}).done(function(b){modal=$('<div class="modal fade" id="select-icon-modal"></div>'),$(document.body).append(modal),modal.modal("show"),modal.iappend(b,function(){$(document).off("click","#select-icon-modal a").on("click","#select-icon-modal a",function(){var b=$.trim($(this).data("icon"));$.isFunction(a)&&(a(b),modal.modal("hide"))})})})},tiny.selectCategory=function(a,b){$("#select-category-modal").remove(),$.ajax(tiny.getUrl("common/store/category"),{type:"get",dataType:"html",cache:!1}).done(function(c){$Modal=$('<div class="modal fade" id="select-category-modal"></div>'),$(document.body).append($Modal),$Modal.modal("show"),$Modal.iappend(c,function(){1==b.mutil?$Modal.find(".modal-footer").removeClass("hide"):$Modal.find(".modal-footer").addClass("hide"),$Modal.find("#keyword").on("keydown",function(a){if(13==a.keyCode)return $Modal.find("#search").trigger("click"),void a.preventDefault()}),$Modal.find("#search").on("click",function(){var c=$.trim($Modal.find("#keyword").val());$.post(tiny.getUrl("common/store/category"),{key:c},function(c){var d=$.parseJSON(c);if(d.message.message&&d.message.message.length>0){$Modal.find(".content").data("attachment",d.message.data);var e=$("#select-category-data").html();irequire(["laytpl"],function(c){c(e).render(d.message.message,function(c){$Modal.find(".content").html(c),$Modal.find(".content .btn-item").off(),$Modal.find(".content .btn-item").on("click",function(){if(b.mutil)$(this).toggleClass("btn-primary"),$(this).hasClass("btn-primary")?$(this).removeClass("btn-default"):$(this).removeClass("btn-primary").addClass("btn-default"),$Modal.find(".modal-footer .btn-submit").off(),$Modal.find(".modal-footer .btn-submit").on("click",function(){var c=[];$Modal.find(".content .btn-primary").each(function(){c.push($Modal.find(".content").data("attachment")[$(this).data("id")])}),$.isFunction(a)&&a(c,b),$Modal.modal("hide")});else{var c=$(this).data("id"),e=d.message.data[c];$.isFunction(a)&&a(e,b),$Modal.modal("hide")}})})})}else $Modal.find(".content #info").html("没有符合条件的分类")})})})})},tiny.selectfan=function(a,b){$("#select-fans-modal").remove(),$(document.body).append($("#select-fans-containter").html());var c=$("#select-fans-modal");irequire(["jquery.qrcode"],function(){c.find(".js-qrcode").each(function(){var a=($(this),$(this).data("text")||$(this).data("href")||$(this).data("url")),b=$(this).data("width")||150;$(this).show().html("").qrcode({render:"canvas",width:b,height:b,text:a})})}),c.modal("show"),c.find("#keyword").on("keydown",function(a){if(13==a.keyCode)return c.find("#search").trigger("click"),void a.preventDefault()}),c.find("#search").on("click",function(){var d=$.trim(c.find("#keyword").val());if(!d)return!1;var e={key:d,scene:b.scene};$.post(tiny.getUrl("common/fans/list"),e,function(b){var d=$.parseJSON(b);if(d.message.message&&d.message.message.length>0){c.find(".content").data("attachment",d.message.message);var e=$("#select-fans-data").html();irequire(["laytpl"],function(b){b(e).render(d.message.message,function(b){c.find(".content").html(b),c.find(".content .btn-primary").off(),c.find(".content .btn-primary").on("click",function(){var b=$(this).data("id"),e=d.message.data[b];$.isFunction(a)&&a(e),c.modal("hide")})})})}else $html='没有符合条件的粉丝<br>如果您正在设置提现账户,并且没有找到粉丝,如果您使用了小程序,请先进入外卖小程序首页,然后再搜索添加<br>如果未搜索到粉丝,你可以<a href="javascript:;" onclick="$(\'#follow-qrcode\').toggle()">"扫码绑定粉丝"</a>来进行粉丝绑定，绑定成功后，然后再搜索添加',c.find(".content #info").html($html)})})},tiny.selectStore=function(callback,option){$("#select-store-modal").remove(),$.ajax(tiny.getUrl("common/store/list"),{type:"get",dataType:"html",cache:!1}).done(function(html){$Modal=$('<div class="modal fade" id="select-store-modal"></div>'),$(document.body).append($Modal),$Modal.modal("show"),$Modal.iappend(html,function(){1==option.mutil?$Modal.find(".modal-footer").removeClass("hide"):$Modal.find(".modal-footer").addClass("hide"),$Modal.find("#keyword").on("keydown",function(a){if(13==a.keyCode)return $Modal.find("#search").trigger("click"),void a.preventDefault()}),$Modal.find("#search").on("click",function(){var key=$.trim($Modal.find("#keyword").val());$.post(tiny.getUrl("common/store/list"),{key:key},function(data){var result=$.parseJSON(data);if(result.message.message&&result.message.message.length>0){$Modal.find(".content").data("attachment",result.message.data);var gettpl=$("#select-store-data").html();irequire(["laytpl"],function(laytpl){laytpl(gettpl).render(result.message.message,function(html){$Modal.find(".content").html(html),$Modal.find(".content .btn-item").off(),$Modal.find(".content .btn-item").on("click",function(){if(option.mutil)$(this).toggleClass("btn-primary"),$(this).hasClass("btn-primary")?$(this).removeClass("btn-default"):$(this).removeClass("btn-primary").addClass("btn-default"),$Modal.find(".modal-footer .btn-submit").off(),$Modal.find(".modal-footer .btn-submit").on("click",function(){var stores=[];$Modal.find(".content .btn-primary").each(function(){stores.push($Modal.find(".content").data("attachment")[$(this).data("id")])}),callback=eval(callback),$.isFunction(callback)&&callback(stores,option),$Modal.modal("hide")});else{var id=$(this).data("id"),store=result.message.data[id];callback=eval(callback),$.isFunction(callback)&&callback(store,option),$Modal.modal("hide")}})})})}else $Modal.find(".content #info").html("没有符合条件的商户")})})})})},tiny.selectDeliveryer=function(callback,option){$("#select-deliveryer-modal").remove(),$.ajax(tiny.getUrl("common/deliveryer/list"),{type:"get",dataType:"html",cache:!1}).done(function(html){$Modal=$('<div class="modal fade" id="select-deliveryer-modal"></div>'),$(document.body).append($Modal),$Modal.modal("show"),$Modal.iappend(html,function(){1==option.mutil?$Modal.find(".modal-footer").removeClass("hide"):$Modal.find(".modal-footer").addClass("hide"),$Modal.find("#keyword").on("keydown",function(a){if(13==a.keyCode)return $Modal.find("#search").trigger("click"),void a.preventDefault()}),$Modal.find("#search").on("click",function(){var params={key:$.trim($Modal.find("#keyword").val()),type:option.type};$.post(tiny.getUrl("common/deliveryer/list"),params,function(data){var result=$.parseJSON(data);if(result.message.message&&result.message.message.length>0){$Modal.find(".content").data("attachment",result.message.data);var gettpl=$("#select-deliveryer-data").html();irequire(["laytpl"],function(laytpl){laytpl(gettpl).render(result.message.message,function(html){$Modal.find(".content").html(html),$Modal.find(".content .btn-item").off(),$Modal.find(".content .btn-item").on("click",function(){if(option.mutil)$(this).toggleClass("btn-primary"),$(this).hasClass("btn-primary")?$(this).removeClass("btn-default"):$(this).removeClass("btn-primary").addClass("btn-default"),$Modal.find(".modal-footer .btn-submit").off(),$Modal.find(".modal-footer .btn-submit").on("click",function(){var deliveryer=[];$Modal.find(".content .btn-primary").each(function(){deliveryer.push($Modal.find(".content").data("attachment")[$(this).data("id")])}),callback=eval(callback),$.isFunction(callback)&&callback(deliveryer,option),$Modal.modal("hide")});else{var id=$(this).data("id"),deliveryer=result.message.data[id];callback=eval(callback),$.isFunction(callback)&&callback(deliveryer,option),console.log(deliveryer),$Modal.modal("hide")}})})})}else $Modal.find(".content #info").html("没有符合条件的配送员")})})})})},tiny.selectgoods=function(callback,option){$("#select-goods-modal").remove(),$(document.body).append($("#select-goods-containter").html());var $Modal=$("#select-goods-modal");1==option.mutil?$Modal.find(".modal-footer").removeClass("hide"):$Modal.find(".modal-footer").addClass("hide"),$Modal.modal("show"),$Modal.find("#keyword").on("keydown",function(a){if(13==a.keyCode)return $Modal.find("#search").trigger("click"),void a.preventDefault()}),$Modal.find("#search").on("click",function(){var key=$.trim($Modal.find("#keyword").val());if(!key)return!1;option.key=key,$.post(tiny.getUrl("common/goods/list"),option,function(data){var result=$.parseJSON(data);if(result.message.message&&result.message.message.length>0){$Modal.find(".content").data("attachment",result.message.data);var gettpl=$("#select-goods-data").html();irequire(["laytpl"],function(laytpl){laytpl(gettpl).render(result.message.message,function(html){$Modal.find(".content").html(html),$Modal.find(".content .btn-item").off(),$Modal.find(".content .btn-item").on("click",function(){if(option.mutil)$(this).toggleClass("btn-primary"),$(this).hasClass("btn-primary")?$(this).removeClass("btn-default"):$(this).removeClass("btn-primary").addClass("btn-default"),$Modal.find(".modal-footer .btn-submit").off(),$Modal.find(".modal-footer .btn-submit").on("click",function(){var goods=[];$Modal.find(".content .btn-primary").each(function(){goods.push($Modal.find(".content").data("attachment")[$(this).data("id")])}),callback=eval(callback),$.isFunction(callback)&&callback(goods,option),$Modal.modal("hide")});else{var id=$(this).data("id"),goods=result.message.data[id];callback=eval(callback),$.isFunction(callback)&&callback(goods,option),$Modal.modal("hide")}})})})}else $Modal.find(".content #info").html("没有符合条件的商品")})})},tiny.selectaccount=function(a){irequire(["laytpl"],function(b){$("#select-account-modal").remove(),$(document.body).append($("#select-account-containter").html());var c=$("#select-account-modal");c.modal("show"),c.find("#keyword").on("keydown",function(a){if(13==a.keyCode)return c.find("#search").trigger("click"),void a.preventDefault()}),c.find("#search").on("click",function(){var d=$.trim(c.find("#keyword").val());if(!d)return!1;$.post(tiny.getUrl("common/account/list"),{key:d},function(d){var e=$.parseJSON(d);if(e.message.message&&e.message.message.length>0){c.find(".content").data("attachment",e.message.message);var f=$("#select-account-data").html();b(f).render(e.message.message,function(b){c.find(".content").html(b),c.find(".content .btn-primary").off(),c.find(".content .btn-primary").on("click",function(){var b=$(this).data("uniacid"),d=e.message.data[b];$.isFunction(a)&&a(d),c.modal("hide")})})}else c.find(".content #info").html("没有符合条件的粉丝")})})})},tiny.confirm=function(a,b,c,d){"string"==typeof b&&(b={tips:b}),b=$.extend({tips:"确认删除?",placement:"left"},b),a.popover({html:!0,placement:b.placement,trigger:"manual",title:"",content:"<span> "+b.tips+' </span> <a class="btn btn-primary confirm">确定</a> <a class="btn btn-default cancel">取消</a>'}),a.popover("show");var e=a.next().find("a.confirm");return a.next().find("a.cancel").off("click").on("click",function(){a.popover("hide"),a.next().remove(),"function"==typeof d&&d()}),e.off("click").on("click",function(){a.popover("hide"),a.next().remove(),"function"==typeof c&&c()}),!1},tiny.map=function(a,b){$.getScript("//webapi.amap.com/maps?v=1.4.1&key=550a3bf0cb6d96c3b43d330fb7d86950&plugin=AMap.Geocoder,AMap.Scale,AMap.OverView,AMap.ToolBar",function(){function c(a){d.getLocation(a,function(a,b){if("complete"===a&&"OK"===b.info){var c=b.geocodes[0];c.location&&(map.panTo([c.location.lng,c.location.lat]),marker.setPosition([c.location.lng,c.location.lat]),marker.setAnimation("AMAP_ANIMATION_BOUNCE"),setTimeout(function(){marker.setAnimation(null)},3600))}})}a||(a={}),a.lng||(a.lng=116.397428),a.lat||(a.lat=39.90923);var d=new AMap.Geocoder,e=$("#map-dialog");if(0==e.length){e=util.dialog("请选择地点",'<div class="form-group"><div class="input-group"><input type="text" class="form-control" placeholder="请输入地址来直接查找相关位置"><div class="input-group-btn"><button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button></div></div></div><div id="map-container" style="height:400px;"></div>','<button type="button" class="btn btn-default" data-dismiss="modal">取消</button><button type="button" class="btn btn-primary">确认</button>',{containerName:"map-dialog"}),e.find(".modal-dialog").css("width","80%"),e.modal({keyboard:!1}),map=tiny.map.instance=new AMap.Map("map-container"),map.setZoomAndCenter(12,[a.lng,a.lat]),map.addControl(new AMap.Scale),map.addControl(new AMap.ToolBar),marker=tiny.map.marker=new AMap.Marker({position:[a.lng,a.lat],draggable:!0}),map.on("complete",function(){marker.setLabel({offset:new AMap.Pixel(-80,-25),content:"请您移动此标记，选择您的坐标！"}),marker.setMap(map),AMap.event.addListener(marker,"dragend",function(a){var b=marker.getPosition();d.getAddress([b.lng,b.lat],function(a,b){"complete"===a&&"OK"===b.info&&e.find(".input-group :text").val(b.regeocode.formattedAddress)})})}),e.find(".input-group :text").keydown(function(a){if(13==a.keyCode){c($(this).val())}}),e.find(".input-group button").click(function(){c($(this).parent().prev().val())})}e.off("shown.bs.modal"),e.on("shown.bs.modal",function(){marker.setPosition([a.lng,a.lat]),map.panTo([a.lng,a.lat])}),e.find("button.btn-primary").off("click"),e.find("button.btn-primary").on("click",function(){if($.isFunction(b)){var a=marker.getPosition();d.getAddress([a.lng,a.lat],function(c,d){if("complete"===c&&"OK"===d.info){var e={lng:a.lng,lat:a.lat,label:d.regeocode.formattedAddress};b(e)}})}e.modal("hide")}),e.modal("show")})},tiny.prompt=function(a,b,c,d){"string"==typeof b&&(b={tips:b}),b=$.extend({title:"",placement:"top"},b),a.popover({html:!0,placement:b.placement,trigger:"manual",title:b.title,content:'<input type="text" class="form-control prompt-input-text" value=""> <a class="btn btn-primary confirm" style="margin-right:5px">确定</a> <a class="btn btn-default cancel" style="margin-right:5px">取消</a>'}),a.popover("show");var e=a.next().find("a.confirm"),f=a.next().find("a.cancel"),g=a.next().find(".prompt-input-text");return g.focus(),$(g).keydown(function(a){if(13==a.keyCode)return $(e).trigger("click"),!1}),f.off("click").on("click",function(){var b=a.next().find(".prompt-input-text").val();a.popover("hide"),a.next().remove(),"function"==typeof d&&d(b)}),e.off("click").on("click",function(){var b=a.next().find(".prompt-input-text").val();a.popover("hide"),a.next().remove(),"function"==typeof c&&c(b)}),!1},tiny});