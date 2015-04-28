
###这个版本还是最开始的原型UI版本,等开发完善了再完整地开源。

iYourl
=

iYourl是一个社会化新闻聚合站点，口号：提前于新闻发生，来自互联网的声音！

功能介绍
=
你可以浏览并提交互联网上内容的链接或者发布自己的原创。别人可以对你发布的链接或文字进行投票，得分突出的链接会被放到首页。也可以对你发布的链接或文字进行评论以及回复其他评论者。

技术架构
=
+ Linux(CentOS)+Nginx+MySQL+PHP  
+ 采用遵循MVC思想的PHP开发框架CodeIgniter
+ 兼容性很好的JS库Jquery
+ 前端工具包Bootstrap v2

安装
=
*  配置LNMP环境（以CentOS5.4 32为例）  
   1. 安装必须的组件
   
   ```sh
   yum -y install gcc gcc-c++ autoconf libjpeg libjpeg-devel libpng libpng-devel freetype freetype-devel libxml2 libxml2-devel zlib zlib-devel glibc glibc-devel glib2 glib2-devel bzip2 bzip2-devel ncurses ncurses-devel curl curl-devel e2fsprogs e2fsprogs-devel krb5 krb5-devel libidn libidn-devel openssl openssl-devel openldap openldap-devel nss_ldap openldap-clients openldap-servers
   ```
   
   2. 下载LNMP
   
   ```sh
   wget http://catlnmp.googlecode.com/files/lnmp1.4.tar.gz
   ```
   
   3. 解压缩	  
   
   ```sh
   tar zxvf lnmp1.4.tar.gz
   ```
   
   4. 进入该目录  
   
   
   ```sh
   cd lnmp
   ```
   
   5. 给脚本添加执行权限  
   
   ```sh
   chmod +x *.sh
   ```
   
   6. 开始安装  
   
   ```sh
   ./install.sh
   ``` 	
   
然后会弹出一个对话框叫你输入你默认绑定域名，再之后输入 mysql 的 ROOT 密码。

这之后就是漫长的等待，预计半个小时。

OK  完成后。  

#### 程序安装路径：  
MySQL : /usr/local/mysql  
PHP : /usr/local/php  
Nginx : /usr/local/nginx  
PHPMyAdmin /home/www/phpmyadmin  
Web目录 /home/www  
FTP根目录 /home/www  
* 数据库：导入根目录下 db 文件夹中的 iyourl.sql

TodoList
=

1. 首页功能完善
 + 排名改进（已完成）
 + 投票功能（已完成）
 + 分类功能（已完成）
 + 注册登录（已完成）
 + 邮件分享功能（已完成）
 + 浏览器兼容（已完成）
 + 响应式设计（采用 Bootstrap v3 重写）  （已完成）
2. 加入排序算法  
 + 热门排名 （已完成） 
 + 上升最快（已完成）
 + 热议 （已完成）
3. 评论页面
 + 外观（已完成）
 + 功能完善（已完成）
 + 添加评论删除功能（已完成）
 + 显示算法优化：采用先序排序算法进行改进（已完成）

客户端App
=
API接口：http://lizhijun.github.io/91toutiao/
+ Android App (寻开发者)
+ iOS App (寻开发者)

License
--
<a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/3.0/cn/"><img alt="知识共享许可协议" style="border-width:0" src="http://i.creativecommons.org/l/by-nc-sa/3.0/cn/88x31.png" /></a><br />本作品采用<a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/3.0/cn/">知识共享署名-非商业性使用-相同方式共享 3.0 中国大陆许可协议</a>进行许可。
