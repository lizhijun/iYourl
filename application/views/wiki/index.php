<?php 
    
	include("markdown.php");

    //$text ="##你好";
    
    $url = "./wiki/wiki.md";
    $read = fopen($url,'r') or die('打开文件失败！');
    $text = fread($read,4096);
    fclose($read);
    
    $read = fopen($url,'r') or die('打开文件失败！');
    $content = "";
    while(!feof($read)){
        $content.=fgets($read,2048)."<br />";
    }
    fclose($read);
    
    $str = str_replace("\n", "", $content);
	$content = str_replace("\r", "", $str);

    
    //echo $content;
	
?>

<ul class="nav nav-tabs" style="background:#CEE3F8;">
	<li><a class="text-center" style="float:left;width:120px;" href="<?php echo base_url("");?>">91头条</a></li>
	<li><a href="<?php echo base_url("");?>">热门</a></li>

	<li><a href="<?php echo base_url("zuixin");?>">最新</a></li>
	<li><a href="<?php echo base_url("rising");?>">上升最快</a></li>
	<li><a href="<?php echo base_url("controversial");?>">热议</a></li>
	<li><a href="<?php echo base_url("top");?>">得分</a></li>
	<li class="active"><a style='color:red;' href="<?php echo base_url("wiki/index");?>">wiki</a></li>
	<!--想要加入？马上<a href="#myModal" data-toggle="modal">注册或登录</a>-->
	<li style="float:right;width:260px;"><?php //echo $login_info;?></a></li>
</ul>

<div class="container-fluid">
  <div class="row-fluid">
    <div class="span9">
        
        
        <table class="table table-bordered" style="width:210px;">
			<tr><td>
				<ul class="nav nav-pills" style="margin-bottom: 0px;">
				  <li class="active"><a href="./index">主页</a></li>
				  <li><a href="./revisions">历史版本</a></li>
				  <li><a href="./discussions">讨论</a></li>
				</ul>
			</td></tr>
		</table>

        <div id="md"><?php echo markdown($text);?></div>

		<hr style="color:#fff">
		最新版本由 <a href="#">管理员</a> 于 6小时前 更新<a href="javascript:void(0);" id="source" class="pull-right">查看源码</a>   

    </div>
    
    <div class="span3">
        想要加入？马上<a href="#myModal" data-toggle="modal">注册或登录</a><!---->
		<?php //echo $login_info;?>
        <hr>
        <div>
            <input type="text" class="span12" placeholder="关键词搜索">
        </div>
        
		
        <table class="table table-bordered">
        <tr><td>
            <form class="form-inline"><!---->
			  <?php echo form_open('user/login');?>
              <input type="text" class="span6" name="username" placeholder="用户名">
              <input type="password" class="span6 pull-right" name="password" placeholder="密码">
              <br><br>
              <label class="checkbox span4">
                <input type="checkbox">记住我
              </label>
              
              <a class="checkbox" href="#">忘记密码?</a>
              <button type="submit" class="btn pull-right">登录</button>
            </form>
        </td></tr>
        </table>
		<!---->
		<?php //echo $login_form;?>

        <a class="btn btn-block btn-info" href="<?php echo base_url("submit");?>"> 提交你的链接</a>
        <br>
        <a class="btn btn-block btn-info" href="<?php echo base_url("submit/status");?>"> 提交你的内容</a>
    </div>
  </div>
</div>

<!--时间格式化-->
<?php
function formatTime($timer){
	
	$diff = $_SERVER['REQUEST_TIME'] - $timer;
	$day = floor($diff / 86400);
	$free = $diff % 86400;

	if($day > 0) {
		echo $day."天前";
	}else{
		if($free>0){
			$hour = floor($free / 3600);
			$free = $free % 3600;
			if($hour>0){
					echo $hour."小时前";
			}else{
				if($free>0){
					$min = floor($free / 60);
					$free = $free % 60;
					if($min>0){
						echo $min."分钟前";
					}else{
						if($free>0){
							echo $free."秒前";
						}else{
							echo '刚刚';
						}
					}
				}else{
					echo '刚刚';
				}
			}
		}else{
			echo '刚刚';
		}
	}
}
?>

<script type="text/javascript">
	var md = "<?php echo $content;?>";
	$(document).ready(function(){
		$("#source").click(function(){
			$("#md").after("<textarea rows='16' class='span12' readonly='readonly'>"+ md +"</textarea>");   
		});
	});
</script>