webpackJsonp([69],{Crb6:function(t,s,e){"use strict";Object.defineProperty(s,"__esModule",{value:!0});var a=e("Gu7T"),i=e.n(a),n=e("mzkE"),c=e("Cz8s"),d=e("KgXo"),r={data:function(){return{redpackets:{loading:!1,finished:!1,status:1,data:[]},showLoading:!0}},components:{PublicHeader:c.a,PublicFooter:n.a,loading:d.a},watch:{$route:function(t,s){this.showLoading=!0,this.redpackets={loading:!1,finished:!1,status:1,data:[]},this.$route.query.status&&(this.redpackets.status=this.$route.query.status),this.onLoad()}},methods:{onLoad:function(){var t=this;if(this.redpackets.finished)return!1;this.util.request({url:"wmall/member/redPacket",data:{min:this.redpackets.min,status:this.redpackets.status}}).then(function(s){var e=s.data.message;t.redpackets.data=[].concat(i()(t.redpackets.data),i()(e.message)),t.hideLoading(),t.redpackets.data.length<6&&(t.redpackets.finished=!0),t.redpackets.loading=!1,t.redpackets.min=e.min,e.min||(t.redpackets.finished=!0)})},hideLoading:function(){this.showLoading=!1}},mounted:function(){this.$route.query.status&&(this.redpackets.status=this.$route.query.status),this.onLoad()}},o={render:function(){var t=this,s=t.$createElement,e=t._self._c||s;return e("div",{attrs:{id:"red-packet"}},[e("public-header",{attrs:{title:"我的红包"}}),t._v(" "),e("div",{staticClass:"content"},[t.showLoading?t._e():[t.redpackets.data.length>0?e("van-list",{attrs:{finished:t.redpackets.finished,offset:100,"immediate-check":!1},on:{load:t.onLoad},model:{value:t.redpackets.loading,callback:function(s){t.$set(t.redpackets,"loading",s)},expression:"redpackets.loading"}},[e("div",{staticClass:"redPacket-list content-padded"},t._l(t.redpackets.data,function(s,a){return e("div",{staticClass:"redPacket-list-item",class:{invalid:s.status>1}},[e("div",{staticClass:"redPacket-list-item-container ",class:{"superredpacket-meal":"superRedpacket_meal"==s.channel}},[e("div",{staticClass:"redPacket-info row"},[e("div",{staticClass:"col-50"},[e("span",{staticClass:"redPacket-title"},[t._v(t._s(s.title))])]),t._v(" "),e("div",{staticClass:"col-50 text-right"},[e("div",{staticClass:"price"},[t._v("￥"),e("span",{staticClass:"price-num"},[t._v(t._s(s.discount))])])])]),t._v(" "),e("div",{staticClass:"redPacket-use-limit row"},[e("div",{staticClass:"col-60"},[t._v("限"+t._s(s.starttime)+"-"+t._s(s.endtime)+"使用")]),t._v(" "),e("div",{staticClass:"col-40 text-right"},[e("p",{staticClass:"use-condition"},[t._v("满"+t._s(s.contition)+"元可用")])])]),t._v(" "),s.category_cn||s.time_cn?e("div",{staticClass:"other-limit"},[t._v("\n\t\t\t\t\t\t\t\t"+t._s(s.category_cn)+" "+t._s(s.time_cn)+"\n\t\t\t\t\t\t\t")]):t._e()]),t._v(" "),e("span",{staticClass:"border-1px-r circle circle-left ",class:{"superredpacket-meal":"superRedpacket_meal"==s.channel}}),t._v(" "),e("span",{staticClass:"border-1px-l circle circle-right ",class:{"superredpacket-meal":"superRedpacket_meal"==s.channel}}),t._v(" "),3==s.status?e("span",{staticClass:"overdue"}):t._e(),t._v(" "),2==s.status?e("span",{staticClass:"use"}):t._e()])})),t._v(" "),e("div",{staticClass:"no-more"},[t.redpackets.finished?e("span",{staticClass:"no-more-a"},[t._v("没有更多红包了")]):t._e(),t._v(" "),"1"==t.redpackets.status?[t.redpackets.finished?e("span",[t._v("|")]):t._e(),t._v(" "),e("router-link",{staticClass:"no-more-a",attrs:{to:t.util.getUrl({path:"/pages/member/redPacket/index?status=2"})}},[t._v("查看无效券")])]:t._e()],2)]):e("div",{staticClass:"common-no-con"},[e("img",{attrs:{src:"static/img/coupon_no_con.png",alt:""}}),t._v(" "),e("p",[t._v("您没有红包记录")])]),t._v(" "),e("div",{staticStyle:{width:"100%",height:"50px"}})]],2),t._v(" "),e("transition",{attrs:{name:"loading"}},[e("iloading",{directives:[{name:"show",rawName:"v-show",value:t.showLoading,expression:"showLoading"}]})],1)],1)},staticRenderFns:[]};var l=e("VU/8")(r,o,!1,function(t){e("VLaH")},"data-v-372ea240",null);s.default=l.exports},VLaH:function(t,s){}});
//# sourceMappingURL=69.ec8b9968a3f9f28c022a.js.map