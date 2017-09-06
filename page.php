<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php

    if (isset($_GET["action"]) && $_GET["action"] == "ajax_comments") {
        $this->need('comments.php');
    } else {
        if(strpos($_SERVER["PHP_SELF"],"themes")) header('Location: /');
        $this->need('header.php');
?>

<div class="container" id="main">
    <div class="row">

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3 class="post-title"><a href="<?php $this->permalink() ?>" target="_blank"><?php $this->title() ?></a></h3>
                    <div class="post-meta">
                        <span>Author：<a href="<?php $this->author->permalink(); ?>"><?php $this->author(); ?></a> | </span>
                        <span>Date：<?php $this->date('F j, Y'); ?> | </span>
                        <span>Category：<?php $this->category(','); ?> | </span>
                        <span>Comments：<a href="<?php $this->permalink() ?>"><?php $this->commentsNum('%d 评论'); ?></a> </span>
                    </div>
                    <div class="post-content"><?php $this->content('Continue Reading...'); ?></div>
                </div>
            </div>
            <?php $this->need('comments.php'); ?>
        </div>

    <?php $this->need('sidebar.php'); ?>
    <?php $this->need('footer.php'); ?>
<?php } ?>
