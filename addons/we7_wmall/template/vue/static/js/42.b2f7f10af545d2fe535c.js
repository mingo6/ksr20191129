webpackJsonp([42],{IeHp:function(t,e,s){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var a=s("Gu7T"),i=s.n(a),r=s("Cz8s"),l=s("mzkE"),o={components:{PublicHeader:r.a,PublicFooter:l.a},data:function(){return{showPreLoading:!0,active_tab:2,goods:[],store:{},order:{},activityed:[],deliveryer:{},logs:{},log:{},maxid:"",slides:[],refundmaxid:"",share:{info:{}},refund:{},refund_logs:{},menufooter:{},sendRedpacket:!1,zhezhaoShow:!1}},methods:{onChangeStatus:function(t,e,s){if("cancel"==e)var a={url:"wmall/order/index/cancel?id="+t,confirm:"确定取消订单吗?"};else if("end_1"==e||"end_2"==e){a={url:"wmall/order/index/end?id="+t,confirm:"你确定收到该商家的外卖?",successUrl:"/pages/order/comment?id="+t};"end_2"==e&&(a.confirm="你确定收到该商家的外卖?")}else if("remind"==e)a={url:"wmall/order/index/remind?id="+t};this.util.jspost(a)},onLoad:function(){var t=this;this.$route.query.id?this.id=this.$route.query.id:this.$toast("订单不存在或已删除！"),this.util.request({url:"wmall/order/index/new_detail",data:{id:this.id,menufooter:1}}).then(function(e){t.showPreLoading=!1;var s=e.data.message;s.errno?t.$toast(s.message):(t.goods=[].concat(i()(t.goods),i()(s.message.goods)),t.store=s.message.store,t.order=s.message.order,t.activityed=[].concat(i()(t.activityed),i()(s.message.activityed)),t.deliveryer=s.message.deliveryer,t.logs=s.message.order_log.logs,t.log=s.message.order_log.log,t.maxid=s.message.order_log.maxid,t.slides=0==s.message.slides?s.message.slides:[].concat(i()(t.slides),i()(s.message.slides)),t.share=s.message.share,t.refund=s.message.refund_data.refund,t.refund_logs=s.message.refund_data.refund_logs,t.refundmaxid=s.message.refund_data.refundmaxid,t.menufooter=window.menufooter)})},onChangeZhezhao:function(t){t&&(this.sendRedpacket=!1),this.zhezhaoShow=!this.zhezhaoShow}},mounted:function(){this.onLoad()}},n={render:function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{attrs:{id:"orderDetail"}},[s("public-footer",{attrs:{preLoading:t.showPreLoading,menufooter:t.menufooter}}),t._v(" "),s("div",{staticClass:"content"},[s("van-tabs",{attrs:{swipeable:""},model:{value:t.active_tab,callback:function(e){t.active_tab=e},expression:"active_tab"}},[s("van-tab",{staticClass:"order-detail",attrs:{title:"订单详情"}},[s("div",{staticClass:"order-state border-1px-tb"},[s("div",{staticClass:"order-state-con"},[s("div",{staticClass:"guide"},[s("img",{attrs:{src:"static/img/order_status_service.png",alt:""}})]),t._v(" "),s("div",{staticClass:"order-state-detail"},[s("div",{staticClass:"flex-lr"},[t._v("订单"+t._s(t.order.status_cn)),s("span",{staticClass:"pull-right date"},[t._v(t._s(t.order.addtime_cn))])]),t._v(" "),t.log&&7!=t.order.delivery_status?s("div",{staticClass:"tips clearfix"},[t._v(t._s(t.log.note))]):t._e()])]),t._v(" "),s("div",{staticClass:"order-btn"},[0==t.order.is_pay&&t.order.status<5?s("router-link",{staticClass:"table-cell van-hairline--top van-hairline--right",attrs:{to:t.util.getUrl({path:"/pages/public/pay",query:{order_id:t.order.id,order_type:"takeout"}})}},[t._v("立即支付")]):t._e(),t._v(" "),1==t.order.status?[s("div",{staticClass:"table-cell van-hairline--top",on:{click:function(e){t.onChangeStatus(t.order.id,"cancel")}}},[t._v("取消订单")]),t._v(" "),1==t.order.is_pay?s("div",{staticClass:"table-cell van-hairline--left van-hairline--top",on:{click:function(e){t.onChangeStatus(t.order.id,"remind")}}},[t._v("催单")]):t._e()]:t.order.status>1&&t.order.status<5?[1==t.order.order_type&&4==t.order.status?s("div",{staticClass:"table-cell  van-hairline--top",on:{click:function(e){t.onChangeStatus(t.order.id,"end_1")}}},[t._v("确认送达")]):2==t.order.order_type?s("div",{staticClass:"table-cell van-hairline--top",attrs:{to:""},on:{click:function(e){t.onChangeStatus(t.order.id,"end_2")}}},[t._v("我已提货")]):t._e(),t._v(" "),1==t.order.is_pay?s("div",{staticClass:"table-cell van-hairline--left van-hairline--top",attrs:{to:""},on:{click:function(e){t.onChangeStatus(t.order.id,"remind")}}},[t._v("催单")]):t._e(),t._v(" "),t.order.deliveryer_id>0&&"app"==t.order.delivery_handle_type&&(4==t.order.delivery_status||7==t.order.delivery_status||8==t.order.delivery_status)?[s("div",{staticClass:"table-cell van-hairline--top"},[t._v("配送员位置")])]:t._e()]:5==t.order.status?[s("router-link",{staticClass:"table-cell  van-hairline--top",attrs:{to:t.util.getUrl({path:"/pages/store/goods",query:{sid:t.order.sid,order_id:t.order.id}})}},[t._v("再来一单")]),t._v(" "),0==t.order.is_comment?s("router-link",{staticClass:"table-cell  van-hairline--top van-hairline--left",attrs:{to:t.util.getUrl({path:"/pages/order/comment",query:{id:t.order.id}})}},[t._v(t._s(t.order.comment_cn))]):t._e(),t._v(" "),t._e()]:6==t.order.status?[s("router-link",{staticClass:"table-cell  van-hairline--top",attrs:{to:t.util.getUrl({path:"/pages/store/goods",query:{sid:t.order.sid,order_id:t.order.id}})}},[t._v("再来一单")])]:t._e(),t._v(" "),1==t.order.is_refund?s("router-link",{staticClass:"table-cell  van-hairline--top van-hairline--left",attrs:{to:t.util.getUrl({path:"/pages/order/detail",query:{id:t.order.id}})}},[t._v("查看退款")]):t._e()],2)]),t._v(" "),t.slides?s("div",{staticClass:"swiper-container"},[s("van-swipe",{attrs:{autoplay:3e3}},t._l(t.slides,function(e,a){return s("van-swipe-item",{key:a},[s("router-link",{attrs:{tag:"div",to:t.util.getUrl({path:"item.link"})}},[s("img",{attrs:{src:e.thumb}})])],1)}))],1):t._e(),t._v(" "),s("div",{staticClass:"content-block-title"},[t._v("订单明细")]),t._v(" "),s("div",{staticClass:"order-details"},[s("div",{staticClass:"order-details-con border-1px-t "},[s("div",{staticClass:"store-info"},[s("router-link",{staticClass:"external",attrs:{tag:"div",to:t.util.getUrl({path:"/pages/store/goods",query:{sid:this.store.id}})}},[s("img",{attrs:{src:t.store.logo,alt:""}}),t._v(" "),s("span",{staticClass:"store-title"},[t._v(t._s(t.store.title))]),t._v(" "),s("span",{staticClass:"icon icon-arrow-right pull-right"})])],1),t._v(" "),s("div",{staticClass:"inner-con border-1px-t"},t._l(t.goods,function(e,a){return s("van-row",{key:a,staticClass:"no-gutter"},[s("van-col",{attrs:{span:"12"}},[t._v(t._s(e.goods_title))]),t._v(" "),s("van-col",{staticClass:"color-muted text-right ",attrs:{span:"4"}},[t._v("x"+t._s(e.goods_num))]),t._v(" "),s("van-col",{staticClass:"text-right",attrs:{span:"8"}},[t._v("¥"+t._s(e.goods_price))])],1)})),t._v(" "),s("div",{staticClass:"inner-con border-1px-t"},[s("van-row",{staticClass:"no-gutter"},[s("van-col",{attrs:{span:"20"}},[t._v("餐盒费")]),t._v(" "),s("van-col",{staticClass:"text-right",attrs:{span:"4"}},[t._v("¥"+t._s(t.order.box_price))])],1),t._v(" "),s("van-row",{staticClass:"no-gutter"},[s("van-col",{attrs:{span:"20"}},[t._v("包装费")]),t._v(" "),s("van-col",{staticClass:"text-right",attrs:{span:"4"}},[t._v("¥"+t._s(t.order.pack_fee))])],1),t._v(" "),s("van-row",{staticClass:"no-gutter"},[s("van-col",{attrs:{span:"20"}},[t._v("配送费")]),t._v(" "),s("van-col",{staticClass:"text-right",attrs:{span:"4"}},[t._v("¥"+t._s(t.order.delivery_fee))])],1),t._v(" "),3==t.order.order_type?s("van-row",{staticClass:"no-gutter"},[s("van-col",{attrs:{span:"20"}},[t._v("服务费")]),t._v(" "),s("van-col",{staticClass:"text-right",attrs:{span:"4"}},[t._v("¥"+t._s(t.order.serve_fee))])],1):t._e(),t._v(" "),t.order.data?t._l(t.order.data.extra_fee,function(e,a){return t.order.data.extra_fee.length>0?s("van-row",{key:a,staticClass:"no-gutter"},[s("van-col",{attrs:{span:"16"}},[t._v(t._s(e.name))]),t._v(" "),s("van-col",{staticClass:" text-right ",attrs:{span:"8"}},[t._v("¥"+t._s(e.fee))])],1):t._e()}):t._e()],2),t._v(" "),t.activityed.length>0?s("div",{staticClass:"inner-con border-1px-t"},t._l(t.activityed,function(e,a){return s("van-row",{key:a,staticClass:"no-gutter"},[s("van-col",{staticClass:"icon-before",attrs:{span:"12"}},[s("img",{attrs:{src:"static/img/"+e.type+"_b.png",alt:""}}),t._v("\n\t\t\t\t\t\t\t\t\t\t"+t._s(e.name)+"\n\t\t\t\t\t\t\t\t\t")]),t._v(" "),s("van-col",{staticClass:"text-right discount-note",attrs:{span:"12"}},[t._v(t._s(e.note))])],1)})):t._e(),t._v(" "),s("div",{staticClass:"inner-con"},[s("van-row",{staticClass:"no-gutter"},[s("van-col",{attrs:{span:"14"}},[s("span",{staticClass:"color-muted"},[t._v("订单")]),t._v(" ¥"+t._s(t.order.total_fee)+" "),s("span",{staticClass:"color-muted"},[t._v(" - 优惠")]),t._v(" ¥"+t._s(t.order.discount_fee)+"\n\t\t\t\t\t\t\t\t\t")]),t._v(" "),s("van-col",{staticClass:"text-right color-muted",attrs:{span:"5"}},[t._v("总计")]),t._v(" "),s("van-col",{staticClass:"text-right",attrs:{span:"5"}},[t._v("¥"+t._s(t.order.final_fee))])],1)],1),t._v(" "),t.order.order_type<3?s("div",{staticClass:"order-btn"},[s("router-link",{staticClass:"table-cell border-1px-t color-danger",attrs:{to:t.util.getUrl({path:"/pages/store/goods",query:{sid:t.order.sid,order_id:t.order.id}})}},[t._v("再来一单")])],1):t._e()])]),t._v(" "),t.order.order_type<=2?[s("div",{staticClass:"content-block-title"},[t._v("配送信息")]),t._v(" "),s("div",{staticClass:"other-info"},[s("ul",{staticClass:"border-1px-tb"},[s("li",{staticClass:"item-content flex"},[s("div",{staticClass:"item-inner border-1px-b flex-lr"},[s("div",{staticClass:"item-title"},[t._v(t._s(1==t.order.order_type?"配送":"自提时间"))]),t._v(" "),s("div",{staticClass:"item-after"},[t._v(t._s(t.order.delivery_day)+"~"+t._s(t.order.delivery_time))])])]),t._v(" "),1==t.order.order_type?[s("li",{staticClass:"item-content flex"},[s("div",{staticClass:"item-inner border-1px-b flex-lr"},[s("div",{staticClass:"item-title"},[t._v("配送地址")]),t._v(" "),s("div",{staticClass:"item-after"},[t._v(t._s(t.order.address))])])])]:2==t.order.order_type?[s("li",{staticClass:"item-content flex"},[s("div",{staticClass:"item-inner border-1px-b flex-lr"},[s("div",{staticClass:"item-title"},[t._v("自提地址")]),t._v(" "),s("div",{staticClass:"item-after"},[t._v(t._s(t.store.address))])])])]:t._e()],2)])]:t._e(),t._v(" "),s("div",{staticClass:"content-block-title"},[t._v("其他信息")]),t._v(" "),s("div",{staticClass:"other-info"},[s("ul",{staticClass:"border-1px-tb"},[s("li",{staticClass:"item-content flex"},[s("div",{staticClass:"item-inner border-1px-b flex-lr"},[s("div",{staticClass:"item-title"},[t._v("订单号")]),t._v(" "),s("div",{staticClass:"item-after"},[t._v(t._s(t.order.ordersn))])])]),t._v(" "),s("li",{staticClass:"item-content flex"},[s("div",{staticClass:"item-inner border-1px-b flex-lr"},[s("div",{staticClass:"item-title"},[t._v("订单类型")]),t._v(" "),s("div",{staticClass:"item-after"},[1==t.order.order_type?[t._v("外卖")]:2==t.order.order_type?[t._v("自提")]:3==t.order.order_type?[t._v("店内")]:4==t.order.order_type?[t._v("预定")]:t._e()],2)])]),t._v(" "),t.order.order_type<=2?[s("li",{staticClass:"item-content flex"},[s("div",{staticClass:"item-inner border-1px-b flex-lr"},[s("div",{staticClass:"item-title"},[t._v("收货码")]),t._v(" "),s("div",{staticClass:"item-after"},[t._v(t._s(t.order.code))])])]),t._v(" "),s("li",{staticClass:"item-content flex"},[s("div",{staticClass:"item-inner border-1px-b flex-lr"},[s("div",{staticClass:"item-title"},[t._v("下单人")]),t._v(" "),s("div",{staticClass:"item-after"},[t._v(t._s(t.order.username)+t._s(t.order.sex))])])]),t._v(" "),s("li",{staticClass:"item-content flex"},[s("div",{staticClass:"item-inner border-1px-b flex-lr"},[s("div",{staticClass:"item-title"},[t._v("手机")]),t._v(" "),s("div",{staticClass:"item-after"},[t._v(t._s(t.order.mobile))])])])]:t._e(),t._v(" "),3==t.order.order_type?[s("li",{staticClass:"item-content flex"},[s("div",{staticClass:"item-inner border-1px-b flex-lr"},[s("div",{staticClass:"item-title"},[t._v("桌台号")]),t._v(" "),s("div",{staticClass:"item-after"},[t._v(t._s(t.order.table.title))])])])]:t._e(),t._v(" "),4==t.order.order_type?[s("li",{staticClass:"item-content flex"},[s("div",{staticClass:"item-inner border-1px-b flex-lr"},[s("div",{staticClass:"item-title"},[t._v("预定时间")]),t._v(" "),s("div",{staticClass:"item-after"},[t._v(t._s(t.order.reserve_time))])])]),t._v(" "),s("li",{staticClass:"item-content flex"},[s("div",{staticClass:"item-inner border-1px-b flex-lr"},[s("div",{staticClass:"item-title"},[t._v("预定桌台")]),t._v(" "),s("div",{staticClass:"item-after"},[t._v(t._s(t.order.table_category.title))])])]),t._v(" "),s("li",{staticClass:"item-content flex"},[s("div",{staticClass:"item-inner border-1px-b flex-lr"},[s("div",{staticClass:"item-title"},[t._v("预定类型")]),t._v(" "),s("div",{staticClass:"item-after"},[t._v(t._s(t.order.reserve_type_cn))])])])]:t._e(),t._v(" "),s("li",{staticClass:"item-content flex"},[s("div",{staticClass:"item-inner border-1px-b flex-lr"},[s("div",{staticClass:"item-title"},[t._v("支付方式")]),t._v(" "),s("div",{staticClass:"item-after"},[t._v(t._s(t.order.pay_type_cn))])])]),t._v(" "),s("li",{staticClass:"item-content flex"},[s("div",{staticClass:"item-inner border-1px-b flex-lr"},[s("div",{staticClass:"item-title"},[t._v("备注信息")]),t._v(" "),s("div",{staticClass:"item-after"},[t._v(t._s(t.order.note?t.order.note:"无"))])])]),t._v(" "),t.order.invoice?[t.order.invoice.title?s("li",{staticClass:"item-content flex"},[s("div",{staticClass:"item-inner border-1px-b flex-lr"},[s("div",{staticClass:"item-title"},[t._v("发票抬头")]),t._v(" "),s("div",{staticClass:"item-after"},[t._v(t._s(t.order.invoice.title))])])]):t._e(),t._v(" "),t.order.invoice.recognition?s("li",{staticClass:"item-content flex"},[s("div",{staticClass:"item-inner border-1px-b flex-lr"},[s("div",{staticClass:"item-title"},[t._v("纳税人识别号")]),t._v(" "),s("div",{staticClass:"item-after"},[t._v(t._s(t.order.invoice.recognition))])])]):t._e()]:t._e()],2)])],2),t._v(" "),s("van-tab",{staticClass:"order-status",attrs:{title:"订单状态"}},t._l(t.logs,function(e,a){return s("div",{key:a,staticClass:"order-status-item"},[s("div",{staticClass:"guide"},[t.maxid!=a?s("img",{attrs:{src:"static/img/order_status_service_grey.png",alt:""}}):s("img",{attrs:{src:"static/img/order_status_service.png",alt:""}})]),t._v(" "),s("div",{staticClass:"order-status-info"},[s("div",{staticClass:"arrow-left"}),t._v(" "),s("div",{staticClass:"flex-lr"},[t._v(t._s(e.title)),s("span",{staticClass:"time pull-right"},[t._v(t._s(e.addtime))])]),t._v(" "),e.note?s("div",{staticClass:"tips",domProps:{innerHTML:t._s(e.note)}}):t._e()]),t._v(" "),"wechat"==t.order.delivery_handle_type&&"delivery_assign"==e.type?s("div",{staticClass:"map-info border-1px",attrs:{id:"map-container"}}):t._e()])})),t._v(" "),t.order.refund_status>0?s("van-tab",{staticClass:"order-refund",attrs:{title:"退款详情"}},[s("div",{staticClass:"refund-detail"},[s("van-row",{staticClass:"refund-de-title border-1px-b"},[s("van-col",{attrs:{span:"13"}},[t._v("\n\t\t\t\t\t\t\t\t退款金额 "),s("span",{staticClass:"color-danger"},[t._v("¥"+t._s(t.refund.fee))])]),t._v(" "),s("van-col",{attrs:{span:"11"}},[s("span",{staticClass:"refund-status-cn float-right"},[t._v(t._s(t.refund.status_cn))])])],1),t._v(" "),s("div",{staticClass:"refund-detail-con"},[s("div",{staticClass:"no-gutter"},[t._v("订单编号:"),s("span",[t._v(t._s(t.order.ordersn))])]),t._v(" "),s("div",{staticClass:"no-gutter"},[t._v("退款周期:"),s("span",[t._v("1-15个工作日")])]),t._v(" "),s("div",{staticClass:"no-gutter"},[t._v("支付方式:"),s("span",[t._v(t._s(t.order.pay_type_cn))])]),t._v(" "),t.refund.channel_cn?s("div",{staticClass:"no-gutter"},[t._v("退款方式:"),s("span",[t._v(t._s(t.refund.channel_cn))])]):t._e(),t._v(" "),t.refund.account?s("div",{staticClass:"no-gutter"},[t._v("退款账户:"),s("span",[t._v(t._s(t.refund.account))])]):t._e()])],1),t._v(" "),s("div",{staticClass:"refund-plan"},t._l(t.refund_logs,function(e,a){return s("div",{key:a,staticClass:"order-status-item"},[s("div",{staticClass:"guide"},[t.refundmaxid!=a?s("img",{attrs:{src:"static/img/order_status_service_grey.png",alt:""}}):s("img",{attrs:{src:"static/img/order_status_service.png",alt:""}})]),t._v(" "),s("div",{staticClass:"order-status-info"},[s("div",{staticClass:"arrow-left"}),t._v(" "),s("div",{staticClass:"flex-lr"},[t._v(t._s(e.title)),s("span",{staticClass:"time pull-right"},[t._v(t._s(e.addtime_cn))])]),t._v(" "),e.note?s("div",{staticClass:"tips",domProps:{innerHTML:t._s(e.note)}},[t._v(t._s(e.note))]):t._e()])])}))]):t._e()],1)],1),t._v(" "),1==t.share.info.superRedpacket_share_status?[s("div",{staticClass:"send-redpacket",on:{click:function(e){t.sendRedpacket=!0}}},[s("img",{attrs:{src:"static/img/send-redpacket.png",alt:""}})]),t._v(" "),s("van-popup",{staticClass:"popup-send-redpacket",attrs:{overlay:"true"},model:{value:t.sendRedpacket,callback:function(e){t.sendRedpacket=e},expression:"sendRedpacket"}},[s("div",{staticClass:"popup-content border-1px-b"},[s("img",{attrs:{src:"static/img/wv.png",alt:""}}),t._v(" "),s("p",{staticClass:"font-15 font-bold"},[t._v("恭喜获得"+t._s(t.share.info.superRedpacket.packet_total)+"个红包")]),t._v(" "),s("p",{staticClass:"font-14 margin-10-t"},[t._v("分享给小伙伴，大家一起抢。")])]),t._v(" "),s("div",{staticClass:"popup-footer flex-lr"},[s("div",{staticClass:"cancle border-1px-r",on:{click:function(e){t.sendRedpacket=!1}}},[t._v("取消")]),t._v(" "),s("div",{staticClass:"grant",on:{click:function(e){t.onChangeZhezhao(!0)}}},[t._v("发红包")])])])]:t._e(),t._v(" "),t.zhezhaoShow?s("div",{staticClass:"zhezhao",on:{click:function(e){t.onChangeZhezhao()}}},[s("img",{staticClass:"width-100",attrs:{src:"static/img/share-layer.png",alt:""}})]):t._e()],2)},staticRenderFns:[]};var d=s("VU/8")(o,n,!1,function(t){s("PDgq")},null,null);e.default=d.exports},PDgq:function(t,e){}});
//# sourceMappingURL=42.b2f7f10af545d2fe535c.js.map