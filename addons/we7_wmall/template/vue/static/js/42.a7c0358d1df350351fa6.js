webpackJsonp([42],{BidV:function(t,s,e){"use strict";Object.defineProperty(s,"__esModule",{value:!0});var i=e("Gu7T"),a=e.n(i),d={data:function(){return{id:Number,good:{},goods:{},member:{},records:{page:2,psize:15,empty:!1,loaded:!1,data:[]},active:0}},components:{PublicHeader:e("Cz8s").a},methods:{onLoad:function(){var t=this;this.util.request({url:"creditshop/index/detail",data:{id:this.id}}).then(function(s){var e=s.data.message;if(e.errno)return t.util.$toast(e.message),!1;e=e.message,t.good=e.good,t.goods=e.goods,console.log(t.goods),t.member=e.member,t.records.data=[].concat(a()(t.records.data),a()(e.records)),t.records.data.length||(t.records.empty=!0)})},onGetRecords:function(){var t=this;if(this.records.loaded)return!1;this.util.request({url:"creditshop/index/detail",data:{id:this.id,page:this.records.page,psize:this.records.psize}}).then(function(s){var e=s.data.message;if(e.errno)return t.util.$toast(e.message),!1;e=e.message,t.records.data=[].concat(a()(t.records.data),a()(e.records)),e.records.length<t.records.psize&&(t.records.loaded=!0),t.records.data.length||(t.records.empty=!0),t.records.page++})}},watch:{$route:function(t,s){this.good={},this.goods={},this.member={},this.records={page:2,psize:15,empty:!1,loaded:!1,data:[]},this.active=0,this.$route.query.id&&(this.id=this.$route.query.id),this.onLoad()}},created:function(){if(!this.$route.query.id)return this.util.$toast("参数错误"),!1;this.id=this.$route.query.id},mounted:function(){this.onLoad()}},o={render:function(){var t=this,s=t.$createElement,e=t._self._c||s;return e("div",{attrs:{id:"creditshop-goodsdetail"}},[e("public-header",{attrs:{title:"商品详情"}}),t._v(" "),e("div",{staticClass:"content"},[e("div",{staticClass:"main-scroll"},[e("van-swipe",{attrs:{autoplay:3e3}},[e("van-swipe-item",[e("img",{attrs:{src:t.good.thumb,alt:""}})])],1),t._v(" "),e("div",{staticClass:"cell-group"},[e("div",{staticClass:"cell"},[e("div",{staticClass:"cell-text goods-title"},["goods"==t.good.type?e("label",[t._v("商品")]):"credit2"==t.good.type?e("label",[t._v("余额")]):"redpacket"==t.good.type?e("label",[t._v("红包")]):t._e(),t._v(" "),e("span",[t._v(t._s(t.good.title))])])]),t._v(" "),e("div",{staticClass:"cell cell-credit"},[e("div",{staticClass:"cell-text"},[e("span",[t._v("单人仅限兑换: "+t._s(t.good.chance)+" 次,该商品目前已累计兑换: "+t._s(t.good.records_num)+" 次")])])]),t._v(" "),e("div",{staticClass:"cell"},[e("div",{staticClass:"cell-text"},[e("div",{staticClass:"price"},[e("span",{staticClass:"big"},[t._v(t._s(t.good.use_credit1))]),t._v(" 积分\n\t\t\t\t\t\t\t"),t.good.use_credit2>0?[t._v("\n\t\t\t\t\t\t\t\t+ "),e("span",{staticClass:"big"},[t._v(t._s(t.good.use_credit2))]),t._v(" 元\n\t\t\t\t\t\t\t")]:t._e(),t._v(" "),e("span",{staticClass:"old-price"},[t._v("原价: "+t._s(t.good.old_price)+"元")])],2)])])]),t._v(" "),e("div",{staticClass:"wui-tab"},[e("van-tabs",{attrs:{swipeable:""},model:{value:t.active,callback:function(s){t.active=s},expression:"active"}},[e("van-tab",{attrs:{title:"商品详情"}},[t.good.description?e("div",{staticClass:"tab-basic",domProps:{innerHTML:t._s(t.good.description)}}):e("div",{staticClass:"nodata"},[t._v("暂无商品详情")])]),t._v(" "),e("van-tab",{attrs:{title:"参与记录"}},[t.records.empty?e("div",{staticClass:"nodata"},[t._v("暂无参与记录")]):[t._l(t.records.data,function(s,i){return e("div",{key:i,staticClass:"list"},[e("div",{staticClass:"list-media"},[e("img",{attrs:{src:s.avatar,alt:""}})]),t._v(" "),e("div",{staticClass:"list-inner"},[e("div",{staticClass:"title"},[t._v(t._s(s.nickname))])]),t._v(" "),e("div",{staticClass:"list-media text"},[t._v(" "+t._s(s.addtime)+" ")])])}),t._v(" "),t.records.loaded?e("div",{staticClass:"more"},[e("span",{staticClass:"c-disabled"},[t._v("没有更多了")])]):e("div",{staticClass:"more"},[e("span",{on:{click:t.onGetRecords}},[t._v("查看更多")])])]],2)],1)],1),t._v(" "),e("div",{staticClass:"list-group"},[e("div",{staticClass:"list"},[e("div",{staticClass:"group-list-inner"},[e("div",{staticClass:"title border-1px-b"},[t._v("为您推荐")]),t._v(" "),e("div",{staticClass:"text"},t._l(t.goods,function(s,i){return e("router-link",{key:i,staticClass:"item",attrs:{to:t.util.getUrl({path:"/pages/creditshop/goodsDetail",query:{id:s.id}})}},[e("img",{attrs:{src:s.thumb,alt:""}}),t._v(" "),e("div",{staticClass:"title"},[t._v(t._s(s.title))]),t._v(" "),e("div",{staticClass:"price"},[t._v("\n\t\t\t\t\t\t\t\t\t"+t._s(s.use_credit1)+"积分\n\t\t\t\t\t\t\t\t\t"),s.use_credit2>0?[t._v("\n\t\t\t\t\t\t\t\t\t\t+ "+t._s(s.use_credit2)+"元\n\t\t\t\t\t\t\t\t\t")]:t._e()],2)])}))])])])],1),t._v(" "),1==t.good.status?[1==t.good.can?[t.member.credit1<t.good.use_credit1?e("div",{staticClass:"bottom-fixed disabled"},[t._v("积分不足")]):e("router-link",{staticClass:"bottom-fixed",attrs:{to:t.util.getUrl({path:"/pages/creditshop/create",query:{goods_id:t.good.id}})}},[t._v("立即兑换")])]:e("div",{staticClass:"bottom-fixed disabled"},[t._v("兑换已达最大次数")])]:e("div",{staticClass:"bottom-fixed disabled"},[t._v("商品已下架，无法兑换")])],2),t._v(" "),0==t.good.status?e("div",{staticClass:"tips flex"},[e("div",{staticClass:"icon icon-commentfill"}),t._v(" "),e("div",[t._v("商品已下架，无法兑换")])]):t._e()],1)},staticRenderFns:[]};var r=e("VU/8")(d,o,!1,function(t){e("sKQY")},null,null);s.default=r.exports},sKQY:function(t,s){}});
//# sourceMappingURL=42.a7c0358d1df350351fa6.js.map