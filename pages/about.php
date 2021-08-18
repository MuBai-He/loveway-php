<?php
if ($templateMode) {
    include('./includes/header.php');
}
?>
<br /><br />
<div class="mdui-card mdui-hoverable" style="border-radius: 16px">
    <div class="mdui-card-media">
        <img style="max-height: 1000px" src="https://static.llilii.cn/images/kagamine/32639516_p2.jpg" />
    </div>
    <div class="mdui-card-primary">
        <div class="mdui-card-primary-title">关于本站</div>
        <div class="mdui-card-primary-subtitle">ABOUT US</div>
    </div>
    <div class="mdui-card-content">
        <div class="mdui-typo">
            <?php echo getInfo('about_content') ?>
            <br><br>
            <!-- 本程序使用GPL2.0协议开源，请遵守此协议，请勿删除本处版权，否则原作者保留一切法律权利 -->
            <!-- 如果看不懂GPL2.0协议请自行查看根目录人话版解释。如果想删除本处版权的请直接不要使用本程序。 -->
            <div class="mdui-divider"></div><br>
            程序版本:V1.4.1<br />
            作者博客:<a href="https://www.wunote.cn" class="text-decoration: none;">吴先森的笔记</a><br />作者邮箱:i@mr-wu.top<br>
        </div>
    </div>
</div>
<br /><br />