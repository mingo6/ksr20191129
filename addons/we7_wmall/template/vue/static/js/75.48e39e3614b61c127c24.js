webpackJsonp([75],{JU6h:function(t,e,n){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var o=n("mzkE"),i=n("Cz8s"),r={name:"notice",data:function(){return{id:Number,content:String,menufooter:{}}},components:{PublicFooter:o.a,PublicHeader:i.a},methods:{onLoad:function(){var t=this;this.util.request({url:"wmall/home/notice",data:{id:this.id,menufooter:1}}).then(function(e){var n=e.data.message;if(n.errno)return t.util.$toast(n.message),!1;t.content=n.message.content,t.menufooter=window.menufooter})}},created:function(){this.$route.query.id&&(this.id=this.$route.query.id)},mounted:function(){this.onLoad()}},s={render:function(){var t=this.$createElement,e=this._self._c||t;return e("div",{attrs:{id:"notice"}},[e("public-header",{attrs:{title:"公告"}}),this._v(" "),e("public-footer",{attrs:{menufooter:this.menufooter}}),this._v(" "),e("div",{staticClass:"content",domProps:{innerHTML:this._s(this.content)}})],1)},staticRenderFns:[]};var u=n("VU/8")(r,s,!1,function(t){n("PHPZ")},"data-v-2b4e4939",null);e.default=u.exports},PHPZ:function(t,e){}});
//# sourceMappingURL=75.48e39e3614b61c127c24.js.map