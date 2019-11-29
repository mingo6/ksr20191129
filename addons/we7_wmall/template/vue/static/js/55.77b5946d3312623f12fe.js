webpackJsonp([55],{LKS4:function(t,s,i){"use strict";Object.defineProperty(s,"__esModule",{value:!0});var e=i("Gu7T"),a=i.n(e),o=i("Cz8s"),l=i("NPH5"),c={data:function(){return{keyword:"",stores:[],recommendStores:[],activityHeight:!1}},components:{PublicHeader:o.a,load:l.a},methods:{onLoad:function(){var t=this,s=this.$route.query.key?this.$route.query.key:"";this.keyword&&(s=this.keyword,this.stores=[],this.recommendStores=[]);var i={key:s,forceLocation:1};this.util.request({url:"wmall/home/hunt/search",data:i}).then(function(s){var i=s.data.message;i.errno?t.$toast(i.message):(console.log(i.message),t.stores=[].concat(a()(t.stores),a()(i.message.stores)),t.recommendStores=[].concat(a()(t.recommendStores),a()(i.message.recommendStores)),console.log(t.stores))})},onSearch:function(){if(!this.keyword)return!1;this.onLoad()},onToggleActivity:function(t,s){this[t][s].activityHeight=!this[t][s].activityHeight},onToggleHeight:function(t){this.stores[t].toggleHeight=!this.stores[t].toggleHeight}},mounted:function(){this.onLoad()}},r={render:function(){var t=this,s=t.$createElement,i=t._self._c||s;return i("div",{attrs:{id:"searchResult"}},[i("public-header",{attrs:{title:"搜索结果"}}),t._v(" "),i("div",{staticClass:"content"},[i("div",{staticClass:"search-header van-hairline--bottom"},[i("div",{staticClass:"search-content"},[i("van-icon",{attrs:{name:"search"}}),t._v(" "),i("input",{directives:[{name:"model",rawName:"v-model",value:t.keyword,expression:"keyword"}],staticClass:"search-input",attrs:{type:"text",placeholder:"请输入商家或商品名称"},domProps:{value:t.keyword},on:{input:function(s){s.target.composing||(t.keyword=s.target.value)}}})],1),t._v(" "),i("div",{staticClass:"search-btn",on:{click:t.onSearch}},[t._v("搜索")])]),t._v(" "),t.stores.length>0?i("div",{staticClass:"diy-waimai-store-box"},[i("div",{staticClass:"waimai-store-item-list"},t._l(t.stores,function(s,e){return i("div",{key:e,staticClass:"waimai-store-item border-1px-tb"},[i("div",{staticClass:"mian-content-box"},[i("div",{staticClass:"content-left border-1px"},[i("router-link",{staticClass:"item-image",attrs:{to:t.util.getUrl({path:"/pages/store/goods?sid="+s.id})}},[i("img",{attrs:{src:s.logo}}),t._v(" "),s.label>0?i("div",{staticClass:"store-label"},[i("div",{staticClass:"label",style:{"background-color":s.label_color}},[t._v(t._s(s.label_cn))])]):t._e()])],1),t._v(" "),i("div",{staticClass:"content-right"},[i("router-link",{attrs:{to:t.util.getUrl({path:"/pages/store/goods?sid="+s.id})}},[i("div",{staticClass:"item-name-wrap"},[i("div",{staticClass:"item-name"},[t._v(t._s(s.title))])]),t._v(" "),i("div",{staticClass:"item-score-time"},[i("div",{staticClass:"item-score-sale"},[i("div",{staticClass:"item-star-box"},[i("van-rate",{attrs:{size:12,"disabled-color":"#FFD161",disabled:""},model:{value:s.score,callback:function(i){t.$set(s,"score",i)},expression:"item.score"}})],1),t._v(" "),i("div",{staticClass:"item-sale"},[t._v("月售 "+t._s(s.sailed))])]),t._v(" "),i("div",{staticClass:"time-distance"},[i("div",{staticClass:"avg_delivery_time"},[t._v(t._s(s.distance)+"km")]),t._v(" "),i("div",{staticClass:"line"},[t._v("|")]),t._v(" "),i("div",{staticClass:"avg_distance"},[t._v(t._s(s.delivery_time)+"分钟")])])]),t._v(" "),i("div",{staticClass:"item-min-delivery"},[i("div",{staticClass:"item-min-delivery-left"},[i("div",[t._v("起送价￥"+t._s(s.send_price))]),t._v(" "),i("div",{staticClass:"line"},[t._v("|")]),t._v(" "),i("div",[t._v("配送费￥"+t._s(s.delivery_price))])]),t._v(" "),i("div",{staticClass:"item-min-delivery-right"},[t._v(t._s(s.delivery_title))])])]),t._v(" "),i("div",{staticClass:"discount-box",class:{show:s.activityHeight}},[i("div",{staticClass:"toggle"},[s.activity.num>2?i("div",{staticClass:"icon ",class:{"icon-fold":s.activityHeight,"icon-unfold":!s.activityHeight},on:{click:function(s){t.onToggleActivity("stores",e)}}}):t._e()]),t._v(" "),t._l(s.activity.items,function(e,a){return s.activity.num>0?i("div",{key:a,staticClass:"single-line"},[i("img",{staticClass:"discount-icon",attrs:{src:"static/img/"+e.type+"_b.png"}}),t._v(" "),i("div",{staticClass:"discount-text"},[t._v(t._s(e.title))])]):t._e()})],2),t._v(" "),s.goods&&s.goods.length>0?i("div",{staticClass:"goods-list",class:{show:s.toggleHeight}},t._l(s.goods,function(e,a){return i("router-link",{key:a,staticClass:"goods-item border-1px-t",attrs:{tag:"div",to:t.util.getUrl({path:"/pages/store/goodsDetail?sid="+s.id+"&id="+e.id})}},[i("div",{staticClass:"goods-name active flex-lr"},[i("span",[t._v(t._s(e.title))]),t._v(" "),i("div",{staticClass:"goods-price"},[t._v("¥"+t._s(e.price))])]),t._v(" "),i("div",{staticClass:"goods-sold"},[t._v("月售 "+t._s(e.sailed))])])})):t._e()],1)]),t._v(" "),s.goods&&s.goods.length>1?i("div",{staticClass:"load-more border-1px-t",on:{click:function(s){t.onToggleHeight(e)}}},[s.toggleHeight?[t._v("收起")]:[t._v("展开其他"+t._s(s.goods_num)+"个商品")],t._v(" "),i("div",{staticClass:"icon",class:{"icon-fold":s.toggleHeight,"icon-unfold":!s.toggleHeight}})],2):t._e()])}))]):i("div",{staticClass:"no-result"},[t._m(0),t._v(" "),i("div",{staticClass:"text"},[t._v("抱歉,没有找到合适的商户")])]),t._v(" "),t.recommendStores.length>0?i("load",{attrs:{type:"loaded",text:"猜你喜欢",bgcolor:"#f5f5f5"}}):t._e(),t._v(" "),t.recommendStores.length>0?i("div",{staticClass:"diy-waimai-store-box"},[i("div",{staticClass:"waimai-store-item-list"},t._l(t.recommendStores,function(s,e){return i("div",{key:e,staticClass:"waimai-store-item border-1px-tb"},[i("div",{staticClass:"mian-content-box"},[i("div",{staticClass:"content-left border-1px"},[i("router-link",{staticClass:"item-image",attrs:{to:t.util.getUrl({path:"/pages/store/goods?sid="+s.id})}},[i("img",{attrs:{src:s.logo}}),t._v(" "),s.label>0?i("div",{staticClass:"store-label"},[i("div",{staticClass:"label",style:{"background-color":s.label_color}},[t._v(t._s(s.label_cn))])]):t._e()])],1),t._v(" "),i("div",{staticClass:"content-right"},[i("router-link",{attrs:{to:t.util.getUrl({path:"/pages/store/goods?sid="+s.id})}},[i("div",{staticClass:"item-name-wrap"},[i("div",{staticClass:"item-name"},[t._v(t._s(s.title))])]),t._v(" "),i("div",{staticClass:"item-score-time"},[i("div",{staticClass:"item-score-sale"},[i("div",{staticClass:"item-star-box"},[i("van-rate",{attrs:{size:12,"disabled-color":"#FFD161",disabled:""},model:{value:s.score,callback:function(i){t.$set(s,"score",i)},expression:"item.score"}})],1),t._v(" "),i("div",{staticClass:"item-sale"},[t._v("月售 "+t._s(s.sailed))])]),t._v(" "),i("div",{staticClass:"time-distance"},[i("div",{staticClass:"avg_delivery_time"},[t._v(t._s(s.distance)+"km")]),t._v(" "),i("div",{staticClass:"line"},[t._v("|")]),t._v(" "),i("div",{staticClass:"avg_distance"},[t._v(t._s(s.delivery_time)+"分钟")])])]),t._v(" "),i("div",{staticClass:"item-min-delivery"},[i("div",{staticClass:"item-min-delivery-left"},[i("div",[t._v("起送价￥"+t._s(s.send_price))]),t._v(" "),i("div",{staticClass:"line"},[t._v("|")]),t._v(" "),i("div",[t._v("配送费￥"+t._s(s.delivery_price))])]),t._v(" "),i("div",{staticClass:"item-min-delivery-right"},[t._v(t._s(s.delivery_title))])])]),t._v(" "),i("div",{staticClass:"discount-box"},t._l(s.activity.items,function(e,a){return s.activity.num>0?i("div",{key:a,staticClass:"single-line"},[i("img",{staticClass:"discount-icon",attrs:{src:"static/img/"+e.type+"_b.png"}}),t._v(" "),i("div",{staticClass:"discount-text"},[t._v(t._s(e.title))])]):t._e()}))],1)])])}))]):t._e()],1)],1)},staticRenderFns:[function(){var t=this.$createElement,s=this._self._c||t;return s("div",{staticClass:"img"},[s("div",{staticClass:"icon icon-store"})])}]};var d=i("VU/8")(c,r,!1,function(t){i("bwj6")},null,null);s.default=d.exports},bwj6:function(t,s){}});
//# sourceMappingURL=55.77b5946d3312623f12fe.js.map