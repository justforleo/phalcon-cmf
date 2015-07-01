<form action="" method="post" >
<p>
    <label for="username">
        <span>用户名：</span>
        <input type="text" name="username" id="username">
    </label>
</p>
<p>
    <label for="passwd">
        <span>密&nbsp;&nbsp;&nbsp&nbsp;码：</span>
        <input type="text" name="passwd" id="passwd">
    </label>
</p>
<p>
    <label for="validata">
        <span>验证码：</span>
        <input type="text" name="validata" id="validata">
    </label>
</p>
<?php foreach($_res as $key => $val): ?>
<?=$val->username;?>-<?=$val->photo?>-<?=$val->id;?><hr>
<?php endforeach; ?>

<p><input type="submit"></p>
</form>
<script>
(function($){
    $(username).on({
        blur: function() {
            var url = "/common/isExtendUsername",
                uname = me.val();
            $.ajax({
                url: url,
                data: {username:uname},
                type: 'post',
                dataType: 'json',
                timeout: 5,
                cache: false,
                statusCode: {
                    404: function() {

                    }
                },
                beforeSend: function() {

                },
                success: function(data) {

                },
            })
        }
    })
})(jQuery)
</script>
