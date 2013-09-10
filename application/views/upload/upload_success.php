<!doctype html>
<html>
    <head>
        <title>上传图片表单</title>
    </head>
    <body>

    <h3>图片上传成功!</h3>

    <ul>
		<?php foreach ($upload_data as $item => $value):?>
		<li><?php echo $item;?>: <?php echo $value;?></li>
		<?php endforeach; ?>
    </ul>

    <p><?php echo anchor('upload', '继续上传图片!'); ?></p>

    </body>
</html>