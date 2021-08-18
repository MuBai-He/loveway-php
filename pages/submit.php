<?php
if ($templateMode) {
    include('./includes/header.php');
}
?>
<br /><br />
<div class="mdui-card mdui-hoverable" style="border-radius: 16px">
    <div class="mdui-card-primary">
        <div class="mdui-card-primary-title">立即表白</div>
        <div class="mdui-card-primary-subtitle">快向你喜欢的TA表白吧！</div>
    </div>
    <div class="mdui-divider"></div>
    <div class="mdui-card-content">
        <div class="mdui-textfield">
            <label class="mdui-textfield-label">你的QQ</label>
            <textarea id="qq" class="mdui-textfield-input" placeholder="2333333333"></textarea>
        </div>
        <div class="mdui-textfield">
            <label class="mdui-textfield-label">你的名字</label>
            <textarea id="name" class="mdui-textfield-input" placeholder="镜音连"></textarea>
        </div>
        <div class="mdui-textfield">
            <label class="mdui-textfield-label">TA的名字</label>
            <textarea id="taName" class="mdui-textfield-input" placeholder="镜音铃"></textarea>
        </div>
        <div class="mdui-textfield">
            <label class="mdui-textfield-label">表白配图（可选）</label>
            <textarea id="image" class="mdui-textfield-input" placeholder="https://kagamine.top/img.png"></textarea>
        </div>
        <div class="mdui-textfield">
            <label class="mdui-textfield-label">一句话介绍一下TA</label>
            <textarea id="introduceTA" class="mdui-textfield-input" placeholder="镜音铃是一个元气的二次元少女"></textarea>
        </div>
        <div class="mdui-textfield">
            <label class="mdui-textfield-label">你要对TA说的话</label>
            <textarea id="toTA" class="mdui-textfield-input" rows="4" placeholder="我喜欢你..."></textarea>
        </div>
    </div>

    <div class="mdui-card-actions">
        <button id="submitbtn" style="border-radius: 8px" class="mdui-btn mdui-color-theme-accent mdui-ripple mdui-float-right" onclick="submit()">
            发射！
        </button>
    </div>
    <script>
        function submit() {
            url = $("#url").val();
            if (<?php if ($IMAGE_VERIFICATION) echo 'true';
                else echo 'false'; ?>) {
                imageVerification(function(answer) {
                    request(answer)
                })
            } else {
                request('0000');
            }
        }


        function imageVerification(callback) {
            mdui.dialog({
                title: '请输入图片中的验证码',
                content: '<center><div class="mdui-row"> <div class="mdui-col-xs-9"> <div class="mdui-textfield"> <input class="mdui-textfield-input" id="answer" type="text" placeholder="请输入您的答案" /></div> </div> <div class="mdui-col-xs-3"> <img style="position: relative;top:15px" id="vcode" src="/api/vcode.php" /> </div> </div></center>',
                modal: true,
                buttons: [{
                        text: '取消'
                    },
                    {
                        text: '确认',
                        onClick: function(inst) {
                            callback($('#answer').val());
                        }
                    }
                ]
            });
        }

        function request(vCode) {
            var contact = $("#qq").val();
            var name = $("#name").val();
            var taName = $("#taName").val();
            var image = $("#image").val();
            var introduceTA = $("#introduceTA").val();
            var toTA = $("#toTA").val();
            var timestamp = this.timestamp = Date.parse(new Date()) / 1000;
            var key = $.md5(
                'Kagamine Yes!' +
                contact +
                name +
                taName +
                image +
                introduceTA +
                toTA +
                timestamp)
            requestApi("submit", {
                key: key,
                timestamp: timestamp,
                contact: contact,
                name: name,
                taName: taName,
                image: image,
                introduceTA: introduceTA,
                toTA: toTA,
                vCode: vCode
            }, function(data) {
                $("#qq").val("");
                $("#name").val("");
                $("#taName").val("");
                $("#image").val("");
                $("#introduceTA").val("");
                $("#toTA").val("");
            }, true, true, "#submitbtn")
        }
    </script>
</div>
<br /><br />