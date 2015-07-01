<!DOCTYPE html>
<html >
<head lang="en">
    <meta charset="UTF-8">
    <?php echo $this->tag->getTitle() ?>
</head>
<body>
<header>
    <h1>onlineshare</h1>
    <nav>
        <ul>
            <a href="/">首页</a>
            <span>/</span>
            <a href="/article/list">列表</a>
            <span>/</span>
            <?php if ($uid) { ?>
            <a href="/member/">个人中心</a>
            <span>/</span>
            <a href="/account/logout">注销</a>
            <?php } else { ?>
            <a href="/account/login">登录</a>
            <span>/</span>
            <a href="/account/reg">注册</a>
            <?php } ?>
        </ul>
    </nav>
</header>
    <?php echo $this->getContent(); ?>
<footer>
    <a href="#">?</a>
</footer>
</body>
</html>
