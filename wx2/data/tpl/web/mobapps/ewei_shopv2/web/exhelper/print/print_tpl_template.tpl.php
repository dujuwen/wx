<?php defined('IN_IA') or exit('Access Denied');?><form class="form-horizontal form-validate" enctype="multipart/form-data">
<div id="chooseTemp" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
           <div class="modal-content">
            <div class="modal-header">
                <button data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">选择打印模板</h4>
            </div>
            <div class="modal-body">
            	
					<div class="form-group">
						<label class="col-sm-3 control-label">发件人模版</label>
						<div class="col-sm-8 col-xs-12">
							<select class="form-control" name="temp_sender" id="temp_sender">
								<?php  if(empty($temp_sender)) { ?>
									<option value="" data-name="">未查询到相关模板</option>
								<?php  } else { ?>
									<?php  if(is_array($temp_sender)) { foreach($temp_sender as $ts) { ?>
										<option value="<?php  echo $ts['id'];?>"><?php  if($ts['isdefault']==1) { ?>[默认]<?php  } ?><?php  echo $ts['sendername'];?>(<?php  echo $ts['sendertel'];?>) <?php  echo $ts['id'];?></option>
									<?php  } } ?>
								<?php  } ?>
							</select>
						</div> 
					</div>
					
					<div class="form-group">
						<label class="col-sm-3 control-label">快递单模板</label>
						<div class="col-sm-8 col-xs-12">
							<select class="form-control" name="temp_express" id="temp_express">
								<?php  if(empty($temp_express)) { ?>
									<option value="" data-name="">未查询到相关模板</option>
								<?php  } else { ?>
									<?php  if(is_array($temp_express)) { foreach($temp_express as $te) { ?>
										<option value="<?php  echo $te['id'];?>"><?php  if($te['isdefault']==1) { ?>[默认]<?php  } ?><?php  echo $te['expressname'];?></option>
									<?php  } } ?>
								<?php  } ?>
							</select>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-3 control-label">发货单模板</label>
						<div class="col-sm-8 col-xs-12">
							<select class="form-control" name="temp_invoice" id="temp_invoice">
								<?php  if(empty($temp_invoice)) { ?>
									<option value="" data-name="">未查询到相关模板</option>
								<?php  } else { ?>
									<?php  if(is_array($temp_invoice)) { foreach($temp_invoice as $ti) { ?>
										<option value="<?php  echo $ti['id'];?>"><?php  if($ti['isdefault']==1) { ?>[默认]<?php  } ?><?php  echo $ti['expressname'];?></option>
									<?php  } } ?>
								<?php  } ?>
							</select>
						</div>
					</div>
 
            </div>
            <div class="modal-footer">
                <span class="btn btn-primary" type="submit" data-dismiss="modal">确认选择</span>
                <span data-dismiss="modal" class="btn btn-default">取消</span>
            </div>
        </div>
	</div>
</div>
</form>


<div id="modal-send" class="modal fade" tabindex="-1" role="dialog" aria-hidden="false">
	<div class="modal-dialog" style="width: 850px;">
           <div class="modal-content">
            <div class="modal-header">
                <button data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">一键发货</h4>
            </div>
            <div class="modal-body" id="main" style="max-height: 700px; overflow-y: auto; padding: 5px 10px;">加载中...</div>
            <div class="modal-footer">
            	<?php if(cv('exhelper.print.single.dosend|exhelper.print.batch.dosend')) { ?>
                	<span class="btn btn-primary" onclick="doSend()" data-state="0" id="dosend">确认发货</span>
                <?php  } ?>
                <span data-dismiss="modal" class="btn btn-default" onclick="$('#dosend').data('state',0).text('确认发货')">关闭</span>
            </div>
        </div>
	</div>
</div>