<div class="row-fluid">
		<div class="span11 pull-right">
			<?php echo form_open('user/register');?>

			<fieldset>
			<legend>注册用户</legend>
            
            <label for="username">用户名</label>
			<input id="reg_username" type="text" name="username" value="<?php echo set_value('username');?>" placeholder="输入用户名"/>&nbsp;&nbsp;<span id="chk_msg"></span><br />
			<div style="color:red;"><?php echo form_error('username');?></div>

			<label for="email">邮箱（可不填）</label>
			<input type="text" name="email" value="<?php echo set_value('email');?>" placeholder="输入邮箱"/><br />
            <!--<span class="help-block">我们不会主动给你发送邮件。</span>-->
			<div style="color:red;"><?php echo form_error('email');?></div>

			<label for="password">密码</label>
			<input type="password" name="password" value="<?php echo set_value('password');?>" placeholder="输入密码"/><br />
			<div style="color:red;"><?php echo form_error('password');?></div>

            <label for="passconf">确认密码</label>
			<input type="password" name="passconf" value="<?php echo set_value('passconf');?>" placeholder="再次输入密码"/><br />
			<div style="color:red;"><?php echo form_error('passconf');?></div>
			
            <img src="<?php echo base_url('user/captcha');?>" />
            <label for="captcha">验证码</label>
            <input type="text" name="captcha" placeholder="输入上图中的4个字符"/>
            <div style="color:red;"><?php if(!empty($error)){echo $error;}?><?php echo form_error('captcha');?></div>
            
            <label class="checkbox">
                <input type="checkbox" name="remember"/> 记住我
            </label>
			
			<button class="btn btn-primary" type="submit" name="submit" >提交</button>

            <!--错误提示<span id="msg"></span>-->

			</fieldset>
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
