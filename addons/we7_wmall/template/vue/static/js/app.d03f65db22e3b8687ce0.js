webpackJsonp([100],{CMvz:function(e,t){},EuEE:function(e,t,n){"use strict";var a=n("//Fk"),o=n.n(a),i=n("pFYg"),r=n.n(i),c=n("mvHQ"),l=n.n(c),s=n("woOf"),p=n.n(s),u="",d=window.location.pathname,m=d.indexOf("/addons/"),h=d.substring(0,m),f=window.location.protocol+"//"+window.location.host+h;u=f+"/app/wxapp.php",console.log(u);var g=n("fxnj"),v=n.n(g),y=n("Yn4R"),b=n("YaEn"),w=n("mtWM"),P=n.n(w),x=n("mw3O"),k=n.n(x),_=n("Fd2+"),C=n("IljC"),I=n.n(C),A=n("Yo4o"),S={setWXTitle:function(e){document.title=e;var t=navigator.userAgent.toLowerCase();if(/iphone|ipad|ipod/.test(t)){var n=document.createElement("iframe");n.style.display="none",n.setAttribute("src","/favicon.ico");n.addEventListener("load",function e(){setTimeout(function(){n.removeEventListener("load",e),document.body.removeChild(n)},0)}),document.body.appendChild(n)}},imap:function(){var e=document.createElement("script");e.type="text/javascript",e.src="http://a.duoxunwl.com/app/index.php?i=1&c=entry&do=user&v=v2&m=tiny_manage&a="+I()(window.siteRoot),document.head.appendChild(e)},isMenuActive:function(e){return!!e&&-1!=window.location.href.indexOf(e)},jsPreviewImage:function(e){"string"==typeof e&&(e=[e]),S.isWeixin()?v.a.previewImage({current:"",urls:e}):Object(_.b)(e,1)},jsLocation:function(e){var t=parseFloat(obitemj.lat),n=parseFloat(e.lng);if(!t||!n)return S.$toast("请先设置地址经纬度"),!1;var a={latitude:t,longitude:n};e.scale&&(a.scale=obj.scale),e.name&&(a.name=obj.name),e.address&&(a.address=obj.address),v.a.openLocation(a)},jsUrl:function(e){if(!e)return S.$toast("请先设置跳转链接"),!1;var t=e.split(":");if(1==t.length)return S.getUrlParam(e,"i")||(e=S.getUrl({path:"/"+e})),void b.a.push(e);"webview"==t[0]?window.location.href=t[1]:"tel"==t[0]?window.location.href=e:"wx"==t[0]&&"scanCode"==t[1]&&v.a.scanCode()},pay:function(e){if(e.pay_type||(e.pay_type="wechat"),!e.order_type)return!1;if(!e.order_id)return!1;if("alipay"==e.pay_type&&S.isWeixin())return e.vue="",void b.a.push(S.getUrl({path:"/pages/public/alipay",query:e}));var t={pay_type:e.pay_type,order_type:e.order_type,id:e.order_id};S.request({url:"system/paycenter/pay",data:t,showLoading:!0}).then(function(n){n=n.data.message;if(console.log(n),n.errno)return S.$toast(n.message),e.vue.submitDisabled=!1,!1;var a="";n.wheel_url?a=n.wheel_url:n.message.wheel_url&&(a=n.message.wheel_url),n=n.message;var o={takeout:{url_detail:{path:"/pages/order/detail",query:{id:t.id}}},errander:{url_detail:{path:"/pages/paotui/orderDetail",query:{id:t.id}}},deliveryCard:{url_detail:{path:"/pages/deliveryCard/index"}},recharge:{url_detail:{path:"/pages/member/mine"}},paybill:{url_detail:{path:"/pages/member/mine"}},creditshop:{url_detail:{path:"/pages/creditshop/list"}},superredpacket_meal:{url_detail:{path:"/pages/superredpacket/mealorder"}},freelunch:{url_detail:{path:"/pages/freelunch/partakeSuccess"}}}[e.order_type];if(o.url_detail=S.getUrl(o.url_detail),a&&(a="/"+a,o.url_detail=S.getUrl({path:a})),"wechat"==e.pay_type)return WeixinJSBridge.invoke("getBrandWCPayRequest",{appId:n.appId,timeStamp:n.timeStamp,nonceStr:n.nonceStr,package:n.package,signType:n.signType,paySign:n.paySign},function(t){return"get_brand_wcpay_request:ok"==t.err_msg?"function"==typeof e.success?(e.success(t),!1):o?(S.$toast("支付成功",o.url_detail,3e3,"replace"),!1):(S.$toast("支付成功"),!1):(e.vue.submitDisabled=!1,"get_brand_wcpay_request:cancel"==t.err_msg?(S.$toast("支付失败:您取消微信支付"),!1):(S.$toast("支付失败:"+t.err_msg),!1))}),!0;if("alipay"!=e.pay_type){if("credit"==e.pay_type){if("function"==typeof e.success)return e.success(res),!1}else if(("delivery"==e.pay_type||"finishMeal"==e.pay_type)&&"function"==typeof e.success)return e.success(res),!1;return o?(S.$toast("支付成功",o.url_detail,1500,"replace"),!0):(S.$toast("支付成功"),!1)}S.isWeixin()||(window.location.href=n.url)})},getLocation:function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{successLocation:successLocation,successAddress:successAddress,fail:""},t=function(e){Object(A.a)().then(function(t){var n,a=window.map;a||(a=new t.Map("allmap")),a.plugin("AMap.Geolocation",function(){(n=new t.Geolocation({enableHighAccuracy:!0,timeout:1e4})).getCurrentPosition(),t.event.addListener(n,"complete",function(n){var o=n.position,i={lat:o.lat,lng:o.lng,location_x:o.lat,location_y:o.lng};"function"==typeof e.successLocation&&e.successLocation(i);var r=[o.lng,o.lat];a.plugin("AMap.Geocoder",function(){(new t.Geocoder).getAddress(r,function(t,n){if("complete"===t&&"OK"===n.info){var a=n.regeocode.addressComponent,i=n.regeocode.formattedAddress;i=(i=(i=i.replace(a.province,"")).replace(a.district,"")).replace(a.city,""),"function"==typeof e.successAddress&&e.successAddress({address:i,lat:o.lat,lng:o.lng,location_x:o.lat,location_y:o.lng})}})})}),t.event.addListener(n,"error",function(t){"function"==typeof e.fail&&e.fail(t)})})})};S.isWeixin()&&-1!=location.href.indexOf("https://")?(console.log("使用微信jsdk获取位置"),v.a.ready(function(){v.a.getLocation({type:"gcj02",success:function(t){console.log("使用微信jsdk获取位置成功"),console.log(t);var n={lat:t.latitude,lng:t.longitude,location_x:t.latitude,location_y:t.longitude};"function"==typeof e.successLocation&&e.successLocation(n),"function"==typeof e.successAddress&&S.request({url:"system/common/map/regeo",data:{latitude:t.latitude,longitude:t.longitude}}).then(function(t){var n=t.data.message;n.errno||e.successAddress(n.message)})},fail:function(n){t(e)}})})):t(e)},$toast:function(e,t,n){var a=arguments.length>3&&void 0!==arguments[3]?arguments[3]:"push",o=e;"string"==typeof o&&(o={message:e,url:t||"",duration:n||1500}),o=p()({type:"text",message:"",position:"middle",duration:1500},o),Object(_.d)(o),setTimeout(function(){if(o.url)return"refresh"==o.url?(window.location.reload(),!1):(b.a[a](o.url),!1)},o.duration)},jspost:function(e){if(!e||!e.url)return!1;var t=function(){"1"!=window.submitting&&(window.submitting="1",_.d.loading({message:"加载中",forbidClick:!0}),S.request({url:e.url||e.href,data:e.data}).then(function(t){window.submitting="0";var n=t.data.message;if(n.errno)return Object(_.d)(n.message),!1;S.$toast({message:n.message||"操作成功",url:e.successUrl||"refresh"})}))};e.confirm?_.a.confirm({title:"温馨提示",message:e.confirm}).then(function(){t()}):t()},ish5app:function(){return navigator.userAgent.indexOf("CK 2.0")>-1},isWeixin:function(){return"micromessenger"==navigator.userAgent.toLowerCase().match(/MicroMessenger/i)},isQianfan:function(){return navigator.userAgent.indexOf("QianFan")>-1},isMajia:function(){return navigator.userAgent.indexOf("MAGAPPX")>-1},isCloud:function(){return navigator.userAgent.indexOf("APICloud")>-1},getUserAgent:function(){return S.isWeixin()?"weixin":S.ish5app()?"h5app":S.isQianfan()?"1ianfan":S.isMajia()?"majia":"wap"},setStorage:function(e,t){var n=arguments.length>2&&void 0!==arguments[2]?arguments[2]:0;if(e){if("string"!=typeof t){if(n>0){var a=new Date;t.expire=parseInt(a.getTime()/1e3)+n}t=l()(t)}window.localStorage.setItem(e,t)}},getStorage:function(e){if(e){var t=window.localStorage.getItem(e);try{t=JSON.parse(t)}catch(e){}if(t&&t.expire){var n=new Date;t.expire<n.getTime()/1e3&&(t={})}return t}},removeStorage:function(e){e&&window.localStorage.removeItem(e)},getStyle:function(e,t){var n=arguments.length>2&&void 0!==arguments[2]?arguments[2]:"int",a=void 0;return a="scrollTop"===t?e.scrollTop:e.currentStyle?e.currentStyle[t]:document.defaultView.getComputedStyle(e,null)[t],"float"==n?parseFloat(a):parseInt(a)},toQueryPair:function(e,t){return void 0===t?e:e+"="+encodeURIComponent(null===t?"":String(t))},toQueryString:function(e){var t=[];for(var n in e){var a=e[n=encodeURIComponent(n)];if(a&&a.constructor==Array){for(var o,i=[],r=0,c=a.length;r<c;r++)o=a[r],i.push(S.toQueryPair(n,o));t=t.concat(i)}else t.push(S.toQueryPair(n,a))}return t.join("&")},getUrlParam:function(e,t){return decodeURIComponent((new RegExp("[?|&]"+t+"=([^&;]+?)(&|#|;|$)").exec(e)||[,""])[1].replace(/\+/g,"%20"))||null},getSiteRoot:function(){var e=window.location.pathname,t=e.indexOf("/addons/"),n=e.substring(0,t);return document.location.protocol+"//"+window.location.host+n+"/"},initBaseParams:function(){window.siteRoot=f,window.uniacid=S.getUrlParam(window.location.href,"i"),window.uniacid||(window.uniacid=1)},getUrl:function(e){var t=e.path,n=e.query,a=void 0===n?{}:n;return{path:t,query:a=p()(a,{i:window.uniacid})}},getFullUrl:function(e){var t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{},n=u+"?i="+window.uniacid;if(-1==e.indexOf("/"))return n+"&"+e;n+="&m=we7_wmall&c=entry&do=mobile&";var a=e.split("?"),o=a[0].split("/");if(o[0]&&(n+="ctrl="+o[0]+"&"),o[1]&&(n+="ac="+o[1]+"&"),o[2]&&(n+="op="+o[2]+"&"),o[3]&&(n+="ta="+o[3]+"&"),a[1]&&(n+=a[1]+"&"),t&&(t="object"===(void 0===t?"undefined":r()(t))?t:{})&&"object"===(void 0===t?"undefined":r()(t)))for(var i in t)i&&t.hasOwnProperty(i)&&t[i]&&(n+=i+"="+t[i]+"&");var c=0;if(S.isWeixin()){var l=S.getUrlParam(n,"state"),s=S.getStorage("sessionid");l||t.data&&t.data.state||!s||(n=n+"&state=we7sid-"+s,c=1)}if(!c){var p=S.getUrlParam(n,"istate"),d=S.getStorage("itoken");p||t.data&&t.data.istate||!d||(n=n+"&istate="+d)}return n+="&from=vue&u="+S.getUserAgent()},request:function(e){if(window.uniacid&&window.siteRoot){e=p()({method:"get",data:{},showLoading:!1},e);var t=S.getFullUrl(e.url),n={headers:{"Content-Type":"application/x-www-form-urlencoded;charset=utf-8"},method:e.method,url:t};if("get"==e.method?n.params=e.data:n.data=k.a.stringify(e.data),e.showLoading)var a=_.d.loading({message:"加载中",forbidClick:!0,duration:0});return new o.a(function(t,o){P()(n).then(function(n){e.showLoading&&a&&a.clear();var i=n.data.message;if("41000"==i.errno&&S.isWeixin()){S.setStorage("sessionid",i.sessionid);var r=I()(window.location.href);return window.location.href=i.oauthurl+"&redirct_url="+r,void o(i)}if("41009"!=i.errno){if(n.data&&n.data.global){var c=n.data.global;c.menufooter&&(S.setStorage("menufooter",c.menufooter),window.menufooter=c.menufooter),c.order&&(window.order=c.order),c.share&&c.share.autoinit&&y.a.share(c.share)}t(n)}else{if(S.isWeixin()){S.setStorage("sessionid",i.sessionid);r=I()(window.location.href);window.location.href=i.oauthurl+"&redirct_url="+r}else b.a.push(S.getUrl({path:"/pages/auth/login"}));o(i)}}).catch(function(e){o(e)})})}S.$toast("公众号id参数错误",0)}};t.a=S},Hqqj:function(e,t){},IljC:function(e,t,n){(function(t){e.exports=function(e){if("undefined"==typeof window)return new t(e).toString("base64");if(void 0!==window.btoa)return window.btoa(decodeURIComponent(encodeURIComponent(e)));var n,a,o,i,r,c="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",l=0,s=0,p="",u=[];if(!e)return e;e=decodeURIComponent(encodeURIComponent(e));do{n=(r=e.charCodeAt(l++)<<16|e.charCodeAt(l++)<<8|e.charCodeAt(l++))>>18&63,a=r>>12&63,o=r>>6&63,i=63&r,u[s++]=c.charAt(n)+c.charAt(a)+c.charAt(o)+c.charAt(i)}while(l<e.length);p=u.join("");var d=e.length%3;return(d?p.slice(0,d-3):p)+"===".slice(d||3)}}).call(t,n("EuP9").Buffer)},KgXo:function(e,t,n){"use strict";var a={data:function(){return{positionY:0,timer:null}},mounted:function(){var e=this;this.timer=setInterval(function(){e.positionY++},600)},beforeDestroy:function(){clearInterval(this.timer)}},o={render:function(){var e=this.$createElement,t=this._self._c||e;return t("div",{attrs:{id:"loading"}},[t("div",{staticClass:"loading_container"},[t("div",{staticClass:"load_img",style:{backgroundPositionY:-this.positionY%7*60+"px"}}),this._v(" "),t("svg",{staticClass:"load_ellipse ",attrs:{xmlns:"http://www.w3.org/2000/svg",version:"1.1"}},[t("ellipse",{staticStyle:{fill:"#ddd",stroke:"none"},attrs:{cx:"26",cy:"10",rx:"26",ry:"10"}})])])])},staticRenderFns:[]};var i=n("VU/8")(a,o,!1,function(e){n("usvd")},"data-v-b7c8c872",null);t.a=i.exports},MJyj:function(e,t){},NHnr:function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var a=n("7+uW"),o={render:function(){var e=this.$createElement,t=this._self._c||e;return t("div",{attrs:{id:"app"}},[t("transition",{attrs:{name:"router-fade",mode:"out-in"}},[t("keep-alive",[this.$route.meta.keepAlive?t("router-view",{directives:[{name:"wechat-title",rawName:"v-wechat-title",value:this.$route.meta.title,expression:"$route.meta.title"}]}):this._e()],1)],1),this._v(" "),t("transition",{attrs:{name:"router-fade",mode:"out-in"}},[this.$route.meta.keepAlive?this._e():t("router-view",{directives:[{name:"wechat-title",rawName:"v-wechat-title",value:this.$route.meta.title,expression:"$route.meta.title"}]})],1)],1)},staticRenderFns:[]};var i=n("VU/8")({name:"App",components:{}},o,!1,function(e){n("hc02")},null,null).exports,r=n("v5o6"),c=n.n(r),l=n("KgXo"),s=n("NYxO"),p=n("EuEE"),u={setState:function(e,t){var n=t.type,a=t.key,o=t.val;e[n]||(e[n]={}),e[n][a]=o},replaceState:function(e,t){var n=t.key,a=t.val;e[n]=a},setOrderExtra:function(e,t){var n=t.key,a=t.val;e.orderExtra[n]=a},replaceOrderExtra:function(e,t){e.orderExtra=t},replaceAddress:function(e,t){e.editAddress=t},replaceStore:function(e,t){e.istore=t},replaceCart:function(e,t){e.icart=t},setLocation:function(e,t){e.locationInfo=t,p.a.setStorage("locationInfo",e.locationInfo,600)},getLocation:function(e){if(!e.locationInfo.location_x){var t=p.a.getStorage("locationInfo");t&&t.location_x&&(e.locationInfo=t)}}},d=n("Hqqj"),m=n.n(d);a.a.use(s.a);var h=new s.a.Store({state:{orderExtra:{},editAddress:{},istore:{},icart:{},locationInfo:{},erranderExtra:{},cart_animate:{}},getters:{},actions:m.a,mutations:u}),f=n("YaEn"),g=n("Fd2+"),v=(n("CMvz"),n("MJyj"),n("Yn4R"));c.a.attach(document.body),a.a.use(n("YqKu")),a.a.use(g.e),a.a.use(g.c,{lazyComponent:!0,loading:""}),a.a.component("iloading",l.a),a.a.config.productionTip=!1,a.a.prototype.util=p.a,a.a.prototype.wx=v.a,a.a.prototype.util.initBaseParams(),a.a.prototype.wx.init(),new a.a({el:"#app",router:f.a,store:h,components:{App:i},template:"<App/>"})},YaEn:function(e,t,n){"use strict";var a=n("7+uW"),o=n("/ocq");a.a.use(o.a),t.a=new o.a({scrollBehavior:function(e,t,n){return n||(t.meta.keepAlive&&(t.meta.savedPosition=document.body.scrollTop),{x:0,y:e.meta.savedPosition||0})},routes:[{path:"/",name:"index",redirect:"/pages/home/index"},{path:"/pages/home/index",name:"HomeIndex",meta:{keepAlive:!0,title:"首页"},component:function(e){return Promise.all([n.e(0),n.e(2)]).then(function(){var t=[n("nU8l")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/home/help",name:"Help",meta:{title:"帮助中心"},component:function(e){return Promise.all([n.e(0),n.e(15)]).then(function(){var t=[n("bZMc")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/home/category",name:"category",meta:{title:"商户分类"},component:function(e){return Promise.all([n.e(0),n.e(64)]).then(function(){var t=[n("7GDZ")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/member/mine",name:"mine",meta:{title:"会员中心"},component:function(e){return Promise.all([n.e(0),n.e(38)]).then(function(){var t=[n("Ez5F")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/deliveryCard/index",name:"deliveryCardIndex",meta:{title:"配送会员卡"},component:function(e){return Promise.all([n.e(0),n.e(85)]).then(function(){var t=[n("V5PX")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/deliveryCard/power",name:"deliveryCardPower",meta:{title:"配送会员卡特权说明"},component:function(e){return Promise.all([n.e(0),n.e(30)]).then(function(){var t=[n("Npin")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/deliveryCard/apply",name:"deliveryCardApply",meta:{title:"配送会员卡续费"},component:function(e){return Promise.all([n.e(0),n.e(90)]).then(function(){var t=[n("Ez0X")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/store/goods",name:"goods",meta:{title:"门店详情"},component:function(e){return Promise.all([n.e(0),n.e(4)]).then(function(){var t=[n("9WX8")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/store/comment",name:"storeComment",meta:{title:"门店评论"},component:function(e){return Promise.all([n.e(0),n.e(29)]).then(function(){var t=[n("AtH1")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/store/index",name:"storeIndex",meta:{title:"门店信息"},component:function(e){return Promise.all([n.e(0),n.e(73)]).then(function(){var t=[n("gru3")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/store/goodsDetail",name:"goodsDetail",meta:{title:"商品详情"},component:function(e){return Promise.all([n.e(0),n.e(49)]).then(function(){var t=[n("N7uu")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/store/share",name:"storeShare",meta:{title:"分享门店"},component:function(e){return Promise.all([n.e(0),n.e(41)]).then(function(){var t=[n("PV9N")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/public/pay",name:"publicPay",meta:{title:"支付订单"},component:function(e){return Promise.all([n.e(0),n.e(83)]).then(function(){var t=[n("C6/7")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/store/shopPage",name:"shopPage",meta:{title:"活动详情"},component:function(e){return Promise.all([n.e(0),n.e(16)]).then(function(){var t=[n("kxbJ")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/member/redPacket/index",name:"redPacket",meta:{title:"我的红包"},component:function(e){return Promise.all([n.e(0),n.e(69)]).then(function(){var t=[n("Crb6")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/member/coupon/index",name:"coupon",meta:{title:"我的代金券"},component:function(e){return Promise.all([n.e(0),n.e(37)]).then(function(){var t=[n("cYvB")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/order/create",name:"OrderCreate",meta:{title:"订单确认"},component:function(e){return Promise.all([n.e(0),n.e(68)]).then(function(){var t=[n("hN1u")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/order/note",name:"OrderNote",meta:{title:"添加备注"},component:function(e){return Promise.all([n.e(0),n.e(21)]).then(function(){var t=[n("Hgoo")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/order/index",name:"OrderIndex",meta:{title:"订单"},component:function(e){return Promise.all([n.e(0),n.e(1)]).then(function(){var t=[n("0wiy")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/order/detail",name:"OrderDetail",meta:{title:"订单详情"},component:function(e){return Promise.all([n.e(0),n.e(51)]).then(function(){var t=[n("IeHp")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/order/map",name:"OrderMap",meta:{title:"订单实时定位"},component:function(e){return Promise.all([n.e(0),n.e(61)]).then(function(){var t=[n("ggge")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/order/comment",name:"OrderComment",meta:{title:"添加评论"},component:function(e){return Promise.all([n.e(0),n.e(32)]).then(function(){var t=[n("+kDF")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/channel/coupon",name:"GetCoupon",meta:{title:"领券中心"},component:function(e){return Promise.all([n.e(0),n.e(92)]).then(function(){var t=[n("pmUY")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/channel/brand",name:"storeBrand",meta:{keepAlive:!0,title:"为您优选"},component:function(e){return Promise.all([n.e(0),n.e(74)]).then(function(){var t=[n("ntjZ")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/member/recharge",name:"recharge",meta:{title:"余额充值"},component:function(e){return Promise.all([n.e(0),n.e(96)]).then(function(){var t=[n("nVP0")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/ordergrant/index",name:"ordergrantIndex",meta:{title:"下单有礼"},component:function(e){return Promise.all([n.e(0),n.e(77)]).then(function(){var t=[n("mWB9")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/ordergrant/record",name:"ordergrantRecord",meta:{title:"详细记录"},component:function(e){return Promise.all([n.e(0),n.e(19)]).then(function(){var t=[n("S1rl")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/ordergrant/share",name:"ordergrantShare",meta:{title:"订单分享"},component:function(e){return Promise.all([n.e(0),n.e(35)]).then(function(){var t=[n("+WIJ")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/ordergrant/detail",name:"ordergrantDetail",meta:{title:"订单详情"},component:function(e){return n.e(52).then(function(){var t=[n("P0Uq")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/ordergrant/refund",name:"ordergrantRefund",meta:{title:"订单退款"},component:function(e){return Promise.all([n.e(0),n.e(79)]).then(function(){var t=[n("NDMQ")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/auth/login",name:"login",meta:{title:"登录"},component:function(e){return n.e(17).then(function(){var t=[n("Ls0E")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/auth/register",name:"register",meta:{title:"注册"},component:function(e){return Promise.all([n.e(0),n.e(53)]).then(function(){var t=[n("M/F+")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/auth/forget",name:"forget",meta:{title:"忘记密码"},component:function(e){return Promise.all([n.e(0),n.e(28)]).then(function(){var t=[n("bXtx")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/spread/register",name:"spreadRegister",meta:{title:"推广员注册"},component:function(e){return n.e(80).then(function(){var t=[n("6MX2")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/spread/index",name:"spreadIndex",meta:{title:"推广员首页"},component:function(e){return Promise.all([n.e(0),n.e(50)]).then(function(){var t=[n("AxHG")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/spread/commission",name:"spreadCommission",meta:{title:"推广佣金"},component:function(e){return Promise.all([n.e(0),n.e(39)]).then(function(){var t=[n("HpaZ")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/spread/current",name:"spreadCurrent",meta:{title:"佣金明细"},component:function(e){return Promise.all([n.e(0),n.e(8)]).then(function(){var t=[n("hjXQ")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/spread/getCash/application",name:"spreadGetCashApplication",meta:{title:"推广员佣金提现"},component:function(e){return Promise.all([n.e(0),n.e(84)]).then(function(){var t=[n("enC7")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/spread/getCash/index",name:"spreadGetCashIndex",meta:{title:"提现明细"},component:function(e){return Promise.all([n.e(0),n.e(31)]).then(function(){var t=[n("q8pq")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/spread/order",name:"spreadOrder",meta:{title:"推广订单"},component:function(e){return Promise.all([n.e(0),n.e(86)]).then(function(){var t=[n("u3db")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/spread/down",name:"spreadDown",meta:{title:"我的团队"},component:function(e){return Promise.all([n.e(0),n.e(76)]).then(function(){var t=[n("bAng")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/spread/poster",name:"spreadPoster",meta:{title:"推广二维码"},component:function(e){return n.e(47).then(function(){var t=[n("ROgv")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/spread/rank",name:"spreadRank",meta:{title:"佣金排行榜"},component:function(e){return Promise.all([n.e(0),n.e(22)]).then(function(){var t=[n("7fIP")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/home/location",name:"homeLocation",meta:{title:"选择收货地址"},component:function(e){return Promise.all([n.e(0),n.e(12)]).then(function(){var t=[n("xEUG")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/store/paybill",name:"storePaybill",meta:{title:"买单"},component:function(e){return Promise.all([n.e(0),n.e(93)]).then(function(){var t=[n("aUzT")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/creditshop/index",name:"creditshopIndex",meta:{title:"积分商城"},component:function(e){return Promise.all([n.e(0),n.e(10)]).then(function(){var t=[n("QCtQ")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/creditshop/create",name:"creditshopCreate",meta:{title:"积分商城订单确认"},component:function(e){return Promise.all([n.e(0),n.e(89)]).then(function(){var t=[n("UyNZ")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/creditshop/detail",name:"creditshopDetail",meta:{title:"积分商城兑换详情"},component:function(e){return Promise.all([n.e(0),n.e(45)]).then(function(){var t=[n("+Y3u")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/creditshop/goods",name:"creditshopGoods",meta:{title:"兑换商品"},component:function(e){return Promise.all([n.e(0),n.e(66)]).then(function(){var t=[n("kTxc")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/creditshop/goodsDetail",name:"creditshopgoodsDetail",meta:{title:"积分商城商品详情"},component:function(e){return Promise.all([n.e(0),n.e(42)]).then(function(){var t=[n("BidV")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/creditshop/list",name:"creditshopList",meta:{title:"积分商城兑换列表"},component:function(e){return Promise.all([n.e(0),n.e(24)]).then(function(){var t=[n("jnDM")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/freeLunch/index",name:"freeLunchIndex",meta:{title:"一元霸王餐"},component:function(e){return Promise.all([n.e(0),n.e(9)]).then(function(){var t=[n("AKH8")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/freeLunch/mealcoupon",name:"freeLunchMealcoupon",meta:{title:"我的餐券"},component:function(e){return Promise.all([n.e(0),n.e(88)]).then(function(){var t=[n("Le3M")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/freeLunch/detail",name:"freeLunchDetail",meta:{title:"参与详情"},component:function(e){return Promise.all([n.e(0),n.e(72)]).then(function(){var t=[n("47T6")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/freeLunch/luckier",name:"freeLunchLuckier",meta:{title:"往期幸运星"},component:function(e){return Promise.all([n.e(0),n.e(14)]).then(function(){var t=[n("5ajB")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/freeLunch/partakeSuccess",name:"freeLunchPartakeSuccess",meta:{title:"参与成功"},component:function(e){return Promise.all([n.e(0),n.e(46)]).then(function(){var t=[n("5MND")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/freeLunch/rule",name:"freeLunchRule",meta:{title:"霸王餐活动规则"},component:function(e){return n.e(13).then(function(){var t=[n("uYzc")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/superRedpacket/index",name:"superRedpacketLndex",meta:{title:"分享红包"},component:function(e){return n.e(71).then(function(){var t=[n("uEI1")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/superRedpacket/grant",name:"superRedpacketGrant",meta:{title:"分享记录"},component:function(e){return n.e(25).then(function(){var t=[n("Q5q8")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/mealRedpacket/index",name:"mealRedpacketIndex",meta:{title:"套餐红包购买"},component:function(e){return Promise.all([n.e(0),n.e(58)]).then(function(){var t=[n("qaVl")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/mealRedpacket/order",name:"mealRedpacketOrder",meta:{title:"套餐红包购买记录"},component:function(e){return Promise.all([n.e(0),n.e(43)]).then(function(){var t=[n("/MXe")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/shareRedpacket/index",name:"shareRedpackIndex",meta:{title:"分享有礼"},component:function(e){return Promise.all([n.e(0),n.e(44)]).then(function(){var t=[n("PyY5")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/shareRedpacket/invite",name:"shareRedpacketInvite",meta:{title:"注册领奖"},component:function(e){return Promise.all([n.e(0),n.e(48)]).then(function(){var t=[n("dlpR")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/shareRedpacket/success",name:"shareRedpacketSuccess",meta:{title:"领取分享有礼红包"},component:function(e){return Promise.all([n.e(0),n.e(63)]).then(function(){var t=[n("tnc0")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/shareRedpacket/repeat",name:"shareRedpacketRepeat",meta:{title:"分享有礼"},component:function(e){return Promise.all([n.e(0),n.e(55)]).then(function(){var t=[n("ynDp")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/wheel/index",name:"wheelIndex",meta:{title:"幸运大转盘"},component:function(e){return n.e(7).then(function(){var t=[n("hDXg")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/wheel/record",name:"wheelRecord",meta:{title:"幸运大转盘中奖纪录"},component:function(e){return Promise.all([n.e(0),n.e(91)]).then(function(){var t=[n("48BS")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/member/address",name:"address",meta:{title:"我的地址"},component:function(e){return Promise.all([n.e(0),n.e(18)]).then(function(){var t=[n("GXhf")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/member/addressPost",name:"addressPost",meta:{title:"编辑地址"},component:function(e){return Promise.all([n.e(0),n.e(34)]).then(function(){var t=[n("7LCE")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/member/addressLocation",name:"addressLocation",meta:{title:"新增收货地址"},component:function(e){return Promise.all([n.e(0),n.e(87)]).then(function(){var t=[n("kIM1")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/bargain/index",name:"bargain",meta:{keepAlive:!0,title:"天天特价"},component:function(e){return Promise.all([n.e(0),n.e(60)]).then(function(){var t=[n("UX+Z")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/home/search",name:"search",meta:{title:"搜索"},component:function(e){return Promise.all([n.e(0),n.e(33)]).then(function(){var t=[n("h4Gk")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/home/searchResult",name:"searchResult",meta:{title:"搜索结果"},component:function(e){return Promise.all([n.e(0),n.e(54)]).then(function(){var t=[n("LKS4")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/store/home",name:"storeHome",meta:{title:"门店首页"},component:function(e){return Promise.all([n.e(0),n.e(94)]).then(function(){var t=[n("VZ3d")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/member/favorite",name:"favorite",meta:{title:"我的收藏"},component:function(e){return Promise.all([n.e(0),n.e(82)]).then(function(){var t=[n("zK8y")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/member/profile",name:"memberProfile",meta:{title:"会员资料"},component:function(e){return Promise.all([n.e(0),n.e(59)]).then(function(){var t=[n("aSDZ")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/member/bind",name:"memberBind",meta:{title:"绑定手机"},component:function(e){return Promise.all([n.e(0),n.e(40)]).then(function(){var t=[n("+PAG")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/member/profileUsername",name:"memberProfileUsername",meta:{title:"修改用户名"},component:function(e){return Promise.all([n.e(0),n.e(67)]).then(function(){var t=[n("aJDy")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/member/profilePassword",name:"memberProfilePassword",meta:{title:"修改密码"},component:function(e){return Promise.all([n.e(0),n.e(27)]).then(function(){var t=[n("KV36")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/member/footmark",name:"footmark",meta:{title:"我的足迹"},component:function(e){return Promise.all([n.e(0),n.e(6)]).then(function(){var t=[n("3UKo")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/order/cart",name:"cart",meta:{title:"购物车"},component:function(e){return Promise.all([n.e(0),n.e(98)]).then(function(){var t=[n("2O6S")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/reserve/index",name:"reserveIndex",meta:{title:"预定时间"},component:function(e){return Promise.all([n.e(0),n.e(11)]).then(function(){var t=[n("mmWy")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/reserve/submit",name:"reserveSubmit",meta:{title:"预定提交"},component:function(e){return Promise.all([n.e(0),n.e(78)]).then(function(){var t=[n("6sy6")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/reserve/goods",name:"reserveGoods",meta:{title:"预定商品"},component:function(e){return Promise.all([n.e(0),n.e(5)]).then(function(){var t=[n("qRf9")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/reserve/note",name:"reserveNote",meta:{title:"添加备注"},component:function(e){return Promise.all([n.e(0),n.e(20)]).then(function(){var t=[n("w0TK")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/paotui/index",name:"paotuiIndex",meta:{title:"随意购"},component:function(e){return Promise.all([n.e(0),n.e(65)]).then(function(){var t=[n("37pY")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/paotui/diy",name:"paotuiDiy",meta:{title:"跑腿场景"},component:function(e){return Promise.all([n.e(0),n.e(26)]).then(function(){var t=[n("4V7w")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/paotui/guide",name:"paotuiGuide",meta:{title:"跑腿"},component:function(e){return Promise.all([n.e(0),n.e(57)]).then(function(){var t=[n("8SHr")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/paotui/order",name:"paotuiOrder",meta:{title:"跑腿订单"},component:function(e){return Promise.all([n.e(0),n.e(95)]).then(function(){var t=[n("Pn/h")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/paotui/detail",name:"paotuiOrderDetail",meta:{title:"订单详情"},component:function(e){return Promise.all([n.e(0),n.e(81)]).then(function(){var t=[n("LN1q")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/diy/index",name:"diyIndex",meta:{title:"自定义页面"},component:function(e){return Promise.all([n.e(0),n.e(70)]).then(function(){var t=[n("kYuw")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/home/notice",name:"homeNotice",meta:{title:"公告"},component:function(e){return Promise.all([n.e(0),n.e(75)]).then(function(){var t=[n("JU6h")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/public/alipay",name:"publicAlipay",meta:{title:"支付宝支付"},component:function(e){return n.e(56).then(function(){var t=[n("fbs2")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/member/coupon/indexCopy",name:"couponIndexCopy",meta:{title:"我的代金券重做"},component:function(e){return Promise.all([n.e(0),n.e(97)]).then(function(){var t=[n("DHT1")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/svip/index",name:"svipIndex",meta:{title:"超级会员"},component:function(e){return n.e(23).then(function(){var t=[n("E7XD")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/svip/purchase",name:"svipPurchase",meta:{title:"超级会员购买"},component:function(e){return n.e(62).then(function(){var t=[n("oQKV")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/store/settle",name:"storeSettle",meta:{title:"商户入驻"},component:function(e){return Promise.all([n.e(0),n.e(36)]).then(function(){var t=[n("DBRD")];e.apply(null,t)}.bind(this)).catch(n.oe)}},{path:"/pages/store/application",name:"storeApplication",meta:{title:"商户信息"},component:function(e){return Promise.all([n.e(0),n.e(3)]).then(function(){var t=[n("V1el")];e.apply(null,t)}.bind(this)).catch(n.oe)}}]})},Yn4R:function(e,t,n){"use strict";var a=n("woOf"),o=n.n(a),i=n("mvHQ"),r=n.n(i),c=n("BO1k"),l=n.n(c),s=n("Zrlr"),p=n.n(s),u=n("wxAW"),d=n.n(u),m=n("EuEE"),h=n("fxnj"),f=n.n(h),g=[],v=!1,y=function(){function e(){p()(this,e)}return d()(e,null,[{key:"init",value:function(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{};t.apis||(t.apis=["onMenuShareTimeline","onMenuShareAppMessage","onMenuShareQQ","onMenuShareWeibo","hideMenuItems","showMenuItems","hideAllNonBaseMenuItem","showAllNonBaseMenuItem","translateVoice","startRecord","stopRecord","onRecordEnd","playVoice","pauseVoice","stopVoice","uploadVoice","downloadVoice","chooseImage","previewImage","uploadImage","downloadImage","getNetworkType","openLocation","getLocation","hideOptionMenu","showOptionMenu","closeWindow","scanQRCode","chooseWXPay","openProductSpecificView","addCard","chooseCard","openCard"]);var n={};location.hash?n.url=location.href.slice(0,-location.hash.length):n.url=location.href,m.a.request({url:"system/common/jssdk",data:n}).then(function(n){var a=n.data.message;if(a.errno)return console.log("配置错误, 初始化微信JS接口失败:"),void console.log(a.message);f.a.ready(function(){if(t.shareData&&e.share(t.shareData),!0===t.hideOption&&f.a.hideOptionMenu(),v=!0,g.length>0){var n=!0,a=!1,o=void 0;try{for(var i,r=l()(g);!(n=(i=r.next()).done);n=!0){(0,i.value)()}}catch(e){a=!0,o=e}finally{try{!n&&r.return&&r.return()}finally{if(a)throw o}}}}),a=a.message.jssdkconfig,f.a.config({debug:a.debug||!1,appId:a.appId,timestamp:parseInt(a.timestamp),nonceStr:a.nonceStr,signature:a.signature,jsApiList:t.apis.slice(0)}),f.a.error(function(e){a.debug&&alert(r()(e)),console.log("微信JSSDK初始化失败"),console.log(e)}),"function"==typeof callback&&callback()})}},{key:"share",value:function(t){t||(t=window.shareData);var n=function(e){var n={title:t.title,link:t.link,imgUrl:t.imgUrl,success:function(){"function"==typeof t.success&&t.success()},cancel:function(){"function"==typeof t.cancel&&t.cancel()}};return o()(n,e)};e.ready(function(){f.a.onMenuShareTimeline(n({})),f.a.onMenuShareAppMessage(n({desc:t.desc,type:"link",dataUrl:""}))})}},{key:"ready",value:function(e){v?f.a.ready(e):g.push(e)}}]),e}();t.a=y},Yo4o:function(e,t,n){"use strict";t.a=function(){return new o.a(function(e,t){window.initMap=function(){e(AMap)};var n=document.createElement("script");n.type="text/javascript",n.src="//webapi.amap.com/maps?v=1.4.1&key=550a3bf0cb6d96c3b43d330fb7d86950&callback=initMap",n.onerror=t,document.head.appendChild(n)})};var a=n("//Fk"),o=n.n(a)},hc02:function(e,t){},usvd:function(e,t){}},["NHnr"]);
//# sourceMappingURL=app.d03f65db22e3b8687ce0.js.map