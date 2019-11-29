<?php defined('IN_IA') or exit('Access Denied');?><script type="text/html" id="tpl_show_notice">
    <div class="drag" data-itemid="<%itemid%>">
        <div class="fui-notice" style="background: <%style.background%>">
            <div class="image"><img src="<%imgsrc params.iconurl%>" onerror="this.src='../addons/ewei_shopv2/static/images/hotdot.jpg'"></div>
            <div class="icon"><i class="icon icon-notification1" style="font-size: 0.7rem; color: <%style.iconcolor%>;"></i></div>
            <div class="text" style="color: <%style.color%>;">
                <%if params.noticedata=='0'%>这里将读取商城的公告进行滚动显示<%/if%>
                <%if params.noticedata=='1'%>
                <ul>
                    <%each data as item%>
                    <li><%item.title%></li>
                    <%/each%>
                </ul>
                <%/if%>
            </div>
        </div>
    </div>
</script>

<script type="text/html" id="tpl_show_richtext">
    <div class="drag" data-itemid="<%itemid%>">
        <div class="diy-richtext" style="background: <%style.background%>; padding: <%style.padding%>px;">
            <%if params.content%>
            <%=decode(params.content)%>
            <%else%>
            <p><span style="font-size: 20px;">哈喽大家好！这里是『富文本』区域</span></p>
            <p>你可以对文字进行<strong>加粗</strong>、<em>斜体</em>、<span style="text-decoration: underline;">下划线</span>、<span style="text-decoration: line-through;">删除线</span>、文字<span style="color: rgb(0, 176, 240);">颜色</span>、<span style="background-color: rgb(255, 192, 0); color: rgb(255, 255, 255);">背景色</span>、以及字号<span style="font-size: 20px;">大</span><span style="font-size: 14px;">小</span>等简单排版操作。
            </p>
            <p>也可在这里插入图片</p>
            <p><img src="../addons/ewei_shopv2/plugin/diypage/static/images/default/sale-by.png"></p>
            <p style="text-align: left;"><span style="text-align: left;">还可给文字加上<a href="http://www.baidu.com">超级链接</a>，方便用户点击。</span></p>
            <%/if%>
        </div>
    </div>
</script>

<script type="text/html" id="tpl_show_banner">
    <div class="drag" data-itemid="<%itemid%>">
        <div class="diy-banner">
            <%each data as item%>
            <img src="<%imgsrc item.imgurl%>" />
            <%/each%>
            <div class="dots <%style.dotalign||'left'%> <%style.dotstyle||'rectangle'%>" style="padding: 0 <%style.leftright||'10'%>px; bottom: <%style.bottom||'10'%>px; opacity: <%style.opacity||'0.8'%>;">
                <%each data as item%>
                <span style="background: <%style.background||'#000000'%>;"></span>
                <%/each%>
            </div>
        </div>
    </div>
</script>

<script type="text/html" id="tpl_show_title">
    <div class="drag" data-itemid="<%itemid%>">
        <div class="fui-title" style="background: <%style.background||''%>; color: <%style.color||''%>; font-size: <%style.fontsize||'12'%>px; text-align: <%style.textalign||''%>; padding: <%style.paddingtop||'0'%>px <%style.paddingleft||'5'%>px;">
            <%if params.icon%>
            <i class="icon <%params.icon%>"></i>
            <%/if%>
            <%if params.link%>
            <a href="<%params.link%>" style="color: <%style.color||''%>"><%params.title||'请输入标题内容'%></a>
            <%else%>
            <%params.title||'请输入标题内容'%>
            <%/if%>
        </div>
    </div>
</script>

<script type="text/html" id="tpl_show_search">
    <div class="drag" data-itemid="<%itemid%>">
        <div class="diy-search <%style.searchstyle%>" style="background: <%style.background%>; padding: <%style.paddingtop||'10'%>px <%style.paddingleft||'10'%>px;">
            <div class="inner left" style="background: <%style.inputbackground||'#fff'%>;">
                <div class="search-icon" style="color: <%style.iconcolor%>;"><i class="icon icon-search"></i></div>
                <div class="search-input" style="text-align: <%style.textalign%>; color: <%style.color%>;">
                    <span><%params.placeholder%></span>
                </div>
            </div>
        </div>
    </div>
</script>

<script type="text/html" id="tpl_show_line">
    <div class="drag" data-itemid="<%itemid%>">
        <div class="fui-line-diy" style="background: <%style.background%>; padding: <%style.padding%>px 0;">
            <div class="line" style="border-top: <%style.height||'2'%>px <%style.linestyle||'solid'%> <%style.bordercolor||'#000000'%>"></div>
        </div>
    </div>
</script>

<script type="text/html" id="tpl_show_blank">
    <div class="drag" data-itemid="<%itemid%>" style="height: <%style.height%>px; background: <%style.background%>"></div>
</script>

<script type="text/html" id="tpl_show_menu">
    <div class="drag" data-itemid="<%itemid%>">
        <%if data==''%>
        <div class="nochild">您还没有添加图标</div>
        <%else%>
        <div class="fui-icon-group noborder col-<%style.rownum%> <%style.navstyle%> <%if style.showtype>0%>pb10<%/if%>" style="background: <%style.background||'#ffffff'%>">
            <%each data as item%>
            <div class="fui-icon-col">
                <div class="icon"><img src="<%imgsrc item.imgurl%>"></div>
                <div class="text" style="color: <%item.color%>"><%item.text%></div>
            </div>
            <%/each%>
            <%if style.showdot>0&&style.showtype==1%>
            <div class="fui-icon-group-pagination">
                <a class="active"></a>
                <a></a>
            </div>
            <%/if%>
        </div>
        <%/if%>
    </div>
</script>

<script type="text/html" id="tpl_show_menu2">
    <div class="drag" data-itemid="<%itemid%>">
        <div class="fui-menu-group" style="margin-top: <%style.margintop%>px; background: <%style.background%>;">
            <%each data as item%>
            <%if item.text%>
            <a class="fui-menu-item" style="color: <%item.textcolor%>;"><%if item.iconclass%><i class="icon <%item.iconclass%>" style="color: <%item.iconcolor%>;"></i><%/if%> <%item.text%></a>
            <%/if%>
            <%/each%>
        </div>
    </div>
</script>

<script type="text/html" id="tpl_show_picture">
    <div class="drag" data-itemid="<%itemid%>">
        <div class="fui-picture" style="padding-bottom: <%style.paddingtop%>px; background: <%style.background%>;">
            <%each data as item%>
            <div style="display: block; padding: <%style.paddingtop%>px <%style.paddingleft%>px 0;">
                <img src="<%imgsrc item.imgurl%>" />
            </div>
            <%/each%>
        </div>
    </div>
</script>

<script type="text/html" id="tpl_show_picturew">
    <div class="drag" data-itemid="<%itemid%>">
        <%if params.row=='1'%>
        <div class="fui-cube" style="background: <%style.background%>; <%if count(data)==1%>padding: <%style.paddingtop%>px <%style.paddingleft%>px;<%/if%>">
            <%if count(data)==1%>
            <img src="<%imgsrc(toArray(data)[0].imgurl)%>" />
            <%/if%>
            <%if count(data)>1%>
            <div class="fui-cube-left" style="padding: <%style.paddingtop%>px <%style.paddingleft%>px; padding-right: 0;">
                <img src="<%imgsrc(toArray(data)[0].imgurl)%>" />
            </div>
            <div class="fui-cube-right" <%if count(data)==2%> style="padding: <%style.paddingtop%>px <%style.paddingleft%>px;"<%/if%>>
            <%if count(data)==2%>
            <img src="<%imgsrc(toArray(data)[1].imgurl)%>" />
            <%/if%>
            <%if count(data)>2%>
            <div class="fui-cube-right1" style="padding: <%style.paddingtop%>px <%style.paddingleft%>px; padding-bottom: 0;">
                <img src="<%imgsrc(toArray(data)[1].imgurl)%>" />
            </div>
            <div class="fui-cube-right2" <%if count(data)==3%> style="padding: <%style.paddingtop%>px <%style.paddingleft%>px;"<%/if%>>
            <%if count(data)==3%>
            <img src="<%imgsrc(toArray(data)[2].imgurl)%>" />
            <%/if%>
            <%if count(data)>3%>
            <div class="left" style="padding: <%style.paddingtop%>px <%style.paddingleft%>px; padding-right: 0;">
                <img src="<%imgsrc(toArray(data)[2].imgurl)%>" />
            </div>
            <%/if%>
            <%if count(data)>=4%>
            <div class="right" style="padding: <%style.paddingtop%>px <%style.paddingleft%>px;">
                <img src="<%imgsrc(toArray(data)[3].imgurl)%>" />
            </div>
            <%/if%>
        </div>
        <%/if%>
    </div>
    <%/if%>
    </div>
    <%/if%>
    <%if params.row>1%>
    <div class="fui-picturew row-<%params.row%>" style="padding: <%style.paddingtop%>px; <%style.paddingleft%>px; background: <%style.background%>;">
        <%each data as item%>
        <div class="item" style="padding: <%style.paddingtop%>px <%style.paddingleft%>px;">
            <img src="<%imgsrc item.imgurl%>">
        </div>
        <%/each%>

        <%if style.showdot>0&&params.showtype==1%>
        <div class="fui-picturew-pagination">
            <a class="active"></a>
            <a></a>
        </div>
        <%/if%>
    </div>
    <%/if%>

    </div>
</script>

<script type="text/html" id="tpl_show_goods">
    <div class="drag" data-itemid="<%itemid%>">
        <div class="fui-goods-group <%style.liststyle%>" style="background: <%style.background%>;">
            <%if params.goodsdata=='0'%>
            <%each data as item%>
            <div class="fui-goods-item" data-goodsid="<%item.gid%>">
                <div class="image <%if params.showicon=='1'%><%style.iconstyle%><%/if%>" style="background-image: url('<%imgsrc item.thumb%>');"
                     data-text="
                                <%if params.showicon=='1'%>
                                        <%if style.goodsicon=='recommand'%>推荐<%/if%>
                                        <%if style.goodsicon=='hotsale'%>热销<%/if%>
                                        <%if style.goodsicon=='isnew'%>新上<%/if%>
                                        <%if style.goodsicon=='sendfree'%>包邮<%/if%>
                                        <%if style.goodsicon=='istime'%>限时卖<%/if%>
                                        <%if style.goodsicon=='bigsale'%>促销<%/if%>
                                <%/if%>
                        ">
                    <%if params.showicon=='2'%>
                    <div class="goodsicon <%params.iconposition%>"
                    <%if params.iconposition=='left top'%> style="top: <%style.iconpaddingtop%>px; left: <%style.iconpaddingleft%>px; text-align: left;"<%/if%>
                    <%if params.iconposition=='right top'%> style="top: <%style.iconpaddingtop%>px; right: <%style.iconpaddingleft%>px; text-align: right;"<%/if%>
                    <%if params.iconposition=='left bottom'%> style="bottom: <%style.iconpaddingtop%>px; left: <%style.iconpaddingleft%>px; text-align: left;"<%/if%>
                    <%if params.iconposition=='right bottom'%> style="bottom: <%style.iconpaddingtop%>px; right: <%style.iconpaddingleft%>px; text-align: right;"<%/if%>
                    >
                    <%if params.showicon=='1'%>
                    <img src="../addons/ewei_shopv2/plugin/diypage/static/images/default/goodsicon-<%style.goodsicon%>.png" style="width: <%style.iconzoom||'100'%>%;" />
                    <%/if%>

                    <%if params.showicon=='2' && params.goodsiconsrc%>
                    <img src="<%imgsrc params.goodsiconsrc%>" onerror="this.src=''" style="width: <%style.iconzoom||'100'%>%;" />
                    <%/if%>

                </div>
                <%/if%>
            </div>
            <div class="detail">
                <%if params.showtitle=='1'%>
                <div class="name" style="color: <%style.titlecolor%>;">
                    <%if item.bargain>0%>
                    <label style="background-color: <%style.buybtncolor%>; padding: 0px 2px; color: #fff; font-size: 0.6rem">砍价</label>
                    <%/if%>
                    <%if params.goodstype==1 && params.showtag>0%>
                    <label style="background-color: <%style.tagbackground%>; padding: 0px 2px; color: #fff; font-size: 0.6rem">
                        <%if params.showtag==1%>￥69<%/if%>
                        <%if params.showtag==2%><%if item.gtype==1%>商品<%/if%><%if item.gtype==2%>优惠券<%/if%><%if item.gtype==3%>红包<%/if%><%if item.gtype==4%>余额<%/if%><%/if%>
                        <%if params.showtag==3%><%if item.ctype==1%>抽奖<%else%>兑换<%/if%><%/if%>
                    </label>
                    <%/if%>
                    <%item.title%>
                </div>
                <%/if%>
                <%if params.showprice=='1'%>
                <p class="productprice  <%if (params.showproductprice !=1) && (params.showsales !=1)%>noheight<%/if%>" >
                    <%if params.showproductprice==1 && item.productprice>0%>
                    <span style="color: <%style.productpricecolor%>;"><%params.productpricetext||'原价'%>:<span <%if params.productpriceline==1%>style="text-decoration: line-through;"<%/if%>>￥<%item.productprice%></span></span>
                    <%/if%>
                    <%if params.showsales==1&&item.sales>=0%>
                    <span style="color: <%style.salescolor%>;"><%params.salestext||'销量'%>:<%item.sales%></span>
                    <%/if%>
                </p>
                <div class="price">
                                    <span class="text" style="color: <%style.pricecolor%>;">
                                        <p class="minprice">
                                            <%if params.goodstype==0||!params.goodstype%>
                                            ￥<%item.price%>
                                            <%else%>
                                            <%if item.price==0&&item.credit==0%>免费<%/if%>
                                            <%if item.price>0&&item.credit==0%><%item.price%><small>元</small><%/if%>
                                            <%if item.price==0&&item.credit>0%><%item.credit%><small>积分</small><%/if%>
                                            <%if item.price>0&&item.credit>0%><%item.credit%><small>积分</small>+<%item.price%><small>元</small><%/if%>
                                            <%/if%>
                                        </p>


                                    </span>
                    <%if style.buystyle!='' && item.bargain==0 && (params.goodstype==0||!params.goodstype)%>
                    <%if style.buystyle=='buybtn-1'%>
                    <span class="buy" style="border-color: <%style.buybtncolor%>;color:<%style.buybtncolor%> ">购买</span>
                    <%/if%>
                    <%if style.buystyle=='buybtn-2'%>
                    <span class="buy buy buybtn-2" style="border-color: <%style.buybtncolor%>;background-color: <%style.buybtncolor%>;">购买</span>
                    <%/if%>
                    <%if style.buystyle=='buybtn-3'%>
                    <span class="buy buybtn-3" style="background-color: <%style.buybtncolor%>; border-color: <%style.buybtncolor%>;"><i class="icon icon-cartfill"></i></span>
                    <%/if%>
                    <%if style.buystyle=='buybtn-4'%>
                    <span class="buy buybtn-4" style="border-color: <%style.buybtncolor%>;"><i class="icon icon-cart" style="color: <%style.buybtncolor%>;"></i></span>
                    <%/if%>
                    <%if style.buystyle=='buybtn-5'%>
                    <span class="buy buybtn-5" style="border-color: <%style.buybtncolor%>;"><i class="icon icon-add" style="color: <%style.buybtncolor%>;"></i></span>
                    <%/if%>
                    <%if style.buystyle=='buybtn-6'%>
                    <span class="buy buybtn-6" style="background-color: <%style.buybtncolor%>; border-color: <%style.buybtncolor%>;"><i class="icon icon-add"></i></span>
                    <%/if%>
                    <%/if%>
                    <%if item.bargain>0%>
                    <span class="buy" style="background-color: <%style.buybtncolor%>;">砍</span>
                    <%/if%>
                    <%if params.goodstype==1%>
                    <span class="buy buybtn-3" style="background-color: <%style.buybtncolor%>;"><%if item.ctype==1%>抽奖<%else%>兑换<%/if%></span>
                    <%/if%>
                </div>
                <%/if%>
            </div>

            <%if params.saleout>-1%>
            <%if params.saleout==0%><div class="salez" style="background-image: url('<?php  echo tomedia($_W['shopset']['shop']['saleout'])?>'); "></div><%/if%>
            <%if params.saleout==1%><div class="salez diy" style="background-image: url('../addons/ewei_shopv2/plugin/diypage/static/images/default/saleout-<%style.saleoutstyle%>.png'); "></div><%/if%>
            <%/if%>
        </div>
        <%/each%>
        <%/if%>
        <%if params.goodsdata>0%>
        <%each data=["c","d"] as item%>
        <div class="fui-goods-item">
            <div class="image <%if params.showicon=='1'%><%style.iconstyle%><%/if%>" style="background-image: url('../addons/ewei_shopv2/plugin/diypage/static/images/default/goods-1.jpg');"
                 data-text="
                                <%if params.showicon=='1'%>
                                        <%if style.goodsicon=='recommand'%>推荐<%/if%>
                                        <%if style.goodsicon=='hotsale'%>热销<%/if%>
                                        <%if style.goodsicon=='isnew'%>新上<%/if%>
                                        <%if style.goodsicon=='sendfree'%>包邮<%/if%>
                                        <%if style.goodsicon=='istime'%>限时卖<%/if%>
                                        <%if style.goodsicon=='bigsale'%>促销<%/if%>
                                <%/if%>
                        ">
                <%if params.showicon=='2'%>
                <div class="goodsicon <%params.iconposition%>"
                <%if params.iconposition=='left top'%> style="top: <%style.iconpaddingtop%>px; left: <%style.iconpaddingleft%>px; text-align: left;"<%/if%>
                <%if params.iconposition=='right top'%> style="top: <%style.iconpaddingtop%>px; right: <%style.iconpaddingleft%>px; text-align: right;"<%/if%>
                <%if params.iconposition=='left bottom'%> style="bottom: <%style.iconpaddingtop%>px; left: <%style.iconpaddingleft%>px; text-align: left;"<%/if%>
                <%if params.iconposition=='right bottom'%> style="bottom: <%style.iconpaddingtop%>px; right: <%style.iconpaddingleft%>px; text-align: right;"<%/if%>
                >
                <%if params.showicon=='1'%>
                <img src="../addons/ewei_shopv2/plugin/diypage/static/images/default/goodsicon-<%style.goodsicon%>.png" style="width: <%style.iconzoom||'100'%>%;" />
                <%/if%>

                <%if params.showicon=='2' && params.goodsiconsrc%>
                <img src="<%imgsrc params.goodsiconsrc%>" onerror="this.src=''" style="width: <%style.iconzoom||'100'%>%;" />
                <%/if%>
            </div>
            <%/if%>
        </div>
        <div class="detail">
            <%if params.showtitle=='1'%>
            <div class="name">
                <%if params.goodstype==1 && params.showtag>0%>
                <label style="background-color: <%style.tagbackground%>; padding: 0px 2px; color: #fff; font-size: 0.6rem">
                    <%if params.showtag==1%>￥69<%/if%>
                    <%if params.showtag==2%>优惠券<%/if%>
                    <%if params.showtag==3%><%if item.ctype==1%>抽奖<%else%>兑换<%/if%><%/if%>
                </label>
                <%/if%>
                这里是商品标题(商品从设定<%if params.goodsdata=='1'%>分类<%/if%><%if params.goodsdata=='2'%>分组<%/if%><%if params.goodsdata=='3'%>新品商品<%/if%><%if params.goodsdata=='4'%>热卖商品<%/if%><%if params.goodsdata=='5'%>推荐商品<%/if%><%if params.goodsdata=='6'%>促销商品<%/if%><%if params.goodsdata=='7'%>包邮商品<%/if%><%if params.goodsdata=='8'%>限时卖商品<%/if%><%if params.goodsdata=='9'%>积分兑换商品<%/if%><%if params.goodsdata=='10'%>积分抽奖商品<%/if%>读取)</div>
            <%/if%>
            <%if params.showprice=='1'%>
            <p class="productprice <%if (params.showproductprice !=1) && (params.showsales !=1)%>noheight<%/if%>">
                <%if (params.showproductprice==1)||(params.showsales==1)%>
                <%if params.showproductprice==1%>
                <span style="color: <%style.productpricecolor%>;"><%params.productpricetext||'原价'%>:<span <%if params.productpriceline=='1'%>style="text-decoration: line-through;"<%/if%>>￥99</span></span>
                <%/if%>
                <%if params.showsales==1%>
                <span style="color: <%style.salescolor%>;"><%params.salestext||'销量'%>:99</span>
                <%/if%>
                <%/if%>
            </p>
            <div class="price">
                                    <span class="text" style="color: <%style.pricecolor%>;">
                                        <p class="minprice">
                                            <%if params.goodstype==0||!params.goodstype%>
                                            ￥20.00
                                            <%else%>
                                            10<small>积分</small>+20<small>元</small>
                                            <%/if%>
                                        </p>
                                    </span>
                <%if style.buystyle!='' && (params.goodstype==0||!params.goodstype)%>
                <%if style.buystyle=='buybtn-1'%>
                <span class="buy" style="border-color: <%style.buybtncolor%>;color:<%style.buybtncolor%> ">购买</span>
                <%/if%>
                <%if style.buystyle=='buybtn-2'%>
                <span class="buy buy buybtn-2" style="border-color: <%style.buybtncolor%>;background-color: <%style.buybtncolor%>;">购买</span>
                <%/if%>
                <%if style.buystyle=='buybtn-3'%>
                <span class="buy buybtn-3" style="background-color: <%style.buybtncolor%>; border-color: <%style.buybtncolor%>;"><i class="icon icon-cartfill"></i></span>
                <%/if%>
                <%if style.buystyle=='buybtn-4'%>
                <span class="buy buybtn-4" style="border-color: <%style.buybtncolor%>;"><i class="icon icon-cart" style="color: <%style.buybtncolor%>;"></i></span>
                <%/if%>
                <%if style.buystyle=='buybtn-5'%>
                <span class="buy buybtn-5" style="border-color: <%style.buybtncolor%>;"><i class="icon icon-add" style="color: <%style.buybtncolor%>;"></i></span>
                <%/if%>
                <%if style.buystyle=='buybtn-6'%>
                <span class="buy buybtn-6" style="background-color: <%style.buybtncolor%>; border-color: <%style.buybtncolor%>;"><i class="icon icon-add"></i></span>
                <%/if%>
                <%/if%>
                <%if params.goodstype==1%>
                <span class="buy buybtn-3" style="background-color: <%style.buybtncolor%>;">兑换</span>
                <%/if%>
            </div>
            <%/if%>
        </div>

        <%if params.saleout>-1%>
        <%if params.saleout==0%><div class="salez" style="background-image: url('<?php  echo tomedia($_W['shopset']['shop']['saleout'])?>'); "></div><%/if%>
        <%if params.saleout==1%><div class="salez diy" style="background-image: url('../addons/ewei_shopv2/plugin/diypage/static/images/default/saleout-<%style.saleoutstyle%>.png'); "></div><%/if%>
        <%/if%>
    </div>
    <%/each%>
    <%/if%>
    </div>
    </div>
</script>

<script type="text/html" id="tpl_show_diymod">
    <div class="drag" data-itemid="<%itemid%>">
        <div style="padding: 10px; font-size: 14px;">公用模块：<%params.modname%></div>
    </div>
</script>

<script type="text/html" id="tpl_show_listmenu">
    <div class="drag" data-itemid="<%itemid%>">
        <div class="fui-cell-group fui-cell-click" style="margin-top: <%style.margintop%>px; background-color: <%style.background%>;">
            <%each data as item%>
            <div class="fui-cell">
                <%if item.iconclass%>
                <div class="fui-cell-icon" style="color: <%style.iconcolor%>;"><i class="icon <%item.iconclass%>"></i></div>
                <%/if%>
                <div class="fui-cell-text" style="color: <%style.textcolor%>;"><%item.text%></div>
                <div class="fui-cell-remark" style="color: <%style.remarkcolor%>;"><%item.remark%></div>
            </div>
            <%/each%>
        </div>
    </div>
</script>

<script type="text/html" id="tpl_show_member">
    <div class="drag" data-itemid="<%itemid%>">
        <%if params.style=='default1'%>
        <div class="headinfo" style="background: <%style.background%>; <%if style.background%>border: none;<%/if%>">
            <div class="setbtn" style="color: <%style.textcolor%>;"><i class="icon <%params.seticon%>"></i></div>
            <div class="child">
                <div class="title" style="color: <%style.textcolor%>;">余额</div>
                <div class="num" style="color: <%style.textlight%>;">123.50</div>
                <%if params.leftnav%>
                <div class="btn" style="color: <%style.textcolor%>; border-color: <%style.textcolor%>;"><%params.leftnav%></div>
                <%/if%>
            </div>
            <div class="child userinfo" style="color: <%style.textcolor%>;">
                <div class="face <%style.headstyle%>"><img src="../addons/ewei_shopv2/static/images/nopic100.jpg"></div>
                <div class="name">用户昵称</div>
                <div class="level">[用户等级] <i class="icon icon-question1" style="font-size: 12px;"></i></div>
            </div>
            <div class="child">
                <div class="title" style="color: <%style.textcolor%>;">积分</div>
                <div class="num" style="color: <%style.textlight%>;">54321</div>
                <%if params.rightnav%>
                <div class="btn" style="color: <%style.textcolor%>; border-color: <%style.textcolor%>;"><%params.rightnav%></div>
                <%/if%>
            </div>
        </div>
        <%/if%>
        <%if params.style=='default2'%>
        <div class="headinfo style-2" style="background: <%style.background%>; <%if style.background%>border: none;<%/if%>">
            <div class="setbtn" style="color: <%style.textcolor%>;"><i class="icon <%params.seticon%>"></i></div>
            <div class="face <%style.headstyle%>"><img src="../addons/ewei_shopv2/static/images/nopic100.jpg"></div>
            <div class="inner" style="color: <%style.textcolor%>;">
                <div class="name">Change.</div>
                <div class="level">[用户等级] <i class="icon icon-question1" style="font-size: 12px;"></i></div>
                <div class="credit">余额: <span style="color: <%style.textlight%>;">123.50</span></div>
                <div class="credit">积分: <span style="color: <%style.textlight%>;">54321</span></div>
            </div>
        </div>
        <%/if%>
    </div>
</script>

<script type="text/html" id="tpl_show_icongroup">
    <div class="drag" data-itemid="<%itemid%>">
        <div class="fui-icon-group noborder col-<%params.rownum%> selecter" style="background-color: <%style.background%>; <%if params.bordertop=='1'%>border-top: 1px solid <%style.bordercolor%>;<%else%>border-top: none;<%/if%> <%if params.borderbottom=='1'%>border-bottom: 1px solid <%style.bordercolor%>;<%else%>border-bottom: none;<%/if%>">
            <%define index=0%>
            <%each data as child itemid %>
            <div class="fui-icon-col external" style="<%if params.border=='1'&&index>0%>border-left: 1px solid <%style.bordercolor%>;<%else%>border-left: none;<%/if%>">
                <div class="badge" style="background-color: <%style.dotcolor%>;">9</div>
                <div class="icon icon-green radius"><i class="icon <%child.iconclass%>" style="color: <%style.iconcolor%>;"></i></div>
                <div class="text" style="color: <%style.textcolor%>;"><%child.text%></div>
            </div>
            <%define index++%>
            <%/each%>
        </div>
    </div>
</script>

<script type="text/html" id="tpl_show_bindmobile">
    <div class="drag" data-itemid="<%itemid%>">
        <div class="fui-cell-group fui-cell-click" style="margin-top: <%style.margintop%>px; background-color: <%style.background%>;">
            <div class="fui-cell">
                <div class="fui-cell-text" style="color: <%style.titlecolor%>;">
                    <%if params.iconclass%>
                    <i class="icon <%params.iconclass%>" style="color: <%style.iconcolor%>;"></i>
                    <%/if%>
                    <%params.title%>
                    <%if params.text%>
                    <div class="" style="color: <%style.textcolor%>;font-size: 12px;"><%params.text%></div>
                    <%/if%>
                </div>
                <div class="fui-cell-remark"></div>
            </div>

        </div>
    </div>
</script>

<script type="text/html" id="tpl_show_logout">
    <div class="drag" data-itemid="<%itemid%>">
        <div class="fui-cell-group fui-cell-click transparent" style="margin-top: <%style.margintop%>px;">
            <div class="fui-cell external changepwd">
                <div class="fui-cell-text" style="text-align: center; border-color: <%style.maincolor%>;color:<%style.maincolor%>;background:<%style.subcolor%> "><p>修改密码</p></div>
            </div>
            <div class="fui-cell external btn-logout">
                <div class="fui-cell-text" style="text-align: center; color:<%style.subcolor%>;background: <%style.maincolor%>;color: <%style.maincolor%>;"><p>退出登录</p></div>
            </div>
        </div>
    </div>
</script>

<script type="text/html" id="tpl_show_memberc">
    <div class="drag" data-itemid="<%itemid%>">
        <%if params.style=='default1'%>
        <div class="headinfo commission" style="background-color: <%style.background%>;">
            <div class="userinfo" style="border-bottom: 1px solid <%style.textcolor%>;">
                <div class="fui-list">
                    <div class="fui-list-media"><img src="../addons/ewei_shopv2/static/images/nopic100.jpg"></div>
                    <div class="fui-list-info">
                        <div class="title" style="color: <%style.textcolor%>;">用户昵称</div>
                        <div class="subtitle" style="color: <%style.textlight%>;">&lt;分销商等级&gt;</div>
                        <%if params.hideup==0 || !params.hideup%>
                        <div class="text" style="color: <%style.textcolor%>;">推荐人: 总店</div>
                        <%/if%>
                    </div>
                </div>
                <%if params.seticon%>
                <div class="setbtn"><i class="icon <%params.seticon%>"></i></div>
                <%/if%>
            </div>
            <div class="userblock">
                <div class="line total">
                    <div class="title" style="color: <%style.textcolor%>;">成功提现佣金(元)</div>
                    <div class="num" style="color: <%style.textcolor%>;">0.00</div>
                </div>
                <div class="line usable">
                    <%if params.centernav%>
                    <div class="btn"><%params.centernav%></div>
                    <%/if%>
                    <div class="text">
                        <div class="title" style="color: <%style.textcolor%>;">可提现佣金(元)</div>
                        <div class="num" style="color: <%style.textcolor%>;">0.00</div>
                    </div>
                </div>
            </div>
        </div>
        <%/if%>
        <%if params.style=='default2'%>
        <div class="headinfo" style="background: <%style.background%>; <%if style.background%>border: none;<%/if%>">
            <div class="setbtn" style="color: <%style.textcolor%>;"><i class="icon <%params.seticon%>"></i></div>
            <div class="child">
                <div class="title" style="color: <%style.textcolor%>;">成功提现佣金</div>
                <div class="num" style="color: <%style.textlight%>;">123.50</div>
                <%if params.leftnav%>
                <div class="btn" style="color: <%style.textcolor%>; border-color: <%style.textcolor%>;"><%params.leftnav%></div>
                <%/if%>
            </div>
            <div class="child userinfo" style="color: <%style.textcolor%>;">
                <div class="face <%style.headstyle%>"><img src="../addons/ewei_shopv2/static/images/nopic100.jpg"></div>
                <div class="name">用户昵称</div>
                <div class="level">[分销商等级]</div>
                <%if params.hideup==0 || !params.hideup%>
                <div class="level">推荐人: 总店</div>
                <%/if%>
            </div>
            <div class="child">
                <div class="title" style="color: <%style.textcolor%>;">可提现佣金</div>
                <div class="num" style="color: <%style.textlight%>;">54321</div>
                <%if params.rightnav%>
                <div class="btn" style="color: <%style.textcolor%>; border-color: <%style.textcolor%>;"><%params.rightnav%></div>
                <%/if%>
            </div>
        </div>
        <%/if%>
    </div>
</script>

<script type="text/html" id="tpl_show_blockgroup">
    <div class="drag" data-itemid="<%itemid%>">
        <div class="fui-block-group col-<%params.rownum%>" style="margin-top:0; overflow: hidden; background-color: <%style.background%>;">
            <%each data as item%>
            <div class="fui-block-child" style="background-color: <%style.background%>;">
                <div class="icon" style="color: <%item.iconcolor%>;"><i class="icon <%item.iconclass%>"></i></div>
                <div class="title" style="color: <%item.textcolor%>;"><%item.text%></div>
                <div class="text">
                    <%if item.tipnum%>
                    <span style="color: <%style.tipcolor%>"><%item.tipnum%></span> <%item.tiptext%>
                    <%/if%>
                </div>
            </div>
            <%/each%>
        </div>
    </div>
</script>

<!-- 商品详情页 -->
<script type="text/html" id="tpl_show_detail_tab">
    <div class="drag fixed nodelete" data-itemid="<%itemid%>">
        <div class="fui-tab fui-tab-danger" style="background: <%style.background%>">
            <nav class="tab active" style="color: <%style.activecolor%>; border-color: <%style.activecolor%>;"><%params.goodstext||'商品'%></nav>
            <nav class="tab" style="color: <%style.textcolor%>;"><%params.detailtext||'详情'%></nav>
            <nav class="tab" style="color: <%style.textcolor%>;">参数</nav>
            <nav class="tab" style="color: <%style.textcolor%>;">评价</nav>
        </div>
    </div>
</script>

<script type="text/html" id="tpl_show_detail_swipe">
    <div class="drag" data-itemid="<%itemid%>">
        <div class="diy-swipe">
            <img src="../addons/ewei_shopv2/plugin/diypage/static/template/detail1/goods.jpg">
            <div class="dots <%style.dotalign||'left'%> <%style.dotstyle||'rectangle'%>" style="padding: 0 <%style.leftright||'10'%>px; bottom: <%style.bottom||'10'%>px; opacity: <%style.opacity||'0.8'%>;">
                <span style="background: <%style.background||'#000000'%>;"></span>
                <span style="background: <%style.background||'#000000'%>;"></span>
                <span style="background: <%style.background||'#000000'%>;"></span>
            </div>
        </div>
    </div>
</script>

<script type="text/html" id="tpl_show_detail_info">
    <div class="drag" data-itemid="<%itemid%>">
        <div class="fui-cell-group fui-detail-group" style="background: <%style.background%>; margin-top: <%style.margintop%>px; margin-bottom: <%style.marginbottom%>px;">
            <div class="fui-cell">
                <div class="fui-cell-text name" style="color: <%style.titlecolor%>;">新款个性创意iphone6s手机壳磨砂苹果6情侣保护套i6日韩国简约潮</div>
                <%if params.hideshare=='0'||!params.hideshare%>
                <a class="fui-cell-remark share" id="btn-share" style="color: #ff5555">
                    <i class="icon <%params.share_icon||'icon-share'%>"></i>
                    <p><%params.share%></p>
                </a>
                <%/if%>
            </div>
            <div class="fui-cell goods-subtitle">
                <span class="" style="color:<%style.subtitlecolor%>;">四角防摔气囊，送纳米防爆膜</span>
            </div>
            <div class="fui-cell">
                <div class="fui-cell-text price">
                    <span class="text-danger" style="color: <%style.pricecolor%>;">￥58 <span class="original" style="color: <%style.textcolor%>;">￥128</span></span>
                </div>
            </div>
            <div class="fui-cell"style="padding-bottom: 4px">
                <div class="fui-labeltext fui-labeltext-danger" style="border-color: <%style.timecolor%>;">
                    <div class="label" style="font-size: 14px; height: 1.45rem; background: <%style.timecolor%>;">距离限时购结束</div>
                    <div class="text"><span class="day number" style="color: <%style.timetextcolor%>;">0</span><span class="time">天</span><span class="hour number" style="color: <%style.timetextcolor%>;">04</span><span class="time">小时</span><span class="minute number" style="color: <%style.timetextcolor%>;">32</span><span class="time">分</span><span class="second number" style="color: <%style.timetextcolor%>;">26</span><span class="time">秒</span>
                    </div>
                </div>
            </div>
            <div class="fui-cell">
                <div class="fui-cell-text flex" style="color: <%style.textcolor%>;">
                    <span>快递:  10.00</span>
                    <span>销量:  3,663 件</span>
                    <span>山东 济南</span>
                </div>
            </div>

            <div class="fui-cell">
                <div class="fui-cell-text" style="color: <%style.textcolor%>;">
                    <label class="label label-default">预售</label> 预计发货时间：购买后<span class="text-danger" style="color: <%style.textcolorhigh%>;"> 7 </span>天发货</div>
            </div>
        </div>
    </div>
</script>

<script type="text/html" id="tpl_show_detail_sale">
    <div class="drag" data-itemid="<%itemid%>">
        <div class="fui-cell-group fui-cell-click  fui-sale-group" style="background: <%style.background%>; margin-top: <%style.margintop%>px; margin-bottom: <%style.marginbottom%>px;">

            <div class="fui-cell">
                <div class="fui-cell-text" style="color: <%style.textcolor%>;">
                    <span style="margin-right: 0.6rem">优惠券</span>
                    <span class="coupon-mini" style="background: <%style.textcolorhigh%>;">¥50</span>
                    <span class="coupon-mini" style="background: <%style.textcolorhigh%>;">¥50</span>
                    <span class="coupon-mini" style="background: <%style.textcolorhigh%>;">¥50</span>
                </div>
                <div class="fui-cell-remark"></div>
            </div>

            <div class="fui-cell">
                <div class="fui-cell-label top" style="color: <%style.textcolor%>;">会员</div>
                <div class="fui-cell-text" style="color: <%style.textcolor%>;">
                    <div class="sale-line">
                        <span class="sale-tip" style="border-color: <%style.textcolorhigh%>; color: <%style.textcolorhigh%>;">VIP </span>
                        <span>可享受 <span class="text-danger" style="color: <%style.textcolorhigh%> !important;">￥10</span> 的价格</span>
                    </div>
                </div>
            </div>

            <div class="fui-cell">
                <div class="fui-cell-label top" style="color: <%style.textcolor%>;">活动</div>
                <div class="fui-cell-text" style="color: <%style.textcolor%>;">
                    <div class="sale-line">
                        <span class="sale-tip" style="border-color: <%style.textcolorhigh%>; color: <%style.textcolorhigh%>;">满减 </span>
                        <span>全场满<span class="text-danger" style="color: <%style.textcolorhigh%> !important;">&yen;100</span>立减<span class="text-danger" style="color: <%style.textcolorhigh%> !important;">&yen;10</span></span>
                    </div>
                    <div class="sale-line">
                        <span class="sale-tip" style="border-color: <%style.textcolorhigh%>; color: <%style.textcolorhigh%>;">包邮</span>
                        <span>全场满<span class="text-danger" style="color: <%style.textcolorhigh%> !important;">&yen;100</span>包邮</span>
                    </div>
                    <div class="sale-line">
                        <span class="sale-tip" style="border-color: <%style.textcolorhigh%>; color: <%style.textcolorhigh%>;">积分</span>
                        <span>购买赠送<span class="text-danger" style="color: <%style.textcolorhigh%> !important;">10</span>积分</span>
                    </div>
                    <div class="sale-line">
                        <span class="sale-tip" style="border-color: <%style.textcolorhigh%>; color: <%style.textcolorhigh%>;">复购</span>
                        <span>此商品重复购买可享受<span class="text-danger" style="color: <%style.textcolorhigh%> !important;">8</span>折优惠</span>
                    </div>
                    <div class="sale-line">
                        <span class="sale-tip" style="border-color: <%style.textcolorhigh%>; color: <%style.textcolorhigh%>;">全返</span>
                        <span>此商品享受<span class="text-danger" style="color: <%style.textcolorhigh%> !important;">&yen;100</span>的全返</span>
                    </div>
                </div>
                <div class="fui-cell-remark"></div>
            </div>
            <div class="fui-cell">
                <div class="fui-cell-label" style="color: <%style.textcolor%>;">赠品</div>
                <div class="fui-cell-text" style="color: <%style.textcolor%>;">赠品名称</div>
                <div class="fui-cell-remark"></div>
            </div>

            <div class="fui-cell" style="background: #fafafa;">
                <div class="fui-cell-text">
                    <span class="label label-danger" style="border-radius: 5px;">货到付款</span>
                    <span class="label label-danger" style="border-radius: 5px;">正品保证</span>
                    <span class="label label-danger" style="border-radius: 5px;">保修</span>
                    <span class="label label-danger" style="border-radius: 5px;">发票</span>
                </div>
            </div>
        </div>

        <div class="fui-cell-group fui-cell-click">
            <div class="fui-cell">
                <div class="fui-cell-label" style="width: 60px;">配送区域</div>
                <div class="fui-cell-text">山东、山西、陕西</div>
                <div class="fui-cell-remark"></div>
            </div>
        </div>
    </div>
</script>

<script type="text/html" id="tpl_show_detail_spec">
    <div class="drag" data-itemid="<%itemid%>">
        <div class="fui-cell-group fui-cell-click" style="background: <%style.background%>; margin-top: <%style.margintop%>px; margin-bottom: <%style.marginbottom%>px;">
            <div class="fui-cell">
                <div class="fui-cell-text option-selector" style="color: <%style.textcolor%>;">请选择颜色、分类等</div>
                <div class="fui-cell-remark"></div>
            </div>
        </div>
    </div>
</script>

<script type="text/html" id="tpl_show_detail_navbar">
    <div class="drag fixed nodelete" data-itemid="<%itemid%>">
        <div class="fui-navbar bottom-buttons" style="background: <%style.background%>;">
            <%if params.hidelike<1%>
            <%if params.hidelike==0%><%define iconclass="icon-like"%><%define icontext="关注"%><%/if%>
            <%if params.hidelike==-1%><%define iconclass="icon-shop"%><%define icontext="店铺"%><%/if%>
            <%if params.hidelike==-2%><%define iconclass="icon-cart"%><%define icontext="购物车"%><%/if%>
            <%if params.hidelike==-3%><%define iconclass=params.likeiconclass||'icon-like'%><%define icontext=params.liketext||'关注'%><%/if%>
            <nav class="nav-item ">
                <span class="icon <%iconclass%>" style="color: <%style.iconcolor%>;"></span>
                <span class="label" style="color: <%style.textcolor%>;"><%icontext%></span>
            </nav>
            <%/if%>
            <%if params.hideshop<1%>
            <%if params.hideshop==0%><%define iconclass="icon-shop"%><%define icontext="店铺"%><%/if%>
            <%if params.hideshop==-1%><%define iconclass="icon-like"%><%define icontext="关注"%><%/if%>
            <%if params.hideshop==-2%><%define iconclass="icon-cart"%><%define icontext="购物车"%><%/if%>
            <%if params.hideshop==-3%><%define iconclass=params.shopiconclass||'icon-shop'%><%define icontext=params.shoptext||'店铺'%><%/if%>
            <nav class="nav-item">
                <span class="icon <%iconclass%>" style="color: <%style.iconcolor%>;"></span>
                <span class="label" style="color: <%style.textcolor%>;"><%icontext%></span>
            </nav>
            <%/if%>
            <%if params.hidecart<1%>
            <%if params.hidecart==0%><%define iconclass="icon-cart"%><%define icontext="购物车"%><%/if%>
            <%if params.hidecart==-1%><%define iconclass="icon-like"%><%define icontext="关注"%><%/if%>
            <%if params.hidecart==-2%><%define iconclass="icon-shop"%><%define icontext="店铺"%><%/if%>
            <%if params.hidecart==-3%><%define iconclass=params.carticonclass||'icon-cart'%><%define icontext=params.carttext||'购物车'%><%/if%>
            <nav class="nav-item">
                <%if params.hidecart==0%>
                <span class="badge" style="background: <%style.dotcolor%>;">3</span>
                <%/if%>
                <span class="icon <%iconclass%>" style="color: <%style.iconcolor%>;"></span>
                <span class="label" style="color: <%style.textcolor%>;"><%icontext%></span>
            </nav>
            <%/if%>
            <%if params.hidecartbtn==0%>
            <nav class="nav-item btn cartbtn" style="background: <%style.cartcolor%>;">加入购物车</nav>
            <%/if%>
            <nav class="nav-item btn buybtn" style="background: <%style.buycolor%>;"><%params.textbuy||'立刻购买'%></nav>
        </div>
    </div>
</script>

<script type="text/html" id="tpl_show_detail_shop">
    <div class="drag" data-itemid="<%itemid%>">
        <div class="fui-cell-group fui-shop-group" style="background: <%style.background%>; margin-top: <%style.margintop%>px; margin-bottom: <%style.marginbottom%>px;">
            <div class="fui-list">
                <div class="fui-list-media <%params.logostyle%>">
                    <img src="<%imgsrc params.shoplogo||'../addons/ewei_shopv2/static/images/designer.jpg'%>">
                </div>
                <div class="fui-list-inner">
                    <div class="title" style="color: <%style.shopnamecolor%>;"><%params.shopname||'XX商城'%></div>
                    <div class="subtitle" style="color: <%style.shopdesccolor%>;"><%params.shopdesc||'这里是XX商城简介商城简介商城简介商城简介商城简介'%></div>
                </div>
                <div class="fui-list-angle" style="margin-right: 0">
                    <a class="btn" style="border-color: <%style.rightnavcolor%>; color: <%style.rightnavcolor%>;padding: 6px 10px;font-size: 12px"><%params.rightnavtext%></a>
                </div>
            </div>
        </div>
    </div>
</script>

<script type="text/html" id="tpl_show_detail_comment">
    <div class="drag" data-itemid="<%itemid%>">
        <div class="fui-cell-group fui-comment-group" style="margin-top: <%style.margintop%>px; margin-bottom: <%style.marginbottom%>px; background: <%style.background%>;">
            <div class="fui-cell fui-cell-click">
                <div class="fui-cell-text desc" style="color: <%style.subcolor%>;">评价(1)</div>
                <div class="fui-cell-text desc label" style="color: <%style.subcolor%>;"><span style="color: <%style.maincolor%>;">100%</span> 好评</div>
                <div class="fui-cell-remark"></div>
            </div>
            <div class="fui-cell" style="padding: 0 0.5rem 0.5rem;">
                <div class="fui-cell-text comment " style="padding-top: 0.5rem">
                    <div class="info">
                        <div class="star">
                            <span class="shine" style="color: <%style.maincolor%>;">★</span>
                            <span class="shine" style="color: <%style.maincolor%>;">★</span>
                            <span class="shine" style="color: <%style.maincolor%>;">★</span>
                            <span class="shine" style="color: <%style.maincolor%>;">★</span>
                            <span class="shine" style="color: <%style.maincolor%>;">★</span>
                        </div>
                        <div class="date" style="color: <%style.subcolor%>;">用户** 2016-10-25 17:09</div>
                    </div>
                    <div class="remark" style="color: <%style.textcolor%>;">商品很不错！我很喜欢！必须5星好评！</div>
                </div>
            </div>
            <div class="show-allshop">
                <span class="btn">查看全部评价</span>
            </div>
        </div>
    </div>
</script>

<script type="text/html" id="tpl_show_detail_pullup">
    <div class="drag fixed" data-itemid="<%itemid%>">
        <div class="fui-cell-group" style="margin-top: <%style.margintop%>px; background: <%style.background%>;">
            <div class="fui-cell">
                <div class="fui-cell-text text-center look-detail" style="color: <%style.textcolor%>;"><i class="icon icon-fold"></i> <span>上拉查看图文详情</span></div>
            </div>
        </div>
    </div>
</script>

<script type="text/html" id="tpl_show_detail_buyshow">
    <div class="drag" data-itemid="<%itemid%>">
        <div class="fui-cell-group" style="margin-top: <%style.margintop%>px; margin-bottom: <%style.marginbottom%>px; background: <%style.background%>;">
            <div class="fui-cell">
                <div class="feii-cell-text">
                    <p>此处为购买后可见区域</p>
                    <p>此处为购买后可见区域</p>
                    <p>此处为购买后可见区域</p>
                </div>
            </div>
        </div>
    </div>
</script>

<script type="text/html" id="tpl_show_detail_store">
    <div class="drag" data-itemid="<%itemid%>">
        <div class="fui-according-group" style="background: <%style.background%>; margin-top: <%style.margintop%>px; margin-bottom: <%style.marginbottom%>px;">
            <div class="fui-according expanded">
                <div class="fui-according-header">
                    <span class="text" style="color: <%style.titlecolor%>;">适用门店</span>
                    <span class="remark"><div class="badge" style="color: #fff;">1</div></span>
                </div>
                <div class="fui-according-content store-container fui-cell-group" style="height: auto;margin-top: 0">
                    <div class="fui-cell store-item">
                        <div class="fui-cell-icon">
                            <i class="icon icon-map"></i>
                        </div>
                        <div class="fui-cell-text store-inner">
                            <div class="title" style="font-size: 14px; color: <%style.shopnamecolor%>;"><span class="storename">总店001</span></div>
                        </div>
                        <div class="fui-cell-remark ">
                        </div>
                    </div>
                </div>
                <div id="nearStore" style="display:none">
                    <div class="fui-list store-item" id="nearStoreHtml"></div>
                </div>
            </div></div>
    </div>
</script>

<script type="text/html" id="tpl_show_detail_package">
    <div class="drag" data-itemid="<%itemid%>">
        <div class="fui-cell-group fui-comment-group" style="background: <%style.background%>; margin-top: <%style.margintop%>px; margin-bottom: <%style.marginbottom%>px;">
            <div class="fui-cell fui-cell-click">
                <div class="fui-cell-text desc" style="color: <%style.textcolor%>;">相关套餐</div>
                <div class="fui-cell-text desc label" style="color: <%style.textcolor%>;">更多套餐</div>
                <div class="fui-cell-remark"></div>
            </div>
            <div class="fui-cell">
                <div class="fui-cell-text comment ">
                    <div class="fui-list package-list">
                        <div class="fui-list-inner package-goods" style="padding: 0;">
                            <img src="../addons/ewei_shopv2/plugin/diypage/static/template/detail1/goods.jpg" class="package-goods-img" alt="戴尔显示器24寸">
                            <span>粉+深蓝情侣套装</span>
                        </div>
                        <div class="fui-list-inner package-goods">
                            <img src="../addons/ewei_shopv2/plugin/diypage/static/template/detail1/goods.jpg" class="package-goods-img" alt="新款个性创意iphone6s手机壳磨砂苹果6情侣保护套i6日韩国简约潮">
                            <span>粉+深蓝情侣套装2</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</script>

<script type="text/html" id="tpl_show_detail_seckill">
    <div class="drag" data-itemid="<%itemid%>">

        <div class="page-goods-detail">
            <div class="seckill-container">
                <div class="fui-list seckill-list" style="background:<%style.bgleft%>" >
                    <div class="fui-list-media seckill-price"  style="color:<%style.pricecolor%>">
                        &yen;<span>1</span>
                    </div>
                    <div class="fui-list-inner">
                        <div class="text"><span class="stitle" style="border:1px solid <%style.tagcolor%>;color:<%style.tagcolor%>">标签</span></div>
                        <div class="text"><span class="oldprice" style="color:<%style.marketpricecolor%>">&yen;88</span></div>
                    </div>
                </div>

                <div class="fui-list seckill-list1"   style="background:<%style.bgleft%>">
                    <div class="fui-list-inner" >
                        <div class="text " style="color:<%style.processtextcolor%>">已出售 50%</div>
                        <div class="text "><span class="process" style="border:1px solid <%style.processcolor%>"><div class="inner" style="width:50%;background:<%style.processcolor%>"></div></span></div>
                    </div>
                </div>
                <div class="fui-list seckill-list2"  style="background:<%style.bgright%>">
                    <div class="fui-list-inner"  >
                        <div class="text " style="color:<%style.statuscolor%>">距结束还有</div>
                        <div class="text timer">
                            <span class="time-hour" style="color:<%style.timecolor%>;background:<%style.timebgcolor%>">09</span>&nbsp;
                            <d style="color:<%style.statuscolor%>">:</d>&nbsp;
                            <span class="time-min"  style="color:<%style.timecolor%>;background:<%style.timebgcolor%>">08</span>&nbsp;
                            <d style="color:<%style.statuscolor%>">:</d>&nbsp;
                            <span class="time-sec"  style="color:<%style.timecolor%>;background:<%style.timebgcolor%>">07</span>
                        </div>
                    </div>
                </div>
            </div>


            <div class="seckill-container">
                <div class="fui-list seckill-list" style="background:<%style.bgleftwait%>" >
                    <div class="fui-list-media seckill-price"  style="color:<%style.pricecolorwait%>">
                        &yen;<span>1</span>
                    </div>
                    <div class="fui-list-inner">
                        <div class="text"><span class="stitle" style="border:1px solid <%style.tagcolorwait%>;color:<%style.tagcolorwait%>">标签</span></div>
                        <div class="text"><span class="oldprice" style="color:<%style.marketpricecolorwait%>">&yen;88</span></div>
                    </div>
                </div>

                <div class="fui-list seckill-list2"  style="background:<%style.bgrightwait%>">
                    <div class="fui-list-inner"  >
                        <div class="text " style="color:<%style.statuscolorwait%>">距开始还有</div>
                        <div class="text timer">
                            <span class="time-hour" style="color:<%style.timecolorwait%>;background:<%style.timebgcolorwait%>">09</span>&nbsp;
                            <d style="color:<%style.statuscolorwait%>">:</d>&nbsp;
                            <span class="time-min"  style="color:<%style.timecolorwait%>;background:<%style.timebgcolorwait%>">08</span>&nbsp;
                            <d style="color:<%style.statuscolorwait%>">:</d>&nbsp;
                            <span class="time-sec"  style="color:<%style.timecolorwait%>;background:<%style.timebgcolorwait%>">07</span>
                        </div>
                    </div>
                </div>
            </div>


        </div>


    </div>
</script>


<!-- 另存为模板 弹出层 -->
<div class="modal fade" id="saveTempModal" aria-hidden="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">另存为模板</h4>
            </div>
            <div class="modal-body form-horizontal">
                <div class="form-group">
                    <div class="col-sm-2 control-label must">模板名称</div>
                    <div class="col-sm-10">
                        <input class="form-control input-sm" placeholder="请输入模板名称" id="saveTempName" value="未命名模板" aria-required="true" data-rule-required="true" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-2 control-label">缩略图</div>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input class="form-control input-sm" placeholder="请选择模板缩略图" value="" id="saveTempPreview">
                            <span data-input="#saveTempPreview" data-img="#tempimg" data-toggle="selectImg" class="input-group-addon btn btn-default">选择图片</span>
                        </div>
                        <div class="input-group " style="margin-top:.5em;">
                            <img src="../addons/ewei_shopv2/static/images/nopic.jpg" onerror="this.src='../addons/ewei_shopv2/static/images/nopic.jpg';" class="img-responsive img-thumbnail" width="150" id="tempimg">
                            <em class="close" style="position:absolute; top: 0px; right: -14px;" title="删除这张图片" onclick="$('#tempsrc').val('').trigger('change');$(this).prev().attr('src', '')">×</em>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-2 control-label">模板分类</div>
                    <div class="col-sm-10">
                        <select class="form-control input-sm" id="saveTempCate" >
                            <?php  if(is_array($category)) { foreach($category as $item) { ?>
                            <option value="<?php  echo $item['id'];?>"><?php  echo $item['name'];?></option>
                            <?php  } } ?>
                            <option value="0">不分类</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="btn btn-primary" id="saveTemp">保存</div>
                <button data-dismiss="modal" class="btn btn-default" type="button">关闭</button>
            </div>
        </div>
    </div>
</div>

<script type="text/html" id="tpl_show_merchgroup">
    <div class="drag" data-itemid="<%itemid%>">
        <div class="fui-list-group" style="background: <%style.background%>; margin-top: <%style.margintop%>px;">
            <%if params.merchdata=='0'||!params.merchdata%>
            <%each data as item%>
            <div class="fui-list">
                <div class="fui-list-media">
                    <img src="<%item.thumb||'../addons/ewei_shopv2/plugin/diypage/static/images/default/logo.jpg'%>" class="round">
                </div>
                <div class="fui-list-inner">
                    <div class="title" style="color: <%style.titlecolor%>;"><%item.name%></div>
                    <div class="subtitle" style="color: <%style.textcolor%>;"><%item.desc%></div>
                    <%if params.openlocation==1%>
                    <div class="subtitle" style="color: <%style.rangecolor%>; font-size: 0.6rem"><i class="icon icon-dingwei1" style="color: <%style.locationcolor%>;"></i>距离您: 1.01km</div>
                    <%/if%>
                </div>
                <div class="fui-remark">

                </div>
            </div>
            <%/each%>
            <%else%>
            <%each data=["A","B"] as item%>
            <div class="fui-list">
                <div class="fui-list-media">
                    <img src="../addons/ewei_shopv2/static/images/default/logo.jpg" class="round">
                </div>
                <div class="fui-list-inner">
                    <div class="title" style="color: <%style.titlecolor%>;">这里是商户名称A</div>
                    <div class="subtitle" style="color: <%style.textcolor%>;"><%if params.merchdata==1%>从分类<%params.catename%>中读取<%/if%><%if params.merchdata==2%>从分组<%params.groupname%>中读取<%/if%><%if params.merchdata==3%>从推荐商户中读取<%/if%></div>
                    <%if params.openlocation==1%>
                    <div class="subtitle" style="color: <%style.rangecolor%>; font-size: 0.6rem"><i class="icon icon-dingwei1" style="color: <%style.locationcolor%>;"></i>距离您: 1.01km</div>
                    <%/if%>
                </div>
                <div class="fui-remark">

                </div>
            </div>
            <%/each%>
            <%/if%>
        </div>
    </div>
</script>

<script type="text/html" id="tpl_show_seckillgroup">
    <div class="drag" data-itemid="<%itemid%>">
        <div class="seckill-group <%params.hideborder==1&&'noborder'%>" style="margin-top: <%style.margintop%>px; background: <%style.background%>;">
            <div class="seckill-title">
                <div class="seckill-text">
                    <%if params.iconurl%>
                    <img src="<%imgsrc params.iconurl%>" />
                    <%/if%>
                    <span class="title" style="color: <%style.titlecolor%>;">10点场</span>
                    <div class="killtime" style="color: <%style.timecolor%>;">
                        <span class="item" style="background:<%style.timebgcolor%>;border:1px solid <%style.timebordercolor%>">09</span>
                        <d style="color:<%style.timesigncolor%>">:</d>
                        <span class="item" style="background:<%style.timebgcolor%>;border:1px solid <%style.timebordercolor%>">08</span>
                        <d style="color:<%style.timesigncolor%>">:</d>
                        <span class="item"  style="background:<%style.timebgcolor%>;border:1px solid <%style.timebordercolor%>">07</span>
                    </div>
                </div>
                <div class="seckill-remark" style="color: <%style.morecolor%>;">更多</div>
            </div>
            <div class="seckill-goods">
                <div class="item">
                    <div class="thumb">
                        <img src="../addons/ewei_shopv2/plugin/diypage/static/images/default/iphone6.jpg" />
                        <!--<div class="tag">热卖</div>-->
                    </div>
                    <div class="marketprice" style="color: <%style.marketpricecolor%>;">￥199</div>
                    <div class="productprice" style="color: <%style.productpricecolor%>;">￥599</div>
                </div>
                <div class="item">
                    <div class="thumb">
                        <img src="../addons/ewei_shopv2/plugin/diypage/static/images/default/iphone6.jpg" />
                        <!--<div class="tag orange">热卖</div>-->
                    </div>
                    <div class="marketprice" style="color: <%style.marketpricecolor%>;">￥199</div>
                    <div class="productprice" style="color: <%style.productpricecolor%>;">￥599</div>
                </div>
                <div class="item">
                    <div class="thumb">
                        <img src="../addons/ewei_shopv2/plugin/diypage/static/images/default/iphone6.jpg" />
                        <!--<div class="tag purple">热卖</div>-->
                    </div>
                    <div class="marketprice" style="color: <%style.marketpricecolor%>;">￥199</div>
                    <div class="productprice" style="color: <%style.productpricecolor%>;">￥599</div>
                </div>
                <div class="item">
                    <div class="thumb">
                        <img src="../addons/ewei_shopv2/plugin/diypage/static/images/default/iphone6.jpg" />
                        <!--<div class="tag green">热卖</div>-->
                    </div>
                    <div class="marketprice" style="color: <%style.marketpricecolor%>;">￥199</div>
                    <div class="productprice" style="color: <%style.productpricecolor%>;">￥599</div>
                </div>
            </div>
        </div>
    </div>
</script>

<script type="text/html" id="tpl_show_pictures">
    <div class="drag" data-itemid="<%itemid%>">
        <div class="fui-picturew row-<%params.rownum%>" style="padding: <%style.paddingtop%>px <%style.paddingleft%>px; background: <%style.background%>;">
            <%each data as item%>
            <div class="item" style="padding: <%style.paddingtop%>px <%style.paddingleft%>px;">
                <div class="image">
                    <img src="<%imgsrc item.imgurl%>">
                    <%if item.title!=''%>
                    <div class="title" style="color: <%style.titlecolor%>; text-align: <%style.titlealign%>;"><%item.title%></div>
                    <%/if%>
                </div>
                <div class="text" style="color: <%style.textcolor%>; text-align: <%style.textalign%>;""><%item.text%></div>
        </div>
        <%/each%>
        <%if style.showdot>0&&params.showtype==1%>
        <div class="fui-picturew-pagination">
            <a class="active"></a>
            <a></a>
        </div>
        <%/if%>
    </div>
    </div>
</script>

<script type="text/html" id="tpl_show_audio">
    <div class="drag" data-itemid="<%itemid%>">
        <%if params.playerstyle=='0'||!params.playerstyle%>
        <div class="fui-audio" style="background: <%style.background%>; border-color: <%style.bordercolor%>; margin: <%style.paddingtop%>px <%style.paddingleft%>px;">
            <div class="horn"></div>
            <div class="center">
                <p style="color: <%style.textcolor%>;"><%params.title||'未定义音频信息'%></p>
                <%if params.subtitle!=''%>
                <p style="color: <%style.subtitlecolor%>; font-size: 0.65rem;"><%params.subtitle%></p>
                <%/if%>
            </div>
            <div class="time" style="color: <%style.timecolor%>;">11'26''</div>
            <div class="speed"></div>
        </div>
        <%/if%>
        <%if params.playerstyle=='1'%>
        <div class="fui-chat-item <%params.headalign%>" style="margin: <%style.paddingtop%>px <%style.paddingleft%>px;">
            <%if params.headalign=='left'%>
            <div class="face">
                <img src="<%params.headurl&&params.headtype!=1 ? imgsrc(params.headurl) : imgsrc(shoplogo)%>" />
            </div>
            <%/if%>
            <div class="msg" style="width: <%style.width%>px;">
                <div class="horn playing"></div>
            </div>
            <%if params.headalign=='right'%>
            <div class="face">
                <img src="<%params.headurl&&params.headtype!=1 ? imgsrc(params.headurl) : imgsrc(shoplogo)%>" />
            </div>
            <%/if%>
        </div>
        <%/if%>
    </div>
</script>

<script type="text/html" id="tpl_show_seckill_times">
    <div class="drag fixed nodelete" data-itemid="<%itemid%>">
        <div class=" seckill-page" style="background:<%style.bgcolor%>;margin-top:<%style.margintop%>px">
            <div class="swiper-container time-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide time-slide " data-index="0" style="color:<%style.color%>;">
                        <span class="time">18:00</span>
                        <span class="text">已开抢</span>
                    </div>
                    <div class="swiper-slide time-slide curent" data-index="1" style="color:<%style.selectedcolor%>;background:<%style.selectedbgcolor%>">
                        <span class="time">19:00</span>
                        <span class="text">抢购中</span>
                    </div>
                    <div class="swiper-slide time-slide" data-index="2" style="color:<%style.color%>;">
                        <span class="time">20:00</span>
                        <span class="text">即将开始</span>
                    </div>
                    <div class="swiper-slide time-slide" data-index="3" style="color:<%style.color%>;">
                        <span class="time">21:00</span>
                        <span class="text">即将开始</span>
                    </div>
                    <div class="swiper-slide time-slide" data-index="4" style="color:<%style.color%>;">
                        <span class="time">22:00</span>
                        <span class="text">即将开始</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</script>

<script type="text/html" id="tpl_show_seckill_rooms">
    <div class="drag" data-itemid="<%itemid%>">
        <div class=" seckill-page" style="background:<%style.bgcolor%>;margin-top:<%style.margintop%>px;">
            <div class="swiper-container room-container">
                <div class="swiper-wrapper">
                    <a class="swiper-slide room-slide" style="color:<%style.selectedcolor%>;border-bottom:2px solid <%style.selectedcolor%>;backgrond:<%style.selectedbgcolor%>;">主会场</a>
                    <a class="swiper-slide room-slide" style="color:<%style.color%>;">手机</a>
                    <a class="swiper-slide room-slide" style="color:<%style.color%>;">家电</a>
                    <a class="swiper-slide room-slide" style="color:<%style.color%>;">母婴</a>
                    <a class="swiper-slide room-slide" style="color:<%style.color%>;">服装</a>
                </div>
            </div>
        </div>
    </div>
</script>

<script type="text/html" id="tpl_show_seckill_advs">
    <div class="drag" data-itemid="<%itemid%>">
        <div class=" seckill-page" style="background:<%style.bgcolor%>;padding-top:<%style.margintop%>px;padding-bottom:<%style.marginbottom%>px">
            <div class="swiper-container adv-container" style="">
                <div class="swiper-wrapper">
                    <div class="swiper-slide adv-slide" style="background:<%style.bgcolor%>">
                        <a ><img src="../addons/ewei_shopv2/plugin/diypage/static/images/default/banner-1.jpg"/></a>
                    </div>
                    <div class="swiper-slide adv-slide"  style="background:<%style.bgcolor%>">
                        <a ><img src="../addons/ewei_shopv2/plugin/diypage/static/images/default/banner-2.jpg"/></a>
                    </div>
                    <div class="swiper-slide adv-slide"  style="background:<%style.bgcolor%>">
                        <a ><img src="../addons/ewei_shopv2/plugin/diypage/static/images/default/banner-1.jpg"/></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</script>

<script type="text/html" id="tpl_show_seckill_list">
    <div class="drag" data-itemid="<%itemid%>">
        <div class=" seckill-page" style="background:<%style.bgcolor%>;padding-top:<%style.margintop%>px;padding-bottom:<%style.marginbottom%>px">
            <div class="swiper-container goods-container" style="">
                <div class="swiper-wrapper">
                    <div class="swiper-slide goods-slide">
                        <div class="fui-list-group">
                            <div class="fui-list-group-title" style="background:<%style.topbgcolor%>;color:<%style.topcolor%>">
                                <span class="timer">
                                     <d style="color:<%style.topcolor%>">距结束</d>
                                    <span class="time-hour" style="background:<%style.timebgcolor%>;color:<%style.timecolor%>">08</span>
                                    <d style="color:<%style.topcolor%>">:</d>
                                    <span class="time-min"  style="background:<%style.timebgcolor%>;color:<%style.timecolor%>">05</span>
                                    <d style="color:<%style.topcolor%>">:</d>
                                    <span class="time-sec"  style="background:<%style.timebgcolor%>;color:<%style.timecolor%>">22</span>
                                </span>
                                抢购中 先下单先得哦
                            </div>
                            <div class='fui-list align-start' style="background:<%style.bgcolor%>">
                                <div class='fui-list-media'>
                                    <img src="../addons/ewei_shopv2/plugin/diypage/static/images/default/goods-1.jpg" />
                                </div>
                                <div class='fui-list-inner'>
                                    <div class='text' style="color:<%style.titlecolor%>">秒杀商品的名称秒杀商品的名称秒杀商品的名称秒杀</div>
                                    <div class="info">
                                        <span class="button">
                                            <a  class="btn btn-danger btn-sm" style="color:<%style.btncolor%>;background:<%style.btnbgcolor%>;border:1px solid <%style.btnbgcolor%>">抢购中</a>
                                        </span>
                                        <div class="price" style="color:<%style.pricecolor%>">&yen;1</div>
                                    </div>
                                    <div class="info info1">
                                        <div style="float:right;">
                                            <span class="process-text"  style="color:<%style.processtextcolor%>">已售 50%</span>
                                            <span class="process"  style="border:1px solid <%style.processbgcolor%>">
                                                <div class="inner" style="width:50%;background:<%style.processbgcolor%>"></div>
                                            </span>
                                        </div>
                                        <div class="price1" style="color:<%style.marketpricecolor%>">&yen;88</div>
                                    </div>
                                </div>
                            </div>
                            <div class='fui-list align-start' style="background:<%style.bgcolor%>">
                                <div class='fui-list-media'>
                                    <img src="../addons/ewei_shopv2/plugin/diypage/static/images/default/goods-2.jpg" />
                                </div>
                                <div class='fui-list-inner'>
                                    <div class='text'  style="color:<%style.titlecolor%>">秒杀商品的名称秒杀商品的名称秒杀商品</div>
                                    <div class="info">
                                             <span class="button">
                                                     <a  class="btn btn-success btn-sm" style="color:<%style.btnwaitcolor%>;background:<%style.btnwaitbgcolor%>;border:1px solid <%style.btnwaitbgcolor%>">等待抢购</a>
                                             </span>
                                        <div class="price" style="color:<%style.pricecolor%>">&yen;1</div>
                                    </div>
                                    <div class="info info1">
                                        <div class="price1" style="color:<%style.marketpricecolor%>">&yen;88</div>
                                    </div>
                                </div>
                            </div>
                            <div class='fui-list align-start' style="background:<%style.bgcolor%>">
                                <div class='fui-list-media'>
                                    <img src="../addons/ewei_shopv2/plugin/diypage/static/images/default/goods-3.jpg" />
                                </div>
                                <div class='fui-list-inner'>
                                    <div class='text'  style="color:<%style.titlecolor%>">秒杀商品的名称秒杀商品的名称秒杀名称秒杀商品的名称</div>
                                    <div class="info">
                                             <span class="button">
                                                     <a  class="btn btn-default btn-sm" style="color:<%style.btnovercolor%>;background:<%style.btnoverbgcolor%>;border:1px solid <%style.btnoverbgcolor%>">已抢完</a>
                                             </span>
                                        <div class="price" style="color:<%style.pricecolor%>">&yen;1</div>
                                    </div>
                                    <div class="info info1">
                                        <div style="float:right;">
                                            <span class="process-text" style="color:<%style.processtextcolor%>">已售 100%</span>
                                            <span class="process"  style="border:1px solid <%style.processbgcolor%>">
                                                <div class="inner" style="width:100%;background:<%style.processbgcolor%>"></div>
                                            </span>
                                        </div>
                                        <div class="price1" style="color:<%style.marketpricecolor%>">&yen;88</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</script>

<script type="text/html" id="tpl_show_coupon">
    <div class="drag" data-itemid="<%itemid%>">
        <div class="diy-coupon col-<%params.couponstyle%>" style="margin: <%style.margintop%>px 0; background: <%style.background%>;">
            <%each data as item%>
            <div class="diy-coupon-item">
                <div class="inner" style="border: 0; background: <%item.couponcolor%>; color: #ffffff; margin: <%style.margintop%>px <%style.marginleft%>px;">
                    <div class="name"><%item.price%></div>
                    <div class="receive"  style="border: 1px solid <%item.textcolor%>;">立即领取</div>
                </div>
            </div>
            <%/each%>
        </div>
    </div>
</script>

<script type="text/html" id="tpl_show_fixedsearch">
    <div class="drag fixed" data-itemid="<%itemid%>">
        <div class="diy-fixedsearch">
            <div class="background" style="background: <%style.background%>; opacity: <%style.opacity%>;"></div>
            <div class="inner">
                <%if (params.leftnav==1&&params.leftnavicon!='') || (params.leftnav==2&&params.leftnavimg!='')%>
                <div class="leftnav">
                    <%if params.leftnav==1&&params.leftnavicon!=''%>
                    <i class="icon <%params.leftnavicon%>" style="color: <%style.leftnavcolor%>;"></i>
                    <%/if%>
                    <%if params.leftnav==2&&params.leftnavimg&&params.leftnavimg!=''%>
                    <img src="<%imgsrc params.leftnavimg%>" style="" />
                    <%/if%>
                </div>
                <%/if%>
                <div class="center <%params.searchstyle%>">
                    <input value="<%params.placeholder%>" style="opacity: <%style.opacity%>; background: <%style.searchbackground%>; color: <%style.searchtextcolor%>;" />
                </div>
                <%if (params.rightnav==1&&params.rightnavicon!='') || (params.rightnav==2&&params.rightnavimg!='')%>
                <div class="rightnav">
                    <%if params.rightnav==1&&params.rightnavicon!=''%>
                    <i class="icon <%params.rightnavicon%>" style="color: <%style.rightnavcolor%>;"></i>
                    <%/if%>
                    <%if params.rightnav==2&&params.rightnavimg&&params.rightnavimg!=''%>
                    <img src="<%imgsrc params.rightnavimg%>" />
                    <%/if%>
                </div>
                <%/if%>
            </div>
        </div>
    </div>
</script>

<script type="text/html" id="tpl_show_exchange_banner">
    <div class="drag" data-itemid="<%itemid%>">
        <div class="diy-banner">
            <%if params.datatype!='1'%>
            <img src="../addons/ewei_shopv2/plugin/diypage/static/images/default/banner-1.jpg" />
            <div class="dots <%style.dotalign||'left'%> <%style.dotstyle||'rectangle'%>" style="padding: 0 <%style.leftright||'10'%>px; bottom: <%style.bottom||'10'%>px; opacity: <%style.opacity||'0.8'%>;">
                <span style="background: <%style.background||'#000000'%>;"></span>
                <span style="background: <%style.background||'#000000'%>;"></span>
            </div>
            <%/if%>
            <%if params.datatype=='1'%>
            <%each data as item%>
            <img src="<%imgsrc item.imgurl%>" />
            <%/each%>
            <div class="dots <%style.dotalign||'left'%> <%style.dotstyle||'rectangle'%>" style="padding: 0 <%style.leftright||'10'%>px; bottom: <%style.bottom||'10'%>px; opacity: <%style.opacity||'0.8'%>;">
                <%each data as item%>
                <span style="background: <%style.background||'#000000'%>;"></span>
                <%/each%>
            </div>
            <%/if%>
        </div>
    </div>
</script>

<script type="text/html" id="tpl_show_exchange_input">
    <div class="drag nodelete" data-itemid="<%itemid%>">
        <div class="diy-exchange-input">
            <div class="title">
                <%if params.preview!=1%>
                <p class="text" style="color: <%style.titlecolor%>;"><%params.title||'兑换码兑换'%></p>
                <%/if%>
                <%if params.preview==1%>
                <p class="text" style="color: <%style.codecolor%>;">兑换码: D123456789</p>
                <p class="num" style="color: <%style.numcolor%>;">已查询5次</p>
                <%/if%>
            </div>
            <%if params.preview!=1%>
            <div class="input" style="border-color: <%style.inputborder%>; background: <%style.inputbackground%>;">
                <input placeholder="<%params.placeholder||'请输入兑换码'%>" style="background: <%style.inputbackground%>;" />
            </div>
            <div class="btn btn-danger block" style="background: <%style.btnbackground%>; color: <%style.btncolor%>;"><%params.btntext||'立即兑换'%></div>
            <%/if%>
            <%if params.preview==1%>
            <div class="list">
                <div class="item">
                    <div class="ico money" style="background-image: url(<%imgsrc params.moneyicon||'../addons/ewei_shopv2/plugin/diypage/static/images/default/icon_money.png'%>)"></div>
                    <div class="info">
                        <p class="t1" style="color: <%style.goodstitle%>;">余额兑换</p>
                        <p class="t2" style="color: <%style.goodsprice%>;">面值：1000元</p>
                    </div>
                    <div class="btn-exc btn btn-danger btn-sm" style="color: <%style.exbtncolor%>; background: <%style.exbtnbackground%>"><%params.exbtntext||'兑换'%></div>
                </div>
                <div class="item">
                    <div class="ico credit" style="background-image: url(<%imgsrc params.crediticon||'../addons/ewei_shopv2/plugin/diypage/static/images/default/icon_credit.png'%>)"></div>
                    <div class="info">
                        <p class="t1" style="color: <%style.goodstitle%>;">积分兑换</p>
                        <p class="t2" style="color: <%style.goodsprice%>;">面值：1000元</p>
                    </div>
                    <div class="btn-exc btn btn-danger btn-sm" style="color: <%style.exbtncolor%>; background: <%style.exbtnbackground%>"><%params.exbtntext||'兑换'%></div>
                </div>
                <div class="item">
                    <div class="ico coupon" style="background-image: url(<%imgsrc params.couponicon||'../addons/ewei_shopv2/plugin/diypage/static/images/default/icon_coupon.png'%>)"></div>
                    <div class="info">
                        <p class="t1" style="color: <%style.goodstitle%>;">优惠券兑换</p>
                        <p class="t2" style="color: <%style.goodsprice%>;">面值：1000元</p>
                    </div>
                    <div class="btn-exc btn btn-danger btn-sm" style="color: <%style.exbtncolor%>; background: <%style.exbtnbackground%>"><%params.exbtntext||'兑换'%></div>
                </div>
                <div class="item">
                    <div class="ico redbag" style="background-image: url(<%imgsrc params.redbagicon||'../addons/ewei_shopv2/plugin/diypage/static/images/default/icon_redbag.png'%>)"></div>
                    <div class="info">
                        <p class="t1" style="color: <%style.goodstitle%>;">红包兑换</p>
                        <p class="t2" style="color: <%style.goodsprice%>;">面值：1000元</p>
                    </div>
                    <div class="btn-exc btn btn-danger btn-sm" style="color: <%style.exbtncolor%>; background: <%style.exbtnbackground%>"><%params.exbtntext||'兑换'%></div>
                </div>
                <div class="item">
                    <div class="ico redbag" style="background-image: url(<%imgsrc params.goodsicon||'../addons/ewei_shopv2/plugin/diypage/static/images/default/icon_goods.png'%>)"></div>
                    <div class="info">
                        <p class="t1" style="color: <%style.goodstitle%>;">商品兑换</p>
                        <p class="t2" style="color: <%style.goodsprice%>;">面值：1000元</p>
                    </div>
                    <div class="btn-exc btn btn-danger btn-sm disabled" style="color: <%style.exbtn2color%>; background: <%style.exbtn2background%>"><%params.exbtn2text||'已兑换'%></div>
                </div>
            </div>
            <div class="btn btn-default block" style="color: <%style.backbtncolor%>; background: <%style.backbtnbackground%>; border-color: <%style.backbtnborder%>;"><%params.backbtn||'返回重新输入兑换码'%></div>
            <%/if%>
        </div>
    </div>
</script>

<script type="text/html" id="tpl_show_exchange_rule">
    <div class="drag" data-itemid="<%itemid%>">
        <div class="diy-exchange-rule">
            <div class="head">
                <div class="title" style="color: <%style.ruletitlecolor%>;"><%params.ruletitle%></div>
            </div>
            <div class="info">
                <p><b>活动规则</b></p>
                <p>1. 这里显示的是活动规则</p>
                <p>2. 这里显示的是活动规则</p>
                <p>3. 这里显示的是活动规则</p>
                <p>(活动规则读取商品设置)</p>
            </div>
        </div>
    </div>
</script>

<script type="text/html" id="tpl_show_tabbar">
    <div class="drag" data-itemid="<%itemid%>">
        <div class="fui-tab fui-tab-danger">
            <%define index=0%>
            <%each data as item%>
            <%if index<3%>
            <a <%if index==0%>class="active" style="color: <%style.activecolor%>; border-color: <%style.activecolor%>; background: <%style.activebackground%>;"<%else%>style="color: <%style.color%>;"<%/if%>><%item.text||'未设置'%></a>
            <%/if%>
            <%define index++%>
            <%/each%>
        </div>
    </div>
</script>

<script type="text/html" id="tpl_show_wxcard">
    <div class="drag" data-itemid="<%itemid%>">
        <div class="fui-cell-group fui-cell-click" style="margin-top: <%style.margintop%>px; background-color: <%style.background%>;">
            <div class="fui-cell">
                <%if params.iconclass%>
                <div class="fui-cell-icon" style="color: <%style.iconcolor%>;"><i class="icon <%params.iconclass%>"></i></div>
                <%/if%>
                <div class="fui-cell-text" style="color: <%style.textcolor%>;">领取会员卡</div>
                <div class="fui-cell-remark"></div>
            </div>
        </div>
    </div>
</script>

<script type="text/html" id="tpl_show_verify">
    <div class="drag" data-itemid="<%itemid%>">
        <div class="fui-cell-group fui-cell-click" style="margin-top: 10px; background-color: <%style.titlebg%>;">
            <div class="fui-cell">
                <div class="fui-cell-icon" style="color: #999999;"><i class="icon <%params.iconclass%>"></i></div>
                <div class="fui-cell-text" style="color: <%style.titlecolor%>;"><% params.title%></div>
                <div class="fui-cell-remark" style="color: <%style.remarkcolor%>;"><% params.remark%></div>
            </div>
        </div>
        <div class="fui-icon-group selecter" style="overflow: scroll; background: <%style.background%>">
            <%if params.style!='style2'%>
            <ul class="banner-ul">
                <li class="">
                    <a>
                        <div></div><span>待使用</span>
                        <img src="../addons/ewei_shopv2/plugin/diypage/static/images/default/goods-1.jpg" alt=""><p>测试核销商品</p>
                    </a>
                </li>
                <li class="banner-li-blue">
                    <a>
                        <div></div><span>待使用</span>
                        <img src="../addons/ewei_shopv2/plugin/diypage/static/images/default/goods-2.jpg" alt=""><p>测试核销商品</p>
                    </a>
                </li>
            </ul>
            <%else%>
            <ul class="banner-ul style2">
                <li class="">
                    <a>
                        <div></div><span>待使用</span>
                        <img src="../addons/ewei_shopv2/plugin/diypage/static/images/default/goods-1.jpg" alt=""><p>测试核销商品</p>
                    </a>
                </li>
                <li class="banner-li-blue">
                    <a>
                        <div></div><span>待使用</span>
                        <img src="../addons/ewei_shopv2/plugin/diypage/static/images/default/goods-2.jpg" alt=""><p>测试核销商品</p>
                    </a>
                </li>
            </ul>
            <%/if%>
        </div>
    </div>
</script>
<!--NDAwMDA5NzgyNw==-->