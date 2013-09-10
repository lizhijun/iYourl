<?php require "formatTime.php";?><!--格式化时间-->

<div class="container-fluid">
    <div class="row-fluid"><!-- style="background-color:#9bb;"-->
        <div class="span9">
            <fieldset>
            
			<!--显示该状态-->
            <div class="row-fluid" style="margin:8px 0;">
                <div id="link">
            
				<style type="text/css">/*还需要改进*/
                    div.digg {/*background-color:#ffff99;*/height:40px;width:30px;float:left;text-align:center;}
                    div.picontainer {/*background-color:#369;*/height:80px;width:90px;float:left;text-align:center;}
					div.middle {/*background-color:#369;height:80px;width:80px;*/float:left;text-align:center;}/*自适应图片大小*/
                </style>
                       
					<div class="digg">
			
						<div><a href="javascript:void(0);" id="<?php echo $link_item['id'];?>" onclick="up(this);"><i class="icon-thumbs-up"></i></a></div>
						
						<strong><div id="show-<?php echo $link_item['id'];?>"><?php echo $link_item['score'];?></div></strong>
						
						<div><a href="javascript:void(0);" id="<?php echo $link_item['id'];?>" onclick="down(this);"><i class="icon-thumbs-down"></i></a></div>
			  
					</div>
              
					<div class="picontainer">
						<div class="middle">
							<a href="<?php echo $link_item['url'];?>"><img class="media-object" src="<?php echo base_url("pics/id".$link_item['id'].".jpg");?>"></a>
						</div>
					</div>
						
                  
                    <div><!--span10 pull-left-->
						<div><strong><a style="text-decoration: none;color: blue;" href="<?php echo $link_item['url']?>"><?php echo $link_item['title']?></a></strong>&nbsp; &nbsp;<span style="color:#888;">(<a style="color:#888;" href="<?php echo base_url().'domain/'.$link_item['domain'].'/';?>"><?php echo $link_item['domain'];?></a>)</div>
						<div>
							<small style="color:#888;">发布于<?php formatTime($link_item['created']);?>&nbsp;&nbsp;发布者：<a style="color: #369;" href="#"><?php echo $link_item['username']?></a>&nbsp;&nbsp;分类：<a style="color: #369;" href="#"><?php echo $link_item['category']?></a></small>
						</div>
						<div>
							<div><strong>
								<a style="color:#888;line-height: 1.6em;" href="<?php echo base_url("comments/view")."/".$link_item['id']?>"><?php echo $link_item['comments']?> 评论</a>
								&nbsp; &nbsp;<a style="color:#888;line-height: 1.6em;" href="#">分享</a>&nbsp; &nbsp;<a style="color:#888;line-height: 1.6em;" href="#">收藏</a>&nbsp; &nbsp;<a style="color:#888;line-height: 1.6em;" id="hide_link" href="javascript:void(0)">隐藏</a>&nbsp; &nbsp;<a style="color:#888;line-height: 1.6em;" href="#">举报</a>
							</div></strong>
						</div>
                    </div>
                  
					
				
				</div>
			</div>
				
				<!--该状态显示完毕-->
	    		<div>置顶 200 条评论  <small><a href="javascript:void(0)">显示全部 336</a></small><div>
                <div style="border-top:dashed 1px #000000;width:100%;"> </div><!--画一条分隔虚线-->

                <div><small style="color:#888;">排序条件: <a href="javascript:void(0)">最好的</a>(下拉选择)</small><div>
                <br>
                <textarea rows="4" class="span6" name="content" id="content"/></textarea><br />
				<input type="hidden" name="pid" id="pid" value="<?php echo $link_item['id']?>" />
				<!--<button class="btn btn-primary  pull-left" type="submit" name="submit" >提交</button>-->
                <!--<div id="error_msg"></div>-->
                <button type="submit" id="submit_reply">提交</button>
			
				</fieldset>
				</form>
		        
                <br/>
			    
                <!--新提交的回复-->
                <div id="update_reply"></div>
                
                <?php echo $tree;?>

				<?php foreach($reply as $reply_item):?>
				
				<!--显示该状态的回复--/>
                <div>
				<div class="row-fluid">
						  
					<div class="span12">
						<style>
							/*
                            #minus { color:#369;font-size:16px;}
							
                            #switch a:hover{ color:#fff;background:#369;text-decoration: none;}
						    */
                        </style>
						
						<div id="switch">
							<a class="hide_up" href="javascript:void(0)" id="<?php echo $reply_item['id'];?>" onclick="rply_up(this)"><i class="icon-thumbs-up"></i></a>
                        
							<a id="minus" href="javascript:void(0)" onclick="switch_state(this)">[-]</a>&nbsp;<small>
							
                            <a href="#"><?php echo $reply_item['username']?></a>&nbsp;&nbsp;<span id="show-<?php echo $reply_item['id'];?>"><?php echo $reply_item['score'];?></span>分&nbsp;&nbsp;发表于<?php formatTime($reply_item['created']);?>
                            &nbsp;
								(<a class="hide_rply" href="<?php echo base_url("comments/view")."/".$reply_item['id']?>"> <?php echo $reply_item['comments']?> 回复</a>)</small>
						</div>
						
						<div class="hide_content">
                            <a href="javascript:void(0)" id="<?php echo $reply_item['id'];?>" onclick="rply_down(this)"><i class="icon-thumbs-down"></i></a>
                            
                            <span ><?php echo $reply_item['content']?></span>
                            <!--<input type="hidden" class="show" value="<?php echo $reply_item['id']?>"/>--/>
						</div>

						<div class="hide_function">
							<div>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<small><a href="#">收藏</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">举报</a>&nbsp;&nbsp;&nbsp;&nbsp;</small><a href="javascript:void(0)" onclick="set_reply(this)" id="<?php echo $reply_item['id']?>"><small>{回复}</small></a><!--&nbsp;&nbsp;
								<small><a href="javascript:void(0)" id="<?php //echo $reply_item['id']?>" onclick="show_reply(this)">显示评论</a></small>--/>
							</div>

                            <!--画一条分隔线--/>
				            <div style="border-top:dashed 8px #fff;width:100%;"> </div>
						</div>
					</div>
					
				</div>
				
				<?php endforeach?>
				</div>
				<!--该状态的回复显示完毕-->
				
			  </div>
			  </div>
              <!--<a href="#load_more">加载更多(192条)</a><!--每次加载20条-->
			</div>
		</div>


        <div class="span3">
            
        </div>
    
	</div>
</div>

<script type="text/javascript">
		$(document).ready(function(){

        //默认post方式提交
		//$(".show").load("<?php echo base_url('comments/show_load');?>",{'id':$(".show").val()},function(data){alert(data);});
		
		$("#hide_link").click(function(){
            $("#link").fadeOut(800);
        });
        
        $("#submit_reply").click(function(){
            var content = $("#content").val();
            var pid = $("#pid").val();
            var commts = parseInt("<?php echo $link_item['comments'];?>")+1;
            
            $.ajax({
                type:"POST",
                url:"<?php echo base_url('comments/reply_ajax');?>",
                data:{'content':content,'pid':pid,'comments':commts},
                error:function(){
                    alert("error");
                },
                success:function(data){
                    
                    //$("#error_msg").html("<span style='color:red'>在这里说些什么吧</span>");
                    if(data){
                        
                        update_reply = "<div class='row-fluid'>"+
						  
					"<div class='span12'>"+
						"<style>"+
							
                            "/*#minus { color:#369;font-size:16px;}"+
							
                            "#switch a:hover{ color:#fff;background:#369;text-decoration: none;}*/"+
						    
                        "</style>"+
						
						"<div id='switch'>"+
							"<a class='hide_up' href='javascript:void(0)' id='<?php //echo $reply_item['id'];?>' onclick='rply_up(this)'><i class='icon-thumbs-up'></i></a>"+

							"&nbsp;<a id='minus' href='javascript:void(0)' onclick='switch_state(this)'>[-]</a>&nbsp;<small>"+
							
                            "<a href='#'><?php //echo $reply_item['username']?></a>&nbsp;&nbsp;<span id='show-<?php //echo $reply_item['id'];?>'><?php //echo $reply_item['score'];?></span>分&nbsp;&nbsp;发表于<?php //formatTime($reply_item['created']);?>"+
                            "&nbsp;"+
								"(<a class='hide_rply' href='<?php //echo base_url('comments/view').'/'.$reply_item['id']?>'> <?php //echo $reply_item['comments']?> 回复</a>)</small>"+
						"</div>"+
						
						"<div class='hide_content'>"+
                            "<a href='javascript:void(0)' id='<?php //echo $reply_item['id'];?>' onclick='rply_down(this)'><i class='icon-thumbs-down'></i></a>"+
                            
                            "&nbsp;<span>"+content+"</span>"+
                            "<!--<input type='hidden' class='show' value='<?php //echo $reply_item['id']?>'/>-->"+
						"</div>"+

						"<div class='hide_function'>"+
							"<div>"+
								"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<small><a href='#'>收藏</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href='#'>举报</a>&nbsp;&nbsp;&nbsp;&nbsp;</small><a href='javascript:void(0)' onclick='set_reply(this)' id='<?php //echo $reply_item['id']?>'><small>{回复}</small></a><!--&nbsp;&nbsp;"+
								"<small><a href='javascript:void(0)' id='<?php //echo $reply_item['id']?>' onclick='show_reply(this)'>显示评论</a></small>-->"+
							"</div>"+

                            "<!--画一条分隔线-->"+
				            "<div style='border-top:dashed 8px #fff;width:100%;'> </div>"+
						"</div>"+
					"</div>"+
					
				"</div>";
                        $("#update_reply").html(update_reply);
                    }
                    
                    
                }
            });
            
        });
    });  
    
    function up(obj){
        //alert(obj.id);
        var upped=parseInt($("#show-"+obj.id).html())+1;
        $.ajax({
               type:"POST",
               url:"<?php echo base_url('comments/up');?>",
               data:{ 'score' : upped,'id' : obj.id },
               success:function(){
                  var scoreHTML = "";
                  scoreHTML = upped;
                  $("#show-"+obj.id).html(scoreHTML);
               }
        });
    }

    function down(obj){
        //alert(obj.id);
        var upped=parseInt($("#show-"+obj.id).html())-1;
        $.ajax({
               type:"POST",
               url:"<?php echo base_url('comments/down');?>",
               data:{ 'score' : upped,'id' : obj.id },
               success:function(){
                  var scoreHTML = "";
                  scoreHTML = upped;
                  $("#show-"+obj.id).html(scoreHTML);
               }
        });
    }
    
    function rply_up(obj){
        //alert(obj.id);
        var upped=parseInt($("#show-"+obj.id).html())+1;
        $.ajax({
               type:"POST",
               url:"<?php echo base_url('comments/rply_up');?>",
               data:{ 'score' : upped,'id' : obj.id },
               error:function(){
                    alert("error");
               },
               success:function(){
                  var scoreHTML = "";
                  scoreHTML = upped;
                  $("#show-"+obj.id).html(scoreHTML);
               }
        });
    }

    function rply_down(obj){
        //alert(obj.id);
        var upped=parseInt($("#show-"+obj.id).html())-1;
        $.ajax({
               type:"POST",
               url:"<?php echo base_url('comments/rply_down');?>",
               data:{ 'score' : upped,'id' : obj.id },
               success:function(){
                  var scoreHTML = "";
                  scoreHTML = upped;
                  $("#show-"+obj.id).html(scoreHTML);
               }
        });
    }

    function set_reply(obj){
        if($(obj).nextAll().is("div"))
		{
			$(obj).nextAll("div").children("#content").focus();
		}
		else                   //此处不能直接用reply_item['id']
		{
			replyForm = "<div><div style='border-top:dashed 8px #fff;width:100%;'></div>&nbsp;&nbsp;&nbsp;&nbsp;<textarea rows='4' class='span6' name='content' id='content'/></textarea><br />"+
				"<input type='hidden' name='pid' id='pid' value='"+obj.id+"' />"+
                "&nbsp;&nbsp;&nbsp;&nbsp;<button type='button' onclick='submit_reply(this)'>提交</button>&nbsp;&nbsp;<button type='button' onclick='cancel_reply(this)'>取消</button></div>";
			$(obj).after(replyForm);
			$(obj).nextAll("div").children("#content").focus();
		}	
    }
	
    /*
	function show_reply(obj){
		//alert(obj.id);
		$.ajax({
			type:"POST",
			url:"<?php echo base_url('comments/show');?>",
			data:{'id':obj.id},
			error:function(){
				alert("error");
			},
			success:function(json_data){
		

				var json=eval(json_data); //将JSON的字符串解析成JSON数据格式

				$.each(json, function(k)   //对 jQuery 对象进行迭代，为每个匹配元素执行函数
				{   
					
					//json[k]['id'];
					alert(decodeURI(json[k]['content']));   
				});   
			
			}
		});
	}
    */

    function cancel_reply(obj){
        //alert($(obj).parent());
        $(obj).parent().remove(); //删除被选元素及其子元素
        $(obj).parent().siblings(".").remove();
    }

    function submit_reply(obj){
        var content = $(obj).siblings("#content").val();
        var pid = $(obj).siblings("#pid").val();
        $.ajax({
                type:"POST",
                url:"<?php echo base_url('comments/reply_ajax');?>",
                data:{'content':content,'pid':pid},
                error:function(){
                    alert("error");
                },
                success:function(data){
                    
                    //$("#error_msg").html("<span style='color:red'>在这里说些什么吧</span>");
                    if(data){
                        
                        update_reply = "<ul style='list-style-type:none'><li><!--画一条分隔线-->"+
				            "<div style='border-top:dashed 8px #fff;width:100%;'> </div>"+
							"<div class='row-fluid'>"+
						  
					"<div class='span12'>"+
						"<style>"+
							
                            "/*#minus { color:#369;font-size:16px;}"+
							
                            "#switch a:hover{ color:#fff;background:#369;text-decoration: none;}*/"+
						    
                        "</style>"+
						
						"<div id='switch'>"+
							"<a class='hide_up' href='javascript:void(0)' id='<?php //echo $reply_item['id'];?>' onclick='rply_up(this)'><i class='icon-thumbs-up'></i></a>"+

							"&nbsp;<a id='minus' href='javascript:void(0)' onclick='switch_state(this)'>[-]</a>&nbsp;<small>"+
							
                            "<a href='#'><?php //echo $reply_item['username']?></a>&nbsp;&nbsp;<span id='show-<?php //echo $reply_item['id'];?>'><?php //echo $reply_item['score'];?></span>分&nbsp;&nbsp;发表于<?php //formatTime($reply_item['created']);?>"+
                            "&nbsp;"+
								"(<a class='hide_rply' href='<?php //echo base_url('comments/view').'/'.$reply_item['id']?>'> <?php //echo $reply_item['comments']?> 回复</a>)</small>"+
						"</div>"+
						
						"<div class='hide_content'>"+
                            "<a href='javascript:void(0)' id='<?php //echo $reply_item['id'];?>' onclick='rply_down(this)'><i class='icon-thumbs-down'></i></a>"+
                            
                            "&nbsp;<span>"+content+"</span>"+
                            "<!--<input type='hidden' class='show' value='<?php //echo $reply_item['id']?>'/>-->"+
						"</div>"+

						"<div class='hide_function'>"+
							"<div>"+
								"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<small><a href='#'>收藏</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href='#'>举报</a>&nbsp;&nbsp;&nbsp;&nbsp;</small><a href='javascript:void(0)' onclick='set_reply(this)' id='<?php //echo $reply_item['id']?>'><small>{回复}</small></a><!--&nbsp;&nbsp;"+
								"<small><a href='javascript:void(0)' id='<?php //echo $reply_item['id']?>' onclick='show_reply(this)'>显示评论</a></small>-->"+
							"</div>"+
						"</div>"+
					"</div>"+
					
				"</div></li></ul>";
                        $(obj).parent().after(update_reply);
                        $(obj).parent().hide();
                    }
                    
                    
                }
            });
    }

    function switch_state(obj){
        if($(obj).text()=="[–]")
		{
			$(obj).text("[+]");
			$(obj).parent().siblings(".hide_content").hide().siblings(".hide_function").hide();
            $(obj).siblings(".hide_up").html("&nbsp;&nbsp;&nbsp;&nbsp;");
            $(obj).siblings(".hide_rply").hide();
            $(obj).parent().parent().parent().parent().nextAll("ul").hide('fast');
		}
		else
		{
			$(obj).text("[–]");
			$(obj).parent().siblings(".hide_content").show().siblings(".hide_function").show();
            $(obj).siblings(".hide_up").html("<i class='icon-thumbs-up'></i>");
            $(obj).parent().parent().parent().parent().nextAll("ul").show('fast');
		}	
    }
</script>