webpackJsonp([70],{"2Yga":function(t,a){},kYuw:function(t,a,i){"use strict";Object.defineProperty(a,"__esModule",{value:!0});var e=i("Gu7T"),o=i.n(e),s=i("mvHQ"),d=i.n(s),n=i("woOf"),r=i.n(n),l=i("Dd8w"),c=i.n(l),y=i("NYxO"),u=i("Cz8s"),h=i("kEnp"),g={name:"diyIndex",data:function(){return{id:0,getLocationFail:!1,showPreLoading:!0,styleContent:"#fff",diydata:{diy:{data:{}},storeExtra:{condition:{order:"",mode:"",dis:""},filter_title:"综合排序",multiple:!1,filter:!1},stores:{loading:!0,finished:!1,page:1,psize:5,loaded:0,empty:0,data:[]},popup:{storeSearch:!1},superRedpacketData:{}}}},components:{PublicHeader:u.a,diy:h.a},methods:c()({},Object(y.b)(["setLocation","getLocation","setState"]),{onToggleDiscount:function(t,a){"waimai_stores"==this.diydata.diy.data.items[a].id?this.diydata.diy.data.items[a].data[t].activity.is_show_all=!this.diydata.diy.data.items[a].data[t].activity.is_show_all:this.diydata.stores.data[t].activity.is_show_all=!this.diydata.stores.data[t].activity.is_show_all},onCloseRedpacket:function(){this.diydata.superRedpacketData.is_show=!1,this.diydata.superRedpacketData=r()({},this.diydata.superRedpacketData)},onChangeStoreExtra:function(t){"multiple"==t?(this.diydata.storeExtra.multiple=!0,this.diydata.storeExtra.filter=!1):(this.diydata.storeExtra.multiple=!1,this.diydata.storeExtra.filter=!0),this.diydata.popup.storeSearch=!0},onStoreOrderby:function(t,a,i){if("order"==t)this.diydata.storeExtra.condition.order=a,this.diydata.storeExtra.multiple=!1,this.diydata.storeExtra.filter_title="sailed"!=a&&"distance"!=a?i:"综合排序";else{if("discounts"==t)return this.diydata.storeExtra.condition.dis==a&&(a=""),this.diydata.storeExtra.condition.dis=a,!1;if("mode"==t)return this.diydata.storeExtra.condition.mode==a&&(a=""),this.diydata.storeExtra.condition.mode=a,!1;"clear"==t?(this.diydata.storeExtra.condition.dis="",this.diydata.storeExtra.condition.order="",this.diydata.storeExtra.condition.mode="",this.diydata.storeExtra.filter=!1,this.diydata.storeExtra.filter_title="综合排序"):"finish"==t&&(this.diydata.storeExtra.filter=!1)}this.diydata.popup.storeSearch=!1,this.onGetStore(!0)},onGetStore:function(t){var a=this,i=this;t&&(i.diydata.stores={page:1,psize:20,loaded:0,empty:!1,loading:!0}),i.diydata.stores.loading=!0,this.util.request({url:"wmall/home/index/store",data:{lat:i.locationInfo.location_x,lng:i.locationInfo.location_y,page:i.diydata.stores.page,psize:i.diydata.stores.psize,condition:d()(i.diydata.storeExtra.condition)}}).then(function(e){var s=e.data.message.message;t&&(i.diydata.stores.data=[]),i.diydata.stores.data=[].concat(o()(a.diydata.stores.data),o()(s.stores)),s.pagetotal<=i.diydata.stores.page&&(i.diydata.stores.loaded=1,i.diydata.stores.data.length||(i.diydata.stores.empty=!0),i.diydata.stores.finished=!0),i.diydata.stores.loading=!1,i.diydata.stores.page++,i.diydata.stores.loaded||s.stores.length||a.onGetStore()})},onLoad:function(){var t=this,a=arguments.length>0&&void 0!==arguments[0]&&arguments[0];this.util.request({url:"diypage/diy",data:{id:this.id}}).then(function(i){var e=t;e.showPreLoading=!1;var o=i.data.message;o.errno?e.util.$toast(o.message):(e.diydata.config=o.message.config,e.diydata.diy=o.message.diy,e.diy=o.message.diy,e.title=o.message.diy.data.page.title,e.diydata.superRedpacketData=o.message.superRedpacketData,e.diydata.superRedpacketData.is_show=!0,e.diydata.cart_sum=o.message.cart_sum,e.styleContent={"background-color":diydata.diy.data.page.background},1!=e.diy.is_has_location&&1!=e.diy.is_has_allstore||(e.getLocation(),e.locationInfo.location_x?(e.getLocationFail=!1,e.onGetStore(a)):e.util.getLocation({successLocation:function(t){e.setLocation({last_location_x:t.location_x,location_x:t.location_x,location_y:t.location_y}),1==e.diy.is_has_allstore&&e.onGetStore(a)},successAddress:function(t){e.setLocation({last_location_x:t.location_x,location_x:t.location_x,location_y:t.location_y,address:t.address})},fail:function(t){e.setLocation({last_location_x:0,location_x:0,address:"获取定位失败"}),e.getLocationFail=!0,1==e.diy.is_has_allstore&&e.onGetStore(a)}})))})},onGetCartNums:function(){var t=this;this.util.request({url:"wmall/home/index/cart"}).then(function(a){var i=a.data.message;i.errno?t.util.$toast(i.message):t.diydata.cart_sum=i.message.cart_sum})}}),created:function(){this.$route.query.id?this.id=this.$route.query.id:this.util.$toast("页面不存在！")},computed:c()({},Object(y.c)(["locationInfo"])),activated:function(){if(this.locationInfo.last_location_x!=this.locationInfo.location_x)return this.diydata.storeExtra={condition:{order:"",mode:"",dis:""},filter_title:"综合排序",multiple:!1,filter:!1},void this.onLoad(!0);this.onGetCartNums()},mounted:function(){this.onLoad()}},p={render:function(){var t=this,a=t.$createElement,i=t._self._c||a;return i("div",{attrs:{id:"diy"}},[i("public-header",{attrs:{title:"页面标题"}}),t._v(" "),i("div",{staticClass:"content",style:t.styleContent},[i("diy",{attrs:{diydata:t.diydata,preLoading:t.showPreLoading,getLocationFail:t.getLocationFail},on:{onToggleDiscount:t.onToggleDiscount,onChangeStoreExtra:t.onChangeStoreExtra,onStoreOrderby:t.onStoreOrderby,onGetStore:t.onGetStore,onCloseRedpacket:t.onCloseRedpacket}})],1)],1)},staticRenderFns:[]};var _=i("VU/8")(g,p,!1,function(t){i("2Yga")},null,null);a.default=_.exports}});
//# sourceMappingURL=70.b98817a6e2697056f6d3.js.map