<?php
require APP_ROOT.'/views/inc/header.php';
?>

<div class="body post-show">
    <a class="link-btn text-secondary" href="<?=URL_ROOT?>/posts">Back</a>

    <h1><?=$data['post']->title?> <span>Written by <?=$data['user']->name?> on <?=$data['user']->created_at?></span></h1>
    
    <p><?=$data['post']->body?></p>

    <?php if ($data['post']->user_id == $_SESSION['user_id']): ?>
    <a class="link-btn text-secondary" href="<?=URL_ROOT?>/posts/edit/<?=$data['post']->id?>">Edit Post</a><br/><br/>

    <form action="<?=URL_ROOT?>/posts/delete/<?=$data['post']->id?>" method="post">
        <input class="btn text-secondary" type="submit" value="Delete Post"/>
    </form>
    <?php endif; ?>

    <?php foreach($data['comments'] as $comment): ?>
    <p>
        <span><?php echo ($_SESSION['user_id'] == $comment->user_id) ? 'You' : $comment->name;?> said:</span><br/>
        <?=$comment->comment?>
    </p>
    <?php endforeach; ?>

    <form action="<?=URL_ROOT?>/comments/add/<?=$data['post']->id?>" method="post">
        <textarea rows="5" cols="50" placeholder="Write down your comment." name="comment"></textarea><br/><br/>
        <input class="btn text-secondary" type="submit" value="Add Comment"/> <span><?php flash('comment_msg')?></span>
    </form>
</div>

<?php
require APP_ROOT.'/views/inc/footer.php';
?>