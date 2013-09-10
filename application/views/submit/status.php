<div class="container-fluid">
  <div class="row-fluid">
    <div class="span7">
        <ul class="nav nav-tabs" id="myTab">
		  <li><a href="#link">        </a></li>
          <li><a href="#link">提交链接</a></li>
          <li class="active"><a href="#status">发布状态</a></li>
        </ul>
         
        <div class="tab-content">
            <div class="tab-pane active" id="link">
                
                <?php echo form_open('status/create');?>

                

                <fieldset>
                <legend>提交链接</legend>
                    
                    <!--
                    <div class="alert alert-error alert-block">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    -->
                    <?php echo validation_errors();?>
                    <!--
                    </div>
                    -->
                    
                    <label for="content">标题</label>
                    <textarea rows="2" class="span12" name="title" placeholder="该链接的标题......"/></textarea><br />
                    
                    <label for="url">url(链接)</label>
                    <input type="text" class="span12" name="url" placeholder="该链接的网址......"/><br />
                    <button class="btn btn-primary  pull-right" type="submit" name="curl_title" >建议标题</button>
                    <br />
                    <br />
                    
                    <label for="category">选择分类</label>
                    <input type="text" class="span12" name="category" placeholder="选择一个分类......"/><br />
                    <!--显示热门分类-->

                    <!--此处需要一个验证码-->

                    <button class="btn btn-primary  pull-left" type="submit" name="submit" >提交</button>

                </fieldset>
                </form>

            </div>
            <div class="tab-pane" id="status">
                <?php echo form_open('status/create');?>

                

                <fieldset>
                <legend>发布状态</legend>
                    
                    <!--
                    <div class="alert alert-error alert-block">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    -->
                    <?php echo validation_errors();?>
                    <!--
                    </div>
                    -->
                    
                    <label for="content">标题</label>
                    <textarea rows="2" class="span12" name="title" placeholder="该链接的标题......"/></textarea><br />

                    <label for="reason">内容（可不填）</label>
                    <textarea rows="4" class="span12" name="content" placeholder="你的分享理由......"/></textarea><br />
                    
                    <label for="category">选择分类</label>
                    <input type="text" class="span12" name="category" placeholder="选择一个分类......"/><br />
                    <!--显示热门分类-->

                    <!--此处需要一个验证码-->

                    <button class="btn btn-primary  pull-left" type="submit" name="submit" >提交</button>

                </fieldset>
                </form>
            </div>
        </div>
         
        <script>
            $('#myTab a').click(function (e) {
                e.preventDefault();
                $(this).tab('show');
            })
        </script>
    </div>
    <div class="span3 pull-right">
        <div class="pull-right">admin(<abbr title="链接积分"><strong>1</strong></abbr>) | <a href="#"><i class="icon-envelope"></i></a> |<strong><a href="#"> 偏好 </a></strong>|<a href="<?php base_url("user/logout");?>"> 退出 </a></div>
        <br>
        <hr>
        <div>
            <input type="text" class="span12" placeholder="关键词搜索">
        </div>
    </div>
  </div>
</div>

