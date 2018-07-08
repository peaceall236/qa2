<?php
require APP_ROOT.'/views/inc/header.php';
?>


<div class="body">
    <p><a class="link-btn text-secondary add-post-btn" href="<?=URL_ROOT?>/posts/add">Add Post</a></p>
    <p><?php flash('post_added');?></p>
    <h1 style="font-size: 25px;">Posts</h1>
    
    <?php foreach ($data['posts'] as $post): ?>
    <div class="post">
        
    <h4 class="text-primary"><?=$post->title;?>  <span class="text-secondary ">Written by <?=$post->name;?> on <?=$post->created_at;?></span></h4>
    
    <p class="text-secondary"><?=$post->body;?></p>
    <a class="link-btn text-secondary" href="<?=URL_ROOT?>/posts/show/<?=$post->postID?>">More</a>
    </div>
    <?php endforeach;?>
</div>


<?php
require APP_ROOT.'/views/inc/footer.php';
?>
