webpackJsonp([65],{YO0E:function(t,e){},tnc0:function(t,e,s){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var a={components:{PublicHeader:s("Cz8s").a},data:function(){return{redPacket:{},record:{},mall_title:""}},methods:{onLoad:function(){var t=this;this.util.request({url:"shareRedpacket/share/success",data:{uid:this.uid}}).then(function(e){var s=e.data.message;if(s.errno)return t.$toast(s.message),!1;s=s.message,t.record=s.record,t.redPacket=s.redPacket,t.mall_title=s.mall_title})}},created:function(){this.query=this.$route.query,this.query&&(this.uid=this.query.uid)},mounted:function(){this.onLoad()}},i={render:function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{attrs:{id:"shareRedpacket-success"}},[s("public-header",{attrs:{title:"分享有礼"}}),t._v(" "),s("div",{staticClass:"content"},[t._m(0),t._v(" "),s("div",{staticClass:"getsuccess"},[s("p",[t._v("恭喜你，成功领取了新用户红包")]),t._v(" "),s("p",[t._v("快去"),s("router-link",{attrs:{to:t.util.getUrl({path:"/pages/home/index"})}},[t._v(t._s(t.mall_title))]),t._v("订餐吧")],1)]),t._v(" "),s("div",{staticClass:"newuser-share"},[s("div",{staticClass:"share-title"},[t._v("新用户专享红包")]),t._v(" "),s("p",{staticClass:"use-limit"},[t._v("仅限首单使用")]),t._v(" "),s("p",{staticClass:"limit-time"},[t._v("有效期"+t._s(t.record.follow_redpacket_days_limit)+"天")]),t._v(" "),s("div",{staticClass:"packet-money"},[t._v("\n\t\t\t\t¥"),s("span",[t._v(t._s(t.record.follow_redpacket_discount))])])]),t._v(" "),s("div",{staticClass:"use-now"},[s("router-link",{attrs:{to:t.util.getUrl({path:"/pages/home/index"})}},[t._v("立即使用")])],1),t._v(" "),s("div",{staticClass:"invite"},[s("router-link",{attrs:{to:t.util.getUrl({path:"/pages/shareRedpacket/index"})}},[t._v("邀请好友最高得"+t._s(t.redPacket.share_redpacket_max)+"元")])],1),t._v(" "),s("div",{staticClass:"activity-rule"},[s("div",{staticClass:"rule-title"},[t._v("活动规则")]),t._v("\n\t\t\t"+t._s(t.redPacket.agreement)+"\n\t\t")])])],1)},staticRenderFns:[function(){var t=this.$createElement,e=this._self._c||t;return e("div",{staticClass:"platform-ad"},[e("img",{attrs:{src:"static/img/shareRedpacket-top.png",alt:""}})])}]};var r=s("VU/8")(a,i,!1,function(t){s("YO0E")},null,null);e.default=r.exports}});
//# sourceMappingURL=65.ea105bf25b7ebbc3df52.js.map