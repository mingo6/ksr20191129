webpackJsonp([20],{Tuw7:function(t,i){},hDXg:function(t,i,a){"use strict";Object.defineProperty(i,"__esModule",{value:!0});var e={components:{},data:function(){return{showPreLoading:!0,activeNum:0,wheelData:{data:{one:{},two:{},three:{}},params:{}},init:{index:1,fast:4,num:8,num_t:4,cycle:3,flag:!1,lucky:"",cycle_default:3,speed:100},prize:{note:"",type:"",id:""},imghuigu:""}},methods:{rand:function(t,i){var a=i-t,e=Math.random();return t+Math.round(e*a)},onDraw:function(){var t=this;if(this.init.flag)return!1;this.init.fast=this.rand(5,6),this.init.cycle_default=this.init.cycle=this.rand(3,5),this.init.speed=300,this.init.flag=!0,this.util.request({url:"wheel/activity/index",method:"POST",data:{id:this.id,order_id:this.order_id}}).then(function(i){var a=i.data.message;if(a.errno)return t.$toast(a.message),!1;t.init.lucky=a.luckyNum;var e=t.init.lucky;"1"!=e&&"4"!=e&&"7"!=e||(t.prize.type=a.award.type,t.prize.id=a.id),t.prize.note=a.message,t.activeNum=1,t.showLottery()})},showLottery:function(){this.init.index>this.init.num&&(this.init.index=1,this.init.cycle--);var t=this.init.num+1,i=this.init.lucky-this.init.num_t>=0?0:1,a=this.init.lucky-this.init.num_t,e=a>=0?a>0?a:1:t+a;this.activeNum=this.init.index,this.init.index>this.init.fast&&this.init.cycle==this.init.cycle_default&&(this.init.speed=100),(this.init.cycle==i&&this.init.index>=e||this.init.cycle<i)&&(this.init.speed=this.init.speed+200);var s=this;if(this.init.cycle<=0&&this.init.index==this.init.lucky)clearTimeout(n),setTimeout(function(){s.$toast(s.prize.note),s.init.flag=!1,s.init.index=1,s.prize.type=0,s.prize.note=""},1e3),s.init.flag=!1;else{this.init.index++;var n=setTimeout(this.showLottery,this.init.speed)}},onLoad:function(){var t=this;this.util.request({url:"wheel/activity/index",data:{id:this.id,order_id:this.order_id}}).then(function(i){t.showPreLoading=!1;var a=i.data.message;a.errno?t.$toast(a.message):(a=a.message,t.wheelData=a.wheelData)})}},created:function(){this.query=this.$route.query,this.query&&(this.id=this.query.id,this.order_id=this.query.order_id)},mounted:function(){this.onLoad()}},s={render:function(){var t=this,i=t.$createElement,a=t._self._c||i;return a("div",{attrs:{id:"wheel-index"}},[a("div",{staticClass:"content"},[a("div",{staticClass:"wheel"},[a("div",{staticClass:"content-wheel"},[a("div",{staticClass:"wheel-item",class:{active:1==t.activeNum}},[a("img",{staticClass:"wheel-img",attrs:{src:t.wheelData.data.one.imgurl,alt:""}}),t._v(" "),a("span",{staticClass:"wheel-text",style:{color:t.wheelData.data.one.color}},[t._v(t._s(t.wheelData.data.one.text))])]),t._v(" "),a("div",{staticClass:"wheel-item thanks",class:{active:2==t.activeNum}},[2==t.activeNum?a("img",{staticClass:"wheel-img",attrs:{src:"static/img/huigu-active.png",alt:""}}):a("img",{staticClass:"wheel-img",attrs:{src:"static/img/huigu.png",alt:""}}),t._v(" "),a("span",{staticClass:"wheel-text"},[t._v("谢谢惠顾")])]),t._v(" "),a("div",{staticClass:"wheel-item thanks",class:{active:3==t.activeNum}},[3==t.activeNum?a("img",{staticClass:"wheel-img",attrs:{src:"static/img/huigu-active.png",alt:""}}):a("img",{staticClass:"wheel-img",attrs:{src:"static/img/huigu.png",alt:""}}),t._v(" "),a("span",{staticClass:"wheel-text"},[t._v("谢谢惠顾")])]),t._v(" "),a("div",{staticClass:"wheel-item thanks",class:{active:8==t.activeNum}},[8==t.activeNum?a("img",{staticClass:"wheel-img",attrs:{src:"static/img/huigu-active.png",alt:""}}):a("img",{staticClass:"wheel-img",attrs:{src:"static/img/huigu.png",alt:""}}),t._v(" "),a("span",{staticClass:"wheel-text"},[t._v("谢谢惠顾")])]),t._v(" "),a("div",{staticClass:"wheel-item",on:{click:t.onDraw}},[a("span",{staticClass:"draw-click"},[t._v("点击抽奖")]),t._v(" "),t._m(0)]),t._v(" "),a("div",{staticClass:"wheel-item",class:{active:4==t.activeNum}},[a("img",{staticClass:"wheel-img",attrs:{src:t.wheelData.data.two.imgurl,alt:""}}),t._v(" "),a("span",{staticClass:"wheel-text",style:{color:t.wheelData.data.two.color}},[t._v(t._s(t.wheelData.data.two.text))])]),t._v(" "),a("div",{staticClass:"wheel-item",class:{active:7==t.activeNum}},[a("img",{staticClass:"wheel-img",attrs:{src:t.wheelData.data.three.imgurl,alt:""}}),t._v(" "),a("span",{staticClass:"wheel-text",style:{color:t.wheelData.data.three.color}},[t._v(t._s(t.wheelData.data.three.text))])]),t._v(" "),a("div",{staticClass:"wheel-item thanks",class:{active:6==t.activeNum}},[6==t.activeNum?a("img",{staticClass:"wheel-img",attrs:{src:"static/img/huigu-active.png",alt:""}}):a("img",{staticClass:"wheel-img",attrs:{src:"static/img/huigu.png",alt:""}}),t._v(" "),a("span",{staticClass:"wheel-text"},[t._v("谢谢惠顾")])]),t._v(" "),a("div",{staticClass:"wheel-item thanks",class:{active:5==t.activeNum}},[5==t.activeNum?a("img",{staticClass:"wheel-img",attrs:{src:"static/img/huigu-active.png",alt:""}}):a("img",{staticClass:"wheel-img",attrs:{src:"static/img/huigu.png",alt:""}}),t._v(" "),a("span",{staticClass:"wheel-text"},[t._v("谢谢惠顾")])])]),t._v(" "),a("div",{staticClass:"info-wrap"},[a("router-link",{staticClass:"wrap-head",attrs:{tag:"div",to:t.util.getUrl({path:"/pages/wheel/record"})}},[t._v("查看奖品")]),t._v(" "),a("div",{staticClass:"wrap-text"},[a("div",{staticClass:"wrap-inner"},[t._v("\n\t\t\t\t\t\t1.活动有效时间：\n\t\t\t\t\t\t"),a("span",{staticClass:"activity-info-content"},[t._v(t._s(t.wheelData.params.starttime)+"~"+t._s(t.wheelData.params.endtime))])]),t._v(" "),a("div",{staticClass:"wrap-inner"},[t._v("\n\t\t\t\t\t\t2.活动说明：\n\t\t\t\t\t\t"),a("span",{staticClass:"activity-info-content"},[t._l(t.wheelData.params.desc,function(i){return[t._v("\n\t\t\t\t\t\t\t\t"+t._s(i)),a("br")]})],2)])])],1)])]),t._v(" "),a("transition",{attrs:{name:"loading"}},[t.showPreLoading?a("iloading"):t._e()],1)],1)},staticRenderFns:[function(){var t=this.$createElement,i=this._self._c||t;return i("span",{staticClass:"draw-go"},[i("strong",[this._v("GO!")])])}]};var n=a("VU/8")(e,s,!1,function(t){a("Tuw7")},null,null);i.default=n.exports}});
//# sourceMappingURL=20.681442b562fd8201a774.js.map