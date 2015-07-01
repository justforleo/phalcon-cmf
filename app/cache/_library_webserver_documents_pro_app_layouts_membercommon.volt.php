<?php foreach ($menuList as $v) { ?>
<a class="active-link" href="<?php echo $v['link']; ?>"><?php echo $v['name']; ?></a>
<?php } ?>
<?php echo $this->getContent(); ?>
