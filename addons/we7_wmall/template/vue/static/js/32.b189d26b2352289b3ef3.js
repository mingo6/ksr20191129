webpackJsonp([32],{"+kDF":function(t,o,s){"use strict";Object.defineProperty(o,"__esModule",{value:!0});var e=s("Gu7T"),i=s.n(e),a=s("Cz8s"),l=s("mzkE"),n=s("+TmT"),r={components:{PublicHeader:a.a,PublicFooter:l.a,Uploader:n.a},data:function(){return{id:Number,delivery_service:0,goods_quality:0,note:"",goods:[],thumbs:[],newGoods:[]}},methods:{onLoad:function(){var t=this;this.$route.query.id?this.id=this.$route.query.id:this.$toast("订单不存在或已删除！"),this.util.request({url:"wmall/order/comment/index",data:{id:this.id}}).then(function(o){var s=o.data.message;s.errno?t.$toast(s.message):(console.log(s),s.message.goods&&(t.goods=[].concat(i()(t.goods),i()(s.message.goods))),console.log(t.goods),t.goods.forEach(function(o,s){var e={id:o.id,goods_id:o.goods_id,activity:o.activity};t.newGoods.push(e)}))})},favorOppose:function(t,o){t=t;"favor"==(o=o)?(this.goods[t].activity=1,this.newGoods[t].activity=1):(this.goods[t].activity=2,this.newGoods[t].activity=2)},onGetImgsUrl:function(t){this.thumbs=t},onSubmit:function(){var t=this;if(!this.delivery_service)return this.$toast("请您评价配送服务"),!1;if(!this.goods_quality)return this.$toast("请您评价商品质量"),!1;var o={id:this.id,note:this.note,goods_quality:this.goods_quality,deliverScore:this.delivery_service,thumbs:this.thumbs,goods:this.newGoods};this.util.request({url:"wmall/order/comment/post",method:"post",data:o}).then(function(o){var s=o.data.message;if(s.errno)return t.util.$toast(s.message),!1;t.util.$toast(s.message,t.util.getUrl({path:"/pages/order/detail",query:{id:t.id}}))})}},mounted:function(){this.onLoad()}},c={render:function(){var t=this,o=t.$createElement,s=t._self._c||o;return s("div",{attrs:{id:"order-comment"}},[s("public-header",{attrs:{title:"添加评论",bgcolor:"#ff2d4b",textcolor:"#fff"}}),t._v(" "),s("div",{staticClass:"content"},[s("div",{staticClass:"content-block-title"},[t._v("配送评价")]),t._v(" "),s("van-cell-group",[s("van-cell",[s("div",{staticClass:"flex",attrs:{slot:"title"},slot:"title"},[s("span",{staticClass:"van-cell-text"},[t._v("配送服务")]),t._v(" "),s("van-rate",{staticClass:"flex",attrs:{size:20,count:5,color:"#ff2d4b","void-color":"#FF6C81"},model:{value:t.delivery_service,callback:function(o){t.delivery_service=o},expression:"delivery_service"}})],1)])],1),t._v(" "),s("div",{staticClass:"content-block-title"},[t._v("商品评价")]),t._v(" "),s("van-cell-group",[s("van-cell",[s("div",{staticClass:"flex",attrs:{slot:"title"},slot:"title"},[s("span",{staticClass:"van-cell-text"},[t._v("商品质量")]),t._v(" "),s("van-rate",{staticClass:"flex",attrs:{size:20,count:5,color:"#ff2d4b","void-color":"#FF6C81"},model:{value:t.goods_quality,callback:function(o){t.goods_quality=o},expression:"goods_quality"}})],1)]),t._v(" "),t._l(t.goods,function(o,e){return s("van-cell",{key:e,attrs:{title:o.goods_title}},[s("div",{staticClass:"favor-oppose",attrs:{slot:"right-icon"},slot:"right-icon"},[s("label",{on:{click:function(o){t.favorOppose(e,"favor")}}},[s("input",{staticClass:"radio",attrs:{type:"radio",value:"1"},domProps:{checked:1==o.activity}}),t._v(" "),s("span",{staticClass:"favor"})]),t._v(" "),s("label",{on:{click:function(o){t.favorOppose(e,"oppose")}}},[s("input",{staticClass:"radio",attrs:{type:"radio",value:"2"},domProps:{checked:2==o.activity}}),t._v(" "),s("span",{staticClass:"oppose"})])])])})],2),t._v(" "),s("div",{staticClass:"content-block-title"},[t._v("写点什么")]),t._v(" "),s("van-cell-group",[s("van-field",{attrs:{type:"textarea",placeholder:"至少输入10个字，您的建议很重要，来点评一下吧"},model:{value:t.note,callback:function(o){t.note=o},expression:"note"}})],1),t._v(" "),s("div",{staticClass:"content-block-title"},[t._v("有图有真相")]),t._v(" "),s("uploader",{on:{onGetUrl:t.onGetImgsUrl}}),t._v(" "),s("div",{staticClass:"save-btn"},[s("van-button",{attrs:{size:"large"},on:{click:function(o){t.onSubmit()}}},[t._v("提交评论")])],1)],1),t._v(" "),s("public-footer")],1)},staticRenderFns:[]};var d=s("VU/8")(r,c,!1,function(t){s("/79m")},null,null);o.default=d.exports},"/79m":function(t,o){}});
//# sourceMappingURL=32.b189d26b2352289b3ef3.js.map