<div class="span5">
			<?php echo form_open('user/login');?>

			<fieldset>
			<legend>登录</legend>

			<label for="username">用户名</label>
			<input type="text" name="username" placeholder="输入用户名"/><br />
			<?php echo form_error('username');?>

			<label for="password">密码</label>
			<input type="password" name="password" placeholder="输入密码"/><br />
			<?php echo form_error('password');?>

            <!--
			<label class="checkbox">
                <input type="checkbox" /> 记住我
            </label>
            -->

            <!--错误提示-->

			<button class="btn btn-primary" type="submit" name="submit" >登录</button>

			</fieldset>
			</form>
</div>