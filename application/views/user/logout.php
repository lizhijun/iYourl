<div class="container-fluid">
  <div class="row-fluid">
    <div class="span12">
        
        <div class="row-fluid">
		<div class="span4">
			<?php echo form_open('user/register');?>

			<fieldset>
			<legend>注册用户</legend>
	
			<!--
			<div class="alert alert-error alert-block">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			-->
			<?php echo validation_errors();?>
			<!--
			</div>
			-->

			<label for="email">邮箱</label>
			<input type="text" name="email" placeholder="输入邮箱"/><br />

			<label for="password">密码</label>
			<input type="password" name="password" placeholder="输入密码"/><br />

			<button class="btn btn-primary" type="submit" name="submit" >提交</button>

			</fieldset>
			</form>

		</div>
		<div class="span3">
			<div class="row-fluid">
				<div class="span11">
					<br />
					<br />
					<h5>隐私政策</h5>
					<ul>
						<li>我们承诺决不会收集关于你和你使用本站的数据。</li>
						<li>您的个人信息我们会严格保密。</li>
						<li>我们保证绝不会泄露你的隐私信息。</li>
						<li>除法律要求外，我们保证绝不会泄露你的隐私信息。</li>
					</ul>
					<p>更多详情请访问<a href="#">隐私政策</a>。</p>
				</div>
				<div class="span1"><!--模拟垂直线-->
					<table style=" border-right:1px solid #000000;height:400px;" >
						<tr><td >&nbsp;</td></tr>
					</table>
				</div>
			</div>
		</div>
		<div class="span5">
			<?php echo form_open('user/register');?>

			<fieldset>
			<legend>登录</legend>
	
			<!--
			<div class="alert alert-error alert-block">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			-->
			<?php echo validation_errors();?>
			<!--
			</div>
			-->

			<label for="email">邮箱</label>
			<input type="text" name="email" placeholder="输入邮箱"/><br />

			<label for="password">密码</label>
			<input type="password" name="password" placeholder="输入密码"/><br />

			<button class="btn btn-primary" type="submit" name="submit" >登录</button>

			</fieldset>
			</form>
		</div>
	</div>

    </div>
  </div>
</div>