<!doctype html>
<html>
    <head>
        <title>上传图片表单</title>
    </head>
    <body>

        <?php echo $error;?>

        <?php echo form_open_multipart('upload/do_upload');?>

        <input type="file" name="userfile" size="20" />

        <br /><br />

        <input type="submit" value="上传" />

        </form>

    </body>
</html>