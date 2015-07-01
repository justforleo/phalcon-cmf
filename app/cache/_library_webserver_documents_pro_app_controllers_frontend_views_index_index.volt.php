<?php use \Phalcon\Tag; ?>
<section>
    <header>
        <h1>搜索</h1>
    </header>
    <form action="/search" method="post">
        <p>
            <label for="search">
                <?php echo Tag::textField(['search','class'=>'search','autofocus'=>'true']); ?>
            </label>
        </p>

        <p>
            <?php echo Tag::submitButton(['submitSearch','class'=>'submitSearch','value'=>'搜索']); ?>
        </p>
        <img src="/a.jpg" >
    </form>
</section>
