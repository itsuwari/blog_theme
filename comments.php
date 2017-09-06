<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->comments()->to($comments); ?>
<div class="row">
    <div id="comments">


<?php if($this->allow('comment')): ?>
<div class="alert alert-info">
</div>
<?php $comments->listComments(array(
            'replyWord'=>'<button type="button" class="btn btn-danger btn-xs mdi-content-reply reply-button"></button>',
           )); ?>
<?php $comments->pageNav('&laquo; Previous', 'Next &raquo;'); ?>
<div id="<?php $this->respondId(); ?>" class="respond">
<div class="respond panel panel-default">
	<div class="panel-body">
		<div class="cancel-comment-reply"><?php $comments->cancelReply('<button type="button" class="btn btn-primary btn-xs btn-fab mdi-content-clear pull-right"><div class="ripple-wrapper"></div></button>'); ?></div>
		<h3 id="response">添加新评论</h3>
		<!-- 输入表单开始 -->
		    <form method="post" action="<?php $this->commentUrl() ?>" id="comment_form" class="form-horizontal">
		        <!-- 如果当前用户已经登录 -->
		        <?php if($this->user->hasLogin()): ?>
		            <!-- 显示当前登录用户的用户名以及登出连接 -->
		            <p>已作为管理员 <a href="<?php $this->options->adminUrl(); ?>"><?php $this->user->screenName(); ?></a> 登录
		            <a href="<?php $this->options->logoutUrl(); ?>" title="Logout">点击注销 &raquo;</a></p>

		        <!-- 若当前用户未登录 -->
		        <?php else: ?>

		    	<div class="form-group">
		    		<label for="author" class="col-sm-2 control-label required">Nick name</label>
		    		<div class="col-sm-9">
		    			<div class="form-control-wrapper">
		    				<input type="text" name="author" class="form-control text empty" size="35" value="<?php $this->remember('author'); ?>" />
		    				<span class="material-input"></span>
		    			</div>
		    		</div>
		    	</div>
				<div class="form-group">
		    		<label for="mail" class="col-sm-2 control-label required">Email</label>
		    		<div class="col-sm-9">
		    			<div class="form-control-wrapper">
		    				<input type="email" name="mail" class="form-control text empty" size="35" value="<?php $this->remember('mail'); ?>" />
		    				<span class="material-input"></span>
		    			</div>
		    		</div>
		    	</div>
		    	<div class="form-group">
		    		<label for="url" class="col-sm-2 control-label required">Your site</label>
		    		<div class="col-sm-9">
		    			<div class="form-control-wrapper">
		    				<input type="url" name="url" class="form-control text empty" size="35" value="<?php $this->remember('url'); ?>" placeholder="http://"/>
		    				<span class="material-input"></span>
		    			</div>
		    		</div>
		    	</div>
		        <?php endif; ?>

		        <div class="form-group">
		    		<label for="textarea" class="col-sm-2 control-label required">Comment</label>
		    		<div class="col-sm-9">
		    			<div class="form-control-wrapper">
		    				<textarea rows="9" cols="50" name="text" id="textarea" class="form-control textarea  empty" required=""></textarea>
		    				<span class="material-input"></span>
		    			</div>
		    		</div>
		    	</div>
		    	<div class="form-group">
		    		<div class="col-sm-offset-2 col-sm-5">
		    			<button type="submit" id="submit" class="btn btn-success btn-raised submit">Post</button>
		    		</div>
		    	</div>
		    </form>
	</div>
</div>
</div>
<?php else: ?>

	<div class="alert alert-warning">
	    <span id="commentCount">Comment is disabled.</span>
	</div>

<?php endif; ?>
</div>
</div>
