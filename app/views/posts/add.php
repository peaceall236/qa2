<?php
require APP_ROOT.'/views/inc/header.php';
?>
<div class="body post-add">
    <form action='<?=URL_ROOT?>/posts/add' method="post">
        <a class="link-btn text-secondary" href="<?=URL_ROOT?>/posts">Back</a>
        <h2 class="page-title">Add Post</h2>
        <p>Create a post with this form</p>
        <input type="text" placeholder="Enter Title" name="title" class="<?php echo ((!empty($data['title_err'])) ? 'is-invalid' : ''); ?>" value="<?=$data['title'];?>"/><br/>
        <span class="is-invalid"><?=$data['title_err'];?></span><br/>

        <textarea placeholder="Post goes here..." name="body" rows="10" cols="50" class="<?php echo ((!empty($data['body_err'])) ? 'is-invalid' : ''); ?>"><?=$data['body']?></textarea>

        <br/>
        <span class="is-invalid"><?=$data['body_err'];?></span><br/>

        <input class="btn" type="submit" value="Submit Post"/>

    </form>
</div>
<?php
require APP_ROOT.'/views/inc/footer.php';
?>