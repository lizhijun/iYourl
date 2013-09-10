<?php require "formatTime.php";?><!--格式化时间-->

<ul class="nav nav-tabs" style="background:#CEE3F8;">
	<li><a class="text-center" style="float:left;width:120px;" href="<?php echo base_url("");?>">91头条</a></li>
	<li><a href="<?php echo base_url("");?>">热门</a></li>

	<li><a href="<?php echo base_url("zuixin");?>">最新</a></li>
	<li class="active"><a style='color:red;' href="<?php echo base_url("rising");?>">上升最快</a></li>
	<li><a href="<?php echo base_url("controversial");?>">热议</a></li>
	<li><a href="<?php echo base_url("top");?>">得分</a></li>
	<li><a href="<?php echo base_url("wiki/index");?>">wiki</a></li>
	<!--想要加入？马上<a href="#myModal" data-toggle="modal">注册或登录</a>-->
	<li style="float:right;width:260px;"><?php echo $login_info;?></a></li>
</ul>


<div class="container-fluid">
  <div class="row-fluid">
    <div class="span9">
        
        
        <style type="text/css">
            div.left {/*background-color:#369;*/height:60px;width:50px;float:left;text-align:center;}
            div.rank {/*background-color:#ffff99;*/height:40px;width:20px;float:left;text-align:center;}
            div.digg {/*background-color:#ffff99;*/height:40px;width:20px;float:left;text-align:center;}
            div.middle {/*background-color:#369;height:80px;width:80px;*/float:left;text-align:center;}/*自适应图片大小*/
        </style>

        <?php foreach($link as $link_item):?>
            

            <div class="row-fluid">
                <div class="span12">
                    
                    <div class="link" style="margin-bottom:11px;"><!-- style="background-color:#9bb;"-->
                    <div class="row-fluid">   
                        <div class="left"><!-- style="background-color:#3bb;"-->
                            
                            <div class="row-fluid">
                                <div class="rank">
                                <div>  </div>
                                <div style="color: #c6c6c6;font-size: medium;text-align: right;margin-right:10px;">  <br /><?php echo $link_item['rank']?></div>
                                <div>  </div>
                                </div>
                                <div class="digg">
                                    
									<div><a href="javascript:void(0)" id="up-<?php echo $link_item['id'];?>" onclick="up(<?php echo $link_item['id'];?>)"><i class="icon-thumbs-up"></i></a></div>
                                    
									<strong><div class="text-center" style="line-height: 1.6em;font-weight: bold;" id="show-<?php echo $link_item['id'];?>"><?php //echo $link_item['score'];?>•</div></strong>
                                    
									<div><a href="javascript:void(0)" id="down-<?php echo $link_item['id'];?>" onclick="down(<?php echo $link_item['id'];?>)"><i class="icon-thumbs-down"></i></a></div>
                                
								</div>
                            </div>
                          
                        </div>
                      
                        <div class="middle"><a href="<?php echo $link_item['url'];?>"><img class="media-object" src="<?php echo base_url("pics/id".$link_item['id'].".jpg");?>"></a></div>
						
                        <div class="row-fluid">   
                            <div class="span8">
                                <div>&nbsp;&nbsp;<strong><a style="text-decoration: none;color: blue;" href="<?php echo $link_item['url'];?>"><?php echo $link_item['title']?></a></strong>&nbsp; &nbsp;<span style="color:#888;">(<a style="color:#888;" href="<?php echo base_url().'domain/'.$link_item['domain'].'/';?>"><?php echo $link_item['domain'];?></a>)</span></div>
                                <div>&nbsp;
                                    <small style="color:#888;">发布于 <?php formatTime($link_item['created']);?>&nbsp;&nbsp;发布者：<a style="color: #369;" href="#"><?php echo $link_item['username']?></a>&nbsp;&nbsp;&nbsp;分类：<a style="color: #369;" href="#"><?php echo $link_item['category']?></a></small>
                                </div>
                                <div>
                                    <div>&nbsp;
                                        <strong><a style="color:#888;line-height: 1.6em;" href="<?php echo base_url("comments/view")."/".$link_item['id'];?>"> <?php echo $link_item['comments'];?>&nbsp;评论</a>
                                        &nbsp;&nbsp;
                                        <a class="sharer" style="color:#888;line-height: 1.6em;" href="javascript:void(0)" onclick="set_share(this)">分享</a></strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					</div><!--/left-->
                </div>
            </div><!--/row-fluid-->

        <?php endforeach?>

        <?php echo $this->pagination->create_links(); ?>
    </div>
    
    <div class="span3">
        <div>
            <input type="text" class="span12" placeholder="关键词搜索">
        </div>
        
		<!--
        <table class="table table-bordered">
        <tr><td>
            <!--<form class="form-inline">--//>
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
		-->
		<?php echo $login_form;?>

        <a class="btn btn-block btn-info" href="<?php echo base_url("submit");?>">分享你的链接</a>
        <br>
        <a class="btn btn-block btn-info" href="<?php echo base_url("submit/status");?>">分享你的文字</a>
    </div>
  </div>
</div>

<!--登录或注册弹出对话框--> 
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" title="关闭">&times;</button>
    <h4 id="myModalLabel">您需要登录或注册才能执行此操作</h4>
  </div>
  
  <div class="modal-body">
	
	<div class="row-fluid">
		<div class="span4">
			<?php echo form_open('user/register');?>

			<fieldset>
			<br/>
            <strong><div style="font-size:18px">注册用户</div></strong>
            <br/>
            
            <label for="username">用户名</label>
			<input id="reg_username" type="text" name="username" value="<?php echo set_value('username');?>" placeholder="输入用户名"/><br />
			<div style="color:red;"><?php echo form_error('username');?></div>

			<label for="email">邮箱（用于找回密码）</label>
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
			<br/>
			<button class="btn btn-primary" type="submit" name="submit" >提交</button>

            <!--错误提示<span id="msg"></span>-->

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
					<table style=" border-right:2px solid #ddd;height:530px;" >
						<tr><td >&nbsp;</td></tr>
					</table>
				</div>
			</div>
		</div>
		<div class="span5">
			<?php echo form_open('user/login');?>
            <br/>
			<fieldset>
			<strong><div style="font-size:18px">登录</div></strong>
            <small>已拥有账号并想要登录？</small>
            <br/><br/>
			<label for="username">用户名</label>
			<input type="text" name="username" placeholder="输入用户名"/><br />
			<?php echo form_error('username');?>

			<label for="password">密码</label>
			<input type="password" name="password" placeholder="输入密码"/><br />
			<?php echo form_error('password');?>

            <label class="checkbox">
                <input type="checkbox" name="remember"/> 记住我
            </label>

            <a class="checkbox" href="recover_pwd">忘记密码?</a>
            <br/><br/>
			<button class="btn btn-primary" type="submit" name="submit" >登录</button>

			</fieldset>
			</form>
		</div>
	</div>

  </div>
  
</div>

<script type="text/javascript">
    function up(id){
		var upped=parseInt($("#show-"+id).html())+1;
        $.ajax({
               type:"POST",
               url:"<?php echo base_url('comments/up');?>",
               data:{ 'score' : upped,'id' : id },
               success:function(){
                  var scoreHTML = "";
                  scoreHTML = upped;
                  $("#show-"+id).html(scoreHTML);
               }
        });
	}
	function down(id){
		var downed=parseInt($("#show-"+id).html())-1;
        $.ajax({
               type:"POST",
               url:"<?php echo base_url('comments/up');?>",
               data:{ 'score' : downed,'id' : id },
               success:function(){
                  var scoreHTML = "";
                  scoreHTML = downed;
                  $("#show-"+id).html(scoreHTML);
               }
        });
	}
	function set_share(obj){
        
		if($(obj).text()=='分享')
		{
			replyForm = "<div class='share' style='margin-top:18px;'><form class='form-horizontal' action='<?php echo base_url('share');?>' method='post' accept-charset='utf-8'>"+
  
			  "<div class='control-group'>"+
				"<label class='control-label' for='toEmail'>对方邮箱</label>"+
				"<div class='controls'>"+
				  "<input class='span8' type='text' name='toEmail' value='<?php echo set_value('toEmail');?>'>"+
				  "<span style='color:red;' class='help-inline'><?php echo form_error('toEmail');?></span>"+
				"</div>"+
			  "</div>"+
			  
			  "<div class='control-group'>"+
				"<label class='control-label' for='fromName'>你的称呼</label>"+
				"<div class='controls'>"+
				  "<input class='span8' type='text' name='fromName' value='<?php echo set_value('fromName');?>'>"+
				  "<span style='color:red;' class='help-inline'><?php echo form_error('fromName');?></span>"+
				"</div>"+
			  "</div>"+

			  "<div class='control-group'>"+
				"<label class='control-label' for='fromEmail'>你的邮箱</label>"+
				"<div class='controls'>"+
				  "<input class='span8' type='text' name='fromEmail' value='<?php echo set_value('fromEmail');?>'>"+
				  "<span style='color:red;' class='help-inline'><?php echo form_error('fromEmail');?></span>"+
				"</div>"+
			  "</div>"+

			  "<div class='control-group'>"+
				"<label class='control-label' for='message'>分享理由</label>"+
				"<div class='controls'>"+
				  "<textarea rows=3 class='span8' type='text' name='message'><?php echo set_value('message');?></textarea>"+
				  "<span style='color:red;' class='help-inline'><?php echo form_error('message');?></span>"+
				"</div>"+
			  "</div>"+
			  
			  "<div class='control-group'>"+
				"<div class='controls'>"+
				  "<img src='<?php echo base_url('user/captcha');?>' />"+
				"</div>"+
			  "</div>"+

			  "<div class='control-group'>"+
				"<label class='control-label' for='captcha'>验证码</label>"+
				"<div class='controls'>"+
				  "<input class='span8' type='text' name='captcha' placeholder='输入上图中的4个字符'>"+
			      "<span style='color:red;' class='help-inline'><?php if(!empty($error)){echo $error;}?><?php echo form_error('captcha');?></span>"+	
				"</div>"+			
			  "</div>"+
			  
			  "<div class='control-group'>"+
				"<div class='controls'>"+
				  "<button type='button' onclick='submit_share(this)'>提交</button>&nbsp;&nbsp;"+
				  "<button type='button' onclick='cancel_share(this)'>取消</button>"+
				"</div>"+
			  "</div>"+

			"</form></div>";

			$(obj).parent().after(replyForm);
			$(obj).text('取消');
			//$(obj).nextAll("div").children("#content").focus();
		}else{
			
			$(obj).parent().siblings(".share").remove();
			$(obj).text('分享');
		}
    }
	function cancel_share(obj){
        
		$(obj).parent().parent().parent().parent().siblings("strong").children(".sharer").text("分享");
		$(obj).parent().parent().parent().parent().remove().parent().remove();
    }
	function submit_share(obj){
        //var content = $(obj).siblings("#content").val();
        //var pid = $(obj).siblings("#pid").val();
        alert('功能还在开发');
		$.ajax({
                type:"POST",
                url:"<?php echo base_url('comments/reply_ajax');?>",
                data:{'content':content,'pid':pid},
                error:function(){
                    alert("error");
                },
                success:function(data){
                    
                    if(data){
                        
                        update_reply = "链接已被分享";
                        $(obj).parent().after(update_reply);
                        $(obj).parent().hide();
                    }
                    
                    
                }
            });
    }
	$(document).ready(function(){
		$("#reg_username").change(function(){
			//alert('ok');   
		});
	});
</script>