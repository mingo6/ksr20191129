webpackJsonp([86],{VKU1:function(t,s){},u3db:function(t,s,e){"use strict";Object.defineProperty(s,"__esModule",{value:!0});var a=e("Gu7T"),i=e.n(a),r={components:{PublicHeader:e("Cz8s").a},data:function(){return{status:-1,refresh:0,active:0,order:{min:0,loaded:!1,loading:!1,empty:!1,data:[]},title:{1:"所有",2:"未完成",3:"已完成",4:"已取消"}}},methods:{onLoad:function(){var t=this;if(1==this.refresh&&(this.order={min:0,loaded:!1,loading:!1,empty:!1,data:[]}),this.order.loaded)return!1;this.order.loading=!0,this.util.request({url:"spread/order/index",data:{min:this.order.min,status:this.status}}).then(function(s){var e=s.data.message;t.order.data=[].concat(i()(t.order.data),i()(e.message)),t.order.data.length||(t.order.empty=!0),t.order.loading=!1,t.order.min=e.min,e.min||(t.order.loaded=!0),t.refresh=0})},onChangeStatus:function(t,s){this.active!=t&&(this.refresh=1),0==t?this.status=-1:1==t?this.status=0:2==t?this.status=5:3==t&&(this.status=6),this.onLoad()},onGetorder:function(){}},mounted:function(){this.onLoad()}},n={render:function(){var t=this,s=t.$createElement,e=t._self._c||s;return e("div",{attrs:{id:"spread-order"}},[e("public-header",{attrs:{title:"推广订单"}}),t._v(" "),e("div",{staticClass:"content"},[e("van-tabs",{attrs:{swipeable:""},on:{click:t.onChangeStatus},model:{value:t.active,callback:function(s){t.active=s},expression:"active"}},t._l(4,function(s,a){return e("van-tab",{key:a,attrs:{title:t.title[s]}},[t.order.empty?e("div",{staticClass:"current-list"},[e("div",{staticClass:"no-data"},[e("div",{staticClass:"bg"}),t._v(" "),e("p",[t._v("暂时没有推广订单哦～")])])]):e("van-list",{attrs:{finished:t.order.loaded,offset:100,"immediate-check":!1},on:{load:t.onLoad},model:{value:t.order.loading,callback:function(s){t.$set(t.order,"loading",s)},expression:"order.loading"}},[e("div",{staticClass:"current-list"},[e("div",{staticClass:"list-block"},[e("ul",{staticClass:"list"},t._l(t.order.data,function(s,a){return e("li",{key:a,staticClass:"item-content"},[e("router-link",{attrs:{to:""}},[e("div",{staticClass:"item-inner"},[e("div",{staticClass:"item-title"},[e("div",{staticClass:"item-title-top"},[t._v(t._s(s.ordersn)),s.spread1==s.spreadid?e("span",[t._v("（一级）")]):t._e(),t._v(" "),s.spread2==s.spreadid?e("span",[t._v("（二级）")]):t._e()]),t._v(" "),e("div",{staticClass:"item-title-bottom"},[t._v(t._s(s.paytime))])]),t._v(" "),e("div",{staticClass:"item-after"},[e("div",{staticClass:"item-title-top"},[t._v("+"+t._s(s.commission))]),t._v(" "),5==s.status?e("div",{staticClass:"item-title-bottom"},[t._v("已完成")]):t._e(),t._v(" "),s.status<5?e("div",{staticClass:"item-title-bottom"},[t._v("未完成")]):t._e(),t._v(" "),6==s.status?e("div",{staticClass:"item-title-bottom"},[t._v("已取消")]):t._e()])])]),t._v(" "),1==s.spreadbalance?e("span",{staticClass:"success"},[t._v("已结算")]):e("span",{staticClass:"danger"},[t._v("未结算")]),t._v(" "),e("van-icon",{attrs:{name:"right"}})],1)}))])])])],1)}))],1)],1)},staticRenderFns:[]};var d=e("VU/8")(r,n,!1,function(t){e("VKU1")},null,null);s.default=d.exports}});
//# sourceMappingURL=86.8b124cb307c993ad74f5.js.map