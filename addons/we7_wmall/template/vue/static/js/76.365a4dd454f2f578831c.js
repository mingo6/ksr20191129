webpackJsonp([76],{bAng:function(t,e,a){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var i=a("Gu7T"),s=a.n(i),n={components:{PublicHeader:a("Cz8s").a},data:function(){return{spreadid:"spread1",refresh:0,active:0,level1:0,level2:0,down:{min:0,loaded:!1,loading:!1,empty:!1,data:[]}}},computed:{title:function(){return this.title={1:"一级（"+this.level1+"）",2:"二级（"+this.level2+"）"}}},methods:{onLoad:function(){var t=this;if(1==this.refresh&&(this.down={min:0,loaded:!1,loading:!1,empty:!1,data:[]}),this.down.loaded)return!1;this.down.loading=!0,this.util.request({url:"spread/down/index",data:{min:this.down.min,spreadid:this.spreadid}}).then(function(e){var a=e.data.message;t.level1=a.message.level1,t.level2=a.message.level2,t.down.data=[].concat(s()(t.down.data),s()(a.message.members)),t.down.data.length||(t.down.empty=!0),t.down.loading=!1,t.down.min=a.min,a.min||(t.down.loaded=!0),t.refresh=0})},onChangeStatus:function(t,e){this.active!=t&&(this.refresh=1),0==t?this.spreadid="spread1":1==t&&(this.spreadid="spread2"),this.onLoad()}},mounted:function(){this.onLoad()}},d={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{attrs:{id:"spread-down"}},[a("public-header",{attrs:{title:"我的团队"}}),t._v(" "),a("div",{staticClass:"content"},[a("van-tabs",{attrs:{swipeable:""},on:{click:t.onChangeStatus},model:{value:t.active,callback:function(e){t.active=e},expression:"active"}},t._l(2,function(e,i){return a("van-tab",{key:i,attrs:{title:t.title[e]}},[t.down.empty?a("div",{staticClass:"no-data"},[a("div",{staticClass:"bg"}),t._v(" "),a("p",[t._v("暂时没有下线哦～")])]):a("van-list",{attrs:{finished:t.down.loaded,offset:100,"immediate-check":!1},on:{load:t.onLoad},model:{value:t.down.loading,callback:function(e){t.$set(t.down,"loading",e)},expression:"down.loading"}},[a("div",{staticClass:"member-list"},t._l(t.down.data,function(e,i){return a("div",{key:i,staticClass:"item van-hairline--bottom"},[a("div",{staticClass:"left"},[a("div",{staticClass:"user-avatar"},[a("img",{attrs:{src:e.avatar,alt:""}})]),t._v(" "),a("div",{staticClass:"user-info"},[a("div",{staticClass:"user-name"},[t._v(t._s(e.nickname))]),t._v(" "),a("div",{staticClass:"time"},[t._v("注册时间："+t._s(e.addtime))])])]),t._v(" "),a("div",{staticClass:"right van-hairline--left"},[a("div",{staticClass:"price"},[t._v("消费："+t._s(e.price)+"元")]),t._v(" "),a("div",{staticClass:"orders"},[t._v(t._s(e.frquency)+"个订单")])])])}))])],1)}))],1)],1)},staticRenderFns:[]};var l=a("VU/8")(n,d,!1,function(t){a("z+0A")},null,null);e.default=l.exports},"z+0A":function(t,e){}});
//# sourceMappingURL=76.365a4dd454f2f578831c.js.map