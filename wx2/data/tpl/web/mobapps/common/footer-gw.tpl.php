<?php defined('IN_IA') or exit('Access Denied');?>			</div>
		</div>
	</div>
    
    
          </section>
      </section>
      <!--main content end-->
		<script type="text/javascript">
			require(['bootstrap']);
			<?php  if($_W['isfounder'] && !defined('IN_MESSAGE')) { ?>
			function checkupgrade() {
				require(['util'], function(util) {
					if (util.cookie.get('checkupgrade_sys')) {
						return;
					}
					$.getJSON("<?php  echo url('utility/checkupgrade/system');?>", function(ret){
						if (ret && ret.message && ret.message.upgrade == '1') {
							$('body').prepend('<div id="upgrade-tips" class="upgrade-tips"><a href="./index.php?c=cloud&a=upgrade&">系统检测到新版本 '+ret.message.version+' ('+ ret.message.release +') ，请尽快更新！</a><span class="tips-close" style="background:#d03e14;" onclick="checkupgrade_hide();"><i class="fa fa-times-circle"></i></span></div>');
							if ($('#upgrade-tips-module').size()) {
								$('#upgrade-tips').css('top', '25px');
							}
						}
					});
				});
			}

			function checkupgrade_hide() {
				require(['util'], function(util) {
					util.cookie.set('checkupgrade_sys', 1, 3600);
					$('#upgrade-tips').hide();
				});
			}
			$(function(){
				checkupgrade();
			});
			<?php  } ?>

			<?php  if($_W['uid']) { ?>
				function checknotice() {
					$.post("<?php  echo url('utility/notice')?>", {}, function(data){
						var data = $.parseJSON(data);
						$('#notice-container').html(data.notices);
						$('#notice-total').html(data.total);
						if(data.total > 0) {
							$('#notice-total').css('background', '#ff9900');
						} else {
							$('#notice-total').css('background', '');
						}
						setTimeout(checknotice, 60000);
					});
				}
				checknotice();
			<?php  } ?>
		</script>
  <!--main content end-->
  </section>
  <script src="./static/mobapps/js/jquery.nicescroll.js" type="text/javascript"></script>
	<script type="text/javascript">
    //    sidebar toggle
        $(function() {
            function responsiveView() {
                var wSize = $(window).width();
                if (wSize <= 768) {
                    $('#container').addClass('sidebar-close');
                    $('#sidebar > ul').hide();
					$('#submemu').hide();
                }
    
                if (wSize > 768) {
                    $('#container').removeClass('sidebar-close');
                    $('#sidebar > ul').show();
					$('#submemu').show();
                }
            }
            $(window).on('load', responsiveView);
            $(window).on('resize', responsiveView);
        });
    
        $('.icon-reorder').click(function () {
            if ($('#sidebar > ul').is(":visible") === true) {
                $('#main-content').css({
                    'margin-left': '0px'
                });
				$('.subcontentwarp').css({
                    'width': '100%'
                });
                $('#sidebar').css({
                    'margin-left': '-120px'
                });
                $('#sidebar > ul').hide();
				$('#submemu').hide();
                $("#container").addClass("sidebar-closed");
            } else {
                $('#main-content').css({
                    'margin-left': '120px'
                });
				$('.subcontentwarp').removeAttr("style");
                $('#sidebar > ul').show();
				$('#submemu').show();
                $('#sidebar').css({
                    'margin-left': '0'
                });
                $("#container").removeClass("sidebar-closed");
            }
        });
    
    // custom scrollbar
    $("html").niceScroll({styler:"fb",cursorcolor:"#e8403f", cursorwidth: '6', cursorborderradius: '10px',autohidemode: false, background: '#404040', cursorborder: '0', zindex: '1000'});
	
	var h = document.documentElement.clientHeight;
	$("#container").css('min-height',h-30);	
	$(window).resize(function() {
		var h = document.documentElement.clientHeight;
		$("#container").css('min-height',h-30);
	});
    </script>
</body>
</html>
