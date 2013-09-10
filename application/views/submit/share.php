<div class="row-fluid">
		<div class="span11 pull-right">
			
			<legend>分享</legend>
			
			<form class="form-horizontal" action="<?php echo base_url('share');?>" method="post" accept-charset="utf-8">
  
			  <div class="control-group">
				<label class="control-label" for="toEmail">对方邮箱</label>
				<div class="controls">
				  <input class="span4" type="text" name="toEmail" value="<?php echo set_value('toEmail');?>">
				  <span style="color:red;" class="help-inline"><?php echo form_error('toEmail');?></span>
				</div>
			  </div>
			  
			  <div class="control-group">
				<label class="control-label" for="fromName">你的称呼</label>
				<div class="controls">
				  <input class="span4" type="text" name="fromName" value="<?php echo set_value('fromName');?>">
				  <span style="color:red;" class="help-inline"><?php echo form_error('fromName');?></span>
				</div>
			  </div>

			  <div class="control-group">
				<label class="control-label" for="fromEmail">你的邮箱</label>
				<div class="controls">
				  <input class="span4" type="text" name="fromEmail" value="<?php echo set_value('fromEmail');?>">
				  <span style="color:red;" class="help-inline"><?php echo form_error('fromEmail');?></span>
				</div>
			  </div>

			  <div class="control-group">
				<label class="control-label" for="message">分享理由</label>
				<div class="controls">
				  <textarea rows=3 class="span4" type="text" name="message"><?php echo set_value('message');?></textarea>
				  <span style="color:red;" class="help-inline"><?php echo form_error('message');?></span>
				</div>
			  </div>
			  
			  <div class="control-group">
				<div class="controls">
				  <img src="<?php echo base_url('user/captcha');?>" />
				</div>
			  </div>

			  <div class="control-group">
				<label class="control-label" for="captcha">验证码</label>
				<div class="controls">
				  <input class="span4" type="text" name="captcha" placeholder="输入上图中的4个字符">
			      <span style="color:red;" class="help-inline"><?php if(!empty($error)){echo $error;}?><?php echo form_error('captcha');?></span>	
				</div>			
			  </div>
			  
			  <div class="control-group">
				<div class="controls">
				  <button class="btn btn-primary" type="submit" name="submit" >提交</button>&nbsp;&nbsp;
				  <button class="btn btn-primary" type="submit" name="cancel" >取消</button>
				</div>
			  </div>

			</form>

	</div>
</div>

<script type="text/javascript">
   $(document).ready(function(){
        $("#reg_username").keyup(function(){
            var username = $(this).val();
            //alert(username);
            $.ajax({
                type:"POST",
                url:"<?php echo base_url('user/chk_username');?>",
                data:{'username':username},
                error:function(){
                    alert("error");
                },
                success:function(msg){
                    $("#chk_msg").html(msg);
                }
            });
        });
   });
</script>