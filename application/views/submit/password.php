<div class="container-fluid">
  <div class="row-fluid">
    <div class="span5">
        <ul class="nav nav-tabs" id="myTab">
          <!--<li><a href="#link">        </a></li>-->
		  <li class="active"><a style="background-color:#5f99cf;color:#fff" href="#link">找回密码</a></li>
        </ul>
         
        <div class="tab-content">
            <div class="tab-pane active" id="link">
                
                <?php echo form_open('password');?>
                <fieldset>
                    <table style="background-color:#cee3f8" class="table table-bordered"><tr><td>
                    
                    <label for="title">用户名</label>
                    <input class="span12" id="username" name="username"/><br />
                    <div style="color:red"><?php echo form_error('username');?></div>
                    </td></tr></table>
                  
                    <button class="btn btn-primary  pull-left" type="submit" name="submit" >给我发邮件</button>
                </fieldset>
                </form>
            </div>           
        </div>

    </div>


    <div class="span3 pull-right">
        <div class="pull-right"><?php echo $this->session->userdata('username');?>(<abbr title="链接积分"><strong>1</strong></abbr>) | <a title="没有新消息" href="<?php echo base_url('message/inbox');?>"><i class="icon-envelope"></i></a> | <strong><a href="#">偏好</a></strong> | <a href="<?php echo base_url("user/logout");?>">退出</a> </div>
        <br>
        <hr>
        <div>
            <input type="text" class="span12" placeholder="关键词搜索">
        </div>

		<table class="table table-bordered">
			<tr><td>
				<form class="form-inline">
				  <?php echo form_open('user/login');?>
				  <input type="text" class="span6" name="username" placeholder="用户名">
				  <input type="password" class="span6 pull-right" name="password" placeholder="密码">
				  <br><br>
				  <label class="checkbox span4">
					<input type="checkbox">记住我
				  </label>
				  
				  <a class="checkbox" href="/password">忘记密码?</a>
				  <button type="submit" class="btn pull-right">登录</button>
				</form>
			</tr></td>
        </table>

    </div>
  </div>
</div>