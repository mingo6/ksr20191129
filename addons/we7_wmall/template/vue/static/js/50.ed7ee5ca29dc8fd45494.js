webpackJsonp([50],{AxHG:function(t,s,a){"use strict";Object.defineProperty(s,"__esModule",{value:!0});var i={components:{PublicHeader:a("Cz8s").a},data:function(){return{agreementShow:!1,member:{},spread:{},order:"",down:"",current:"",commission:"",upgrade_explain:""}},methods:{onLoad:function(){var t=this;this.util.request({url:"spread/index"}).then(function(s){var a=s.data.message;-1e3!=a.errno?(a=a.message,t.member=a.member,t.commission=a.commission,t.order=a.order,t.spread=a.spread,t.down=a.down,t.current=a.current,t.upgrade_explain=a.upgrade_explain):t.$router.push(t.util.getUrl({path:"/pages/spread/register"}))})}},mounted:function(){this.onLoad()}},e={render:function(){var t=this,s=t.$createElement,a=t._self._c||s;return a("div",{attrs:{id:"spread-index"}},[a("public-header",{attrs:{title:"推广员"}}),t._v(" "),a("div",{staticClass:"content"},[a("div",{staticClass:"headerinfo"},[a("div",{staticClass:"userinfo"},[a("div",{staticClass:"fui-list"},[a("div",{staticClass:"fui-img"},[a("img",{attrs:{src:t.member.avatar,alt:""}})]),t._v(" "),a("div",{staticClass:"fui-info"},[a("ul",[a("li",[t._v(t._s(t.member.mobile))]),t._v(" "),a("li",{staticClass:"fui-color"},[t._v("\n\t\t\t\t\t\t\t\t"+t._s(t.member.groupname?"<"+t.member.groupname+">":"您还没有等级")+"\n\t\t\t\t\t\t\t\t"),a("span",{staticClass:"open-popup",on:{click:function(s){t.agreementShow=!0}}},[t._v("升级攻略")])]),t._v(" "),a("li",[t._v("邀请码:"+t._s(t.member.uid))])])])])]),t._v(" "),a("div",{staticClass:"userblock"},[a("div",{staticClass:"block-top"},[a("div",{staticClass:"top-title"},[t._v("\n\t\t\t\t\t\t成功提现佣金\n\t\t\t\t\t")]),t._v(" "),a("div",{staticClass:"top-num"},[t._v("\n\t\t\t\t\t\t"+t._s(t.spread.commission_getcash_success)+"\n\t\t\t\t\t")])]),t._v(" "),a("div",{staticClass:"block-bottom"},[t.member.spreadcredit2>0?a("router-link",{staticClass:"bottom-right",attrs:{to:t.util.getUrl({path:"/pages/spread/getCash/application"})}},[t._v("\n\t\t\t\t\t\t佣金提现\n\t\t\t\t\t")]):t._e(),t._v(" "),a("div",{staticClass:"bottom-title"},[t._v("\n\t\t\t\t\t\t可提现佣金\n\t\t\t\t\t")]),t._v(" "),a("div",{staticClass:"bottom-num"},[t._v("\n\t\t\t\t\t\t"+t._s(t.member.spreadcredit2)+"\n\t\t\t\t\t")])],1)])]),t._v(" "),a("div",{staticClass:"content-sudoku"},[a("div",{staticClass:"wui-grids"},[a("router-link",{staticClass:"wui-grid",attrs:{to:t.util.getUrl({path:"/pages/spread/commission"})}},[a("van-icon",{staticClass:"sudoku-img",attrs:{name:"refund"}}),t._v(" "),a("div",{staticClass:"sudoku-info"},[t._v("\n\t\t\t\t \t\t推广佣金\n\t\t\t\t \t")]),t._v(" "),a("div",{staticClass:"sudoku-num"},[a("span",[t._v(t._s(t.spread.commission_grandtotal))]),t._v("元\n\t\t\t\t \t")])],1),t._v(" "),a("router-link",{staticClass:"wui-grid",attrs:{to:t.util.getUrl({path:"/pages/spread/current"})}},[a("van-icon",{staticClass:"sudoku-img",attrs:{name:"list"}}),t._v(" "),a("div",{staticClass:"sudoku-info"},[t._v("\n\t\t\t\t \t\t佣金明细\n\t\t\t\t \t")]),t._v(" "),a("div",{staticClass:"sudoku-num"},[a("span",[t._v(t._s(t.current))]),t._v("笔\n\t\t\t\t \t")])],1),t._v(" "),a("router-link",{staticClass:"wui-grid",attrs:{to:t.util.getUrl({path:"/pages/spread/getCash/index"})}},[a("van-icon",{staticClass:"sudoku-img",attrs:{name:"sort"}}),t._v(" "),a("div",{staticClass:"sudoku-info"},[t._v("\n\t\t\t\t \t\t提现明细\n\t\t\t\t \t")]),t._v(" "),a("div",{staticClass:"sudoku-num"},[a("span",[t._v(t._s(t.commission))]),t._v("笔\n\t\t\t\t \t")])],1),t._v(" "),a("router-link",{staticClass:"wui-grid",attrs:{to:t.util.getUrl({path:"/pages/spread/order"})}},[a("van-icon",{staticClass:"sudoku-img",attrs:{name:"order"}}),t._v(" "),a("div",{staticClass:"sudoku-info"},[t._v("\n\t\t\t\t \t\t推广订单\n\t\t\t\t \t")]),t._v(" "),a("div",{staticClass:"sudoku-num"},[a("span",[t._v(t._s(t.order))]),t._v("笔\n\t\t\t\t \t")])],1),t._v(" "),a("router-link",{staticClass:"wui-grid",attrs:{to:t.util.getUrl({path:"/pages/spread/down"})}},[a("van-icon",{staticClass:"sudoku-img",attrs:{name:"friend"}}),t._v(" "),a("div",{staticClass:"sudoku-info"},[t._v("\n\t\t\t\t \t\t我的团队\n\t\t\t\t \t")]),t._v(" "),a("div",{staticClass:"sudoku-num"},[a("span",[t._v(t._s(t.down))]),t._v("人\n\t\t\t\t \t")])],1),t._v(" "),a("router-link",{staticClass:"wui-grid",attrs:{to:t.util.getUrl({path:"/pages/spread/poster"})}},[a("van-icon",{staticClass:"sudoku-img",attrs:{name:"fukuanma"}}),t._v(" "),a("div",{staticClass:"sudoku-info"},[t._v("\n\t\t\t\t \t\t推广二维码\n\t\t\t\t \t")]),t._v(" "),a("div",{staticClass:"sudoku-num"})],1),t._v(" "),a("router-link",{staticClass:"wui-grid",attrs:{to:t.util.getUrl({path:"/pages/spread/rank"})}},[a("van-icon",{staticClass:"sudoku-img",attrs:{name:"hot1"}}),t._v(" "),a("div",{staticClass:"sudoku-info"},[t._v("\n\t\t\t\t \t\t佣金排名\n\t\t\t\t \t")]),t._v(" "),a("div",{staticClass:"sudoku-num"})],1)],1)])]),t._v(" "),a("van-popup",{staticClass:"agreement-popup",attrs:{position:"bottom"},model:{value:t.agreementShow,callback:function(s){t.agreementShow=s},expression:"agreementShow"}},[a("van-nav-bar",{staticClass:"border-0px",style:{background:"#ff2d4b",color:"#fff"},attrs:{title:"规则详解"},on:{"click-left":function(s){t.agreementShow=!1}}},[a("van-icon",{staticClass:"font-20",style:{color:"#fff"},attrs:{slot:"left",name:"left"},slot:"left"})],1),t._v(" "),a("div",{staticClass:"popup-content margin-10",domProps:{innerHTML:t._s(t.upgrade_explain)}})],1)],1)},staticRenderFns:[]};var n=a("VU/8")(i,e,!1,function(t){a("a3kE")},null,null);s.default=n.exports},a3kE:function(t,s){}});
//# sourceMappingURL=50.ed7ee5ca29dc8fd45494.js.map