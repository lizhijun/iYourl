<div class="container">

<ul class="nav nav-tabs">
  <li><a href="<?php echo base_url("status");?>">热门</a></li>
  <li class="active"><a href="<?php echo base_url("status/latest");?>">最新</a></li>
  <li><a href="<?php echo base_url("status/rising");?>">上升最快</a></li>
  <li><a href="<?php echo base_url("status/controversial");?>">热议</a></li>
  <li><a href="<?php echo base_url("status/top");?>">得分</a></li>
  <li><a href="<?php echo base_url("status/wiki");?>">存档</a></li>
</ul>

<?php foreach($status as $status_item):?>
    
    &nbsp &nbsp &nbsp &nbsp<a href="#"><i class="icon-thumbs-up"></i></a><br />

    <?php echo $status_item['rank']?> &nbsp <?php echo $status_item['score']?> &nbsp &nbsp<?php echo $status_item['content']?><br />

    &nbsp &nbsp &nbsp &nbsp<a href="#"><i class="icon-thumbs-down"></i></a><br /><br />
    
    <i class="icon-time"></i>
    <?php 
        date_default_timezone_set("ETC/GMT-8");
        echo date("Y年m月d日H时i分s秒",$status_item['created']);
    ?>
    
    &nbsp &nbsp &nbsp &nbsp <i class="icon-tags"></i> <a href="#">测试</a>&nbsp &nbsp<a href="#">开发</a>
    
    <!--按钮样式
    <div class="btn-toolbar pull-right">
        <div class="btn-group">
            <a class="btn" href="<?php echo base_url("status/view")."/".$status_item['id']?>"><i class="icon-edit"></i> 回复</a>
            <a class="btn" href="#"><i class="icon-share"></i> 分享</a>
            <a class="btn" href="#"><i class="icon-star"></i> 收藏</a>
            <a class="btn" href="#"><i class="icon-tasks"></i> 更多</a>
        </div>
    </div>
    -->
    <div class="pull-right">
         <div>
            <a href="<?php echo base_url("status/view")."/".$status_item['id']?>"><i class="icon-edit"></i> 回复</a>
            <a href="#"><i class="icon-share"></i> 分享</a>
            <a href="#"><i class="icon-star"></i> 收藏</a>
            <a href="#"><i class="icon-tasks"></i> 更多</a>
         </div>
    </div>
    
    <hr>

<?php endforeach?>

<?php echo $this->pagination->create_links(); ?>

<!--
<div class="pagination pagination-centered">
    <ul>
        <li><a href="#">上一页</a></li>
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li><a href="#">6</a></li>
        <li><a href="#">7</a></li>
        <li><a href="#">下一页</a></li>
    </ul>
</div>
-->