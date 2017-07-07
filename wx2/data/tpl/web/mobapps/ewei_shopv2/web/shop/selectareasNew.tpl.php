<?php defined('IN_IA') or exit('Access Denied');?><style type='text/css'>
    .province { float:left; position:relative;width:150px; height:35px; line-height:35px;border:1px solid #fff;}
    .province:hover { border:1px solid #f7e4a5;border-bottom:1px solid #fffec6; background:#fffec6;}
    .province .provinceall { margin-top:10px;}
    .province ul { list-style: outside none none;position:absolute;padding:0;background:#fffec6;border:1px solid #f7e4a5;display:none;
        width:auto; width:300px; z-index:999999;left:-1px;top:32px;}
    .province ul li  { float:left;min-width:60px;margin-left:20px; height:30px;line-height:30px; }
    .modal-body {padding: 0px 30px 0px 30px}
    .checkbox-inline, .radio-inline {padding-left: 10px;}

    .modal-body {height:auto;}
    .row.row-title b {padding: 10px;}
    .row.row-areas .item {height:430px;overflow:auto; width: 33.33%; float: left;}
    .row.row-areas .child {padding-bottom: 10px; position: relative}
    .row.row-areas .child:before {content: ''; position: absolute; border-bottom: 1px dashed #eee; left: 10px; top:-1px; right: 10px}
    .row.row-areas .child.active {background: #eee}
    .row.row-areas .child.active:before {border: 0}
    .row.row-areas .child:first-child:before {top: 0}
    .p-group, .c-group, .a-group {cursor: default}
    input[type=checkbox] {cursor: pointer}
</style>
<div id="modal-areas"  class="modal fade" tabindex="-1">
    <div class="modal-dialog" style='width: 600px;'>
        <div class="modal-content">
            <div class="modal-header"><button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button><h3>选择区域</h3></div>
            <div class="modal-body">
                <div class="row row-title">
                    <b class="col-sm-4">省份</b>
                    <b class="col-sm-4">城市</b>
                    <b class="col-sm-4">地区</b>
                </div>
                <div class="row row-areas form-horizontal">
                    <div class="item">
                        <?php  if(is_array($areas['province'])) { foreach($areas['province'] as $value) { ?>
                        <div class="child p-group">
                            <label class="checkbox-inline " style="cursor: default"><?php  echo $value['@attributes']['name']?></label>
                            <label class="checkbox-inline pull-right">
                                <input type="checkbox" id="ch_pcode<?php  echo $value['@attributes']['code']?>" class="provinceall" value="<?php  echo $value['@attributes']['name']?>" data-value="<?php  echo $value['@attributes']['code']?>" title="选择" />
                            </label>
                        </div>
                        <?php  } } ?>
                    </div>

                    <div class="item">
                        <?php  if(is_array($areas['province'])) { foreach($areas['province'] as $value) { ?>
                            <?php  if(is_array($value['city'])) { foreach($value['city'] as $city) { ?>
                                <div class="child c-group clist pcode_c<?php  echo $value['@attributes']['code']?>" style="display: none;">
                                    <label class="checkbox-inline " style="cursor: default"><?php  echo $city['@attributes']['name']?></label>
                                    <label class="checkbox-inline pull-right">
                                        <input type="checkbox" id="ch_ccode<?php  echo $city['@attributes']['code']?>" class="cityall checkbox_pcode<?php  echo $value['@attributes']['code']?>" value="<?php  echo $city['@attributes']['name']?>" data-value="<?php  echo $city['@attributes']['code']?>" pcode="<?php  echo $value['@attributes']['code']?>" pname="<?php  echo $value['@attributes']['name']?>" title="选择" />
                                    </label>
                                </div>
                            <?php  } } ?>
                        <?php  } } ?>
                    </div>

                    <div class="item">
                        <?php  if(is_array($areas['province'])) { foreach($areas['province'] as $value) { ?>
                            <?php  if(is_array($value['city'])) { foreach($value['city'] as $city) { ?>
                                <?php  if(is_array($city['county'])) { foreach($city['county'] as $county) { ?>
                                    <div class="child a-group alist pcode_a<?php  echo $value['@attributes']['code']?> ccode_a<?php  echo $city['@attributes']['code']?>" style="display: none;">
                                        <label class="checkbox-inline " style="cursor: default"><?php  echo $county['@attributes']['name']?></label>
                                        <label class="checkbox-inline pull-right">
                                            <input type="checkbox" id="ch_acode<?php  echo $county['@attributes']['code']?>" class="areaall checkbox_pcode<?php  echo $value['@attributes']['code']?> checkbox_ccode<?php  echo $city['@attributes']['code']?>" value="<?php  echo $county['@attributes']['name']?>" data-value="<?php  echo $county['@attributes']['code']?>" ccode="<?php  echo $city['@attributes']['code']?>" pcode="<?php  echo $value['@attributes']['code']?>" cname="<?php  echo $city['@attributes']['name']?>" pname="<?php  echo $value['@attributes']['name']?>" title="选择" />
                                        </label>
                                    </div>
                                <?php  } } ?>
                            <?php  } } ?>
                        <?php  } } ?>
                    </div>

                    <!--div class="col-sm-3" style="height:300px;overflow:auto" id="street_list">
                    </div-->


                    </div>
                <div class="row" style="margin-top:10px;display: none;">
                    已选择城市:<span id="city_info"></span>
                </div>
                <div class="row" style="margin-top:10px;display: none;">
                    已选择地区:<span id="area_info"></span>
                </div>
            </div>
            <div class="modal-footer">
                <span class="pull-left">Tip: 点击省份、城市展开子级</span>
                <a href="javascript:;" id='btnSubmitArea' class="btn btn-success" data-dismiss="modal" aria-hidden="true">确定</a>
                <a href="javascript:;" class="btn btn-default" data-dismiss="modal" aria-hidden="true">关闭</a>
            </div>
        </div>
    </div>
</div>
<script language='javascript'>
    var last_province_code  = 0;
    var last_city_code  = 0;
    var last_area_code  = 0;
    var xmlCityDoc;
    var xml_list = new Array();

    $(function(){

        $(".child:not(.a-group)").unbind('click').click(function () {
            $(this).addClass('active').siblings().removeClass('active');
        });

        $('.province').mouseover(function(){
            $(this).find('ul').show();
        }).mouseout(function(){
            $(this).find('ul').hide();
        });

        $('.p-group').click(function(){
            var province_code = $(this).find('input').attr('data-value');

            load_city(2, province_code, 0, 0);
        });

        $('.c-group').click(function(){
            var city_code = $(this).find('input').attr('data-value');
            load_city(2, 0, city_code, 0);
        });

        $('.a-group').click(function(){
            var area_code = $(this).find('input').attr('data-value');
            load_city(2, 0, 0, area_code);
        });

        $('.provinceall').click(function(){
            var province_code = $(this).attr('data-value');
            var checked = $(this).get(0).checked;
            var flag = 0;

            if(checked){
                flag = 1;
            }
            load_city(flag, province_code, 0, 0);
        });


        $('.cityall').click(function(){
            var city_code = $(this).attr('data-value');
            var checked = $(this).get(0).checked;
            var flag = 0;

            if(checked){
                flag = 1;
            }

            load_city(flag, 0, city_code, 0);
        });

        $('.areaall').click(function(){
            var area_code = $(this).attr('data-value');
            var checked = $(this).get(0).checked;
            var flag = 0;
            if(checked){
                flag = 1;
            }
            load_city(flag, 0, 0, area_code);
        });
    });

    function load_street(province_code, city_code){

        var result= $.inArray(city_code, xml_list);
        if (result == -1) {
            xml_list.push(city_code);
        } else {
            return;
        }

        var left = city_code.substring(0,2);
        var xmlUrl = '../addons/ewei_shopv2/static/js/dist/area/list/'+left+'/'+city_code+'.xml';
        xmlCityDoc = loadXmlFile(xmlUrl);

        var CityList = xmlCityDoc.childNodes[0].getElementsByTagName("county");
        var html = '';

        if(CityList && CityList.length>0) {
            for (var i = 0; i < CityList.length; i++) {
                var county = CityList[i];
                var county_code = county.getAttribute("code");
                var streetlist = county.getElementsByTagName("street");

                for (var m = 0; m < streetlist.length; m++) {
                    var street = streetlist[m];
                    var sname = street.getAttribute("name");
                    var scode = street.getAttribute("code");

                    html +='<div class="col-sm-12 slist pcode_s'+province_code+' ccode_s'+city_code+' acode_s'+county_code+'" style="padding:0;display: none;">';
                    html +='<input type="checkbox" class="streetall checkbox_pcode'+province_code+' checkbox_ccode'+city_code+' checkbox_acode'+county_code+'" value="'+sname+'" data-value="'+scode+'" style="margin-top:12px;" />';
                    html +='<span class="a-group">'+sname+'</span></div>';
                }
            }
        }
        $('#street_list').append(html);
    }

    function load_city(flag, province_code, city_code, area_code){

        if (province_code >0 ) {
            $('.clist').hide();
            $('.alist').hide();
            $('.pcode_c'+province_code).show();

            var city_code_first = $('.checkbox_pcode'+province_code).first().attr('data-value');
            last_province_code = province_code;

            if (flag == 0 ) {
                $('.checkbox_pcode'+province_code).removeAttr("checked");
            } else if (flag == 1 ) {
                $('.checkbox_pcode'+province_code).prop("checked",true);
            }
        }

        if (city_code >0 ) {
            $('.alist').hide();
            $('.ccode_a'+city_code).show();
            last_city_code = city_code;

            if (flag == 0 ) {
                $('.checkbox_ccode'+city_code).removeAttr("checked");
            } else if (flag == 1 ) {
                var pcode  =  $('#ch_ccode'+city_code).attr('pcode');
                $('#ch_pcode'+pcode).prop("checked",true);
                $('.checkbox_ccode'+city_code).prop("checked",true);
            }
        }

        if (area_code >0 ) {
            $('.slist').hide();
            $('.acode_s'+area_code).show();

            last_area_code = area_code;

            if (flag == 0 ) {
                $('.checkbox_acode'+area_code).removeAttr("checked");
            } else if (flag == 1 ) {
                var pcode  =  $('#ch_acode'+area_code).attr('pcode');
                var ccode  =  $('#ch_acode'+area_code).attr('ccode');
                $('#ch_pcode'+pcode).prop("checked",true);
                $('#ch_ccode'+ccode).prop("checked",true);
                $('.checkbox_acode'+area_code).prop("checked",true);
            }

            last_area_code = area_code;
        }

        if (flag == 0 || flag == 1) {
            update_area();
        }
    }

    function loadXmlFile(xmlFile) {
        var xmlDom = null;
        if (window.ActiveXObject) {
            xmlDom = new ActiveXObject("Microsoft.XMLDOM");
            xmlDom.async = false;
            xmlDom.load(xmlFile) || xmlDom.loadXML(xmlFile);//如果用的是XML字符串//如果用的是xml文件
        } else if (document.implementation && document.implementation.createDocument) {
            var xmlhttp = new window.XMLHttpRequest();
            xmlhttp.open("GET", xmlFile, false);
            xmlhttp.send(null);
            xmlDom = xmlhttp.responseXML;
        } else {
            xmlDom = null;
        }
        return xmlDom;
    }

    function clearSelects(){
        $('.c-group').hide();
        $('.a-group').hide();
        $('.p-group').removeClass('active');

        $('.provinceall').attr('checked',false).removeAttr('disabled');
        $('.cityall').attr('checked',false).removeAttr('disabled');
        $('.areaall').attr('checked',false).removeAttr('disabled');
    }

    function editArea(btn){
        current = $(btn).attr('random');
        clearSelects();

        var old_areas = $(btn).next().val().split(';');
        if(old_areas) {
            for(var i in old_areas){
                var area_info = old_areas[i].split(' ');
                if(area_info[0]) {
                    $('#ch_pcode'+area_info[0]).prop("checked",true);
                }
                if(area_info[1]) {
                    $('#ch_ccode'+area_info[1]).prop("checked",true);
                }
                if(area_info[2]) {
                    $('#ch_acode'+area_info[2]).prop("checked",true);
                }
            }
        }

        $("#modal-areas").modal();
        var citystrs = '';

        $('#btnSubmitArea').unbind('click').click(function(){
            update_area();
            var city_html = $('#city_info').html();
            var area_html = $('#area_info').html();

            $('.' + current + ' .cityshtml').html(city_html);
            $('.' + current + ' .citys').val(city_html);
            $('.' + current + ' .citys_code').val(area_html);
         })


        var currents = getCurrentsCode(current);
        currents = currents.split(';');

        var parentdisabled = false;
        for (var i in currents){
            var area_info = currents[i].split(' ');
            if(area_info[0]) {
                $('#ch_pcode'+area_info[0]).prop("disabled",true);
            }
            if(area_info[1]) {
                $('#ch_ccode'+area_info[1]).prop("disabled",true);
            }
            if(area_info[2]) {
                $('#ch_acode'+area_info[2]).prop("disabled",true);
            }
        }
    }

    function update_area(){

        var city_html = '';
        var area_html = '';

        var city_name_html = '';
        var area_name_html = '';

        var city_code_html = '';
        var area_code_html = '';

        $(".cityall:checked").each(function(){
            var value = $(this).attr('value');
            var code = $(this).attr('data-value');
            var pname = $(this).attr('pname');
            city_html += value+';';
        });

        $(".areaall:checked").each(function(){
            var value = $(this).attr('value');
            var code = $(this).attr('data-value');
            var cname = $(this).attr('cname');
            var ccode = $(this).attr('ccode');
            var pcode = $(this).attr('pcode');

            area_html += value+';';
            area_name_html += cname+' '+value+';';
            area_code_html += pcode+' '+ccode+' '+code+';';
        });

        $('#city_info').html(city_html);
        $('#area_info').html(area_code_html);
    }

    function selectAreas(){
        clearSelects();
        var old_areas = $('#selectedareas_code').val().split(';');

        if(old_areas) {
            for(var i in old_areas){

                var area_info = old_areas[i].split(' ');
                if(area_info[0]) {
                    $('#ch_pcode'+area_info[0]).prop("checked",true);
                }
                if(area_info[1]) {
                    $('#ch_ccode'+area_info[1]).prop("checked",true);
                }
                if(area_info[2]) {
                    $('#ch_acode'+area_info[2]).prop("checked",true);
                }
            }
        }

        $("#modal-areas").modal();
        var citystrs = '';
        $('#btnSubmitArea').unbind('click').click(function(){
            update_area();
            var city_html = $('#city_info').html();
            var area_html = $('#area_info').html();
            $('#areas').html(city_html);
            $("#selectedareas").val(city_html);
            $("#selectedareas_code").val(area_html);
        })
    }

</script>