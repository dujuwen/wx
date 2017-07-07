<?php defined('IN_IA') or exit('Access Denied');?><script type="text/html" id="tpl_show_menu">
    <style type="text/css">
        .diymenu .item .inner {background: <%style.bgcolor%>;}
        .diymenu .item .inner:before,
        .diymenu .item .inner:after {border-color: <%style.bordercolor%>;}
        .diymenu .item .inner .text {color: <%style.textcolor%>;}
        .diymenu .item .inner .icon {color: <%style.iconcolor%>;}
        .diymenu .item.on .inner {background: <%style.bgcoloron%>;}
        .diymenu .item.on .inner .text {color: <%style.textcoloron%>;}
        .diymenu .item.on .inner .icon {color: <%style.textcoloron%>;}
        .diymenu .item .child {border-color: <%style.childbordercolor%>; background-color: <%style.childbgcolor%>;}
        .diymenu .item .child a {color: <%style.childtextcolor%>;}
        .diymenu .item .child a:after {border-color: <%style.childbordercolor%>; color: <%style.childtextcolor%>;}
        .diymenu .item .child .arrow:before {background: <%style.childbordercolor%>;}
        .diymenu .item .child .arrow:after {background: <%style.childbgcolor%>;}
    </style>
    <div class="diymenu-page" style="background: <%style.pagebgcolor%>;"><%if params.navstyle==0%>二级菜单请点击菜单预览<%else%>图片样式不支持二级菜单哦<%/if%> <i class="icon icon-icondownload"></i> </div>
    <div class="diymenu" style="width: 306px;">
        <%each data as item%>
            <div class="item item-col-<%count(data)%>" <%if count(item.child)>0 && params.navstyle==0%>onclick="showSubMenu(this)"<%else%>onclick="window.open('<%item.linkurl%>')"<%/if%>>
                <div class="inner <%if params.navstyle==1%>image<%/if%>">
                    <%if params.navstyle==0%>
                        <%if item.iconclass%>
                            <span class="icon <%item.iconclass%> <%params.navfloat%>"></span>
                        <%/if%>
                        <span class="text <%params.navfloat%>" <%if item.iconclass==''%>style="margin-top: 10px; font-size: 14px;"<%/if%>><%item.text%></span>
                    <%/if%>
                    <%if params.navstyle==1%>
                        <img src="<%imgsrc item.imgurl%>" />
                    <%/if%>
                </div>
                <%if count(item.child)>0 && params.navstyle==0%>
                    <div class="child">
                        <%each item.child as child%>
                            <a href="<%child.linkurl%>"><%child.text%></a>
                        <%/each%>
                        <span class="arrow"></span>
                    </div>
                <%/if%>
            </div>
        <%/each%>
    </div>

</script>

<script type="text/html" id="tpl_edit_menu">

    <div class="form-group">
        <div class="col-sm-2 control-label">菜单名称</div>
        <div class="col-sm-10">
            <input class="form-control input-sm diy-bind" data-bind="name" data-placeholder="未命名自定义菜单" placeholder="请输入名称" value="<%name%>">
            <div class="help-block">注意：菜单名称是便于后台查找。</div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">页面背景</div>
        <div class="col-sm-4">
            <div class="input-group">
                <input class="form-control input-sm diy-bind color" type="color" data-bind-child="style" data-bind="pagebgcolor" value="<%style.pagebgcolor%>" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#f9f9f9').trigger('propertychange')">清除</span>
            </div>
        </div>
        <div class="help-block">提示：页面背景仅在编辑时起作用。</div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">图标样式</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="navstyle" value="0" class="diy-bind" data-bind-child="params" data-bind="navstyle" data-bind-init="true" <%if params.navstyle==0%>checked="checked"<%/if%>> 图标+文字</label>
            <label class="radio-inline"><input type="radio" name="navstyle" value="1" class="diy-bind" data-bind-child="params" data-bind="navstyle" data-bind-init="true" <%if params.navstyle==1%>checked="checked"<%/if%>> 图片</label>
            <div class="help-block">提示：图片样式时不支持二级菜单</div>
        </div>
    </div>

    <%if params.navstyle==0%>
        <div class="form-group">
            <div class="col-sm-2 control-label">图标位置</div>
            <div class="col-sm-10">
                <label class="radio-inline"><input type="radio" name="navfloat" value="top" class="diy-bind" data-bind-child="params" data-bind="navfloat" data-bind-init="true" <%if params.navfloat=='top'%>checked="checked"<%/if%>> 上方</label>
                <label class="radio-inline"><input type="radio" name="navfloat" value="left" class="diy-bind" data-bind-child="params" data-bind="navfloat" data-bind-init="true" <%if params.navfloat=='left'%>checked="checked"<%/if%>> 左侧</label>
                <div class="help-block">提示：如果一级菜单个数多或者文字长选择"左侧"有可能会拥挤</div>
            </div>
        </div>
    <%/if%>

    <div class="line"></div>

    <div class="form-group">
        <div class="col-sm-2 control-label">购物车数量</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="cartnum" value="0" class="diy-bind" data-bind-child="params" data-bind="cartnum" data-bind-init="true" <%if params.cartnum==0 || !params.cartnum%>checked="checked"<%/if%>>不显示</label>
            <label class="radio-inline"><input type="radio" name="cartnum" value="1" class="diy-bind" data-bind-child="params" data-bind="cartnum" data-bind-init="true" <%if params.cartnum==1%>checked="checked"<%/if%>> 显示</label>
            <div class="help-block">提示：开启后将在链接为"购物车"的一级菜单上显示购物车数量</div>
        </div>
    </div>

    <%if params.cartnum==1%>
        <div class="form-group">
            <div class="col-sm-2 control-label">背景颜色</div>
            <div class="col-sm-4">
                <div class="input-group">
                    <input class="form-control input-sm diy-bind color" type="color" data-bind-child="style" data-bind="cartbgcolor" value="<%style.cartbgcolor||'#ff0011'%>" />
                    <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ff0011').trigger('propertychange')">清除</span>
                </div>
            </div>
            <div class="help-block">(购物车数量 小圆点背景颜色)</div>
        </div>
    <%/if%>

    <div class="line"></div>

    <div class="form-group">
        <div class="col-sm-2 control-label">背景颜色</div>
        <div class="col-sm-10" <%if params.navstyle==1%>style="width: 210px"<%/if%>>
            <div class="input-group">
                <span class="input-group-addon">默认</span>
                <input class="form-control input-sm diy-bind color" type="color" data-bind-child="style" data-bind="bgcolor" value="<%style.bgcolor%>" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ffffff').trigger('propertychange')">清除</span>
                <%if params.navstyle==0%>
                    <span class="input-group-addon" style="border-left: 0;">选中</span>
                    <input class="form-control input-sm diy-bind color" type="color" data-bind-child="style" data-bind="bgcoloron" value="<%style.bgcoloron%>" />
                    <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ffffff').trigger('propertychange')">清除</span>
                <%/if%>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">边框颜色</div>
        <div class="col-sm-10" style="width: 212px">
            <div class="input-group">
                <span class="input-group-addon">默认</span>
                <input class="form-control input-sm diy-bind color" type="color" data-bind-child="style" data-bind="bordercolor" value="<%style.bordercolor%>" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ffffff').trigger('propertychange')">清除</span>
            </div>
        </div>
    </div>

    <%if params.navstyle==0%>
        <div class="form-group">
            <div class="col-sm-2 control-label">图标颜色</div>
            <div class="col-sm-10">
                <div class="input-group">
                    <span class="input-group-addon">默认</span>
                    <input class="form-control input-sm diy-bind color" type="color" data-bind-child="style" data-bind="iconcolor" value="<%style.iconcolor%>" />
                    <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#999999').trigger('propertychange')">清除</span>
                    <span class="input-group-addon" style="border-left: 0;">选中</span>
                    <input class="form-control input-sm diy-bind color" type="color" data-bind-child="style" data-bind="iconcoloron" value="<%style.iconcoloron%>" />
                    <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#999999').trigger('propertychange')">清除</span>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-2 control-label">文字颜色</div>
            <div class="col-sm-10">
                <div class="input-group">
                    <span class="input-group-addon">默认</span>
                    <input class="form-control input-sm diy-bind color" type="color" data-bind-child="style" data-bind="textcolor" value="<%style.textcolor%>" />
                    <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#666666').trigger('propertychange')">清除</span>
                    <span class="input-group-addon" style="border-left: 0;">选中</span>
                    <input class="form-control input-sm diy-bind color" type="color" data-bind-child="style" data-bind="textcoloron" value="<%style.textcoloron%>" />
                    <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#666666').trigger('propertychange')">清除</span>
                </div>
            </div>
        </div>
    <%/if%>

    <%if params.navstyle==0%>
        <div class="line"></div>
        <div class="form-group">
            <div class="col-sm-2 control-label">子级颜色</div>
            <div class="col-sm-10">
                <div class="input-group">
                    <span class="input-group-addon">文字</span>
                    <input class="form-control input-sm diy-bind color" type="color" data-bind-child="style" data-bind="childtextcolor" value="<%style.childtextcolor%>" />
                    <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#666666').trigger('propertychange')">清除</span>
                    <span class="input-group-addon" style="border-left: 0;">背景</span>
                    <input class="form-control input-sm diy-bind color" type="color" data-bind-child="style" data-bind="childbgcolor" value="<%style.childbgcolor%>" />
                    <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#f4f4f4').trigger('propertychange')">清除</span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-2 control-label"></div>
            <div class="col-sm-10">
                <div class="input-group" style="width: 182px;">
                    <span class="input-group-addon">边框</span>
                    <input class="form-control input-sm diy-bind color" type="color" data-bind-child="style" data-bind="childbordercolor" value="<%style.childbordercolor%>" />
                    <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#bbbbbb').trigger('propertychange')">清除</span>
                </div>
            </div>
        </div>
    <%/if%>

    <div class="line"></div>

    <div class="form-items indent" data-min="1" data-max="5">
        <div class="inner" id="form-items">
            <%each data as item itemid %>
            <div class="item" data-id="<%itemid%>">
                <span class="btn-del del-item" title="删除"></span>

                <%if params.navstyle==0%>
                    <div class="title">一级菜单</div>
                <%/if%>

                <!---->
                <div class="item-body">
                    <div class="item-image <%if params.navstyle==0%>square<%/if%>">
                        <%if params.navstyle==1%>
                            <img src="<%imgsrc item.imgurl%>" onerror="this.src='../addons/ewei_shopv2/static/images/nopic.jpg';" id="pimg-<%itemid%>" style="background: #fff;" />
                        <%/if%>
                        <%if params.navstyle==0%>
                            <span class="btn-del" title="清空图标" onclick="$('#cicon-<%itemid%>').val('').trigger('change')"></span>
                            <div class="icon-main">
                                <%if item.iconclass!=''%>
                                    <span class="icon <%item.iconclass%>" id="picon-<%itemid%>"></span>
                                <%else%>
                                    <p>无图标</p>
                                <%/if%>
                            </div>
                            <div class="text goods-selector" data-toggle="selectIcon" data-input="#cicon-<%itemid%>" data-element="#picon-<%itemid%>">选择图标</div>
                            <input type="hidden" id="cicon-<%itemid%>" class="diy-bind" data-bind-parent="<%itemid%>" data-bind-child="data" data-bind="iconclass" data-bind-init="true" />
                        <%/if%>
                    </div>
                    <div class="item-form">
                        <div class="input-group" style="margin-bottom:0px; ">

                            <%if params.navstyle==0%>
                                <span class="input-group-addon">文字</span>
                                <input type="text" class="form-control input-sm diy-bind" value="<%item.text%>" placeholder="留空则不显示文字" data-bind-parent="<%itemid%>" data-bind-child="data" data-bind="text" />
                                <input type="hidden" class="diy-bind" id="cimg-<%itemid%>" data-bind-parent="<%itemid%>" data-bind-child="data" data-bind="imgurl" />
                            <%/if%>
                            <%if params.navstyle==1%>
                                <input type="text" class="form-control input-sm diy-bind" data-bind-parent="<%itemid%>" data-bind-child="data" data-bind="imgurl" id="cimg-<%itemid%>" placeholder="请选择图片或输入图片地址" value="<%item.imgurl%>" />
                                <span class="input-group-addon btn btn-default" data-toggle="selectImg" data-input="#cimg-<%itemid%>" data-img="#pimg-<%itemid%>">选择图片</span>
                            <%/if%>

                        </div>
                        <div class="input-group" style="margin-top:10px; margin-bottom:0px; ">
                            <input type="text" class="form-control input-sm diy-bind" data-bind-parent="<%itemid%>" data-bind-child="data" data-bind="linkurl" id="curl-<%itemid%>" placeholder="请选择链接或输入链接地址" value="<%item.linkurl%>" />
                            <span class="input-group-addon btn btn-default" data-toggle="selectUrl" data-input="#curl-<%itemid%>">选择链接</span>
                        </div>
                    </div>
                </div>

                <%if params.navstyle==0%>
                    <div class="title-child">二级菜单(已添加<%count(item.child)%>个) <%if count(item.child)>0%> 添加二级菜单后一级菜单链接将失效<a class="pull-right fold" style="font-size: 12px" data-tpye="0">收起</a><%/if%></div>
                    <div class="item-child">

                        <%if item.child%>
                            <%each item.child as childitem childid%>
                                <div class="item-body child" data-id="<%childid%>">
                                    <span class="btn-del del-child" title="删除"></span>
                                    <div class="item-image square drag-btn">拖动排序</div>
                                    <div class="item-form">
                                        <div class="input-group" style="margin-bottom:0px; ">
                                            <span class="input-group-addon">文字</span>
                                            <input type="text" class="form-control input-sm diy-bind" value="<%childitem.text%>" placeholder="留空则不显示文字" data-bind-three="<%childid%>" data-bind-parent="<%itemid%>" data-bind-child="data" data-bind="text"/>
                                        </div>
                                        <div class="input-group" style="margin-top:10px; margin-bottom:0px; ">
                                            <input type="text" class="form-control input-sm diy-bind" data-bind-three="<%childid%>" data-bind-parent="<%itemid%>" data-bind-child="data" data-bind="linkurl" id="curl-<%childid%>" placeholder="请选择链接或输入链接地址" value="<%childitem.linkurl%>" />
                                            <span class="input-group-addon btn btn-default" data-toggle="selectUrl" data-input="#curl-<%childid%>">选择链接</span>
                                        </div>
                                    </div>
                                </div>
                            <%/each%>
                        <%/if%>

                    </div>
                    <div class="btn btn-w-m btn-block btn-default btn-outline btn-sm" id="addChild"><i class="fa fa-plus"></i> 添加一个</div>
                <%/if%>

            </div>
            <%/each%>
        </div>
        <div class="btn btn-w-m btn-block btn-default btn-outline" id="addItem"><i class="fa fa-plus"></i> 添加一个</div>
    </div>

</script>