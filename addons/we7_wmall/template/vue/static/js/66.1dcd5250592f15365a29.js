webpackJsonp([66],{h6xC:function(t,s){},kTxc:function(t,s,e){"use strict";Object.defineProperty(s,"__esModule",{value:!0});var a=e("Gu7T"),i=e.n(a),o=e("Cz8s"),d=e("NPH5"),n={data:function(){return{category_id:Number,goods:{page:1,psize:4,title:"",loading:!1,finished:!1,empty:!1,data:[]},key:""}},components:{PublicHeader:o.a,Load:d.a},methods:{onLoad:function(t){var s=this;if(t&&(this.goods={page:1,psize:4,title:this.key,loading:!0,finished:!1,empty:!1,data:[]}),this.goods.finished)return!1;this.util.request({url:"creditshop/index/goods",data:{page:this.goods.page,psize:this.goods.psize,category_id:this.category_id,title:this.goods.title}}).then(function(t){var e=t.data.message;if(e.errno)return s.util.$toast(e.message),!1;e=e.message.goods,s.goods.data=[].concat(i()(s.goods.data),i()(e)),e.length<s.goods.psize&&(s.goods.finished=!0,s.goods.data.length||(s.goods.empty=!0)),s.goods.loading=!1,s.goods.page++})},onSearch:function(){this.key&&this.onLoad(!0)}},created:function(){if(!this.$route.query.category_id)return this.util.$toast("参数错误"),!1;this.category_id=this.$route.query.category_id},mounted:function(){this.onLoad()}},r={render:function(){var t=this,s=t.$createElement,e=t._self._c||s;return e("div",{attrs:{id:"creditshop-goods"}},[e("public-header",{attrs:{title:"兑换商品"}}),t._v(" "),e("div",{staticClass:"content"},[e("van-search",{attrs:{"show-action":"",background:"#f5f5f5",placeholder:"请输入关键字"},model:{value:t.key,callback:function(s){t.key=s},expression:"key"}},[e("div",{attrs:{slot:"action"},on:{click:t.onSearch},slot:"action"},[t._v("搜索")])]),t._v(" "),e("div",{staticClass:"goods-group"},[t.goods.empty?e("load",{attrs:{type:"loaded",text:"暂无符合条件的商品"}}):e("van-list",{attrs:{finished:t.goods.finished,offset:100,"immediate-check":!1},on:{load:t.onLoad},model:{value:t.goods.loading,callback:function(s){t.$set(t.goods,"loading",s)},expression:"goods.loading"}},[t._l(t.goods.data,function(s,a){return e("router-link",{key:a,attrs:{to:t.util.getUrl({path:"/pages/creditshop/goodsDetail",query:{id:s.id}})}},[e("div",{staticClass:"goods-item"},[e("div",[e("div",{staticClass:"image"},[e("img",{attrs:{src:s.thumb,alt:""}})]),t._v(" "),e("div",{staticClass:"detail"},[e("div",{staticClass:"name"},["goods"==s.type?e("span",{staticClass:"subtext bg-danger"},[t._v("商品")]):"credit2"==s.type?e("span",{staticClass:"subtext bg-danger"},[t._v("余额")]):"redpacket"==s.type?e("span",{staticClass:"subtext bg-danger"},[t._v("红包")]):t._e(),t._v("\n\t\t\t\t\t\t\t\t\t"+t._s(s.title)+"\n\t\t\t\t\t\t\t\t")]),t._v(" "),e("div",{staticClass:"price"},[e("div",{staticClass:"price-item"},[e("span",{staticClass:"num"},[t._v(t._s(s.use_credit1))]),t._v(" "),e("span",{staticClass:"text"},[t._v("积分")]),t._v(" "),s.use_credit2>0?[t._v("\n\t\t\t\t\t\t\t\t\t\t\t+\n\t\t\t\t\t\t\t\t\t\t\t"),e("span",{staticClass:"num"},[t._v("¥"+t._s(s.use_credit2))])]:t._e()],2),t._v(" "),e("div",{staticClass:"exchange"},[t._v("兑换")])])])])])])}),t._v(" "),e("div",{staticStyle:{clear:"both"}}),t._v(" "),t.goods.finished?e("load",{attrs:{type:"loaded",text:"我是有底线的"}}):t._e()],2)],1)],1)],1)},staticRenderFns:[]};var c=e("VU/8")(n,r,!1,function(t){e("h6xC")},null,null);s.default=c.exports}});
//# sourceMappingURL=66.1dcd5250592f15365a29.js.map