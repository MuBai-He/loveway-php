function requestApi(functionName, args, callback, showResults, refreshPageWhenSuccess, disableBtnId) {
    $(disableBtnId).attr("disabled", true);
    setTimeout(function() {
        $(disableBtnId).attr("disabled", false);
    }, 200000)
    $("#isLoading").show(100)
    $.ajax({
        type: 'post',
        url: '/api/' + functionName + '.php',
        data: args,
        dataType: 'json',
        success: function(rdata) {
            if (showResults) {
                mdui.snackbar({
                    message: rdata.msg,
                    position: 'right-top'
                })
            }
            if (refreshPageWhenSuccess & rdata.code == 1) {
                $.pjax.reload({
                    container: "#pjax-container"
                })
            }
            $("#isLoading").hide(100)
            $(disableBtnId).attr("disabled", false)
            if (callback) {
                callback(rdata)
            }
        },
        error: function(data) {
            $("#isLoading").hide(100)
            $(disableBtnId).attr("disabled", false)
            mdui.snackbar({
                message: "请求接口[" + functionName + "]时，出现了一个致命错误！",
                position: 'right-top'
            })
        },
    })
}