webpackJsonp([26],{"4V7w":function(t,e,a){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var s=a("woOf"),i=a.n(s),r=a("Dd8w"),n=a.n(r),d=a("NYxO"),l=a("Cz8s"),o=(a("NPH5"),{name:"paotuiScene",components:{PublicHeader:l.a},data:function(){return{showPreLoading:!0,status:{prefee:!1,deliveryTime:!1,goodsWeight:!1,tip:!1,fee:!1,redpacket:!1,address:!1},note:"",goodsWeight:0,tip:0,buyaddressPoint:!0,diy:{data:{}},redPackets:[],addresses:[],buyaddress:{},buyAddressType:"nearby",acceptaddress:{},order:{}}},computed:n()({},Object(d.c)(["erranderExtra"])),methods:n()({},Object(d.b)(["setState","replaceState"]),{onChangeStatus:function(t){"prefee"==t&&this.status.prefee?this.setState({type:"erranderExtra",key:"goods_price",val:0}):"goodsWeight"==t&&this.status.goodsWeight?this.setState({type:"erranderExtra",key:"goods_weight",val:0}):"tip"==t&&this.status.tip&&this.setState({type:"erranderExtra",key:"delivery_tips",val:0}),this.status[t]=!this.status[t]},onConfirmPrefee:function(){this.setState({type:"erranderExtra",key:"goods_price",val:this.erranderExtra.goods_price}),this.status.prefee=!1,this.onCalculate()},onToggleBuyAddressType:function(t){this.buyAddressType=t,this.setState({type:"erranderExtra",key:"buyAddressType",val:t})},onSelectDay:function(t){this.setState({type:"erranderExtra",key:"delivery_day",val:t}),this.erranderExtra.delivery_day=t},onSelectTime:function(t){this.setState({type:"erranderExtra",key:"delivery_time",val:t}),this.erranderExtra.delivery_time=t,this.status.deliveryTime=!1,this.onCalculate()},onChangeWeight:function(){this.setState({type:"erranderExtra",key:"goods_weight",val:this.goodsWeight}),this.onCalculate()},onChangeTip:function(){this.setState({type:"erranderExtra",key:"delivery_tips",val:this.tip}),this.onCalculate()},onSelectRedpacket:function(t){t==this.erranderExtra.redpacket_id&&(t=0),this.setState({type:"erranderExtra",key:"redpacket_id",val:t}),this.status.redpacket=!1,this.onCalculate()},onGetExtraFee:function(t,e){if(this.erranderExtra.extra_fee&&0!=this.erranderExtra.extra_fee.length||(this.erranderExtra.extra_fee={}),this.erranderExtra.extra_fee[e]){for(var a in this.erranderExtra.extra_fee[e])if(this.erranderExtra.extra_fee[e][a]==t)return delete this.erranderExtra.extra_fee.current,delete this.erranderExtra.extra_fee[e][a],this.onCalculate(),!1}else this.erranderExtra.extra_fee[e]={};this.erranderExtra.extra_fee[e][t]=t,this.erranderExtra.extra_fee.current={pindex:e,cindex:t},this.onCalculate()},onGetPartData:function(t,e,a,s,i){var r=a+"_"+e;if(this.erranderExtra.partData||(this.erranderExtra.partData={}),"text"==t)this.erranderExtra.partData[r]=s;else if("oneChoice"==t){if(this.erranderExtra.partData[r]&&this.erranderExtra.partData[r]==s)return this.erranderExtra.partData[r]="",!1;this.erranderExtra.partData[r]=s}else if("multipleChoices"==t){if(this.erranderExtra.partData[r]){for(var n in this.erranderExtra.partData[r])if(this.erranderExtra.partData[r][n]==s)return delete this.erranderExtra.partData[r][n],!1}else this.erranderExtra.partData[r]={};this.erranderExtra.partData[r][i]=s}},onCalculate:function(){var t=this;this.status.redpacket=!1;var e={is_calculate:1,extra:this.erranderExtra,id:this.id};this.util.request({url:"errander/diy/index",data:e}).then(function(e){var a=e.data.message;if(0!=a.errno)return t.util.$toast(a.message,"",1e3),!1;a=a.message;var s=i()(t.erranderExtra,{delivery_nowtime:a.order.delivery_nowtime,acceptaddress_id:a.acceptaddress_id,buyaddress_id:a.buyaddress_id,extra_fee:a.order.extra_fee,redpacket_id:a.order.redpacket_id,goods_price:a.order.goods_price,delivery_day:a.order.delivery_day,delivery_time:a.order.delivery_time,delivery_tips:a.order.delivery_tips});t.replaceState({key:"erranderExtra",val:s})})},onLoad:function(){var t=this;this.util.request({url:"errander/diy/index",data:{id:this.id,extra:this.erranderExtra,forceLocation:1}}).then(function(e){t.showPreLoading=!1;var a=e.data.message;if(0!=a.errno)return t.util.$toast(a.message,"",1e3),!1;a=a.message,t.erranderExtra.buyAddressType||(t.buyAddressType=t.erranderExtra.buyAddressType);var s=i()(t.erranderExtra,{delivery_day:a.order.delivery_day,delivery_time:a.order.delivery_time,delivery_nowtime:a.order.delivery_nowtime,buyaddress_id:a.buyaddress_id,acceptaddress_id:a.acceptaddress_id,delivery_tips:a.order.delivery_tips,extra_fee:a.order.extra_fee,goods_weight:a.order.goods_weight,goods_price:a.order.goods_price,note:a.order.note});t.replaceState({key:"erranderExtra",val:s}),t.redPackets=a.redPackets,t.addresses=a.addresses,t.buyaddress=a.buyaddress,t.acceptaddress=a.acceptaddress,t.diy=a.diy,t.order=a.order,t.erranderExtra&&t.erranderExtra.note&&(t.note=t.erranderExtra.note),t.erranderExtra.extra_fee||(t.erranderExtra.extra_fee={}),console.log(t.erranderExtra),console.log(t.diy.data)})},onAddLabel:function(t){this.note=this.note+t+" ",this.setState({type:"erranderExtra",key:"note",val:this.note})}}),watch:{},created:function(){this.query=this.$route.query,this.query&&(this.id=this.query.id)},mounted:function(){this.onLoad()}}),c={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{attrs:{id:"paotui-scene"}},[a("public-header",{attrs:{title:"跑腿场景"}}),t._v(" "),a("div",{staticClass:"content"},[t._l(t.diy.data.items,function(e,s){return["banner"==e.id?a("div",{staticClass:"diy-banner"},t._l(e.data,function(t,e){return a("div",{key:e},[a("img",{attrs:{src:t.imgurl}})])})):"picture"==e.id?a("div",{staticClass:"diy-picture"},[a("van-swipe",{attrs:{autoplay:3e3}},t._l(e.data,function(e,s){return a("van-swipe-item",{key:s},[a("div",{on:{click:function(a){t.util.jsUrl(e.linkurl)}}},[a("img",{attrs:{src:e.imgurl,alt:""}})])])}))],1):"line"==e.id?a("div",{staticClass:"diy-line",style:{background:e.style.background,padding:e.style.padding+"px 0px"}},[a("div",{staticClass:"line"})]):"blank"==e.id?a("div",{staticClass:"diy-blank",style:{height:e.style.height+"px",background:e.style.background}}):"basic"==e.id?[a("van-cell-group",{staticClass:"diy-scene-shopinfo margin-10-b"},[a("van-field",{staticClass:"border-0px",attrs:{type:"textarea",placeholder:e.params.placeholder,rows:"4"},model:{value:t.note,callback:function(e){t.note=e},expression:"note"}}),t._v(" "),a("ul",{staticClass:"info-tags"},t._l(e.data,function(e,s){return a("li",{key:s,staticClass:"tag-item",on:{click:function(a){t.onAddLabel(e.tags)}}},[t._v(t._s(e.tags))])})),t._v(" "),1==e.params.estimate?a("van-cell",{staticClass:"van-hairline--top"},[a("div",{staticClass:"flex",attrs:{slot:"title"},slot:"title"},[a("img",{staticClass:"amount-icon",attrs:{src:"static/img/amount_icon.png",alt:""}}),t._v(" "),a("span",{staticClass:"font-12"},[t._v("骑手垫付商品费，收货后与配送员结清")])]),t._v(" "),a("div",{staticClass:"flex",attrs:{slot:"right-icon"},on:{click:function(e){t.onChangeStatus("prefee")}},slot:"right-icon"},[a("span",{staticClass:"c-disabled font-12"},[t._v(t._s(t.erranderExtra.goods_price>0?"预估 ￥"+t.erranderExtra.goods_price:"预估商品费"))]),t._v(" "),a("span",{staticClass:"icon icon-right c-disabled font-12"})])]):t._e()],1),t._v(" "),a("van-cell-group",{staticClass:"diy-scene-address margin-10-b"},["buy"==e.params.scene?[a("van-cell",{staticClass:"border-0px"},[a("div",{staticClass:"flex",attrs:{slot:"title"},slot:"title"},[a("div",{staticClass:"margin-15-r"},[t._v(t._s(e.params.buytitle))]),t._v(" "),a("div",{staticClass:"address-type flex"},[a("div",{staticClass:"address-type-item font-12 ",class:{active:"store"==t.buyAddressType},on:{click:function(e){t.onToggleBuyAddressType("store")}}},[t._v(t._s(e.params.buytype1title))]),t._v(" "),a("div",{staticClass:"address-type-item font-12",class:{active:"nearby"==t.buyAddressType},on:{click:function(e){t.onToggleBuyAddressType("nearby")}}},[t._v(" "+t._s(e.params.buytype2title))])])])]),t._v(" "),"store"==t.erranderExtra.buyAddressType?a("van-cell",{on:{click:t.onSelectBuyAddress}},[a("div",{staticClass:"flex",attrs:{slot:"title"},slot:"title"},[a("div",{staticClass:"margin-15-r opacity-1"},[t._v("11133")]),t._v(" "),a("span",{staticClass:"c-disabled"},[t._v("2222")])]),t._v(" "),a("div",{staticClass:"flex",attrs:{slot:"right-icon"},slot:"right-icon"},[a("span",{staticClass:"icon icon-right c-disabled font-12"})])]):t._e(),t._v(" "),a("van-cell",{attrs:{to:t.util.getUrl({path:"/pages/member/address",query:{channel:"errander",input:"accept",erranderId:t.id}})}},[a("div",{staticClass:"flex ",attrs:{slot:"title"},slot:"title"},[a("div",{staticClass:"margin-15-r"},[t._v(t._s(e.params.accepttitle))]),t._v(" "),t.erranderExtra.acceptaddress_id>0?a("span",{staticClass:"c-disabled"},[t._v(t._s(t.acceptaddress.address)+" "+t._s(t.acceptaddress.number)+"\n\t\t\t\t\t\t\t\t"+t._s(t.acceptaddress.realname)+" "+t._s(t.acceptaddress.sex)+" "+t._s(t.acceptaddress.mobile))]):a("span",{staticClass:"c-disabled"},[t._v(t._s(e.params.acceptplacehode))])]),t._v(" "),a("div",{staticClass:"flex",attrs:{slot:"right-icon"},slot:"right-icon"},[a("span",{staticClass:"icon icon-right c-disabled font-12"})])])]:"delivery"==e.params.scene?[a("van-cell",{attrs:{to:t.util.getUrl({path:"/pages/member/address",query:{channel:"errander",input:"buy",erranderId:t.id}})}},[a("div",{staticClass:"flex height-60",attrs:{slot:"title"},slot:"title"},[a("div",{staticClass:"address-icon bg-primary"}),t._v(" "),t.erranderExtra.buyaddress_id>0?a("span",{staticClass:"c-disabled"},[t._v(t._s(t.buyaddress.address)+" "+t._s(t.buyaddress.number)+"\n\t\t\t\t\t\t\t\t"+t._s(t.buyaddress.realname)+" "+t._s(t.buyaddress.mobile))]):a("span",{staticClass:"c-disabled"},[t._v(t._s(e.params.buytype1placehode))])]),t._v(" "),a("div",{staticClass:"flex",attrs:{slot:"right-icon"},slot:"right-icon"},[a("span",{staticClass:"icon icon-right c-disabled font-12"})])]),t._v(" "),a("van-cell",{attrs:{to:t.util.getUrl({path:"/pages/member/address",query:{channel:"errander",input:"accept",erranderId:t.id}})}},[a("div",{staticClass:"flex height-60",attrs:{slot:"title"},slot:"title"},[a("div",{staticClass:"address-icon bg-danger"}),t._v(" "),t.erranderExtra.acceptaddress_id>0?a("span",{staticClass:"c-disabled"},[t._v(t._s(t.acceptaddress.address)+" "+t._s(t.acceptaddress.number)+" "+t._s(t.acceptaddress.realname)+" "+t._s(t.acceptaddress.mobile))]):a("span",{staticClass:"c-disabled"},[t._v(t._s(e.params.acceptplacehode))])]),t._v(" "),a("div",{staticClass:"flex",attrs:{slot:"right-icon"},slot:"right-icon"},[a("span",{staticClass:"icon icon-right c-disabled font-12"})])])]:t._e(),t._v(" "),a("van-row",[a("van-col",{staticClass:"van-hairline--right",attrs:{span:"12"}},[a("van-cell",{on:{click:function(e){t.onChangeStatus("deliveryTime")}}},[a("div",{attrs:{slot:"title"},slot:"title"},[t._v(t._s(t.erranderExtra.delivery_day)+" "+t._s(t.erranderExtra.delivery_time==t.order.delivery_nowtime?"立即送出":t.erranderExtra.delivery_time))]),t._v(" "),a("div",{staticClass:"icon icon-right c-disabled font-12",attrs:{slot:"right-icon"},slot:"right-icon"})])],1),t._v(" "),a("van-col",{attrs:{span:"12"}},[a("van-cell",{on:{click:function(e){t.onChangeStatus("goodsWeight")}}},[t.erranderExtra.goods_weight>t.diy.data.fees.weight_data.basic?a("div",{attrs:{slot:"title"},slot:"title"},[t._v(t._s(t.erranderExtra.goods_weight)+"公斤")]):a("div",{attrs:{slot:"title"},slot:"title"},[t._v("物品重量："+t._s(t.diy.data.fees.weight_data.basic)+"公斤内")]),t._v(" "),a("div",{staticClass:"icon icon-right c-disabled font-12",attrs:{slot:"right-icon"},slot:"right-icon"})])],1)],1)],2)]:"text"==e.id?[a("van-cell-group",{staticClass:"diy-scene-text margin-10-b",style:{"margin-top":e.style.marginTop+"px"}},[t._l(e.data,function(t,e){return[a("van-field",{attrs:{label:t.title,placeholder:"请输入提示信息"}})]})],2)]:"multipleChoices"==e.id?t._l(e.data,function(s,i){return a("div",{staticClass:"diy-scene-choose flex-lr margin-10-b",style:{"margin-top":e.style.marginTop+"px"}},[a("div",{staticClass:"choose-title ellipsis font-14"},[t._v(t._s(s.title))]),t._v(" "),a("div",{staticClass:"choose-options"},t._l(s.options,function(e,i){return a("span",{key:i,staticClass:"option-item font-14",class:{active:1==s}},[t._v(t._s(e.name))])}))])}):"oneChoice"==e.id?t._l(e.data,function(i,r){return a("div",{staticClass:"diy-scene-choose flex-lr margin-10-b",style:{"margin-top":e.style.marginTop+"px"}},[a("div",{staticClass:"choose-title ellipsis font-14"},[t._v(t._s(i.title))]),t._v(" "),a("div",{staticClass:"choose-options"},t._l(i.options,function(e,i){return a("span",{key:i,staticClass:"option-item font-14",on:{click:function(e){t.onGetPartData("oneChoice",r,s,t.value,i)}}},[t._v(t._s(e.name))])}))])}):t._e()]}),t._v(" "),t.diy.data.fees.extra_fee?t._l(t.diy.data.fees.extra_fee,function(e,s){return 1==e.status?a("div",{key:s,staticClass:"diy-scene-choose flex-lr margin-10-b"},[a("div",{staticClass:"choose-title ellipsis font-14"},[t._v(t._s(e.title))]),t._v(" "),a("div",{staticClass:"choose-options"},t._l(e.data,function(e,i){return a("span",{key:i,staticClass:"option-item font-14",on:{click:function(e){t.onGetExtraFee(i,s)}}},[t._v(t._s(e.fee_name)+"-￥"+t._s(e.fee))])}))]):t._e()}):t._e(),t._v(" "),t._l(t.diy.data.items,function(e,s){return["basic"==e.id?[a("van-cell-group",{staticClass:"diy-scene-extra-fee"},[a("van-cell",[a("div",{attrs:{slot:"title"},slot:"title"},[t._v(t._s(e.params.redpacketname))]),t._v(" "),a("div",{attrs:{slot:"right-icon"},slot:"right-icon"},[t.order.redpacket?a("span",{staticClass:"c-danger font-12",on:{click:function(e){t.onChangeStatus("redpacket")}}},[t._v("-￥"+t._s(t.order.redpacket.discount))]):a("span",{staticClass:"font-12",class:{"c-danger":t.redPackets.length>0,"c-disabled":t.redPackets.length<=0},on:{click:function(e){t.onChangeStatus("redpacket")}}},[t._v(t._s(t.redPackets.length>0?t.redPackets.length+"个可用红包":e.params.noredpacketnote))]),t._v(" "),a("span",{staticClass:"icon icon-right c-disabled font-12"})])]),t._v(" "),1==e.params.showtips?a("van-cell",[a("div",{attrs:{slot:"title"},slot:"title"},[t._v(t._s(e.params.tipsname))]),t._v(" "),a("div",{attrs:{slot:"right-icon"},on:{click:function(e){t.onChangeStatus("tip")}},slot:"right-icon"},[a("span",{staticClass:"font-14",class:{"c-danger":t.erranderExtra.delivery_tips>0}},[t._v(t._s(t.erranderExtra.delivery_tips>0?"￥"+t.erranderExtra.delivery_tips:e.params.tipsnote))]),t._v(" "),a("span",{staticClass:"icon icon-right c-disabled font-12"})])]):t._e()],1),t._v(" "),a("p",{staticClass:"diy-scene-agreement font-12"},[t._v("点击查看 "),a("span",{staticClass:"c-default"},[t._v(t._s("buy"==t.diy.data.page.scene?"《帮买服务协议》":"《帮送服务协议》"))])]),t._v(" "),a("div",{staticClass:"diy-scene-submit van-hairline--top"},[a("div",{staticClass:"order-info flex-lr"},[a("div",{staticClass:"font-12"},[t._v(t._s(t.order.distance>0?t.order.distance+"公里":"就近配送"))]),t._v(" "),a("div",{staticClass:"font-12 c-default",on:{click:function(e){t.onChangeStatus("fee")}}},[a("span",[t._v(t._s(e.params.feesname))]),t._v(" "),a("span",{staticClass:"c-danger"},[a("span",{staticClass:"font-20"},[t._v(t._s(t.order.final_fee))]),t._v("元\n\t\t\t\t\t\t\t")]),t._v(" "),a("span",{staticClass:"icon icon-fold font-12 c-disabled"})])]),t._v(" "),a("van-button",{attrs:{size:"normal",block:!0,type:"danger"}},[t._v(t._s(e.params.submitname))])],1),t._v(" "),a("van-popup",{staticClass:"popup-prefee",attrs:{position:"bottom"},model:{value:t.status.prefee,callback:function(e){t.$set(t.status,"prefee",e)},expression:"status.prefee"}},[a("div",{staticClass:"popup-title flex-lr border-1px-b"},[a("span",{staticClass:"font-14",on:{click:function(e){t.onChangeStatus("prefee")}}},[t._v("取消")]),t._v(" "),a("span",[t._v("预估商品费")]),t._v(" "),a("span",{staticClass:"font-14",on:{click:t.onConfirmPrefee}},[t._v("确定")])]),t._v(" "),a("div",{staticClass:"popup-content"},[a("p",{staticClass:"prefee-tips"},[t._v("供骑手代购时参考（可选填）")]),t._v(" "),a("div",{staticClass:"prefee-edit"},[t._v("\n\t\t\t\t\t\t\t预估 ¥\n\t\t\t\t\t\t\t"),a("input",{directives:[{name:"model",rawName:"v-model",value:t.erranderExtra.goods_price,expression:"erranderExtra.goods_price"}],attrs:{type:"text"},domProps:{value:t.erranderExtra.goods_price},on:{input:function(e){e.target.composing||t.$set(t.erranderExtra,"goods_price",e.target.value)}}})]),t._v(" "),a("p",{staticClass:"prefee-max c-disabled"},[a("span",{staticClass:"icon icon-info"}),t._v("最高500元\n\t\t\t\t\t\t")])])]),t._v(" "),a("van-popup",{staticClass:"popup-delivery-time",attrs:{position:"bottom"},model:{value:t.status.deliveryTime,callback:function(e){t.$set(t.status,"deliveryTime",e)},expression:"status.deliveryTime"}},[a("div",{staticClass:"popup-title flex-lr border-1px-b"},[a("span",{staticClass:"font-14",on:{click:function(e){t.onChangeStatus("deliveryTime")}}},[t._v("取消")]),t._v(" "),a("span",[t._v("取件时间")]),t._v(" "),a("span",{staticClass:"opacity-1"},[t._v("确定")])]),t._v(" "),a("div",{staticClass:"popup-content flex-lr"},[a("div",{staticClass:"date"},t._l(t.order.delivery_info,function(e,s){return a("div",{staticClass:"date-item",class:{active:s==t.erranderExtra.delivery_day},on:{click:function(e){t.onSelectDay(s)}}},[t._v(t._s(s))])})),t._v(" "),a("div",{staticClass:"time"},t._l(t.order.delivery_info[t.erranderExtra.delivery_day].times,function(e,s){return a("div",{key:s,staticClass:"time-item",class:{active:e==t.erranderExtra.delivery_time},on:{click:function(a){t.onSelectTime(e)}}},[t._v("\n\t\t\t\t\t\t\t\t"+t._s(e==t.order.delivery_nowtime?"立即送出":e)+"\n\t\t\t\t\t\t\t\t"),a("span",{staticClass:"icon",class:{"icon-check":e==t.erranderExtra.delivery_time}})])}))])]),t._v(" "),a("van-popup",{staticClass:"popup-goods-weight",attrs:{position:"bottom"},model:{value:t.status.goodsWeight,callback:function(e){t.$set(t.status,"goodsWeight",e)},expression:"status.goodsWeight"}},[a("div",{staticClass:"popup-title flex-lr border-1px-b"},[a("span",{staticClass:"font-14",on:{click:function(e){t.onChangeStatus("goodsWeight")}}},[t._v("取消")]),t._v(" "),a("span",[t._v("物品重量")]),t._v(" "),a("span",{staticClass:"opacity-1"},[t._v("确定")])]),t._v(" "),a("div",{staticClass:"popup-content"},[a("p",{staticClass:"weight-label"},[t._v("重量")]),t._v(" "),t.erranderExtra.goods_weight>t.diy.data.fees.weight_data.basic?a("div",{staticClass:"weight-value"},[t._v(t._s(t.erranderExtra.goods_weight)+"公斤")]):a("div",{staticClass:"weight-value"},[t._v("小于"+t._s(t.diy.data.fees.weight_data.basic)+"公斤")]),t._v(" "),a("div",{staticClass:"slider"},[a("van-slider",{attrs:{min:t.diy.data.fees.weight_data.basic,max:200},on:{change:t.onChangeWeight},model:{value:t.goodsWeight,callback:function(e){t.goodsWeight=e},expression:"goodsWeight"}}),t._v(" "),a("div",{staticClass:"slide-line-bottom"},[a("div",{staticClass:"left"},[t._v("小于"+t._s(t.diy.data.fees.weight_data.basic)+"公斤")]),t._v(" "),a("div",{staticClass:"right"},[t._v("200公斤")])])],1)])]),t._v(" "),a("van-popup",{staticClass:"popup-goods-weight popup-tip",attrs:{position:"bottom"},model:{value:t.status.tip,callback:function(e){t.$set(t.status,"tip",e)},expression:"status.tip"}},[a("div",{staticClass:"popup-title flex-lr border-1px-b"},[a("span",{staticClass:"font-14",on:{click:function(e){t.onChangeStatus("tip")}}},[t._v("取消")]),t._v(" "),a("span",[t._v("小费")]),t._v(" "),a("span",{staticClass:"opacity-1"},[t._v("确定")])]),t._v(" "),a("div",{staticClass:"popup-content"},[a("p",{staticClass:"weight-label"},[t._v("加小费抢单更快哦(单位:元)")]),t._v(" "),t.erranderExtra.delivery_tips>0?a("div",{staticClass:"weight-value"},[t._v(t._s(t.erranderExtra.delivery_tips)+"元")]):t._e(),t._v(" "),a("div",{staticClass:"slider"},[a("van-slider",{on:{change:t.onChangeTip},model:{value:t.tip,callback:function(e){t.tip=e},expression:"tip"}}),t._v(" "),a("div",{staticClass:"slide-line-bottom"},[a("div",{staticClass:"left"},[t._v(t._s(e.params.minfee)+"元")]),t._v(" "),a("div",{staticClass:"right"},[t._v(t._s(e.params.maxfee)+"元")])])],1)])]),t._v(" "),a("van-popup",{staticClass:"popup-fee",attrs:{position:"bottom"},model:{value:t.status.fee,callback:function(e){t.$set(t.status,"fee",e)},expression:"status.fee"}},[a("div",{staticClass:"popup-title flex-lr border-1px-b"},[a("span",{staticClass:"font-12 flex opacity-1"},[t._v("\n\t\t\t\t\t\t\t价格规则\n\t\t\t\t\t\t\t"),a("span",{staticClass:"icon icon-right font-12 "})]),t._v(" "),a("span",{on:{click:function(e){t.util.getUrl({path:"/pages/paotui/feeRule",query:{id:t.id}})}}},[t._v("费用明细")]),t._v(" "),a("span",{staticClass:"font-12 c-primary flex"},[t._v("\n\t\t\t\t\t\t\t价格规则\n\t\t\t\t\t\t\t"),a("span",{staticClass:"icon icon-right font-12 "})])]),t._v(" "),a("div",{staticClass:"popup-content"},[a("van-cell-group",{staticClass:"border-0px"},[t._l(t.order.fees,function(e,s){return[""!=e.fee?a("van-cell",{staticClass:"border-0px",class:{"c-danger":e.fee<0},attrs:{title:e.title,value:e.fee_cn}}):t._e()]})],2)],1)]),t._v(" "),t.redPackets.length>0?a("van-popup",{attrs:{position:"bottom"},model:{value:t.status.redpacket,callback:function(e){t.$set(t.status,"redpacket",e)},expression:"status.redpacket"}},[a("div",{staticClass:"popup-redpacket"},[a("div",{staticClass:"popup-title van-hairline--bottom text-center"},[t._v("可用红包")]),t._v(" "),a("div",{staticClass:"popup-container"},[a("load",{attrs:{type:"loaded",text:"可用红包("+t.redPackets.length+"个)",bgcolor:"#f5f5f5"}}),t._v(" "),t._l(t.redPackets,function(e){return a("div",{key:e.id,staticClass:"redPacket-list content-padded"},[a("div",{staticClass:"redPacket-list-item"},[a("div",{staticClass:"redPacket-list-item-container"},[a("div",{staticClass:"redPacket-info row"},[a("div",{staticClass:"col-50"},[a("span",{staticClass:"redPacket-title"},[t._v(t._s(e.title))])]),t._v(" "),a("div",{staticClass:"col-50 text-right"},[a("div",{staticClass:"price"},[t._v("￥"),a("span",{staticClass:"price-num"},[t._v(t._s(e.discount))])])])]),t._v(" "),a("div",{staticClass:"redPacket-use-limit row"},[a("div",{staticClass:"col-60"},[t._v(t._s(e.day_cn))]),t._v(" "),a("div",{staticClass:"col-40 text-right"},[a("p",{staticClass:"use-condition"},[t._v("满"+t._s(e.condition)+"元可用")])])])]),t._v(" "),a("span",{staticClass:"circle circle-left"}),t._v(" "),a("span",{staticClass:"circle circle-right"}),t._v(" "),e.id==t.order.redpacket.id?a("div",{staticClass:"selected-status"},[a("img",{attrs:{src:"static/img/success.png",alt:""}})]):t._e()])])})],2),t._v(" "),a("div",{staticClass:"popup-cancle van-hairline--top",on:{click:function(e){t.onSelectRedpacket(0)}}},[t._v("不使用红包")])])]):t._e()]:t._e()]})],2),t._v(" "),a("transition",{attrs:{name:"loading"}},[t.showPreLoading?a("iloading"):t._e()],1)],1)},staticRenderFns:[]};var p=a("VU/8")(o,c,!1,function(t){a("Z7hm")},null,null);e.default=p.exports},Z7hm:function(t,e){}});
//# sourceMappingURL=26.8b62f5fe2a2c490f46ea.js.map